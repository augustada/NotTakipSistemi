<?php
include("baglan.php");
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - UBYS</title>
    <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="assets2/css/styles.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
</head>

<body>
    <header class="text-center text-white masthead" style="height: 1090px;">
        <div class="overlay" style="height: 1090px;margin: 0px;opacity: 0.72;filter: brightness(95%);">
            <div class="simple-slider" style="height: 1090px;opacity: 1;">
                <div class="swiper-container" style="height: 1090px;">
                    <div class="swiper-wrapper" style="height: 1090px;">
                        <div class="swiper-slide" style="background: url(&quot;assets2/img/comu3-66880.jpg&quot;) center center / cover no-repeat;height: 1090px;filter: blur(0px) brightness(105%) contrast(108%) saturate(103%);"></div>
                        <div class="swiper-slide" style="background: url(&quot;assets2/img/5a040cac18c7731654a714ad.jpg&quot;) center center / cover no-repeat;height: 1090px;"></div>
                        <div class="swiper-slide" style="background: url(&quot;assets2/img/comu2-18591.jpg&quot;) center center / cover no-repeat;height: 1090px;"></div>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
        <div class="container" style="height: 155px;margin: 0px;">
            <div class="row" style="height: 150px;margin: -118px;width: 1200px;">
                <div class="col-xl-9 mx-auto" style="height: 150px;">
                    <h1 class="mb-5" style="text-align: center;margin: 10px;padding: 0px;width: 1027px;">UBYS Üniversite Bilgi Yönetim Sistemi</h1>
                </div>
            </div>
        </div>

        <div class="container" style="height: 400px;width: 650px;">
            <div class="row register-form" style="height: 400px;">
                <div class="col-md-8 offset-md-2" style="height: 400px;width: 403px;">
                    <form class="custom-form" action="login.php" method="post" style="height: 540px;margin: 0px;width: 420px;padding: 50px;font-family: ABeeZee, sans-serif;background: rgba(255,255,255,0.93);border-radius: 11px;color: rgb(20,20,20);">
                        <h1 style="height: 52px;font-size: 20px;margin: 28px;color: rgb(52,52,52);">Çanakkale Onsekiz Mart Üniversitesi</h1>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="email-input-field" style="color: rgb(20,20,20);">Kullanıcı</label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="text" id="username" name="username" style="border-radius: 5px;" required></div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="email-input-field" style="color: rgb(20,20,20);">Mail</label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="email" id="mail" name="mail" style="border-radius: 5px;" required></div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="pawssword-input-field" style="color: rgb(42,42,42);">Parola</label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="password" id="password" name="password" style="border-radius: 5px;" required></div>
                        </div>
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-3" required><label class="form-check-label" for="formCheck-3" style="color: rgb(40,40,40);font-size: 16px;">I've read and accept the terms and conditions</label></div><button class="btn btn-light submit-button" type="submit" style="color: #ffffff;font-family: ABeeZee, sans-serif;font-size: 18px;background: #007bff;border-radius: 4px;border-width: 1px;height: 54px;width: 152.453px;margin: 35px;">Giriş Yap</button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets2/js/script.min.js"></script>
</body>

</html>

<?php
require_once("baglan.php");
include "baglan.php";
include "log.php";
if (isset($_POST['mail'], $_POST['username'], $_POST['password'])) {

    $username = trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING));
    $mail = trim(filter_input(INPUT_POST, "mail", FILTER_SANITIZE_STRING));
    $password = trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));
    $sorgula = $baglan->prepare('SELECT * FROM ogrenci where mail=:mail and password=:password and username=:username');
    $sorgula->execute(array(
        'mail' => $mail,
        'password' => $password,
        'username' => $username
    ));

    $islem_ok = $sorgula->rowCount();
    $kisi = $sorgula->fetch();

    if ($islem_ok <= 0) {
        echo "<script type='text/javascript'>alert('Bu isimde bir kullanıcı bulunmamaktadır!');</script>";
    }
    if ($islem_ok == 1) {

        $_SESSION['username'] = $username;
        $_SESSION['ogrenci_id'] = $kisi["id"];
        $islem = "Giriş yapıldı.";
        uye_log($islem, $username);
        header("location:index.php");
    }
 else {
    $hoca_isim = trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING));
    $hoca_mail = trim(filter_input(INPUT_POST, "mail", FILTER_SANITIZE_STRING));
    $hoca_sifre = trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));
    $sorgu = $baglan->prepare('SELECT * FROM hoca where hoca_mail=:hoca_mail and hoca_sifre=:hoca_sifre and hoca_isim=:hoca_isim');
    $sorgu->execute(array(
        'hoca_mail' => $hoca_mail,
        'hoca_sifre' => $hoca_sifre,
        'hoca_isim' => $hoca_isim
    ));
    $islem1 = $sorgu->rowCount();
    $yeni = $sorgu->fetch();
    if ($islem1 <= 0) {
        echo "<script type='text/javascript'>alert('Bu isimde bir kullanıcı bulunmamaktadır!');</script>";
    }
    if ($islem1 == 1) {

        $_SESSION['hoca_isim'] = $hoca_isim;
        $_SESSION['hoca_id'] = $yeni["hoca_id"];
        header("location:index2.php");
    } else {
        echo "<span style='color:red'>Please Try Again </span>";
    }
}
}

?>