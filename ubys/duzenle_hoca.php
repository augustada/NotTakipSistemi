<?php
session_start();
require_once("baglan.php");
include "log.php";


  if (isset($_POST['hoca_mail'],$_POST['hoca_sifre']) & isset($_GET['hoca_id'])) {

    $hoca_isim = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $hoca_mail = trim(filter_input(INPUT_POST, 'hoca_mail', FILTER_SANITIZE_STRING));
    $hoca_sifre = trim(filter_input(INPUT_POST, 'hoca_sifre', FILTER_SANITIZE_STRING));

    if (empty($hoca_mail)&empty($hoca_sifre)) {
        die("<p style='color:red'>Lütfen formu eksiksiz doldurun!</p>");
    }
    else{
  $sorgu=$baglan->prepare("UPDATE hoca set hoca_mail=:hoca_mail,hoca_sifre=:hoca_sifre where hoca_id=:hoca_id");
  $sonuc=$sorgu->execute(array(
    'hoca_id' => $_GET['hoca_id'],
    'hoca_mail' =>  $_POST['hoca_mail'],
    'hoca_sifre' => $_POST['hoca_sifre']
  ));
  if ($sonuc) {
    
    echo "<script type='text/javascript'>alert('Kayıt Başarılı!');</script>";
    header("refresh: 0.1; url=profile2.php");    

  } else {

    echo "<script type='text/javascript'>alert('Try Again!');</script>";    
  }
}
}
?>