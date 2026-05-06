  @extends('layouts.app')                                                            
                                                                              
  @section('content')                                                                
  <div class="contents row">
      <p>{{ $user->nickname }}さんの投稿一覧</p>                                     
      @foreach($tweets as $tweet)                                                   
          @include('tweets._tweet', ['tweet' => $tweet])                             
      @endforeach                                                                    
  </div>                                                                             
  @endsection   