<?php

require_once("baglan.php");

if (isset($_POST['hoca_isim'], $_POST['hoca_mail'], $_POST['hoca_sifre'], $_POST['hoca_tarih'])) {

    $hoca_isim = trim(filter_input(INPUT_POST, 'hoca_isim', FILTER_SANITIZE_STRING));
    $hoca_mail = trim(filter_input(INPUT_POST, 'hoca_mail', FILTER_SANITIZE_STRING));
    $hoca_sifre = trim(filter_input(INPUT_POST, 'hoca_sifre', FILTER_SANITIZE_STRING));
    $hoca_tarih = trim(filter_input(INPUT_POST, 'hoca_tarih', FILTER_SANITIZE_STRING));

    if (empty($hoca_mail) || empty($hoca_sifre) || empty($hoca_tarih)) {
        echo "<script type='text/javascript'>alert('Lütfen Formu Eksiksiz Doldurun!');</script>";
        Header("Refresh: 0.1; url=table.php");
    } else {
        $hoca_isim = $_POST['hoca_isim'];
        $sorgu = $baglan->prepare('SELECT hoca_id FROM hoca WHERE hoca_isim = ?');
        $sonuc = array($hoca_isim);
        $sorgu->execute($sonuc);
        if ($sorgu->rowCount()) {
            echo ("<script type='text/javascript'>alert('Zaten kayitli bir öğretmen girdiniz!');</script>");
            header("Refresh: 0.1; url=table.php");
        } else {
            $sorgu = $baglan->prepare("INSERT INTO hoca(hoca_isim, hoca_mail, hoca_sifre, hoca_tarih) VALUES(:hoca_isim, :hoca_mail, :hoca_sifre, :hoca_tarih)");
            $sonuc = $sorgu->execute(array(
                'hoca_isim' => $_POST['hoca_isim'],
                'hoca_mail' => $_POST['hoca_mail'],
                'hoca_sifre' => $_POST['hoca_sifre'],
                'hoca_tarih' => $_POST['hoca_tarih']
            ));

            if ($sonuc) {

                echo "<script type='text/javascript'>alert('Kayıt Başarılı!');</script>";
                Header("Refresh: 0.1; url=table.php");
            } else {

                echo "<script type='text/javascript'>alert('Hata Oluştu!');</script>";
                Header("Refresh: 0.1; url=table.php");
            }
        }
    }
}
?>