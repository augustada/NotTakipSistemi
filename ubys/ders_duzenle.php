<?php
require_once("baglan.php");
            
  if (isset($_POST['ders_adi'],$_POST['ders_kodu'],$_POST['kredi']) & isset($_GET['ders_id'])) {

    $ders_adi = trim(filter_input(INPUT_POST, 'ders_adi', FILTER_SANITIZE_STRING));
    $ders_kodu = trim(filter_input(INPUT_POST, 'ders_kodu', FILTER_SANITIZE_STRING));
    $kredi = trim(filter_input(INPUT_POST, 'kredi', FILTER_SANITIZE_STRING));

    if (empty($ders_adi)&&empty($ders_kodu)&&empty($kredi)) {
        die("<p>Lütfen formu eksiksiz doldurun!</p>");
    }
    else{ 
  $sorgu=$baglan->prepare("UPDATE ders set ders_adi=:ders_adi , ders_kodu=:ders_kodu, kredi=:kredi where ders_id=:ders_id");
  $sonuc=$sorgu->execute(array(
    'ders_id' => $_GET['ders_id'],
    'ders_adi' => $_POST['ders_adi'],
    'ders_kodu' => $_POST['ders_kodu'],
    'kredi' => $_POST['kredi']
  ));
  if ($sonuc) {

    echo "<script type='text/javascript'>alert('Kayıt Başarılı!');</script>";
    header("location:table2.php");    

  } else {

    echo "<script type='text/javascript'>alert('Try Again!');</script>";    
  }
}
}
?>