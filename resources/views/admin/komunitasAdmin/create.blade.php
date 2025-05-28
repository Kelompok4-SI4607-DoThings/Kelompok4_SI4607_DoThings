@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Add Komunitas</h1>
    <form action="{{ route('admin.komunitasAdmin.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="judul_komunitas">Judul Komunitas</label>
            <input type="text" class="form-control" id="judul_komunitas" name="judul_komunitas" required>
        </div>
        <div class="form-group">
            <label for="tanggal_dibuat">Tanggal Dibuat</label>
            <input type="date" class="form-control" id="tanggal_dibuat" name="tanggal_dibuat" required>
        </div>
        <div class="form-group">
            <label for="category">Content / Category</label>
            <input type="text" class="form-control" id="category" name="category" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add Now</button>
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