<?php
require_once "../../kon/koneksi.php";
$id = $_GET['id'];
$squ=$koneksi->query("UPDATE `tbl_user` SET `status` = 'belum'");
$squu=$koneksi->query("DELETE FROM tbl_penampung");
$squuu=$koneksi->query("UPDATE `tbl_calon` SET `jumlah` = '0'");
echo "<script>alert('reset data berhasil');window.location='admin.php?page=hasil';</script> ";

?>