<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\Tweet;

class TimelineController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function showTimelinePage()
    {
        $tweets = Tweet::latest()->get();

        return view('timeline', [
            'tweets' => $tweets,
        ]);
         
    }

    public function postTweet(Request $request)
    {
        $request->validate([
            'text' => 'required|max:140',

        ]);

        //user_idとる（投稿をした人のuser_idをどうやってもってくるか。）
        $userId = Auth::id();

        //tweetの登録処理（データベースに登録）
        Tweet::create([
            'text' => $request['text'],
            //use_rid追加
            'user_id' => $userId,
        ]);

        //showTimelinePageを実行
        $this->showTimelinePage();
    }
}
