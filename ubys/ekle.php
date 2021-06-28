<?php

require_once("baglan.php");

if (isset($_POST['username'], $_POST['mail'], $_POST['password'], $_POST['dtarih'], $_POST['bolum'], $_POST['sinif'], $_POST['donem'])) {

    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING));
    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    $dtarih = trim(filter_input(INPUT_POST, 'dtarih', FILTER_SANITIZE_STRING));
    $bolum = trim(filter_input(INPUT_POST, 'bolum', FILTER_SANITIZE_STRING));
    $sinif = trim(filter_input(INPUT_POST, 'sinif', FILTER_SANITIZE_STRING));
    $donem = trim(filter_input(INPUT_POST, 'donem', FILTER_SANITIZE_STRING));

    if (empty($mail) || empty($password) || empty($dtarih)|| empty($bolum) || empty($sinif) || empty($donem)) {
        echo "<script type='text/javascript'>alert('Lütfen Formu Eksiksiz Doldurun!');</script>";
        Header("Refresh: 0.1; url=dashboard.php");
    } else {
        $username = $_POST['username'];
        $sorgu = $baglan->prepare('SELECT id FROM ogrenci WHERE username = ?');
        $sonuc = array($username);
        $sorgu->execute($sonuc);
        if ($sorgu->rowCount()) {
            echo ("<script type='text/javascript'>alert('Zaten kayitli bir öğrenci girdiniz!');</script>");
            header("Refresh: 0.1; url=dashboard.php");
        } else {
            $sorgu = $baglan->prepare("INSERT INTO ogrenci(username, mail, password, dtarih, bolum , sinif, donem) VALUES(:username, :mail, :password, :dtarih, :bolum, :sinif, :donem)");
            $sonuc = $sorgu->execute(array(
                'username' => $_POST['username'],
                'mail' => $_POST['mail'],
                'password' => $_POST['password'],
                'dtarih' => $_POST['dtarih'],
                'bolum' => $_POST['bolum'],
                'sinif' => $_POST['sinif'],
                'donem' => $_POST['donem']
            ));

            if ($sonuc) {

                echo "<script type='text/javascript'>alert('Kayıt Başarılı!');</script>";
                Header("Refresh: 0.1; url=dashboard.php");
            } else {

                echo "<script type='text/javascript'>alert('Hata Oluştu!');</script>";
                Header("Refresh: 0.1; url=dashboard.php");
            }
        }
    }
}
?>