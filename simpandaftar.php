<?php

	require("config/config.default.php");

	require("config/config.function.php");

												$carikode = mysqli_query($koneksi,"select max(no_daftar) from daftar") ;

												  $datakode = mysqli_fetch_array($carikode);

												  if ($datakode) {

												   $nilaikode = substr($datakode[0], 3);

												   $kode = (int) $nilaikode;

												   $kode = $kode + 1;

												   $hasilkode = "PSB".str_pad($kode, 3, "0", STR_PAD_LEFT);

												  } else {

												   $hasilkode = "PSB001";

												  }

		$nama=strtoupper($_POST['nama']);

		$tempat=strtoupper($_POST['tempat']);

		$alamat=strtoupper($_POST['alamat']);

		$agama=strtoupper($_POST['agama']);

		$kel=strtoupper($_POST['kel']);

		$kec=strtoupper($_POST['kec']);

		$sekolahlain=strtoupper($_POST['txtOther']);

				

		$exec=mysqli_query($koneksi,"insert into daftar (no_daftar,nama,jurusan,asal_sekolah,nik,jenis_kelamin,tempat_lahir,tanggal_lahir,alamat,nisn,agama,jenis_daftar,hp,kelurahan,kecamatan,sekolah_lain,status_sekolah,kode_jenissekolah) 

							values ('$hasilkode','$nama','$_POST[jurusan]','$_POST[asal]','$_POST[nik]','$_POST[namajk]','$tempat',

							'$_POST[tgl_lahir]','$alamat','$_POST[nisn]','$agama','online','$_POST[nohp]','$kel','$kec','$sekolahlain','$_POST[stats]','$_POST[jssekol]')");

		

	

?>

	