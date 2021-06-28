<?php
error_reporting(E_ALL);
include "log.php";
session_start();
ob_start();
$username = $_SESSION['username'];
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
    <main class="page cv-page">
        <section class="portfolio-block block-intro border-bottom" style="height: 440px;">
            <div class="container">
                <div class="avatar" style="background-image:url(&quot;assets/img/avatars/student.jpg&quot;);"></div>
                <div class="about-me">
                    <p>Hosgeldiniz <i><strong><?php echo ($username); ?></strong> !!</i> <br> Okul: Çanakkale 18Mart Üniversitesi
                    <br>Bölümü:<?php include("baglan.php");
                                $sorgu = $baglan->prepare("SELECT * FROM ogrenci where username= :username");
                                $sorgu->execute(['username' => $username]);
                                while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                                    $bolum=$sonuc['bolum'];
                                    $sinif=$sonuc['sinif'];
                                    $donem=$sonuc['donem']; ?>

                                    <?php echo $bolum; ?> 
                                    <br>Sınıf: <?php echo $sinif;?> (<?php echo $donem; ?>)
                                    <?php } ?>
                     </p>
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
                                $sorgu = $baglan->prepare("SELECT * FROM ogrenci where username= :username");
                                $sorgu->execute(['username' => $username]);
                                while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                                    $id = $sonuc['id'];
                                    $username = $sonuc['username'];
                                    $mail = $sonuc['mail'];
                                    $password = $sonuc['password'];
                                    $dtarih = $sonuc['dtarih'];
                                ?>
                                    <form action="duzenle.php?id=<?= $sonuc["id"] ?>" method="post" id="application-form">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col">
                                                    <p><strong>Kullanıcı Adı</strong>&nbsp;<span class="text-danger">*</span></p><input class="form-control" value="<?php echo $username; ?>" name="username" readonly required="" placeholder="Ex. John">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col">
                                                    <p><strong>Dogum Tarihi</strong>&nbsp;<span class="text-danger">*</span></p><input class="form-control" type="date" value="<?php echo $dtarih; ?>" name="dtarih" readonly required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <p><strong>Email&nbsp;</strong><span class="text-danger">*</span></p><input class="form-control" type="email" value="<?php echo $mail; ?>" name="mail" placeholder="user@domain.com">
                                        </div>
                                        <div class="form-group">
                                            <p><strong>&nbsp;Şifre&nbsp;</strong><span class="text-danger">*</span></p><input class="form-control" type="password" value="<?php echo $password; ?>" name="password" placeholder="*********" required>
                                        </div>
                                        <div class="form-group">
                                            <p><strong>Adres&nbsp;</strong><span class="text-danger">*</span></p><input class="form-control" type="text" required="" name="" placeholder="Ex. Room No-361, 33/1, 3rd Floor" readonly>
                                        </div>
                                        <div class="form-group justify-content-center d-flex">
                                            <div id="submit-btn">
                                                <div class="form-row"><a href="duzenle.php?id=<?= $sonuc["id"] ?>"><button class="btn btn-primary btn-light m-0 rounded-pill px-4" type="submit" style="min-width: 500px;">Submit</button></a></div>
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
                
                <div class="group">
                    <div class="row">
                        <div class="col">
                            <div class="contact-info portfolio-info-card">
                                <h2>Student Info</h2>
                                <?php

                                include("baglan.php");
                                $sorgu = $baglan->prepare("SELECT * FROM ogrenci where username= :username");
                                $sorgu->execute(['username' => $username]);
                                while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                                    $id = $sonuc['id'];
                                    $username = $sonuc['username'];
                                    $mail = $sonuc['mail'];
                                    $dtarih = $sonuc['dtarih'];
                                    $bolum = $sonuc['bolum'];
                                ?>
                                    <div class="row">
                                        <div class="col-1"><i class="icon ion-android-calendar icon"></i></div>
                                        <div class="col-9"><span><?php echo $dtarih; ?></span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1"><i class="icon ion-person icon"></i></div>
                                        <div class="col-9"><span><?php echo $username; ?></span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1"><i class="icon ion-ios-person icon"></i></div>
                                        <div class="col-9"><span><?php echo $bolum; ?></span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1"><i class="icon ion-ios-telephone icon"></i></div>
                                        <div class="col-9"><span>+235 3217 424</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1"><i class="icon ion-at icon"></i></div>
                                        <div class="col-9"><span><?php echo $mail; ?></span></div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
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