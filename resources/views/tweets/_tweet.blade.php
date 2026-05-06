  <div class="content_post" style="background-image: url({{ asset('storage/' . $tweet->image) }});">  
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
                  <form action="/tweets/{{ $tweet->id }}" method="POST" id="delete-form-{{ $tweet->id }}" style="display: none;">          
                      @csrf                   
                      @method('DELETE')                                           
                  </form>                                                         
                  <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $tweet->id }}').submit();">削除</a>
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