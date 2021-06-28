<?php
require_once("baglan.php");
            
  if (isset($_POST['mail'],$_POST['bolum'],$_POST['dtarih'],$_POST['sinif'],$_POST['donem']) & isset($_GET['id'])) {

    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING));
    $bolum = trim(filter_input(INPUT_POST, 'bolum', FILTER_SANITIZE_STRING));
    $dtarih = trim(filter_input(INPUT_POST, 'dtarih', FILTER_SANITIZE_STRING));
    $sinif = trim(filter_input(INPUT_POST, 'sinif', FILTER_SANITIZE_STRING));
    $donem = trim(filter_input(INPUT_POST, 'donem', FILTER_SANITIZE_STRING));

    if (empty($mail)&&empty($bolum)&&empty($dtarih)&&empty($sinif)&&empty($donem)) {
        die("<p>Lütfen formu eksiksiz doldurun!</p>");
    }
    else{ 
  $sorgu=$baglan->prepare("UPDATE ogrenci set mail=:mail , bolum=:bolum , dtarih=:dtarih, sinif=:sinif , donem=:donem where id=:id");
  $sonuc=$sorgu->execute(array(
    'id' => $_GET['id'],
    'mail' => $_POST['mail'],
    'bolum' => $_POST['bolum'],
    'dtarih' => $_POST['dtarih'],
    'sinif' => $_POST['sinif'],
    'donem' => $_POST['donem']
  ));
  if ($sonuc) {

    echo "<script type='text/javascript'>alert('Kayıt Başarılı!');</script>";
    header("location:dashboard.php");    

  } else {

    echo "<script type='text/javascript'>alert('Try Again!');</script>";    
  }
}
}
?>