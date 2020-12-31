<?php
if(isset( $_POST[ 'form' ] ) && $_POST[ 'form' ] != NULL ) {
if(isset($_POST['form']) &&  $_POST['form'] == "tamkat"){
      $nama = $_POST[ 'warna' ];
      $harga = $_POST[ 'caption' ];
      if ( !empty( $_FILES[ 'logos' ][ 'name' ] ) ) {
        //new image uploaded
        //process your image and data
        $qb = mysqli_query( $koneksi, sprintf( "SELECT * FROM id_tata where warna = '$nama'" ) );
        $rb = mysqli_fetch_assoc( $qb );
        $foto = move_uploaded_file( $_FILES[ 'logos' ][ 'tmp_name' ], "../img/logo/logo.png" );
        $fbarang = "../img/logo/logo.png";
        $query = $koneksi->query( "UPDATE barang SET foto_barang = '$fbarang' WHERE id_barang = '" . $row_barang[ 'id_barang' ] . "'" )or die( mysqli_error( $koneksi ) ); //save to DB with new image name
      }
      // no image uploaded
      // save data, but no change the image column in MYSQL, so it will stay the same value
      $query = $koneksi->query( "UPDATE barang SET id_sub_kategori = '$subkategori',id_brand = '$brand',nama_barang = '$nama',deskripsi = '$deskripsi',harga_barang = '$harga',stok_barang = '$stok' WHERE id_barang = '" . $row_barang[ 'id_barang' ] . "'" )or die( mysqli_error( $koneksi ) );
      //save to DB but no change image column
    if ( $query ) {
      echo "<script>alert('update data berhasil');window.location='admin.php?page=barang&halaman=1&q=';</script> ";
    } else {
      echo "<script>alert('update data gagal;');window.location='admin.php?page=barang&halaman=1&q=';</script> ";
    }






  if ($qtamkat) {
   echo "<script>alert('update data berhasil');window.location='admin.php?page=tambahan';</script> ";
   }else {
  echo "<script>alert('update data gagal atau belum upload foto;');window.location='admin.php?page=tambahan';</script> " ;   
    }
  }
}
   
?>


          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
              <li class="breadcrumb-item active">Tambahan            </li>
            </ul>
          </div>
          <section class="tables" style="padding:10px 0px">   
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header d-flex align-items-center m-0 p-0">
                    	<nav class="navbar" style="min-width: 100%;    z-index: 1;">
          	            <div class="container-fluid">
          	              <h2 class="no-margin-bottom">Tambahan Tata Niaga</h2>
          		       		 <div class="card-close ml-2 mr-2">
                                <div class="dropdown">
                                  <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle text-white"><i class="fa fa-ellipsis-v"></i></button>
                                  <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                                </div>
                              </div>
          	            </div>
                  	 </nav>
                    </div>
                    <div class="card-body">
                    <form id="" method="post" action="">
                      <div class="form-group">
                        <label>Tambah warna </label>
                        <input  type="text" placeholder="Tambah Warna" class="form-control" value="" name="warna" id="warna">
                        <label>Tambah caption </label>
                        <input  type="text" class="form-control" value="" name="caption" id="caption" disabled="disabled" placeholder="Masih Pengerjaan!">
                        <button type="button" class="btn btn-primary" id="btndrop" onclick="myFunction()" disabled="disabled">Klik untuk edit</button>
                        <br>
                        <label>Tambah Logo </label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" accept="image/*" id="customFile" name="logos">
                          <label class="custom-file-label" for="customFile">Choose logos</label>
                        </div>      
                        <br>
                        <br>                                      
                        <input type="hidden" name="form" value="tamkat" readonly>
                        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>
<script type="text/javascript">
  function myFunction() {
  document.getElementById("btndrop").innerHTML = $('#caption').attr('disabled',false);
}
</script>