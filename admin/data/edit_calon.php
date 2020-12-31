<?php
require_once "../../kon/koneksi.php";
$id = $_GET['id'];
$query = $koneksi->query("SELECT * FROM tbl_calon WHERE id_calon ='$id'");
$row = $query->fetch_array();

?>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Nomer Urut Calon</label><div class="col-sm-9">
                        <input name="nomute" type="text" placeholder="Nomer Urut Calon" class="form-control" value="<?php echo $row['no'];?>"></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Nama</label><div class="col-sm-9">
                        <input name="tambah_namae" type="text" placeholder="Nama" class="form-control" value="<?php echo $row['nama'];?>"></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Jurusan</label><div class="col-sm-9">
                        <input name="tambah_jurusane" type="text" placeholder="Jurusan" class="form-control" value="<?php echo $row['jurusan'];?>"></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Prodi</label><div class="col-sm-9">
                        <input name="tambah_prodie" type="text" placeholder="Prodi" class="form-control" value="<?php echo $row['prodi'];?>"></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Harapan</label>
                        <div class="col-sm-9">
                        <textarea id="edit_harapane" class="form-control" name="tambah_harapane" disabled="disabled"><?php echo nl2br($row['harapan']);?>
                        </textarea>
                        <button type="button" class="btn btn-primary" id="btndrop" onclick="myFunction()">Klik untuk edit deskripsi</button>
                    </div>
                    </div>                                        
                                <div class="form-group"> 
                                      
                                <img alt="Card image cap" class="card-img-top NO-CACHE" src="../img/calon/<?php echo $row['id_calon'] ?>.png"  style="height: 190px; cursor: pointer;">
                                </div>                     
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="fotu">
                            <label class="custom-file-label" for="customFileLang">Silakan Pilih Foto</label>
                        </div>
                    </div>                               
                                <input id="edit_id" type="text" value="<?php echo $id;?>" style="display:block;" name="id">
                                <script type="text/javascript">
                                  $(document).ready(function ()
    {           
        $('.NO-CACHE').attr('src',function () { return $(this).attr('src') + "?upload=" + Math.random() });
    });
       // $('#btndrop').addEventListener("click", myFunction()){
       //  .addEventListener("click", myFunction);
       //       drop = $('#btndrop');   
       //      if(drop.is('button)')){
       //          $('#edit_harapane').attr('disabled',true);
       //      }else{
       //          $('#edit_harapane').attr('disabled',false);
       //      }
       //  });
function myFunction() {
  document.getElementById("btndrop").innerHTML = $('#edit_harapane').attr('disabled',false);
}
    
                                </script>
