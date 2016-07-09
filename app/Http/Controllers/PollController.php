<?php

namespace App\Http\Controllers;

use Auth;
use App\Poll;
use App\Response;
use App\Http\Requests;
use Illuminate\Http\Request;

class PollController extends Controller
{
    //
    public function show(Request $request, string $slug)
    {
        $poll = Poll::with('options.type','user','topics')->where('slug', $slug)->first();
        $responses = Response::with('user','option')->where('user_id', Auth::user()->id)->where('poll_id', $poll->id)->get(); 

        if ($poll)
        {
            return view('polls.show', [
                'title' => $poll->title,
                'description' => $poll->description,
                'poll'  => $poll,
                'responses' => $responses,
            ]);
        }
        
        abort(404);
    }

    /**
     * Submit poll response
     * 
     * @param   request     $request
     * @param   string      $slug
     * @return  response
     */
    public function update(Request $request, $slug)
    {
        // Find poll with slug
        $poll = Poll::where('slug', $slug)->first();

        // Find authenticated user 
        $user = Auth::user();

        $this->validate($request, [
            'options'  => 'required|array', 
        ]);

        foreach ($request->options as $option)
        {
            Response::create([
                'user_id'   => $user->id,
                'poll_id'   => $poll->id,
                'option_id' => $option
            ]);
            
            $poll->responses = $poll->responses + 1;
            $poll->save();
        }
        
        return back();
    }
}
