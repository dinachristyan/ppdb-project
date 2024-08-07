<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Custom Navbar</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <style>
    .bg-custom {
      background-color: #E4003A !important; /* Warna latar belakang navbar */
    }
    .navbar-brand, .nav-link, .dropdown-menu a {
      color: black !important; /* Warna teks untuk navbar dan dropdown */
      font-weight: bold;
    }
    .dropdown-menu a:hover {
      color: yellow !important; /* Warna hover untuk item dropdown */
    }
    .username {
      color: white !important; /* Warna teks untuk username */
    }
    .fa-user {
      color: white !important;
    }
    .navbar-brand img {
      height: 40px; /* Sesuaikan ukuran logo */
    }
    .navbar {
      padding: 0.25rem 0.5rem; /* Kurangi padding untuk membuat navbar lebih kecil */
    }
    .nav-link {
      padding: 0.25rem; /* Kurangi padding untuk link navbar */
    }
    .dropdown-menu {
      font-size: 0.875rem; /* Ukuran font untuk menu dropdown */
    }
    .nav-link[href="/pendaftaran"], .nav-link[href="/home"], .nav-link[href="/siswa"] {
      color: white !important; /* Warna putih */
      font-weight: bold; /* Font lebih tebal */
      margin-right: 10px;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-custom">
    <div class="container-fluid">
      <a class="navbar-brand" href="/home">
        <img src="/img/logo.png" alt="Logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" aria-current="page" href="/home">Home</a>
          <a class="nav-link active" href="/pendaftaran">Form Pendaftaran</a>
          <a class="nav-link active" href="/siswa">Pengumuman Siswa</a>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle btn btn-primary" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i> <span class="username">{{ Auth::user()->username }}</span> <span class="caret"></span>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ route('actionlogout') }}"><i class="fa fa-power-off"></i> Log Out</a>
            </div>
          </li>
        </div>
      </div>
    </div>
  </nav>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
