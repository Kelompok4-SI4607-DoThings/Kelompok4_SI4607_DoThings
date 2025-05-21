@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Do Things - Add Komunitas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #fff;
    }

    .form-container {
      max-width: 700px;
      margin: 40px auto;
      padding: 30px;
      border: 1px solid #ccc;
      border-radius: 12px;
      background-color: #fff;
    }

    .btn-primary {
      background-color: #007be5;
      border: none;
    }

    .footer {
      background: #111;
      color: #fff;
      padding: 40px 20px;
    }

    .footer a {
      color: #fff;
      text-decoration: none;
      display: block;
      margin-bottom: 6px;
    }

    .footer-bottom {
      background: #eee;
      padding: 10px;
      text-align: center;
      color: #000;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

<!-- Header -->
<nav class="navbar navbar-light bg-light px-4">
  <a class="navbar-brand fw-bold text-primary">DO <strong>THINGS</strong></a>
  <div>
    <a href="#" class="me-3 text-dark text-decoration-none">Home</a>
    <button class="btn btn-outline-dark">Log Out</button>
  </div>
</nav>

<!-- Form -->
<div class="form-container shadow-sm">
  <h3 class="text-center mb-4">Add <span class="text-primary">Komunitas</span></h3>
  <form id="komunitasForm">
    <div class="mb-3">
      <label for="judul" class="form-label">Judul Komunitas</label>
      <input type="text" class="form-control" id="judul" required>
    </div>

    <div class="mb-3">
      <label for="tanggal" class="form-label">Tanggal Dibuat</label>
      <input type="date" class="form-control" id="tanggal" required>
    </div>

    <div class="mb-3">
      <label for="kategori" class="form-label">Content / Category</label>
      <input type="text" class="form-control" id="kategori" required>
    </div>

    <div class="mb-3">
      <label for="deskripsi" class="form-label">Deskripsi</label>
      <textarea class="form-control" id="deskripsi" rows="3" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Add Now ➤</button>
  </form>
</div>

<!-- Text bawah -->
<div class="text-center mt-5">
  <h4 class="text-primary">New Komintas ➕</h4>
  <p class="fst-italic fs-5 mt-3">“More Giving, More Living”</p>
  <p>Sedikit Dari Kita, Berarti Besar Bagi Mereka!</p>
</div>

<!-- Footer -->
<footer class="footer mt-5">
  <div class="container">
    <div class="row text-start">
      <div class="col-md-3">
        <h5>Open Designers</h5>
        <p>Open source is source code that is made freely available for possible modification and redistribution.</p>
      </div>
      <div class="col-md-3">
        <h5>Explore</h5>
        <a href="#">Go pro</a>
        <a href="#">Explore Designs</a>
        <a href="#">Create Designs</a>
        <a href="#">Playoffs</a>
      </div>
      <div class="col-md-3">
        <h5>Innovate</h5>
        <a href="#">Tags</a>
        <a href="#">API</a>
        <a href="#">Places</a>
        <a href="#">Creative Markets</a>
      </div>
      <div class="col-md-3">
        <h5>About</h5>
        <a href="#">Community</a>
        <a href="#">Designers</a>
        <a href="#">Support</a>
        <a href="#">Terms of service</a>
      </div>
    </div>
  </div>
</footer>

<div class="footer-bottom">
  All Rights Reserved
</div>

<!-- JavaScript: Menangani submit -->
<script>
  document.getElementById("komunitasForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const judul = document.getElementById("judul").value;
    const tanggal = document.getElementById("tanggal").value;
    const kategori = document.getElementById("kategori").value;
    const deskripsi = document.getElementById("deskripsi").value;

    alert("Komunitas berhasil ditambahkan!\n\n" +
          "Judul: " + judul + "\n" +
          "Tanggal: " + tanggal + "\n" +
          "Kategori: " + kategori + "\n" +
          "Deskripsi: " + deskripsi);

    this.reset(); // reset form
  });
</script>

</body>
</html>

@endsection