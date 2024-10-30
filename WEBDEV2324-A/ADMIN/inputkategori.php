<!doctype html>

<?php
  include "include/config.php";
  if(isset($_POST['Simpan']))
  {
    $kategoriKODE = $_POST["inputKategoriKode"];
    $kategoriNAMA = $_POST["inputKategoriNama"];
    $kategoriKET = $_POST["inputKategoriKet"];
    $kategoriREFERENCE = $_POST["inputKategoriRef"];

    mysqli_query($connection, "insert into kategoriwisata values('$kategoriKODE', '$kategoriNAMA', '$kategoriKET', '$kategoriREFERENCE')");
    header("location:inputkategori.php"); //agar setelah input data maka akan kembali ke location pada header ini
  }
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Wisata</title>
  </head>
  <body>
  
<!-- ini bagian kerja saya -->
<div class="col-sm-2">
</div>

<div class="col-sm-10">
<form method="POST">
  <div class="form-group row">
    <label for="kategorikode" class="col-sm-2 col-form-label">Kategori Kode</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kategorikode" name="inputKategoriKode" placeholder="Inputkan Kode Kategori">
    </div>
  </div>

  <div class="form-group row">
    <label for="kategorinama" class="col-sm-2 col-form-label">Nama Kategori</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kategorinama" name="inputKategoriNama" placeholder="Inputkan Nama Kategori">
    </div>
  </div>

  <div class="form-group row">
    <label for="kategoriket" class="col-sm-2 col-form-label">Keterangan Kategori</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kategoriket" name="inputKategoriKet" placeholder="Inputkan Ket Kategori">
    </div>
  </div>

  <div class="form-group row">
    <label for="kategoriref" class="col-sm-2 col-form-label">Referensi Kategori</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kategoriref" name="inputKategoriRef" placeholder="Inputkan Referensi Kategori">
    </div>
  </div>

<button type="submit" class="btn btn-secondary" value="Simpan" name="Simpan">Simpan</button>
<button type="reset" class="btn btn-success">Batal</button>

</form>
</div>

<!-- akhir kerja saya -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>