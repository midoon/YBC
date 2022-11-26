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

    <link rel="stylesheet" href="/css/coment/coment.css">
    <title>Hello, world!</title>
  </head>
  <body style="background-color: #9f9f9f">
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
      <div class="container">
        <a class="navbar-brand" href="/"><img src="/img/ybc_logow.png" alt="logo" height="50" width="50"></a>
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
    {{-- end navbar --}}

    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-8">
          <div class="card p-5 rounded shadow bg-dark" >
            <h3 class="text-center mt-3 text-white">{{$cafe->name}}</h3>
            
            <div class="row ">
              <div class="col">
                <form action="/create-feedback" method="POST">
                  @csrf
                  <div class="mb-3">
                    
                    
                    <div class="div  star-container">
                      <input type="radio" class="star" name="rating" id="" value="1" hidden><label class="star-label text-warning"> &#9734;</label>
                      <input type="radio" class="star" name="rating" id="" value="2" hidden><label class="star-label text-warning"> &#9734;</label>
                      <input type="radio" class="star" name="rating" id="" value="3" hidden><label class="star-label text-warning"> &#9734;</label>
                      <input type="radio" class="star" name="rating" id="" value="4" hidden><label class="star-label text-warning"> &#9734;</label>
                      <input type="radio" class="star" name="rating" id="" value="5" hidden><label class="star-label text-warning"> &#9734;</label>
                    </div>
        
                  </div>
                  <div class="mb-3">
                    <label  class="form-label text-white">Komentar</label>
                    <textarea class="form-control shadow-sm" style="height: 100px; background-color: rgb(49, 49, 49)" name="coment" data-aos="zoom-in">
                    
                    </textarea>
                  </div>
                  
                  <input type="number" name="cafe_id" value="{{$cafe->id}}" hidden>
                  <input type="number" name="user_id" value="{{auth()->user()->id}}" hidden>
                  <button type="submit" class="btn btn-outline-light">Buat feedback</button>
                  <a href="/show/{{$cafe_id}}"  class="btn btn-outline-light  mx-2" style="width: 100px">Kembali</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
      const allStar = document.querySelectorAll('.star-label');
      const allRadio = document.querySelectorAll('.star');
      allStar.forEach((s, i) => {
        
        s.onclick = function(){
          let current_star_level = i
          allStar.forEach((s, j) =>{
            if(current_star_level >= j){
              s.innerHTML = '&#9733;'
              
              allRadio[i].setAttribute("checked", "checked")
            } else{
              s.innerHTML = '&#9734;'
 
              allRadio[i].setAttribute("checked", "checked")
            }
          })
          
        }
        
      });
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

    
  </body>
</html>