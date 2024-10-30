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
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>OLEH-OLEH DESTINASI WISATA</title>
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>

<?php 
	include "include/config.php";
	if(isset($_POST['Simpan']))
	{
		$kodeoleh = $_POST['olehkode'];
		$namaoleh = $_POST['olehnama'];

		$namafile = $_FILES['file']['name'];
		$file_tmp = $_FILES["file"]["tmp_name"];

		$ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

		// PERIKSA EKSTEN FILE HARUS JPG ATAU jpg
		if(($ekstensifile == "jpg") or ($ekstensifile == "JPG"))
		{
			move_uploaded_file($file_tmp, 'images/'.$namafile); //unggah file ke folder images
			mysqli_query($connection, "insert into oleholeh value ('$kodeoleh', '$namaoleh', '$namafile')");
		}

	}
?>


<body>

<div class="row">
<div class="col-sm-1"></div>

<div class="col-sm-10">
	<form method="POST" enctype="multipart/form-data">
		<div class="mb-3 row">
			<label for="kodeoleh" class="col-sm-2 col-form-label">Kode Oleh-oleh</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="kodeoleh" name="olehkode" placeholder="Input kode oleh-oleh" maxlength="4">
			</div>
		</div>

		<div class="mb-3 row">
			<label for="namaoleh" class="col-sm-2 col-form-label">Nama Oleh-oleh</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="namaoleh" name="olehnama" placeholder="Input nama oleh-oleh">
			</div>
		</div>

		<div class="form-group row">
			<label for="file" class="col-sm-2 col-form-label">Foto Oleh-oleh</label>
			<div class="col-sm-10">
				<input type="file" id="file" name="file">
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<input type="submit" name="Simpan" class="btn btn-secondary" value="Simpan">
				<input type="reset" name="Batal" class="btn btn-success" value="Batal">

			</div>
			
		</div>
		
	</form>

</div>

<div class="col-sm-1"></div>
</div>

<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">Daftar Oleh-oleh Destinasi Wisata</h1>
			</div>
		</div>

	<!-- untuk membuat pencarian data -->
		<form method="POST">
      <div class="form-group row mb-2">
        <label for="search" class="col-sm-3">Kode Oleh-oleh Destinasi</label>
        <div class="col-sm-6">
          <input type="text" name="search" class="form-control" id="search" value="<?php if(isset($_POST["search"])) {echo $_POST ["search"];} ?>" placeholder="Cari kode oleh-oleh destinasi">
        </div>
        <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="search">
      </div>
    </form>
    <!-- akhir dari pencarian -->

	<table class="table table-dark table-striped">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>Kode Oleh-oleh</th>
				<th>Nama Oleh-oleh</th>
				<th>Foto Oleh-oleh</th>
				<th colspan="2" style="text-align: center">Aksi</th>
			</tr>			
		</thead>

		<tbody>
			<?php
			$jumlahtampilan = 3;
            $halaman = (isset($_GET['page']))? $_GET['page'] : 1;
            $mulaitampilan = ($halaman - 1) * $jumlahtampilan;

            $query = mysqli_query($connection, "select * from oleholeh");
			if(isset ($_POST["kirim"]))
			{
  				$search = $_POST["search"];
  				$query = mysqli_query($connection, "select * from oleholeh where olehKODE like '%".$search."%' limit $mulaitampilan, $jumlahtampilan");
  			} else
  				{
  					$query = mysqli_query($connection,"select * from oleholeh limit $mulaitampilan, $jumlahtampilan");
  				}
			$nomor = 1;
			while ($row = mysqli_fetch_array($query))
			{ ?>
				<tr>
					<td><?php echo $mulaitampilan + $nomor;?></td>
					<td><?php echo $row['olehKODE'];?></td>
					<td><?php echo $row['olehNAMA'];?></td>
					<td>
						<?php if(is_file("images/".$row['olehFILE']))
						{ ?>
							<img src="images/<?php echo $row['olehFILE']?>" width="80">
						<?php } else
							echo "<img src='images/noimage.png' width='80'>"
						?>
					</td>

					<td>
						<a href="olehEDIT.php?Edit=<?php echo $row['olehKODE']?>" class="btn btn-success btn-sm" title="EDIT">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
						</a>
					</td>

					<td>
						<a href="olehHAPUS.php?hapus=<?php echo $row['olehKODE']?>" class="btn btn-danger btn-sm" title="DELETE">
<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
						</a>
						
					</td>

				</tr>
			<?php $nomor = $nomor + 1;?>
			<?php }	?>
		</tbody>
		
	</table>
	<?php 
    $query = mysqli_query($connection, "SELECT * FROM destinasi");
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

	<div class="col-sm-1"></div>

	
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