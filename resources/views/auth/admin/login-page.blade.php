<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>
        <link rel="icon" type="image/png" sizes="16x16" href="{{url('/images/bsu_logo.png')}}"/>

        @vite(['resources/js/app.js'])

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ url('/css/login-main.css') }}">
        <link rel="stylesheet" href="{{ url('/css/login-util.css') }}">
     

    </head>
    <body class="antialiased" >

        <div class="limiter">
          <div class="container-login100" style="background-image: url({{url('images/bg-01.jpg')}});">
            <div class="wrap-login100">
              <form  class="login100-form validate-form" action="/admin/login/" method="post">
                @csrf
                <div class="card-body p-5 text-center"> 
                  <div class="mb-md-3 mt-md-0 pb-0">
                    <img src="{{url('images/bsu_logo.png')}}" alt="" style="width: 40%;">
                    <h2 class="fw-bold mb-2 text-uppercase text-white p-2">Login</h2>
                    <p class="text-white-50 mb-5">Please enter your ID Number and Password.</p>
      
                    <div class="form-outline form-white mb-4">
                      <input type="text" id="id_number" name="id_number" class="form-control form-control-lg" />
                      <label class="form-label text-white" for="id_number">ID Number</label>
                      @error('id_number')
                      <p class="text-danger mt-1">{{$message}}</p>
                      @enderror
                    </div>
      
                    <div class="form-outline form-white mb-4">
                      <input type="password" id="password" name="password" class="form-control form-control-lg" />
                      <label class="form-label text-white" for="password">Password</label>
                      @error('password')
                      <p class="text-danger mt-1">{{$message}}</p>
                      @enderror
                    </div>
      
                    <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!"></a></p>
      
                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                  </div>
      
                  <div>
                    
                  </div>
      
                </div>
              </form>
            </div>
          </div>
	</div>
    </body>
</html>
