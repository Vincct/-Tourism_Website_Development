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
    if (isset($_POST['Simpan']))
    {
        $vincentiusID = $_POST['idvincentius'];
        $vincentiusKOTA = $_POST['kotavincentius'];
        $destinasiKODE = $_POST['kodedestinasi'];

        mysqli_query($connection, "insert into vincentius value ('$vincentiusID', '$vincentiusKOTA', '$destinasiKODE')");
    }
    $datadestinasi = mysqli_query($connection, "select * from destinasi");
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
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3 row">
        <label for="vincentiusID" class="col-sm-2 col-form-label">ID Vincentius</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="idvincentius" id="vincentiusID" maxlength="4">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="vincentiusKOTA" class="col-sm-2 col-form-label">Kota Vincentius</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="kotavincentius" id="vincentiusKOTA">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="destinasiKODE" class="col-sm-2 col-form-label">Kode Kategori</label>
        <div class="col-sm-10">
            <select class="form-control" id="destinasiKODE" name="kodedestinasi">
                <option>Kategori Wisata</option>
                <?php while($row = mysqli_fetch_array($datadestinasi))
                { ?>
                    <option value="<?php echo $row["destinasiKODE"]?>">
                        <?php echo $row["destinasiKODE"]?>
                        <?php echo $row["destinasiNAMA"]?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input type="submit" class="btn btn-secondary" value="Simpan" name="Simpan">
            <input type="reset" class="btn btn-success" value="Batal" name="Batal">
        </div>
    </div>
</form>

<br>
<div class="jumbotron mt-5">
    <h2 class="display-5">Hasil entri data</h2>    
</div>

<!-- untuk membuat form pencarian data -->
    <form method="POST">
        <div class="form-group row mb-2">
            <label for="search" class="col-sm-3">Kota Vincentius</label>
            <div class="col-sm-6">
                <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST['search'])) {echo $_POST["search"];} ?>" placeholder="Cari kota vincentius">
            </div>
            <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
        </div>
    </form>
<!-- akhir dari pencarian -->

<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">ID Vincentius</th>
      <th scope="col">Kota Vincentius</th>
      <th scope="col">Kode Destinasi</th>
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
        $query = mysqli_query($connection, "select vincentius.*
            from vincentius
            where vincentiusKOTA like '%".$search."%' limit $mulaitampilan, $jumlahtampilan");
    } else
        {
            $query = mysqli_query($connection,"select vincentius.* from vincentius limit $mulaitampilan, $jumlahtampilan");
        }

    $nomor = 1;
    while($row = mysqli_fetch_array($query))
    {
  ?>
    <tr>
      <td><?php echo $mulaitampilan + $nomor; ?></td>
      <td><?php echo $row['vincentiusID']; ?></td>
      <td><?php echo $row['vincentiusKOTA']; ?></td>
      <td><?php echo $row['destinasiKODE']; ?></td>
    </tr>
    <?php $nomor = $nomor + 1; ?>
  <?php } ?>
  </tbody>
</table>
<?php 
    $query = mysqli_query($connection, "SELECT * FROM vincentius");
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
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
                    </div>
                </main>
                <?php include "INCLUDE/footer.php"?>
            </div>
        </div>
        <?php include "INCLUDE/jsscript.php"?>
    </body>
</html>