<?php

if ( isset( $_GET[ 'del' ] ) ) {
	$_POST[ 'form' ] = "delete";
	$id      = $_GET['id'];
}
if ( isset( $_POST[ 'form' ] ) && $_POST[ 'form' ] != NULL ) {
		if ( ( isset( $_GET[ 'id' ] ) && $_GET[ 'id' ] != null ) || ( isset( $_POST[ 'id' ] ) && $_POST[ 'id' ] != null ) ) {
		if ( isset( $_GET[ 'id' ] ) ) {
			$id = $_GET[ 'id' ];
		} else {
			$id = $_POST[ 'id' ];
		}
		$query_calon = $koneksi->query( "SELECT * FROM tbl_calon WHERE id_calon= '".$_GET[ 'id' ]."'" );
		$row_calon = $query_calon->fetch_assoc();

	}
	switch ( $_POST[ 'form' ] ) {
		case 'tambah':
			$no = $_POST[ 'nomut' ];
			$nama = $_POST[ 'tambah_nama' ];
			$jurusan = $_POST[ 'tambah_jurusan' ];
			$prodi = $_POST[ 'tambah_prodi' ];
			$harapan = $_POST[ 'tambah_harapan' ];
			$query = $koneksi->query( "INSERT INTO `tbl_calon`( `no`, `nama`, `jurusan`, `prodi`,`harapan`, `foto`,`jumlah`) VALUES ('$no','$nama','$jurusan', '$prodi','$harapan','foto',0 )" )or die( mysqli_error( $koneksi ) );
			$queryy=$koneksi->query("SELECT * FROM tbl_calon WHERE no = '$no'");
			$qfet=$queryy->fetch_assoc();
			$foto = move_uploaded_file( $_FILES[ 'foto' ][ 'tmp_name' ], "../img/calon/" . $qfet['id_calon'] . ".png" );
			$fbarang = "../img/calon/" . $qfet['id_calon'] . ".png";
			$queryy = $koneksi->query( "UPDATE tbl_calon SET foto = '$fbarang' WHERE id_calon = '".$qfet['id_calon']."'" );
			if ( $query && $foto && $queryy ) {
				echo "<script>alert('tambah data berhasil');window.location='admin.php?page=calon&halaman=1&q=';</script> ";
			} else {
				echo "<script>alert('tambah data gagal atau belum upload foto;');window.location='admin.php?page=calon&halaman=1&q=';</script> ";
			}
			break;
		case 'delete':
			$fbarang = "../img/calon/" . $row_calon['id_calon'] . ".png";
			$queries  = "DELETE FROM tbl_calon where id_calon = '".$row_calon['id_calon']."'";
			$query = $koneksi->query($queries);
			if ( $query ) {
				if ( @!unlink( $fbarang ) ) {
					echo "<script>alert('hapus data berhasil');window.location='admin.php?page=calon&halaman=1&q=';</script> ";
				}
			} else {
				echo "<script>alert('hapus data gagal;');window.location='admin.php?page=calon&halaman=1&q=';</script> ";
			}
			break;
	}
 }

?>

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
								<h2 class="no-margin-bottom">Daftar Calon</h2>
								<!-- Search Box-->
								<div class="search-box">
									<button class="dismiss"><i class="icon-close"></i></button>
									<input class="form-control cari h-100" table="barang" type="text" id="calon" placeholder="Cari nama calon..." value="<?php echo @$_GET['qa']?>">
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
												</i>Tambah Calon</a>
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
						<div class="table-responsive">
							<table class="table table-striped table-bordered" id="example">
								<thead align="center">
									<tr>
										<th rowspan="2">#</th>
										<th rowspan="2">Nomer Urut</th>
										<th rowspan="2">Nama</th>
										<th rowspan="2">Partai</th>
										<th rowspan="2" width="75px">Foto</th>
										<th rowspan="2" width="100px">action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$articles = "SELECT *,c.id_calon AS id FROM tbl_calon c ";
									//$articles = "SELECT *,b.id_barang AS id FROM barang b " . $query;
									$result = mysqli_query( $koneksi, $articles );
									$total = mysqli_num_rows( $result );
									if ( $total == 0 ) {
										echo "<tr><td colspan='16' align='center'><h2>Tidak ada Calon.<h2></tr></td>";
									}
									while ( $row = $result->fetch_assoc() ) {
										$start++;
										$id = $row[ 'id_calon' ];
										?>
									   <tr>
									       <th scope="row">
											<?php echo $start;?>
										</th>
										<td>
											<?php echo $row['no'];?>
										</td>
										<td>
											<?php echo $row['nama'];?>
										</td>
										<td>
											<?php echo $row['Partai'];?>
										</td>				
										<td width='100px' class="p-1">
											<a href='javascript:void("a")' onclick="lihat_foto('<?php echo $id;?>')">
												<img src="<?php echo $row['foto'] ?>" alt="Foto Calon" class="img rounded NO-CACHE" style='width: 100px;height:100px;'>
											</a>
										</td>
										<td align="center" >
											<div class="btn-group-vertical">
												<a href="javascript:void()" data-id="<?php echo $row['nama']; ?>" class="btn btn-sm" onclick="edit_calon('<?php echo $id;?>');">
												<i class="fa fa-fw fa-edit"></i>Edit</a>
												<a href="javascript:void()" data-id="<?php echo $row['nama']; ?>" class="btn btn-sm text-danger" onclick="hapus_calon('<?php echo $id;?>');">
												<i class="fa fa-fw fa-trash"></i>Hapus</a>
											</div>
										</td>
									</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
	<div role="document" class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 id="exampleModalLabel" class="modal-title">EDIT CALON </h4>
				<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
			</div>
			<form method="post" action="" enctype="multipart/form-data">
				<div class="modal-body">
					<div id="edit_form"></div>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
					<button type="submit" class="btn btn-primary" name="updatee">Simpan</button>
				</div>
			</form>

		</div>
	</div>
</div>
<div id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
	<div role="document" class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 id="exampleModalLabel" class="modal-title">TAMBAH CALON</h4>
				<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
			</div>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-sm-3 form-control-label">Nomer Urut Calon</label><div class="col-sm-9">
						<input name="nomut" type="text" placeholder="Nomer Urut Calon" class="form-control" value=""></div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 form-control-label">Nama</label><div class="col-sm-9">
						<input name="tambah_nama" type="text" placeholder="Nama" class="form-control" value=""></div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 form-control-label">Partai</label><div class="col-sm-9">
						<input name="tambah_Partai" type="text" placeholder="Partai" class="form-control" value=""></div>
					</div>

					<div class="form-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="customFile" accept="image/*" name="foto">
							<label class="custom-file-label" for="customFileLang">Silakan Pilih Foto</label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="form" value="tambah">
					<button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
					<button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="mdlfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
	<div role="document" class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 id="exampleModalLabel" class="modal-title">Foto barang </h4>
				<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
			</div>
			<form method="post" action="" enctype="multipart/form-data">
				<div class="modal-body">
					<div id="foto_form">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
					<button type="submit" class="btn btn-primary" name="update">Simpan</button>
				</div>
			</form>

		</div>
	</div>
</div>

<script src="asset/vendor/jquery/jquery.min.js"></script>
<script>
	function hapus_barang( id ) {

		var retVal = confirm( "Apakah Anda Yakin?" );
		if ( retVal == true ) {
			window.location.href = "admin.php?page=calon&del=&id=" + id;
			return true;
		} else {

			//window.location = 'admin.php?page=barang&halaman=1&q=';
			return false;
		}
	}

	function lihat_foto( id ) {
		$( '#mdlfoto' ).modal( 'show' );
		$( '#foto_form' ).html( "<center>Tunggu Sebentar...</center>" );
		$( '#foto_form' ).load( 'data/foto.php?lihat&&id=' + id );
		$( '#mdlfoto' ).on( 'show.bs.modal', function ( event ) {
			var button = $( event.relatedTarget );
			var recipient = button.data( '1' );
			var modal = $( this );
			//modal.find( '.modal-title' ).text( 'Diskon Barang Reguller'  );
				//modal.find('.modal-body input').val(recipient)
		} );
		$( '#mdldiskon' ).show();
	}

	$( document ).ready( function () {
		$( '.NO-CACHE' ).attr( 'src', function () {
		return $( this ).attr( 'src' ) + "?upload=" + Math.random()
	} );
	} );
</script>