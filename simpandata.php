<?php

	require("config/config.default.php");

	require("config/config.function.php");

	if(isset($_GET['pg'])) {

	$id=$_GET['id'];

	$pg = $_GET['pg'];

		if($pg=='simpanprofil') {

		$exec=mysqli_query($koneksi,"update daftar set nama='$_POST[nama]',nik='$_POST[nik]',nisn='$_POST[nisn]',tempat_lahir='$_POST[tempat]',

							tanggal_lahir='$_POST[tgl_lahir]',jenis_kelamin='$_POST[namajk]',anak_ke='$_POST[anakke]',saudara='$_POST[saudara]',

								tinggi='$_POST[tinggi]',berat='$_POST[berat]',noreg_akta='$_POST[noregakta]',hobi='$_POST[hobi]',citacita='$_POST[cta]',no_kks='$_POST[nokks]',penerima_kps='$_POST[penerimakps]',no_kps='$_POST[nokps]' where no_daftar='$id'");

		}

		if($pg=='simpanalamat') {

		$exec=mysqli_query($koneksi,"update daftar set alamat='$_POST[alamat]',rt='$_POST[rt]',kelurahan='$_POST[kel]',kecamatan='$_POST[kec]',

							alat_transportasi='$_POST[transportasi]',jenis_tinggal='$_POST[jenis_tinggal]',jarak='$_POST[jarak]',kota='$_POST[kota]',provinsi='$_POST[provinsi]',

								waktu_tempuh='$_POST[waktu]',alamat_dua='$_POST[alamatmudah]' where no_daftar='$id'");

		}

		if($pg=='simpanortu') {

		$exec=mysqli_query($koneksi,"update daftar set 

							nama_ayah='$_POST[nama_ayah]',tahun_lahir_ayah='$_POST[tahun_ayah]',pekerjaan_ayah='$_POST[pekerjaan_ayah]',pendidikan_ayah='$_POST[pendidikan_ayah]',penghasilan_ayah='$_POST[penghasilan_ayah]',

							nama_ibu='$_POST[nama_ibu]',tahun_lahir_ibu='$_POST[tahun_ibu]',pekerjaan_ibu='$_POST[pekerjaan_ibu]',pendidikan_ibu='$_POST[pendidikan_ibu]',penghasilan_ibu='$_POST[penghasilan_ibu]',nama_kecil_ibu='$_POST[nama_kecil_ibu]',alamat_ortu='$_POST[alamatortu]',nama_wali='$_POST[namawali]',pekerjaan_wali='$_POST[pekerjaan_wali]',alamat_wali='$_POST[alamat_wali]',no_kk='$_POST[no_kk]',nik_ayah='$_POST[nik_ayah]',nik_ibu='$_POST[nik_ibu]'

								 where no_daftar='$id'");

		}

		if($pg=='simpansekolah') {

		$exec=mysqli_query($koneksi,"update daftar set 

							npsn_sekolah_asal='$_POST[npsnsd]',kab_sekolah_asal='$_POST[kabsd]',nopes_ujian='$_POST[nopes]',no_ijazah='$_POST[ijazah]',skhun='$_POST[skhun]',nss_sekolah='$_POST[nss]'

								 where no_daftar='$id'");

		}

		if($pg=='simpankip') {

		$exec=mysqli_query($koneksi,"update daftar set 

							usulan_pip='$_POST[usulpip]',penerima_kip='$_POST[penerimakipp]',no_kip='$_POST[nokip]',tertera_kip='$_POST[naterkip]',terima_kip='$_POST[terimakipp]',alasan_pip='$_POST[alasanpipp]'

								 where no_daftar='$id'");

		}

	}

?>

	