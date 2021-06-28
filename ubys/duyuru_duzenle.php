<?php
require_once("baglan.php");
            
  if (isset($_POST['baslik'],$_POST['icerik']) & isset($_GET['duyuru_id'])) {

    $baslik = trim(filter_input(INPUT_POST, 'baslik', FILTER_SANITIZE_STRING));
    $icerik = trim(filter_input(INPUT_POST, 'icerik', FILTER_SANITIZE_STRING));


    if (empty($baslik)&&empty($icerik)) {
        die("<p>Lütfen formu eksiksiz doldurun!</p>");
    }
    else{ 
  $sorgu=$baglan->prepare("UPDATE duyuru set duyuru_durum=0 , baslik=:baslik , icerik=:icerik where duyuru_id=:duyuru_id");
  $sonuc=$sorgu->execute(array(
    'duyuru_id' => $_GET['duyuru_id'],
    'baslik' => $_POST['baslik'],
    'icerik' => $_POST['icerik'],
  ));
  if ($sonuc) {

    echo "<script type='text/javascript'>alert('Kayıt Başarılı!');</script>";
    header("location:index2.php");    

  } else {

    echo "<script type='text/javascript'>alert('Try Again!');</script>";    
  }
}
}
?>