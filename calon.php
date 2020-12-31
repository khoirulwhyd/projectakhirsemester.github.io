<?php  
@session_start();
require_once "kon/koneksi.php"; 
ob_start();
if ( !( isset( $_SESSION[ 'pin' ] ) ) || $_SESSION[ 'pin' ] == null ) {
  echo "<script>alert('Hayoo mau kemana???? :p :v :*');window.location='logout.php'</script> ";
}else{
  echo "<script>alert('Selamat Datang Kembali!!!....,Akun Anda Bisa Di Gunakan Sekali! Jadi Harap Gunakan Akun Anda Dengan Bijak!')'</script> ";
}
$nims =$_SESSION['pin'];
$queryy = $koneksi->query("SELECT * FROM tbl_user WHERE nim = '$nims'");
$qsees = mysqli_fetch_assoc($queryy);
if (isset($_GET['id'])) {
$id = $_GET['id'];
$_SESSION['calonid']=$id;
$idu=$_SESSION['pin'];
$qupin=$koneksi->query("UPDATE tbl_user SET status ='sudah' WHERE pin = '$idu'");
$qre=$koneksi->query("SELECT * FROM tbl_calon WHERE id_calon = '$id'");
$qsesss=mysqli_fetch_assoc($qre);
$qjum=$qsesss['jumlah'];
$ja=$qjum;                
$jum=0;
while ($jum < 1) {
  $jum++;
}
$jumlah=$ja+$jum;
$qulon=$koneksi->query("UPDATE tbl_calon SET jumlah = '$jumlah' WHERE id_calon = '$id'");
$qpe=$koneksi->query("INSERT INTO `tbl_penampung` (`id_penampung`, `id_user`, `id_calon`, `nampung`) VALUES (NULL, '$idu', '$id', '$jum');");
if ($qpe) {
  header("location:logout.php");
}
}
?>
<!DOCTYPE html>
<html>
    <head>
    	<title>Pemilihan Online</title>
      <!--Import Google Icon Font-->
      <link href="source/font/a.css" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="source/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="source/css/calon.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      
<style type="text/css">
@media screen and (min-width: 901px) {

}
@media screen and (max-width: 900px) {
    .dsa{

    height: 75%!important;
}

}

@media screen and (max-width: 718px) {

}
@media screen and (max-width: 600px) {

}
@media screen and (max-width: 544px) {

}
@media screen and (max-width: 320px) {
    .dsa{

    height: 50%!important;
}

}
	  body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }
  .dsa{

    height: 100%;
}

  main {
    flex: 1 0 auto;
  }
</style>      
    </head>
<body>
  <nav style="height: 60px!important;">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">
	<img src="img/logo/jatim.png" width="60" height="60" alt="">
      	<!-- <img src="img/logo/kpu.png" width="60" height="60" alt=""></a> -->
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="">Pin Anda Hanya Bisa digunakan Sekali, Gunakan Dengan Bijak</a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
	 <li><div class="user-view">
	      <div class="background blue" >
	        
	      </div>
	      <a href="#user"><img class="circle" src="../epemilu/admin/img/logo formadiksi.png"></a>
	      <a href="#name"><span class="white-text name">Selamat Datang</span></a>
	      <a href="#email"><span class="white-text name">User</span></a>
	    </div>
	</li>
    <li><a class="waves-effect" href="#!" style="height: auto;">Pilihlah Pemimpin dengan <br>Hati Nurani Anda Bukan Karena Serangan Fajar!!!</a></li>
  </ul>

    <div class="container" style="margin-top: 20px;">
      <div class="row">
<?php
$query=$koneksi->query("SELECT * FROM tbl_calon");
//$pilca=$query->fetch_assoc();
$pilc=mysqli_num_rows($query);
if ($pilc==0) {
  echo "<tr><td colspan='16' align='center'><h2>Tidak ada Calon.<h2></tr></td>";
}else{
while ($pilca=$query->fetch_assoc()) {
?>
      <div class="col s12 m4 l4">
      	  <div class="row">
		    <div class="col s12 m12">
		      <div class="card large">
		        <div class="card-image">
		          <img src="epemilu/<?php echo $pilca['foto'] ?>" style="height: 283.38px;">
		          <span class="card-title" style="padding: 0px"><div class="card-panel light-blue" style="margin: 0px;padding: 12px!important;"><?php echo $pilca['no'];?></div></span>
		            <!-- Modal Trigger -->

		        </div>
		        <div class="card-content">
              
		          <p>
                <?php 
                ?>
                <?php echo $jumlah."<br>";?>
              Nama Calon  : <b><?php echo $pilca['nama'];?></b><br>
              Partai      : <?php echo $pilca['Partai'];?><br>
		          </p>
              <br>
                
              <a href="javascript:void('a')" data-id="<?php echo $calon['nama']; ?>" class=" modal-close waves-effect waves-green btn" onclick="setuju('<?php echo $pilca['id_calon'];?>');">Pilih</a>

		        </div>
		      </div>
		    </div>
		  </div>
      </div>  
<?php
}
}
?>

    </div>
    </div>
 <div class="fixed-action-btn direction-top active">
    <!-- Element Showed -->
  <a id="menu" class="waves-effect waves-light btn btn-floating btn-large cyan" onclick="$('.tap-target').tapTarget('open')" ><i class="material-icons">menu</i></a>
  <!-- Tap Target Structure -->
  <div class="tap-target" data-target="menu">
    <div class="tap-target-content">
      <h5>Informasi</h5>
      <p>Baca dahulu sebelum memilih pilihan anda.</p>
    </div>
  </div>
</div>    
        <footer class="page-footer" style="height: 60px!important;">
            <div class="container"> 
              <p class="grey-text text-lighten-4 right">Pilihlah Dengan Hati Nurani Anda</p>
            </div>
          </div>
        </footer>






<?php
$query=$koneksi->query("SELECT * FROM tbl_calon");
//$pilca=$query->fetch_assoc();
$pilc=mysqli_num_rows($query);
while ($calon=$query->fetch_assoc()) {
?>        
  <!-- Modal Structure -->
  <!-- <div id="a<?php echo $calon['id_calon'];?>" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Calon Pilketum No Urut <?php echo $calon['no'];?></h4>
      <p>Harapan untuk Kedepannya</p><hr>
      <p><?php echo $calon['harapan'];?></p>
    </div>
    <div class="modal-footer">
    </div>
  </div> -->

<?php
}?> 


<?php
$query=$koneksi->query("SELECT * FROM tbl_calon");
//$pilca=$query->fetch_assoc();
$pilc=mysqli_num_rows($query);
while ($calon=$query->fetch_assoc()) {
?>        
  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <form action="" method="post" enctype="multipart/form-data" id="coba">
    <div class="modal-content">
      <h4 id="wish"></h4>
      <hr>
      <p>
      </p>
      <div class="row">
        <div class="col s12">
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">mode_edit</i>
              <textarea id="textarea1" class="materialize-textarea" placeholder="Ketik Disini :)" name="tambah_harapan" value="tambah_harapan"></textarea>
              <label for="textarea1" class="active"></label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer" style="height: 60px!important; background-color:#000066">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Kembali</a>
      <input type="hidden" name="form" value="tambah">
      <a href="javascript:void(a);" data-id="<?php echo $calon['nama']; ?>" class=" modal-close waves-effect waves-green btn" onclick="setuju('<?php echo $calon['id_calon'];?>');document.getElementById('coba').submit();" name="tambah">Kirim</a>
      <!--button onclick="setuju('<?php echo $calon['id_calon'];?>');" class="btn waves-effect waves-green  modal-close" type="submit" name="form" data-id="<?php echo $calon['nama']; ?>">Submit
        <i class="material-icons right">send</i>
      </button-->
    </div>
    
    </form>
  </div>

<?php
}?>   



</body>
</html>
<script src="source/js/jquery-1.8.3.min.js"></script>
<script src="source/js/materialize.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
  $(document).ready(function(){
    $('.tap-target').tapTarget();
  });
  $(document).ready(function(){
    $('.modal').modal();

  });
 $(document).ready(function(){
     $('#textarea1').val('');
  M.textareaAutoResize($('#textarea1'));
 }); 
    $(document).ready(function(){
    $('.carousel').carousel();
    $('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true
  }); 
  });
function submit()
{
   // alert('form submit');
    document.forms["coba"].submit();

   
   
}
function setuju( id ) {
  var retVal = confirm( "Apakah Anda Yakin?" );
  if ( retVal == true ) {
    window.location.href = "calon.php?page=modal&id=" + id;
    return true;
  } else {
    window.location = 'calon.php?page=modal';
    return false;
  }
}  
$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
          function edit_calon(id) {
           $('#modal1').modal('show');
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
  });
      function pilih(id) {
          $('#wish').load('welcome.php?id=' + id);

      }
</script>
