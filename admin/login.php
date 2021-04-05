<?php
require("../config/config.default.php");
	require("../config/config.function.php");
	
	$ceks = mysqli_fetch_array(mysqli_query($koneksi,"select * from setting"));
	
	$namaaplikasi = $ceks['aplikasi'];
	$namasekolah = $ceks['sekolah'];
	
	if(isset($_POST['submit'])) {
		
				
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = mysqli_query($koneksi,"SELECT * FROM pengawas WHERE username='$username'");
		
		$cek = mysqli_num_rows($query);
		$user = mysqli_fetch_array($query);
		
		
		if($cek <> 0 ) {
			
			if($user['level']=='admin'){
			
			if(!password_verify($password,$user['password']) ) {
				$info = info("Password salah!","NO");
			} else {
				$_SESSION['id_pengawas'] = $user['id_pengawas'];
				header('location:.');
			}
		}elseif($user['level']=='guru'){
			
			if($password==$user['password'] ) {
				$_SESSION['id_pengawas'] = $user['id_pengawas'];
				header('location:.');
				
			} else {
				$info = info("Password salah!","NO");
			}	
		}
		
			
		
		elseif($cek==0 or $cekguru==0){echo "<script>alert('Pengguna tidak terdaftar');</script>";}
		}
	}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login | Administrator</title>
    <!-- Favicon-->
    <link rel="icon" href="../favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b><?php echo $setting['aplikasi']; ?></b></a>
            <small>Supported By eLDesign</small>
        </div>
        <div class="card">
            <div class="body">
                <form action="" method="POST">
                    <div class="msg">Silahkan login untuk masuk ke aplikasi</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" name="submit" type="submit">SIGN IN</button>
                        </div>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/examples/sign-in.js"></script>
</body>

</html>