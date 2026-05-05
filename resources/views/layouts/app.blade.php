  <!DOCTYPE html>                                                                 
  <html lang="ja">
  <head>                                                                          
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width,initial-scale=1">         
      <title>Pictweet</title>                                                     
      @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>                                                                         
  <body>                                  
      <header class="header">                                                     
          <div class="header__bar row">                                           
              <h1 class="grid-6"><a href="/">PicTweet</a></h1>
              @auth                                                               
                  <div class="user_nav grid-6">
                      <span>{{ Auth::user()->nickname }}
                          <ul class="user_info">                                  
                              <li>        
                                  <a href="/users/{{ Auth::id() }}">マイページ</a>
                                  <form action="{{ route('logout') }}"            
                                        method="POST" style="display:inline;">      
                                      @csrf                                       
                                      <button type="submit">ログアウト</button>
                                  </form>                                         
                              </li>       
                          </ul>                                                   
                      </span>                                                     
                      <a href="/tweets/create" class="post">投稿する</a>
                  </div>                                                          
              @else                       
                  <div class="grid-6">
                      <a href="{{ route('login') }}" class="post">ログイン</a>    
                      <a href="{{ route('register') }}" class="post">新規登録</a>
                  </div>                                                          
              @endauth                    
          </div>
      </header>                                                                   
   
      @yield('content')                                                           
                  
      <footer>
          <p>Copyright PicTweet 2023.</p>
      </footer>                               
  </body>                                 
  </html>
