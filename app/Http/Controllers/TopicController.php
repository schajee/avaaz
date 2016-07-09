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
     *  List all topics
     *
     * @param   string  $slug   Slug of the topic
     * @return  object 
     */
    public function index()
    {
        $topics =   Topic::select('topics.*', DB::Raw('count(*) as polls'))
                    ->join('poll_topic', 'poll_topic.topic_id', '=', 'topics.id')
                    ->groupBy('topics.id')
                    // ->orderBy('polls', 'desc')
                    ->get();

        return view('topics.index', [

            'cloud' => $topics,
        ]);
    }
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
