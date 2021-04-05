<?php
error_reporting(E_ALL);
	require("config/config.default.php");
	require("config/config.function.php");
	require("config/functions.crud.php");
	// require("config/excel_reader.php");
	
	
	(isset($_GET['pg'])) ? $pg = $_GET['pg'] : $pg = '';
	(isset($_GET['ac'])) ? $ac = $_GET['ac'] : $ac = '';
	
	$q=mysqli_query($koneksi,"SELECT * FROM daftar");
							$daftar = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM daftar"));
							$daftarulang = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM daftar where daftar_ulang='1' and status_bayar='1'"));
							$siswa = mysqli_fetch_array(mysqli_query($koneksi,"SELECT *,SUM(jumlah) FROM bayar"));
							
							$opendate = strtotime($setting['open_ppdb']);
							$closedate = strtotime($setting['close_ppdb']);
							$hariini = strtotime(date("Y-m-d"));
echo "
							
<!DOCTYPE html>
		<html>
			<head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  				
 				<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  				<title>$setting[aplikasi] $setting[sekolah]</title>
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
				<link rel='stylesheet' href='$homeurl/css/animated.css'/>
				<link rel='stylesheet' href='$homeurl/css/themes/all-themes.css'/>
				<link rel='stylesheet' href='$homeurl/plugins/sweetalert2/dist/sweetalert2.min.css'/>
				<link rel='stylesheet' href='$homeurl/css/simpleLightbox-master/dist/simpleLightbox.css'/>

<style media='print'>
	#cetakform{
	 display:none;
	}
</style>
<style>
	.judul{
	 display:none;
	}
</style>
			</head>";
?>				

<body class='theme-blue'>
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
				<a class='navbar-brand' href='?'><image src='<?php echo " $homeurl/$setting[logo]";?>' style='margin-top:-15px;' height='40px'></a>
                <a href='javascript:void(0);' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar-collapse' aria-expanded='false'>
                    <span class='btn btn-warning' style='margin-left: -28px; margin-top: -48px;'>MENU</span></a>
               
                
            </div>
			
            <div class='collapse navbar-collapse' id='navbar-collapse'>
                <ul class='nav navbar-nav navbar-right'>
					<li><a href='<?php echo $homeurl; ?>' class="btn bg-indigo waves-effect"><i class="material-icons">home</i><span>HOME</span></a></li>
					<li><a href='?pg=daftar' class="btn bg-indigo waves-effect"><i class="material-icons animated infinite bounce">assignment</i><span>DAFTAR</span></a></li>
					<li><a href='?pg=pendaftar' class="btn bg-indigo waves-effect"><i class="material-icons">person</i><span>DATA PENDAFTAR</span></a></li>
					<!--<li><a href='?pg=filter' class="btn bg-indigo waves-effect"><i class="material-icons">person</i><span>DATA filetr</span></a></li>-->
					<!--<li><a href='?pg=galeri' class="btn bg-indigo waves-effect"><i class="material-icons">camera</i><span>GALERI</span></a></li>-->
					<li><a href='?pg=login' class="btn bg-indigo waves-effect"><i class="material-icons">lock</i><span>LOGIN</span></a></li> 
                    
                </ul>
            </div>
        </div>
		
    </nav>
	
    <!-- #CONTENT BAR -->
    <section>
         <div class="m-t-50 animated rubberBand "  >
                    <div class="card " style='z-index:1;box-shadow:0 0 0;'>
                       
                        <div class="body ">
                            <div id="carousel-example-generic_2" class="carousel slide" data-ride="carousel">
                                <!-- Indicators 
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic_2" data-slide-to="0" class="active"></li>
                                   
                                </ol>-->
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
								<?php 
									$no=0;
									$slideQ = mysqli_query($koneksi,"SELECT * FROM slide ");
									while($slide = mysqli_fetch_array($slideQ)) {
										$no++;
										if($no==1){$a='active';}else{$a='';}
									echo "
                                    <div class='item $a'>
                                        <img src='$slide[file]' style='max-height:400px;width:100%;'/>
                                        <div class='carousel-caption'> 
                                        </div>
                                    </div>";
									}
								 ?>
                                  
                                    
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic_2" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic_2" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
				<hr>
				<!-- #CONTENT BAR -->
				<div class="m-t--40" >
                    <div class="card " style='min-height:500px;box-shadow:0 0 0;'>
                        <div class="body ">
						<div class="row clearfix" >

						<?php if($pg==""){ ?>
						<div class='col-md-3 m-t--5'>
									<div class="card " style='box-shadow:0 0 0;'>
										<div class="header bg-blue ">
											<h2><i class="material-icons font-32">school</i><span>   Info Pendaftaran</span></h2>
										</div>
										<div class="body ">
											<div class="list-group">
												<a href='#beranda' data-toggle='tab' aria-expanded='true' class='list-group-item'>
													<span class='badge bg-pink'>1</span> <i class='material-icons'>home</i> Beranda
												</a>
											<?php 
												$infoxQ = mysqli_query($koneksi,"SELECT * FROM info ");
												$no=1;
												while($info = mysqli_fetch_array($infoxQ)) {
													$no++;
												echo "
												<a href='#$no' data-toggle='tab' aria-expanded='true' class='list-group-item'>
													<span class='badge bg-pink'>$no</span> <i class='material-icons'>$info[icon]</i> $info[menu]
												</a>
												";
												}
											 ?>
												
												
											</div>
										</div>
										<div class="header bg-orange ">
											<h2><i class="material-icons font-32">info</i><span>   Statistik</span></h2>
											<?php 
											
											$kuota =64;
											$sql="SELECT * FROM daftar ORDER BY no_daftar"; 
											$query=mysqli_query($koneksi,$sql); 
											$data=array(); 
											while(($row=mysqli_fetch_array($query)) != null){ $data[] =$row; } 
											$count=count($data);
											$kuotatersisa=$kuota-$count;
											$zonasi=50/100*$kuota;
											$afirmasihitung=15/100*$kuota;
											$prestasihitung=30/100*$kuota;
											$perpindahanhitung=5/100*$kuota;
											echo " Data Pendaftar Yang Masuk: <span class='badge'>$count</span><br>"; 
											
											
											//Jumlah data dari array PHP: $count"; 
											?>
											
										</div>
									</div>
									
						</div>
						<div class='col-md-9 m-t--4'>
						<div class="tab-content">
						<?php 
									$infoxQ = mysqli_query($koneksi,"SELECT * FROM info ");
									$nox=1;
									while($info = mysqli_fetch_array($infoxQ)) {
										$nox++;
									echo "
									
									<div role='tabpanel' class='animated flipInX tab-pane fade in' id='$nox'>
									<h2 class='m-t--5'><i class='material-icons font-32'>$info[icon]</i> $info[menu]</h2>
									<hr class='m-t--5'>
										$info[text]
									</div>
                                    ";
									}
									
								 ?>
								 <?php 
							
							$pen= mysqli_query($koneksi,"select * from setting where id_setting='1'");
							$datapen=mysqli_fetch_array($pen);
							
							?>
						<div role='tabpanel' class='tab-pane fade in active' id='beranda'>
							<h2 class='m-t--5'><i class="material-icons font-32">settings</i> <?php if($datapen['jenjang']=='SMK'){
										echo 'PILIHAN JURUSAN';
										}else{
										echo 'PILIH JALUR';
										}
										?></h2><hr class='m-t--5'>
					<?php 	$que=mysqli_query($koneksi,"select * from jurusan");
							$warna=array("bg-red","bg-blue","bg-green","bg-purple","bg-orange");
							while($jurusan=mysqli_fetch_array($que)){
							$rand=rand(0,4);
							echo "
							<div class='animated flipInX col-lg-4 col-md-4 col-sm-6'>
								<div class='info-box $warna[$rand] hover-expand-effect'>
									<div class='icon'>
										<i class='material-icons'>check_circle</i>
									</div>
									<div class='content'>
										<div class='text'>$jurusan[nama_jur]</div>
										
									</div>
								</div>
							</div>";}?>
							
							<?php 
							
							if($hariini >= $opendate && $hariini <= $closedate){?>
								<div class="clearfix"></div>
							<div id='menudaftar'>
								<h2 class='m-t--5'>
										<div class='body align-center'>
											<i class="material-icons font-32">edit</i>PENDAFTARAN</h2><hr class='m-t--5'>
										</div>
								<!--coding tambahan-->
								<div class="clearfix"></div>
								<div class=" animated bounceIn col-md-4 ">
									<div class='card'>
										<div class='body align-center'>
										<i class="material-icons font-50">assignment</i>
											<p><a href='?pg=daftar' class='btn btn-lg waves-effect bg-red '>DAFTAR SEKARANG</a></p>
										</div>
									</div>
								</div>
								<!--menu web tambah-->
								<div class=" animated bounceIn col-md-4 ">
									<div class='card'>
										<div class='body align-center'>
										<i class="material-icons font-50">web</i>
											<p><a href=<?php echo $setting['web']?> class='btn btn-lg waves-effect bg-blue '>WEB UTAMA</a></p>
										</div>
									</div>
								</div>

								<div class=" animated bounceIn col-md-4 ">
									<div class='card'>
										<div class='body align-center'>
										<i class="material-icons font-50">lock</i>
											<p><a href='?pg=login' class='btn btn-lg waves-effect bg-green '>LOGIN CALON SISWA BARU</a></p>
										</div>
									</div>
								</div>
							</div>
							<?php } else {?>
								<div class=" animated bounceIn col-md-12 ">
									<div class='card'>
										<div class='body align-center'>
										<p><button class='btn btn-lg waves-effect bg-blue'>PENDAFTARAN DIBUKA DALAM</button></p>
										<div id='hitungmundur'></div>
										</div>
									</div>
								</div>
							<?php }?>	
								
							</div>
						</div>	
						</div>	
						<?php } ?>
						<?php if($pg=="login"){ 
							if(isset($_POST['simpan'])) {
								$username = $_POST['username'];
								$password = $_POST['password'];
								$query = mysqli_query($koneksi,"SELECT * FROM daftar WHERE no_daftar='$username'");//and daftar_ulang='1'
								$siswa= mysqli_fetch_array($query);
								$cek = mysqli_num_rows($query);
									if($cek <> 0 ) {
										if($password<>$siswa['tanggal_lahir'] ) {
											echo "<script>alert('Password Salah');</script>";
										} else {
											$_SESSION['no_daftar'] = $siswa['no_daftar'];
											echo "<script>document.location='home.php';</script>";
										}
									
									}else{
										echo "
										<script>
										alert('Pengguna tidak terdaftar atau belum melakukan proses daftar ulang');</script>
										";
									}
							}
						
						?>
						<div class='col-md-3 m-t--5'></div>
						<div class='col-md-6 m-t--5'>
						<div class='card'>
							<div class='body'>
							<h3 class='m-t--5'><i class="material-icons font-20">assignment</i>LOGIN CALON SISWA BARU</h3><hr class='m-t--5'>
							<form  action='' method='post' class="form-horizontal">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>USERNAME</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name='username' class="form-control" placeholder="isi no pendaftaran" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>PASSWORD</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name='password' class="datepicker form-control" placeholder="isi tanggal lahir YYYY-MM-DD" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button  name='simpan' class="btn btn-lg bg-red m-t-15 waves-effect"><i class="material-icons">lock</i><span>LOGIN MASUK</span></button>
										
                                    </div>
                                </div>
								<br>
								* username bisa dilihat di bukti cetak pendaftaran awal atau klik <a href='?pg=pendaftar' target='_blank'> data pendaftar</a>.
								
                            </form>
							</div>
						</div>
                        </div> 	
						<?php } ?>
						<?php if($pg=="pendaftar"){ ?>
						<div class='col-md-2 m-t--5'></div>
						<div class='col-md-8 m-t--5'>
						<h2 class='m-t--5'><i class="material-icons font-32">person</i>SUDAH DAFTAR</h2><hr class='m-t--5'>
								
									<div class='card'>
										<div class='body'>
										<?php
										echo "
										<div class='table-responsive'>
												<table id='example1' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='5px'>#</th>
															<th>No Pendaftaran</th>
															<th>Nama Lengkap</th>
															<th>Asal Sekolah</th>
															
															<th>status pendaftaran</th>
															
														</tr>
													</thead>
													<tbody>
													";
													$pendaftarQ = mysqli_query($koneksi,"SELECT * FROM daftar");
													$no=0;
													while($pendaftar = mysqli_fetch_array($pendaftarQ)) {
														$sekolah=mysqli_fetch_array(mysqli_query($koneksi,"select * from mou where kode_mou='$pendaftar[asal_sekolah]'"));
														$no++;
														echo "
														<tr>
															<td>$no </td>
															<td>$pendaftar[no_daftar]</td>
															<td>$pendaftar[nama]</td>
															<td>$sekolah[sekolah_mou]$pendaftar[sekolah_lain] </td>
															
															<td>";
															if($pendaftar['daftar_ulang']==1 and $pendaftar['baju']==diterima){
															$dis='disabled';
															 echo "<small class='label label-success'><i class='fa fa-check'></i> diterima</small> ";
															}else if($pendaftar['daftar_ulang']==1 and $pendaftar['baju']==diverifikasi){
																$dis='';
															 echo "<small class='label label-info'><i class='fa fa-times'></i> diverifikasi</small> ";
																}else if($pendaftar['daftar_ulang']==1 and $pendaftar['baju']==tidak){
																$dis='';
															 echo "<small class='label label-danger'><i class='fa fa-times'></i> Tidak Diterima</small> ";
															}else {
															$dis='';
															echo "<small class='label label-default'><i class='fa fa-times'></i> belum di verifikasi</small> ";
															}
															echo "
															</td>
															
														</tr>
																												
														";
													}
													echo "
													</tbody>
												</table>
											</div>";
										?>
										</div>
									
								</div>
						</div>
						<?php } ?>
						
						<?php if($pg=="filter"){ ?>
						<div class='col-md-2 m-t--5'></div>
						<div class='col-md-8 m-t--5'>
						<h2 class='m-t--5'><i class="material-icons font-32">person</i>filter</h2><hr class='m-t--5'>
								
									<div class='card'>
										<div class='body'>
										<form method="POST">
										<select name='oce' id='oce' class="form-control">
												<option value=''>- Pilih -</option>
												<!--pilih juruan-->
													<?php
														$ambiljskol = mysqli_query($koneksi,"SELECT * FROM jenis_sekolah");
														while($jks = mysqli_fetch_array($ambiljskol)){
																echo "<option value='$jks[id_jenissekolah]'>$jks[nama_jenissekolah]</option>";
															}
													?>
	
												</select>
												<input type="submit" name="oya" value="SIMPAN">
												</form>
										<?php
										echo "
										<div class='table-responsive'>
												<table id='example1' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='5px'>#</th>
															<th>No </th>
															<th>Nama Lengkap</th>
															<th>Asal Sekolah</th>
															
															<th>status </th>
															
														</tr>
													</thead>
													<tbody>
													";
													$pendaftarlo = mysqli_query($koneksi,"SELECT * FROM daftar  WHERE kode_jenissekolah='js02' ORDER BY no_daftar ASC");
													$no=0;
													while($pendaftarku = mysqli_fetch_array($pendaftarlo)) {
														$sekolahku=mysqli_fetch_array(mysqli_query($koneksi,"select * from mou where kode_mou='$pendaftarku[asal_sekolah]'"));
														$jskol=mysqli_fetch_array(mysqli_query($koneksi,"select * from jenis_sekolah where id_jenissekolah='$pendaftarku[kode_jenissekolah]'"));
														$no++;
														echo "
														<tr>
															<td>$no </td>
															<td>$pendaftarku[no_daftar]</td>
															<td>$pendaftarku[nama]</td>
															<td>$sekolahku[sekolah_mou]$pendaftarku[sekolah_lain] </td>
															
															<td><small class='label label-success'>$jskol[nama_jenissekolah]</small></td>
															
														</tr>
																												
														";
													}
													echo "
													</tbody>
												</table>
											</div>";
										?>
										</div>
									
								</div>
						</div>
						<?php } ?>
						
						<?php if($pg=="galeri"){ ?>
						<center><h2 class='m-t--5'><i class="material-icons font-32">camera_alt</i> FOTO GALERI</h2><hr class='m-t--5'>	</center>
							<div id="aniimated-thumbnials" class="gallery">
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-1.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-1.jpg">
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-2.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-2.jpg">
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-3.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-3.jpg">
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-4.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-4.jpg">
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-5.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-5.jpg">
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-6.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-6.jpg">
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-7.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-7.jpg">
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-8.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-8.jpg">
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-9.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-9.jpg">
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-10.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-10.jpg">
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-11.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-11.jpg">
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-12.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-12.jpg">
                                    </a>
                                </div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-13.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-13.jpg">
                                    </a>
                                </div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-14.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-14.jpg">
                                    </a>
                                </div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-15.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-15.jpg">
                                    </a>
                                </div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-16.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-16.jpg">
                                    </a>
                                </div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-17.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-17.jpg">
                                    </a>
                                </div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-18.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-18.jpg">
                                    </a>
                                </div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-19.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-19.jpg">
                                    </a>
                                </div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-20.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-20.jpg">
                                    </a>
                                </div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-21.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-21.jpg">
                                    </a>
                                </div>
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images/image-gallery/thumb/thumb-22.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="images/image-gallery/thumb/thumb-22.jpg">
                                    </a>
                                </div>
								
                               
                            </div>
						<?php } ?>
						<?php if($pg=="daftar"){ ?>
						<?php if($hariini >= $opendate && $hariini <= $closedate){?>
						<div class='col-md-2 m-t--5'></div>
						
						<div class='col-md-8 m-t--5'>
						<center><h2 class='m-t--5'><i class="material-icons font-32">assignment</i> ISI FORMULIR</h2><hr class='m-t--5'></center>
						<div id='printdaftar'>
							<div class='judul'>
							<table border='0' width='793.700787402px' align='center' cellspacing='0' cellpadding='0'>
								<tr>
									<td align='left'><img src='<?php echo "$homeurl/$setting[logo]";?>' width='90px'/></td>
									<td align='center' valign='top'>
										<font size=+2><b><?php echo $setting['header']; ?></b></font><br/>
										<font size=+3><b><?php echo $setting['sekolah']; ?></b></font><br/>
										<small><?php echo $setting['alamat']; ?> &nbsp; </small>
										<small><i>Email: <?php echo $setting['email']; ?> &nbsp; Web: <?php echo $setting['web']; ?></i></small><br/>
									</td>
									<td align='right'></td>
								</tr>
							</table>
							<hr>
							<div align='center'>
								<b>FORMULIR PENDAFTARAN PESERTA DIDIK BARU</b><br/>
					
								<b>TAHUN AJARAN 2020/2021</b><br/>
							</div>
							<?php 
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
							?>
							<?php 
							
							$pen= mysqli_query($koneksi,"select * from setting where id_setting='1'");
							$datapen=mysqli_fetch_array($pen);
							
							?>
								<div class='row clearfix'>
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>NO PENDAFTARAN</label>
                                    </div>     
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name='no_daftar' class="form-control" value="<?php echo $hasilkode; ?>" required>
                                            </div>
                                        </div> 
									</div>	
                                </div>
							</div>
							<form id='formdaftar' class="form-horizontal">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>NAMA LENGKAP</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group ">
                                            <div class="form-line">
											   
                                                <input type="text" name='nama' class="form-control" placeholder="isi nama lengkap" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('hanya boleh huruf dan spasi harap refresh halaman')" required>
												</div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2"><?php if($datapen['jenjang']=='SMK'){
										echo 'PILIH JURUSAN';
										}else{
										echo 'PILIH JALUR';
										}
										?></label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select name='jurusan' class="form-control" placeholder="isi jalur pendaftaran" required>
												<option value=''>- Pilih -</option>
												<!--pilih juruan-->
													<?php
														$ambiljurusan = mysqli_query($koneksi,"SELECT * FROM jurusan");
														while($jr = mysqli_fetch_array($ambiljurusan)){
																echo "<option value='$jr[kode_jur]'>$jr[nama_jur]</option>";
															}
													?>
	
												</select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label >ASAL SEKOLAH</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select  name='asal' id='ddlModels' onchange='EnableDisableTextBox(this)' class='form-control'  required='true'/>
															<option value=''>Pilih Asal Sekolah</option>";
															<?php $query=mysqli_query($koneksi,"select * from mou");
															while($asal=mysqli_fetch_array($query)){
																echo "<option value='$asal[kode_mou]'>$asal[sekolah_mou]</option>";
															}
															?>
															<option value = "0">Sekolah Lainya</option>
												</select>
												 <input type="text" class='form-control' id="txtOther" name="txtOther" disabled="disabled" required='true'/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class='row clearfix'>
															<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
																<label>Status Sekolah</label>
															</div>
															<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
																<div class='form-group'>
																	<div class='form-line'>
																		 <select  name='stats' class='form-control'  required='true'/>
																		 <option value=''>- Status Sekolah -</option>
																		 <option value='NEGERI'>Negeri</option>
																		 <option value='SWASTA'>Swasta</option>
																		 </select>
																	</div>
																</div>
															</div>
														</div>
														
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label >JENIS SEKOLAH</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select  name='jssekol' class='form-control'  required='true'/>
															<option value=''>Pilih Jenis Sekolah</option>";
															<?php $query=mysqli_query($koneksi,"select * from jenis_sekolah");
															while($jssekol=mysqli_fetch_array($query)){
																echo "<option value='$jssekol[id_jenissekolah]'>$jssekol[nama_jenissekolah]</option>";
															}
															?>
															
												</select>
												
                                            </div>
                                        </div>
                                    </div>
                                </div>						
														
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label >NIK KK</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group" id="only-number">
                                            <div class="form-line">
                                                <input type="text" name='nik' class="form-control" id="number" placeholder="isi hanya angka" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label >NISN</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name='nisn' class="form-control" placeholder="isi no nisn" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label >TEMPAT</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name='tempat' class="form-control" placeholder="isi tempat lahir" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label >TANGGAL LAHIR</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name='tgl_lahir' class="datepicker form-control" placeholder="YYYY-MM-DD" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label >JENIS KELAMIN</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select  name='namajk'  class='form-control' placeholder="isi Jenis Kelamin" required/>
															<option value=''>Jenis Kelamin</option>";
															<?php $query=mysqli_query($koneksi,"select * from sex");
															while($namajk=mysqli_fetch_array($query)){
																echo "<option value='$namajk[kode_kelamin]'>$namajk[jenis_kelamin]</option>";
															}
															?>
															</select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label >AGAMA</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name='agama' class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label >NO HP</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name='nohp' class="form-control" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label >ALAMAT RUMAH</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="4" name='alamat' class="form-control no-resize" placeholder="Nama Jalan / Kampung"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label >DESA / KELURAHAN</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name='kel' class="form-control" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label >KECAMATAN</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name='kec' class="form-control" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								
								
                         <div class='judul'> 
						 <hr>
						 <p>*CATATAN :</p>
						 <p>1. Silahkan Login Untuk Melengkapi <b>DATA</b> </p>
						 <p>2. Upload <b>FOTO</b> 3x4 di Menu UPLOAD DOKUMEN</p>
						 <p>3. Cetak Bukti pendaftaran dan Harus Disimpan</p>
						 <p>4. Segera melakukan proses <b>VERIFIKASI BERKAS</b> di SEKOLAH / Upload BERKAS di Menu UPLOAD DOKUMEN</p>
						 <p>5. Tunggu Pengumuman Selanjutnya / Hubungi Panitia PPDB</p>
						 </div>
                        </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
									<div class="checkbox-inline">
									<form method="POST" action="#">
                                     <input type="checkbox" name="checkbox" value="check" id="agree" required /><label for="agree"> Setuju Dengan Alur,syarat & Peraturan PPDB Sekolah</label><br />
                                        <button id='btndaftar' type='submit' class="btn btn-lg bg-green m-t-15 waves-effect" onclick="if(!this.form.checkbox.checked){alert('Harus Centang kotak Persetujuan.');return false}"><i class="material-icons">history</i><span>PROSES PENDAFTARAN</span></button>
										</form>
										<a id='cetakform' class="btn btn-lg bg-purple m-t-15 waves-effect"><i class="material-icons">print</i><span>CETAK FORMULIR</span></a>
                                    </div>
                                </div>
								</div>
                            </form>
                        </div> 	
							<?php } else {?>
								<div class=" animated bounceIn col-md-12 ">
									<div class='card'>
										<div class='body align-center'>
										<p><button class='btn btn-lg waves-effect bg-blue'>PENDAFTARAN DIBUKA DALAM</button></p>
										<div id='hitungmundur'></div>
										</div>
									</div>
								</div>
							<?php }?>	
						
						   
						<?php } ?>
						</div>

							
						
                        </div>
                    </div>
                </div>
        <!-- #END# Right Sidebar -->
    </section>

	<!-- Footer -->
<footer class="page-footer font-small bg-indigo">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">

          <!-- Content -->
          <h5 class="text-uppercase"><i class="material-icons">place</i> ALAMAT SEKOLAH</h5>
          <p><?php echo $setting['alamat'];?></p>

        </div>
        <!-- Grid column -->

        

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

        </div>
          <!-- Grid column -->
      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center bg-deep-purple">© 2020 :
     <?php echo $setting['aplikasi'];?>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
<?php 
echo "
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
				<script src='$homeurl/plugins/printarea/js/jquery.printarea.js'></script>
				<script src='$homeurl/plugins/jquery-countdown/jquery.countdown.min.js'></script>;
				<script src='$homeurl/css/simpleLightbox-master/dist/simpleLightbox.js'></script>";
				$openppdb=date('Y-m-d',strtotime($setting['open_ppdb']));
?>				
<script>
$('#example1').DataTable({});
			$('#hitungmundur').countdown('<?php echo $openppdb;?>', function(event) {
			  var $this = $(this).html(event.strftime(''
				
				+ "<span class='btn btn-lg waves-effect'><span class='font-50'>%D </span><p>Hari</p></span>"
				+ "<span class='btn btn-lg waves-effect'><span class='font-50'>%H </span><p>Jam</p></span>"
				+ "<span class='btn btn-lg waves-effect'><span class='font-50'>%M </span><p>Menit</p></span>"
				+ "<span class='btn btn-lg waves-effect'><span class='font-50'>%S </span><p>Detik</p></span>"
				));
			});		
							
					
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
</script>	
<script>
				$('#cetakform').hide();	
					$('#formdaftar').submit(function(e) {
						 e.preventDefault();
							$.ajax({
								type: 'POST',
								url: 'simpandaftar.php',
								data: $(this).serialize(),
								beforeSend: function() {
									$('#btndaftar').hide();
										swal({
											
											  text: 'Proses menyimpan data',
											  timer: 1000,
											  onOpen: () => {
												swal.showLoading()
											  }
										});
									},
								success: function(data) {
									$('#cetakform').show();
									
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
					 
				$('#cetakform').click(function(){
						
						$('#printdaftar').printArea();
			
					});
</script>	
<script>
    $(function() {
      $('#only-number').on('keydown', '#number', function(e){
          -1!==$
          .inArray(e.keyCode,[46,8,9,27,13,110,190]) || /65|67|86|88/
          .test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey)
          || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey|| 48 > e.keyCode || 57 < e.keyCode)
          && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
      });
    })
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
    $(function(){
        var gallery = $('.gallery a').simpleLightbox();
    });
</script>
</body>

</html>
