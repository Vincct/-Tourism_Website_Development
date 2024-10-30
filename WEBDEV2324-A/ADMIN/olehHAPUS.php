<?php
	include "include/config.php";
	if(isset($_GET['hapus']))
	{
		$olehkode = $_GET['hapus'];
		mysqli_query($connection, "DELETE FROM oleholeh WHERE olehKODE = '$olehkode'");
		echo "<script>alert('DATA BERHASIL DIHAPUS');
			document.location='dashboardoleh.php'</script>";
	}
?>