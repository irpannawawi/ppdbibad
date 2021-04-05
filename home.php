<?php
	require("config/config.default.php");
	require("config/config.function.php");
	require("config/functions.crud.php");
	require("config/excel_reader.php");
	
if(isset($_SESSION['no_daftar'])){
	$no_daftar=$_SESSION['no_daftar'];
	$siswa = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM daftar  WHERE no_daftar='$_SESSION[no_daftar]'"));
	$sekolah=mysqli_fetch_array(mysqli_query($koneksi,"select * from mou where kode_mou='$siswa[asal_sekolah]'"));
	$jskol=mysqli_fetch_array(mysqli_query($koneksi,"select * from jenis_sekolah where id_jenissekolah='$siswa[kode_jenissekolah]'"));
	$statusdaftar=mysqli_fetch_array(mysqli_query($koneksi,"select * from seragam where kode_seragam='$siswa[baju]'"));
	$jurusannama=mysqli_fetch_array(mysqli_query($koneksi,"select * from jurusan where kode_jur='$siswa[jurusan]'"));
	(isset($_GET['pg'])) ? $pg = $_GET['pg'] : $pg = '';
	(isset($_GET['ac'])) ? $ac = $_GET['ac'] : $ac = '';
	
	
							
echo "
							
<!DOCTYPE html>
		<html>
			<head>
  				<meta charset='utf-8'>
 				<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  				<title>Menu Siswa | $setting[aplikasi]</title>
  				<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
				 <link href='https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext' rel='stylesheet'>
				<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet' >
  				<link rel='shortcut icon' href='favicon.png' type='image/x-icon'/>
				
				<link rel='stylesheet' href='$homeurl/plugins/bootstrap/css/bootstrap.css'/>
				<link rel='stylesheet' href='$homeurl/plugins/bootstrap-select/css/bootstrap-select.css'/>
				<link rel='stylesheet' href='$homeurl/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css'/>
				<link rel='stylesheet' href='$homeurl/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css'/>
				<link rel='stylesheet' href='$homeurl/plugins/node-waves/waves.css'/>
				<link rel='stylesheet' href='$homeurl/plugins/animate-css/animate.css'/>
				<link rel='stylesheet' href='$homeurl/css/style.css'/>
				<link rel='stylesheet' href='$homeurl/css/themes/all-themes.css'/>
				<link rel='stylesheet' href='$homeurl/plugins/sweetalert2/dist/sweetalert2.min.css'>
				

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
                <a class='navbar-brand' href='$homeurl/home.php'><image src='$homeurl/$setting[logo]' style='margin-top:-15px;' height='40px'></a>
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
                <div class='info-container m-t--10'>
                    <div class='name' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><b>$siswa[nama]</b></div>
	  
				   
                    <div class='btn-group user-helper-dropdown'>
                        <i class='material-icons' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>keyboard_arrow_down</i>
                        <ul class='dropdown-menu pull-right'>
                            <li><a href='?pg=profil'><i class='material-icons'>person</i>Profile</a></li>
                            
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
                    <li class='header'> Status Anda: ";
											
									if ($siswa['baju']==''){
										echo 'Tahap Verifikasi';
										}else{
										echo $statusdaftar['ukuran_seragam'];
										
										
							}
											echo "</li>
                    <li>
                        <a href='?'>
                            <i class='material-icons'>home</i>
                            <span>Home</span>
                        </a>
                    </li>
                   
                    
                    <li ><a href='?pg=profil'><i class='material-icons'>person</i> <span>Data Siswa</span></a></li>
					
					<li ><a href='?pg=pengumuman'><i class='material-icons'>assignment</i> <span>Pengumuman</span></a></li>
					<li ><a href='?pg=uangtransfer'><i class='material-icons'>camera</i> <span>UPLOAD DOKUMEN</span></a></li>
					<li ><a id='btncetakkartu' onclick=frames['frameresult'].print() '><i class='material-icons'>print</i> <span>Print Kartu Daftar</span></a></li>
					<iframe id='loadframe' name='frameresult' src='kartudaftar.php?id=$id' style='border:none;width:1px;height:1px;'></iframe>
					
                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class='legal'>
                <div class='copyright'>
                    &copy; 2020 <a href='https://www.eldesign.web.id' target='_blank'>eLDesign</a>.
                </div>
                <div class='version'>
                    <b>Version: </b> 1.0.0
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
							echo "
							<div class='row'>
                                <div class='col-md-8'>
                                	<div class='card'>
										<div class='header'>
											<h2 class='box-title'>PENGUMUMAN TERBARU</h2>		
										</div><!-- /.box-header -->
                                		<div class='body'>
                                	        ";
											$pengumumanQ = mysqli_query($koneksi,"SELECT * FROM pengumuman  ORDER BY date DESC");
											while($pengumuman = mysqli_fetch_array($pengumumanQ)) {
											echo "
											<div class='card'>
												<div class='body'>
													<h3 class='m-t--10'>$pengumuman[judul]</h3>
													<label class='label bg-indigo'>$pengumuman[date]</label> 
													<br><br>
													$pengumuman[text]
												</div>
											</div>";
											}
										echo "		
										</div>
                                	</div>
                                </div>
								<div class='col-md-4'>
                                	<div class='card'>
										<div class='header'>
											<h2 class='box-title'>NOTIFIKASI</h2>		
										</div><!-- /.box-header -->
                                		<div class='body'>
											<div class='alert bg-blue alert-dismissible' role='alert'>
												<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
												Selamat Datang di Web Pendataan Siswa Baru 
											</div>	
                                	        <div class='alert bg-pink alert-dismissible' role='alert'>
												<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
												Segera lengkapi data anda !
											</div>
											
										</div>
                                	</div>
                                </div>
							</div>";
						
						} 
						elseif($pg=='profil') {
							if($ac==''){
							echo "
								<div class='row'>
                                	<div class='col-md-3'>
                                	<div class='card'>
                                		<div class='body'>
                                	         <center><img src='$homeurl/images/user.png' width='100' height='100' style='border:2px solid yellow;' alt='User' /></center>                		
                                		
                                			<h4 class='profile-username text-center'>$siswa[nama]</h4>
											
											<a href='?pg=$pg&ac=edit' class='btn btn-lg waves-effect btn-block bg-orange'><i class='glyphicon glyphicon-edit'></i> Edit Data</a>
                                            <a aria-expanded='true' href='#detail' data-toggle='tab' class='btn waves-effect btn-sm btn-block bg-blue'>Data Siswa</a>
											<a aria-expanded='true' href='#alamat' data-toggle='tab' class='btn waves-effect btn-sm btn-block bg-blue'>Alamat</a>
											<a aria-expanded='true' href='#orangtua' data-toggle='tab' class='btn waves-effect btn-sm btn-block bg-blue'>Orang Tua</a>
											<a aria-expanded='true' href='#asal' data-toggle='tab' class='btn waves-effect btn-sm btn-block bg-blue'>Asal Sekolah</a>
											<a aria-expanded='true' href='#kip' data-toggle='tab' class='btn waves-effect btn-sm btn-block bg-blue'>Kartu Indonesia Pintar</a>
											
                                            
                                		</div>
                                		</div>
                                	</div>
                                	
                                	<div class='col-md-9'>
									<div class='card'>
									<div class='body'>
                            		<div class='nav-tabs-custom'>
                                        
                                        <div class='tab-content'>
                                          <div class='tab-pane active' id='detail'>
                            						<div class='row margin-bottom'>
													<form action='' method='post'>
                            						<div class='col-sm-12'>
														
                                                      <table class='table table-striped table-bordered'>
                                                      <tbody>
                                                        
                                                        <tr><th scope='row'>No Pendaftaran</th> <td>$siswa[no_daftar]</td></tr>
														<tr><th scope='row'>NIK / NISN</th> <td>$siswa[nik] / $siswa[nisn]</td></tr>
                                                        <tr><th scope='row'>Nama Lengkap</th> <td>$siswa[nama]</td></tr>
                                                        <tr><th scope='row'>Tempat, Tanggal Lahir</th> <td>$siswa[tempat_lahir], $siswa[tanggal_lahir]</td></tr>
                                                        <tr><th scope='row'>Jenis Kelamin</th> <td>$siswa[jenis_kelamin]</td></tr>
														<tr><th scope='row'>No Registrasi Akta Lahir</th> <td>$siswa[noreg_akta]</td></tr>
														<tr><th scope='row'>Hobi</th> <td>$siswa[hobi]</td></tr>
														<tr><th scope='row'>Cita-Cita</th> <td>$siswa[citacita]</td></tr>
														<tr><th scope='row'>No KKS</th> <td>$siswa[no_kks]</td></tr>
														<tr><th scope='row'>Penerima KPS/PKH</th> <td>$siswa[penerima_kps]</td></tr>
														<tr><th scope='row'>No KPS/PKH</th> <td>$siswa[no_kps]</td></tr>
														<tr><th scope='row'>Anak Ke</th> <td>$siswa[anak_ke]</td></tr>
														<tr><th scope='row'>Jumlah Saudara Kandung</th> <td>$siswa[saudara]</td></tr>
														<tr><th scope='row'>Tinggi Badan</th> <td>$siswa[tinggi] Cm</td></tr>
														<tr><th scope='row'>Berat Badan</th> <td>$siswa[berat] Kg</td></tr>
														<tr><th scope='row'>No HP</th> <td>$siswa[hp]</td></tr>
                                                        <tr><th scope='row'>Pilihan Daftar</th> <td>$jurusannama[nama_jur]</td></tr>
                                                        <tr><th scope='row'>Status Pendaftaran</th> <td>$statusdaftar[ukuran_seragam]</td></tr>
														
                                                      </tbody>
                                                      </table>
														
                                                     </div>
                            						   </form>
                            						</div>
                            				</div>
											<div class='tab-pane' id='alamat'>
                            					<div class='row margin-bottom'>
													<div class='col-sm-12'>	
														<table class='table table-striped table-bordered'>
														  <tbody> 
															<tr align='center'><td colspan='2'><b>DATA ALAMAT</b></td></tr>
															<tr><th scope='row'>Alamat</th> <td>$siswa[alamat]</td></tr>
															<tr><th scope='row'>Alamat yg mudah dihubungi</th> <td>$siswa[alamat_dua]</td></tr>
															<tr><th scope='row'>Kelurahan</th> <td>$siswa[kelurahan]</td></tr>
															<tr><th scope='row'>Kecamatan</th> <td>$siswa[kecamatan]</td></tr>
															<tr><th scope='row'>Alat Transportasi ke Sekolah</th> <td>$siswa[alat_transportasi]</td></tr>
															<tr><th scope='row'>Jenis Tinggal</th> <td>$siswa[jenis_tinggal]</td></tr>
															<tr><th scope='row'>Jarak Ke Sekolah</th> <td>$siswa[jarak]</td></tr>
															<tr><th scope='row'>Waktu Tempuh Ke Sekolah</th> <td>$siswa[waktu_tempuh]</td></tr>
														  </tbody>
														</table>	
                                                    </div>
                            					</div>
                            				</div>
                            				<div class='tab-pane' id='orangtua'>
                            					<div class='row margin-bottom'>
													<div class='col-sm-12'>	
														<table class='table table-striped table-bordered'>
														  <tbody> 
															<tr align='center'><td colspan='2'><b>DATA NO KK</b></td></tr>
															<tr><th scope='row'>No KK</th> <td>$siswa[no_kk]</td></tr>
															<tr align='center'><td colspan='2'><b>DATA AYAH</b></td></tr>
															<tr><th scope='row'>NIK Ayah</th> <td>$siswa[nik_ayah]</td></tr>
															<tr><th scope='row'>Nama Ayah</th> <td>$siswa[nama_ayah]</td></tr>
															<tr><th scope='row'>Tahun Lahir</th> <td>$siswa[tahun_lahir_ayah]</td></tr>
															<tr><th scope='row'>Pekerjaan</th> <td>$siswa[pekerjaan_ayah]</td></tr>
															<tr><th scope='row'>Pendidikan</th> <td>$siswa[pendidikan_ayah]</td></tr>
															<tr><th scope='row'>Penghasilan</th> <td>$siswa[penghasilan_ayah]</td></tr>
															<tr align='center'><td colspan='2'><b>DATA IBU</b></td></tr>
															<tr><th scope='row'>NIK Ibu</th> <td>$siswa[nik_ibu]</td></tr>
															<tr><th scope='row'>Nama Ibu</th> <td>$siswa[nama_ibu]</td></tr>
															<tr><th scope='row'>Nama Kecil Ibu</th> <td>$siswa[nama_kecil_ibu]</td></tr>
															<tr><th scope='row'>Alamat Ortu</th> <td>$siswa[alamat_ortu]</td></tr>
															<tr><th scope='row'>Tahun Lahir</th> <td>$siswa[tahun_lahir_ibu]</td></tr>
															<tr><th scope='row'>Pekerjaan</th> <td>$siswa[pekerjaan_ibu]</td></tr>
															<tr><th scope='row'>Pendidikan</th> <td>$siswa[pendidikan_ibu]</td></tr>
															<tr><th scope='row'>Penghasilan</th> <td>$siswa[penghasilan_ibu]</td></tr>
															<tr align='center'><td colspan='2'><b>DATA WALI</b></td></tr>
															<tr><th scope='row'>Nama Wali</th> <td>$siswa[nama_wali]</td></tr>
															<tr><th scope='row'>Pekerjaan Wali</th> <td>$siswa[pekerjaan_wali]</td></tr>
															<tr><th scope='row'>Alamat Wali</th> <td>$siswa[alamat_wali]</td></tr>
														  </tbody>
														</table>	
                                                    </div>
                            					</div>
                            				</div>
											
											<div class='tab-pane' id='asal'>
                            					<div class='row margin-bottom'>
													<div class='col-sm-12'>	
														<table class='table table-striped table-bordered'>
														  <tbody> 
															<tr align='center'><td colspan='2'><b>DATA ASAL SEKOLAH</b></td></tr>
															<tr><th scope='row'>Asal Sekolah</th> <td>$sekolah[sekolah_mou]$siswa[sekolah_lain]</td></tr>
															<tr><th scope='row'>Status Sekolah</th> <td>$siswa[status_sekolah]</td></tr>
															<tr><th scope='row'>Jenis Sekolah</th> <td>$jskol[nama_jenissekolah]</td></tr>
															<tr><th scope='row'>NPSN Sekolah Asal</th> <td>$siswa[npsn_sekolah_asal]</td></tr>
															<tr><th scope='row'>NSS Sekolah Asal</th> <td>$siswa[nss_sekolah]</td></tr>
															<tr><th scope='row'>KAB/KOTA Sekolah</th> <td>$siswa[kab_sekolah_asal]</td></tr>
															<tr><th scope='row'>No Peserta Ujian</th> <td>$siswa[nopes_ujian]</td></tr>
															<tr><th scope='row'>No Ijazah</th> <td>$siswa[no_ijazah]</td></tr>
															
															
														  </tbody>
														</table>	
                                                    </div>
                            					</div>
                            				</div>
                            				
											<div class='tab-pane' id='kip'>
                            					<div class='row margin-bottom'>
													<div class='col-sm-12'>	
														<table class='table table-striped table-bordered'>
														  <tbody> 
															<tr align='center'><td colspan='2'><b>DATA KIP</b></td></tr>
															<tr><th scope='row'>Usulan Dari Sekolah Layak PIP</th> <td>$siswa[usulan_pip]</td></tr>
															<tr><th scope='row'>Penerima KIP</th> <td>$siswa[penerima_kip]</td></tr>
															<tr><th scope='row'>No KIP</th> <td>$siswa[no_kip]</td></tr>
															<tr><th scope='row'>Nama Tertera di KIP</th> <td>$siswa[tertera_kip]</td></tr>
															<tr><th scope='row'>Terima Fisik Kartu KIP</th> <td>$siswa[terima_kip]</td></tr>
															<tr><th scope='row'>Alasan Layak PIP</th> <td>$siswa[alasan_pip]</td></tr>
															
															
														  </tbody>
														</table>	
                                                    </div>
                            					</div>
                            				</div>
											
                            				</div> 
                                          
                                        </div>
                                        <!-- /.tab-content -->
										</div>
                            		</div>
                                </div> <!--row-->
									
								";
							}elseif($ac=='edit'){
							$pekerjaan=array("Buruh","Karyawan Swasta","Pedagang","Pensiunan","Petani","Peternak","PNS/TNI/POLRI","Sudah Meninggal","Tenaga Kerja Indonesia","Wirausaha");
							$penghasilan=array("Kurang dari Rp. 500.000","Rp. 500.000 s/d Rp. 999.000","Rp. 1 jt s/d Rp 2jt","Rp. 2jt s/d Rp. 4 jt","Rp. 5 jt s/d Rp. 20 jt", "Tidak Berpenghasilan");
							$pendidikan=array("Tidak Sekolah","SD Sederajat","SMP Sederajat","SMA Sederajat","D3","S1","S2");
							$transport=array("Jalan Kaki","Angkutan Umum","Sepeda Motor","Sepeda");
							$jenistinggal=array("Bersama Orang Tua","Bersama Wali", "Kost");
							$penerimakps=array("ya","tidak");
							$usulanpip=array("ya","tidak");
							$penerimakip=array("ya","tidak");
							$terimakip=array("ya","tidak");
							$alasanpip=array("Pemegang Kartu PKH/KPS/KIP","Penerima BSM 2014","Yatim Piatu/ Panti Asuhan/ Panti Sosial","Dampak Bencana Alam","Pernah Drop Out","Siswa Miskin/Rentan Miskin","Daerah Konflik");
							echo "
							
                            <div class='card'>
								<div class='header'>
									<h2 class='box-title'>PERBARUI DATA</h2>		
								</div><!-- /.box-header -->
								<div class='body'>
								<div class='panel-group' id='editprofil' role='tablist' aria-multiselectable='true'>
                                        <div class='panel panel-col-pink'>
                                            <div class='panel-heading' role='tab' id='headingOne_17'>
                                                <h4 class='panel-title'>
                                                    <a role='button' data-toggle='collapse' data-parent='#editprofil' href='#datadiri' aria-expanded='false' aria-controls='collapseOne_17' class='collapsed'>
                                                        <i class='material-icons'>perm_contact_calendar</i> Data Diri
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id='datadiri' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingOne_17' aria-expanded='false' style='height: 0px;'>
                                                <div class='panel-body'>
                                                    <form id='formprofil' class='form-horizontal'>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>NAMA LENGKAP</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line disabled'>
																		<input type='text' name='nama' class='form-control' value='$siswa[nama]' readonly>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>NIK</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='nik' class='form-control' value='$siswa[nik]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>NISN</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='nisn' class='form-control' value='$siswa[nisn]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label' >
																<label>TEMPAT</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='tempat' class='form-control' value='$siswa[tempat_lahir]' readonly>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>TANGGAL LAHIR</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='tgl_lahir' class='form-control' value='$siswa[tanggal_lahir]' readonly>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>JENIS KELAMIN</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='namajk' class='form-control' value='$siswa[jenis_kelamin]' readonly>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>ANAK KE</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='anakke' class='form-control' value='$siswa[anak_ke]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>JUMLAH SAUDARA</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='saudara' class='form-control' value='$siswa[saudara]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>TINGGI BADAN (cm)</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='tinggi' class='form-control' value='$siswa[tinggi]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>BERAT BADAN (kg)</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='berat' class='form-control' value='$siswa[berat]'>
																	</div>
																</div>
															</div>
														</div>
														
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>No Registrasi Akta Lahir</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='noregakta' class='form-control' value='$siswa[noreg_akta]'>
																	</div>
																</div>
															</div>
														</div>
														
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>Hobi</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='hobi' class='form-control' value='$siswa[hobi]'>
																	</div>
																</div>
															</div>
														</div>
														
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>Cita Cita</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='cta' class='form-control' value='$siswa[citacita]'>
																	</div>
																</div>
															</div>
														</div>
														
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>No KKS</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='nokks' class='form-control' value='$siswa[no_kks]'>
																	</div>
																</div>
															</div>
														</div>
														
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>Penerima KPS/PKH</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<select class='form-control' name='penerimakps' required>
																			<option value=''>- Pilih -</option>";
																				foreach($penerimakps as $val){
																				if($siswa['penerima_kps']==$val){
																				echo "<option value='$val' selected>$val </option>";
																				}else{
																				echo "<option value='$val'>$val </option>";
																				}
																				}
																		echo "
																		</select>
																	</div>
																</div>
															</div>
														</div>
														
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>No KPS/PKH</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='nokps' class='form-control' value='$siswa[no_kps]'>
																	</div>
																</div>
															</div>
														</div>
														
														<div class='row clearfix'>
															<div class='col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5'>
																<button type='submit' class='btn btn-lg bg-green m-t-15 waves-effect'><i class='material-icons'>history</i><span>SIMPAN</span></button>
																
															</div>
														</div>
													</form>
                                                </div>
                                            </div>
                                        </div> <!--Acordion -->
										<div class='panel panel-col-blue'>
                                            <div class='panel-heading' role='tab' id='headingOne_1'>
                                                <h4 class='panel-title'>
                                                    <a role='button' data-toggle='collapse' data-parent='#editprofil' href='#dataalamat' aria-expanded='false' aria-controls='collapseOne_1' class='collapsed'>
                                                        <i class='material-icons'>perm_contact_calendar</i> Data Alamat
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id='dataalamat' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingOne_1' aria-expanded='false' style='height: 0px;'>
                                                <div class='panel-body'>
                                                    <form id='formalamat' class='form-horizontal'>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>ALAMAT</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='alamat' class='form-control' value='$siswa[alamat]'  readonly>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>ALAMAT YG MUDAH DIHUBUNGI</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='alamatmudah' class='form-control' value='$siswa[alamat_dua]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>RT/RW</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='rt' class='form-control' value='$siswa[rt]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>DESA/KELURAHAN</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='kel' class='form-control' value='$siswa[kelurahan]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>KECAMATAN</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='kec' class='form-control' value='$siswa[kecamatan]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>KOTA/KABUPATEN</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='kota' class='form-control' value='$siswa[kota]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>PROVINSI</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='provinsi' class='form-control' value='$siswa[provinsi]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>ALAT TRANSPORTASI</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<select class='form-control' name='transportasi' required>
																			<option value=''>Pilih Transportasi</option>";
																				foreach($transport as $val){
																				if($siswa['alat_transportasi']==$val){
																				echo "<option value='$val' selected>$val </option>";
																				}else{
																				echo "<option value='$val'>$val </option>";
																				}
																				}
																		echo "
																		</select>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>JENIS TINGGAL</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<select class='form-control' name='jenis_tinggal' required>
																			<option value=''>Pilih Jenis Tinggal</option>";
																				foreach($jenistinggal as $val){
																				if($siswa['jenis_tinggal']==$val){
																				echo "<option value='$val' selected>$val </option>";
																				}else{
																				echo "<option value='$val'>$val </option>";
																				}
																				}
																		echo "
																		</select>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>JARAK KE SEKOLAH</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='jarak' class='form-control' value='$siswa[jarak]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>WAKTU TEMPUH KE SEKOLAH</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='waktu' class='form-control' value='$siswa[waktu_tempuh]'>
																	</div>
																</div>
															</div>
														</div>
														
														<div class='row clearfix'>
															<div class='col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5'>
																<button  type='submit' class='btn btn-lg bg-green m-t-15 waves-effect'><i class='material-icons'>history</i><span>SIMPAN</span></button>
																
															</div>
														</div>
													</form>
                                                </div>
                                            </div>
                                        </div> <!--Acordion -->
                                        <div class='panel panel-col-green'>
                                            <div class='panel-heading' role='tab' id='headingOne_1'>
                                                <h4 class='panel-title'>
                                                    <a role='button' data-toggle='collapse' data-parent='#editprofil' href='#dataortu' aria-expanded='false' aria-controls='collapseOne_1' class='collapsed'>
                                                        <i class='material-icons'>perm_contact_calendar</i> Data Orang Tua
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id='dataortu' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingOne_1' aria-expanded='false' style='height: 0px;'>
                                                <div class='panel-body'>
                                                    <form id='formortu' class='form-horizontal'>
													<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>NO KK</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='no_kk' class='form-control' value='$siswa[no_kk]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>NIK AYAH</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='nik_ayah' class='form-control' value='$siswa[nik_ayah]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>NAMA AYAH</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='nama_ayah' class='form-control' value='$siswa[nama_ayah]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>TAHUN LAHIR AYAH</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='tahun_ayah' class='form-control' value='$siswa[tahun_lahir_ayah]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>PEKERJAAN</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<select class='form-control' name='pekerjaan_ayah' required>
																			<option value=''>Pilih Pekerjaan</option>";
																				foreach($pekerjaan as $val){
																				if($siswa['pekerjaan_ayah']==$val){
																				echo "<option value='$val' selected>$val </option>";
																				}else{
																				echo "<option value='$val'>$val </option>";
																				}
																				}
																		echo "
																		</select>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>PENDIDIKAN</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<select class='form-control' name='pendidikan_ayah' required>
																			<option value=''>Pilih Pendidikan</option>";
																				foreach($pendidikan as $val){
																				if($siswa['pendidikan_ayah']==$val){
																				echo "<option value='$val' selected>$val </option>";
																				}else{
																				echo "<option value='$val'>$val </option>";
																				}
																				}
																		echo "
																		</select>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>PENGHASILAN</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<select class='form-control' name='penghasilan_ayah' required>
																			<option value=''>Pilih Penghasilan</option>";
																				foreach($penghasilan as $val){
																				if($siswa['penghasilan_ayah']==$val){
																				echo "<option value='$val' selected>$val </option>";
																				}else{
																				echo "<option value='$val'>$val </option>";
																				}
																				}
																		echo "
																		</select>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>NIK IBU</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='nik_ibu' class='form-control' value='$siswa[nik_ibu]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>NAMA IBU</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='nama_ibu' class='form-control' value='$siswa[nama_ibu]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>NAMA KECIL IBU</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='nama_kecil_ibu' class='form-control' value='$siswa[nama_kecil_ibu]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>ALAMAT ORTU</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='alamatortu' class='form-control' value='$siswa[alamat_ortu]'>
																	</div>
																</div>
															</div>
														</div>
														
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>TAHUN LAHIR IBU</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='tahun_ibu' class='form-control' value='$siswa[tahun_lahir_ibu]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>PEKERJAAN</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		
																		<select class='form-control' name='pekerjaan_ibu' required>
																			<option value=''>Pilih Pekerjaan</option>";
																				foreach($pekerjaan as $val){
																				if($siswa['pekerjaan_ibu']==$val){
																				echo "<option value='$val' selected>$val </option>";
																				}else{
																				echo "<option value='$val'>$val </option>";
																				}
																				}
																		echo "
																		</select>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>PENDIDIKAN</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<select class='form-control' name='pendidikan_ibu' required>
																			<option value=''>Pilih Pendidikan</option>";
																				foreach($pendidikan as $val){
																				if($siswa['pendidikan_ibu']==$val){
																				echo "<option value='$val' selected>$val </option>";
																				}else{
																				echo "<option value='$val'>$val </option>";
																				}
																				}
																		echo "
																		</select>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>PENGHASILAN</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<select class='form-control' name='penghasilan_ibu' required>
																			<option value=''>Pilih Penghasilan</option>";
																				foreach($penghasilan as $val){
																				if($siswa['penghasilan_ibu']==$val){
																				echo "<option value='$val' selected>$val </option>";
																				}else{
																				echo "<option value='$val'>$val </option>";
																				}
																				}
																		echo "
																		</select>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>NAMA WALI</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='namawali' class='form-control' value='$siswa[nama_wali]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>PEKERJAAN WALI</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		
																		<select class='form-control' name='pekerjaan_wali'>
																			<option value=''>Pilih Pekerjaan</option>";
																				foreach($pekerjaan as $val){
																				if($siswa['pekerjaan_wali']==$val){
																				echo "<option value='$val' selected>$val </option>";
																				}else{
																				echo "<option value='$val'>$val </option>";
																				}
																				}
																		echo "
																		</select>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>ALAMAT WALI</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='alamat_wali' class='form-control' value='$siswa[alamat_wali]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5'>
																<button id='btndaftar' type='submit' class='btn btn-lg bg-green m-t-15 waves-effect'><i class='material-icons'>history</i><span>SIMPAN</span></button>
																
															</div>
														</div>
													</form>
                                                </div>
                                            </div>
                                        </div> <!--Acordion -->
										<div class='panel panel-col-orange'>
                                            <div class='panel-heading' role='tab' id='headingOne_1'>
                                                <h4 class='panel-title'>
                                                    <a role='button' data-toggle='collapse' data-parent='#editprofil' href='#datasekolah' aria-expanded='false' aria-controls='collapseOne_1' class='collapsed'>
                                                        <i class='material-icons'>perm_contact_calendar</i> Data Asal Sekolah
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id='datasekolah' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingOne_1' aria-expanded='false' style='height: 0px;'>
                                                <div class='panel-body'>
                                                    <form id='formsekolah' class='form-horizontal'>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>ASAL SEKOLAH</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='asal' class='form-control' value='$sekolah[sekolah_mou]$siswa[sekolah_lain]'  disabled>
																	</div>
																</div>
															</div>
														</div>
														
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>NPSN Sekolah Asal</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='npsnsd' class='form-control' value='$siswa[npsn_sekolah_asal]'>
																	</div>
																</div>
															</div>
														</div>
														
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>NSS sekolah asal</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='nss' class='form-control' value='$siswa[nss_sekolah]'>
																	</div>
																</div>
															</div>
														</div>
														
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>KAB Sekolah Asal</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='kabsd' class='form-control' value='$siswa[kab_sekolah_asal]'>
																	</div>
																</div>
															</div>
														</div>
														
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>NO PESERTA UN</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='nopes' class='form-control' value='$siswa[nopes_ujian]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>NO IJAZAH</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='ijazah' class='form-control' value='$siswa[no_ijazah]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>NO SKHUN</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='skhun' class='form-control' value='$siswa[skhun]'>
																	</div>
																</div>
															</div>
														</div>
														
														
														<div class='row clearfix'>
															<div class='col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5'>
																<button id='btndaftar' type='submit' class='btn btn-lg bg-green m-t-15 waves-effect'><i class='material-icons'>history</i><span>SIMPAN</span></button>
																
															</div>
														</div>
													</form>
                                                </div>
                                            </div>
                                        </div> <!--Acordion xxxx-->
										
										<div class='panel panel-col-orange'>
                                            <div class='panel-heading' role='tab' id='headingOne_1'>
                                                <h4 class='panel-title'>
                                                    <a role='button' data-toggle='collapse' data-parent='#editprofil' href='#datakip' aria-expanded='false' aria-controls='collapseOne_1' class='collapsed'>
                                                        <i class='material-icons'>perm_contact_calendar</i> Data KIP
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id='datakip' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingOne_1' aria-expanded='false' style='height: 0px;'>
                                                <div class='panel-body'>
                                                    <form id='formkip' class='form-horizontal'>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>Usulan Layak PIP</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<select class='form-control' name='usulpip'>
																			<option value=''>- Pilih -</option>";
																				foreach($usulanpip as $val){
																				if($siswa['usulan_pip']==$val){
																				echo "<option value='$val' selected>$val </option>";
																				}else{
																				echo "<option value='$val'>$val </option>";
																				}
																				}
																		echo "
																		</select>
																	</div>
																</div>
															</div>
														</div>
														
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>Penerima KIP</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<select class='form-control' name='penerimakipp'>
																			<option value=''>- Pilih -</option>";
																				foreach($penerimakip as $val){
																				if($siswa['penerima_kip']==$val){
																				echo "<option value='$val' selected>$val </option>";
																				}else{
																				echo "<option value='$val'>$val </option>";
																				}
																				}
																		echo "
																		</select>
																	</div>
																</div>
															</div>
														</div>
														
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>No KIP</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='nokip' class='form-control' value='$siswa[no_kip]'>
																	</div>
																</div>
															</div>
														</div>
														
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>Nama Tertera Di KIP</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<input type='text' name='naterkip' class='form-control' value='$siswa[tertera_kip]'>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>Terima Fisik Kartu KIP</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<select class='form-control' name='terimakipp'>
																			<option value=''>- Pilih -</option>";
																				foreach($terimakip as $val){
																				if($siswa['terima_kip']==$val){
																				echo "<option value='$val' selected>$val </option>";
																				}else{
																				echo "<option value='$val'>$val </option>";
																				}
																				}
																		echo "
																		</select>
																	</div>
																</div>
															</div>
														</div>
														<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>Alasan Layak PIP</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		<select class='form-control' name='alasanpipp'>
																			<option value=''>- Pilih -</option>";
																				foreach($alasanpip as $val){
																				if($siswa['alasan_pip']==$val){
																				echo "<option value='$val' selected>$val </option>";
																				}else{
																				echo "<option value='$val'>$val </option>";
																				}
																				}
																		echo "
																		</select>
																	</div>
																</div>
															</div>
														</div>
														
														
														<div class='row clearfix'>
															<div class='col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5'>
																<button id='btndaftar' type='submit' class='btn btn-lg bg-green m-t-15 waves-effect'><i class='material-icons'>history</i><span>SIMPAN</span></button>
																
															</div>
														</div>
													</form>
                                                </div>
                                            </div>
                                        </div> <!--Acordion xxxx-->
										
                                        </div>
								</div>
							</div>";
							}
						}
						elseif($pg=='pengumuman') {
							echo "
							<div class='row'>
                                	<div class='col-md-12'>
                                	<div class='card'>
										<div class='header'>
											<h2 class='box-title'>SEMUA PENGUMUMAN</h2>		
										</div><!-- /.box-header -->
                                		<div class='body'>
                                	        ";
											$pengumumanQ = mysqli_query($koneksi,"SELECT * FROM pengumuman  ORDER BY date DESC");
											while($pengumuman = mysqli_fetch_array($pengumumanQ)) {
											echo "
											<div class='card'>
												<div class='body'>
													<h3 class='m-t--10'>$pengumuman[judul]</h3>
													<label class='label bg-indigo'>$pengumuman[date]</label> 
													<br><br>
													$pengumuman[text]
												</div>
											</div>";
											}
									echo "		
                                	</div>
                                		</div>
                                		</div>
                                	</div>
								</div>";
						}
						elseif($pg=='uangtransfer') {
							if(isset($_POST['simpantransfer'])) {
									$nama = $_POST['nama'];				
									
										$filename = $_FILES['file']['name'];
										$temp = $_FILES['file']['tmp_name'];
										$tipe_file = $_FILES['file']['type'];
										$ext = explode('.',$filename);
										$ext = end($ext);
										$dir='upload/';
										$dest = $dir.time(). '' .$filename;
										$upload = move_uploaded_file($temp,'./'.$dest);

										if($upload) {
											$exec = mysqli_query($koneksi,"INSERT INTO gambar_transfer(nama,file,no_daftar,tipe_file) VALUES ('$nama','$dest','$_SESSION[no_daftar]','$tipe_file')");
										
											
										} 
							}
							echo "
								<div class='row'>
									<div class='col-md-12'>
										<div class='card'>
											<div class='header'>
												<div class='row clearfix'>
													<div class='col-xs-12 col-sm-6'>
														<h2>UPLOAD PHOTO terlebih dahulu</h2>
													</div>
													<div class='col-xs-12 col-sm-6 align-right'>
														<button class='btn btn-sm bg-purple' data-toggle='modal' data-target='#modalslide'><i class='glyphicon glyphicon-plus'></i> Tambah Gambar</button>
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
															<th>Keterangan</th>
															
															
															<th >Aksi</th>
															
														</tr>
													</thead>
													<tbody>
													";
													
													$gambar = mysqli_query($koneksi,"SELECT * FROM gambar_transfer where no_daftar='$_SESSION[no_daftar]'");
													while($slide = mysqli_fetch_array($gambar)) {
														
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
													$info = info("Anda yakin akan menghapus gambar ini  ?");
													if(isset($_POST['hapus'])) {
													$exec = mysqli_query($koneksi,"DELETE  FROM gambar_transfer WHERE id_transfer= '$_REQUEST[idu]'");
													
													(!$exec) ? info("Gagal menyimpan","NO") : jump("?pg=$pg");
	
													}	
													echo "
													<div class='modal fade' id='hapus$no' style='display: none;'>
														<div class='modal-dialog'>
															<div class='modal-content'>
																<div class='modal-header bg-red'>
																<button  class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
																		<h3 class='modal-title'>Hapus Gambar</h3>
																		</div>
																<div class='modal-body'>
																	<form action='' method='post'>
																	<input type='hidden' id='idu' name='idu' value='$slide[id_transfer]'/>
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
													<h3 class='modal-title'>Tambah Gambar</h3>
												</div>
												<div class='modal-body'>
													<form action='' method='post' enctype='multipart/form-data'>
																											
														<div class='form-group'>
															<label>Keterangan</label>
															<div class='form-line'>
																<input type='text' name='nama' class='form-control'  required='true'/>
															</div>
														</div>
														<div class='form-group'>
															<label>Pilih Gambar</label>
															<div class='form-line'>
																<input type='file' name='file' class='form-control' required/>
															</div>	
														</div>
												</div>
													<div class='modal-footer'>
															
														<button type='submit' name='simpantransfer' class='btn btn-lg btn-success'><i class='fa fa-check'></i> Simpan Photo</button>
															
													</div>
													</form>
												
											</div>					
										</div>											
									</div>";
						
						}
						else {
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
				<script src='$homeurl/plugins/tinymce/tinymce.js'></script>
				";
				
?>
				<script>
					
					
					$('#example1').DataTable({});
					
					$(function () {
					//Textare auto growth
					autosize($('textarea.auto-growth'));

					//Datetimepicker plugin
					$('.datetimepicker').bootstrapMaterialDatePicker({
						format: 'dddd YYYY-MM-DD - HH:mm',
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
					
					
					$('#formprofil').submit(function(e) {
						var id;
						id ='<?php echo $no_daftar ?>';
						 e.preventDefault();
							$.ajax({
								type: 'POST',
								url: 'simpandata.php?pg=simpanprofil&id='+id,
								data: $(this).serialize(),
								beforeSend: function() {
										swal({
											
											  text: 'Proses menyimpan data',
											  timer: 1000,
											  onOpen: () => {
												swal.showLoading()
											  }
										});
								},
								success: function(data) {
									swal({
										  position: 'top-end',
										  type: 'success',
										  title: 'Data Berhasil disimpan',
										  showConfirmButton: true
										 
										});
										
								}
							})
						return false;
					});
					$('#formalamat').submit(function(e) {
						var id;
						id ='<?php echo $no_daftar ?>';
						 e.preventDefault();
							$.ajax({
								type: 'POST',
								url: 'simpandata.php?pg=simpanalamat&id='+id,
								data: $(this).serialize(),
								beforeSend: function() {
										swal({
											
											  text: 'Proses menyimpan data',
											  timer: 1000,
											  onOpen: () => {
												swal.showLoading()
											  }
										});
								},
								success: function(data) {
									swal({
										  position: 'top-end',
										  type: 'success',
										  title: 'Data Berhasil disimpan',
										  showConfirmButton: true
										 
										});
										
								}
							})
						return false;
					});
					$('#formortu').submit(function(e) {
						var id;
						id ='<?php echo $no_daftar ?>';
						 e.preventDefault();
							$.ajax({
								type: 'POST',
								url: 'simpandata.php?pg=simpanortu&id='+id,
								data: $(this).serialize(),
								beforeSend: function() {
										swal({
											
											  text: 'Proses menyimpan data',
											  timer: 1000,
											  onOpen: () => {
												swal.showLoading()
											  }
										});
								},
								success: function(data) {
									swal({
										  position: 'top-end',
										  type: 'success',
										  title: 'Data Berhasil disimpan',
										  showConfirmButton: true
										 
										});
										
								}
							})
						return false;
					});
					$('#formsekolah').submit(function(e) {
						var id;
						id ='<?php echo $no_daftar ?>';
						 e.preventDefault();
							$.ajax({
								type: 'POST',
								url: 'simpandata.php?pg=simpansekolah&id='+id,
								data: $(this).serialize(),
								beforeSend: function() {
										swal({
											
											  text: 'Proses menyimpan data',
											  timer: 1000,
											  onOpen: () => {
												swal.showLoading()
											  }
										});
								},
								success: function(data) {
									swal({
										  position: 'top-end',
										  type: 'success',
										  title: 'Data Berhasil disimpan',
										  showConfirmButton: true
										 
										});
										
								}
							})
						return false;
					});
					$('#formkip').submit(function(e) {
						var id;
						id ='<?php echo $no_daftar ?>';
						 e.preventDefault();
							$.ajax({
								type: 'POST',
								url: 'simpandata.php?pg=simpankip&id='+id,
								data: $(this).serialize(),
								beforeSend: function() {
										swal({
											
											  text: 'Proses menyimpan data',
											  timer: 1000,
											  onOpen: () => {
												swal.showLoading()
											  }
										});
								},
								success: function(data) {
									swal({
										  position: 'top-end',
										  type: 'success',
										  title: 'Data Berhasil disimpan',
										  showConfirmButton: true
										 
										});
										
								}
							})
						return false;
					});
					
				</script>   

</body>

</html>
	<?php } else {
		header('location:.');	
	}?>
