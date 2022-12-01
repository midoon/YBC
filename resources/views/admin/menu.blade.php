<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Menu</title>

    

    {{-- aos --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- icon --}}
    <link rel="icon" href="/img/ybc_logow.png" type="image/x-icon">

    
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
        <h1 class="h2">Tambah Menu</h1>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card p-5 shadow">
            <div class="row">
              <div class="col-6" data-aos="fade-right">
                <form action="/create-menu" method="POST" >
                  @csrf
                  <div class="mb-3">
                    <label  class="form-label">Nama Menu</label>
                    <input type="text" class="form-control" name="name" required>
                  </div>
                  <div class="mb-3">
                      <label for="form-label" class="mb-2">Kategori</label>
                      <select class="form-select mb-3" aria-label="Default select example" name="category">
                          <option value="makanan">Makanan</option>
                          <option value="minuman">Minuman</option>
                      </select>
                  </div>
                  <div class="mb-3">
                      <label for="form-label" class="mb-2">Halal</label>
                      <select class="form-select mb-3" aria-label="Default select example" name="halal">
                          <option value="halal">Halal</option>
                          <option value="non-halal">Non-Halal</option>
                      </select>
                  </div>
                  <div class="mb-3">
                      <label  class="form-label">Harga</label>
                      <input type="text" class="form-control" name="price" required>
                    </div>
                  <input type="hidden" name="cafe_id" value="{{$cafe_id}}" >
                  <button type="submit" class="btn btn-dark">Buat Menu</button>
                </form>
              </div>
              <div class="col-6 text-center" data-aos="fade-left">
                <img src="/img/vector/v5.svg" alt="" width="390" class="mt-5">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
            

              <div class="table-responsive  mt-4">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th scope="col">Nama</th>
                      <th scope="col">Kategori</th>
                      <th scope="col">Halal</th>
                      <th scope="col">Harga</th>
                      <th scope="col">action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($menus as $menu)
                    <tr>
                        <td>{{$menu->name}}</td>
                        <td>{{$menu->category}}</td>
                        <td>{{$menu->halal}}</td>
                        <td>{{$menu->price}}</td>
                        <td><form action="/delete-menu/{{$menu->id}}/{{$menu->cafe_id}}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                  </svg>
                            </button>
                          </form></td>
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      
      <script src="/js/dashboard-admin.js"></script>

      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
