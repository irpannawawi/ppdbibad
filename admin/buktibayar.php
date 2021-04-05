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

	$jalurdaftar=mysqli_fetch_array(mysqli_query($koneksi,"select * from jurusan where kode_jur='$daftar[jurusan]'"));

	$statusdaftar=mysqli_fetch_array(mysqli_query($koneksi,"select * from seragam where kode_seragam='$daftar[baju]'"));

	$sekolah=mysqli_fetch_array(mysqli_query($koneksi,"select * from mou where kode_mou='$daftar[asal_sekolah]'"));

	$buktitransfer=mysqli_fetch_array(mysqli_query($koneksi,"select * from gambar_transfer where no_daftar='$daftar[no_daftar]'"));

	

	echo "

		<!DOCTYPE html>

		<html>

			<head>

				<title>Bukti Pendaftaran</title>

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

					<b>BUKTI PPDB</b><br/>

					

					<b>TAHUN AJARAN 2020/2021</b><br/>

				</div>

				<br/>

				<div align='center'>

				<img class='img img-responsive' src='$homeurl/$buktitransfer[file]' style='max-height:100px'/>

				

					

				</div>

				

				<br/>

				<p><b> A. DATA PESERTA DIDIK</b></p>

													<table class='table table-striped table-condensed' >

                                                      <tbody>

													  <tr align='center'><td colspan='4'><b><font color='red'>DATA DIRI SISWA</font></b></td></tr>

                                                          <tr><th scope='row'>No Pendaftaran</th> <td>:</td><td>$daftar[no_daftar]</td></tr>

														<tr><th scope='row'>NIK / NISN</th><td>:</td> <td>$daftar[nik] / $daftar[nisn]</td></tr>

                                                        <tr><th scope='row'>Nama Lengkap</th><td>:</td> <td>$daftar[nama]</td></tr>

                                                        <tr><th scope='row'>Tempat, Tanggal Lahir</th> <td>:</td><td>$daftar[tempat_lahir], $daftar[tanggal_lahir]</td></tr>

                                                        <tr><th scope='row'>No Registrasi Akta Lahir</th> <td>:</td><td>$daftar[noreg_akta]</td></tr>

														<tr><th scope='row'>Jenis Kelamin</th> <td>:</td><td>$daftar[jenis_kelamin]</td></tr>

														<tr><th scope='row'>Agama</th> <td>:</td><td>$daftar[agama]</td></tr>

														<tr><th scope='row'>Hobi</th> <td>:</td><td>$daftar[hobi]</td></tr>

														<tr><th scope='row'>Cita Cita</th> <td>:</td><td>$daftar[citacita]</td></tr>

														<tr><th scope='row'>Jarak dri sekolah</th> <td>:</td><td>$daftar[jarak] KM</td></tr>

														<tr><th scope='row'>Alamat</th> <td>:</td><td>$daftar[alamat]</td></tr>

														<tr><th scope='row'>Alamat yg mdh dihubungi</th> <td>:</td><td>$daftar[alamat_dua]</td></tr>

														<tr><th scope='row'>Kelurahan</th> <td>:</td><td>$daftar[kelurahan]</td></tr>

														<tr><th scope='row'>Kecamatan</th> <td>:</td><td>$daftar[kecamatan]</td></tr>

														<tr><th scope='row'>Kabupaten</th> <td>:</td><td>$daftar[kota]</td></tr>

														<tr><th scope='row'>Provinsi</th> <td>:</td><td>$daftar[provinsi]</td></tr>

														<tr><th scope='row'>No HP</th> <td>:</td><td>$daftar[hp]</td></tr>

														<tr align='center'><td colspan='4'><b><font color='red'>DATA ASAL SEKOLAH</font></b></td></tr>

														<tr><th scope='row'>No Ijazah</th> <td>:</td><td>$daftar[no_ijazah]</td></tr>

														<tr><th scope='row'>Asal Sekolah</th> <td>:</td><td>$sekolah[sekolah_mou]$daftar[sekolah_lain]</td></tr>

														<tr><th scope='row'>Status Sekolah</th> <td>:</td><td>$daftar[status_sekolah]</td></tr>

														<tr><th scope='row'>NPSN Sekolah Asal</th> <td>:</td><td>$daftar[npsn_sekolah_asal]</td></tr>

														<tr><th scope='row'>NSS Sekolah Asal</th> <td>:</td><td>$daftar[nss_sekolah]</td></tr>

														<tr><th scope='row'>KAB Sekolah Asal</th> <td>:</td><td>$daftar[kab_sekolah_asal]</td></tr>

													</tbody>

                                                    </table>

													<br />

													<br />

													<table class='table table-striped table-condensed' >

                                                      <tbody>

														<tr align='center'><td colspan='4'><b><font color='red'>DATA ORTU SISWA</font></b></td></tr>

														<tr><th scope='row'>NO KK</th> <td>:</td><td>$daftar[no_kk]</td></tr>

														<tr><th scope='row'>NIK Ayah</th> <td>:</td><td>$daftar[nik_ayah]</td></tr>

														<tr><th scope='row'>Nama Ayah</th> <td>:</td><td>$daftar[nama_ayah]</td></tr>

														<tr><th scope='row'>Pekerjaan Ayah</th> <td>:</td><td>$daftar[pekerjaan_ayah]</td></tr>

														<tr><th scope='row'>NIK Ibu</th> <td>:</td><td>$daftar[nik_ibu]</td></tr>

														<tr><th scope='row'>Nama Ibu</th> <td>:</td><td>$daftar[nama_ibu]</td></tr>

														<tr><th scope='row'>Nama Kecil Ibu</th> <td>:</td><td>$daftar[nama_kecil_ibu]</td></tr>

														<tr><th scope='row'>Pekerjaan Ibu</th> <td>:</td><td>$daftar[pekerjaan_ibu]</td></tr>

														<tr><th scope='row'>Alamat Ortu</th> <td>:</td><td>$daftar[alamat_ortu]</td></tr>

														<tr><th scope='row'>Nama Wali</th> <td>:</td><td>$daftar[nama_wali]</td></tr>

														<tr><th scope='row'>Alamat Wali</th> <td>:</td><td>$daftar[alamat_wali]</td></tr>

														<tr align='center'><td colspan='4'><b><font color='red'>PENDAFTARAN</font></b></td></tr>

                                                        <tr><th scope='row'>Pilihan Daftar</th> <td>:</td><td>$jalurdaftar[nama_jur]</td></tr>

                                                        <tr><th scope='row'>Status Pendaftaran</th> <td>:</td><td>$statusdaftar[ukuran_seragam]</td></tr>

                                                        <tr><th scope='row'>Tanggal Pendaftaran</th> <td>:</td><td>$daftar[tgl_daftar]</td></tr>

														<tr align='center'><td colspan='4'><b><font color='red'>DATA KARTU INDONESIA PINTAR</font></b></td></tr>

														<tr><th scope='row'>Usulan Dari Sekolah Layak PIP</th> <td>:</td><td>$daftar[usulan_pip]</td></tr>

															<tr><th scope='row'>Penerima KIP</th> <td>:</td><td>$daftar[penerima_kip]</td></tr>

															<tr><th scope='row'>No KIP</th> <td>:</td><td>$daftar[no_kip]</td></tr>		

															<tr><th scope='row'>Nama Tertera di KIP</th> <td>:</td><td>$daftar[tertera_kip]</td></tr>				

															<tr><th scope='row'>Terima Fisik Kartu KIP</th> <td>:</td><td>$daftar[terima_kip]</td></tr>		

															<tr><th scope='row'>Alasan PIP</th> <td>:</td><td>$daftar[alasan_pip]</td></tr>	

															<tr align='center'><td colspan='4'><b><font color='red'>DATA KKS & KPS</font></b></td></tr>

															<tr><th scope='row'>NO KKS</th> <td>:</td><td>$daftar[no_kks]</td></tr>

															<tr><th scope='row'>Penerima KPS/PKH</th> <td>:</td><td>$daftar[penerima_kps]</td></tr>

															<tr><th scope='row'>No KPS/PKH</th> <td>:</td><td>$daftar[no_kps]</td></tr>		

														

                                                      </tbody>

                                                    </table>

				<br />

				<br />

				<br />

				<br />

				<br />

				<br />

				<br />

				<br />

				<br />

				<br />

				<br />

				<br />

				<br />

				<br />

				<br />

				<br />

				<br />

				<br />

				<br />

				<br />

			

				<p><b> B. RIWAYAT PEMBAYARAN DAFTAR ULANG</b></p>

														<table class='table table-bordered table-striped'>

															<thead>

																<tr>

																	<th width='5px'>#</th>

																	<th>No Pendaftaran</th>

																	<th>Nama Lengkap</th>

																	<th>Jumlah Bayar</th>

																	<th>Tanggal Bayar</th>

																	

																	

																</tr>

															</thead>

															<tbody>

															";

															$pendaftarQ = mysqli_query($koneksi,"SELECT * FROM bayar where no_daftar='$id' ORDER BY date DESC");

															while($pendaftar = mysqli_fetch_array($pendaftarQ)) {

																$no++;

																echo "

																<tr>

																	<td>$no </td>

																	<td>$pendaftar[no_daftar]</td>

																	<td>$pendaftar[nama]</td>

																	<td>Rp. " . number_format($pendaftar['jumlah'],2,',','.')."</td>

																	<td>$pendaftar[date] </td>

																	

																	

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

				<p>*Bukti pendaftaran siswa untuk arsip sekolah jangan sampai hilang </p>

				

			</body>

		</html>

	";

?>