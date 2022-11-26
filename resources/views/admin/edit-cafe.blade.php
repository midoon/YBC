<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Cafe</title>

    

    {{-- aos --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    

    
    <!-- Custom styles for this template -->
    <link href="/css/admin/dashboard-admin.css" rel="stylesheet">
  </head>


  <body>
    
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Youtefa Bridge Cafes</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <form action="/logout/admin" method="POST">
          @csrf
          <button type="submit" class="bg-dark text-white p-2">
            <h6>Logout</h6>
            </button> 
        </form>
      </div>
    </div>
  </header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          @auth
          <li class="nav-item">
            <h6 class="p-4">Hallo, {{auth()->user()->name}}</h6>
          </li>
          @endauth
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="/admin">
              <span data-feather="coffee"></span>
              Cafe Kamu
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/create-cafe">
              <span data-feather="plus"></span>
              Tambah Cafe
            </a>
          </li>
          
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Cafe</h1>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card p-5 shadow" >
            <div class="row">
              <div class="col-md-6" data-aos="fade-right">
                  <form action="/update/{{$cafe->id}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                        <label  class="form-label">Nama Cafe</label>
                        <input type="text" class="form-control" name="name"  value="{{$cafe->name}}">
                        
                      </div>
                      <div class="mb-3">
                        <label  class="form-label">Deskripsi Cafe</label>
                        <textarea class="form-control" style="height: 100px" name="description"  >{{$cafe->description}}</textarea>
                      </div>
                      <div class="mb-3">
                          <label for="photo" class="form-label">Upload foto cafe</label>
                          <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo" name="photo" >
                          <input type="hidden" name="oldImage" value="{{$cafe->photo}}">
                          @error('photo')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                          @enderror
                      </div>
                      <input type="number" name="user_id" value="{{auth()->user()->id}}" hidden>
                      <button type="submit" class="btn btn-dark">Edit</button>
                      <a href="/create-menu/{{$cafe->id}}" class="btn btn-outline-dark text-dark mx-2">Tambah Menu</a>
                    </form>
              </div>
              <div class="col-md-6 text-center" data-aos="fade-left">
                <img src="/img/vector/v4.svg" alt=".." width="390" >
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      
      <script src="/js/dashboard-admin.js"></script>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
