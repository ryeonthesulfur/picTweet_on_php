  @extends('layouts.app')                                                         
                                                                                  
  @section('content')                                                             
      <form action="/tweets/search" method="GET" class="search-form">             
          <input type="text" name="keyword" placeholder="投稿を検索する" 
  class="search-input">                                                           
          <input type="submit" value="検索" class="search-btn">
      </form>                                                                     
                                          
      <div class="contents row">                                                  
          @foreach($tweets as $tweet)                                             
              @include('tweets._tweet', ['tweet' => $tweet])
          @endforeach                                                             
      </div>                              
  @endsection
