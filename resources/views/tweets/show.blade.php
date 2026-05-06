  @extends('layouts.app')
                                                                                     
  @section('content')
  <div class="contents row">                                                         
      <div class="content_post" style="background-image: url({{ asset('storage/' .$tweet->image) }});">                       
          @if(Auth::check() && Auth::id() == $tweet->user_id)
          <div class="more">                  
              <ul class="more_list">                                                 
                  <li>
                      <a href="{{ route('tweets.edit', $tweet->id) }}">編集</a>      
                  </li>                       
                  <li>                                                               
                      <form action="{{ route('tweets.destroy', $tweet->id) }}" method="POST">                                                                     
                          @csrf           
                          @method('DELETE')                                          
                          <input type="submit" value="削除">                         
                      </form>
                  </li>                                                              
              </ul>                       
          </div>
          @endif                                                                     
          <p>{{ $tweet->text }}</p>
          <span class="name">                                                        
              <a href="/users/{{ $tweet->user->id }}">
                  <span>投稿者</span>{{ $tweet->user->nickname }}
              </a>                        
          </span>
      </div>                                                                         
                                              
      <div class="container">                                                        
          @auth   
              <form action="/tweets/{{ $tweet->id }}/comments" method="POST">        
                  @csrf                       
                  <textarea name="text" placeholder="コメントする" rows="2"></textarea>
                  <input type="submit" value="SEND">                                 
              </form>
          @else                                                                      
              <strong><p>※※※ コメントの投稿には新規登録/ログインが必要です※※※</p></strong>                        
          @endauth
                                                                                     
          <div class="comments">              
              <h4>＜コメント一覧＞</h4>                                              
              @foreach($comments as $comment)
                  <p>                                                                
                      <strong><a href="/users/{{ $comment->user_id }}">{{$comment->user->nickname }}</a>：</strong>                                         
                      {{ $comment->text }}
                  </p>
              @endforeach                                                            
          </div>
      </div>                                                                         
  </div>                                  
  @endsection
