<?php
@session_start();
require_once "../kon/koneksi.php";
ob_start();
if(!(isset($_SESSION['nama'])) || $_SESSION['nama']== null){
  header("location: login.php");
}
$a = mysqli_query($koneksi,sprintf("SELECT * FROM tbl_admin WHERE nama = '%s'",$_SESSION['nama'])) or die(mysqli_error($koneksi));
$upser = mysqli_fetch_assoc($a);
if(isset($_POST['form']) && $_POST['form'] == "update_foto"){
    $foto = move_uploaded_file($_FILES['foto']['tmp_name'], "../admin/asset/foto/".$upser['nama']."_".$upser['username'].".png");
    if ($foto){
      echo "<script>alert('update berhasil');window.location='admin.php';</script> ";
    }else {
      echo "<script>alert('update gagal;');window.location='admin.php';</script> ";
    }


  }
        
         ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Epemilu</title>
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

 <!-- modal  -->

  <div id="foto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
   <div role="document" class="modal-dialog">

      <div class="modal-content">
       
      <div class="modal-header">

        <h4 id="exampleModalLabel" class="modal-title">Foto Profile <?php echo $upser['id_admin']?></h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
         <div class="modal-body">
          <img class="img-thumbnail NO-CACHE" src="asset/foto/<?php echo $upser['id_admin']."_".$upser['username'].".png"?>" alt="Card image" style="width:100%;">
          <br>
   
         </div>
        <div class="modal-footer">
          <form action="" method="post" enctype="multipart/form-data" >           
                <div class="form-group ">
                    <label for="foto">Upload Foto</label>
                    <input type="file" name="foto" id="foto" accept="image/*" class="form-control-file" placeholder="foto">
                </div>           
              <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
              <button  class="btn btn-primary" name="foto">Save changes</button>

              <input type="hidden" name="form" value="update_foto">
          </form>          
        </div>           
       </div>
    </div>
  </div>

    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="admin.php" class="navbar-brand">
                  <div class="brand-text brand-big"><span>Admin </span><strong> Dashboard</strong></div>
                  <div class="brand-text brand-small"><strong>AD</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications-->
                <!--li class="nav-item dropdown"> <a id="notifications " rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link ibu"><i class="fa fa-bell-o"></i><span class="badge bg-red cobu"></span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu nobu">
                  </ul>
                </li-->
                <!-- Messages  -->
                <li class="nav-item dropdown"> <a id="notifications " rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link ibu">B <i class="fa fa-envelope-o"></i><span class="badge bg-red cobu"></span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu nobu">

                  </ul>
                </li>                
                <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link isu">S <i class="fa fa-envelope-o"></i><span class="badge bg-orange cosu"></span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu nosu">

                  </ul>
                </li>
                <!--li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link ilang"><i class="fa fa-envelope-o"></i><span class="badge bg-orange count"></span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu notif">

                  </ul>
                </li>
                <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link ilang"><i class="fa fa-envelope-o"></i><span class="badge bg-orange count"></span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu notif">

                  </ul>
                </li-->                                
                <!-- Logout    -->
                <li class="nav-item"><a href="logout.php" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
           <?php
               if(isset($_SESSION['nama']) && $_SESSION['nama'] !=NULL){
              $quser = mysqli_query($koneksi,sprintf("SELECT * FROM tbl_admin WHERE nama = '%s'",$_SESSION['nama'])) or die(mysqli_error($koneksi));
              $row = mysqli_fetch_assoc($quser);
             // print_r($row);

              ?>
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <a href="" data-toggle="modal" data-target="#foto">
            <div class="avatar"><img src="asset/foto/<?php echo $row['id_admin']."_".$row['username'].".png"?>" alt="..." class="img-fluid rounded-circle NO-CACHE"></div></a>
            <div class="title">   
              <p>Selamat Datang</p>
              <h1 class="h4"><?php echo $row["nama"];?></h1>
              
            </div>
          </div>
          <?php }?>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled kategori">
                    <li ><a href="admin.php"> <i class="icon-home"></i>Home</a></li>
                    <li><a href="?page=profile"> <i class="icon-grid"></i>Profile (On Progress)</a></li>
                    <li><a href="?page=admin"> <i class="fa fa-user"></i>Admin</a></li>
                    <!--li><a href="?page=user"> <i class="fa fa-users"></i>Mahasiswa (On Progress)</a></li-->
                    <li><a href="?page=calon"> <i class="fa fa-cubes"></i>Calon</a></li>
                    <!--li><a href="?page=golput"> <i class="fa fa-cubes"></i>Golput (On Progress)</a></li-->
                    <li><a href="?page=hasil"> <i class="fa fa-cubes"></i>Hasil Pemilihan</a></li>
                    <li><a href="../hasil.php" target="_blank"><i class="fa fa-cubes"></i>Hitung Mundur</a></li>
                    <!--li><a href="?page=tambahan"> <i class="icon-interface-windows"></i>Tambahan (On Progress)</a></li>
                    <li><a href="?page=diskon"> <i class="icon-padnote"></i>diskon</a></li>
                    <li><a href="?page=diskon_reseller"> <i class="icon-padnote"></i>diskon reseller</a></li>
                    
                    <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Transaksi </a>
                      <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="?page=tranbe"> <i class="icon-interface-windows"></i>Belum Dibayar</a></li>
                        <li><a href="?page=transu"> <i class="icon-interface-windows"></i>Sudah Dibayar</a></li>
                        <li><a href="?page=tranki"> <i class="icon-interface-windows"></i>Dikirim</a></li>
                        <li><a href="?page=trante"> <i class="icon-interface-windows"></i>Diterima</a></li>
                        <li><a href="?page=tranbat"> <i class="icon-interface-windows"></i>Batal</a></li>
                        </ul>
                    </li>                    
                    <li><a href="?page=tambahan"> <i class="icon-interface-windows"></i>tambahan </a></li-->
          </ul>
        </nav>
        <div class="content-inner">


        <?php
        $page = @$_GET['page'];
          if ($page == "profile"){
            include "data/profile.php";
          } else if ($page == "user"){
            include "data/user.php";
          }else if ($page == "admin"){
            include "data/admin.php";
          }else if ($page == "calon"){
            include "data/calon.php";
          } else if ($page == "tambahan"){
            include "data/tambahan.php";
          }else if ($page == "golput"){
             include "data/golput.php";
          }
          else if ($page == "hasil"){
             include "data/hasil.php";
          }
          // else if ($page == "diskon"){
          //   include "data/diskon.php";
          // }else if ($page == "diskon_reseller"){
          //   include "data/diskon_reseller.php";
          // }else if ($page == "tranbe"){
          //   include "data/tranbe.php";
          // }else if ($page == "transu"){
          //   include "data/transu.php";
          // }else if ($page == "tranki"){
          //   include "data/tranki.php";
          // }else if ($page == "trante"){
          //   include "data/trante.php";
          // }else if ($page == "tranbat"){
          //   include "data/tranbat.php";
          // }else if ($page == "tambahan"){
          //   include "data/tambahan.php";
          // }
          else if ($page == ""){
             ?>     
            <header class="page-header">
              <div class="container-fluid">
                <h2 class="no-margin-bottom">Dashboard</h2>
              </div>
            </header>        
            <section class="dashboard-counts">
              <div class="container-fluid">
                <div class="row bg-white has-shadow">
                  <!-- Item -->
                  <div class="col-xl-3 col-sm-6">
                    <div class="item d-flex align-items-center">
                      <div class="icon bg-violet"><i class="icon-user"></i></div>
                      <div class="title"><span>Jumlah<br>Admin</span>
                        <div class="">
                          <a href="?page=admin">
                          <p style="margin: 0;padding: 0;font-size: 15px;">Lihat Sekarang</p></a>
                        </div>
                      </div>
                      <?php 
                      $querya=mysqli_query($koneksi,"SELECT * FROM tbl_admin");
                      //$hasil=mysqli_num_rows($query);
                      //$data = array();
                      while(($rowa = mysqli_fetch_array($querya)) != null){
                          $dataa[] = $rowa; 
                        }
                      $countadmin = count($dataa);
                      ?>                           
                      <div class="number"><strong><?php echo "$countadmin" ?></strong></div>
                    </div>
                  </div>
                  <!-- Item -->
                  <div class="col-xl-3 col-sm-6">
                    <div class="item d-flex align-items-center">
                      <div class="icon bg-red"><i class="icon-user"></i></div>
                      <div class="title"><span>Jumlah<br>Pin Code</span>
                        <div class="">
                          <a href="?page=user">
                          <p style="margin: 0;padding: 0;font-size: 15px;">Lihat Sekarang</p></a>
                        </div>
                      </div>
                      <?php 
                      $queryu=mysqli_query($koneksi,"SELECT * FROM tbl_user");
                      //$hasil=mysqli_num_rows($query);
                      //$data = array();
                      while(($rowu = mysqli_fetch_array($queryu)) != null){
                          $datau[] = $rowu; 
                        }
                      $countuser = count($datau);
                      ?>                     
                      <div class="number"><strong><?php echo "$countuser" ?></strong></div>
                    </div>
                  </div>
                  <!-- Item -->
                  <div class="col-xl-3 col-sm-6">
                    <div class="item d-flex align-items-center">
                      <div class="icon bg-green"><i class="icon-padnote"></i></div>
                      <div class="title"><span>Jumlah<br>Calon</span>
                        <div class="">
                          <a href="?page=calon">
                          <p style="margin: 0;padding: 0;font-size: 15px;">Lihat Sekarang</p></a>
                        </div>
                      </div>
                        <?php 
                        $queryb=mysqli_query($koneksi,"SELECT * FROM tbl_calon");
                        //$hasil=mysqli_num_rows($query);
                        //$data = array();
                        while(($rowb = mysqli_fetch_array($queryb)) != null){
                            $datab[] = $rowb; 
                          }
                        $countbarang = count($datab);
                        ?>                     
                      <div class="number"><strong><?php echo "$countbarang" ?></strong></div>
                    </div>
                  </div>
                  <!-- Item -->
                    <div class="col-xl-3 col-sm-6">
                    <div class="item d-flex align-items-center">
                      <div class="icon bg-orange"><i class="icon-user"></i></div>
                      <div class="title"><span>Jumlah<br>Golput (On Progress)</span>
                        <div class="">
                          <a href="?page=golput">
                          <p style="margin: 0;padding: 0;font-size: 15px;">Lihat Sekarang</p></a>
                        </div>
                      </div>
                      <?php 
                      $queryu=mysqli_query($koneksi,"SELECT * FROM tbl_golput");
                      //$hasil=mysqli_num_rows($query);
                      //$data = array();
                      while(($rowu = mysqli_fetch_array($queryu)) != null){
                          $datag[] = $rowg; 
                        }
                      $countgolput = count($datag);
                      ?>                     
                      <div class="number"><strong><?php echo "$countgolput" ?></strong></div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- counter >
            <section class="feeds no-padding-top ">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Hitung </h3>
                    </div>
                    <div class="card-body">
                      <p>Lorem ipsum dolor sit amet consectetur.</p>
                      <form>
                        <div class="form-group">
                          <label class="form-control-label">Email</label>
                          <input type="email" placeholder="Email Address" class="form-control">
                        </div>
                        <div class="form-group">       
                          <label class="form-control-label">Password</label>
                          <input type="password" placeholder="Password" class="form-control">
                        </div>
                        <div class="form-group">       
                          <input type="submit" value="Signin" class="btn btn-primary">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </section>                
            <-- slider bar -->
            <!-- <section class="feeds no-padding-top ">
              <div class="container-fluid">
                <div class="row"> -->
                  <!-- Trending Articles-->
                  <!-- <div class="col-lg-12">
                    <div class="articles card">
                      <div class="card-close">
                        <div class="dropdown">
                          <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                          <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                        </div>
                      </div>
                      <div class="card-header d-flex align-items-center">
                        <h2 class="h3">Upload Slider   </h2>
                        
                      </div>
                      <div class="card-body no-padding">
                      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                              <div class="carousel-inner">
                                  <div class="carousel-item active">
                                      <img alt="First slide" class="d-block w-100 NO-CACHE" src="../img/10bf08f0bbd6689475be65b4ae441bd9/c4ca4238a0b923820dcc509a6f75849b356a192b7913b04c54574d18c28d46e6395428ab.png" style="height: 200px">
                                      
                                  </div>
                                  <div class="carousel-item">
                                      <img alt="Second slide" class="d-block w-100 NO-CACHE" src="../img/10bf08f0bbd6689475be65b4ae441bd9/c81e728d9d4c2f636f067f89cc14862cda4b9237bacccdf19c0760cab7aec4a8359010b0.png" style="height: 200px">
                                      
                                  </div>
                                  <div class="carousel-item">
                                      <img alt="Third slide" class="d-block w-100 NO-CACHE" src="../img/10bf08f0bbd6689475be65b4ae441bd9/eccbc87e4b5ce2fe28308fd9f2a7baf377de68daecd823babbb58edb1c8e14d7106e83bb.png" style="height: 200px">
                                      
                                  </div>
                              </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true" style="height: 100%"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true" style="height: 100%"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                        <form name="slider" action="" method="post" enctype="multipart/form-data">
                          <?php 
                          for($i=1;$i<=3;$i++)
                          {
                            ?>
                        <div class="item d-flex align-items-center ">
                          
                          <div class="text col-lg-12"><a href="#"></a>
                              <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="foto<?php echo $i;?>">
                          <label class="custom-file-label" for="customFileLang">Silakan Pilih Foto</label>
                        </div>
                            </div>
                        </div>
                        <?php }
                        ?>
                        <button type="slider" name="slider" value="update slider" class="btn btn-primary float-right m-4">Upload Slider
                        </button>
                        </form>


                        <?php 
                        $var =0;

                        if (isset($_POST["slider"])) {
                          for($i=1;$i<=3;$i++){
                           $fnm=$_FILES["foto$i"]["tmp_name"];
                           $dst="../img/10bf08f0bbd6689475be65b4ae441bd9/".md5($i).sha1($i).".png";
                           $sliderm=move_uploaded_file($fnm,$dst);
                        //move_uploaded_file($_FILES['foto$i']['tmp_name'],'../../../img/slider/');
                         }
                             if ($sliderm){
                              echo "<script>alert('Update berhasil');window.location='admin.php';</script> ";
                            }else {
                              echo "<script>alert('Data belum di masukan atau Update gagal');window.location='admin.php';</script> ";
                            }

                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <?php
          }else {
            echo "tidak ada";
            
          }
        ?> -->
          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>Pemilihan Online &copy; 2021</p>
                </div>
                <div class="col-sm-6 text-right">
                  <!-- <p>Creator and Desaign by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a></p> -->
                       <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                   <!-- <p>ReDesaign by Team Mojokerto Developer</p> -->
             
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>

    <!-- Javascript files-->
    <script src="asset/js/jquery-3.2.1.min.js"></script>   
    <script src="asset/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="asset/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="asset/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="asset/vendor/chart.js/Chart.min.js"></script>
    <script src="asset/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!--- <script src="asset/js/charts-home.js"></script> -->
    <!-- Main File-->
    <script src="asset/js/front.js"></script>
    <script type="text/javascript">
      $('#q').keydown(function(e) {
        if (e.keyCode == 13) {
          window.location.href = 'admin.php?page=barang&halaman=1&q=' + $('#q').val();
        }
      });
      $('#qa').keydown(function(e) {
          if (e.keyCode == 13) {
              window.location.href = 'admin.php?page=admin&halaman=1&qa=' + $('#qa').val();
          }
      });
      $('#qu').keydown(function(e) {
          if (e.keyCode == 13) {
              window.location.href = 'admin.php?page=user&halaman=1&qu=' + $('#qu').val();
          }
      });
      function edit_calon(id) {
           $('#myModal').modal('show');
          $('#edit_form').html("<center>Tunggu Sebentar...</center>");
          $('#edit_form').load('data/edit_calon.php?id=' + id);
          $('#myModal').on('show.bs.modal', function(event) {
              var button = $(event.relatedTarget)
              var recipient = button.data('id')
              var modal = $(this)
              //modal.find('.modal-title').text('Edit Calon ' + recipient)
              //modal.find('.modal-body input').val(recipient)
          })
      }
      function hapus_calon(id) {
          var retVal = confirm("Apakah Anda Yakin?");
          if (retVal == true) {
              window.location.href = "admin.php?page=calon&del=&id=" + id;
              return true;
          } else {
              window.location = 'admin.php?page=calon&halaman=1&q=';
              return false;
          }
      }
      function hapus_data(id) {
          var retVal = confirm("Apakah Anda Yakin?");
          if (retVal == true) {
              window.location.href = "admin.php?page=admin&del=" + id;
              return true;
          } else {
              window.location = 'admin.php?page=admin';
              return false;
          }
      }
      // function hapus_reseller(id) {
      //     var retVal = confirm("Apakah Anda Yakin?");
      //     if (retVal == true) {
      //         window.location.href = "admin.php?page=reseller&del=" + id;
      //         return true;
      //     } else {
      //         window.location = 'admin.php?page=reseller';
      //         return false;
      //     }
      // }
      // function hapus_diskon(id) {
      //     var retVal = confirm("Apakah Anda Yakin?");
      //     if (retVal == true) {
      //         window.location.href = "admin.php?page=diskon&del=" + id;
      //         return true;
      //     } else {
      //         window.location = 'admin.php?page=diskon';
      //         return false;
      //     }
      // }
      function hapus_user(id) {
          var retVal = confirm("Apakah Anda Yakin?");
          if (retVal == true) {
              window.location.href = "admin.php?page=user&del=" + id;
              return true;
          } else {
              window.location = 'admin.php?page=user';
              return false;
          }
      }
      function edit_admin(id) {
          //   $('#myModal').modal('show');
          $('#edit_form').html("<center>Tunggu Sebentar...</center>");
          $('#edit_form').load('data/edit_admin.php?id=' + id);
          $('#myModal').on('show.bs.modal', function(event) {
              var button = $(event.relatedTarget)
              var recipient = button.data('id')
              var modal = $(this)
              modal.find('.modal-title').text('Edit Admin ' + recipient)
              //modal.find('.modal-body input').val(recipient)
              $(document).ready(function() {
                  $('.NO-CACHE').attr('src', function() {
                      return $(this).attr('src') + "?upload=" + Math.random()
                  });
              });
          })
      }
      // function edit_reseller(id) {
      //     //   $('#myModal').modal('show');
      //     $('#edit_form').html("<center>Tunggu Sebentar...</center>");
      //     $('#edit_form').load('data/edit_reseller.php?id=' + id);
      //     $('#myModal').on('show.bs.modal', function(event) {
      //         var button = $(event.relatedTarget)
      //         var recipient = button.data('id')
      //         var modal = $(this)
      //         modal.find('.modal-title').text('Edit Admin ' + recipient)
      //         //modal.find('.modal-body input').val(recipient)
      //         $(document).ready(function() {
      //             $('.NO-CACHE').attr('src', function() {
      //                 return $(this).attr('src') + "?upload=" + Math.random()
      //             });
      //         });
      //     })
      // }
      // function edit_diskon(id) {
      //     //   $('#myModal').modal('show');
      //     $('#edit_form').html("<center>Tunggu Sebentar...</center>");
      //     $('#edit_form').load('data/edit_diskon.php?id=' + id);
      //     $('#myModal').on('show.bs.modal', function(event) {
      //         var button = $(event.relatedTarget)
      //         var recipient = button.data('id')
      //         var modal = $(this)
      //         modal.find('.modal-title').text('Edit Diskon ' + recipient)
      //         //modal.find('.modal-body input').val(recipient)
      //         $(document).ready(function() {
      //             $('.NO-CACHE').attr('src', function() {
      //                 return $(this).attr('src') + "?upload=" + Math.random()
      //             });
      //         });
      //     })
      // }
      function edit_user(id) {
          // $('#myModal').modal('show');
          $('#edit_form').html("<center>Tunggu Sebentar...</center>");
          $('#edit_form').load('data/edit_user.php?id=' + id);
          $('#myModal1').on('show.bs.modal', function(event) {
              var button = $(event.relatedTarget)
              var recipient = button.data('id')
              var modal = $(this)
              modal.find('.modal-title').text('Edit User ' + recipient)
              //modal.find('.modal-body input').val(recipient)
          })
      }
      // function lihat_barang(idbarang) {
      //     $('#barang_form').html("<center>Tunggu Sebentar...</center>");
      //     $.ajax({
      //         url: 'data/transaksi.php',
      //         type: 'POST',
      //         dataType: 'json',
      //         data: {
      //             'get': 'barang',
      //             'id': idbarang
      //         },
      //         success: function(data) {
      //             $('#barang_form').html(data.tabel);
      //         },
      //         error: function(xhr) {
      //             alert('Gagal mengambil detail barang!');
      //         }
      //     });
      // }
      // function lihat_alamat(iduser) {
      //     $('#barang_form').html("<center>Tunggu Sebentar...</center>");
      //     $.ajax({
      //         url: 'data/transaksi.php',
      //         type: 'POST',
      //         dataType: 'json',
      //         data: {
      //             'get': 'alamat',
      //             'id': iduser
      //         },
      //         success: function(data) {
      //             $('#alamat_form').html('<textarea class="form-control" readonly="">' + data.alamat + '</textarea>');
      //         },
      //         error: function(xhr) {
      //             alert('Gagal mengambil alamat pembeli!');
      //         }
      //     });
      // }
      // function lihat_fota(id) {
      //     // $('#myModal').modal('show');
      //     $('#edit_form').html("<center>Tunggu Sebentar...</center>");
      //     $('#edit_form').load('data/lifo.php?id=' + id);
      //     $('#myModal').on('show.bs.modal', function(event) {
      //         var button = $(event.relatedTarget)
      //         var recipient = button.data('id')
      //         var modal = $(this)
      //         modal.find('.modal-title').text('Edit Barang ' + recipient)
      //         //modal.find('.modal-body input').val(recipient)
      //     })
      // }
      // function edit_transaksi(id) {
      //   $('#id-edit-transaksi').val(id);
      // }
      // function hapus_transaksi(id) {
      //     var retVal = confirm("Yakin Ingin Menghapus Transaksi Ini?");
      //     if (retVal == true) {
      //         //window.location.href = "?"+id;                  
      //         return true;
      //     } else {
      //         return false;
      //     }
      // }

    </script>


  </body>
</html>