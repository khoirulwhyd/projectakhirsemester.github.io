<?php
require_once "../../kon/koneksi.php";
	if ( ( isset( $_GET[ 'id' ] ) && $_GET[ 'id' ] != null ) || ( isset( $_POST[ 'id' ] ) && $_POST[ 'id' ] != null ) ) {
		if ( isset( $_GET[ 'id' ] ) ) {
			$id = $_GET[ 'id' ];
		} else {
			$id = $_POST[ 'id' ];
		}
		$query_calon = $koneksi->query( "SELECT * FROM tbl_calon WHERE id_calon = '$id'");
		$row_calon = $query_calon->fetch_assoc();
	}
?>
<form action="">
<div class="form-group">
	<img src="<?php echo $row_calon['foto'] ?>" alt="" class="img-fluid">
    </div>
<!--div class="form-group ">
	<div class="custom-file">
		<input type="file" class="custom-file-input" id="customFile" accept="image/*" name="fotou">
		<label class="custom-file-label" for="customFileLang">Silakan Pilih Foto</label>
	</div>    
    <input type="hidden" name="form" value="update_fotob">
    <input id="id" type="hidden" value="<?php echo $id;?>" style="display:none;" name="id">
</div-->
</form>