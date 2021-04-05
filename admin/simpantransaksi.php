<?php

	require("../config/config.default.php");

	require("../config/config.function.php");

	(isset($_SESSION['id_pengawas'])) ? $id_pengawas = $_SESSION['id_pengawas'] : $id_pengawas = 0;

	($id_pengawas==0) ? header('location:login.php'):null;

	if(isset($_POST['jenis'])){

		$ket=$_POST['ket'];

		$tgl=date('Y-m-d');

		if($_POST['jenis']=='debet'){

			$exec=mysqli_query($koneksi,"insert into bukukas (tanggal,debet,ket,user)values('$tgl','$_POST[jumlah]','$ket','$id_pengawas')");

		}else{

			$exec=mysqli_query($koneksi,"insert into bukukas (tanggal,kredit,ket,user)values('$tgl','$_POST[jumlah]','$ket','$id_pengawas')");

		}

	}	

?>

	