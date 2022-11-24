<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>

    

    

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
            <a class="nav-link active" aria-current="page" href="/admin">
              <span data-feather="coffee"></span>
              Cafe Kamu
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/create-cafe">
              <span data-feather="plus"></span>
              Tambah Cafe
            </a>
          </li>
          
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
      {{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cafe Kamu</h1>
      </div>

      <div class="row">
        
          <div class="col-md-3">
            <a href="/show-admin/{{$cafe->id}}" class="text-decoration-none text-black">
              <div class="card" >
                <img src="{{asset('storage/'.$cafe->photo)}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$cafe->name}}</h5>
                  <p class="card-text">{{$cafe->description}}</p>
                  <div class="flex">
                    <a href="#" class="btn btn-success">Edit</a>
                    <form action="/delete/{{$cafe->id}}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger">
                        Hapus
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </a>
          </div>
         
      </div>
      
      
      </div> --}}

      <div class="row justify-content-center mt-3">
        <div class="col-10">
            <div class="card mb-3">
                <img src="{{asset('storage/'.$cafe->photo)}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <div class="row">
                    <div class="col-10">
                        <h5 class="card-title">{{$cafe->name}}</h5>
                        <p class="card-text">{{$cafe->description}}</p>
                    </div>
                    <div class="col-2">
                        <a href="/update/{{$cafe->id}}" class="btn btn-warning">Edit</a>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th scope="col">Nama</th>
                          <th scope="col">Kategori</th>
                          <th scope="col">Halal</th>
                          <th scope="col">Harga</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($menus as $menu)
                        <tr>
                            <td>{{$menu->name}}</td>
                            <td>{{$menu->category}}</td>
                            <td>{{$menu->halal}}</td>
                            <td>{{$menu->price}}</td>
                          </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
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
  </body>
</html>
