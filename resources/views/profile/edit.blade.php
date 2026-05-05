  @extends('layouts.app')                     
                                                                                  
  @section('content')                         
  <div class="contents row">                                                      
      <div class="container">
          <h2>Edit Profile</h2>                                                   
                                              
          <form method="POST" action="{{ route('profile.update') }}">             
              @csrf                                                               
              @method('PATCH')                                                    
                                              
              <div class="field">                                                 
                  <label>Email</label>
                  <input type="email" name="email" value="{{ old('email', $user->email) }}" autofocus autocomplete="email">
                  <x-input-error :messages="$errors->get('email')" />             
              </div>                          
                                                                                  
              <div class="actions">
                  <input type="submit" value="Update Email">                      
              </div>                          
          </form>                                                                 
                  
          <form method="POST" action="{{ route('password.update') }}">            
              @csrf
              @method('PUT')                                                      
                                          
              <div class="field">
                  <label>New Password <i>(leave blank if you don't want to change it)</i></label>                             
                  <input type="password" name="password" autocomplete="new-password">
                  <x-input-error :messages="$errors->get('password')" />          
              </div>                          
                                                                                  
              <div class="field">
                  <label>Confirm New Password</label>                             
                  <input type="password" name="password_confirmation" autocomplete="new-password">                                                    
              </div>                      

              <div class="field">                                                 
                  <label>Current Password <i>(required to confirm changes)</i></label>                                                            
                  <input type="password" name="current_password" autocomplete="current-password">
                  <x-input-error :messages="$errors->get('current_password')" />  
              </div>                          
                                                                                  
              <div class="actions">
                  <input type="submit" value="Update Password">                   
              </div>
          </form>                                                                 
      </div>      
  </div>
  @endsection