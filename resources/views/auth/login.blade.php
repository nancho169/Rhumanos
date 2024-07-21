
    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" />
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
  
        <div class="login_wrapper">
          <div class="animate form login_form">
            <section class="login_content">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                <h1>Ingreso</h1>
                <div>
                   <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')"  />
                    </div>
                </div>
                <div>
                  <!-- Password -->
                    
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="form-control"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')"  />
                  
                </div>
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="checkbox" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Recordar') }}</span>
                    </label>
                </div>
        
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Olvidaste tu contraseña?') }}
                        </a>
                    @endif
        
                    <x-primary-button >
                        {{ __('Ingresar') }}
                    </x-primary-button>
                </div>
                <hr>
                  <br />
  
                  <div>
                    <h1><i class="fa fa-user"></i> RR.HH</h1>
                    <p>2024 n@nch0</p>
                  </div>
  
                
  
                
              </form>
            </section>
          </div>
  
          <div id="register" class="animate form registration_form">
            <section class="login_content">
              <form>
                <h1>Create Account</h1>
                <div>
                  <input type="text" class="form-control" placeholder="Username" required="" />
                </div>
                <div>
                  <input type="email" class="form-control" placeholder="Email" required="" />
                </div>
                <div>
                  <input type="password" class="form-control" placeholder="Password" required="" />
                </div>
                <div>
                  <a class="btn btn-default submit" href="index.html">Submit</a>
                </div>
  
                <div class="clearfix"></div>
  
                <div class="separator">
                  <p class="change_link">Already a member ?
                    <a href="#signin" class="to_register"> Log in </a>
                  </p>
  
                  <div class="clearfix"></div>
                  <br />
  
                  <div>
                    <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                    <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 4 template. Privacy and Terms</p>
                  </div>
                </div>
              </form>
            </section>
          </div>
        </div>
      </div>


   

