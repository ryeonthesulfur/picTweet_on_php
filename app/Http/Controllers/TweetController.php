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
}
