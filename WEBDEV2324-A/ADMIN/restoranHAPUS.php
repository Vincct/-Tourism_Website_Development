<?php
	include "include/config.php";
	if(isset($_GET['hapus']))
	{
		$koderestoran = $_GET['hapus'];
		mysqli_query($connection, "DELETE FROM restoran WHERE restoranKODE = '$koderestoran'");
		echo "<script>alert('DATA BERHASIL DIHAPUS');
			document.location='dashboardrestoran.php'</script>";
	}
?>