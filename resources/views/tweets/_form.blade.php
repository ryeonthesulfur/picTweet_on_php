  <form action="{{ route('tweets.store') }}" method="POST" enctype="multipart/form-data">              
      @csrf                                                                       
      <input type="file" name="image">
      <textarea name="text" placeholder="text" rows="10"></textarea>              
      <input type="submit" value="SEND">
  </form>  