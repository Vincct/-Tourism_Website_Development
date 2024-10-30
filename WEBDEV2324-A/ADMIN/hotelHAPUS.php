<?php
	include "include/config.php";
	if(isset($_GET['hapus']))
	{
		$hotelkode = $_GET['hapus'];
		mysqli_query($connection, "DELETE FROM hotel WHERE hotelKODE = '$hotelkode'");
		echo "<script>alert('DATA BERHASIL DIHAPUS');
			document.location='dashboardhotel.php'</script>";
	}
?>