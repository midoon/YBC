<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link rel="stylesheet" href="/css/login/logwis.css">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="forms-container">
          <div class="signin-signup">
            <form action="/login/admin" class="sign-in-form" method="POST">
              @csrf
              @if (session()->has('loginError'))  
                <h4 style="color: red">{{session('loginError')}}</h4>
              @endif
              @error('email')               
                <h4 style="color: red">{{$message}}</h4>          
              @enderror
              @error('password')               
                <h4 style="color: red">{{$message}}</h4>          
              @enderror
              <h2 class="title"><img src="/img/ybc_logo.png" alt="" width="70"></h2>
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="email" name="email" required/>
              </div>
              <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="password" required/>
              </div>
              <input name="role" value="admin" hidden>
              <input type="submit" value="Login" class="btn solid" />
              
            </form>
            <form action="/registration/admin" class="sign-up-form" method="POST">
                @csrf
              @error('email')               
                <h4 style="color: red">{{$message}}</h4>          
              @enderror
              
              <h2 class="title"><img src="/img/ybc_logo.png" alt="" width="70"></h2>
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="name" required/>
              </div>
              <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="Email" name="email" required/>
              </div>
              <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="password" required/>
              </div>
              <input name="role" value="admin" hidden>
              <input type="submit" class="btn" value="Registrasi" />
              
            </form>
          </div>
        </div>
  
        <div class="panels-container">
          <div class="panel left-panel">
            <div class="content">
              <h3>Belum mempunyai akun?</h3>
              <p>
                Segera buat akun kamu dan buat surga kopimu sendiri
              </p>
              <button class="btn transparent" id="sign-up-btn">
                Registrasi
              </button>
            </div>
            <img src="/img/login/loga1.svg" class="image" alt="" />
          </div>
          <div class="panel right-panel">
            <div class="content">
              <h3>Sudah memiliki akun?</h3>
              <p>
                Wujudkanlah cafe impian mu
              </p>
              <button class="btn transparent" id="sign-in-btn">
                Login
              </button>
            </div>
            <img src="/img/login/loga2.svg" class="image" alt="" />
          </div>
        </div>
      </div>
  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        const sign_in_btn = document.querySelector("#sign-in-btn");
        const sign_up_btn = document.querySelector("#sign-up-btn");
        const container = document.querySelector(".container");

        sign_up_btn.addEventListener("click", () => {
        container.classList.add("sign-up-mode");
        });

        sign_in_btn.addEventListener("click", () => {
        container.classList.remove("sign-up-mode");
        });
    </script>

  </body>
</html>