<?php

namespace App\Http\Controllers;

use App\Poll;
use App\Http\Requests;
use Illuminate\Http\Request;

class PollController extends Controller
{
    //
    public function show(Request $request, string $slug)
    {
        $poll = Poll::with('options.type', 'topics')->where('slug', $slug)->first();

        if ($poll)
        {
            return view('polls.show', [
                'poll'  => $poll,
            ]);
        }
        
        abort(404);
    }
}
