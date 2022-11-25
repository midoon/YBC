<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- aos --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body >
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
      <div class="container">
        <a class="navbar-brand" href="/"><img src="/img/ybc_logo.png" alt="logo" height="50" width="50"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          </ul>

          <ul class="navbar-nav ms-auto">
            @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Selamat datang, {{auth()->user()->name}}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <form action="/logout/wisatawan" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                  </form>
                </li>
              </ul>
            </li>
            @else
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                  </svg> Login
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/login/wisatawan">Login Wisatawan</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="/login/admin">Login Admin</a></li>
                </ul>
              </li>
            @endauth
        </ul>
        </div>
      </div>
    </nav>
    

    <div class="container" style="margin-top: 120px">
      <div class="info mb-5">
        <h4 class="text-center mb-5">Tahukan kamu</h4>
        <div class="row">
          <div class="col-6 text-center">
            <img src="img/vector/v1.svg" alt="" width="390" data-aos="fade-right">
          </div>
          <div class="col-6">
            <p data-aos="fade-left">Jembatan Youtefa (sebelumnya bernama Jembatan Holtekamp) adalah salah satu jembatan di Provinsi Papua yang menghubungkan Holtekamp dengan Hamadi. Jembatan Youtefa memiliki panjang 732 meter dengan lebar 21 meter. Jembatan ini tergolong sebagai jembatan tipe pelengkung baja yang pertama kali dibangun di Papua.Jembatan Youtefa telah dilengkapi dengan 29 unit lampu ReachElite Powercore dan dipadukan dengan Vaya Flood RGB Medium Power sebanyak 125 unit.
            Jembatan Youtefa yang menjadi ikon baru untuk kota Jayapura, yang membuat para wisatawan tertarik untuk berkunjung ke Jembatan Youtefa. Di area sekitar jembatan merah ini terdapat berbagai café yang bisa digunakan untuk tempat wisata atau sekedar menikmati waktu luang</p>
          </div>
        </div>
      </div>
      <div class="cafe">
        <h4>Temukan cafe yang menarik!..</h4>
        <div class="row row-cols-1 row-cols-md-4 g-4 mt-2" style="margin-bottom: 100px">
          @foreach ($cafes as $cafe)
            <div class="col">
              <a href="/show/{{$cafe->id}}" class="text-decoration-none text-black">
                <div class="card h-100 rounded-3 bg-dark shadow" data-aos="zoom-in">
                  <img src="{{asset('storage/'.$cafe->photo)}}" class="card-img-top " alt="...">
                  <div class="card-body ">
                    <h5 class="card-title text-white">{{$cafe->name}}</h5>
                    
                  </div>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    
  </body>
</html>