<?php

	require("../config/config.default.php");

	require("../config/config.function.php");

	(isset($_SESSION['id_pengawas'])) ? $id_pengawas = $_SESSION['id_pengawas'] : $id_pengawas = 0;

	($id_pengawas==0) ? header('location:login.php'):null;

	if(isset($_POST['id'])){

		$id=$_POST['id'];

		

		$exec=mysqli_query($koneksi,"delete from bayar where id_bayar='$id'");

		$exec=mysqli_query($koneksi,"delete from bukukas where id_bayar='$id'");

		

	}	

?>

	