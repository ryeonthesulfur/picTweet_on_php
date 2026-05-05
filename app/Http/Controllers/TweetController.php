<?php

namespace App\Http\Controllers;
use App\Models\Tweet;

use Illuminate\Http\Request;

class TweetController extends Controller
{
    // トップ画面の表示
    public function index()
    {
        $tweets = Tweet::all();
        return view('tweets.index', compact('tweets'));
    }
}
