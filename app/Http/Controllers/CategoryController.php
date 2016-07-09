<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Topic;

class CategoryController extends Controller
{
    public function index()
    {
        $tree = Topic::where('title', 'Root')->first()->getDescendants()->toHierarchy();
        
        // dd($tree);
        return view('categories.index', [
            'tree' => $tree
        ]);
    }

    public function create()
    {
        return view('categories.form', [
            'categories' => Topic::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'     => 'required|string|min:5|max:50',
            'parent'    => 'integer|exists:categories,id',
        ]);

        if ($request->has('parent'))
        {
            $parent = Topic::find($request->parent);
            $parent->children()->create(['title' => trim($request->title)]);
        }
        else
        {
            $node = Topic::create([
                'title'         => trim($request->title)
            ]);
        }

        return redirect('/categories');
    }

    public function edit($id)
    {
        $node = Topic::findOrFail($id);

        return view('categories.form', [
            'node'          => $node,
            'categories'    => Topic::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'     => 'required|string|min:5|max:50',
            'parent'    => 'integer|exists:categories,id',
        ]);

        $node = Topic::findOrFail($id);

        if ($request->has('parent'))
        {
            if ($request->parent == $node->parent_id)
            {
                $node->title = $request->title;
                $node->save();
            }
            else
            {
                $parent = Topic::findOrFail($request->parent);
                $node->makeChildOf($parent);
                $node->save();
            }
        }
        else
        {
            if ($node->parent_id === 0)
            {
                $node->title = $request->title;
                $node->save();
            }
            else
            {
                $node->makeRoot();
                $node->save();
            }
        }

        return redirect('/categories');
    }

    public function delete($id)
    {
        $node = Topic::findOrFail($id);

        return view('categories.confirm', [
            'node'  => $node,
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $node = Topic::findOrFail($id);
        $parent = $node->parent()->first();
        
        // dd($node, $parent);

        if ($node->isLeaf())
        {
            $node->delete();
        }
        else 
        {
            $children = $node->children()->get();
            foreach ($children as $child)
            {
                $child->makeChildOf($parent);
            }
            $node->delete();
        }
        return redirect('/categories');
        //return response()->json($node->sLeaf());
    }
}
