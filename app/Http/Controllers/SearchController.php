<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Poll;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('q'))
        {
            $polls = Poll::with('user')->where('title', 'like', '%'.$request->q.'%')->get();
            return view('search.results', [
                'polls' => $polls,
            ]);
        }
        abort(404);
    }
}
