<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Response;

class ResponseController extends Controller
{
	public function delete(Request $request, $id)
	{
		$response = Response::with('option')->find($id);

		return view('responses.confirm', [
			'response' 	=> $response,
		]);
	}

    public function destroy(Request $request, $id)
    {
    	$response = Response::with('poll')->find($id);
    	$poll = $response->poll;

    	$response->delete();

    	return redirect('/polls/'.$poll->slug);
    }
}

