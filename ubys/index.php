<?php
include "baglan.php";
session_start();
ob_start();
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Anasayfa - UBYS</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400i,700,700i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="index.php">UBYS Hoşgeldiniz!</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
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
    <main class="page lanidng-page">
        <section class="portfolio-block block-intro" style="height: 435px;">
            <div class="container">
                <div class="avatar" style="background-image:url(&quot;assets/img/avatars/student.jpg&quot;);"></div>
                <div class="about-me">
                    <p>Ögrenci Bilgi Sistemine Hosgeldin  <strong><?php echo ($username); ?></strong> !!<br>I work as interface and front end developer. I have passion for pixel perfect, minimal and easy to use interfaces.</p><a class="btn btn-outline-primary" role="button" href="profile.php">Profil Bilgileri</a>
                </div>
            </div>
        </section>
        <section class="portfolio-block skills" style="height: 700px;">
            <div class="container">
                <div class="heading">
                    <br>
                    <br>
                    <h2 style="font-size: 36px;margin: -22px;">DUYURULAR</h2>
                </div>
                <div class="carousel slide" data-ride="carousel" data-interval="10000" id="carousel-t">
                    <div class="carousel-inner" style="height: 380px;">
                        <div class="carousel-item active" style="height: 392px;margin: -6px;padding: 0px;">
                            <div class="col-9 text-center mx-auto testimonial-content" style="margin: 18px 138.75px 0px;height: 400px;padding: 0px;"><img class="rounded-circle" src="assets/img/avatars/teacher.jpg" width="100">
                                <p class="text-center "><b>Rektörden Mesaj</b></p>
                                <p class="text-center"><em>"Sevgili öğrenciler;

                                        Çanakkale Onsekiz Mart Üniversitesi'ni tercih etmekle alanında uzman, Türkiye'nin önde gelen akademisyenlerinden ders alma imkanına sahip olacaksınız. Teorik eğitiminizin yanı sıra çok geniş uygulama ve staj imkanlarına sahip olacaksınız. Çanakkale ve Çanakkale Onsekiz Mart Üniversitesi size çok geniş sosyal ve sportif faaliyet imkanları da sunacak. Gelin üniversitemizde çok keyifli, verimli bir öğrencilik dönemi geçirin."</em><br></p>
                                <p class="signature">Prof.Dr. Sedat Murat </p>
                                <p class="text-center date">Rektör<br></p>
                            </div>
                        </div>
                        <?php
                        $sorgu = $baglan->prepare("SELECT * FROM duyuru WHERE duyuru_durum=?");
                        $sorgu->execute(array(1));
                        while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <div class="carousel-item">
                                <div class="col-9 offset-xl-1 text-center mx-auto testimonial-content"><img class="rounded-circle" src="assets/img/avatars/teacher.jpg" width="100">
                                    <p class="text-center"><b><?php echo $sonuc["baslik"]; ?></b></p>
                                    <p class="text-center"><em>"<?php echo $sonuc["icerik"]; ?>"</em><br></p>
                                    <p class="signature"><?php echo $sonuc["hoca_isim"]; ?></p>
                                    <p class="text-center date"><br></p>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                    <div><a class="carousel-control-prev" href="#carousel-t" role="button" data-slide="prev"><i class="icon ion-android-arrow-dropleft-circle d-flex d-lg-flex justify-content-center align-items-center" style="color:var(--blue);"></i><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-t" role="button" data-slide="next"><i class="icon ion-android-arrow-dropright-circle d-flex d-lg-flex justify-content-center align-items-center" style="color:var(--blue);"></i><span class="sr-only">Next</span></a></div>
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-t" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-t" data-slide-to="1"></li>
                        <li data-target="#carousel-t" data-slide-to="2"></li>
                        <li data-target="#carousel-t" data-slide-to="3"></li>
                    </ol>
                </div>
            </div>
        </section>
    </main>
    <section class="portfolio-block website gradient" style="height: 500px;padding: 60px 0px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-5 offset-lg-1 text">
                    <h3>Hakkımızda...</h3>
                    <p style="font-size: 20px;"><br><em>Eğitim ve öğretimde bilgili, donanımlı, kültürlü ve özgüveni yüksek bireyler yetiştirmeyi hedefleyen; bilimsel çalışmalarda uygulamaya dönük, proje odaklı ve çok disiplinli araştırmalar yapma anlayışını benimsemiş; paydaşlarıyla sürdürülebilir ilişkileri gözeten; bilgiyi, sevgiyi ve saygıyı Çanakkale’nin tarihi ve zengin dokusuyla harmanlayan; “kalite odaklı, yenilikçi ve girişimci bir üniversite”</em><br><br></p>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div class="portfolio-laptop-mockup">
                        <div class="screen">
                            <div class="screen-content" style="background: url(&quot;assets/img/tech/e2929be4b71b9c961731ba0e26d4f237.png&quot;) center / contain no-repeat, var(--white);"></div>
                        </div>
                        <div class="keyboard"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>