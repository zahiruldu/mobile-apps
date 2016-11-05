<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests;
use App\Word;
use Validator;

class WordController extends Controller
{
    public function index()
    {
    	$words = Word::all();

    	// return response()->json([
					// 'name' => 'Abigail',
					// 'state' => 'CA'
					// ])
    	// 		->header('Access-Control-Allow-Origin', '*')
    	// 		->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

    	return response()->json($words, 200, [], JSON_UNESCAPED_UNICODE)
    					 ->header('Access-Control-Allow-Origin', '*')
    					 ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

    	


    }

    public function totalWords()
    {
        $words = Word::get()->count();

        // return response()->json([
                    // 'name' => 'Abigail',
                    // 'state' => 'CA'
                    // ])
        //      ->header('Access-Control-Allow-Origin', '*')
        //      ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

        return response()->json($words, 200, [], JSON_UNESCAPED_UNICODE)
                         ->header('Access-Control-Allow-Origin', '*')
                         ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

        


    }

    public function allWords()
    {
    	$words = Word::paginate(3);
    	return view('word.all')
    			->with('words', $words);
    }

    public function getWordForm()
    {
    	return view('word.add');
    }

    public function addWord(Request $request)
    {

    	$messages = [
		    'required' => 'The :attribute field is required.',
		    'max' => 'The :attribute field is exceeding.',
		];

    	 $validator = Validator::make($request->all(), [
            'ar' => 'required|unique:words|max:25',
            'en' => 'required',
            'bn' => 'required',
            'desc' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect('word/add')
                        ->withErrors($validator)
                        ->withInput();
        }


        $word = new Word;
        $word->ar = $request->ar;
        $word->en = $request->en;
        $word->bn = $request->bn;
        $word->desc = $request->desc;
        $word->save();

        return redirect()->back()->with('info','The word has been added sucecssfully!');



    }

    public function getEdit($id)
    {
    	$word = Word::find($id);
    	return view('word.edit')->with('word',$word);

    }

    public function updateWord(Request $request, $id)
    {
    	$word = Word::find($id);
    	$word->ar = $request->ar;
    	$word->en = $request->en;
    	$word->bn = $request->bn;
    	$word->desc = $request->desc;
    	$word->save();

    	return redirect('word/all')->with('info','You have updated successfully!');

    }


    public function file()
    {
        $words = Word::all();

         Storage::disk('public')->put('file.json', $words);
        return $url;
    }

    public function sendFile()
    {
        $words = Word::all();
        $t = json_encode($words, JSON_UNESCAPED_UNICODE);

         Storage::disk('public')->put('file.json', $t);

        $url = Storage::disk('public')->url('file.json');

        return $url;
    }
}
