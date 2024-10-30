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
                    <h1 class="mt-4">Daftar Hotel Destinasi Wisata</h1>
<?php
    include "include/config.php";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL DESTINASI WISATA</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>
<body>

<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">
    <!-- untuk membuat pencarian data -->
        <form method="POST">
      <div class="form-group row mb-2">
        <label for="search" class="col-sm-3">Kode Hotel Destinasi</label>
        <div class="col-sm-6">
          <input type="text" name="search" class="form-control" id="search" value="<?php if(isset($_POST["search"])) {echo $_POST ["search"];} ?>" placeholder="Cari kode hotel destinasi">
        </div>
        <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="search">
      </div>
    </form>
    <!-- akhir dari pencarian -->
    <table class="table table-dark table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Kode Hotel</th>
                <th>Nama Hotel</th>
                <th>Foto Hotel</th>
            </tr>           
        </thead>

        <tbody>
            <?php
            $jumlahtampilan = 3;
            $halaman = (isset($_GET['page']))? $_GET['page'] : 1;
            $mulaitampilan = ($halaman - 1) * $jumlahtampilan;
            
            //$query = mysqli_query($connection, "select * from hotel");
            if(isset ($_POST["kirim"]))
            {
                $search = $_POST["search"];
                $query = mysqli_query($connection, "select * from hotel where hotel.hotelKODE = hotel.hotelKODE and hotelKODE like '%".$search."%' limit $mulaitampilan, $jumlahtampilan");
            } else
                {
                    $query = mysqli_query($connection,"select * from hotel where hotel.hotelKODE = hotel.hotelKODE limit $mulaitampilan, $jumlahtampilan");
                }
            $nomor = 1;
            while ($row = mysqli_fetch_array($query))
            { ?>
                <tr>
                    <td><?php echo $mulaitampilan + $nomor;?></td>
                    <td><?php echo $row['hotelKODE'];?></td>
                    <td><?php echo $row['hotelNAMA'];?></td>
                    <td>
                        <?php if(is_file("images/".$row['hotelFILE']))
                        { ?>
                            <img src="images/<?php echo $row['hotelFILE']?>" width="80">
                        <?php } else
                            echo "<img src='images/noimage.png' width='80'>"
                        ?>
                    </td>
                </tr>
            <?php $nomor = $nomor + 1;?>
            <?php } ?>
        </tbody>
    </table>
    <?php 
    $query = mysqli_query($connection, "SELECT * FROM hotel");
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
</body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</div>
                </main>
                <?php include "INCLUDE/footer.php"?>
            </div>
        </div>
        <?php include "INCLUDE/jsscript.php"?>
    </body>
</html>