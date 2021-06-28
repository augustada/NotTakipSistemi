<?php

require_once("baglan.php");

if (isset($_POST['hoca_isim'], $_POST['baslik'], $_POST['icerik'])) {

    $hoca_isim = trim(filter_input(INPUT_POST, 'hoca_isim', FILTER_SANITIZE_STRING));
    $baslik = trim(filter_input(INPUT_POST, 'baslik', FILTER_SANITIZE_STRING));
    $icerik = trim(filter_input(INPUT_POST, 'icerik', FILTER_SANITIZE_STRING));

    if (empty($baslik) || empty($icerik)) {
        echo "<script type='text/javascript'>alert('Lütfen Formu Eksiksiz Doldurun!');</script>";
        Header("Refresh: 0.1; url=index2.php");
    } else {
        $baslik = $_POST['baslik'];
        $sorgu = $baglan->prepare('SELECT duyuru_id FROM duyuru WHERE baslik = ?');
        $sonuc = array($baslik);
        $sorgu->execute($sonuc);
        if ($sorgu->rowCount()) {
            echo ("<script type='text/javascript'>alert('Zaten kayitli bir başlık girdiniz!');</script>");
            header("Refresh: 0.1; url=index2.php");
        } else {
            $sorgu = $baglan->prepare("INSERT INTO duyuru(hoca_isim, baslik, icerik) VALUES(:hoca_isim, :baslik, :icerik)");
            $sonuc = $sorgu->execute(array(
                'hoca_isim' => $_POST['hoca_isim'],
                'baslik' => $_POST['baslik'],
                'icerik' => $_POST['icerik']
            ));

            if ($sonuc) {

                echo "<script type='text/javascript'>alert('Kayıt Başarılı!');</script>";
                Header("Refresh: 0.1; url=index2.php");
            } else {

                echo "<script type='text/javascript'>alert('Hata Oluştu!');</script>";
                Header("Refresh: 0.1; url=index2.php");
            }
        }
    }
}
?>