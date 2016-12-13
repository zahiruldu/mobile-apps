<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Crowdword;
use App\User;
use App\Comment;

class FeedbackController extends Controller
{
    public function allfeedBack()
    {
        $comments = Comment::paginate(10);
        return view('feedback.all')
                ->with('feedbacks', $comments);
    }

    public function feedBack(Request $request)
    {
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->message;
        $comment->save();

    	return response()->json([
				    'success' => 'true',
				    'message' => 'Your feedback has been sent successfully!'
				])->header('Access-Control-Allow-Origin', '*')
    					 ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

    		//return $request->all();
    }

    public function addWord(Request $request)
    {
    	$word = new Crowdword;
        $word->ar = $request->ar;
        $word->en = $request->en;
        $word->bn = $request->bn;
        $word->desc = $request->desc;
        $word->username = $request->username;
        $word->email = $request->email;
        $word->save();

    	return response()->json([
				    'success' => 'true',
				    'message' => 'Thanks! We have received your entry successfully!'
				])->header('Access-Control-Allow-Origin', '*')
    					 ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

    		//return $request->all();
    }

    public function deleteFeed($id)
    {
        $feed = Comment::find($id);
        $feed->delete();
        return redirect()->back();

    }
}
