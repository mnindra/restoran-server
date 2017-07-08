<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin Warung Sederhana</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>

    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Admin Warung Sederhana</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar">
          @if (Auth::guard('petugas')->check())
            <ul class="nav navbar-nav">
              <li><a href="/beranda">Beranda</a></li>
              <li><a href="/kategori">Kategori</a></li>
              <li><a href="/menu">Menu</a></li>
              <li><a href="/meja">Meja</a></li>
              <li><a href="/pemesanan">Pemesanan</a></li>
              <li><a href="/petugas">Petugas</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li><a>Selamat Datang {{ Auth::guard('petugas')->user()->nama }}</a></li>
              <li><a href="/logout">Logout</a></li>
            </ul>
          @endif

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container-fluid">
      @yield('content')
    </div>

    <script src="/js/app.js" charset="utf-8"></script>
  </body>
</html>
