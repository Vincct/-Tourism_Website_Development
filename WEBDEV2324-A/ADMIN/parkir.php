<!DOCTYPE html>

<html lang="en">

<?php
	include "include/config.php";
	if (isset($_POST['Simpan']))
	{
		$parkirKODE = $_POST['kodeparkir'];
		$parkirNAMA = $_POST['namaparkir'];
		$parkirJENIS = $_POST['jenisparkir'];
		$kodeDES = $_POST['deskode'];

		mysqli_query($connection, "insert into parkir values('$parkirKODE', '$parkirNAMA', '$parkirJENIS', '$kodeDES')");
    header("location:parkir.php"); //agar setelah input data maka akan kembali ke location pada header ini
	}
	$datadestinasi = mysqli_query($connection, "select * from destinasi");
?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PARKIR DESTINASI</title>
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
    	<label for="parkirKODE" class="col-sm-2 col-form-label">Kode Parkir</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="kodeparkir" id="parkirKODE" maxlength="4">
    	</div>
	</div>
	<div class="mb-3 row">
    	<label for="parkirNAMA" class="col-sm-2 col-form-label">Nama Parkir</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="namaparkir" id="parkirNAMA">
    	</div>
  </div>
  <div class="mb-3 row">
    	<label for="parkirJENIS" class="col-sm-2 col-form-label">Jenis Parkir</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="jenisparkir" id="parkirJENIS">
    	</div>
	</div>
	<div class="mb-3 row">
    	<label for="kodeDES" class="col-sm-2 col-form-label">Kode Destinasi</label>
    	<div class="col-sm-10">
      		<select class="form-control" id="kodeDES" name="deskode">
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
	<h2 class="display-5">Hasil entri data parkir</h2>	
</div>

<!-- untuk membuat form pencarian data -->
	<form method="POST">
		<div class="form-group row mb-2">
			<label for="search" class="col-sm-3">Nama Parkir</label>
			<div class="col-sm-6">
				<input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST['search'])) {echo $_POST["search"];} ?>" placeholder="Cari nama parkir">
			</div>
			<input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
		</div>
	</form>
<!-- akhir dari pencarian -->

<table class="table table-success table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Kode Parkir</th>
      <th>Nama Parkir</th>
      <th>Jenis Parkir</th>
      <th>Kode Destinasi</th>
      <th colspan="2" style="text-align: center">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
  	//$query = mysqli_query($connection, "select destinasi.* from destinasi");
  	if(isset ($_POST["kirim"]))
  	{
  		$search = $_POST["search"];
  		$query = mysqli_query($connection, "select parkir.*
  			from parkir
  			where parkirNAMA like '%".$search."%'");
  	} else
  		{
  			$query = mysqli_query($connection,"select parkir.* from parkir");
  		}

  	$nomor = 1;
  	while($row = mysqli_fetch_array($query))
  	{
  ?>
    <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $row['parkirKODE']; ?></td>
      <td><?php echo $row['parkirNAMA']; ?></td>
      <td><?php echo $row['parkirJENIS']; ?></td>
      <td><?php echo $row['destinasiKODE']; ?></td>

      <td width="5px">
      	<a href="parkirEDIT.php?Edit=<?php echo $row["parkirKODE"]?>" class="btn btn-success btn-sm" title="EDIT"/>
      	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  				<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  				<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
				</svg>
			</td>
			<td width="5px">
				<a href="parkirHAPUS.php?hapus=<?php echo $row["parkirKODE"]?>" class="btn btn-danger btn-sm" title="HAPUS">
				<i class="bi bi-trash"></i>
			</td>
    </tr>
    <?php $nomor = $nomor + 1; ?>
  <?php } ?>
  </tbody>
</table>

</div> <!-- ini penutup col-sm-10-->
</div> <!-- ini penutup class row-->

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

</body>
</html>