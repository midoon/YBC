<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/register/wisatawan.css">

    <title>Hello, world!</title>
  </head>
  <body>
    

    <div class="row justify-content-center mt-5">
        <div class="col-md-4 ">
            <main class="form-registration">
                <form action="/registration/wisatawan" method="POST">
                    @csrf
                  <div class="row justify-content-center">
                    <div class="col text-center">
                      <img class="mb-4 " src="/img/ybc_logo.png" alt="" width="100" height="100">
                      <h1 class="h3 mb-3 fw-normal">Wisatawan Registration</h1>
                    </div>
                  </div>
                  <div class="form-floating">
                    <input type="text" name="name" class="form-control @error("name") is-invalid @enderror" id="name" placeholder="Username">
                    <label for="name">Username</label>
                    @error('name')
                   
                      @if ($message == "The name field is required.")
                        <div class="invalid-feedback">
                          Username tidak boleh kosong
                        </div>
                      @else
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                      @endif
                    
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="email" name="email" class="form-control  @error("email") is-invalid @enderror" id="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                    @error('email')
                      @if ($message == "The email field is required.")
                        <div class="invalid-feedback">
                          Email tidak boleh kosong
                        </div>
                      @else
                        <div class="invalid-feedback">
                          Email sudah terdaftar
                        </div>
                      @endif
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" name="password" class="form-control  @error("password") is-invalid @enderror" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    @error('password')
                      @if ($message == "The password field is required.")
                        <div class="invalid-feedback">
                          Password tidak boleh kosong
                        </div>
                      @else
                        <div class="invalid-feedback">
                          Password minimal 8 karakter
                        </div>
                      @endif
                    @enderror
                  </div>
              
                  <input name="role" value="wisatawan" hidden>
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                 
                </form>
              </main>
        </div>
    </div>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>