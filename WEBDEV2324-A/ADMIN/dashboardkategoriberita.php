<!DOCTYPE html>
<html>
<?php include "INCLUDE/head.php"?>
<body class="sb-nav-fixed">
    <?php include "INCLUDE/menunav.php"?>
    <div id="layoutSidenav">
        <?php include "INCLUDE/menu.php"?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    </ol>
<?php
  include "include/config.php";
  if(isset($_POST['Simpan']))
  {
    $kategoriberitaKODE = $_POST["inputKategoriKode"];
    $kategoriberitaNAMA = $_POST["inputKategoriNama"];
    $kategoriberitaKET = $_POST["inputKategoriKet"];
    $kategoriberitaKAT = $_POST["inputKategoriKat"];

    $namafile = $_FILES['file']['name'];
    $file_tmp = $_FILES["file"]["tmp_name"];

    $ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

    if(($ekstensifile == "jpg") or ($ekstensifile == "JPG"))
        {
            move_uploaded_file($file_tmp, 'images/'.$namafile); //unggah file ke folder images
            mysqli_query($connection, "insert into berita values('$kategoriberitaKODE', '$kategoriberitaNAMA', '$kategoriberitaKAT', '$kategoriberitaKET', '$namafile')");
        }

     
  }
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KATEGORI BERITA</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>
  <body>
<div class="row">  
<!-- ini bagian kerja saya -->
<div class="alert alert-primary" role="alert">
  ENTRI DATA KATEGORI BERITA
</div>

<div class="col-sm-1">
</div>

<div class="col-sm-10">
<form method="POST" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="kategoriberitaKODE" class="col-sm-2 col-form-label">Kode Kategori Berita</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="kategoriberitaKODE" name="inputKategoriKode" placeholder="Kode Kategori Berita" maxlength="4">
    </div>
  </div>

  <div class="form-group row">
    <label for="kategoriberitaNAMA" class="col-sm-2 col-form-label">Nama Kategori Berita</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="kategoriberitaNAMA" name="inputKategoriNama" placeholder="Nama Kategori Berita">
    </div>
  </div>

  <div class="form-group row">
    <label for="kategoriberitaKAT" class="col-sm-2 col-form-label">Kategori Berita</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="kategoriberitaKAT" name="inputKategoriKat" placeholder="Kategori Berita">
    </div>
  </div>

  <div class="form-group row">
    <label for="kategoriberitaKET" class="col-sm-2 col-form-label">Keterangan Kategori Berita</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="kategoriberitaKET" name="inputKategoriKet" placeholder="Keterangan Kategori Berita">
    </div>
  </div>

  <div class="form-group row">
            <label for="file" class="col-sm-2 col-form-label">Foto Kategori Berita</label>
            <div class="col-sm-10">
                <input type="file" id="file" name="file">
            </div>
        </div>

  <button type="submit" class="btn btn-primary" value="Simpan" name="Simpan">Simpan</button>
  <button type="reset" class="btn btn-info">Batal</button>

</form>
<div class="jumbotron mt-1">
    <h2 class="display-5">Hasil entri kategori berita</h2>  
</div>

<!-- untuk membuat form pencarian data -->
    <form method="POST">
        <div class="form-group row mb-2">
            <label for="search" class="col-sm-3">Nama Kategori Berita</label>
            <div class="col-sm-6">
                <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST['search'])) {echo $_POST["search"];} ?>" placeholder="Cari nama kategori berita">
            </div>
            <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
        </div>
    </form>
<!-- akhir dari pencarian -->
<table class="table table-primary table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Kategori Berita</th>
      <th scope="col">Nama Kategori Berita</th>
      <th scope="col">Kategori Berita</th>
      <th scope="col">Keterangan Kategori Berita</th>
      <th scope="col">Foto Kategori Berita</th>
      <th colspan="2" style="text-align: center">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $jumlahtampilan = 3;
    $halaman = (isset($_GET['page']))? $_GET['page'] : 1;
    $mulaitampilan = ($halaman - 1) * $jumlahtampilan;

    //$query = mysqli_query($connection, "select destinasi.* from destinasi");
    if(isset ($_POST["kirim"]))
    {
        $search = $_POST["search"];
        $query = mysqli_query($connection, "select *
            from berita
            where kategoriberitaNAMA like '%".$search."%' limit $mulaitampilan, $jumlahtampilan");
    } else
        {
            $query = mysqli_query($connection,"select * from berita limit $mulaitampilan, $jumlahtampilan");
        }

    $nomor = 1;
    while($row = mysqli_fetch_array($query))
    {
  ?>
    <tr>
      <td><?php echo $mulaitampilan + $nomor; ?></td>
      <td><?php echo $row['kategoriberitaKODE']; ?></td>
      <td><?php echo $row['kategoriberitaNAMA']; ?></td>
      <td><?php echo $row['kategoriberitaKAT']; ?></td>
      <td><?php echo $row['kategoriberitaKET']; ?></td>
      <td>
        <?php if(is_file("images/".$row['kategoriberitaFOTO']))
                { ?>
                    <img src="images/<?php echo $row['kategoriberitaFOTO']?>" width="80">
                <?php } else
                    echo "<img src='images/noimage.png' width='80'>"
        ?>
      </td>
      <td width="5px">
        <a href="kategoriberitaEDIT.php?Edit=<?php echo $row["kategoriberitaKODE"]?>" class="btn btn-success btn-sm" title="EDIT"/>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
            </td>
            <td width="5px">
                <a href="kategoriberitaHAPUS.php?hapus=<?php echo $row["kategoriberitaKODE"]?>" class="btn btn-danger btn-sm" title="HAPUS">
                <i class="bi bi-trash"></i>
            </td>
    </tr>
    <?php $nomor = $nomor + 1; ?>
  <?php } ?>
  </tbody>
<br>
</table>
<?php 
    $query = mysqli_query($connection, "SELECT * FROM berita");
    $jumlahrecord = mysqli_num_rows($query);
    $jumlahpage = ceil($jumlahrecord/$jumlahtampilan);
    ?>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="?page=<?php $nomorhal=1; echo $nomorhal?>">PERTAMA</a></li>
            <?php for($nomorhal=1; $nomorhal<=$jumlahpage; $nomorhal++)
            { ?>
            <li class="page-item">
                <?php 
                if($nomorhal!=$halaman)
                { ?>  
                <a class="page-link" href="?page=<?php echo $nomorhal?>"><?php echo $nomorhal?></a>
                <?php }
                else { ?>
                <a class="page-link" href="?page=<?php echo $nomorhal?>"><?php echo $nomorhal?></a>
                <?php } ?>
            </li>
            <?php } ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $nomorhal-1?>">TERAKHIR</a></li>
        </ul>
    </nav>
</div>
</div>
<!-- akhir kerja saya -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  </div>
                </main>
                <?php include "INCLUDE/footer.php"?>
            </div>
        </div>
        <?php include "INCLUDE/jsscript.php"?>
    </body>
</html>