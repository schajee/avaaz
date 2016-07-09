<?php

namespace App\Http\Controllers;

use App\Poll;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $poll = Poll::with('options.type', 'topics')->inRandomOrder()->first();

        // dd ($poll->responses);

        return view('home', [
            'poll' => $poll,
        ]);
    }

    public function info()
    {
        return phpinfo();
    }
}
