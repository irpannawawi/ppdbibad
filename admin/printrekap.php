<?php

	require("../config/config.default.php");

	require("../config/config.function.php");

	require("../config/functions.crud.php");

	require("../config/dis.php");

	(isset($_SESSION['id_pengawas'])) ? $id_pengawas = $_SESSION['id_pengawas'] : $id_pengawas = 0;

	($id_pengawas==0) ? header('location:login.php'):null;

	error_reporting(0);

	

	$pengawas = fetch('pengawas',array('id_pengawas'=>$id_pengawas));

	$id=$_GET['id'];

	$daftar=mysqli_fetch_array(mysqli_query($koneksi,"select * from daftar where no_daftar='$id'"));

	$sekolah=mysqli_fetch_array(mysqli_query($koneksi,"select * from mou where kode_mou='$daftar[asal_sekolah]'"));

	

	echo "

		<!DOCTYPE html>

		<html>

			<head>

				<title>Bukti Print</title>

				<style>

					* { margin:auto; padding:0; line-height:100%; }

					body { max-width:793.700787402px; }

					td { padding:1px 3px 1px 3px; }

					.garis { border:1px solid #000; border-left:0px; border-right:0px; padding:1px; margin-top:5px; margin-bottom:5px; }

				</style>

				<link rel='stylesheet' href='$homeurl/plugins/bootstrap/css/bootstrap.css'/>

			</head>

			<body>

				<table border='0' width='793.700787402px' align='center' cellspacing='0' cellpadding='0'>

					<tr>

						<td align='left'><img src='$homeurl/$setting[logo]' width='90px'/></td>

						<td align='center' valign='top'>

							<font size=+2><b>$setting[header]</b></font><br/>

							<font size=+3><b>$setting[sekolah]</b></font><br/>

							<small>$setting[alamat] &nbsp; </small>

							<small><i>Email: $setting[email] &nbsp; Web: $setting[web]</i></small><br/>

						</td>

						<td align='right'></td>

					</tr>

				</table>

				<div class='garis'></div>

				

				<div align='center'>

					<b>REKAP DATA SISWA SUDAH DAFTAR ULANG</b><br/>

					

					<b>TAHUN AJARAN 2020/2021</b><br/>

				</div>

				<br/>

				<p><b> A. DATA PESERTA DIDIK</b></p>

													<table class='table table-bordered table-striped'>

													<thead>

														<tr>

															<th width='5px'>#</th>

															<th>No Daftar</th>

															<th>Nama Lengkap</th>

															<th>Asal Sekolah</th>

															

															<th>Sudah Bayar</th>

															

															<th width=60px>Status</th>

															

														</tr>

													</thead>

													<tbody>

													";

													$pendaftarQ = mysqli_query($koneksi,"SELECT * FROM daftar  where daftar_ulang='1' and status_bayar='1' ORDER BY no_daftar ASC");

													

													while($pendaftar = mysqli_fetch_array($pendaftarQ)) {

														$query=mysqli_fetch_array(mysqli_query($koneksi,"select *,SUM(jumlah) from bayar where no_daftar='$pendaftar[no_daftar]'"));

														$query2=mysqli_fetch_array(mysqli_query($koneksi,"select *,SUM(jumlah) from biaya"));

														$sekolah=mysqli_fetch_array(mysqli_query($koneksi,"select * from mou where kode_mou='$pendaftar[asal_sekolah]'"));

														$sudahbayar=$query['SUM(jumlah)'];

														$totalbiaya=$query2['SUM(jumlah)'];

														$sisa=$totalbiaya-$sudahbayar;

														$no++;

														echo "

														<tr>

															<td>$no </td>

															<td>$pendaftar[no_daftar]</td>

															<td>$pendaftar[nama]</td>

															<td>$sekolah[sekolah_mou]$pendaftar[sekolah_lain] </td>

															

															<td>Rp. " . number_format($sudahbayar,2,',','.')."</td>

															

															<td>";

															if($sudahbayar>=$totalbiaya){

															$dis='disabled';

															 echo "<small class='label label-success'><i class='fa fa-check'></i>Sudah lunas</small> ";

															}else{

																$dis='';

															 echo "<small class='label label-danger'><i class='fa fa-times'></i> belum lunas</small> ";	

															}

															echo "

															</td>

															

														</tr>";

													}

													echo "

													</tbody>

												</table>

				<br>

				<table border='0' width='793.700787402px' align='center' cellspacing='0' cellpadding='0'>

					<tr>

						<td>

							

						</td>

						<td width='230px'>

							$setting[kota], ".buat_tanggal('d M Y')."<br/>

							Panitia PPDB<br/>

							<br/>

							<br/>

							<br/>

							<br/>

							<br/>

							<u>$pengawas[nama]</u><br/>

							$pengawas[nip]

						</td>

					</tr>

				</table>

				

			</body>

		</html>

	";

?>