<?php  
require_once "kon/koneksi.php";
                     $query=$koneksi->query("SELECT * FROM tbl_calon");
                    while ($pilca=$query->fetch_array()) {
                        $nama[] = $pilca['nama'];
                        $jumlah[] = $pilca['jumlah'];
                        $idd[]= $pilca['id_calon'];



                    }
                                            $max = max($jumlah);
                        $query=$koneksi->query("SELECT * FROM tbl_calon Where jumlah = $max");
                        $ca=mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>hasil</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="admin/asset/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="admin/asset/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="admin/asset/css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="admin/asset/css/pop.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="admin/asset/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="admin/asset/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="admin/asset/img/favicon.ico">
    <style type="text/css">
      #loader-wrapper{position:fixed;top:0;left:0;width:100%;height:100%;z-index:1000}#loader-wrapper .loader-section{position:fixed;top:0;width:51%;height:100%;background:#eceff1;z-index:1000;-webkit-transform:translateX(0);-ms-transform:translateX(0);transform:translateX(0)}#loader-wrapper .loader-section.section-left{left:0}#loader-wrapper .loader-section.section-right{right:0}#loader{display:block;position:relative;left:35%;top:20%;width:500px;height:500px;margin:-75px 0 0 -75px;border-radius:50%;border:3px solid transparent;border-top-color:#3498db;-webkit-animation:spin 2s linear infinite;animation:spin 2s linear infinite;z-index:1001}#loader:before{content:"";position:absolute;top:5px;left:5px;right:5px;bottom:5px;border-radius:50%;border:3px solid transparent;border-top-color:#e74c3c;-webkit-animation:spin 3s linear infinite;animation:spin 3s linear infinite}#loader:after{content:"";position:absolute;top:15px;left:15px;right:15px;bottom:15px;border-radius:50%;border:3px solid transparent;border-top-color:#f9c922;-webkit-animation:spin 1.5s linear infinite;animation:spin 1.5s linear infinite}#loader-logo{display:block;position:absolute;left:48%;top:46%;background:url("../images/user-bg-2.jpg") no-repeat center center;z-index:1001}@-webkit-keyframes spin{0%{-webkit-transform:rotate(0deg);-ms-transform:rotate(0deg);transform:rotate(0deg)}100%{-webkit-transform:rotate(360deg);-ms-transform:rotate(360deg);transform:rotate(360deg)}}@keyframes spin{0%{-webkit-transform:rotate(0deg);-ms-transform:rotate(0deg);transform:rotate(0deg)}100%{-webkit-transform:rotate(360deg);-ms-transform:rotate(360deg);transform:rotate(360deg)}}.loaded #loader-wrapper{visibility:hidden;-webkit-transform:translateY(-100%);-ms-transform:translateY(-100%);transform:translateY(-100%);-webkit-transition:all 0.3s 1s ease-out;transition:all 0.3s 1s ease-out}.loaded #loader-wrapper .loader-section.section-left{-webkit-transform:translateX(-100%);-ms-transform:translateX(-100%);transform:translateX(-100%);-webkit-transition:all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);transition:all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1)}.loaded #loader-wrapper .loader-section.section-right{-webkit-transform:translateX(100%);-ms-transform:translateX(100%);transform:translateX(100%);-webkit-transition:all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);transition:all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1)}.loaded #loader{opacity:0;-webkit-transition:all 0.3s ease-out;transition:all 0.3s ease-out}.progress{background-color:rgba(255,64,129,0.22)}.no-js #loader-wrapper{display:none}
      #splashscreen {
    position:fixed;
    height: 100%;
    z-index: 99999999;
    top:0;
    left:0;
    bottom:0;
    width:100%;
    background-color:white;
}
.h2{

    position: absolute;
    top: 32%;
    font-size: 200px;
    left: 43%;

}
.sel{

    position: fixed;
    top: 20px;
    left: 40%;

}
.cad{

    border: 1px solid;
    border-radius: 20px;

}
.enter_link{

    position: fixed;
    bottom: 8%;
    left: 41%;
    background: #007bff;color: white;
    display: none;

}
    </style>
</head>
<body>
    <!-- Start Page Loading -->
  <div id="loader-wrapper">
    <a class="waves-effect waves-light btn mulai" style="display: block; z-index: 9999999999;position: fixed;background: #007bff;color: white;top: 50%;left: 45%;">Mulai,?</a>
          <div class="loader-section section-left" style="z-index: 999999999"></div>
      <div class="loader-section section-right" style="z-index: 999999999"></div>
    <div id="splashscreen">
      <div id="loader" style="display: block;"></div>        

        
    <h2 class="sel">Selamat Kepada....!!!</h2>
    <h2 class="h2">5</h2>
    <!--div id="c" style="display: block;"></div-->
    <div id="c1" style="display: block;position: fixed;top: 12%;left: 30%;"></div>





    
    <a href="#" class="waves-effect waves-light btn enter_link">Klik Disini Untuk Detail</a>
</div>
  </div>
  <!-- End Page Loading -->

	<div class=" bg-primary">
  <div class="row">
    <div class="col col-md-2" style="text-align: center;">
      <img src="admin/img/Polinema.png" width="100" height="100" alt="">
    </div>
    <div class="col col-md-8">
      <p style="text-align: center;margin: 0px;padding: 0px;font-size: 22px" class="text-dark"><strong>PEMILIHAN KETUA UMUM<br>
FORUM MAHASISWA BIDIKMISI<br>
PERIODE 2019-2020</strong></p>
    </div>
    <div class="col col-md-2">
    	<div style="text-align: center;">
      <img src="admin/img/logo.png" width="100" height="100" alt="">
  </div>
    </div>
  </div>
</div>
                    <div class="card-body">
<section class="dashboard-counts" style="padding: 0">
              <div class="container-fluid">
                <div class="row bg-white has-shadow">
                	<div class="col-xl-12">
                		<div class="title" style="text-align: center;font-size: 25px"><span ><b>Hasil Pemilihan :</b></span>
                      </div>
                	</div>
                	<div class="row">
                	<div class="col-xl-12">
                    
                		<div class="row" style="padding: 0">
                  <!-- Item -->
                  <?php
$query=$koneksi->query("SELECT * FROM tbl_calon");
//$pilca=$query->fetch_assoc();
$pilc=mysqli_num_rows($query);

while ($pilca=$query->fetch_assoc()) {
  $idl=$pilca["id_calon"];
                        $querya=mysqli_query($koneksi,"SELECT * FROM tbl_calon WHERE id_calon='$idl'");
                        $rowb = mysqli_fetch_array($querya);
                        $caria=$rowb["jumlah"];
                  ?>
                  <div class="col-xl-4 col-sm-6">
                    <div class="item d-flex align-items-center">
                      <div class="icon bg-violet"><i class="icon-user"></i></div>
                      <div class="title"><span><b><?php echo $pilca['nama'];?></b></span>
                      </div>
                      <?php 

                      ?>                           
                      <div class="number"><strong><?php echo $caria ?></strong></div>
                    </div>
                  </div>
                  <?php }
                  ?>
                  <canvas id="myChart" style="height:70vh; width:80vw"></canvas>
                  </div>
              </div>
              </div>
                </div>
              </div>
            </section> 
                    </div>
                  </div>
                </div>
              

<br>
<br>
<div class="row">
<div class="col-xl-12">
	<div class="row">
		
	
	<?php
$query=$koneksi->query("SELECT * FROM `tbl_calon` ORDER BY `tbl_calon`.`no` ASC");
$queryy=$koneksi->query("SELECT `nampung` FROM `tbl_penampung`");
$queryyy=$koneksi->query("SELECT * FROM `tbl_user`");
$queryyyy=$koneksi->query("SELECT `status` FROM `tbl_user` WHERE status = 'sudah'");
$queryyyyy=$koneksi->query("SELECT `status` FROM `tbl_user` WHERE status = 'belum'");
$total_seluruh=mysqli_num_rows($queryy);
$total_code_pin=mysqli_num_rows($queryyy);
$total_code_pin_terpakai=mysqli_num_rows($queryyyy);
$total_code_pin_tidak_terpakai=mysqli_num_rows($queryyyyy);
while ($pilca=$query->fetch_assoc()) {

?>
	<div class="col col-xl-4">
		<div class="card">
  <img class="card-img-top" src="epemilu/<?php echo $pilca['foto'] ?>" alt="Card image cap" style="height: 350px !important; width: 100%;">
  <div class="card-body">
    <h5 class="card-title"><b><?php echo $pilca['nama'];?></b></h5>
    <p class="card-text"><b>Hasil Suara: <?php echo $pilca['jumlah'];?></b></p>
    <p class="card-text"><small class="text-muted">No Urut <?php echo $pilca['no'];?></small></p>
  </div>
</div>
</div>
	
	<?php
	} 
	?>
</div>	
</div>
</div>
<div class="col col-md-12">
	<div class="card">
  <div class="card-body">
  	<p style="text-align: center;margin: 0px;padding: 0px;font-size: 22px" class="text-dark"><b>Keterangan</b></p>
    TOTAL SELURUH : <?php echo $total_seluruh;?><br>
    TOTAL Code Pin : <?php echo $total_code_pin;?><br>
    TOTAL Code Pin Terpakai : <?php echo $total_code_pin_terpakai;?><br>
    TOTAL Code Pin Tidak Dipakai : <?php echo $total_code_pin_tidak_terpakai;?><br>
	<?php echo $ca['nama'];?>
  </div>
</div>	
</div>

    <!-- Javascript files-->
    <script src="admin/asset/js/jquery-3.2.1.min.js"></script>   
    <script src="admin/asset/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admin/asset/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="admin/asset/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="admin/asset/vendor/chart.js/Chart.min.js"></script>
    <script src="admin/asset/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!--script src="admin/asset/js/charts-custom.js"></script-->
    <!--- <script src="asset/js/charts-home.js"></script> -->
    <!-- Main File-->
    <script src="admin/asset/js/front.js"></script>
    <script src="admin/asset/js/chart.js"></script>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($nama); ?>,
                datasets: [{
                    label: 'jumlah Pemilihan Ketua Umum',
                    data: <?php echo json_encode($jumlah); ?>,
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });

</script>
<script type="text/javascript">
    $('.mulai').click(function () {
    $('.section-left').animate({
      left: '100%',
      opacity: '0.0',
    }, "slow");
    $('.section-right').animate({
      right: '100%',
      opacity: '0.0',
    }, "slow");
    $('.mulai').css('display','none');
var counter = 5;
var newYearCountdown1 = setInterval(function(){
  counter--
  $('.h2').text(counter);
  if (counter === 5) {
    $('#c').prepend('<img id="ca" src="http://i.telegraph.co.uk/multimedia/archive/02182/kitten_2182000b.jpg" />');
  }
  if (counter === 4) {
   $('#c').css('display','none'); 
  }
  if (counter === 0) {
    $('#c1').prepend('      <div class="col s12 m4 l4"><div class="row"><div class="col s12 m12 cad"><div class="card large" style="box-shadow:unset;"><div class="card-image" style="margin:auto;"><img src="epemilu/<?php echo $ca['foto'] ?>" style="height: 283.38px;"></div><div class="card-content"><br><p style="">Nomor Calon : <?php echo $ca['no'];?><br>Nama Calon  : <b><?php echo $ca['nama'];?></b><br>Jurusan     : <?php echo $ca['jurusan'];?><br>Prodi       : <?php echo $ca['prodi'];?><br>Dengan Total Suara : <?php echo $ca['jumlah'];?></p></div> </div></div></div> </div>  ');
    clearInterval(newYearCountdown1);
   $('.enter_link').css('display','block'); 
  $('.enter_link').click(function () {
    $(this).parent('#splashscreen').fadeOut(500);
    $('#loader-wrapper').css('display','none');
}); 
$('#loader').css('display','none');
  }
}, 1100);
});


</script>
</body>
</html>