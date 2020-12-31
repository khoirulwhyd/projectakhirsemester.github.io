<?php

if ( isset( $_GET[ 'del' ] ) ) {
	$_POST['form'] = "delete";
}
if(isset($_POST['form'])&&$_POST['form']!=null){
	if ( ( isset( $_GET[ 'id' ] ) && $_GET[ 'id' ] != null ) || ( isset( $_POST[ 'id' ] ) && $_POST[ 'id' ] != null ) ) {
		if ( isset( $_GET[ 'id' ] ) ) {
			$id = $_GET[ 'id' ];
		} else {
			$id = $_POST[ 'id' ];
		}
		$user_name = $_SESSION['nama'];
		$query_admin =  "SELECT * FROM tbl_admin WHERE nama = '$user_name'";
		$res_admin = mysqli_query($koneksi, $query_admin);
		if(mysqli_num_rows($res_admin) > 0){
			$row_admin = $res_admin->fetch_assoc();
		} else {
			echo "User tidak terdaftar di database";
		}
	}
	switch($_POST['form']){
		case 'tambaha':
			$nama = $_POST[ 'fname' ];
			$password = $_POST[ 'password' ];
			$queries = sprintf("INSERT INTO tbl_admin (nama,pass) VALUES ('%s','%s')",$nama,$password);
			$query = $koneksi->query($queries)or die( mysqli_error( $koneksi ) );
			if ( $query) {
				echo "<script>alert('tambah data berhasil');window.location='admin.php?page=admin';</script> ";
			} else {
				echo "<script>alert('tambah data gagal atau belum upload foto;');window.location='admin.php?page=admin';</script> ";
			}
		break;
		case 'update':
			$id = $row_admin[ 'id_admin' ];
			$fnama = $_POST[ 'fname' ];
			$username = $_POST[ 'username' ];
			$password = $_POST[ 'password' ];
			$jenkel = $_POST['jenkel'];
			$query = $koneksi->query( "UPDATE admin SET fnama='$fnama',username='$username',jenkel = '$jenkel' WHERE id_admin='$id'" )or die( mysqli_error( $koneksi ) );
			if ( !empty( $_FILES[ 'foto' ][ 'name' ] ) ) {
				$foto = move_uploaded_file( $_FILES[ 'foto' ][ 'tmp_name' ], "../admin/asset/foto/" . $id . "_" . $username = $_POST[ 'username' ] . ".png" );
			} 
			if ( !empty( $password ) ) {
				$query2 = $koneksi->query( "UPDATE admin SET password=md5('$password') WHERE id_admin='$id'" )or die( mysqli_error( $koneksi ) );				
			}
			if ( $query || $query2 || $foto) {
				histori( $id, "update", "admin" );
				echo "<script>alert('update data berhasil');window.location='?page=admin';</script> ";
			} else {
				echo "<script>alert('update data gagal;');window.location='?page=admin';</script> ";
			}
		break;
		case 'delete':
			$id = @$_GET[ 'id' ];

			$qa =  "SELECT * FROM tbl_admin WHERE id_admin = '$id'";
			$res_qa = mysqli_query($koneksi, $qa);
			if(mysqli_num_rows($res_qa) > 0){
				$res_qa = $res_qa->fetch_assoc();

				if($res_qa['nama'] != 'admin' && $res_qa['nama'] != "Admin"){
					if ($user_name == $res_qa['nama']){
						echo "<script>alert('Tidak dapat menghapus session user yang aktif!');window.location='?page=admin';</script> ";
					} else {
						$sql_del = "DELETE FROM tbl_admin WHERE id_admin = '$id'";
						$res = mysqli_query($koneksi, $sql_del);
					}
				} else {
					echo "<script>alert('Admin tidak dapat dihapus!');window.location='?page=admin';</script> ";
				}
				

			} else {
				echo "User tidak terdaftar di database";
			}

			// $qb = mysqli_query( $koneksi, sprintf( "SELECT * FROM admin where id_admin = '$id'" ) );
			// $rb = mysqli_fetch_assoc( $qb );
			// $fadmin = "../admin/asset/foto/" . $rb[ 'id_admin' ] . "_" . $rb[ 'username' ] . ".png";
			// $a = mysqli_query( $koneksi, sprintf( "DELETE FROM admin WHERE id_admin='$id'" ) );
			// if ( $a ) {
			// // if ( $a || @!unlink( $fadmin ) ) {
			// 	$sql_del = "DELETE FROM tbl_admin WHERE id_admin = '$id'";
			// 	$res = mysqli_query($koneksi, $sql_del);

			// 	// histori( $id, "delete", "admin" );
			// 	echo( "<script>alert('Berhasil menghapus akun ini');window.location='admin.php?page=admin';</script>" );
			// } else {
			// 	echo( "<script>alert('Gagal menghapus akun ini ada kesalahan di system');window.location='admin.php?page=admin';</script>" );
			// }
		break;

	}
}
?>
<!-- Breadcrumb>
	<div class="breadcrumb-holder container-fluid">
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="admin.php">Home</a>
			</li>
			<li class="breadcrumb-item active">admin</li>
		</ul>
	</div>
<!-- Forms Section-->
<section class="forms p-0">
	<div class="container-fluid m-0 p-0">
		<div class="row">
			<!-- Form Elements -->
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex align-items-center m-0 p-0">
						<nav class="navbar bg-white text-dark" style="min-width: 100%;z-index: 1;">
							<div class="container-fluid">
								<h2 class="no-margin-bottom">Daftar admin</h2>
								<!-- Search Box-->
								<div class="search-box">
									<button class="dismiss"><i class="icon-close"></i></button>
									<input class="form-control cari h-100" table="admin" type="text" id="aadmin" placeholder="Cari nama admin..." value="<?php echo @$_GET['qa']?>">
								</div>
								<ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center mr-4">
									<!-- Search-->
									<li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a>
									</li>
								</ul>
								<div class="card-close ml-2 mr-2">
									<div class="dropdown">
										<button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
										<div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow">
											<a href="javascipt:void()" class="dropdown-item add" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus">
												</i>Tambah admin</a>
										</div>
									</div>
								</div>
							</div>
						</nav>
					</div>
					<div class="card-body">
					<?php
						$cari = @$_GET[ 'cari' ];
						$id = @$_GET[ 'id' ];
						if ( $cari != '' ) {
							echo '<center>Menampilkan pencarian admin <b>' . $cari . '</b>, <a href="admin.php?page=admin">Klik disini</a> untuk menampilkan semua admin.</center> ';
						}else if($id!=''){
							echo '<center>Menampilkan admin dengan id <b>' . $id . '</b>, <a href="admin.php?page=admin">Klik disini</a> untuk menampilkan semua admin.</center> ';
						}
						if ( isset( $cari ) && $cari != null ) {
							$query .= " WHERE fnama LIKE '%$cari%'";
						}else{
							$query .= "";
						}
						?>
						<div class="table-responsive">
							<table class="table table-striped table-bordered" id="example">
								<thead align="center">
									<tr>
										<th>#</th>
										<th>Nama</th>
										<!-- <th width="75px">Foto</th> -->
                    					<th width="60px">action</th>
									</tr>
								</thead>
								<tbody class="" style="">									
									<?php
									$no=0;
										$articles = "SELECT *,b.id_admin AS id FROM tbl_admin b " . $query;
										$result = mysqli_query( $koneksi, $articles );
										$total = mysqli_num_rows( $result );
										if ( $total == 0 ) {
											echo "<tr><td colspan='9' align='center'><h2>Tidak ada Admin.<h2></td></tr>";
										}
										while ( $row_admin = $result->fetch_assoc() ) {
											$start++;
											$id = $row_admin[ 'id_admin' ];
									?>
									<tr>
										<th scope="row">
											<?php echo "$start"; ?>
										</th>
										<td>
											<?php echo $row_admin['nama']; ?>
										</td>
										<!-- <td align="center" class="p-0" width="100px">
											<img src="asset/foto/<?php echo $row_admin['id_admin']."_".$row_admin['username'].".png "?>" alt="Foto Admin" class="img-fluid rounded NO-CHACHE" style='width: 100px;height:100px;'>
										</td> -->
										<td align="center" width="60px">
											<div class="btn-group-vertical">
												<a href="javascript:void()" data-id="<?php echo $row_admin['fnama']; ?>" class="btn btn-sm" onclick="edit_admin('<?php echo $id;?>');">
												<i class="fa fa-fw fa-edit"></i>Edit</a>
													<a href="javascript:void()" data-id="<?php echo $row_admin['fnama']; ?>" class="btn btn-sm text-danger" onclick="hapus_admin('<?php echo $id;?>');">
												<i class="fa fa-fw fa-trash"></i>Hapus</a>
											</div>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php

?>
<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
	<div role="document" class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 id="exampleModalLabel" class="modal-title">Edit Admin</h4>
				<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
			</div>
			<form method="post" action="" enctype="multipart/form-data">
				<div class="modal-body">
					<div id="edit_form"></div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="form" value="update">
					<button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
					<button type="submit" class="btn btn-primary" name="update">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
	<div role="document" class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 id="exampleModalLabel" class="modal-title">Tambah Admin</h4>
				<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
			</div>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="modal-body">
				<div class="form-group row">
    <label class="col-sm-3 form-control-label">Nama<i style='font-size:10px;color:red;'>*</i></label>
    <div class="col-sm-9">
      <input type="text" placeholder="Nama" class="form-control" value="" name="fname" required=true>
    </div>
  </div>					
  <div class="form-group row">
    <label class="col-sm-3 form-control-label">Password</label>
    <div class="col-sm-9">
	<input name="password" type="text" placeholder="password" class="form-control" value="" required=true>
    </div>
  </div>
					<!--div class="form-group ">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="customFile" accept="image/*" name="foto">
							<label class="custom-file-label" for="customFileLang">Silakan Pilih Foto</label>
						</div>
					</div-->
				</div>
				<div class="modal-footer">
					<input type="hidden" name="form" value="tambaha">
					<button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
					<button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="<?php echo $root_base; ?>assets/vendor/jquery/jquery.min.js"></script>
<script>
function edit_admin( id ) {
	$('#myModal').modal('show');
	$( '#edit_form' ).html( "<center>Tunggu Sebentar...</center>" );
	$( '#edit_form' ).load( 'data/admin_edit.php?id=' + id );
	$( '#myModal' ).on( 'show.bs.modal', function ( event ) {
		var button = $( event.relatedTarget )
		var recipient = button.data( 'id' )
		var modal = $( this )
		//modal.find( '.modal-title' ).text( 'Edit Admin ' + recipient )
			//modal.find('.modal-body input').val(recipient)
		$( document ).ready( function () {
			$( '.NO-CACHE' ).attr( 'src', function () {
				return $( this ).attr( 'src' ) + "?upload=" + Math.random()
			} );
		} );
	} )
}
function hapus_admin( id ) {
	var retVal = confirm( "Apakah Anda Yakin?" );
	if ( retVal == true ) {
		window.location.href = "admin.php?page=admin&del=&id=" + id;
		return true;
	} else {
		window.location = 'admin.php?page=admin';
		return false;
	}
}
$(document).ready(function(){
	$('#modalTambah').on('show.bs.modal',function(){
		$('#adminPass').val(rand_pass());
	});
});
</script>