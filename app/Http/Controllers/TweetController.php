<?php

namespace App\Http\Controllers;
use App\Models\Tweet;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    // トップ画面の表示
    public function index()
    {
        $tweets = Tweet::all();
        return view('tweets.index', compact('tweets'));
    }

    // 新規投稿画面の表示
    public function create()
    {
        return view('tweets.create');
    }

    // 新規投稿の保存
    public function store(Request $request)
    {
        $request->validate([
            'text' => ['required'],
        ]);

        Tweet::create([
            'text' => $request->input('text'),
            'image' => $request->hasFile('image') ? $request->file('image')->store('images','public') : null,   
            'user_id' => Auth::id(),
        ]);

        return redirect('/');
    }

    // 編集画面の表示
    public function edit($id)
    {
        $tweet = Tweet::find($id);
        if (Auth::id() !== $tweet->user_id) {
            return redirect('/');  // 不正アクセスを防止するため、トップ画面にリダイレクト
        }

        return view('tweets.edit', compact('tweet'));
    }

    // 編集内容の保存
    public function update(Request $request, $id)
    {
        $tweet = Tweet::find($id);
        if (Auth::id() !== $tweet->user_id) {
            return redirect('/');  // 不正アクセスを防止するため、本人じゃなかったらトップ画面にリダイレクト
        }
        
        $request->validate([
            'text' => ['required'],
        ]);

        $tweet->update([
            'text' => $request->input('text'),
            'image' => $request->hasFile('image') ? $request->file('image')->store('images','public') : $tweet->image,
        ]);

        return redirect('/');
}

    // 投稿の削除
    public function destroy($id)
    {
        $tweet = Tweet::find($id);
        if (Auth::id() !== $tweet->user_id) {
            return redirect('/');  // 不正アクセスを防止するため、本人じゃなかったらトップ画面にリダイレクト
        }

        $tweet->delete();
        return redirect('/');
    }
}