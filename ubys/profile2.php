<?php
error_reporting(E_ALL);
session_start();
ob_start();
$hoca_isim = $_SESSION['hoca_isim'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profil Bilgileri - UBYS</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="index2.php">UBYS Öğretmen Ekranı</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link active" href="index2.php">Anasayfa</a></li>
                    <li class="nav-item"><a class="nav-link" href="islemler.php">İşlemler</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile2.php">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout2.php">Çıkış</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page cv-page">
        <section class="portfolio-block block-intro border-bottom" style="height: 440px;">
            <div class="container">
                <div class="avatar" style="background-image:url(&quot;assets/img/avatars/teacher.jpg&quot;);"></div>
                <div class="about-me">
                    <p>Hosgeldiniz <strong><?php echo ($hoca_isim); ?></strong> !! I work as interface and front end developer. I have passion for pixel perfect, minimal and easy to use interfaces.</p>
                </div>
            </div>
        </section>
        <section class="portfolio-block cv">
            <div class="container">
                <div class="work-experience group">
                    <div class="heading">
                        <h2 class="text-center" style="margin: -34px;">Profil bilgileri</h2>
                    </div>
                    <div class="item">
                        <section>
                            <div class="container">
                                <?php

                                include("baglan.php");
                                $sorgu = $baglan->prepare("SELECT * FROM hoca where hoca_isim= :hoca_isim");
                                $sorgu->execute(['hoca_isim' => $hoca_isim]);
                                while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                                    $hoca_id = $sonuc['hoca_id'];
                                    $hoca_isim = $sonuc['hoca_isim'];
                                    $hoca_mail = $sonuc['hoca_mail'];
                                    $hoca_sifre = $sonuc['hoca_sifre'];
                                    $hoca_tarih = $sonuc['hoca_tarih'];
                                ?>
                                    <form action="duzenle_hoca.php?hoca_id=<?= $sonuc["hoca_id"] ?>" method="post" id="application-form">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col">
                                                    <p><strong>Kullanıcı Adı</strong>&nbsp;<span class="text-danger">*</span></p><input class="form-control" value="<?php echo $hoca_isim; ?>" name="username" readonly required="" placeholder="Ex. John">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col">
                                                    <p><strong>Dogum Tarihi</strong>&nbsp;<span class="text-danger">*</span></p><input class="form-control" type="date" value="<?php echo $hoca_tarih; ?>" name="dtarih" readonly required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <p><strong>Email&nbsp;</strong><span class="text-danger">*</span></p><input class="form-control" type="email" value="<?php echo $hoca_mail; ?>" name="hoca_mail" placeholder="user@domain.com">
                                        </div>
                                        <div class="form-group">
                                            <p><strong>&nbsp;Şifre&nbsp;</strong><span class="text-danger">*</span></p><input class="form-control" type="password" value="<?php echo $hoca_sifre; ?>" name="hoca_sifre" placeholder="*********" required>
                                        </div>
                                        <div class="form-group">
                                            <p><strong>Adres&nbsp;</strong><span class="text-danger">*</span></p><input class="form-control" type="text" required="" name="" placeholder="Ex. Room No-361, 33/1, 3rd Floor" readonly>
                                        </div>
                                        <div class="form-group justify-content-center d-flex">
                                            <div id="submit-btn">
                                                <div class="form-row"><a href="duzenle_hoca.php?hoca_id=<?= $sonuc["hoca_id"] ?>"><button class="btn btn-primary btn-light m-0 rounded-pill px-4" type="submit" style="min-width: 500px;">Submit</button></a></div>
                                            </div>
                                        </div>
                                    </form>
                                <?php } ?>
                            </div>
                            <div class="col">
                                <h3 id="fail" class="text-center text-danger d-none"><br>Form not Submitted&nbsp;<a href="#">Try Again</a><br><br></h3>
                                <h3 id="success-1" class="text-center text-success d-none"><br>Form Submitted Successfully&nbsp;<a href="#">Send Another Response</a><br><br></h3>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="education group">
                    <div class="heading">
                        <h2 class="text-center">Education</h2>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>High School</h3>
                                <h4 class="organization">Albert Einstein School</h4>
                            </div>
                            <div class="col-6"><span class="period">09/2005 - 05/2010</span></div>
                        </div>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget velit ultricies, feugiat est sed, efficitur nunc, vivamus vel accumsan dui.</p>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Applied Physics</h3>
                                <h4 class="organization">Stephen Hawking College</h4>
                            </div>
                            <div class="col-md-6"><span class="period">09/2010 - 06/2015</span></div>
                        </div>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget velit ultricies, feugiat est sed, efficitur nunc, vivamus vel accumsan dui.</p>
                    </div>
                </div>
                <div class="group">
                    <div class="row">
                        <div class="col">
                            <div class="contact-info portfolio-info-card">
                                <h2>Contact Info</h2>
                                <?php

                                include("baglan.php");
                                $sorgu = $baglan->prepare("SELECT * FROM hoca where hoca_isim= :hoca_isim");
                                $sorgu->execute(['hoca_isim' => $hoca_isim]);
                                while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                                    $hoca_isim = $sonuc['hoca_isim'];
                                    $hoca_mail = $sonuc['hoca_mail'];
                                ?>
                                    <div class="row">
                                        <div class="col-1"><i class="icon ion-android-calendar icon"></i></div>
                                        <div class="col-9"><span><?php echo $sonuc['hoca_tarih']; ?></span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1"><i class="icon ion-person icon"></i></div>
                                        <div class="col-9"><span><?php echo $hoca_isim; ?></span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1"><i class="icon ion-ios-telephone icon"></i></div>
                                        <div class="col-9"><span>+235 3217 424</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1"><i class="icon ion-at icon"></i></div>
                                        <div class="col-9"><span><?php echo $hoca_mail; ?></span></div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
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