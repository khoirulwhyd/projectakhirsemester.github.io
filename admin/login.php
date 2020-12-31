<?php
@session_start();
require_once "../kon/koneksi.php"; 
ob_start();
if(isset($_SESSION['nama'])){
  $nims =$_SESSION['nama'];
  $qses =$koneksi->query("SELECT * FROM tbl_admin where nama='".$_SESSION['nama']."'")or die(get_error());
  $scan = mysqli_num_rows($qses);
  if ($scan == 1) {
    echo "<script>alert('Selamat Datang Kembali....,Master ".$nims."');window.location='admin.php'</script> ";
    }else{
    header("location:logout.php ");
    }
}

 else if( isset ( $_POST[ 'form' ] ) && $_POST[ 'form' ] != NULL ) {
      $nim = $_POST['nama'];
      $nama = $_POST['pass'];
$qa = mysqli_query($koneksi,"SELECT * FROM tbl_admin where nama = '".$_POST['nama']."'")or die(get_error());
$data   = mysqli_fetch_assoc($qa);
$dataa = mysqli_num_rows($qa);
$_SESSION['nama']=$nim;
if($dataa ==1){
//$insert=mysqli_query($koneksi,sprintf("INSERT INTO `tbl_user` (`id_user`, `nim`, `nama`) VALUES (NULL, '".$_POST['nim']."', '".$_POST['nama']."')")) or die(get_error());
  echo "<script>alert('Selamat Datangg...., Master ".$nim."');window.location='admin.php';</script> ";
}
else{
  $error=mysqli_error($koneksi);
  echo "<script>alert('Anda Bukan Tuan Kami!')</script> ";
   //echo "<script>alert('Selamat Datang....,Akun Anda Bisa Di Gunakan Sekali Jadi Harap Gunakan Akun Anda Dengan Bijak!');window.location='admin.php'</script> ";
}
}
//print_r($qa);
// print_r($nim = $_POST['nama']);
// print_r($_SESSION);
// // session_start();
// unset($_SESSION['nama']);
// session_destroy();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Material Admin by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="asset/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="asset/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="asset/css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="asset/css/pop.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="asset/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="asset/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="asset/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Selamat Datang, di Halaman Admin</h1>
                  </div>
                  <p>Tetap Semangat, Semoga Sehat dan Selamat Selau!!!</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form method="post" class="form-validate" enctype="multipart/form-data" action="">
                    <div class="form-group">
                      <input id="login-username" type="text" name="nama" required data-msg="Please enter your username" class="input-material">
                      <label for="login-username" class="label-material">Nama</label>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="pass" required data-msg="Please enter your password" class="input-material">
                      <label for="login-password" class="label-material">Password</label>
                      <input type="hidden" name="form" value="login">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Masuk">
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form><a href="#" class="forgot-pass">Forgot Password?</a><br><small>Do not have an account? </small><a href="register.html" class="signup">Signup</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">2 Khoirul</a>
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </p>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="asset/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="asset/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="asset/vendor/chart.js/Chart.min.js"></script>
    <script src="asset/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="asset/js/front.js"></script>
  </body>
</html>