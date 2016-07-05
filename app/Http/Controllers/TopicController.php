<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use App\Poll;
use App\Topic;
use App\Response;
use App\Http\Requests;

class TopicController extends Controller
{
    /**
     *  Show polls under a topic 
     *
     * @param   string  $slug   Slug of the topic
     * @return  object 
     */
    public function show(string $slug)
    {
        $topic = Topic::where('slug', $slug)->firstOrFail();

        $polls = Poll::with('options','responses')->select('polls.*')
                    ->join('poll_topic', 'poll_topic.poll_id', '=', 'polls.id')
                    ->join('topics', 'topics.id', '=', 'poll_topic.topic_id')
                    ->where('topics.slug', 'like', '%'.$slug.'%')
                    ->orderBy('polls.created_at', 'desc')
                    ->get();

        // dd($polls->toArray());

        if (!$polls) abort(404);

        return view('topics.show', [
            'topic' => $topic,
            'polls' => $polls,
        ]);
    }
}
