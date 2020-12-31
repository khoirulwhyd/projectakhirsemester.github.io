<?php 
require_once "../kon/koneksi.php";
session_start();
unset($_SESSION['pin']);
session_destroy();
header('Location: login.php');
?>