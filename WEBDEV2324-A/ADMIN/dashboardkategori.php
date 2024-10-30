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
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
<?php
  include "include/config.php";
  if(isset($_POST['Simpan']))
  {
    $kategoriKODE = $_POST["inputKategoriKode"];
    $kategoriNAMA = $_POST["inputKategoriNama"];
    $kategoriKET = $_POST["inputKategoriKet"];
    $kategoriREFERENCE = $_POST["inputKategoriRef"];

    mysqli_query($connection, "insert into kategoriwisata values('$kategoriKODE', '$kategoriNAMA', '$kategoriKET', '$kategoriREFERENCE')");
    //header("location:dashboardkategori.php"); //agar setelah input data maka akan kembali ke location pada header ini
  }
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DESTINASI</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>
<body>
<div class="row">
    <div class="col-sm-1"></div>
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
<br>
<!-- untuk membuat pencarian data -->
        <form method="POST">
      <div class="form-group row mb-2">
        <label for="search" class="col-sm-3">Nama Kategori Wisata</label>
        <div class="col-sm-6">
          <input type="text" name="search" class="form-control" id="search" value="<?php if(isset($_POST["search"])) {echo $_POST ["search"];} ?>" placeholder="Cari nama kategori wisata">
        </div>
        <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="search">
      </div>
    </form>
    <!-- akhir dari penecarian -->
<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Kategori</th>
      <th scope="col">Nama Kategori</th>
      <th scope="col">Keterangan Kategori</th>
      <th scope="col">Referensi Kategori</th>
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
        $query = mysqli_query($connection, "select kategoriwisata.*
            from kategoriwisata
            where kategoriNAMA like '%".$search."%' limit $mulaitampilan, $jumlahtampilan");
    } else
        {
            $query = mysqli_query($connection,"select kategoriwisata.* from kategoriwisata limit $mulaitampilan, $jumlahtampilan");
        }

    $nomor = 1;
    while($row = mysqli_fetch_array($query))
    {
  ?>
    <tr>
      <td><?php echo $mulaitampilan + $nomor; ?></td>
      <td><?php echo $row['kategoriKODE']; ?></td>
      <td><?php echo $row['kategoriNAMA']; ?></td>
      <td><?php echo $row['kategoriKET']; ?></td>
      <td><?php echo $row['kategoriREFERENCE']; ?></td>
      <td width="5px">
        <a href="kategoriedit.php?ubah=<?php echo $row["kategoriKODE"]?>" class="btn btn-success btn-sm" title="EDIT"/>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
            </td>
            <td width="5px">
                <a href="kategorihapus.php?hapus=<?php echo $row["kategoriKODE"]?>" class="btn btn-danger btn-sm" title="HAPUS">
                <i class="bi bi-trash"></i>
            </td>
    </tr>
    <?php $nomor = $nomor + 1; ?>
  <?php } ?>
  </tbody>
</table>
<?php 
    $query = mysqli_query($connection, "SELECT * FROM kategoriwisata");
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
</div> <!-- ini penutup col-sm-10-->
</div> <!-- ini penutup class row-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

</body>
                    </div>
                </main>
                <?php include "INCLUDE/footer.php"?>
            </div>
        </div>
        <?php include "INCLUDE/jsscript.php"?>
    </body>
</html>