  @extends('layouts.app')   //ユーザー新規登録画面

  @section('content')
  <div class="contents row">
      <div class="container">
          <h2>Sign up</h2>

          <form method="POST" action="{{ route('register') }}">
              @csrf

              <div class="field">
                  <label>Nickname</label> <em>(6 characters maximum)</em><br />
                  <input type="text" name="nickname" value="{{ old('nickname') }}" maxlength="6">
                  <x-input-error :messages="$errors->get('nickname')" />
              </div>

              <div class="field">
                  <label>Email</label><br />
                  <input type="email" name="email" value="{{ old('email') }}">
                  <x-input-error :messages="$errors->get('email')" />
              </div>

              <div class="field">             
                  <label>Password</label><br />
                  <input type="password" name="password" autocomplete="off">
                  <x-input-error :messages="$errors->get('password')" />          
              </div>
                                                                                  
              <div class="field">                                               
                  <label>Password confirmation</label><br />
                  <input type="password" name="password_confirmation" autocomplete="off">
                  <x-input-error :messages="$errors->get('password_confirmation')" />
              </div>

              <div class="actions">
                  <input type="submit" value="Sign up">
              </div>
          </form>
      </div>
  </div>
  @endsection