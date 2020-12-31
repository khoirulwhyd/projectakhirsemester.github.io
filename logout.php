<?php 
require_once "kon/koneksi.php";
session_start();
unset($_SESSION['nim']);
session_destroy();
header('Location: index.php');
print_r($_SESSION['nim']);
?>