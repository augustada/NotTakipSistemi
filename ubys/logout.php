<?php session_start();
include "log.php";
  $islem = "Çıkış yapıldı.";
  $username = $_SESSION['username'];
  uye_log($islem,$username);
session_destroy(); header("location:login.php");  exit;
?>