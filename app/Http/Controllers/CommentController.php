<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'text' => ['required', 'max:255'],
        ]);

        // コメントの保存
        Comment::create([
            'text' => $request->input('text'),
            'user_id' => Auth::id(),
            'tweet_id' => $id,
        ]);

        return redirect()->route('tweets.show', $id);  // コメントを追加した後、元のツイートの詳細ページにリダイレクト

    }
}
