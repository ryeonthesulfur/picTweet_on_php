<?php

namespace App\Http\Controllers;
use App\Models\User;    // Userモデルをインポート

use Illuminate\Http\Request;


class UserController extends Controller
{
    // マイページの表示
    public function show($id)
    {
        $user = User::find($id);
        $nickname = $user->nickname; // ユーザーのニックネームを取得。
        $tweets = $user->tweets; // ユーザーのツイートを取得

        return view('user.show', compact('user', 'nickname', 'tweets'));    // ビューにユーザー情報、ニックネーム、ツイートを渡す記述
    }
}



/*
User::find($id) でユーザーを取得すると、そのユーザーの全カラムが $userの中に入ります。                                                                   
                                                                                     
  つまり $user の中に既に nickname、email、created_at など全部入っています。         
                                                                                     
  $user = User::find($id);                                                           
                                                                                     
  // $user の中身イメージ                                                            
  // $user->nickname = "sulfur"                                                      
  // $user->email = "xxx@xxx.com"
  // $user->id = 1                                                                   
                                          
  なので $nickname = $user->nickname; という変数を別途作らなくても、ビューで直接     
  $user->nickname と書けば同じ値が取れるということです。   */