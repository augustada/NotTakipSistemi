<?php
include "baglan.php";
session_start();
ob_start();
$hoca_isim = $_SESSION['hoca_isim'];
$hoca_id = $_SESSION['hoca_id'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Öğretmen Giriş - UBYS</title>
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
    <main class="page lanidng-page">
        <section class="portfolio-block block-intro" style="height: 435px;">
            <div class="container">
                <div class="avatar" style="background-image:url(&quot;assets/img/avatars/teacher.jpg&quot;);"></div>
                <div class="about-me">
                    <p>Ögretmen Bilgi Sistemine Hosgeldiniz <strong><?php echo ($hoca_isim); ?></strong> !!<br>I work as interface and front end developer. I have passion for pixel perfect, minimal and easy to use interfaces.</p>
                </div>
                <button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#duyuru_ekle">Duyuru Ekle</button>
                <button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#duyuru_sil">Duyuru Sil/Düzenle</button>
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
                                <p class="text-center"><b>Rektörden Mesaj</b></p>
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
    <?php
    include "baglan.php";
    $sorgu = $baglan->prepare("SELECT * FROM hoca");
    $sorgu->execute();

    while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <!-- EKLE Modal -->
        <div class="modal fade" id="duyuru_ekle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Duyuru Ekleme Sayfası</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="duyuru_ekle.php" method="POST">

                            <label>Kullanici Adi:</label>
                            <input class="form-control" type="text" class="field left" value="<?php echo $hoca_isim ?>" name="hoca_isim" required readonly>
                            <br>
                            <label>Duyuru Başlık:</label>
                            <input class="form-control" type="text" value="" name="baslik" required>
                            <br>
                            <label>İçerik:</label>
                            <textarea class="form-control" type="text" value="" name="icerik"></textarea>
                            <br>

                            <a href="duyuru_ekle.php"><button type="submit" class="btn btn-success ">Ekle</button></a>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php
    include "baglan.php";
    $sorgu = $baglan->prepare("SELECT * FROM duyuru");
    $sorgu->execute();

    while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
        $duyuru_id = $sonuc['duyuru_id'];
        $baslik = $sonuc['baslik'];
        $icerik = $sonuc['icerik'];
    ?>
        <!-- DÜZENLE/SİL Modal -->
        <div class="modal fade" id="duyuru_sil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Duyuru Düzenle Sayfası</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="" method="POST">

                            <h3>Duyuru Listeleme - Düzenle/Sil Panel</h3>
                            <br>
                            <div class="panel panel-default panel-table">
                                <div class="panel-heading">
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered table-list">

                                        <thead>
                                            <tr>
                                                <th><em class="fa fa-cog"></em></th>
                                                <th class="hidden-xs">ID</th>
                                                <th>Name</th>
                                                <th>Duyuru Başlık</th>
                                                <th>İçerik</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "baglan.php";
                                            $sorgu = $baglan->prepare("SELECT * FROM duyuru where hoca_isim = :hoca_isim");
                                            $sorgu->execute(['hoca_isim' => $hoca_isim]);

                                            while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <tr>
                                                    <td align="center">
                                                        <button class="btn btn-default" type="button" data-toggle="modal" data-target="#duyuru_duzenle<?= $sonuc['duyuru_id'] ?>" href="#duyuru_duzenle<?= $sonuc['duyuru_id'] ?>"><em class="fa fa-pencil"></em></button>
                                                        <a href="duyuru_sil.php?duyuru_id=<?= $sonuc["duyuru_id"] ?>"><button class="btn btn-danger" type="button"><em class="fa fa-trash"></em></button></a>
                                                    </td>
                                                    <td class="hidden-xs"><?php echo $sonuc['duyuru_id']; ?></td>
                                                    <td><?php echo $sonuc['hoca_isim']; ?></td>
                                                    <td><?php echo $sonuc['baslik']; ?></td>
                                                    <td><?php echo $sonuc['icerik']; ?></td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>

                                    </table>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <div class="row justify-content-between">
                            <div class="col-sm-4 col-12">Page 1 of 5
                            </div>
                            <div class="col-sm-8 col-12">
                                <ul class="pagination text-right float-right">
                                    <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script src="assets3/js/jquery.min.js"></script>
        <script src="assets3/bootstrap/js/bootstrap.min.js"></script>

        </div>
        </div>

    <?php } ?>
    <?php
    include "baglan.php";
    $sorgu = $baglan->prepare("SELECT * FROM duyuru");
    $sorgu->execute();

    while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
        $duyuru_id = $sonuc['duyuru_id'];
        $baslik = $sonuc['baslik'];
        $icerik = $sonuc['icerik'];
    ?>
    <!-- DÜZENLE Modal -->
    <div class="modal hide fade" id="duyuru_duzenle<?= $sonuc['duyuru_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Duyuru Düzenle Sayfası</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="duyuru_duzenle.php?duyuru_id=<?= $sonuc["duyuru_id"] ?>" method="POST">

                            <label>Kullanici Adi:</label>
                            <input class="form-control" type="text" class="field left" value="<?php echo $sonuc['hoca_isim']; ?>" name="hoca_isim" required readonly>
                            <br>
                            <label>Duyuru Başlık:</label>
                            <input class="form-control" type="text" value="<?php echo $baslik ?>" name="baslik" required>
                            <br>
                            <label>İçerik:</label>
                            <input class="form-control" type="text" value="<?php echo $icerik ?>" name="icerik"></textarea>
                            <br>

                            <a href="duyuru_duzenle.php?duyuru_id=<?= $sonuc["duyuru_id"] ?>"><button type="submit" class="btn btn-success ">Düzenle</button></a>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        <?php } ?>  
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