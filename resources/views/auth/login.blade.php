  @extends('layouts.app')                                                         
                                                                                  
  @section('content')                                                             
  <div class="contents row">                                                      
      <div class="container">                                                   
          <h2>Log in</h2>                                                         
                                                                                  
          <x-auth-session-status class="mb-4" :status="session('status')" />      
                                                                                  
          <form method="POST" action="{{ route('login') }}">                      
              @csrf                                                               
  
              <div class="field">                                                 
                  <label>Email</label><br />                                    
                  <input type="email" name="email" value="{{ old('email') }}" autofocus>                              
                  <x-input-error :messages="$errors->get('email')" />
              </div>                                                              
  
              <div class="field">                                                 
                  <label>Password</label><br />                                 
                  <input type="password" name="password" autocomplete="off">
                  <x-input-error :messages="$errors->get('password')" />
              </div>

              <div class="field">             
                  <label><input type="checkbox" name="remember"> Remember me</label>
              </div>                                                              
  
              <div class="actions">                                               
                  <input type="submit" value="Log in">                          
              </div>                          
          </form>                         
      </div>
  </div>                                                                          
  @endsection