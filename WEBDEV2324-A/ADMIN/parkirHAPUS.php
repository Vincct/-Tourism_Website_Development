<?php
	include "include/config.php";
	if(isset($_GET['hapus']))
	{
		$kodeparkir = $_GET['hapus'];
		mysqli_query($connection, "DELETE FROM parkir WHERE parkirKODE = '$kodeparkir'");
		echo "<script>alert('DATA BERHASIL DIHAPUS');
			document.location='parkir.php'</script>";
	}
?>