<?php
session_start();
require_once("baglan.php");
include "log.php";


  if (isset($_POST['mail'],$_POST['password']) & isset($_GET['id'])) {

    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING));
    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

    if (empty($mail)&empty($password)) {
        die("<p style='color:red'>Lütfen formu eksiksiz doldurun!</p>");
    }
    else{
  $sorgu=$baglan->prepare("UPDATE ogrenci set mail=:mail,password=:password where id=:id");
  $sonuc=$sorgu->execute(array(
    'id' => $_GET['id'],
    'mail' =>  $_POST['mail'],
    'password' => $_POST['password']
  ));
  if ($sonuc) {
    $islem = "Profil Bilgileri Düzenlendi.";
    $username = $_SESSION['username'];
    uye_log($islem,$username);
    echo "<script type='text/javascript'>alert('Kayıt Başarılı!');</script>";
    header("refresh: 0.1; url=profile.php");    

  } else {

    echo "<script type='text/javascript'>alert('Try Again!');</script>";    
  }
}
}
?>