  @extends('layouts.app')                                                            
                                              
  @section('content')                                                                
  <div class="contents row">
      <div class="container">                                                        
          <h3>投稿を編集する</h3>                                                    
          <form action="/tweets/{{ $tweet->id }}" method="POST"                      
  enctype="multipart/form-data">          
              @csrf
              @method('PUT')                                                         
              <input type="file" name="image">
              <textarea name="text" rows="10">{{ $tweet->text }}</textarea>          
              <input type="submit" value="更新する">
          </form>                                                                    
      </div>
  </div>                                                                             
  @endsection                                                   