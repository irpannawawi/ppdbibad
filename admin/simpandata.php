<?php

	require("../config/config.default.php");

	require("../config/config.function.php");

	

		$id=$_POST['no_daftar'];

		

		$exec=mysqli_query($koneksi,"update daftar set nik='$_POST[nik]',nisn='$_POST[nisn]',nama='$_POST[nama]',

							jurusan='$_POST[jurusan]',baju='$_POST[seragam]',jenis_kelamin='$_POST[sex]',

							tempat_lahir='$_POST[tempat]',tanggal_lahir='$_POST[tgllahir]',nama_ibu='$_POST[ibu]',

							nama_ayah='$_POST[ayah]',asal_sekolah='$_POST[asal]',hp='$_POST[nohp]',

							alamat='$_POST[alamat]',kelurahan='$_POST[kelurahan]',kecamatan='$_POST[kecamatan]',daftar_ulang='1',status_santrinya='$_POST[stsantri]',kode_jenissekolah='$_POST[jsk]'

							where no_daftar='$id'");

		

	

?>

	