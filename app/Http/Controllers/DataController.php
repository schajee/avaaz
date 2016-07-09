<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Poll;
use App\Topic;

class DataController extends Controller
{
    public function index()
    {
        $output = array();

        $polls = Poll::select('title')->orderBy('title', 'asc')->get();
        foreach ($polls as $poll)
            $output[] = $poll->title;

        return $output;
    }
}
