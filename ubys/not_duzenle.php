<?php
require_once("baglan.php");


  if (isset($_POST['vize'],$_POST['final']) & isset($_GET['secim_id'])) {

    $vize = trim(filter_input(INPUT_POST, 'vize', FILTER_SANITIZE_STRING));
    $final = trim(filter_input(INPUT_POST, 'final', FILTER_SANITIZE_STRING));

    if (empty($vize)&empty($final)) {
        die("<p style='color:red'>Lütfen formu eksiksiz doldurun!</p>");
    }
    else{
    $sorgu = $baglan->prepare('SELECT * FROM ders_secim JOIN ders_not ON ders_secim.ders_id=ders_not.ders_id AND ders_secim.ogrenci_id=ders_not.ogrenci_id WHERE ders_secim.secim_id=?');
    $sorgu->execute([$_GET['secim_id']]);
    if ($sorgu->rowCount()) {
      $sonuc = $sorgu->fetch(PDO::FETCH_ASSOC);
      $not_id = $sonuc['not_id'];

      $sorgu = $baglan->prepare("UPDATE ders_not set vize=:vize,final=:final where not_id=:not_id");
      $sonuc = $sorgu->execute(array(
        'not_id' => $not_id,
        'vize' =>  $vize,
        'final' => $final
      ));
  if ($sonuc) {
    
    echo "<script type='text/javascript'>alert('Kayıt Başarılı!');</script>";
    header("refresh: 0.1; url=islemler.php");    

  } else {

    echo "<script type='text/javascript'>alert('Try Again!');</script>";    
  }

}else{
  $sorgu = $baglan->prepare('SELECT * FROM ders_secim where secim_id=? ');
  $sorgu->execute([$_GET['secim_id']]);
  if($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)){
    $ogrenci_id=$sonuc['ogrenci_id'];
    $ders_id=$sonuc['ders_id'];
    $sorgu = $baglan->prepare("INSERT INTO ders_not(ogrenci_id,ders_id,vize,final) VALUES(:ogrenci_id,:ders_id,:vize,:final)");
    $sonuc=$sorgu->execute(array(
      'ogrenci_id' => $ogrenci_id,
      'ders_id' => $ders_id,
      'vize' =>  $vize,
      'final' => $final));
      
      if ($sonuc) {
    
        echo "<script type='text/javascript'>alert('Kayıt Başarılı!');</script>";
        header("refresh: 0.1; url=islemler.php");    
    
      } else {
    
        echo "<script type='text/javascript'>alert('Try Again!');</script>";    
      }
  }

}
}
  }
