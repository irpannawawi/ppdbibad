<?php

function enkripsi( $string )
{
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'abcdefghijklmnopqrstuvwxyzABNCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_+|}{:?><';
    $secret_iv = 'abcdefghijklmnopqrstuvwxyzABNCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_+|}{:?><';

    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);

    return $output;
}

function dekripsi($string)
{
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'abcdefghijklmnopqrstuvwxyzABNCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_+|}{:?><';
    $secret_iv = 'abcdefghijklmnopqrstuvwxyzABNCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_+|}{:?><';

    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);

    return $output;
}		
    session_cache_expire(0);
    session_cache_limiter(0);
	session_start();
	set_time_limit(0);
	date_default_timezone_set('Asia/Jakarta');
	(isset($_SESSION['id_user'])) ? $id_user = $_SESSION['id_user'] : $id_user = 0;
	
	//$ref = $_SERVER['HTTP_REFERER'];

	(isset($_SERVER['HTTP_REFERER'])) ? $ref = $_SERVER['HTTP_REFERER']:$ref=null;
	$uri = $_SERVER['REQUEST_URI'];
	$pageurl = explode("/",$uri);
$homeurl = "https://".$_SERVER['HTTP_HOST'];
		
(isset($pageurl[1])) ? $pg = $pageurl[1] : $pg = '';
		
(isset($pageurl[2])) ? $ac = $pageurl[2] : $ac = '';
		
(isset($pageurl[3])) ? $id = $pageurl[3] : $id = 0;
		/**
		$homeurl = "http://".$_SERVER['HTTP_HOST'];
		(isset($pageurl[1])) ? $pg = $pageurl[1] : $pg = '';
		(isset($pageurl[2])) ? $ac = $pageurl[2] : $ac = '';
		(isset($pageurl[3])) ? $id = $pageurl[3] : $id = 0;
		*/

	
	$host = 'localhost';
	$user = 'root';
	$pass = 'Penirahayu3';
	$debe = 'ppdbibad';
	

	$koneksi=mysql_connect($host,$user,$pass) or die(mysql_error());
	mysql_select_db($debe);
	
	$no = $jam = $mnt = $dtk = 0;
	$info = '';
	$waktu = date('H:i:s');
	$tanggal = date('Y-m-d');
	$datetime = date('Y-m-d H:i:s');
	
	$setting = mysql_fetch_array(mysql_query("SELECT * FROM setting WHERE id_setting='1'"));
	$sess = mysql_fetch_array(mysql_query("SELECT * FROM session WHERE id='1'"));
	$sql = "select * from daftar";
	// print_r(mysql_fetch_array(mysql_query($sql)));				
?>