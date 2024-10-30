<?php
	include "include/config.php";
	if(isset($_GET['hapus']))
	{
		$inputKategoriKode = $_GET['hapus'];
		mysqli_query($connection, "DELETE FROM kategoriwisata WHERE kategoriKODE = '$inputKategoriKode'");
		echo "<script>alert('DATA BERHASIL DIHAPUS');
			document.location='dashboardkategori.php'</script>";
	}
?>