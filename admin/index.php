<?php
	require("../config/config.default.php");
	require("../config/config.function.php");
	require("../config/functions.crud.php");
	// require("../config/excel_reader.php");

	(isset($_SESSION['id_pengawas'])) ? $id_pengawas = $_SESSION['id_pengawas'] : $id_pengawas = 0;
	($id_pengawas==0) ? header('location:login.php'):null;
	$pengawas = mysql_fetch_array(mysql_query("SELECT * FROM pengawas  WHERE id_pengawas='$id_pengawas'"));
	
	(isset($_GET['pg'])) ? $pg = $_GET['pg'] : $pg = '';
	(isset($_GET['ac'])) ? $ac = $_GET['ac'] : $ac = '';
	
	$q=mysql_query("SELECT * FROM daftar");
// print_r(mysql_fetch_array($q));die();
						$daftar = mysql_num_rows(mysql_query("SELECT * FROM daftar"));
							$daftarulang = mysql_num_rows(mysql_query("SELECT * FROM daftar where daftar_ulang='1' and status_bayar='1'"));
							$siswa = mysql_fetch_array(mysql_query("SELECT *,SUM(jumlah) FROM bayar"));
							$jalurdaftar=mysql_fetch_array(mysql_query("select * from jurusan where kode_jur='$daftar[jurusan]'"));
							//$jskol=mysql_fetch_array(mysql_query("select * from jenis_sekolah where id_jenissekolah='$daftar[kode_jenissekolah]'"));

echo "
							
<!DOCTYPE html>
		<html>
			<head>
  				<meta charset='utf-8'>
 				<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  				<title>Administrator | $setting[aplikasi]</title>
  				<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
				 <link href='https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext' rel='stylesheet'>
				<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet' >
  				<link rel='shortcut icon' href='$homeurl/favicon.png' type='image/x-icon'/>
				
				<link rel='stylesheet' href='$homeurl/plugins/bootstrap/css/bootstrap.css'/>
				<link rel='stylesheet' href='$homeurl/plugins/bootstrap-select/css/bootstrap-select.css'/>
				<link rel='stylesheet' href='$homeurl/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css'/>
				<link rel='stylesheet' href='$homeurl/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css'/>
				<link rel='stylesheet' href='$homeurl/plugins/node-waves/waves.css'/>
				<link rel='stylesheet' href='$homeurl/plugins/animate-css/animate.css'/>
				<link rel='stylesheet' href='$homeurl/css/style.css'/>
				<link rel='stylesheet' href='$homeurl/css/themes/all-themes.css'/>
				<link rel='stylesheet' href='$homeurl/plugins/sweetalert2/dist/sweetalert2.min.css'>
				<link rel='stylesheet' href='$homeurl/scss/font-awesome-4.7.0/css/font-awesome.min.css'/>
				<link rel='stylesheet' href='$homeurl/css/lightbox-master/dist/ekko-lightbox.css'/>
				<script src='$homeurl/plugins/tinymce/tinymce.min.js'></script>

<body class='theme-red'>
    <!-- Page Loader -->
    <div class='page-loader-wrapper'>
        <div class='loader'>
            <div class='preloader'>
                <div class='spinner-layer pl-red'>
                    <div class='circle-clipper left'>
                        <div class='circle'></div>
                    </div>
                    <div class='circle-clipper right'>
                        <div class='circle'></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class='overlay'></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class='navbar'>
        <div class='container-fluid'>
            <div class='navbar-header'>
               
                <a href='javascript:void(0);' class='bars'></a>
                <a class='navbar-brand' href='?'><image src='$homeurl/$setting[logo]' style='margin-top:-15px;' height='40px'></a>
            </div>
            <div class='collapse navbar-collapse' id='navbar-collapse'>
                <ul class='nav navbar-nav navbar-right'>
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id='leftsidebar' class='sidebar'>
            <!-- User Info -->
            <div class='user-info'>
                <div class='image'>
                    <img src='$homeurl/images/user.png' width='70' height='70' style='border:2px solid yellow;' alt='User' />
                </div>
                <div class='info-container'>
                    <div class='name' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>$pengawas[nama]</div>
                   
                    <div class='btn-group user-helper-dropdown'>
                        <i class='material-icons' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>keyboard_arrow_down</i>
                        <ul class='dropdown-menu pull-right'>
                            <li><a href='javascript:void(0);'><i class='material-icons'>person</i>Profile</a></li>
                            
                            <li role='separator' class='divider'></li>
                            <li><a href='logout.php'><i class='material-icons'>input</i>Keluar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class='menu'>
                <ul class='list'>
                    <li class='header'>MAIN NAVIGATION</li>
                    <li>
                        <a href='?'>
                            <i class='material-icons'>home</i>
                            <span>Home</span>
                        </a>
                    </li>
                   
                    <li>
                        <a href='javascript:void(0);' class='menu-toggle'>
                            <i class='material-icons'>widgets</i>
                            <span>Data Master</span>
                        </a>
                        <ul class='ml-menu'>
                            <li><a href='?pg=jurusan'><i class='fa  fa-circle-o text-red'></i> <span> Data Jalur/Jurusan</span></a></li>
							<li><a href='?pg=biaya'><i class='fa  fa-circle-o text-red'></i> <span> Data Administrasi</span></a></li>
							<li><a href='?pg=mou'><i class='fa  fa-circle-o text-red'></i> <span> Data Asal Sekolah</span></a></li>
							<li><a href='?pg=jnssekolah'><i class='fa  fa-circle-o text-red'></i> <span> Data Jenis Sekolah</span></a></li>
							<!--<li><a href='?pg=jkelamin'><i class='fa  fa-circle-o text-red'></i> <span> Data Jenis Kelamin</span></a></li>-->
							<!--<li><a href='?pg=kelambi'><i class='fa  fa-circle-o text-red'></i> <span> Data Status</span></a></li>-->
							<!--<li><a href='?pg=statussantri'><i class='fa  fa-circle-o text-red'></i> <span> Data Status Santri</span></a></li>-->
                        </ul>
                    </li>
                    <li ><a href='?pg=daftar'><i class='material-icons'>person</i> <span>Data Pendaftar</span></a></li>
					
					<li ><a href='?pg=rekapdaftar'><i class='material-icons'>assignment</i> <span>Rekap Daftar Ulang</span></a></li>
					
					<li>
                        <a href='javascript:void(0);' class='menu-toggle'>
                            <i class='material-icons'>account_balance_wallet</i>
                            <span>Keuangan</span>
                        </a>
                        <ul class='ml-menu'>
                            <li><a href='?pg=bayar'><i class='fa  fa-circle-o text-red'></i> <span>History Pembayaran</span></a></li>
							<li><a href='?pg=kas'><i class='fa  fa-circle-o text-red'></i> <span>Buku Kas</span></a></li>
                        </ul>
                    </li>
					<li ><a href='?pg=agenda'><i class='material-icons'>event</i> <span>Agenda Kegiatan</span></a></li>
					<li ><a href='?pg=cetak'><i class='material-icons'>print</i> <span>Cetak Laporan</span></a></li>
					<li>
                        <a href='javascript:void(0);' class='menu-toggle'>
                            <i class='material-icons'>language</i>
                            <span>Manajemen Web</span>
                        </a>
                        <ul class='ml-menu'>
                           <li><a href='?pg=slide'><i class='fa  fa-circle-o text-red'></i> <span>Gambar Slide</span></a></li>
						   <li><a href='?pg=info'><i class='fa  fa-circle-o text-red'></i> <span>Menu Informasi</span></a></li>
						   <li><a href='?pg=setweb'><i class='fa  fa-circle-o text-red'></i> <span>Tanggal Buka PPDB</span></a></li>
                        </ul>
                    </li>		
					<li>
                        <a href='javascript:void(0);' class='menu-toggle'>
                            <i class='material-icons'>accessibility</i>
                            <span>Manajemen User</span>
                        </a>
                        <ul class='ml-menu'>
                           <li><a href='?pg=pengawas'><i class='fa  fa-circle-o text-red'></i> <span>Data Administrator</span></a></li>
						   
                        </ul>
                    </li>					
					<li><a href='?pg=pengumuman'><i class='material-icons'>assignment</i> <span>Pengumuman</span></a></li>					
					<li><a href='?pg=pengaturan'><i class='material-icons'>build</i> <span>Pengaturan Aplikasi</span></a></li>
                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class='legal'>
                
                <div class='version'>
                    <b>Version: </b> 2.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id='rightsidebar' class='right-sidebar'>
            <ul class='nav nav-tabs tab-nav-right' role='tablist'>
                <li role='presentation' class='active'><a href='#skins' data-toggle='tab'>SKINS</a></li>
                <li role='presentation'><a href='#settings' data-toggle='tab'>SETTINGS</a></li>
            </ul>
            <div class='tab-content'>
                <div role='tabpanel' class='tab-pane fade in active in active' id='skins'>
                   
                </div>
                <div role='tabpanel' class='tab-pane fade' id='settings'>
                   
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class='content'>
        <div class='container-fluid'>
           <div class='row clearfix'>
			";
			if($pg=='') {

							
							if($pengawas['level']=='admin') {
							echo "
								
								<div class='row clearfix'>
									<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12'>
										<div class='info-box bg-pink hover-expand-effect'>
											<div class='icon'>
												<i class='material-icons'>playlist_add_check</i>
											</div>
											<div class='content'>
												<div class='text'>PENDAFTAR</div>
												<div class='number count-to' data-from='0' data-to='125' data-speed='15' data-fresh-interval='20'>$daftar</div>
											</div>
										</div>
									</div>
									<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12'>
										<div class='info-box bg-blue hover-expand-effect'>
											<div class='icon'>
												<i class='material-icons'>playlist_add_check</i>
											</div>
											<div class='content'>
												<div class='text'>DAFTAR ULANG</div>
												<div class='number count-to' data-from='0' data-to='125' data-speed='15' data-fresh-interval='20'>$daftarulang</div>
											</div>
										</div>
									</div>
									<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12'>
										<div class='info-box bg-green hover-expand-effect'>
											<div class='icon'>
												<i class='material-icons'>playlist_add_check</i>
											</div>
											<div class='content'>
												<div class='text'>PEMASUKAN</div>
												<div class='number count-to' data-from='0' data-to='125' data-speed='15' data-fresh-interval='20'>Rp. " . number_format($siswa['SUM(jumlah)'],0,',','.')."</div>
											</div>
										</div>
									</div>
									</div>
									<div class='row clearfix'>
										<div class='col-md-12'>
										<div class='card '>												
											<div class='header'>
												<h2 > REKAPITULASI DATA</h2>
												<div class='box-tools pull-right'>
										
												</div>
											</div><!-- /.box-header -->
											<div class='body'>
										<div class='row clearfix'>
											<div class='col-md-6'>
											<div class='card'>
											<div class='body'>
											<b><font color='orange'>A. REKAP DATA Masuk</font></b>
											<table class='table table-striped'>
											
												<thead>
													<tr>
														<th>No.</th><th>";
											
							
							$pen= mysql_query("select * from setting where id_setting='1'");

							$datapen=mysql_fetch_array($pen);
							if ($datapen['jenjang']=='SMK'){
										echo 'Jurusan Pendaftar';
										}else{
										echo 'Jalur Pendaftar';
										
										
							}
											echo " </th><th>Laki-laki </th><th>Perempuan</th>
													</tr>
												</thead>
												<tbody>
													";
														$pendaftarQ = mysql_query("SELECT * FROM daftar  no_daftar group by jurusan");
														print_r($pendaftarQ);
														while($pendaftar = mysql_fetch_array($pendaftarQ)) {
															$no++;
															$bajulaki=mysql_num_rows(mysql_query("SELECT * FROM daftar  where jenis_kelamin='L' and jurusan='$pendaftar[jurusan]'"));
															$bajucewe=mysql_num_rows(mysql_query("SELECT * FROM daftar  where jenis_kelamin='P' and jurusan='$pendaftar[jurusan]'"));
															$jalurdaftar=mysql_fetch_array(mysql_query("select * from jurusan where kode_jur='$pendaftar[jurusan]'"));
														echo "
														<tr>
															<td>$no</td>
															<td>$jalurdaftar[nama_jur]</td>
															<td>$bajulaki</td>
															<td>$bajucewe</td>
														</tr>
														";
														}
													echo "
													
												</tbody>
											</table>
											</div>
											</div>
											</div>
										
											<div class='col-md-6'>
											<div class='card'>
											<div class='body'>
											<b><font color='orange'>B. REKAP DATA STATUS Pendaftar</font></b>
											<table class='table table-striped'>
												<thead>
													<tr>
														<th>No.</th><th>Status Pendaftar </th><th>Laki-laki </th><th>Perempuan</th>
													</tr>
												</thead>
												<tbody>
													";
														$pendaftarQ = mysql_query("SELECT * FROM daftar  where daftar_ulang='1' group by baju");
														$n=0;
														while($pendaftar = mysql_fetch_array($pendaftarQ)) {
															$n++;
															$bajulaki=mysql_num_rows(mysql_query("SELECT * FROM daftar  where jenis_kelamin='L' and baju='$pendaftar[baju]'"));
															$bajucewe=mysql_num_rows(mysql_query("SELECT * FROM daftar  where jenis_kelamin='P' and baju='$pendaftar[baju]'"));
														echo "
														<tr>
															<td>$n</td>
															<td>$pendaftar[baju]</td>
															<td>$bajulaki</td>
															<td>$bajucewe</td>
														</tr>
														";
														}
													echo "
													
												</tbody>
											</table>
											</div>
											</div>
											</div>
											
											
											
											
											
											
										</div>
											&nbsp;								
											</div><!-- /.box-body -->
										</div><!-- /.box -->
									
										<div class='row clearfix'>
										<div class='col-md-12'>
										<div class='card '>												
											<div class='header'>
												<h2 > REKAPITULASI DATA JENIS SEKOLAH</h2>
												<div class='box-tools pull-right'>
										
												</div>
											</div><!-- /.box-header -->
											<div class='body'>
										<div class='row clearfix'>
											<div class='col-md-6'>
											<div class='card'>
											<div class='body'>
											<b><font color='orange'>A. REKAP DATA JENIS SEKOLAH</font></b>
											<table class='table table-striped'>
											
												<thead>
													<tr>
														<th>No.</th><th>";
											
							
							$pen= mysql_query("select * from setting where id_setting='1'");
							$datapen=mysql_fetch_array($pen);
							if ($datapen['jenjang']=='SMK'){
										echo 'Jenis Sekolah';
										}else{
										echo 'Jenis Sekolah';
										
										
							}
											echo " </th><th>Laki-laki </th><th>Perempuan</th><th>total</th>
													</tr>
												</thead>
												<tbody>
													";
														$pendaftarQ = mysql_query("SELECT * FROM daftar  no_daftar group by kode_jenissekolah");
														$nor=0;
														while($pendaftar = mysql_fetch_array($pendaftarQ)) {
															$nor++;
															$bajulakii=mysql_num_rows(mysql_query("SELECT * FROM daftar  where jenis_kelamin='L' and kode_jenissekolah='$pendaftar[kode_jenissekolah]'"));
															$bajucewee=mysql_num_rows(mysql_query("SELECT * FROM daftar  where jenis_kelamin='P' and kode_jenissekolah='$pendaftar[kode_jenissekolah]'"));
															$jenissekolahdaftar=mysql_fetch_array(mysql_query("select * from jenis_sekolah where id_jenissekolah='$pendaftar[kode_jenissekolah]'"));
															$totaljskol=$bajulakii+$bajucewee;
														echo "
														<tr>
															<td>$nor</td>
															<td>$jenissekolahdaftar[nama_jenissekolah]</td>
															<td>$bajulakii</td>
															<td>$bajucewee</td>
															<td>$totaljskol</td>
														</tr>
														";
														}
													echo "
													
												</tbody>
											</table>
											</div>
											</div>
											</div>
										
											<div class='col-md-6'>
											<div class='card'>
											<div class='body'>
											<b><font color='orange'>B. REKAP DATA STATUS JENIS SEKOLAH</font></b>
											<table class='table table-striped'>
												<thead>
													<tr>
														<th>No.</th><th>jenis Sekolah </th><th>diverifikasi </th><th>Di terima</th><th>Di tolak</th>
													</tr>
												</thead>
												<tbody>
													";
														$pendaftarQ = mysql_query("SELECT * FROM daftar  where daftar_ulang='1' group by kode_jenissekolah");
														$nur=0;
														while($pendaftar = mysql_fetch_array($pendaftarQ)) {
															$nur++;
															$bajulakik=mysql_num_rows(mysql_query("SELECT * FROM daftar  where baju='diverifikasi' and kode_jenissekolah='$pendaftar[kode_jenissekolah]'"));
															$bajucewek=mysql_num_rows(mysql_query("SELECT * FROM daftar  where baju='diterima' and kode_jenissekolah='$pendaftar[kode_jenissekolah]'"));
															$bajucewekk=mysql_num_rows(mysql_query("SELECT * FROM daftar  where baju='tidak' and kode_jenissekolah='$pendaftar[kode_jenissekolah]'"));
															$jenissekolahdaftarr=mysql_fetch_array(mysql_query("select * from jenis_sekolah where id_jenissekolah='$pendaftar[kode_jenissekolah]'"));
														echo "
														<tr>
															<td>$nur</td>
															<td>$jenissekolahdaftarr[nama_jenissekolah]</td>
															<td>$bajulakik</td>
															<td>$bajucewek</td>
															<td>$bajucewekk</td>
														</tr>
														";
														}
													echo "
													
												</tbody>
											</table>
											</div>
											</div>
											</div>
											
											
											
											
											
											
										</div>
											&nbsp;
											
											
											
											</div><!-- /.box-body -->
										</div><!-- /.box -->

									</div>
								</div>	
								


								
								
							";
							if($ac=='clearpengumuman') {
								mysql_query("TRUNCATE pengumuman");
								jump('?');
							}
						}
						if($pengawas['level']=='guru') {
							echo "
								
							
										
									<div class='col-md-4'>
										<div class='card '>
											
											<div class='body'>
												<strong><i class='fa fa-building-o'></i> $setting[sekolah]</strong><br/>
												$setting[alamat]<br/><br/>
												<strong><i class='fa fa-phone'></i> Telepon</strong><br/>
												$setting[telp]<br/><br/>
												<strong><i class='fa fa-fax'></i> Fax</strong><br/>
												$setting[fax]<br/><br/>
												<strong><i class='fa fa-globe'></i> Website</strong><br/>
												$setting[web]<br/><br/>
												<strong><i class='fa fa-at'></i> E-mail</strong><br/>
												$setting[email]<br/>
											</div><!-- /.box-body -->
										</div><!-- /.box -->
									</div>
	
								
							";
							
						}
						}
						elseif($pg=='jurusan') {
							if(isset($_POST['tambahjurusan'])) {
												$idpk = str_replace(' ', '',$_POST['idpk']);
												$nama = $_POST['nama'];
												$cek = mysql_num_rows(mysql_query("SELECT * FROM jurusan WHERE kode_jur='$idpk'"));
												if($cek>0) {
													$info = info("Jalur dengan kode $idpk sudah ada!","NO");
												} else {
													$exec = mysql_query("INSERT INTO jurusan (kode_jur,nama_jur) VALUES ('$idpk','$nama')");
													if(!$exec) {
														$info = info("Gagal menyimpan!","NO");
													} else {
														jump("?pg=$pg");
													}
												}
											}
											$info='';
							echo "
								<div class='row clearfix'>
									<div class='col-md-12'>
										<div class='card'>
											<div class='header'>
												<div class='row clearfix'>
													<div class='col-xs-12 col-sm-6'>
														<h2>Data Jalur/Jurusan</h2>
													</div>
													<div class='col-xs-12 col-sm-6 align-right'>
														<button class='btn btn-primary waves-effect' data-toggle='modal' data-target='#tambahjur'><i class='material-icons'>add</i><span>Tambah</span></button>
													</div>
												</div>
																
											</div><!-- /.box-header -->
											<div class='body'>
											$info
												<table id='tablejurusan' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='5px'>#</th>
															<th>Kode</th>
															<th>Nama jalur/jurusan</th>
															
														</tr>
													</thead>
													<tbody>";
													$adminQ = mysql_query("SELECT * FROM jurusan ORDER BY kode_jur ASC");
													while($adm = mysql_fetch_array($adminQ)) {
														$no++;
														echo "
															<tr>
																<td>$no</td>
																<td>$adm[kode_jur]</td>
																<td>$adm[nama_jur]</td>
																
															</tr>
														";
													}
													echo "
													</tbody>
												</table>
											</div><!-- /.box-body -->
										</div><!-- /.box -->
									</div>
									
									<div class='modal fade' id='tambahjur' style='display: none;'>
										<div class='modal-dialog'>
											<div class='modal-content'>
												<div class='modal-header'>
												
													<h4 class='modal-title'>Tambah</h4>
												</div>
												<div class='modal-body'>
												<form action='' method='post'>
														<div class='form-group'>
															<label>Kode</label>
															<div class='form-line'>
															<input type='text' name='idpk' class='form-control'  required='true'/>
															</div>
														</div>
														<div class='form-group'>
															<label>Nama jalur/jurusan</label>
															<div class='form-line'>
															<input type='text' name='nama'  class='form-control' required='true'/>
															</div>
														</div>
												</div>
												<div class='modal-footer'>
															
													<button type='submit' name='tambahjurusan' class='btn btn-success waves-effect'> Simpan</button>
													<button type='button' class='btn btn-danger waves-effect' data-dismiss='modal'>Close</button>
														
												</div>
												</form>
												
											</div>					
										</div>											
									</div>
									
									
								</div>
							";
						}
						elseif($pg=='biaya') {
							$pesan='';
							if(isset($_POST['simpanbiaya'])){
								$kode=str_replace(' ', '',$_POST['kodebiaya']);
								$nama=$_POST['namabiaya'];
								$jumlah=$_POST['jumlah'];
								$cek=mysql_num_rows(mysql_query("select * from biaya where kode_biaya='$kode'"));
								if($cek==0){
								$exec=mysql_query("INSERT INTO biaya (kode_biaya,nama_biaya,jumlah)value('$kode','$nama','$jumlah')");
								$pesan= "<div class='alert alert-success alert-dismissible'>
											<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
											<i class='icon fa fa-info'></i>
											Data Berhasil ditambahkan ..
											</div>";
								}else{
									$pesan= "<div class='alert alert-warning alert-dismissible'>
											<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
											<i class='icon fa fa-info'></i>
											Maaf Kode biaya Sudah ada !
											</div>";
								}
							}
							echo "
								<div class='row clearfix'>
									<div class='col-md-12'>
										<div class='card'>
											<div class='header'>
												<div class='row clearfix'>
													<div class='col-xs-12 col-sm-6'>
														<h2>Data Biaya</h2>
													</div>
													<div class='col-xs-12 col-sm-6 align-right'>
														<button class='btn btn-primary waves-effect' data-toggle='modal' data-target='#tambahbiaya'><i class='material-icons'>add</i><span>Tambah Biaya</span></button>
													</div>
												</div>
																
											</div><!-- /.box-header -->
											<div class='body'>
											<div class='table-responsive'>
												<table id='tablebiaya' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='5px'>#</th>
															<th>Kode Biaya</th>
															<th>Nama Biaya</th>
															<th>Jumlah</th>
														</tr>
													</thead>
													<tbody>";
													
													$biayaQ = mysql_query("SELECT * FROM biaya ORDER BY nama_biaya ASC");
								
													while($biaya = mysql_fetch_array($biayaQ)) {
														$no++; 
														echo "
															<tr>
																<td>$no</td>
																<td>$biaya[kode_biaya]</td>
																<td>$biaya[nama_biaya]</td>
																<td>Rp. " . number_format($biaya['jumlah'],2,',','.')."</td>
																
															</tr>";
													}
													echo "
													</tbody>
												</table>
												</div>
											</div><!-- /.box-body -->
										</div><!-- /.box -->
									</div>
									
									<div class='modal fade' id='tambahbiaya' style='display: none;'>
										<div class='modal-dialog'>
											<div class='modal-content'>
												<div class='modal-header'>
												
													<h4 class='modal-title'>Tambah Biaya</h4>
												</div>
												<div class='modal-body'>
												<form action='' method='post'>
														<div class='form-group'>
															<label>Kode Biaya</label>
															<div class='form-line'>
																<input type='text' name='kodebiaya' class='form-control'  required='true'/>
															</div>
														</div>
														<div class='form-group'>
															<label>Nama Biaya</label>
															<div class='form-line'>
																<input type='text' name='namabiaya'  class='form-control' required='true'/>
															</div>
														</div>
														<div class='form-group'>
															<label>Jumlah</label>
															<div class='form-line'>
																<input type='text' name='jumlah'  class='form-control' required='true'/>
															</div>
														</div>
												</div>
												<div class='modal-footer'>
															
													<button type='submit' name='simpanbiaya' class='btn btn-success waves-effect'> Simpan</button>
													<button type='button' class='btn btn-danger waves-effect' data-dismiss='modal'>Close</button>
														
												</div>
												</form>
												
											</div>					
										</div>											
									</div>
									
									
								</div>
							";
						}
						elseif($pg=='mou') {
											if(isset($_POST['submit'])) {
												$sekolah = $_POST['sekolah'];
												$status = $_POST['status'];
												$carikode = mysql_query("select max(kode_mou) from mou") ;
												  $datakode = mysql_fetch_array($carikode);
												  if ($datakode) {
												   $nilaikode = substr($datakode[0], 1);
												   $kode = (int) $nilaikode;
												   $kode = $kode + 1;
												   $hasilkode = "S".str_pad($kode, 3, "0", STR_PAD_LEFT);
												  } else {
												   $hasilkode = "S001";
												  }
												$cek = mysql_num_rows(mysql_query("SELECT * FROM mou WHERE kode_mou='$hasilkode'"));
												if($cek>0) {
													$info = info("Kode Sekolah sudah ada!","NO");
												} else {
													$exec = mysql_query("INSERT INTO mou (kode_mou,sekolah_mou,status) VALUES ('$hasilkode','$sekolah','$status')");
													if(!$exec) {
														$info = info("Gagal menyimpan!","NO");
													} else {
														jump("?pg=$pg");
													}
												}
											}
							echo "
								<div class='row clearfix'>
									<div class='col-md-12'>
										<div class='card'>
											<div class='header'>
												<div class='row clearfix'>
													<div class='col-xs-12 col-sm-6'>
														<h2>Data Sekolah</h2>
													</div>
													<div class='col-xs-12 col-sm-6 align-right'>
														<button class='btn btn-primary waves-effect' data-toggle='modal' data-target='#tambahmou'><i class='material-icons'>add</i><span>Tambah Sekolah</span></button>
													</div>
												</div>
																
											</div><!-- /.box-header -->
											<div class='body'>
											<div class='table-responsive'>
												<table id='tablemou' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='5px'>#</th>
															<th >Kode Mou</th>
															<th >Nama Sekolah</th>
															<th >Status Mou</th>
															
														</tr>
													</thead>
													<tbody>";
													$mouQ = mysql_query("SELECT * FROM mou ");
													while($mou = mysql_fetch_array($mouQ)) {
														$no++;
														
														echo "
															<tr>
																<td>$no</td>
																<td>$mou[kode_mou]</td>
																<td>$mou[sekolah_mou]</td>
																<td>$mou[status]</td>
																																									
																
															</tr>
														";
													}
													echo "
													</tbody>
												</table>
												</div>
											</div><!-- /.box-body -->
										</div><!-- /.box -->
									</div>
									
									<div class='modal fade' id='tambahmou' style='display: none;'>
										<div class='modal-dialog'>
											<div class='modal-content'>
												<div class='modal-header'>
												
													<h4 class='modal-title'>Tambah Sekolah</h4>
												</div>
												<div class='modal-body'>
												<form action='' method='post'>
														<div class='form-group'>
															<label>Nama Sekolah</label>
															<div class='form-line'>
															<input type='text' name='sekolah' class='form-control'  required='true'/>
															</div>
														</div>
														<div class='form-group'>
															<label>Status Mou</label>
															<div class='form-line'>
															<select name='status'  class='form-control' required='true'>
															<option value='ya'>ya</option>
															<option value='tidak'>tidak</option>
															</select>
															</div>
														</div>
												</div>
												<div class='modal-footer'>
															
													<button type='submit' name='submit' class='btn btn-success waves-effect'> Simpan</button>
													<button type='button' class='btn btn-danger waves-effect' data-dismiss='modal'>Close</button>
														
												</div>
												</form>
												
											</div>					
										</div>											
									</div>
									
									
								</div>
							";
						}
						
						/**untuk jenis sekolah*/
						elseif($pg=='jnssekolah') {
							if(isset($_POST['tambahjnssekolah'])) {
												$idjs = str_replace(' ', '',$_POST['idjs']);
												$namajs = $_POST['namajs'];
												$cek = mysql_num_rows(mysql_query("SELECT * FROM jenis_sekolah WHERE id_jenissekolah='$idjs'"));
												if($cek>0) {
													$info = info("Jenis kelamin dengan kode $idjs sudah ada!","NO");
												} else {
													$exec = mysql_query("INSERT INTO jenis_sekolah (id_jenissekolah,nama_jenissekolah) VALUES ('$idjs','$namajs')");
													if(!$exec) {
														$info = info("Gagal menyimpan!","NO");
													} else {
														jump("?pg=$pg");
													}
												}
											}
											$info='';
							echo "
								<div class='row clearfix'>
									<div class='col-md-12'>
										<div class='card'>
											<div class='header'>
												<div class='row clearfix'>
													<div class='col-xs-12 col-sm-6'>
														<h2>Data Jenis sekolah</h2>
													</div>
													<div class='col-xs-12 col-sm-6 align-right'>
														<button class='btn btn-primary waves-effect' data-toggle='modal' data-target='#tambahjssekolah'><i class='material-icons'>add</i><span>Tambah</span></button>
													</div>
												</div>
																
											</div><!-- /.box-header -->
											<div class='body'>
											$info
												<table id='tablejs' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='5px'>#</th>
															<th>Kode Jenis Sekolah</th>
															<th>Nama Jenis Sekolah</th>
															
														</tr>
													</thead>
													<tbody>";
													$adminQ = mysql_query("SELECT * FROM jenis_sekolah ORDER BY id_jenissekolah ASC");
													while($adjs = mysql_fetch_array($adminQ)) {
														$no++;
														echo "
															<tr>
																<td>$no</td>
																<td>$adjs[id_jenissekolah]</td>
																<td>$adjs[nama_jenissekolah]</td>
																
															</tr>
														";
													}
													echo "
													</tbody>
												</table>
											</div><!-- /.box-body -->
										</div><!-- /.box -->
									</div>
									
									<div class='modal fade' id='tambahjssekolah' style='display: none;'>
										<div class='modal-dialog'>
											<div class='modal-content'>
												<div class='modal-header'>
												
													<h4 class='modal-title'>Tambah Jenis sekolah</h4>
												</div>
												<div class='modal-body'>
												<form action='' method='post'>
														<div class='form-group'>
															<label>Kode Jenis Sekolah</label>
															<div class='form-line'>
															<input type='text' name='idjs' class='form-control'  required='true'/>
															</div>
														</div>
														<div class='form-group'>
															<label>Nama Jenis Sekolah</label>
															<div class='form-line'>
															<input type='text' name='namajs'  class='form-control' required='true'/>
															</div>
														</div>
												</div>
												<div class='modal-footer'>
															
													<button type='submit' name='tambahjnssekolah' class='btn btn-success waves-effect'> Simpan</button>
													<button type='button' class='btn btn-danger waves-effect' data-dismiss='modal'>Close</button>
														
												</div>
												</form>
												
											</div>					
										</div>											
									</div>
									
									
								</div>
							";
						}
						
						/**untuk jenis kelami*/
						elseif($pg=='jkelamin') {
							if(isset($_POST['tambahkelamin'])) {
												$idjk = str_replace(' ', '',$_POST['idjk']);
												$namajk = $_POST['namajk'];
												$cek = mysql_num_rows(mysql_query("SELECT * FROM sex WHERE kode_kelamin='$idjk'"));
												if($cek>0) {
													$info = info("Jenis kelamin dengan kode $idjk sudah ada!","NO");
												} else {
													$exec = mysql_query("INSERT INTO sex (kode_kelamin,jenis_kelamin) VALUES ('$idjk','$namajk')");
													if(!$exec) {
														$info = info("Gagal menyimpan!","NO");
													} else {
														jump("?pg=$pg");
													}
												}
											}
											$info='';
							echo "
								<div class='row clearfix'>
									<div class='col-md-12'>
										<div class='card'>
											<div class='header'>
												<div class='row clearfix'>
													<div class='col-xs-12 col-sm-6'>
														<h2>Data JK</h2>
													</div>
													<div class='col-xs-12 col-sm-6 align-right'>
														<button class='btn btn-primary waves-effect' data-toggle='modal' data-target='#tambahkelamin'><i class='material-icons'>add</i><span>Tambah JK</span></button>
													</div>
												</div>
																
											</div><!-- /.box-header -->
											<div class='body'>
											$info
												<table id='tablesex' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='5px'>#</th>
															<th>Kode JK</th>
															<th>Jenis Kelamin</th>
															
														</tr>
													</thead>
													<tbody>";
													$adminQ = mysql_query("SELECT * FROM sex ORDER BY kode_kelamin ASC");
													while($adjk = mysql_fetch_array($adminQ)) {
														$no++;
														echo "
															<tr>
																<td>$no</td>
																<td>$adjk[kode_kelamin]</td>
																<td>$adjk[jenis_kelamin]</td>
																
															</tr>
														";
													}
													echo "
													</tbody>
												</table>
											</div><!-- /.box-body -->
										</div><!-- /.box -->
									</div>
									
									<div class='modal fade' id='tambahkelamin' style='display: none;'>
										<div class='modal-dialog'>
											<div class='modal-content'>
												<div class='modal-header'>
												
													<h4 class='modal-title'>Tambah JK</h4>
												</div>
												<div class='modal-body'>
												<form action='' method='post'>
														<div class='form-group'>
															<label>Kode JK</label>
															<div class='form-line'>
															<input type='text' name='idjk' class='form-control'  required='true'/>
															</div>
														</div>
														<div class='form-group'>
															<label>Jenis Kelamin</label>
															<div class='form-line'>
															<input type='text' name='namajk'  class='form-control' required='true'/>
															</div>
														</div>
												</div>
												<div class='modal-footer'>
															
													<button type='submit' name='tambahkelamin' class='btn btn-success waves-effect'> Simpan</button>
													<button type='button' class='btn btn-danger waves-effect' data-dismiss='modal'>Close</button>
														
												</div>
												</form>
												
											</div>					
										</div>											
									</div>
									
									
								</div>
							";
						}
						/**untuk seragam*/
						elseif($pg=='kelambi') {
							if(isset($_POST['tambahseragam'])) {
												$idseragam = str_replace(' ', '',$_POST['idseragam']);
												$namaseragam = $_POST['namaseragam'];
												$cek = mysql_num_rows(mysql_query("SELECT * FROM seragam WHERE kode_seragam='$idseragam'"));
												if($cek>0) {
													$info = info("Seragam dengan kode $idseragam sudah ada!","NO");
												} else {
													$exec = mysql_query("INSERT INTO seragam (kode_seragam,ukuran_seragam) VALUES ('$idseragam','$namaseragam')");
													if(!$exec) {
														$info = info("Gagal menyimpan!","NO");
													} else {
														jump("?pg=$pg");
													}
												}
											}
											$info='';
							echo "
								<div class='row clearfix'>
									<div class='col-md-12'>
										<div class='card'>
											<div class='header'>
												<div class='row clearfix'>
													<div class='col-xs-12 col-sm-6'>
														<h2>Status Pendaftar</h2>
													</div>
													<div class='col-xs-12 col-sm-6 align-right'>
														<!--<button class='btn btn-primary waves-effect' data-toggle='modal' data-target='#tambahseragam'><i class='material-icons'>add</i><span>Tambah status</span></button>-->
													</div>
												</div>
																
											</div><!-- /.box-header -->
											<div class='body'>
											$info
												<table id='tableseragam' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='5px'>#</th>
															<th>Kode status</th>
															<th>Status Pendaftar</th>
															
														</tr>
													</thead>
													<tbody>";
													$adminQ = mysql_query("SELECT * FROM seragam ORDER BY kode_seragam ASC");
													while($adseragam = mysql_fetch_array($adminQ)) {
														$no++;
														echo "
															<tr>
																<td>$no</td>
																<td>$adseragam[kode_seragam]</td>
																<td>$adseragam[ukuran_seragam]</td>
																
															</tr>
														";
													}
													echo "
													</tbody>
												</table>
											</div><!-- /.box-body -->
										</div><!-- /.box -->
									</div>
									
									<div class='modal fade' id='tambahseragam' style='display: none;'>
										<div class='modal-dialog'>
											<div class='modal-content'>
												<div class='modal-header'>
												
													<h4 class='modal-title'>Tambah Jalur</h4>
												</div>
												<div class='modal-body'>
												<form action='' method='post'>
														<div class='form-group'>
															<label>Kode status</label>
															<div class='form-line'>
															<input type='text' name='idseragam' class='form-control'  required='true'/>
															</div>
														</div>
														<div class='form-group'>
															<label>Status Pendaftar</label>
															<div class='form-line'>
															<input type='text' name='namaseragam'  class='form-control' required='true'/>
															</div>
														</div>
												</div>
												<div class='modal-footer'>
															
													<button type='submit' name='tambahseragam' class='btn btn-success waves-effect'> Simpan</button>
													<button type='button' class='btn btn-danger waves-effect' data-dismiss='modal'>Close</button>
														
												</div>
												</form>
												
											</div>					
										</div>											
									</div>
									
									
								</div>
							";
						}
						/**akhir seragam*/
						
						elseif($pg=='statussantri') {
							if(isset($_POST['tambahsantri'])) {
												$idsantri = str_replace(' ', '',$_POST['idsantri']);
												$namastatus = $_POST['namastatus'];
												$cek = mysql_num_rows(mysql_query("SELECT * FROM santristatus WHERE kode_status='$idsantri'"));
												if($cek>0) {
													$info = info("status santri dengan kode $idsantri sudah ada!","NO");
												} else {
													$exec = mysql_query("INSERT INTO santristatus (kode_status,nama_status) VALUES ('$idsantri','$namastatus')");
													if(!$exec) {
														$info = info("Gagal menyimpan!","NO");
													} else {
														jump("?pg=$pg");
													}
												}
											}
											$info='';
							echo "
								<div class='row clearfix'>
									<div class='col-md-12'>
										<div class='card'>
											<div class='header'>
												<div class='row clearfix'>
													<div class='col-xs-12 col-sm-6'>
														<h2>Data status santri</h2>
													</div>
													<div class='col-xs-12 col-sm-6 align-right'>
														<button class='btn btn-primary waves-effect' data-toggle='modal' data-target='#tambahsantri'><i class='material-icons'>add</i><span>Tambah status</span></button>
													</div>
												</div>
																
											</div><!-- /.box-header -->
											<div class='body'>
											$info
												<table id='tablestatus' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='5px'>#</th>
															<th>Kode status</th>
															<th>Status santri</th>
															
														</tr>
													</thead>
													<tbody>";
													$kr = mysql_query('SELECT * FROM santristatus');
													while($statusku = mysql_fetch_array($kr)) {
														$no++;
														echo "
															<tr>
																<td>$no</td>
																<td>$statusku[kode_status]</td>
																<td>$statusku[nama_status]</td>
																
															</tr>
														";
													}
													echo "
													</tbody>
												</table>
											</div><!-- /.box-body -->
										</div><!-- /.box -->
									</div>
									
									<div class='modal fade' id='tambahsantri' style='display: none;'>
										<div class='modal-dialog'>
											<div class='modal-content'>
												<div class='modal-header'>
												
													<h4 class='modal-title'>Tambah Status</h4>
												</div>
												<div class='modal-body'>
												<form action='' method='post'>
														<div class='form-group'>
															<label>Kode Santri</label>
															<div class='form-line'>
															<input type='text' name='idsantri' class='form-control'  required='true'/>
															</div>
														</div>
														<div class='form-group'>
															<label>Nama Status</label>
															<div class='form-line'>
															<input type='text' name='namastatus'  class='form-control' required='true'/>
															</div>
														</div>
												</div>
												<div class='modal-footer'>
															
													<button type='submit' name='tambahsantri' class='btn btn-success waves-effect'> Simpan</button>
													<button type='button' class='btn btn-danger waves-effect' data-dismiss='modal'>Close</button>
														
												</div>
												</form>
												
											</div>					
										</div>											
									</div>
									
									
								</div>
							";
						}
					
						elseif($pg=='daftar') {
											if(isset($_POST['simpan'])) {
												$nama=$_POST['nama'];
												$hp=$_POST['nohp'];
												$asal=$_POST['asal'];
												$jsk=$_POST['jsk'];
												$sekolah_lain=$_POST['txtOther'];
												 $carikode = mysql_query("select max(no_daftar) from daftar") ;
												  $datakode = mysql_fetch_array($carikode);
												  if ($datakode) {
												   $nilaikode = substr($datakode[0], 3);
												   $kode = (int) $nilaikode;
												   $kode = $kode + 1;
												   $hasilkode = "PSB".str_pad($kode, 3, "0", STR_PAD_LEFT);
												  } else {
												   $hasilkode = "PSB001";
												  }
												
													$exec = mysql_query("INSERT INTO daftar (no_daftar,nama,asal_sekolah,hp,sekolah_lain,kode_jenissekolah) VALUES ('$hasilkode','$nama','$asal','$hp','$sekolah_lain','$jsk')");
													if(!$exec) {
														$info = info("Gagal menyimpan!","NO");
													} else {
														jump("?pg=$pg");
													}
												
											}
							echo "
								<div class='row'>
									<div class='col-md-12'>
										<div class='card'>
											<div class='header'>
												<div class='row clearfix'>
													<div class='col-xs-12 col-sm-6'>
														<h2>DATA PENDAFTAR</h2>
													</div>
													<div class='col-xs-3 col-sm-3 align-right'>
														<button class='btn btn-primary waves-effect' data-toggle='modal' data-target='#tambahpendaftar'><i class='material-icons'>add</i><span>Tambah Pendaftar</span></button>
													</div>
													<!--export to excel-->
													<div class='col-xs-3 col-sm-3 align-right'>
														<a href='../modules/main.php' target='__blank'>
														<button class='btn btn-primary waves-effect' data-toggle='modal' data-target=''><i class='material-icons'>save</i><span>exp excel</span></button></a>
													</div>
													
												</div>
																
											</div><!-- /.box-header -->
											<div class='body'>
											<div class='table-responsive'>
												<table id='example1' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='5px'>#</th>
															<th>NoPen</th>
															<th>Nama Lengkap</th>
															<th>Asal Sekolah</th>
															<th>Jenis sekolah</th>
															<th>Jenis</th>
															<!--<th>Status Santri</th>-->
															<th>status pendaftar</th>
															<th nowrap>Aksi</th>
														</tr>
													</thead>
													<tbody>
													";
													$pendaftarQ = mysql_query("SELECT * FROM daftar ORDER BY no_daftar ASC");
													while($pendaftar = mysql_fetch_array($pendaftarQ)) {
														$sekolah=mysql_fetch_array(mysql_query("select * from mou where kode_mou='$pendaftar[asal_sekolah]'"));
														
														$jskol=mysql_fetch_array(mysql_query("select * from jenis_sekolah where id_jenissekolah='$pendaftar[kode_jenissekolah]'"));
														$no++;
														echo "
														<tr>
															<td>$no </td>
															<td>$pendaftar[no_daftar]</td>
															<td>$pendaftar[nama]</td>
															<td>$sekolah[sekolah_mou]$pendaftar[sekolah_lain] </td>
															<td><small class='label label-success'>$jskol[nama_jenissekolah]</small> </td>
															<td><small class='label bg-pink'>$pendaftar[jenis_daftar]</small> </td>
															<!--<td>";
															if($pendaftar['status_santrinya']==''){
															echo "<small class='label bg-blue'><i class='fa fa-check'></i> pendaftar</small> ";
															}else if($pendaftar['status_santrinya']=='aktif'){
															echo "<small class='label label-success'><i class='fa fa-check'></i> aktif</small> ";
															}else {
															echo "<small class='label label-danger'><i class='fa fa-check'></i> alumni</small> ";
															}
															echo " </td>-->
															<td>";
															if($pendaftar['daftar_ulang']==1 and $pendaftar['baju']=='diterima'){
															$dis="?pg=proses&id=".$pendaftar['no_daftar'];
															$dis2='';
															 echo "<small class='label label-success'><i class='fa fa-check'></i> diterima</small> ";
															}else if($pendaftar['daftar_ulang']==1 and $pendaftar['baju']==diverifikasi){
																$dis="?pg=proses&id=".$pendaftar['no_daftar'];
																$dis2='';
															 echo "<small class='label label-warning'><i class='fa fa-times'></i> diverifikasi</small> ";
															}else if($pendaftar['daftar_ulang']==1 and $pendaftar['baju']==tidak){
																$dis="?pg=proses&id=".$pendaftar['no_daftar'];
																$dis2='';
																echo "<small class='label label-danger'><i class='fa fa-times'></i> Tidak Diterima</small> ";
															}else {
															$dis="?pg=proses&id=".$pendaftar['no_daftar'];
															$dis2='';
															echo "<small class='label label-default'><i class='fa fa-times'></i> belum verifikasi</small> ";
															}
															echo "
															</td>
															<td>
															<a href='$dis'><button class='btn btn-xs bg-purple' $dis2><i class='material-icons'>history</i><span>Proses</span></button></a>
																<a href='?pg=detail&id=$pendaftar[no_daftar]'><button class='btn waves-effect btn-xs bg-purple'><i class='glyphicon glyphicon-search'></i>O</button></a>
																
															<button class='btn btn-xs bg-red' data-toggle='modal' data-target='#hapus$no'><i class='material-icons'>delete</i></button>
															</td>
														</tr>
														";
													$info = info("Anda yakin akan menghapus pendaftar ini  ?");
													if(isset($_POST['hapus'])) {
													$exec = mysql_query("DELETE  FROM daftar WHERE no_daftar= '$_REQUEST[idu]'");
													(!$exec) ? info("Gagal menyimpan","NO") : jump("?pg=$pg");
	
													}	
													echo "
													<div class='modal fade' id='hapus$no' style='display: none;'>
														<div class='modal-dialog'>
															<div class='modal-content'>
																<div class='modal-header bg-red'>
																<button  class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
																		<h3 class='modal-title'>Hapus Data</h3>
																		</div>
																<div class='modal-body'>
																	<form action='' method='post'>
																	<input type='hidden' id='idu' name='idu' value='$pendaftar[no_daftar]'/>
																	<div class='callout '>
																			<h4>$info</h4>
																	</div>
																	<div class='modal-footer'>
																	<div class='box-tools pull-right'>
																				<button type='submit' name='hapus' class='btn btn-sm btn-danger'><i class='fa fa-trash-o'></i> Hapus</button>
																				
																	</div>	
																	</div>
																	</form>
																</div>
															</div>															
														</div>														
													</div>";
													}
													echo "
													</tbody>
												</table>
											</div>
											</div>
										</div>
									</div>
								</div>
								<div class='modal fade' id='tambahpendaftar' style='display: none;'>
										<div class='modal-dialog'>
											<div class='modal-content'>
												<div class='modal-header'>
													<h4 class='modal-title'>Tambah Pendaftar</h4>
												</div>
												<div class='modal-body'>
													<form action='' method='post'>
														<div class='form-group'>
															<label>Nama Lengkap</label>
															<div class='form-line'>
															<input type='text' name='nama' class='form-control'  required='true'/>
															</div>
														</div>
														<div class='form-group'>
															<label>Asal Sekolah</label>
															<select  name='asal' id='ddlModels' onchange='EnableDisableTextBox(this)' class='form-control' data-style='btn-info' required='true'/>
															<option value=''>Pilih Asal Sekolah</option>";
															$query=mysql_query("select * from mou");
															while($asal=mysql_fetch_array($query)){
																echo "<option value='$asal[kode_mou]'>$asal[sekolah_mou]</option>";
															}
										echo "<option value ='0'>Sekolah Lainya</option>";
															echo "
															</select>
															<div class='form-line'>
															<input type='text' class='form-control' id='txtOther' name='txtOther' disabled='disabled' required='true'/>
														</div>
														</div>
														
														<div class='form-group'>
															<label>Jenis Sekolah</label>
															<select  name='jsk' class='form-control' data-style='btn-info' required='true'/>
															<option value=''>Pilih Jenis Sekolah</option>";
															$query=mysql_query("select * from jenis_sekolah");
															while($jsk=mysql_fetch_array($query)){
																echo "<option value='$jsk[id_jenissekolah]'>$jsk[nama_jenissekolah]</option>";
															}
										
															echo "
															</select>
															
														</div>
														
														<div class='form-group'>
															<label>No Handphone</label>
															<div class='form-line'>
															<input type='text' name='nohp'  class='form-control' required='true'/>
															</div>
														</div>
												</div>
												<div class='modal-footer'>
														<button type='submit' name='simpan' class='btn btn-success waves-effect'> Simpan</button>
														<button type='button' class='btn btn-danger waves-effect' data-dismiss='modal'>Close</button>
												</div>
												</form>
												
											</div>					
										</div>											
									</div>

								";	
							
						}
						
						elseif($pg=='proses') {
							$id=$_GET['id'];
							$queri=mysql_query("select * from daftar where no_daftar='$id'");
							$data=mysql_fetch_array($queri);
							if($data['tanggal_lahir']=='0000-00-00'){
								$tgllahir='';
							}else{
								$tgllahir=$data['tanggal_lahir'];
							}
							if($data['status_bayar']==1 ){
								$dis='disabled';
							}else{
								$dis='';
							}
							if($data['daftar_ulang']==1){
							$disx='disabled';
							}else{
								$disx='';
							}
							
							
							
						echo "
								<div class='modal fade' id='info' style='display: none;'>
										<div class='modal-dialog'>
											<div class='modal-content'>
												<div class='modal-header bg-blue'>
												<button  class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
													<h3 class='modal-title'>Biaya Administrasi</h3>
												</div>
												<div class='modal-body'>
													<table class='table table-striped'>
														<thead>
														<tr>
															<th width='5px'>No</th>
															<th>Nama Biaya</th>
															<th>Jumlah</th>
															
														</tr>
													</thead>
													<tbody>";
													$q = mysql_query("SELECT * FROM biaya ");
													while($biaya = mysql_fetch_array($q)) {
														$no++;
														echo "
															<tr>
																<td>$no</td>
																<td>$biaya[nama_biaya]</td>
																<td>Rp. " . number_format($biaya['jumlah'],2,',','.')."</td>
																
															</tr>
														";
													}
													echo "
													</tbody>
													</table>
													
												</div>
											</div>					
										</div>											
									</div>
								<div class='row'>
									<div class='col-md-12'>
										<div class='card'>
											<div class='header'>
												<h4 class='box-title'>PROSES VERIFIKASI</h4>
											</div><!-- /.box-header -->
											<div class='body'>
												<div class='nav-tabs-custom'>
													<ul class='nav nav-tabs'>
													 
													  <li class='active'><a href='#data' data-toggle='tab' aria-expanded='false'> <span class='font-20'><b>1. Kelengkapan Data</b></span></a></li>
													  <li class=''><a href='#data2' data-toggle='tab' aria-expanded='false'><span class='font-20'><b>2. Daftar Ulang</b></span></a></li>													 
													</ul>
													<div class='tab-content'>
													  <div class='tab-pane active' id='data'>
														<form id='simpandata' action='simpandata.php' method='post' >
														
														<div class='form-group'>
															<div class='row'>
																<div class='col-md-4'>
																	<label>No Pendaftaran</label>
																	<div class='form-line'>
																	<input type='text' name='no_daftar' class='form-control' value='$id' readonly/>
																	</div>
																</div>
																<div class='col-md-4'>
																	<label>NIK</label>
																	<div class='form-line'>
																	<input type='text' name='nik'  class='form-control' value='$data[nik]' required='true'/>
																	</div>
																</div>
																<div class='col-md-4'>
																	<label>NISN</label>
																	<div class='form-line'>
																	<input type='text' name='nisn'  class='form-control' value='$data[nisn]' required='true'/>
																	</div>
																</div>
															</div>
														</div>
														<div class='form-group'>
															<div class='row'>
																<div class='col-md-6'>
																	<label>Nama Lengkap</label>
																	<div class='form-line'>
																	<input type='text' name='nama' class='form-control' value='$data[nama]' required='true'/>
																	</div>
																</div>
																<div class='col-md-3'>
																<label>";
											
							
							$pen= mysql_query("select * from setting where id_setting='1'");
							$datapen=mysql_fetch_array($pen);
							if ($datapen['jenjang']=='SMK'){
										echo 'Jurusan Pendaftar';
										}else{
										echo 'Jalur Pendaftar';
										
										
							}
											echo "</label>
																<select  name='jurusan' class='form-control'  required='true'/>
																<option value=''>Pilih</option>";
																$adminQ = mysql_query("SELECT * FROM jurusan ");
																while($adm = mysql_fetch_array($adminQ)) {
																	($adm['kode_jur']==$data['jurusan']) ? $s='selected':$s='';
																	echo "<option value='$adm[kode_jur]' $s>$adm[nama_jur]</option>";
																}
																echo "
																</select>
																</div>
																
																<div class='col-md-3'>
																<label><font color='red'>Status Pendaftar</font></label>
																<select  name='seragam' class='form-control' required='true'/>
																<option value=''>Status Pendaftar</option>";
																$adminQ = mysql_query("SELECT * FROM seragam ");
																while($adseragam = mysql_fetch_array($adminQ)) {
																	($adseragam['kode_seragam']==$data['baju']) ? $s='selected':$s='';
																	echo "<option value='$adseragam[kode_seragam]' $s>$adseragam[ukuran_seragam]</option>";
																}
																echo "
																</select>
																</div>
																
																<!--<div class='col-md-3'>
																<label><font color='red'>Status Santri</font></label>
																<select  name='stsantri' class='form-control' />
																<option value=''>Status Santri</option>";
																$adminQ = mysql_query("SELECT * FROM santristatus ");
																while($adsantri = mysql_fetch_array($adminQ)) {
																	($adsantri['kode_status']==$data['status_santrinya']) ? $s='selected':$s='';
																	echo "<option value='$adsantri[kode_status]' $s>$adsantri[nama_status]</option>";
																}
																echo "
																</select>
																</div>-->
																
															</div>
														</div>
														
														<div class='form-group'>
															<div class='row'>
																<div class='col-md-4'>
																	<label>Jenis Kelamin</label>
																<select  name='sex' class='form-control'  required='true'/>
																<option value=''>Pilih JK</option>";
																$adminQ = mysql_query("SELECT * FROM sex ");
																while($adjk = mysql_fetch_array($adminQ)) {
																	($adjk['kode_kelamin']==$data['jenis_kelamin']) ? $s='selected':$s='';
																	echo "<option value='$adjk[kode_kelamin]' $s>$adjk[kode_kelamin]</option>";
																}
																echo "
																</select>
																</div>
																<div class='col-md-4'>
																<label>Tempat</label>
																<div class='form-line'>
																<input type='text' name='tempat'  class='form-control' value='$data[tempat_lahir]' required='true'/>
																</div>
																</div>
																<div class='col-md-4'>
																<label>Tanggal Lahir</label>
																<div class='form-line'>
																<input type='text' name='tgllahir'  class='datepicker form-control' value='$tgllahir'   required='true'/>
																</div>
																</div>
															</div>
														</div>
														<div class='form-group'>
															<div class='row'>									
																<div class='col-md-6'>
																<label>Nama Ibu</label>
																<div class='form-line'>
																<input type='text' name='ibu'  class='form-control' value='$data[nama_ibu]' required='true'/>
																</div>
																</div>
																<div class='col-md-6'>
																<label>Nama Ayah</label>
																<div class='form-line'>
																<input type='text' name='ayah'  class='form-control' value='$data[nama_ayah]' required='true'/>
																</div>
																</div>
															</div>
														</div>
														<div class='form-group'>
															<div class='row'>
																<div class='col-md-6'>
																	<label>Asal Sekolah</label>
																	<select  name='asal'  class='form-control' style='width:100%' required='true'/>
																		";
																		$query=mysql_query("select * from mou");
																		while($asal=mysql_fetch_array($query)){
																		    if($data['asal_sekolah']=='0'){
																	($data['asal_sekolah']==$data['sekolah_lain']) ? $s='selected':$s='';
																			
																			echo "<option value='$data[asal_sekolah]' $s>$data[sekolah_lain]</option>";}
																		else{
																			($asal['kode_mou']==$data['asal_sekolah']) ? $s='selected':$s='';
																			
																			echo "<option value='$asal[kode_mou]' $s>$asal[sekolah_mou]</option>";
																		}}
																		echo "
																		</select>
																</div>
																
																<div class='col-md-6'>
																	<label>Jenis Sekolah</label>
																	<select  name='jsk' class='form-control'  required='true'/>
																<option value=''>Pilih Jenis Sekolah</option>";
																$adminQ = mysql_query("SELECT * FROM jenis_sekolah ");
																while($adjs = mysql_fetch_array($adminQ)) {
																	($adjs['id_jenissekolah']==$data['kode_jenissekolah']) ? $s='selected':$s='';
																	echo "<option value='$adjs[id_jenissekolah]' $s>$adjs[nama_jenissekolah]</option>";
																}
																		echo "
																		</select>
																</div>
																
																<div class='col-md-6'>
																	<label>No Handphone</label>
																	<div class='form-line'>
																	<input type='text' name='nohp'  class='form-control' value='$data[hp]' required='true'/>
																	</div>
																</div>
															</div>
														</div>
														<div class='form-group'>
															<div class='row'>
																<div class='col-md-4'>
																	<label>Alamat / Kp. / Dusun</label>
																	<div class='form-line'>
																	<input type='text' name='alamat' class='form-control' value='$data[alamat]' required='true'/>
																	</div>
																</div>
																<div class='col-md-4'>
																<label>Desa / Kelurahan</label>
																<div class='form-line'>
																<input type='text' name='kelurahan'  class='form-control' value='$data[kelurahan]' required='true'/>
																</div>
																</div>
																<div class='col-md-4'>
																<label>Kecamatan</label>
																<div class='form-line'>
																<input type='text' name='kecamatan'  class='form-control' value='$data[kecamatan]' required='true'/>
																</div>
																</div>
															</div>
														</div>
																							
																<div class='pull-right'>
																	<button type='submit'  name='simpandata' class='btn btn-lg btn-success'><i class='fa fa-check'></i> Simpan Data</button>
																</div>
														
														</form>	<br>												
													  </div>
													 <div class='tab-pane' id='data2'>
													 <form id='formbayar' action='simpanbayar.php' method='post'>
													 
														<div class='form-group'>
															<label>No Pendaftaran</label>
															<div class='form-line'>
															<input type='text' name='no_daftar' class='form-control' value='$id' readonly/>
															</div>
														</div>
														<div class='form-group'>
															<label>Sudah Terima Dari</label>
															<div class='form-line'>
															<input type='text' name='nama' class='form-control' value='$data[nama]' readonly/>
															</div>
														</div>
														<div class='form-group'>
															
															<label>Jumlah Uang Sebesar</label>
															<div class='input-group'>
																<span class='input-group-addon'>Rp.</span>
																<div class='form-line'>
																<input type='text' name='jumlah_bayar' class='uang form-control'  required/>
																</div>
															</div>
														</div>
														<div class='form-group'>
															<label>Untuk Pembayaran</label>
															<div class='form-line'>
																<input type='text' name='ket' class='form-control' required />
															</div>
														</div>
														
														<div class='box-footer'>
																<div class='box-tools pull-right'>
																	<a  id='btninfo' class='btn btn-lg bg-red' data-toggle='modal' data-target='#info'><i class='fa fa-info'></i> info</a>	
																	
																	<button type='submit'  id='btnprosesbayar' class='btn btn-lg btn-success' $dis><i class='fa fa-check'></i> SIMPAN DATA</button>
																	<a id='btncetakbayar' onclick=frames['frameresult'].print() class='btn btn-lg bg-purple'><i class='glyphicon glyphicon-print'></i> Bukti Pendaftaran</a>
																																
																</div>
														<iframe id='loadframe' name='frameresult' src='buktibayar.php?id=$id' style='border:none;width:1px;height:1px;'></iframe>
														</div>
													 </form>
													 </div>
													
													
													
												  </div>
													
												
											</div>
										</div>
									</div>
								</div> ";	
						}
						
						elseif($pg=='rekapdaftar') {
											
							echo "
								<div class='row'>
									<div class='col-md-12'>
										<div class='card'>
											<div class='header'>
												<div class='row clearfix'>
													<div class='col-xs-12 col-sm-6'>
														<h2>DATA SISWA BARU</h2>
													</div>
													<div class='col-xs-12 col-sm-6 align-right'>
														<button onclick=frames['frameresult'].print() class='btn waves-effect bg-purple'><i class='glyphicon glyphicon-print'></i> Print Data</button>
											
														<iframe id='framerekap' name='frameresult' src='printrekap.php?id=$id' style='border:none;width:1px;height:1px;display: none;'></iframe>
													</div>
												</div>
												
											</div><!-- /.box-header -->
											<div class='body'>
											<div class='table-responsive'>
												<table id='example1' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='5px'>#</th>
															<th>No Pendaftaran</th>
															<th>Nama Lengkap</th>
															<th>Asal Sekolah</th>
															
															<th>Sudah Bayar</th>
															<th>Sisa</th>
															<th width=60px>Status</th>
															<th width=60px></th>
														</tr>
													</thead>
													<tbody>
													";
													$pendaftarQ = mysql_query("SELECT * FROM daftar  where daftar_ulang='1' and status_bayar='1' ORDER BY no_daftar ASC");
													
													while($pendaftar = mysql_fetch_array($pendaftarQ)) {
														$query=mysql_fetch_array(mysql_query("select *,SUM(jumlah) from bayar where no_daftar='$pendaftar[no_daftar]'"));
														$query2=mysql_fetch_array(mysql_query("select *,SUM(jumlah) from biaya"));
														$sekolah=mysql_fetch_array(mysql_query("select * from mou where kode_mou='$pendaftar[asal_sekolah]'"));
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
															<td>Rp. " . number_format($sisa,2,',','.')."</td>
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
															<td>
															<a href='?pg=detail&id=$pendaftar[no_daftar]'><button class='btn waves-effect btn-xs bg-purple'><i class='glyphicon glyphicon-search'></i> Detail</button></a>
															</td>
														</tr>";
													}
													echo "
													</tbody>
												</table>
												</div>
											</div>
										</div>
									</div>
								</div>
								

								";	
							
						}
						elseif($pg=='detail') {
							$id=$_GET['id'];
							$daftar=mysql_fetch_array(mysql_query("select * from daftar where no_daftar='$id'"));
							$sekolah=mysql_fetch_array(mysql_query("select * from mou where kode_mou='$daftar[asal_sekolah]'"));
							$jalurdaftar=mysql_fetch_array(mysql_query("select * from jurusan where kode_jur='$daftar[jurusan]'"));
							$statusdaftar=mysql_fetch_array(mysql_query("select * from seragam where kode_seragam='$daftar[baju]'"));
							$buktitransfer=mysql_fetch_array(mysql_query("select * from gambar_transfer where no_daftar='$daftar[no_daftar]'"));
							
							echo "
								<div class='row'>
                                	<div class='col-md-3'>
                                	<div class='card'>
                                		<div class='body'>
                                	                               		
                                		
                                			<h4 class='profile-username text-center'>$daftar[nama]</h4>
                                              
                                			<a onclick=frames['frameresult'].print() class='btn btn-lg btn-block bg-purple'><i class='glyphicon glyphicon-print'></i> Print Data</a>
											<button class='btn btn-lg btn-block bg-red' data-toggle='modal' data-target='#modalbayar'><i class='glyphicon glyphicon-plus'></i> Bayar Angsuran</button>
                                             <iframe id='loadframe2' name='frameresult' src='buktibayar.php?id=$id' style='border:none;width:1px;height:1px;display: none;'></iframe>
                                		</div>
                                		</div>
                                	</div>
                                	
                                	<div class='col-md-9'>
									<div class='card'>
									<div class='body'>
                            		<div class='nav-tabs-custom'>
                                        <ul class='nav nav-tabs'>
                                          <li class='active'><a aria-expanded='true' href='#detail' data-toggle='tab'><i class='fa fa-user'></i> Detail Profile</a></li>
										   <li><a aria-expanded='true' href='#datakks' data-toggle='tab'><i class='fa fa-clone'></i> DATA KKS&KPS</a></li>
										  <li><a aria-expanded='true' href='#datakip' data-toggle='tab'><i class='fa fa-id-card-o'></i> DATA KIP</a></li>
										  <li><a aria-expanded='true' href='#fileuploads' data-toggle='tab'><i class='fa fa-camera'></i> DATA UPLOAD</a></li>
										  
                            			  <li><a aria-expanded='true' href='#bayar' data-toggle='tab'><i class='fa fa-sign-in'></i> Histori Pembayaran</a></li>
                            			  
                                        </ul>
                                        <div class='tab-content'>
                                          <div class='tab-pane active' id='detail'>
                            						<div class='row margin-bottom'>
													<form action='' method='post'>
                            							<div class='col-sm-12'>
														
                                                      <table class='table table-striped table-bordered'>
                                                      <tbody>
                                                        <tr align='center'><td colspan='2'><b><font color='red'>DATA DIRI SISWA</font></b></td></tr>
                                                        <tr><th scope='row'>No Pendaftaran</th> <td>$daftar[no_daftar]</td></tr>
														<tr><th scope='row'>NIK / NISN</th> <td>$daftar[nik] / $daftar[nisn]</td></tr>
                                                        <tr><th scope='row'>Nama Lengkap</th> <td>$daftar[nama]</td></tr>
                                                        <tr><th scope='row'>Tempat, Tanggal Lahir</th> <td>$daftar[tempat_lahir], $daftar[tanggal_lahir]</td></tr>
                                                        <tr><th scope='row'>No Registrasi Akta Lahir</th> <td>$daftar[noreg_akta]</td></tr>
														<tr><th scope='row'>Jenis Kelamin</th> <td>$daftar[jenis_kelamin]</td></tr>
														<tr><th scope='row'>Agama</th> <td>$daftar[agama]</td></tr>
														<tr><th scope='row'>Hobi</th> <td>$daftar[hobi]</td></tr>
														<tr><th scope='row'>Cita Cita</th> <td>$daftar[citacita]</td></tr>
														<tr><th scope='row'>Jarak dri sekolah</th> <td>$daftar[jarak] KM</td></tr>
														<tr><th scope='row'>Alamat</th> <td>$daftar[alamat]</td></tr>
														<tr><th scope='row'>Alamat yg mdh dihubungi</th> <td>$daftar[alamat_dua]</td></tr>
														<tr><th scope='row'>Kelurahan</th> <td>$daftar[kelurahan]</td></tr>
														<tr><th scope='row'>Kecamatan</th> <td>$daftar[kecamatan]</td></tr>
														<tr><th scope='row'>Kabupaten</th> <td>$daftar[kota]</td></tr>
														<tr><th scope='row'>Provinsi</th> <td>$daftar[provinsi]</td></tr>
														<tr><th scope='row'>No HP</th> <td>$daftar[hp]</td></tr>
														<tr align='center'><td colspan='2'><b><font color='red'>DATA ASAL SEKOLAH</font></b></td></tr>
														<tr><th scope='row'>No Ijazah</th> <td>$daftar[no_ijazah]</td></tr>
														<tr><th scope='row'>Asal Sekolah</th> <td>$sekolah[sekolah_mou]$daftar[sekolah_lain]</td></tr>
														<tr><th scope='row'>Status Sekolah</th> <td>$daftar[status_sekolah]</td></tr>
														<tr><th scope='row'>NPSN Sekolah Asal</th> <td>$daftar[npsn_sekolah_asal]</td></tr>
														<tr><th scope='row'>NSS Sekolah Asal</th> <td>$daftar[nss_sekolah]</td></tr>
														<tr><th scope='row'>KAB Sekolah Asal</th> <td>$daftar[kab_sekolah_asal]</td></tr>
														<tr align='center'><td colspan='2'><b><font color='red'>DATA ORTU SISWA</font></b></td></tr>
														<tr><th scope='row'>NO KK</th> <td>$daftar[no_kk]</td></tr>
														<tr><th scope='row'>NIK Ayah</th> <td>$daftar[nik_ayah]</td></tr>
														<tr><th scope='row'>Nama Ayah</th> <td>$daftar[nama_ayah]</td></tr>
														<tr><th scope='row'>Pekerjaan Ayah</th> <td>$daftar[pekerjaan_ayah]</td></tr>
														<tr><th scope='row'>NIK Ibu</th> <td>$daftar[nik_ibu]</td></tr>
														<tr><th scope='row'>Nama Ibu</th> <td>$daftar[nama_ibu]</td></tr>
														<tr><th scope='row'>Nama Kecil Ibu</th> <td>$daftar[nama_kecil_ibu]</td></tr>
														<tr><th scope='row'>Pekerjaan Ibu</th> <td>$daftar[pekerjaan_ibu]</td></tr>
														<tr><th scope='row'>Alamat Ortu</th> <td>$daftar[alamat_ortu]</td></tr>
														<tr><th scope='row'>Nama Wali</th> <td>$daftar[nama_wali]</td></tr>
														<tr><th scope='row'>Alamat Wali</th> <td>$daftar[alamat_wali]</td></tr>
														<tr align='center'><td colspan='2'><b><font color='red'>PENDAFTARAN</font></b></td></tr>
                                                        <tr><th scope='row'>Pilihan Daftar</th> <td>$jalurdaftar[nama_jur]</td></tr>
                                                        <tr><th scope='row'>Status Pendaftaran</th> <td>$statusdaftar[ukuran_seragam]</td></tr>
                                                        <tr><th scope='row'>Tanggal Pendaftaran</th> <td>$daftar[tgl_daftar]</td></tr>
														
														
													  </tbody>
                                                      </table>
														
                                                       </div>
                            						   </form>
                            						</div>
                            				</div>
											<div class='tab-pane' id='fileuploads'>
											 <div  class='table-responsive'>
                            						<div class='row margin-bottom'>
                            						<div id='tablebayar' class='col-sm-12'>
														<table id='example' class='table table-bordered table-striped'>
															<thead>
																<tr>
															<th width='5px'>#</th>
															<th>Gambar</th>
															<th>Keterangan</th>
															<th>tipe File</th>															
														</tr>
															</thead>
															<tbody>
															";
															$buktiupload = mysql_query("SELECT * FROM gambar_transfer where no_daftar='$daftar[no_daftar]'");
													while($bkt = mysql_fetch_array($buktiupload)) {
														
														$no++;
														echo "
														<tr>
															<td>$no </td>
															<td><a href='$homeurl/$bkt[file]'  data-toggle='lightbox''><img class='img img-responsive' src='$homeurl/$bkt[file]' style='max-height:100px'/></td>
															<td>$bkt[nama]</td>
															<td>$bkt[tipe_file]</td>
														</tr>";
															}
															echo "
															</tbody>
														</table>
                                                    </div>
                            						</div>
												</div>
												</div>
												
												 <div class='tab-pane' id='datakip'>
											 <div  class='table-responsive'>
                            						<div class='row margin-bottom'>
                            						<div id='tablebayar' class='col-sm-12'>
														<table id='example' class='table table-bordered table-striped'>
															<tbody>
																
															<tr><th scope='row'>No Pendaftaran</th> <td>$daftar[no_daftar]</td></tr>
															<tr><th scope='row'>Usulan Dari Sekolah Layak PIP</th> <td>$daftar[usulan_pip]</td></tr>
															<tr><th scope='row'>Penerima KIP</th> <td>$daftar[penerima_kip]</td></tr>
															<tr><th scope='row'>No KIP</th> <td>$daftar[no_kip]</td></tr>		
															<tr><th scope='row'>Nama Tertera di KIP</th> <td>$daftar[tertera_kip]</td></tr>				
															<tr><th scope='row'>Terima Fisik Kartu KIP</th> <td>$daftar[terima_kip]</td></tr>		
															<tr><th scope='row'>Alasan PIP</th> <td>$daftar[alasan_pip]</td></tr>			
															
															</tbody>
															
														</table>
                                                    </div>
                            						</div>
												</div>
												</div>
												
												<div class='tab-pane' id='datakks'>
											 <div  class='table-responsive'>
                            						<div class='row margin-bottom'>
                            						<div id='tablebayar' class='col-sm-12'>
														<table id='example' class='table table-bordered table-striped'>
															<tbody>
																
															<tr><th scope='row'>No Pendaftaran</th> <td>$daftar[no_daftar]</td></tr>
															<tr><th scope='row'>NO KKS</th> <td>$daftar[no_kks]</td></tr>
															<tr><th scope='row'>Penerima KPS/PKH</th> <td>$daftar[penerima_kps]</td></tr>
															<tr><th scope='row'>No KPS/PKH</th> <td>$daftar[no_kps]</td></tr>		
															
															
															</tbody>
															
														</table>
                                                    </div>
                            						</div>
												</div>
												</div>
												
                            				 <div class='tab-pane' id='bayar'>
											 <div  class='table-responsive'>
                            						<div class='row margin-bottom'>
                            						<div id='tablebayar' class='col-sm-12'>
														<table id='example' class='table table-bordered table-striped'>
															<thead>
																<tr>
																	<th width='5px'>#</th>
																	<th class='hidden-xs'>No Pendaftaran</th>
																	<th>Nama Lengkap</th>
																	<th>Jumlah Bayar</th>
																	<th>ket</th>
																	<th>Tanggal Bayar</th>
																	<th >Aksi</th>
																	
																</tr>
															</thead>
															<tbody>
															";
															$pendaftarQ = mysql_query("SELECT * FROM bayar where no_daftar='$id' ORDER BY date DESC");
															while($pendaftar = mysql_fetch_array($pendaftarQ)) {
																$no++;
																echo "
																<tr>
																	<td>$no </td>
																	<td class='hidden-xs'> $pendaftar[no_daftar]</td>
																	<td>$pendaftar[nama]</td>
																	<td>Rp. " . number_format($pendaftar['jumlah'],2,',','.')."</td>
																	<td>$pendaftar[ket]</td>
																	<td>$pendaftar[date] </td>
																	
																	<td>
																	
																	<button class='hapusbayar btn btn-xs bg-red' data-id='$pendaftar[id_bayar]'><i class='fa fa-trash'></i> Hapus</button>
																	</td>
																</tr>";
															}
															echo "
															</tbody>
														</table>
                                                    </div>
                            						</div>
												</div>
												</div>
                            				 
                            				</div> 
                                          
                                        </div>
                                        <!-- /.tab-content -->
										</div>
                            		</div>
                                </div> <!--row-->
									<div class='modal fade' id='modalbayar' style='display: none;'>
										<div class='modal-dialog'>
											<div class='modal-content'>
												<div class='modal-header bg-blue'>
												<button  class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
													<h3 class='modal-title'>Pembayaran</h3>
												</div>
												<div class='modal-body'>
													<form id='formtambahbayar' action='simpanbayar.php' method='post'>
													<div class='form-group'>
															<label>No Pendaftaran</label>
															<input type='text' name='no_daftar' class='form-control' value='$id' readonly/>
														</div>
														<div class='form-group'>
															<label>Nama Lengkap</label>
															<input type='text' name='nama' class='form-control'  value='$daftar[nama]' readonly/>
														</div>
														
														<div class='form-group'>
															<label>Jumlah Pembayaran</label>
															<div class='input-group'>
																<span class='input-group-addon'>Rp.</span>
																<input type='text' name='jumlah_bayar'  class='uang form-control' required='true'/>
															</div>
														</div>
														<div class='form-group'>
															<label>Keterangan Pembayaran</label>
															<input type='text' name='ket' class='form-control'  required='true'/>
														</div>
													<div class='modal-footer'>
															<div class='box-tools pull-right '>
																<button type='submit' name='simpan' class='btn btn-lg btn-success'><i class='fa fa-check'></i> Proses Pembayaran</button>
																
															</div>
													</div>
													</form>
												</div>
											</div>					
										</div>											
									</div>
								";
						
						}
						elseif($pg=='bayar') {
							echo "
								<div class='row'>
									<div class='col-md-12'>
										<div class='card'>
											<div class='header'>
												<h2 class='box-title'>Histori Pembayaran</h2>
												
											</div><!-- /.box-header -->
											<div class='body'>
												<div  class='table-responsive'>
												<table id='example1' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='5px'>#</th>
															<th>No Pendaftaran</th>
															<th>Nama Lengkap</th>
															<th>Jumlah Bayar</th>
															<th>ket</th>
															<th>Tanggal Bayar</th>
															<th>User</th>
															<th >Aksi</th>
															
														</tr>
													</thead>
													<tbody>
													";
													$pendaftarQ = mysql_query("SELECT * FROM bayar  ORDER BY date DESC");
													while($pendaftar = mysql_fetch_array($pendaftarQ)) {
														$nama= mysql_fetch_array(mysql_query("SELECT * FROM pengawas where id_pengawas='$pendaftar[user]'"));
														$no++;
														echo "
														<tr>
															<td>$no </td>
															<td>$pendaftar[no_daftar]</td>
															<td>$pendaftar[nama]</td>
															<td>Rp. " . number_format($pendaftar['jumlah'],2,',','.')."</td>
															<td>$pendaftar[ket]</td>
															<td>$pendaftar[date] </td>
															<td>$nama[nama] </td>
															<td>
															
															<button class='hapusbayar btn btn-xs bg-red' data-id='$pendaftar[id_bayar]'><i class='fa fa-trash'></i> Hapus</button>
															</td>
														</tr>";
													}
													echo "
													</tbody>
												</table>
												</div>
											</div>
										</div>
									</div>
								</div>";
						
						}
						elseif($pg=='kas'){
							$jumlah=mysql_fetch_array(mysql_query("select *,sum(debet),sum(kredit) from bukukas"));
							$saldo=0;;
							$jumdebet=$jumlah['sum(debet)'];
							$jumkredit=$jumlah['sum(kredit)'];
							if($jumlah['debet']<>0 or $jumlah['kredit']<>0){
								$saldo=$jumdebet-$jumkredit;
							}
							echo "
								<div class='row clearfix'>
									
											<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12'>
												<div class='info-box-2 bg-blue hover-zoom-effect'>
													<div class='icon'>
														<i class='material-icons'>devices</i>
													</div>
													<div class='content'>
														<div class='text'>SALDO</div>
														<div class='number'>Rp. " . number_format($saldo,0,',','.')."</div>
													</div>
												</div>
											</div>
											<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12'>
												<div class='info-box-2 bg-green hover-zoom-effect'>
													<div class='icon'>
														<i class='material-icons'>devices</i>
													</div>
													<div class='content'>
														<div class='text'>PEMASUKAN</div>
														<div class='number'>Rp. " . number_format($jumdebet,0,',','.')."</div>
													</div>
												</div>
											</div>	
											<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12'>
												<div class='info-box-2 bg-red hover-zoom-effect'>
													<div class='icon'>
														<i class='material-icons'>devices</i>
													</div>
													<div class='content'>
														<div class='text'>PENGELUARAN</div>
														<div class='number'>Rp. " . number_format($jumkredit,0,',','.')."</div>
													</div>
												</div>
											</div>				
								</div>			
								<div class='row clearfix'>								
									<div class='col-md-12'>
										<div class='card'>
											<div class='header'>
												<div class='row clearfix'>
													<div class='col-xs-12 col-sm-6'>
														<h2>Buku Kas Keuangan</h2>
													</div>
													<div class='col-xs-12 col-sm-6 align-right'>
														<button class='btn btn-sm bg-purple' data-toggle='modal' data-target='#modaltransaksi'><i class='glyphicon glyphicon-plus'></i> Tambah Transaksi</button>
													</div>
												</div>
												
											</div><!-- /.box-header -->
											<div class='body'>
												<div  class='table-responsive'>
												<table id='example1' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='5px'>#</th>
															<th>Tanggal</th>
															<th>Uraian</th>
															<th>Pemasukan</th>
															<th>Pengeluaran</th>
															
															<th>User</th>
															<th >Aksi</th>
															
														</tr>
													</thead>
													<tbody>
													";
													$kasq = mysql_query("SELECT * FROM bukukas ");
													while($kas = mysql_fetch_array($kasq)) {
														
														$nama= mysql_fetch_array(mysql_query("SELECT * FROM pengawas where id_pengawas='$kas[user]'"));
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
															<td>
															
															<button class='hapuskas btn btn-xs bg-red' data-id='$kas[id_kas]' style='$hide'><i class='glyphicon glyphicon-remove'></i></button>
															
															</td>
														</tr>";
													}
													echo "
													</tbody>
												</table>
												</div>
											</div>
										</div>
									</div>
								</div>
									<div class='modal fade' id='modaltransaksi' style='display: none;'>
										<div class='modal-dialog'>
											<div class='modal-content'>
												<div class='modal-header '>
												<button  class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
													<h3 class='modal-title'>Tambah Transaksi</h3>
												</div>
												<div class='modal-body'>
													<form id='formtambahtransaksi' action='simpantransaksi.php' method='post'>
													<div class='form-group'>
															<label>Jenis Transaksi</label>
															<select type='text' name='jenis' class='form-control' required >
																<option value=''>Pilih Jenis Transaksi</option>
																<option value='debet'>Pemasukan</option>
																<option value='kredit'>Pengeluaran</option>
															</select>
														</div>
														
														<div class='form-group'>
															<label>Besar Uang</label>
															<div class='input-group'>
																<span class='input-group-addon'>Rp.</span>
																<div class='form-line'>
																<input type='text' name='jumlah'  class='uang form-control' required='true'/>
																</div>
															</div>
														</div>
														<div class='form-group'>
															<label>Uraian Transaksi</label>
															<div class='form-line'>
															<input type='text' name='ket' class='form-control'  required='true'/>
															</div>
														</div>
												</div>
													<div class='modal-footer'>
															
														<button type='submit' name='simpan' class='btn btn-lg btn-success'><i class='fa fa-check'></i> Proses Transaksi</button>
															
													</div>
													</form>
												
											</div>					
										</div>											
									</div>
								
								";
						
						}
						elseif($pg=='cetak') {
							echo "
								<div class='row clearfix'>
											<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12'>
												<a onclick=frames['printrekap'].print()>
												<div class='info-box-2 bg-green hover-zoom-effect'>
													<div class='icon'>
														<i class='material-icons'>print</i>
													</div>
													<div class='content'>
														<div class='text'>REKAP DATA</div>
														<div class='number'>SISWA BARU</div>
													</div>
												</div></a>
											</div>
											<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12'>
												<a onclick=frames['printseragam'].print()>
												<div class='info-box-2 bg-blue hover-zoom-effect'>
													<div class='icon'>
														<i class='material-icons'>print</i>
													</div>
													<div class='content'>
														<div class='text'>REKAP DATA</div>
														<div class='number'>STATUS SISWA</div>
													</div>
												</div></a>
											</div>
											<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12'>
												<a onclick=frames['printkas'].print()>
												<div class='info-box-2 bg-red hover-zoom-effect'>
													<div class='icon'>
														<i class='material-icons'>print</i>
													</div>
													<div class='content'>
														<div class='text'>REKAP DATA</div>
														<div class='number'>BUKU KAS</div>
													</div>
												</div></a>
											</div>
											<iframe name='printseragam' src='printseragam.php' style='border:none;width:1px;height:1px;display: none;'></iframe>
											<iframe name='printkas' src='printkas.php' style='border:none;width:1px;height:1px;display: none;'></iframe>
											<iframe name='printrekap' src='printrekap.php' style='border:none;width:1px;height:1px;display: none;'></iframe>											
												
												
											
								</div>";
						
						}
						elseif($pg=='slide') {
							if(isset($_POST['simpanslide'])) {
									$nama = $_POST['nama'];				
									
										$filename = $_FILES['file']['name'];
										$temp = $_FILES['file']['tmp_name'];
										$ext = explode('.',$filename);
										$ext = end($ext);
										$dir='images/';
										$dest = $dir.time(). '' .$filename;
										$upload = move_uploaded_file($temp,'../'.$dest);
										if($upload) {
											$exec = mysql_query("INSERT INTO slide (nama,file) VALUES ('$nama','$dest')");
											
										} 
							}
							echo "
								<div class='row'>
									<div class='col-md-12'>
										<div class='card'>
											<div class='header'>
												<div class='row clearfix'>
													<div class='col-xs-12 col-sm-6'>
														<h2>PENGATURAN SLIDE</h2>
													</div>
													<div class='col-xs-12 col-sm-6 align-right'>
														<button class='btn btn-sm bg-purple' data-toggle='modal' data-target='#modalslide'><i class='glyphicon glyphicon-plus'></i> Tambah Slide</button>
													</div>
												</div>
												
											</div><!-- /.box-header -->
											<div class='body'>
												<div  class='table-responsive'>
												<table id='example1' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='5px'>#</th>
															<th>Gambar</th>
															<th>Nama Slide</th>
															
															
															<th >Aksi</th>
															
														</tr>
													</thead>
													<tbody>
													";
													$slideQ = mysql_query("SELECT * FROM slide ");
													while($slide = mysql_fetch_array($slideQ)) {
														
														$no++;
														echo "
														<tr>
															<td>$no </td>
															<td><img class='img img-responsive' src='$homeurl/$slide[file]' style='max-height:150px'/></td>
															<td>$slide[nama]</td>
															
															<td>
															
															<button class=' btn btn-xs bg-red' data-toggle='modal' data-target='#hapus$no'><i class='fa fa-trash'></i> Hapus</button>
															</td>
														</tr>
														
														";
													$info = info("Anda yakin akan menghapus slide ini  ?");
													if(isset($_POST['hapus'])) {
													$exec = mysql_query("DELETE  FROM slide WHERE id_slide= '$_REQUEST[idu]'");
													(!$exec) ? info("Gagal menyimpan","NO") : jump("?pg=$pg");
	
													}	
													echo "
													<div class='modal fade' id='hapus$no' style='display: none;'>
														<div class='modal-dialog'>
															<div class='modal-content'>
																<div class='modal-header bg-red'>
																<button  class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
																		<h3 class='modal-title'>Hapus Slide</h3>
																		</div>
																<div class='modal-body'>
																	<form action='' method='post'>
																	<input type='hidden' id='idu' name='idu' value='$slide[id_slide]'/>
																	<div class='callout '>
																			<h4>$info</h4>
																	</div>
																	<div class='modal-footer'>
																	<div class='box-tools pull-right'>
																				<button type='submit' name='hapus' class='btn btn-sm btn-danger'><i class='fa fa-trash-o'></i> Hapus</button>
																				
																	</div>	
																	</div>
																	</form>
																</div>
															</div>															
														</div>														
													</div>
														
														";
													}
													echo "
													</tbody>
												</table>
												</div>
											</div>
										</div>
									</div>
								</div>
									<div class='modal fade' id='modalslide' style='display: none;'>
										<div class='modal-dialog'>
											<div class='modal-content'>
												<div class='modal-header '>
												<button  class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
													<h3 class='modal-title'>Tambah Slide</h3>
												</div>
												<div class='modal-body'>
													<form action='' method='post' enctype='multipart/form-data'>
																											
														<div class='form-group'>
															<label>Nama Slide</label>
															<div class='form-line'>
																<input type='text' name='nama' class='form-control'  required='true'/>
															</div>
														</div>
														<div class='form-group'>
															<label>Logo</label>
															<div class='form-line'>
																<input type='file' name='file' class='form-control' required/>
															</div>	
														</div>
												</div>
													<div class='modal-footer'>
															
														<button type='submit' name='simpanslide' class='btn btn-lg btn-success'><i class='fa fa-check'></i> Simpan Slide</button>
															
													</div>
													</form>
												
											</div>					
										</div>											
									</div>";
						
						}
						elseif($pg=='info') {
							if($ac==''){
							if(isset($_POST['simpan'])) {
									$nama = $_POST['nama'];				
									$icon=$_POST['icon'];
									$text= $_POST ['txtinfo'];
									$status= $_POST ['status'];	
											$exec = mysql_query("INSERT INTO info (menu,icon,text,status) VALUES ('$nama','$icon','$text','$status')");
											
										
							}
							echo "
								<div class='row'>
									<div class='col-md-12'>
										<div class='card'>
											<div class='header'>
												<div class='row clearfix'>
													<div class='col-xs-12 col-sm-6'>
														<h2>MANAJEMEN INFO</h2>
													</div>
													<div class='col-xs-12 col-sm-6 align-right'>
														<button class='btn btn-sm bg-purple' data-toggle='modal' data-target='#modalinfo'><i class='glyphicon glyphicon-plus'></i> Tambah Info</button>
													</div>
												</div>
												
											</div><!-- /.box-header -->
											<div class='body'>
												<div  class='table-responsive'>
												<table id='example1' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='5px'>#</th>
															<th>Nama Menu</th>
															<th>Isi Info</th>
															<th width='80px' >Aksi</th>
															
														</tr>
													</thead>
													<tbody>
													";
													$infoxQ = mysql_query("SELECT * FROM info ");
													while($infox = mysql_fetch_array($infoxQ)) {
														
														$no++;
														echo "
														<tr>
															<td>$no </td>
															<td><button class='btn'><i class='material-icons'>$infox[icon]</i> <span>$infox[menu]</span></button></td>
															<td>".strip_tags($infox['text'])."</td>
															<td>
															<a href='?pg=$pg&ac=edit&id=$infox[id_info]'><button class=' btn btn-xs bg-orange' ><i class='glyphicon glyphicon-edit'></i></button></a>
															<button class=' btn btn-xs bg-red' data-toggle='modal' data-target='#hapus$no'><i class='glyphicon glyphicon-trash'></i></button>
															</td>
														</tr>
														
														";
													$info = info("Anda yakin akan menghapus menu info ini  ?");
													if(isset($_POST['hapus'])) {
													$exec = mysql_query("DELETE FROM info WHERE id_info= '$_REQUEST[ide]'");
													(!$exec) ? info("Gagal menyimpan","NO") : jump("?pg=$pg");
	
													}	
													echo "
													<div class='modal fade' id='hapus$no' style='display: none;'>
														<div class='modal-dialog'>
															<div class='modal-content'>
																<div class='modal-header bg-red'>
																<button  class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
																		<h3 class='modal-title'>Hapus Info</h3>
																		</div>
																<div class='modal-body'>
																	<form action='' method='post'>
																	<input type='hidden'  name='ide' value='$infox[id_info]' />
																	<div class='callout '>
																			<h4>$info</h4>
																	</div>
																	<div class='modal-footer'>
																	<div class='box-tools pull-right'>
																		<button type='submit' name='hapus' class='btn btn-sm btn-danger'><i class='fa fa-trash-o'></i> Hapus</button>
																				
																	</div>	
																	</div>
																	</form>
																</div>
															</div>															
														</div>														
													</div>
														
														";
													}
													echo "
													</tbody>
												</table>
												</div>
											</div>
										</div>
									</div>
								</div>
									<div class='modal fade' id='modalinfo' style='display: none;'>
										<div class='modal-dialog'>
											<div class='modal-content'>
												<div class='modal-header '>
												<button  class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
													<h3 class='modal-title'>Tambah Info</h3>
												</div>
												<div class='modal-body'>
													<form action='' method='post' enctype='multipart/form-data'>
																											
														<div class='form-group'>
															<label>Nama Menu</label>
															<div class='form-line'>
																<input type='text' name='nama' class='form-control'  required='true'/>
															</div>
														</div>
														<div class='form-group'>
															<label>Icon Menu</label>
															<div class='form-line'>
																<input type='text' name='icon' class='form-control'  required='true'/>
															</div>
														</div>
														<div class='form-group'>
															<label>Isi Info</label>
															<div class='form-line'>
																<textarea id='tinymce' name='txtinfo' class='form-control'  ></textarea>
															</div>
														</div>
														<div class='form-group'>
															<label>Icon Menu</label>
															<div class='form-line'>
																<select type='text' name='status' class='form-control'  required='true'>
																<option value='1'>Aktif</option>
																<option value='0'>Tidak</option>
																</select>
															</div>
														</div>
														
												</div>
													<div class='modal-footer'>
															
														<button type='submit' name='simpan' class='btn btn-lg btn-success'><i class='fa fa-check'></i> Simpan Info</button>
															
													</div>
													</form>
												
											</div>					
										</div>											
									</div>";
							}elseif($ac=='edit'){
								$id=$_GET['id'];
								$info=mysql_fetch_array(mysql_query("select * from info where id_info='$id'"));
								if(isset($_POST['perbarui'])) {
									$nama = $_POST['nama'];				
									$icon=$_POST['icon'];
									$text= $_POST ['txtinfo'];
									$status= $_POST ['status'];	
											$exec = mysql_query("update info set menu='$nama',icon='$icon',text='$text',status='$status' where id_info='$id'");
									if($exec){
										jump("?pg=$pg");
									}else{
									}
								}
								echo "
								<div class='row'>
									<div class='col-md-12'>
										<div class='card'>
											<form action='' method='post' enctype='multipart/form-data'>
											<div class='header'>
												<div class='row clearfix'>
													<div class='col-xs-12 col-sm-6'>
														<h2>EDIT INFO</h2>
													</div>
													<div class='col-xs-12 col-sm-6 align-right'>
														<button class='btn btn-sm bg-green' name='perbarui'><i class='glyphicon glyphicon-plus'></i> PERBARUI INFO</button>
													</div>
												</div>
												
											</div><!-- /.box-header -->
											<div class='body'>
													
																											
														<div class='form-group'>
															<label>Nama Menu</label>
															<div class='form-line'>
																<input type='text' name='nama' class='form-control' value='$info[menu]' required='true'/>
															</div>
														</div>
														<div class='form-group'>
															<label>Icon Menu</label>
															<div class='form-line'>
																<input type='text' name='icon' class='form-control' value='$info[icon]' required='true'/>
															</div>
														</div>
														<div class='form-group'>
															<label>Isi Info</label>
															<div class='form-line'>
																<textarea id='tinymce' name='txtinfo' class='form-control'  >$info[text]</textarea>
															</div>
														</div>
														<div class='form-group'>
															<label>Status Menu</label>
															<div class='form-line'>
																<select type='text' name='status' class='form-control'  required='true'>
																<option value='1'>Aktif</option>
																<option value='0'>Tidak</option>
																</select>
															</div>
														</div>
												</form>
											</div>
										</div>
									</div>
								</div>";	
							}
						
						}
						elseif($pg=='pengumuman') {
							if($ac==''){
							if(isset($_POST['simpan'])) {
									$nama = $_POST['nama'];				
									
									$text= $_POST ['txtinfo'];
									
											$exec = mysql_query("INSERT INTO pengumuman (judul,text) VALUES ('$nama','$text')");
											
										
							}
							echo "
								<div class='row'>
									<div class='col-md-12'>
										<div class='card'>
											<div class='header'>
												<div class='row clearfix'>
													<div class='col-xs-12 col-sm-6'>
														<h2>MANAJEMEN INFO</h2>
													</div>
													<div class='col-xs-12 col-sm-6 align-right'>
														<button class='btn btn-sm bg-purple' data-toggle='modal' data-target='#modalinfo'><i class='glyphicon glyphicon-plus'></i> Tambah Info</button>
													</div>
												</div>
												
											</div><!-- /.box-header -->
											<div class='body'>
												<div  class='table-responsive'>
												<table id='example1' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='5px'>#</th>
															<th>Judul</th>
															<th>Isi Pengumuman</th>
															<th>Tanggal Pengumuman</th>
															<th width='80px' >Aksi</th>
															
														</tr>
													</thead>
													<tbody>
													";
													$infoxQ = mysql_query("SELECT * FROM pengumuman ");
													while($infox = mysql_fetch_array($infoxQ)) {
														
														$no++;
														echo "
														<tr>
															<td>$no </td>
															<td><span class='label bg-blue'>$infox[judul]</span></button></td>
															<td>".strip_tags($infox['text'])."</td>
															<td>$infox[date]</td>
															<td>
															<a href='?pg=$pg&ac=edit&id=$infox[id_pengumuman]'><button class=' btn btn-xs bg-orange' ><i class='glyphicon glyphicon-edit'></i></button></a>
															<button class=' btn btn-xs bg-red' data-toggle='modal' data-target='#hapus$no'><i class='glyphicon glyphicon-trash'></i></button>
															</td>
														</tr>
														
														";
													$info = info("Anda yakin akan menghapus pengumuman ini  ?");
													if(isset($_POST['hapus'])) {
													$exec = mysql_query("DELETE FROM pengumuman WHERE id_pengumuman= '$_REQUEST[ide]'");
													(!$exec) ? info("Gagal menyimpan","NO") : jump("?pg=$pg");
	
													}	
													echo "
													<div class='modal fade' id='hapus$no' style='display: none;'>
														<div class='modal-dialog'>
															<div class='modal-content'>
																<div class='modal-header bg-red'>
																<button  class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
																		<h3 class='modal-title'>Hapus Info</h3>
																		</div>
																<div class='modal-body'>
																	<form action='' method='post'>
																	<input type='hidden'  name='ide' value='$infox[id_pengumuman]' />
																	<div class='callout '>
																			<h4>$info</h4>
																	</div>
																	<div class='modal-footer'>
																	<div class='box-tools pull-right'>
																		<button type='submit' name='hapus' class='btn btn-sm btn-danger'><i class='fa fa-trash-o'></i> Hapus</button>
																				
																	</div>	
																	</div>
																	</form>
																</div>
															</div>															
														</div>														
													</div>
														
														";
													}
													echo "
													</tbody>
												</table>
												</div>
											</div>
										</div>
									</div>
								</div>
									<div class='modal fade' id='modalinfo' style='display: none;'>
										<div class='modal-dialog'>
											<div class='modal-content'>
												<div class='modal-header '>
												<button  class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
													<h3 class='modal-title'>Tambah Pengumuman</h3>
												</div>
												<div class='modal-body'>
													<form action='' method='post' enctype='multipart/form-data'>
																											
														<div class='form-group'>
															<label>Judul Pengumuman</label>
															<div class='form-line'>
																<input type='text' name='nama' class='form-control'  required='true'/>
															</div>
														</div>
														
														<div class='form-group'>
															<label>Isi Info</label>
															<div class='form-line'>
																<textarea id='tinymce' name='txtinfo' class='form-control'  ></textarea>
															</div>
														</div>
														
														
												</div>
													<div class='modal-footer'>
															
														<button type='submit' name='simpan' class='btn btn-lg btn-success'><i class='fa fa-check'></i> Simpan</button>
															
													</div>
													</form>
												
											</div>					
										</div>											
									</div>";
							}elseif($ac=='edit'){
								$id=$_GET['id'];
								$info=mysql_fetch_array(mysql_query("select * from pengumuman where id_pengumuman='$id'"));
								if(isset($_POST['perbarui'])) {
									$nama = $_POST['nama'];				
									
									$text= $_POST ['txtinfo'];
									
											$exec = mysql_query("update pengumuman set judul='$nama',text='$text' where id_pengumuman='$id'");
									if($exec){
										jump("?pg=$pg");
									}else{
									}
								}
								echo "
								<div class='row'>
									<div class='col-md-12'>
										<div class='card'>
											<form action='' method='post' enctype='multipart/form-data'>
											<div class='header'>
												<div class='row clearfix'>
													<div class='col-xs-12 col-sm-6'>
														<h2>EDIT INFO</h2>
													</div>
													<div class='col-xs-12 col-sm-6 align-right'>
														<button class='btn btn-sm bg-green' name='perbarui'><i class='glyphicon glyphicon-plus'></i> PERBARUI INFO</button>
													</div>
												</div>
												
											</div><!-- /.box-header -->
											<div class='body'>
													
																											
														<div class='form-group'>
															<label>Judul Pengumuman</label>
															<div class='form-line'>
																<input type='text' name='nama' class='form-control' value='$info[judul]' required='true'/>
															</div>
														</div>
														
														<div class='form-group'>
															<label>Isi Pengumuman</label>
															<div class='form-line'>
																<textarea id='tinymce' name='txtinfo' class='form-control'  >$info[text]</textarea>
															</div>
														</div>
														
												</form>
											</div>
										</div>
									</div>
								</div>";	
							}
						
						}
						elseif($pg=='agenda') {
							if($ac==''){
							if(isset($_POST['simpan'])) {
									$nama = $_POST['nama'];				
									$tanggal=$_POST['tanggal'];
									$kegiatan= $_POST ['txtinfo'];
									$petugas=$_POST['petugas'];
									
											$exec = mysql_query("INSERT INTO agenda (judul,kegiatan,petugas,tanggal) VALUES ('$nama','$kegiatan','$petugas','$tanggal')");
											
										
							}
							echo "
								<div class='row'>
									<div class='col-md-12'>
										<div class='card'>
											<div class='header'>
												<div class='row clearfix'>
													<div class='col-xs-12 col-sm-6'>
														<h2>AGENDA KEGIATAN</h2>
													</div>
													<div class='col-xs-12 col-sm-6 align-right'>
														<button class='btn btn-sm bg-purple' data-toggle='modal' data-target='#modalinfo'><i class='glyphicon glyphicon-plus'></i> Tambah Agenda</button>
													</div>
												</div>
												
											</div><!-- /.box-header -->
											<div class='body'>
												<div  class='table-responsive'>
												<table id='example1' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='5px'>#</th>
															<th>Judul</th>
															<th>Kegiatan</th>
															<th>Petugas</th>
															<th>Tanggal</th>
															<th width='80px' >Aksi</th>
															
														</tr>
													</thead>
													<tbody>
													";
													$agendaQ = mysql_query("SELECT * FROM agenda ");
													while($agenda = mysql_fetch_array($agendaQ)) {
														
														$no++;
														echo "
														<tr>
															<td>$no </td>
															<td><span class='label bg-blue'>$agenda[judul]</span></button></td>
															<td>$agenda[kegiatan]</td>
															<td>$agenda[petugas]</td>
															<td>$agenda[tanggal]</td>
															<td>
															<a href='?pg=$pg&ac=edit&id=$agenda[id_agenda]'><button class=' btn btn-xs bg-orange' ><i class='glyphicon glyphicon-edit'></i></button></a>
															<button class=' btn btn-xs bg-red' data-toggle='modal' data-target='#hapus$no'><i class='glyphicon glyphicon-trash'></i></button>
															</td>
														</tr>
														
														";
													$info = info("Anda yakin akan menghapus agenda ini  ?");
													if(isset($_POST['hapus'])) {
													$exec = mysql_query("DELETE FROM agenda WHERE id_agenda= '$_REQUEST[ide]'");
													(!$exec) ? info("Gagal menyimpan","NO") : jump("?pg=$pg");
	
													}	
													echo "
													<div class='modal fade' id='hapus$no' style='display: none;'>
														<div class='modal-dialog'>
															<div class='modal-content'>
																<div class='modal-header bg-red'>
																<button  class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
																		<h3 class='modal-title'>Hapus Info</h3>
																		</div>
																<div class='modal-body'>
																	<form action='' method='post'>
																	<input type='hidden'  name='ide' value='$agenda[id_agenda]' />
																	<div class='callout '>
																			<h4>$info</h4>
																	</div>
																	<div class='modal-footer'>
																	<div class='box-tools pull-right'>
																		<button type='submit' name='hapus' class='btn btn-sm btn-danger'><i class='fa fa-trash-o'></i> Hapus</button>
																				
																	</div>	
																	</div>
																	</form>
																</div>
															</div>															
														</div>														
													</div>
														
														";
													}
													echo "
													</tbody>
												</table>
												</div>
											</div>
										</div>
									</div>
								</div>
									<div class='modal fade' id='modalinfo' style='display: none;'>
										<div class='modal-dialog'>
											<div class='modal-content'>
												<div class='modal-header '>
												<button  class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
													<h3 class='modal-title'>Tambah Kegiatan</h3>
												</div>
												<div class='modal-body'>
													<form action='' method='post' enctype='multipart/form-data'>
														<div class='form-group'>
															<label>Tanggal Kegiatan</label>
															<div class='form-line'>
																<input type='text' name='tanggal' class='datetimepicker form-control'  required='true'/>
															</div>
														</div>													
														<div class='form-group'>
															<label>Judul Kegiatan</label>
															<div class='form-line'>
																<input type='text' name='nama' class='form-control'  required='true'/>
															</div>
														</div>
														
														<div class='form-group'>
															<label>Uraian Kegiatan</label>
															<div class='form-line'>
																<textarea id='tinymce' name='txtinfo' class='form-control'  ></textarea>
															</div>
														</div>
														<div class='form-group'>
															<label>Penanggung Jawab</label>
															<div class='form-line'>
																<input type='text' name='petugas' class='form-control'  required='true'/>
															</div>
														</div>
														
												</div>
													<div class='modal-footer'>
															
														<button type='submit' name='simpan' class='btn btn-lg btn-success'><i class='fa fa-check'></i> Simpan</button>
															
													</div>
													</form>
												
											</div>					
										</div>											
									</div>";
							}elseif($ac=='edit'){
								$id=$_GET['id'];
								$info=mysql_fetch_array(mysql_query("select * from agenda where id_agenda='$id'"));
								if(isset($_POST['perbarui'])) {
									$nama = $_POST['nama'];				
									$tanggal=$_POST['tanggal'];
									$kegiatan= $_POST ['txtinfo'];
									$petugas=$_POST['petugas'];
											$exec = mysql_query("update agenda set judul='$nama',kegiatan='$kegiatan',tanggal='$tanggal',petugas='$petugas' where id_agenda='$id'");
									if($exec){
										jump("?pg=$pg");
									}else{
									}
								}
								echo "
								<div class='row'>
									<div class='col-md-12'>
										<div class='card'>
											<form action='' method='post' enctype='multipart/form-data'>
											<div class='header'>
												<div class='row clearfix'>
													<div class='col-xs-12 col-sm-6'>
														<h2>EDIT INFO</h2>
													</div>
													<div class='col-xs-12 col-sm-6 align-right'>
														<button class='btn btn-sm bg-green' name='perbarui'><i class='glyphicon glyphicon-plus'></i> PERBARUI INFO</button>
													</div>
												</div>
												
											</div><!-- /.box-header -->
											<div class='body'>
													
														<div class='form-group'>
															<label>Tanggal Kegiatan</label>
															<div class='form-line'>
																<input type='text' name='tanggal' class='datetimepicker form-control' value='$info[tanggal]' required='true'/>
															</div>
														</div>													
														<div class='form-group'>
															<label>Judul Kegiatan</label>
															<div class='form-line'>
																<input type='text' name='nama' class='form-control' value='$info[judul]'  required='true'/>
															</div>
														</div>
														
														<div class='form-group'>
															<label>Uraian Kegiatan</label>
															<div class='form-line'>
																<textarea id='tinymce' name='txtinfo' class='form-control'  >$info[kegiatan]</textarea>
															</div>
														</div>
														<div class='form-group'>
															<label>Penanggung Jawab</label>
															<div class='form-line'>
																<input type='text' name='petugas' class='form-control'  value='$info[petugas]' required='true'/>
															</div>
														</div>
														
												</form>
											</div>
										</div>
									</div>
								</div>";	
							}
						
						}
						elseif($pg=='pengawas') {
							echo "
								<div class='row'>
									<div class='col-md-8'>
										<div class='card'>
											<div class='header'>
												<h3 class='box-title'>Manajemen User</h3>
											</div><!-- /.box-header -->
											<div class='body'>
											<div class='table-responsive'>
												<table id='example1' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='5px'>#</th>
															<th>NIP</th>
															<th>Nama</th>
															<th>Username</th>
															<th>Level</th>
															<th width=60px></th>
														</tr>
													</thead>
													<tbody>";
													$pengawasQ = mysql_query("SELECT * FROM pengawas where level='admin' ORDER BY nama ASC");
													while($pengawas = mysql_fetch_array($pengawasQ)) {
														$no++;
														echo "
															<tr>
																<td>$no</td>
																<td>$pengawas[nip]</td>
																<td>$pengawas[nama]</td>
																<td>$pengawas[username]</td>
																<td>$pengawas[level]</td>
																<td align='center'>
																
																	<a href='?pg=$pg&ac=edit&id=$pengawas[id_pengawas]'> <button class='btn btn-xs btn-warning'><i class='glyphicon glyphicon-edit'></i></button></a>
																	<a href='?pg=$pg&ac=hapus&id=$pengawas[id_pengawas]'> <button class='btn btn-xs btn-danger'><i class='glyphicon glyphicon-remove'></i></button></a>
																
																</td>
															</tr>
														";
													}
													echo "
													</tbody>
												</table>
												</div>
											</div><!-- /.box-body -->
										</div><!-- /.box -->
									</div>
									<div class='col-md-4'>";
										if($ac=='') {
											if(isset($_POST['submit'])) {
												$nip = $_POST['nip'];
												$nama = $_POST['nama'];
												$nama = str_replace("'","&#39;",$nama);
												$username = $_POST['username'];
												$pass1 = $_POST['pass1'];
												$pass2 = $_POST['pass2'];
												
												$cekuser = mysql_num_rows(mysql_query("SELECT * FROM pengawas WHERE username='$username'"));
												if($cekuser>0) {
													$info = info("Username $username sudah ada!","NO");
												} else {
													if($pass1<>$pass2) {
														$info = info("Password tidak cocok!","NO");
													} else {
														$password = password_hash($pass1,PASSWORD_BCRYPT);
														$exec = mysql_query("INSERT INTO pengawas (nip,nama,username,password,level) VALUES ('$nip','$nama','$username','$password','admin')");
														(!$exec) ? $info = info("Gagal menyimpan!","NO") : jump("?pg=$pg");
													}
												}
											}
											echo "
												<form action='' method='post'>
													<div class='card'>
														<div class='header'>
															<div class='row clearfix'>
																<div class='col-xs-12 col-sm-6'>
																	<h2>Tambah</h2>
																</div>
																<div class='col-xs-12 col-sm-6 align-right'>
																	<button type='submit' name='submit' class='btn btn-sm btn-primary'><i class='glyphicon glyphicon-save'></i> <span>SAVE</span></button>
																</div>
															</div>
															
														</div><!-- /.box-header -->
														<div class='body'>
															$info
															<div class='form-group'>
																<label>NIP</label>
																<div class='form-line'>
																<input type='text' name='nip' class='form-control' required='true'/>
																</div>
															</div>
															<div class='form-group'>
																<label>Nama</label>
																<div class='form-line'>
																<input type='text' name='nama' class='form-control' required='true'/>
																</div>
															</div>
															<div class='form-group'>
																<label>Username</label>
																<div class='form-line'>
																<input type='text' name='username' class='form-control' required='true'/>
																</div>
															</div>
															
															<div class='form-group'>
																<div class='row'>
																	<div class='col-md-6'>
																		<label>Password</label>
																		<div class='form-line'>
																		<input type='password' name='pass1' class='form-control' required='true'/>
																		</div>
																	</div>
																	<div class='col-md-6'>
																		<label>Ulang Password</label>
																		<div class='form-line'>
																		<input type='password' name='pass2' class='form-control' required='true'/>
																		</div>
																	</div>
																</div>
															</div>
														</div><!-- /.box-body -->
													</div><!-- /.box -->
												</form>
											";
										}
										if($ac=='edit') {
											$id = $_GET['id'];
											$value = mysql_fetch_array(mysql_query("SELECT * FROM pengawas WHERE id_pengawas='$id'"));
											if(isset($_POST['submit'])) {
												$nip = $_POST['nip'];
												$nama = $_POST['nama'];
												$nama = str_replace("'","&#39;",$nama);
												$username = $_POST['username'];
												$pass1 = $_POST['pass1'];
												$pass2 = $_POST['pass2'];
												
												if($pass1<>'' AND $pass2<>'') {
													if($pass1<>$pass2) {
														$info = info("Password tidak cocok!","NO");
													} else {
														$password = password_hash($pass1,PASSWORD_BCRYPT);
														$exec = mysql_query("UPDATE pengawas SET nip='$nip',nama='$nama',username='$username',password='$password',level='admin' WHERE id_pengawas='$id'");
														
													}
												} else {
													$exec = mysql_query("UPDATE pengawas SET nip='$nip',nama='$nama',username='$username',level='admin' WHERE id_pengawas='$id'");
												}
												(!$exec) ? $info = info("Gagal menyimpan!","NO") : jump("?pg=$pg");
											}
											echo "
												<form action='' method='post'>
													<div class='card'>
														<div class='header'>
															<div class='row clearfix'>
																<div class='col-xs-12 col-sm-6'>
																	<h2>EDIT</h2>
																</div>
																<div class='col-xs-12 col-sm-6 align-right'>
																	<button type='submit' name='submit' class='btn btn-sm btn-primary'><i class='glyphicon glyphicon-save'></i> <span>SAVE</span></button>
																	<a href='?pg=$pg' class='btn btn-sm btn-danger'><i class='glyphicon glyphicon-remove'></i></a>
																</div>
															</div>
														</div><!-- /.box-header -->
														<div class='body'>
															$info
															<div class='form-group'>
																<label>NIP</label>
																<div class='form-line'>
																<input type='text' name='nip' value='$value[nip]' class='form-control' required='true'/>
																</div>
																
															</div>
															<div class='form-group'>
																<label>Nama</label>
																<div class='form-line'>
																<input type='text' name='nama' value='$value[nama]' class='form-control' required='true'/>
																</div>
															</div>
															<div class='form-group'>
																<label>Username</label>
																<div class='form-line'>
																<input type='text' name='username' value='$value[username]' class='form-control' required='true'/>
																</div>
															</div>
															
															<div class='form-group'>
																<div class='row'>
																	<div class='col-md-6'>
																		<label>Password</label>
																		<div class='form-line'>
																		<input type='password' name='pass1' class='form-control'/>
																		</div>
																	</div>
																	<div class='col-md-6'>
																		<label>Ulang Password</label>
																		<div class='form-line'>
																		<input type='password' name='pass2' class='form-control'/>
																		</div>
																	</div>
																</div>
															</div>
														</div><!-- /.box-body -->
													</div><!-- /.box -->
												</form>
											";
										}
										if($ac=='hapus') {
											$id = $_GET['id'];
											$info = info("Anda yakin akan menghapus pengawas ini?");
											if(isset($_POST['submit'])) {
												$exec = mysql_query("DELETE FROM pengawas WHERE id_pengawas='$id'");
												(!$exec) ? $info = info("Gagal menghapus!","NO") : jump("?pg=$pg");
											}
											echo "
												<form action='' method='post'>
													<div class='card'>
														<div class='header'>
															<h3 class='box-title'>Hapus</h3>
															<div class='box-tools pull-right btn-group'>
																
															</div>
														</div><!-- /.box-header -->
														<div class='body'>
															$info
															<button type='submit' name='submit' class='btn btn-sm btn-danger'><i class='glyphicon glyphicon-trash'></i> Hapus</button>
																<a href='?pg=$pg' class='btn btn-sm btn-default' title='Batal'><i class='glyphicon glyphicon-remove'></i>Cancel</a>
														</div><!-- /.box-body -->
													</div><!-- /.box -->
												</form>
											";
										}
										echo "
									</div>
								</div>
							";
						} 
						elseif($pg=='setweb') {
							$info1 ='';
							if(isset($_POST['simpan'])) {
								$buka = $_POST['buka'];
								$tutup = $_POST['tutup'];
								$exec = mysql_query("UPDATE setting SET open_ppdb='$buka',close_ppdb='$tutup' WHERE id_setting='1'");
								if($exec) {
									$info1 = info('Berhasil menyimpan pengaturan!','OK');
									jump("?pg=$pg");
									
								} else {
									$info1 = info('Gagal menyimpan pengaturan!','NO');
									jump("?pg=$pg");
								}
							}
 
							echo "
							<div class='row'>
								<div class='col-md-12'>								
										<form action='' method='post'>
											<div class='card'>
												<div class='header'>
													<div class='row clearfix'>
														<div class='col-xs-12 col-sm-6'>
															<h2>PENGATURAN WEB</h2>
														</div>
														<div class='col-xs-12 col-sm-6 align-right'>
															<button name='simpan' class='btn btn-sm bg-green'><i class='glyphicon glyphicon-save'></i> <span>SIMPAN</span></button>
														</div>
													</div>
												</div><!-- /.box-header -->
												<div class='body'>
												$info1
													<div class='form-group'>
														<label>Tanggal Buka Pendaftaran</label>
														<div class='form-line'>
														<input type='text' name='buka' value='$setting[open_ppdb]' class='datepicker form-control' required='true'/>
														</div>
													</div>
													<div class='form-group'>
														<label>Tanggal Tutup Pendaftaran</label>
														<div class='form-line'>
														<input type='text' name='tutup' value='$setting[close_ppdb]' class='datepicker form-control' required='true'/>
														</div>
													</div>
												</div><!-- /.box-body -->
											</div><!-- /.box -->
										</form>	
									</div>
								</div>
							";
							

						}
						elseif($pg=='pengaturan') {
							$info1 = $info2 = $info3 = $info4 = '';
							if(isset($_POST['submit1'])) {
								$alamat = nl2br($_POST['alamat']);
								$header = nl2br($_POST['header']);
								$exec = mysql_query("UPDATE setting SET aplikasi='$_POST[aplikasi]',sekolah='$_POST[sekolah]',jenjang='$_POST[jenjang]',kepsek='$_POST[kepsek]',nip='$_POST[nip]',alamat='$alamat',kecamatan='$_POST[kecamatan]',kota='$_POST[kota]',telp='$_POST[telp]',fax='$_POST[fax]',web='$_POST[web]',email='$_POST[email]',header='$header' WHERE id_setting='1'");
								if($exec) {
									$info1 = info('Berhasil menyimpan pengaturan!','OK');
									if($_FILES['logo']['name']<>'') {
										$logo = $_FILES['logo']['name'];
										$temp = $_FILES['logo']['tmp_name'];
										$ext = explode('.',$logo);
										$ext = end($ext);
										$dest = 'images/logoapp.'.$ext;
										$upload = move_uploaded_file($temp,'../'.$dest);
										if($upload) {
											$exec = mysql_query("UPDATE setting SET logo='$dest' WHERE id_setting='1'");
											$info1 = info('Berhasil menyimpan pengaturan!','OK');
										} else {
											$info1 = info('Gagal menyimpan pengaturan!','NO');
										}
									}
								} else {
									$info1 = info('Gagal menyimpan pengaturan!','NO');
								}
							}
							
							if(isset($_POST['submit3'])) {
								$password = $_POST['password'];
                                if(!password_verify($password,$pengawas['password'])) {
                                    $info4 = info('Password salah!','NO');
                                } else {
                                    if(!empty($_POST['data'])) {
                                        $data = $_POST['data'];
                                        if($data<>'') {
                                            foreach($data as $table) {
                                                if($table<>'pengawas') {
                                                    mysql_query("TRUNCATE $table");
                                                } else {
                                                    mysql_query("DELETE FROM $table WHERE level!='admin'");
                                                }
                                            }
                                            $info4 = info('Data terpilih telah dikosongkan!','OK');
                                        }
                                    }
                                }
							}
							$admin = mysql_fetch_array(mysql_query("SELECT * FROM pengawas WHERE level='admin' AND id_pengawas='1'"));
							$setting = mysql_fetch_array(mysql_query("SELECT * FROM setting WHERE id_setting='1'"));
							$setting['alamat'] = str_replace('<br />','',$setting['alamat']);
							$setting['header'] = str_replace('<br />','',$setting['header']);
 
							echo "
								<div class='row'>
								
								<div class='col-md-12 notif'></div>
									<div class='col-md-6'>
										<form action='' method='post' enctype='multipart/form-data'>
											<div class='card'>
												<div class='header'>
													<div class='row clearfix'>
																<div class='col-xs-12 col-sm-6'>
																	<h2>Pengaturan Aplikasi</h2>
																</div>
																<div class='col-xs-12 col-sm-6 align-right'>
																	<button type='submit' name='submit1' class='btn btn-sm btn-primary'><i class='glyphicon glyphicon-save'></i> <span>SAVE</span></button>
																</div>
															</div>
												</div><!-- /.box-header -->
												<div class='body'>
													$info1
													<div class='form-group'>
														<label>Nama Aplikasi</label>
														<div class='form-line'>
														<input type='text' name='aplikasi' value='$setting[aplikasi]' class='form-control' required='true'/>
														</div>
													</div>
													<div class='form-group'>
														
														<label>Nama Sekolah</label>
														<div class='form-line'>
														<input type='text' name='sekolah' value='$setting[sekolah]' class='form-control' required='true'/>
														</div>
																												
													</div>
													<div class='form-group'>
																<label>Jenjang</label>
																<select name='jenjang' class='form-control' required='true'>
																<option value='$setting[jenjang]'>$setting[jenjang]</option>
																<option value='SMP'>SMP/MTS</option>
																<option value='SMK'>SMK/SMA/MA</option>
																
															</select>
															</div>
													<div class='form-group'>
														<label>Kepala Sekolah</label>
														<div class='form-line'>
														<input type='text' name='kepsek' value='$setting[kepsek]' class='form-control'/>
														</div>
													</div>
													<div class='form-group'>
														<label>NIP Kepala Sekolah</label>
														<div class='form-line'>
														<input type='text' name='nip' value='$setting[nip]' class='form-control'/>
														</div>
													</div>
													<div class='form-group'>
														<label>Alamat</label>
														<div class='form-line'>
														<textarea name='alamat' class='form-control' rows='3'>$setting[alamat]</textarea>
														</div>
													</div>
													<div class='form-group'>
														<div class='row'>
															<div class='col-md-6'>
																<label>Kecamatan</label>
																<div class='form-line'>
																<input type='text' name='kecamatan' value='$setting[kecamatan]' class='form-control'/>
																</div>
															</div>
															<div class='col-md-6'>
																<label>Kota/Kabupaten</label>
																<div class='form-line'>
																<input type='text' name='kota' value='$setting[kota]' class='form-control'/>
																</div>
															</div>
														</div>
													</div>
													<div class='form-group'>
														<div class='row'>
															<div class='col-md-6'>
																<label>Telepon</label>
																<div class='form-line'>
																<input type='text' name='telp' value='$setting[telp]' class='form-control'/>
																</div>
															</div>
															<div class='col-md-6'>
																<label>Fax</label>
																<div class='form-line'>
																<input type='text' name='fax' value='$setting[fax]' class='form-control'/>
																</div>
															</div>
														</div>
													</div>
													<div class='form-group'>
														<div class='row'>
															<div class='col-md-6'>
																<label>Website</label>
																<div class='form-line'>
																<input type='text' name='web' value='$setting[web]' class='form-control'/>
																</div>
															</div>
															<div class='col-md-6'>
																<label>E-mail</label>
																<div class='form-line'>
																<input type='text' name='email' value='$setting[email]' class='form-control'/>
																</div>
															</div>
														</div>
													</div>
													<div class='form-group'>
														<div class='row'>
															<div class='col-md-6'>
																<label>Logo</label>
																<div class='form-line'>
																<input type='file' name='logo' class='form-control'/>
																</div>
															</div>
															<div class='col-md-6'>
																&nbsp;<br/>
																<a href='$homeurl/$setting[logo]'><img class='img img-responsive' src='$homeurl/$setting[logo]'height='100'></a>
															</div>
														</div>
													</div>
													<div class='form-group'>
														<label>Header Laporan</label>
														<div class='form-line'>
														<textarea name='header' class='form-control' rows='3'>$setting[header]</textarea>
														</div>
													</div>
												</div><!-- /.box-body -->
											</div><!-- /.box -->
										</form>
									</div>
									<div class='col-md-6'>
										
										<form action='' method='post'>
											<div class='card'>
												<div class='header'>
													<div class='row clearfix'>
																<div class='col-xs-12 col-sm-6'>
																	<h2>KOSONGKAN DATA</h2>
																</div>
																<div class='col-xs-12 col-sm-6 align-right'>
																	<button type='submit' name='submit3' class='btn btn-sm bg-red' disabled><i class='glyphicon glyphicon-trash'></i> <span>HAPUS</span></button>
																</div>
															</div>
												</div><!-- /.box-header -->
												<div class='body'>
													$info4
													<div class='form-group'>
														<label>Pilih Data</label>
                                                        <div class='row'>
                                                            <div class='col-md-5'>
                                                                <div class='demo-checkbox'>
																	<input type='checkbox' id='basic_checkbox_1' name='data[]' value='daftar' />
																	<label for='basic_checkbox_1'>Data Pendaftaran</label>
																	<input type='checkbox' id='basic_checkbox_2' name='data[]' value='bayar'  />
																	<label for='basic_checkbox_2'>Data Pembayaran</label>
																	<input type='checkbox' id='basic_checkbox_3' name='data[]' value='bukukas' />
																	<label for='basic_checkbox_3'>Data Buku Kas</label>
                                                                   	<input type='checkbox' id='basic_checkbox_4' name='data[]' value='mou' />
																	<label for='basic_checkbox_4'>Data Asal Sekolah</label>														 
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class='col-md-7'>
                                                                <p class='text-danger'><i class='fa fa-warning'></i> <strong>Mohon di ingat!</strong> Data yang telah dikosongkan tidak dapat dikembalikan.</p>
                                                            </div>
                                                        </div>
													</div>
													<div class='form-group'>
														<label>Password Admin</label>
														<div class='form-line' disabled>
														<input type='password' name='password' class='form-control' required='true' disabled/>
														</div>
													</div>
                                                    
												</div><!-- /.box-body -->
											</div><!-- /.box -->
										</form>
										<div class='card'>
												<div class='header'>
													<h2 >Backup Data</h2>
													
												</div><!-- /.box-header -->
												<div class='body'>
													<p>Klik Tombol dibawah ini untuk membackup database </p>
														<button  id='btnbackup' class='btn btn-success'><i class='fa fa-database'></i> Backup Data</button>
													
                                                    
												</div><!-- /.box-body -->
											</div><!-- /.box -->
											<div class='card'>
												<div class='header'>
													<h2 >Restore Data</h2>
													
											</div><!-- /.box-header -->
												<div class='body'>
												<form method='post' action='' name='postform' enctype='multipart/form-data' >
													<p>Klik Tombol dibawah ini untuk merestore database </p>
													<div class='col-md-8'>
													<input class='form-control' name='datafile' type='file'/>
													</div>
														<button name='restore' class='btn btn-primary'><i class='fa fa-database'></i> Restore Data</button>
													
                                                </form>  
												</div><!-- /.box-body -->
											</div><!-- /.box -->
									</div>
								</div>
							";
							if(isset($_POST['restore'])){
								restore($_FILES['datafile']);
								
							}
							else
							{
								unset($_POST['restore']);
							}

						} else {
							echo "
								<div class='error-page'>
									<h2 class='headline text-yellow'> 404</h2>
									<div class='error-content'>
										<br/>
										<h3><i class='fa fa-warning text-yellow'></i> Upss! Halaman tidak ditemukan.</h3>
										<p>
											Halaman yang anda inginkan saat ini tidak tersedia.<br/>
											Silahkan kembali ke <a href='?'><strong>dashboard</strong></a> dan coba lagi.<br/>
											Hubungi petugas <strong><i>Developer</i></strong> jika ini adalah sebuah masalah.
										</p>
									</div><!-- /.error-content -->
								</div><!-- /.error-page -->
							";
						}
						
						echo "
			</div>
        </div>
    </section>

				<script src='$homeurl/plugins/jquery/jquery.min.js'></script>
				<script src='$homeurl/plugins/bootstrap/js/bootstrap.js'></script>
				<script src='$homeurl/plugins/bootstrap-select/js/bootstrap-select.js'></script>
				<script src='$homeurl/plugins/jquery-slimscroll/jquery.slimscroll.js'></script>
				<script src='$homeurl/plugins/node-waves/waves.js'></script>
				<script src='$homeurl/plugins/tableedit/jquery.tabledit.js'></script>
				<script src='$homeurl/plugins/jquery-datatable/jquery.dataTables.js'></script>
				<script src='$homeurl/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js'></script>
				<script src='$homeurl/plugins/autosize/autosize.js'></script>
				<script src='$homeurl/plugins/momentjs/moment.js'></script>
				
				<script src='$homeurl/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js'></script>
				<script src='$homeurl/js/admin.js'></script>
				<script src='$homeurl/js/demo.js'></script>
				
				<script src='$homeurl/plugins/jquerymask/jquery.mask.min.js'></script>
				<script src='$homeurl/plugins/sweetalert2/dist/sweetalert2.min.js'></script>
				<script src='$homeurl/css/lightbox-master/dist/ekko-lightbox.js'></script>
				";
				
?>
				<script>
					
					
					$('#example1').DataTable({});
					
					$(function () {
					//Textare auto growth
					autosize($('textarea.auto-growth'));

					//Datetimepicker plugin
					$('.datetimepicker').bootstrapMaterialDatePicker({
						format: 'YYYY-MM-DD HH:mm',
						clearButton: true,
						weekStart: 1
					});

					$('.datepicker').bootstrapMaterialDatePicker({
						format: 'YYYY-MM-DD',
						clearButton: true,
						weekStart: 1,
						time: false
					});

					$('.timepicker').bootstrapMaterialDatePicker({
						format: 'HH:mm',
						clearButton: true,
						date: false
					});
				});
					
					
					function printbukti(no_daftar) {
						$('#framecetak').attr('src','kartu.php?id='+no_daftar);
					}
					
					
					$(document).ready(function() {
						
					$( '.uang' ).mask('000.000.000', {reverse: true});
					 $('#simpandata').submit(function(e) {
						 e.preventDefault();
							$.ajax({
								type: 'POST',
								url: $(this).attr('action'),
								data: $(this).serialize(),
								success: function(data) {
									$('#loadframe').attr('src', $('#loadframe').attr('src'));
									$('#btnprosesbayar').removeAttr('disabled');
									swal({
										  position: 'top-end',
										  type: 'success',
										  title: 'Data Berhasil disimpan',
										  showConfirmButton: false,
										  timer: 1500
										});
										
								}
							})
							return false;
					 });
					$('#formbayar').submit(function(e) {
						$('.uang').unmask();
						 e.preventDefault();
							$.ajax({
								type: 'POST',
								url: $(this).attr('action'),
								data: $(this).serialize(),
								success: function(data) {
									$('#loadframe').attr('src', $('#loadframe').attr('src'));
									$('#btnprosesbayar').attr('disabled','disabled');
									
									swal({
										  position: 'top-end',
										  type: 'success',
										  title: 'Data Berhasil disimpan',
										  showConfirmButton: false,
										  timer: 1500
										});
								}
							})
							return false;
					 });
					 $('#formtambahbayar').submit(function(e) {
						 $('.uang').unmask();
						 e.preventDefault();
							$.ajax({
								type: 'POST',
								url: $(this).attr('action'),
								data: $(this).serialize(),
								success: function(data) {
									$('#loadframe2').attr('src', $('#loadframe2').attr('src'));
									$('#modalbayar').modal('hide');
									$('#tablebayar').load(location.href + ' #tablebayar');
									
									
								}
							})
							return false;
					 });
					 $('#formtambahtransaksi').submit(function(e) {
						 $('.uang').unmask();
						 e.preventDefault();
							$.ajax({
								type: 'POST',
								url: $(this).attr('action'),
								data: $(this).serialize(),
								success: function(data) {
									
									$('#modaltransaksi').modal('hide');
									document.location.reload();
									
									
								}
							})
							return false;
					 });
					$(document).on('click','.hapusbayar',function(){
						
						var idbayar=$(this).data('id');
						console.log(idbayar);
						swal({
							  title: 'Are you sure?',
							  text: 'Akan menghapus data pembayaran ini!',
							  type: 'warning',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Ya, Hapus!'
							}).then((result) => {
							  if (result.value) {
								 $.ajax({
									type:'POST',
									url:'hapusbayar.php',
									data:'id='+idbayar,
									success:function(response) {
										$('#loadframe2').attr('src', $('#loadframe2').attr('src'));
										$('#tablebayar').load(location.href + ' #tablebayar');
										document.location.reload();
										
									}
								});
								
							  }
							})
			
					
					});
					$(document).on('click','.hapuskas',function(){
						
						var idkas=$(this).data('id');
						console.log(idkas);
						swal({
							  title: 'Are you sure?',
							  text: 'Akan menghapus data kas ini!',
							  type: 'warning',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Ya, Hapus!'
							}).then((result) => {
							  if (result.value) {
								 $.ajax({
									type:'POST',
									url:'hapuskas.php',
									data:'id='+idkas,
									success:function(response) {
										
										document.location.reload();
										
									}
								});
								
							  }
							})
			
					
					});
						
					$('.alert-dismissible').fadeTo(2000, 500).slideUp(500, function(){
					$('.alert-dismissible').alert('close');
					});
					
					$('#btnbackup').click(function(){
						
						$('.notif').load('backup.php');	
						console.log('sukses');
			
					});
					
					
 
					});
				</script>
				<script>
					
						function kirim_form(){
							var homeurl;
							homeurl = '$homeurl';
							var jawab = $('#headerkartu').val();
							$.ajax({
								type:'POST',
								url:'simpanheader.php',
								data:'jawab='+jawab,
								success:function(response) {
									location.reload();
								}
							});
						}	
						
								
				</script>
		
				<script>
					$(function () {
   
    //TinyMCE
    tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true,
		paste_data_images: true,
										paste_as_text: true,
										images_upload_handler: function (blobInfo, success, failure) {
											success('data:' + blobInfo.blob().type + ';base64,' + blobInfo.base64());
										},
										image_class_list: [
										{title: 'Responsive', value: 'img-responsive'}
										],
    });
    
    tinyMCE.baseURL = '../plugins/tinymce';
});
				</script>
 <script>
				<?php if($pg=='jurusan'){ ?>
				$(document).ready(function() {
					$('#tablejurusan').Tabledit({
						url: 'example.php?pg=jurusan',
						restoreButton: false, 
						columns: {
							identifier: [1, 'id'],
							editable: [[2, 'namajurusan']]
						}
						
					});
					
				});
				<?php } ?>
				<?php if($pg=='mou'){ ?>
				$(document).ready(function() {
				$('#tablemou').Tabledit({
						url: 'example.php?pg=mou',
						restoreButton: false,
						columns: {
							identifier: [1, 'id'],
							editable: [[2, 'sekolah'],[3, 'status','{"ya": "ya", "tidak": "tidak"}']]
						}
					});
				});
				<?php } ?>
				
				<?php if($pg=='biaya'){ ?>
				$(document).ready(function() {
				$('#tablebiaya').Tabledit({
						url: 'example.php?pg=biaya',
						restoreButton: false,
						columns: {
							identifier: [1, 'id'],
							editable: [[2, 'namabiaya'],[3, 'jumlah']]
						}
					});
				});
				<?php } ?>
				<?php if($pg=='jnssekolah'){ ?>
				$(document).ready(function() {
					$('#tablejs').Tabledit({
						url: 'example.php?pg=jnssekolah',
						restoreButton: false, 
						columns: {
							identifier: [1, 'id'],
							editable: [[2, 'namajsekolah']]
						}
						
					});
					
				});
				<?php } ?>
				<?php if($pg=='jkelamin'){ ?>
				$(document).ready(function() {
					$('#tablesex').Tabledit({
						url: 'example.php?pg=jkelamin',
						restoreButton: false, 
						columns: {
							identifier: [1, 'id'],
							editable: [[2, 'namakelamin']]
						}
						
					});
					
				});
				<?php } ?>
				<?php if($pg=='kelambi'){ ?>
				$(document).ready(function() {
					$('#tableseragam').Tabledit({
						url: 'example.php?pg=kelambi',
						restoreButton: false, 
						columns: {
							identifier: [1, 'id'],
							editable: [[2, 'namaser']]
						}
						
					});
					
				});
				<?php } ?>
				<?php if($pg=='statussantri'){ ?>
				$(document).ready(function() {
					$('#tablestatus').Tabledit({
						url: 'example.php?pg=statussantri',
						restoreButton: false, 
						columns: {
							identifier: [1, 'id'],
							editable: [[2, 'namastatusnya']]
						}
						
					});
					
				});
				<?php } ?>
				</script>   
				<script type="text/javascript">
    function EnableDisableTextBox(ddlModels) {
        var selectedValue = ddlModels.options[ddlModels.selectedIndex].value;
        var txtOther = document.getElementById("txtOther");
        txtOther.disabled = selectedValue == 0 ? false : true;
        if (!txtOther.disabled) {
            txtOther.focus();
        }
    }
	</script>
<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
</script>
</body>

</html>
