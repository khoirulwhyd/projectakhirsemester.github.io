<?php
                     $query=$koneksi->query("SELECT * FROM tbl_calon");
                    while ($pilca=$query->fetch_array()) {
                        $nama[] = $pilca['nama'];
                        $jumlah[] = $pilca['jumlah'];
                    }
?>


<!-- Breadcrumb>
	<div class="breadcrumb-holder container-fluid">
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="admin.php">Home</a>
			</li>
			<li class="breadcrumb-item active">Barang</li>
		</ul>
	</div>
<-- Forms Section-->
<section class="forms p-0">
	<div class="container-fluid m-0 p-0">
		<div class="row">
			<!-- Form Elements -->
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex align-items-center m-0 p-0">
						<nav class="navbar bg-white text-dark" style="min-width: 100%;z-index: 1;">
							<div class="container-fluid" style="text-align: center;">
								<h2 class="no-margin-bottom" style="text-align: center;">Hasil Pemilihan</h2>
								<!-- Search Box-->
								<div class="search-box">
									<button class="dismiss"><i class="icon-close"></i></button>
									<input class="form-control cari h-100" table="barang" type="text" id="calon" placeholder="Cari nama calon..." value="<?php echo @$_GET['qa']?>">
								</div>
								<!--ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center mr-4">
									- Search>
									<li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a>
									</li>
								</ul>
								<--div class="card-close ml-2 mr-2">
									<div class="dropdown">
										<button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
										<div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow">
											<a href="javascipt:void()" class="dropdown-item add" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus">
												</i>Tambah Calon</a>

											<--a href="data/barang_export.php" class="dropdown-item export"> <i class="fa fa-file-download">
												</i>Export to Excell</a>

											<a href="javascipt:void()" class="dropdown-item import" data-toggle="modal" data-target="#mdlimport">
												<i class="fa fa-file-upload">
												</i>Import to Excell</a>

											<--a href="javascipt:void()" class="dropdown-item search"> <i class="fa fa-search">
												</i>Pencarian</a-->
											<!--a href="#" class="dropdown-item close"> <i class="fa fa-times"></i>close</a>
										</div>
									</div>
								</div-->
							</div>
						</nav>
					</div>
					<div class="card-body">
					<?php
						$cari = @$_GET[ 'cari' ];
						$id = @$_GET[ 'id' ];
						if ( $cari != '' ) {
							echo '<center>Menampilkan pencarian barang <b>' . $cari . '</b>, <a href="admin.php?page=calon">Klik disini</a> untuk menampilkan semua barang.</center> ';
						}else if($id!=''){
							echo '<center>Menampilkan kode barang <b>' . $id . '</b>, <a href="admin.php?page=calon">Klik disini</a> untuk menampilkan semua barang.</center> ';
						}
						$query = "";
						if ( isset( $cari ) && $cari != null ) {
							$query .= " AND nama LIKE '%$cari%'";
						} else if ( isset( $id ) && $id != null ) {
							$query .= " AND b.id_calon = '" . $id . "'";
						}
						?>


	<div class="container bg-primary">
  <div class="row">
    <div class="col col-md-2" style="text-align: center;">
      <img src="../admin/img/jatim.png" width="100" height="100" alt="">
    </div>
    <div class="col col-md-8">
      <p style="text-align: center;margin: 0px;padding: 0px;font-size: 22px" class="text-dark"><strong>PEMILIHAN PEMIMPIN UMAT<br>
PROVINSI JAWA TIMUR<br>
PERIODE 2021-2022</strong></p>
    </div>
    <div class="col col-md-2">
    	<div style="text-align: center;">
      <img src="../admin/img/kpu.png" width="100" height="100" alt="">
  </div>
    </div>
  </div>
</div>
<br>
<br>

<div class="row mb-3">

<canvas id="myChart" style="height:40vh; width:80vw"></canvas>

	<?php
$query=$koneksi->query("SELECT * FROM tbl_calon");
$queryy=$koneksi->query("SELECT `nampung` FROM `tbl_penampung`");
$queryyy=$koneksi->query("SELECT * FROM `tbl_user`");
$queryyyy=$koneksi->query("SELECT `status` FROM `tbl_user` WHERE status = 'sudah'");
$queryyyyy=$koneksi->query("SELECT `status` FROM `tbl_user` WHERE status = 'belum'");

//$pilca=$query->fetch_assoc();
$total_seluruh=mysqli_num_rows($queryy);
$total_code_pin=mysqli_num_rows($queryyy);
$total_code_pin_terpakai=mysqli_num_rows($queryyyy);
$total_code_pin_tidak_terpakai=mysqli_num_rows($queryyyyy);
// $pilul=$queryyy->fetch_assoc();
while ($pilca=$query->fetch_assoc()) {

?>
	<div class="col col-md-4">
		<div class="card">
  <img class="card-img-top" src="../epemilu/<?php echo $pilca['foto'] ?>" alt="Card image cap" style="height: 55%; width: 100%;">
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
<div class="col col-md-12">
	<div class="card">
  <div class="card-body">
  	<p style="text-align: center;margin: 0px;padding: 0px;font-size: 22px" class="text-dark"><b>Keterangan</b></p>
    TOTAL SELURUH : <?php echo $total_seluruh;?><br>
    TOTAL Code Pin : <?php echo $total_code_pin;?><br>
    TOTAL Code Pin Terpakai : <?php echo $total_code_pin_terpakai;?><br>
    TOTAL Code Pin Tidak Dipakai : <?php echo $total_code_pin_tidak_terpakai;?><br>
    <form method="post" class="form-validate" enctype="multipart/form-data" action="">
	<button type="button" class="btn btn-primary reset" type="submit">Reset Semua</button>
	</form>
  </div>
</div>	
</div>
</section>

<script src="asset/vendor/jquery/jquery.min.js"></script>
<script src="asset/js/chart.js"></script>


<script type="text/javascript">
	$(document).ready(function(){
    $('.reset').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'data/reset.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            
            alert('reset data berhasil');window.location='admin.php?page=hasil';
        });
    });
});
</script>
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