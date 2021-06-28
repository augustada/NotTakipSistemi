<?php

require_once("baglan.php");

if (isset($_POST['username'], $_POST['ders_adi'])) {

    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $ders_adi = trim(filter_input(INPUT_POST, 'ders_adi', FILTER_SANITIZE_STRING));

        $username = $_POST['username'];
        $ders_adi = $_POST['ders_adi'];
        $sorgu = $baglan->prepare('SELECT secim_id FROM ders_secim WHERE ogrenci_id = ? and ders_id = ? ');
        $sonuc = array($username,$ders_adi);
        $sorgu->execute($sonuc);
        if ($sorgu->rowCount()) {
            echo ("<script type='text/javascript'>alert('Zaten var olan bir kayıt girdiniz!');</script>");
            header("Refresh: 0.1; url=islemler.php");
        } else {
            $sorgu = $baglan->prepare("INSERT INTO ders_secim(ogrenci_id, ders_id) VALUES(:ogrenci_id, :ders_id)");
            $sonuc = $sorgu->execute(array(
                'ogrenci_id' => $_POST['username'],
                'ders_id' => $_POST['ders_adi']
            ));

            if ($sonuc) {

                echo "<script type='text/javascript'>alert('Kayıt Başarılı!');</script>";
                Header("Refresh: 0.1; url=islemler.php");
            } else {

                echo "<script type='text/javascript'>alert('Hata Oluştu!');</script>";
                Header("Refresh: 0.1; url=islemler.php");
            }
        }
    }
?>