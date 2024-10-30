<?php
	include "include/config.php";
	if(isset($_GET['hapus']))
	{
		$inputKategoriKode = $_GET['hapus'];
		mysqli_query($connection, "DELETE FROM berita WHERE kategoriberitaKODE = '$inputKategoriKode'");
		echo "<script>alert('DATA BERHASIL DIHAPUS');
			document.location='dashboardkategoriberita.php'</script>";
	}
?>