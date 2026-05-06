<?php   //ルーティングの定義を行うファイル

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

// トップ画面のルート
Route::get('/', [TweetController::class, 'index']);  


// 検索機能のルート
Route::get('/tweets/search', [TweetController::class, 'search'])->name('tweets.search');  


// indexとshowは全ユーザーがアクセス可能、create, store, edit, update, destroyは認証ユーザーのみアクセス可能にするため、ルートを分けて定義。
Route::middleware('auth')->group(function () {
    Route::resource('tweets', TweetController::class)->except(['index', 'show']);  
});             

Route::resource('tweets', TweetController::class)->only(['index', 'show']);
                                                                                     



// コメント投稿のルート
Route::post('tweets/{id}/comments', [CommentController::class, 'addComment'])->name('tweets.addComment');


// マイページのルート
Route::get('users/{id}', [UserController::class, 'show'])->name('user.show');   // ユーザのIDをURLパラメータとして受け取り、UserControllerのshowメソッドにルーティングする記述


// 認証が必要なルート
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// 認証が必要なルートをグループ化（ユーザー管理）
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
