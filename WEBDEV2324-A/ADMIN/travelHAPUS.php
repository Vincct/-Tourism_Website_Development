<?php
	include "include/config.php";
	if(isset($_GET['hapus']))
	{
		$kodetravel = $_GET['hapus'];
		mysqli_query($connection, "DELETE FROM travel WHERE travelKODE = '$kodetravel'");
		echo "<script>alert('DATA BERHASIL DIHAPUS');
			document.location='dashboardtravel.php'</script>";
	}
?>