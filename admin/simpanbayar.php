<?php

	require("../config/config.default.php");

	require("../config/config.function.php");

	(isset($_SESSION['id_pengawas'])) ? $id_pengawas = $_SESSION['id_pengawas'] : $id_pengawas = 0;

	($id_pengawas==0) ? header('location:login.php'):null;

	if(isset($_POST['no_daftar'])){

		$today = date("Ymd");

		$id=$_POST['no_daftar'];

		// cari id transaksi terakhir yang berawalan tanggal hari ini

		$query = "SELECT max(id_bayar) AS last FROM bayar WHERE id_bayar LIKE '$today%'";

		$hasil = mysqli_query($koneksi,$query);

		$data  = mysqli_fetch_array($hasil);

		$lastNoTransaksi = $data['last'];

		$lastNoUrut = substr($lastNoTransaksi, 8, 4); 

		$nextNoUrut = $lastNoUrut + 1;

		$nextNoTransaksi = $today.sprintf('%04s', $nextNoUrut);

		$tgl=date('Y-m-d');

		$ket="Pembayaran ".$id;

		$exec=mysqli_query($koneksi,"update daftar set status_bayar='1' where no_daftar='$id'");

		$exec=mysqli_query($koneksi,"insert into bayar (id_bayar,no_daftar,nama,jumlah,ket,user)values('$nextNoTransaksi','$id','$_POST[nama]','$_POST[jumlah_bayar]','$_POST[ket]','$id_pengawas')");

		$exec=mysqli_query($koneksi,"insert into bukukas (tanggal,debet,ket,user,id_bayar)values('$tgl','$_POST[jumlah_bayar]','$ket','$id_pengawas','$nextNoTransaksi')");

	}	

?>

	