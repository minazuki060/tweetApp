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
            'tweet' => 'required|max:140',

        ]);
        //tweetの登録処理（データベースに登録）
        //showTimelinePageを実行
    }
}
