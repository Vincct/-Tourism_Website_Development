<!DOCTYPE html>
<html>
<?php
  include "include/config.php";
  if(isset($_POST['Simpan']))
  {
    $saranID = $_POST["idsaran"];
    $saranNAMA = $_POST["namasaran"];
    $saranEMAIL = $_POST["emailsaran"];
    $saranKOM = $_POST["komsaran"];

    mysqli_query($connection, "insert into saran values('$saranID', '$saranNAMA', '$saranEMAIL', '$saranKOM')");
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
        <label class="col-sm-2 col-form-label" style="font-family: Lucida Handwriting;">Yuk Beri Saran Untuk Websiteku!</label>
    </div>
    <div class="form-group row">
    <label for="saranID" class="col-sm-2 col-form-label">ID :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="saranID" name="idsaran">
    </div>
  </div>

  <div class="form-group row">
    <label for="saranNAMA" class="col-sm-2 col-form-label">Nama :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="saranNAMA" name="namasaran">
    </div>
  </div>

  <div class="form-group row">
    <label for="saranEMAIL" class="col-sm-2 col-form-label">Email :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="saranEMAIL" name="emailsaran">
    </div>
  </div>

  <div class="form-group row">
    <label for="saranKOM" class="col-sm-2 col-form-label">Komentar :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="saranKOM" name="komsaran">
    </div>
  </div>

    <button type="submit" class="btn btn-secondary" value="Simpan" name="Simpan">Simpan</button>
    <button type="reset" class="btn btn-success">Batal</button>

</form>
<br>

<h2>Komentar Anda</h2>
<table class="table table-info">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Komentar</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $jumlahtampilan = 3;
    $halaman = (isset($_GET['page']))? $_GET['page'] : 1;
    $mulaitampilan = ($halaman - 1) * $jumlahtampilan;

    if(isset ($_POST["kirim"]))
    {
        $search = $_POST["search"];
        $query = mysqli_query($connection, "select saran.*
            from saranID
            where saranNAMA like '%".$search."%' limit $mulaitampilan, $jumlahtampilan");
    } else
        {
            $query = mysqli_query($connection,"select saran.* from saran limit $mulaitampilan, $jumlahtampilan");
        }

    $nomor = 1;
    while($row = mysqli_fetch_array($query))
    {
  ?>
    <tr>
      <td><?php echo $mulaitampilan + $nomor; ?></td>
      <td><?php echo $row['saranNAMA']; ?></td>
      <td><?php echo $row['saranEMAIL']; ?></td>
      <td><?php echo $row['saranKOM']; ?></td>
    </tr>
    <?php $nomor = $nomor + 1; ?>
  <?php } ?>
  </tbody>
</table>
<?php 
    $query = mysqli_query($connection, "SELECT * FROM saran");
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
</html>