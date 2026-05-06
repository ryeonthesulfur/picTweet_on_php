<?php   //ルーティングの定義を行うファイル

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// トップ画面のルート
Route::get('/', [TweetController::class, 'index']);

// ログインしたユーザーのみがアクセスできる新規投稿のルート
Route::middleware('auth')->group(function () {                                 
      Route::get('tweets/create', [TweetController::class, 'create'])->name('tweet.create');
      Route::post('store', [TweetController::class, 'store'])->name('tweet.store');
  });

// 編集と削除のルート
Route::middleware('auth')->group(function () {
    Route::get('tweets/{id}/edit', [TweetController::class, 'edit'])->name('tweet.edit');
    Route::put('tweets/{id}', [TweetController::class, 'update']);
    Route::delete('tweets/{id}', [TweetController::class, 'destroy']);
});


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
