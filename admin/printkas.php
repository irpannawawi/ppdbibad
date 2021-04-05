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

	

	

	echo "

		<!DOCTYPE html>

		<html>

			<head>

				<title>Bukti Pembayaran</title>

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

					<b>REKAP DATA BUKU KAS PPDB</b><br/>

					

					<b>TAHUN AJARAN 2019/2020</b><br/>

				</div>

				<br/>

												<table class='table table-bordered table-striped'>

													<thead>

														<tr>

															<th width='5px'>#</th>

															<th>Tanggal</th>

															<th>Uraian</th>

															<th>Pemasukan</th>

															<th>Pengeluaran</th>

															

															<th>User</th>

															

														</tr>

													</thead>

													<tbody>

													";

													$kasq = mysqli_query($koneksi,"SELECT * FROM bukukas ");

													while($kas = mysqli_fetch_array($kasq)) {

														

														$nama= mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM pengawas where id_pengawas='$kas[user]'"));

														if($kas['id_bayar']==''){

															$hide="";

														}else{

															$hide="display:none";

														}

														$no++;

														echo "

														<tr>

															<td>$no </td>

															<td>$kas[tanggal]</td>

															<td>$kas[ket]</td>

															<td>" . number_format($kas['debet'],2,',','.')."</td>

															<td>" . number_format($kas['kredit'],2,',','.')."</td>

															

															<td>$nama[nama] </td>

															

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