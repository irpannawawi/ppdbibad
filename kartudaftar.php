<?php

	require("./config/config.default.php");

	require("./config/config.function.php");

	require("./config/functions.crud.php");

	require("./config/dis.php");

(isset($_SESSION['no_daftar']));

	$no_daftar=$_SESSION['no_daftar'];

	$siswa = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM daftar  WHERE no_daftar='$_SESSION[no_daftar]'"));

	$sekolah=mysqli_fetch_array(mysqli_query($koneksi,"select * from mou where kode_mou='$siswa[asal_sekolah]'"));

	$statusdaftar=mysqli_fetch_array(mysqli_query($koneksi,"select * from seragam where kode_seragam='$siswa[baju]'"));

	$jurusannama=mysqli_fetch_array(mysqli_query($koneksi,"select * from jurusan where kode_jur='$siswa[jurusan]'"));

	$buktitransfer=mysqli_fetch_array(mysqli_query($koneksi,"select * from gambar_transfer where no_daftar='$siswa[no_daftar]'"));

	(isset($_GET['pg'])) ? $pg = $_GET['pg'] : $pg = '';

	(isset($_GET['ac'])) ? $ac = $_GET['ac'] : $ac = '';

	

	echo "

		<!DOCTYPE html>

		<html>

			<head>

				<title>Bukti Daftar</title>

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

					<b>BUKTI PENDAFTARAN PPDB ONLINE</b><br/>

					

					<b>TAHUN AJARAN 2020/2021</b><br/>

				</div>

				<br/>

								

				<div align='center'>

				<img class='img img-responsive' src='$homeurl/$buktitransfer[file]' style='max-height:100px'/>

					NO PENDAFTARAN :<font color='red'><b> $siswa[no_daftar]</b></font><br/>

					

				</div>

				

				<br/>

				<p><b> A. DATA CALON PESERTA DIDIK</b></p>

													<table class='table table-striped table-condensed' >

                                                      <tbody>

                                                        <tr><th scope='row'>1. NAMA LENGKAP</th><td>:</td> <td>$siswa[nama]</td></tr>

														<tr><th scope='row'>2. JENIS KELAMIN</th><td>:</td> <td>$siswa[jenis_kelamin]</td></tr>

                                                        <tr><th scope='row'>3. TEMPAT/TGL LAHIR</th><td>:</td> <td>$siswa[tempat_lahir], $siswa[tanggal_lahir]</td></tr>

                                                        <tr><th scope='row'>4. ASAL SEKOLAH</th><td>:</td> <td>$sekolah[sekolah_mou]$siswa[sekolah_lain]</td></tr>

														<tr><th scope='row'>5. STATUS SEKOLAH</th><td>:</td> <td>$siswa[status_sekolah]</td></tr>

														<tr><th scope='row'>6. NISN</th><td>:</td> <td>$siswa[nisn]</td></tr>

														<tr><th scope='row'>7. NAMA ORANG TUA :</th><td>

														<tr><th scope='row'>Nama Ayah</th><td>:</td> <td>$siswa[nama_ayah]</td><th scope='row'>Pekerjaan</th><td>:</td> <td>$siswa[pekerjaan_ayah]</td></tr>

														<tr><th scope='row'>Nama Ibu</th><td>:</td> <td>$siswa[nama_ibu]</td><th scope='row'>Pekerjaan</th><td>:</td> <td>$siswa[pekerjaan_ibu]</td></tr>

														<tr><th scope='row'>Nama Kecil Ibu</th><td>:</td> <td>$siswa[nama_kecil_ibu]</td>

														<tr><th scope='row'>Alamat Orang Tua</th><td>:</td> <td>$siswa[alamat_ortu]</td>

														<tr><th scope='row'>Nama Wali</th><td>:</td> <td>$siswa[nama_wali]</td><tr><th scope='row'>Pekerjaan</th><td>:</td> <td>$siswa[pekerjaan_wali]</td></tr>

														<tr><th scope='row'>Alamat Wali</th><td>:</td> <td>$siswa[alamat_wali]</td></tr>

														<tr><th scope='row'>8. Alamat Calon Siswa</th><td>:</td> <td>$siswa[alamat]</td></tr>

														<tr><th scope='row'>9. NO. TELP/HP HP</th><td>:</td> <td>$siswa[hp]</td></tr>

														<tr><th scope='row'>10.Alamat Yang Mudah Dihubungi</th><td>:</td> <td>$siswa[alamat_dua]</td></tr>

														

                                                        <tr><th scope='row'>PILIHAN DAFTAR</th><td>:</td> <td>$jurusannama[nama_jur]</td></tr>

                                                      </tbody>

                                                    </table>

				<div class='garis'></div>

				

				<br>

				<table>

					<tr>

						<td>

							

						</td>

						<td width='400px'>

						<br/>

							Petugas Pendaftaran<br/>

							<br/>

							<br/>

							<br/>

							.............................

							

						</td><td width='400px' align='right'>

							$setting[kota], ".buat_tanggal('d M Y')."<br/>

							Calon Siswa<br/>

							<br/>

							<br/>

							<br/>

							$siswa[nama]

							

						</td>

					</tr>

				</table>

				

			</body>

		</html>

	";

?>