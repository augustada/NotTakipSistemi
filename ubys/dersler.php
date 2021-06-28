<!DOCTYPE html>
<html>

<?php
session_start();
$ogrenci_id = $_SESSION["ogrenci_id"]; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Projects - Brand</title>
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
    <main class="page projects-page">
        <section class="portfolio-block projects-cards" style="padding: 70px 0px;">
            <div class="container">
                <div class="heading">
                    <h2 style="font-size: 39px;padding: 0px;">Derslerim</h2>
                </div>
                <div class="row">
                    <?php
                    include("baglan.php");
                    $sorgu = $baglan->prepare("SELECT * FROM ders_secim JOIN ogrenci ON ogrenci.id = ders_secim.ogrenci_id JOIN ders ON ders.ders_id = ders_secim.ders_id JOIN hoca ON ders.hoca_id=hoca.hoca_id WHERE ogrenci_id = :ogrenci_id");
                    $sorgu->execute(['ogrenci_id' => $ogrenci_id]);
                    while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="card border-0"><a href="#"><img class="card-img-top scale-on-hover" src="<?php echo $sonuc["resim"] ?>" alt="Card Image" style="background: #ffffff;filter: brightness(110%);width: 320.984px;height: 319.344px;"></a>
                                <div class="card-body" style="font-size: 20px;">
                                    <h6><a href="#"><?php echo $sonuc["ders_adi"]." (".$sonuc["ders_kodu"].")" ?></a></h6>
                                    <p class="text-muted card-text"><?php echo $sonuc["ders_adi"] . " - " . $sonuc["hoca_isim"] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
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