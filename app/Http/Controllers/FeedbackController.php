<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FeedbackController extends Controller
{
    public function feedBack(Request $request)
    {
    	return response()->json([
				    'success' => 'true',
				    'message' => 'Your feedback has been sent successfully!'
				])->header('Access-Control-Allow-Origin', '*')
    					 ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

    		//return $request->all();
    }
}
