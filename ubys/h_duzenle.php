<?php
require_once("baglan.php");
            
  if (isset($_POST['hoca_mail'],$_POST['hoca_tarih']) & isset($_GET['hoca_id'])) {

    $hoca_mail = trim(filter_input(INPUT_POST, 'hoca_mail', FILTER_SANITIZE_STRING));
    $hoca_sifre = trim(filter_input(INPUT_POST, 'hoca_sifre', FILTER_SANITIZE_STRING));
    $hoca_tarih = trim(filter_input(INPUT_POST, 'hoca_tarih', FILTER_SANITIZE_STRING));


    if (empty($hoca_mail)&&empty($hoca_tarih)) {
        die("<p>Lütfen formu eksiksiz doldurun!</p>");
    }
    else{ 
  $sorgu=$baglan->prepare("UPDATE hoca set hoca_mail=:hoca_mail  , hoca_tarih=:hoca_tarih where hoca_id=:hoca_id");
  $sonuc=$sorgu->execute(array(
    'hoca_id' => $_GET['hoca_id'],
    'hoca_mail' => $_POST['hoca_mail'],
    'hoca_tarih' => $_POST['hoca_tarih']
  ));
  if ($sonuc) {

    echo "<script type='text/javascript'>alert('Kayıt Başarılı!');</script>";
    header("location:table.php");    

  } else {

    echo "<script type='text/javascript'>alert('Try Again!');</script>";    
  }
}
}
?>