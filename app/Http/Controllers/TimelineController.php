<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\Tweet;
use \App\Models\Photo;

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
        $tweet = Tweet::create([
            'text' => $request['text'],
            //user_id追加
            'user_id' => $userId,
        ]);

        //photoの登録処理
         // ディレクトリ名
         $dir = 'sample';

         // アップロードされたファイル名を取得
         $file_name = $request->file('image')->getClientOriginalName();

         // sampleディレクトリに画像を保存(取得したファイル名で)
         $request->file('image')->storeAs('public/' . $dir , $file_name);

         //データベースへ保存
         $photo = Photo::create([
             'file_name' => $file_name,
             'tweet_id' => $tweet->id,
        ]);
        

        //showTimelinePageを実行
        $this->showTimelinePage();
    }
}
