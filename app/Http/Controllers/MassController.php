<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Crowdword;
use App\Word;
use App\User;

class MassController extends Controller
{

    public function allWords()
    {
    	$words = Crowdword::paginate(20);
    	return view('mass.all')
    			->with('words', $words);
    }

    public function getEdit($id)
    {
    	$word = Crowdword::find($id);
    	return view('mass.edit')->with('word',$word);

    }

    public function updateWord(Request $request, $id)
    {
    	$word = Crowdword::find($id);
    	$word->ar = $request->ar;
    	$word->en = $request->en;
    	$word->bn = $request->bn;
    	$word->desc = $request->desc;
    	$word->save();

    	return redirect('mass/word/all')->with('info','You have updated successfully!');

    }

    public function delete($id)
    {
    	$word = Crowdword::find($id);
    	$word->delete();
    	return redirect()->back();

    }

    public function addword($id)
    {
    	$list = Crowdword::find($id);

        $user = User::where('email', '=', $list->email)->first();
        if ($user === null) {
           // user doesn't exist, so creating new user
            $u = new User;
            $u->name = $list->username;
            $u->email = $list->email;
            $u->password = str_random(10);
            $u->save();
            $newid = $u->id;

            // Adding the mass word to Dictionary
            $word = new Word;
            $word->ar = $list->ar;
            $word->en = $list->en;
            $word->bn = $list->bn;
            $word->desc = $list->desc;
            $word->user_id = $newid;
            $word->save();

            $list->delete();
            return redirect()->back();

        } else {
            // User exist. so using existing data
            $word = new Word;
            $word->ar = $list->ar;
            $word->en = $list->en;
            $word->bn = $list->bn;
            $word->desc = $list->desc;
            $word->user_id = $user->id;
            $word->save();

            $list->delete();
            return redirect()->back();

        }

    }

}
