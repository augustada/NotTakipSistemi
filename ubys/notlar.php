<?php
error_reporting(E_ALL);
include "log.php";
session_start();
ob_start();
$username = $_SESSION['username'];
$ogrenci_id = $_SESSION["ogrenci_id"];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sonuç Sayfası - UBYS</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="#">UBYS Hoşgeldiniz!</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Anasayfa</a></li>
                    <li class="nav-item"><a class="nav-link" href="dersler.php">Derslerim</a></li>
                    <li class="nav-item"><a class="nav-link" href="notlar.php">Sonuç Sayfası</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Çıkış</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page projets-page">
        <section class="portfolio-block project-no-images">
            <div class="container">
                <div class="heading">
                    <h2>DERS SONUÇLARI</h2>
                </div>
                <div class="row">
                    <?php
                    include("baglan.php");
                    $sorgu = $baglan->prepare("SELECT * FROM ders_not JOIN ogrenci ON ogrenci.id = ders_not.ogrenci_id JOIN ders ON ders.ders_id = ders_not.ders_id WHERE ogrenci_id = :ogrenci_id");
                    $sorgu->execute(['ogrenci_id' => $ogrenci_id]);
                    while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                        $vize = $sonuc["vize"];
                        $final = $sonuc["final"];
                        $harf_notu=$sonuc["harf_notu"];
                        $harf_notu = $vize * 0.4 + $final * 0.6;
                        if ($harf_notu <= 29 & $harf_notu >= 0 || $final<50) {
                            $harf_notu = "FF";
                        } else if ($harf_notu <= 59 & $harf_notu >= 30 & $final>=50) {

                            $harf_notu = "DD";
                        } else if ($harf_notu <= 67 & $harf_notu >= 60 & $final>=50) {

                            $harf_notu = "CC";
                        } else if ($harf_notu <= 75 & $harf_notu >= 68 & $final>=50) {

                            $harf_notu = "CB";
                        } else if ($harf_notu <= 83 & $harf_notu >= 76 & $final>=50) {

                            $harf_notu = "BB";
                        } else if ($harf_notu <= 91 & $harf_notu >= 84 & $final>=50) {

                            $harf_notu = "BA";
                        } else if ($harf_notu <= 100 & $harf_notu >= 92 & $final>=50) {
                            $harf_notu = "AA";
                        }

                    ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="project-card-no-image">
                                <h3><?php echo $sonuc["ders_adi"] ?></h3>
                                <h4><b>Vize:</b> <?php echo $vize ?></h4>
                                <hr>
                                <hr>
                                <h4><b>Final:</b> <?php echo $final ?></h4>
                                <hr>
                                <hr>
                                <h4><b>Harf Notu:</b> <?php echo $harf_notu ?></h4>

                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <section class="mt-4">
                <div class="container">
                    <div class="row" style="padding: 50px;">
                        <div class="col-xl-12 mb-4">
                            <h3 class="text-center">Öğrenci Giriş-Çıkış Bilgileri</h3>
                        </div>
                        <div class="col-xl-12 mb-3">
                            <div class="table-responsive table-bordered">
                                <table class="table table-bordered table2excel mb-3">
                                    <thead>
                                        <tr>
                                            <th>İşlem Tipi</th>
                                            <th>İşlem Kişi</th>
                                            <th>İşlem Zaman</th>
                                            <th>İşlem İp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "baglan.php";

                                        $sorgu = $baglan->query("SELECT * FROM uye_log ORDER BY islem_id DESC LIMIT 10");

                                        while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                                            $rehber_islem_tip = $sonuc['islem_tipi'];
                                            $rehber_islem_kisi = $sonuc['islem_kisi'];
                                            $rehber_islem_zaman = $sonuc['islem_zaman'];
                                            $rehber_islem_ip = $sonuc['islem_ip'];
                                        ?>
                                            <tr class="noExl">
                                                <td><?php echo $rehber_islem_tip; ?></td>
                                                <td><?php echo $rehber_islem_kisi; ?></td>
                                                <td><?php echo $rehber_islem_zaman; ?></td>
                                                <td><?php echo $rehber_islem_ip; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <button class="btn btn-info exportToExcel ml-2 mb-2" type="button"><strong>Export as Excel</strong></button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>
    <footer class="page-footer">
        <div class="container">
            <div class="links"><a href="#">About me</a><a href="#">Contact me</a><a href="#">Q&A</a></div>
            <div class="social-icons"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-instagram-outline"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a></div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>