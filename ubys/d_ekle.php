<?php

require_once("baglan.php");

if (isset($_POST['ders_adi'], $_POST['ders_kodu'], $_POST['hoca_isim'], $_POST['kredi'])) {

    $ders_adi = trim(filter_input(INPUT_POST, 'ders_adi', FILTER_SANITIZE_STRING));
    $ders_kodu = trim(filter_input(INPUT_POST, 'ders_kodu', FILTER_SANITIZE_STRING));
    $hoca_isim = trim(filter_input(INPUT_POST, 'hoca_isim', FILTER_SANITIZE_STRING));
    $kredi = trim(filter_input(INPUT_POST, 'kredi', FILTER_SANITIZE_STRING));

    if (empty($ders_kodu) || empty($hoca_isim) || empty($kredi)) {
        echo "<script type='text/javascript'>alert('Lütfen Formu Eksiksiz Doldurun!');</script>";
        Header("Refresh: 0.1; url=table2.php");
    } else {
        $ders_adi = $_POST['ders_adi'];
        $sorgu = $baglan->prepare('SELECT ders_id FROM ders WHERE ders_adi = ?');
        $sonuc = array($ders_adi);
        $sorgu->execute($sonuc);
        if ($sorgu->rowCount()) {
            echo ("<script type='text/javascript'>alert('Zaten kayitli bir öğretmen girdiniz!');</script>");
            header("Refresh: 0.1; url=table2.php");
        } else {
            $sorgu = $baglan->prepare("INSERT INTO ders(ders_adi, ders_kodu, hoca_id,  kredi) VALUES(:ders_adi, :ders_kodu, :hoca_id,  :kredi)");
            $sonuc = $sorgu->execute(array(
                'ders_adi' => $_POST['ders_adi'],
                'ders_kodu' => $_POST['ders_kodu'],
                'hoca_id' => $_POST['hoca_isim'],
                'kredi' => $_POST['kredi']
            ));

            if ($sonuc) {

                echo "<script type='text/javascript'>alert('Kayıt Başarılı!');</script>";
                Header("Refresh: 0.1; url=table2.php");
            } else {

                echo "<script type='text/javascript'>alert('Hata Oluştu!');</script>";
                Header("Refresh: 0.1; url=table2.php");
            }
        }
    }
}
?>