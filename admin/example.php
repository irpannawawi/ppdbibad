<?php
require("../config/config.default.php");
	require("../config/config.function.php");
	require("../config/functions.crud.php");
// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

header('Content-Type: application/json');
if(isset($_GET['pg'])) {
	
$input = filter_input_array(INPUT_POST);
	$pg = $_GET['pg'];
	if($pg=='jurusan') {
		if ($input['action'] === 'edit') {
			mysqli_query($koneksi,"UPDATE jurusan SET nama_jur='" . $input['namajurusan'] . "' WHERE kode_jur='" . $input['id'] . "'");
		} else if ($input['action'] === 'delete') {
			mysqli_query($koneksi,"delete from  jurusan WHERE kode_jur='" . $input['id'] . "'");
			
		} 
	}
	
	if($pg=='mou') {
		if ($input['action'] === 'edit') {
			mysqli_query($koneksi,"UPDATE mou SET sekolah_mou ='" . $input['sekolah'] . "',status ='" . $input['status'] . "' WHERE kode_mou='" . $input['id'] . "'");
		} else if ($input['action'] === 'delete') {
			mysqli_query($koneksi,"delete from  mou WHERE kode_mou='" . $input['id'] . "'");
		} 
	}
	
	if($pg=='kelas') {
		if ($input['action'] === 'edit') {
			mysqli_query($koneksi,"UPDATE kelas SET nama='" . $input['namakelas'] . "' WHERE id_kelas='" . $input['id'] . "'");
		} else if ($input['action'] === 'delete') {
			mysqli_query($koneksi,"delete from  kelas WHERE id_kelas='" . $input['id'] . "'");
		} 
	}
	
	if($pg=='biaya') {
		if ($input['action'] === 'edit') {
			mysqli_query($koneksi,"UPDATE biaya SET nama_biaya='" . $input['namabiaya'] . "',jumlah='" . $input['jumlah'] . "' WHERE kode_biaya='" . $input['id'] . "'");
		} else if ($input['action'] === 'delete') {
			mysqli_query($koneksi,"delete from  biaya WHERE kode_biaya='" . $input['id'] . "'");
		} 
	}
	if($pg=='ruang') {
		if ($input['action'] === 'edit') {
			mysqli_query($koneksi,"UPDATE ruang SET keterangan='" . $input['namaruang'] . "' WHERE kode_ruang='" . $input['id'] . "'");
		} else if ($input['action'] === 'delete') {
			mysqli_query($koneksi,"delete from ruang WHERE kode_ruang='" . $input['id'] . "'");
		} 
	}
	if($pg=='sesi') {
		if ($input['action'] === 'edit') {
			mysqli_query($koneksi,"UPDATE sesi SET nama_sesi='" . $input['namasesi'] . "' WHERE kode_sesi='" . $input['id'] . "'");
		} else if ($input['action'] === 'delete') {
			mysqli_query($koneksi,"delete from sesi WHERE kode_sesi='" . $input['id'] . "'");
		} 
	}
	if($pg=='jnssekolah') {
		if ($input['action'] === 'edit') {
			mysqli_query($koneksi,"UPDATE jenis_sekolah SET nama_jenissekolah='" . $input['namajsekolah'] . "' WHERE id_jenissekolah='" . $input['id'] . "'");
		} else if ($input['action'] === 'delete') {
			mysqli_query($koneksi,"delete from jenis_sekolah WHERE id_jenissekolah='" . $input['id'] . "'");
		} 
	}
	if($pg=='jkelamin') {
		if ($input['action'] === 'edit') {
			mysqli_query($koneksi,"UPDATE sex SET jenis_kelamin='" . $input['namakelamin'] . "' WHERE kode_kelamin='" . $input['id'] . "'");
		} else if ($input['action'] === 'delete') {
			mysqli_query($koneksi,"delete from sex WHERE kode_kelamin='" . $input['id'] . "'");
		} 
	}
	if($pg=='kelambi') {
		if ($input['action'] === 'edit') {
			mysqli_query($koneksi,"UPDATE seragam SET ukuran_seragam='" . $input['namaser'] . "' WHERE kode_seragam='" . $input['id'] . "'");
		} else if ($input['action'] === 'delete') {
			mysqli_query($koneksi,"delete from seragam WHERE kode_seragam='" . $input['id'] . "'");
		} 
	}
	if($pg=='statussantri') {
			if ($input['action'] === 'edit') {
				mysqli_query($koneksi,"UPDATE santristatus SET nama_status='" . $input['namastatusnya'] . "' WHERE kode_status='" . $input['id'] . "'");
			} else if ($input['action'] === 'delete') {
				mysqli_query($koneksi,"delete from santristatus WHERE kode_status='" . $input['id'] . "'");
			} 
		}	
	
}
echo json_encode($input);

