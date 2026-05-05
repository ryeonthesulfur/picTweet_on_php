  <div class="content_post" style="background-image: url({{ $tweet->image }});">  
      <div class="more">                      
          <ul class="more_list">                                                  
              <li>                            
                  <a href="/tweets/{{ $tweet->id }}">詳細</a>                     
              </li>
              @if(Auth::check() && Auth::id() == $tweet->user_id)                 
              <li>                        
                  <a href="/tweets/{{ $tweet->id }}/edit">編集</a>                
              </li>                                                               
              <li>
                  <form action="/tweets/{{ $tweet->id }}" method="POST">          
                      @csrf                   
                      @method('DELETE')                                           
                      <input type="submit" value="削除">
                  </form>                                                         
              </li>                       
              @endif                                                              
          </ul>                                                                   
      </div>
      <p>{{ $tweet->text }}</p>                                                   
      <span class="name">                     
          <a href="/users/{{ $tweet->user->id }}">
              <span>投稿者</span>{{ $tweet->user->nickname }}
          </a>                                                                    
      </span>                             
  </div>   