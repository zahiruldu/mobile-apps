<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Crowdword;
use App\Word;

class MassController extends Controller
{

    public function allWords()
    {
    	$words = Crowdword::paginate(10);
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

    	$word = new Word;
    	$word->ar = $list->ar;
    	$word->en = $list->en;
    	$word->bn = $list->bn;
    	$word->desc = $list->desc;
    	$word->save();

    	$list->delete();
    	return redirect()->back();

    }

}
