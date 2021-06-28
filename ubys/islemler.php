<?php
error_reporting(E_ALL);
ob_start();
session_start();
$hoca_id = $_SESSION["hoca_id"];
include "baglan.php";
$sorgu = $baglan->prepare("SELECT * FROM ders join ders_not on ders.ders_id=ders_not.ders_id join ogrenci on ogrenci.id=ders_not.ogrenci_id");
$sorgu->execute();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>İşlemler - UBYS</title>
    <link rel="stylesheet" href="assets3/bootstrap/css/bootstrap.min.css?h=9bc15b198ced39073afdea27b9935534">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="assets3/css/styles.min.css?h=5e58d77395ccfb51328e4f82f27fefea">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="index2.php">UBYS Öğretmen Ekranı</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index2.php">Anasayfa</a></li>
                    <li class="nav-item"><a class="nav-link" href="islemler.php">İşlemler</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile2.php">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout2.php">Çıkış</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page projects-page">
        <section class="portfolio-block projects-with-sidebar">
            <div class="container">
                <div class="heading">
                    <h2>İSLEMLER</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form class="search-form" method="post" style="width: 750px;">
                            <h4>Ders Seçimi</h4>
                            <br>
                            <div class="x-dropdown dropdown">
                                <div><select value="Seçiniz.." class="text-left x-drop-btn" name="ders_adi" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            <?php
                                            include "baglan.php";
                                            $sorgu = $baglan->prepare("SELECT * FROM ders join hoca on ders.hoca_id = hoca.hoca_id where hoca.hoca_id= :hoca_id");
                                            $sorgu->execute(['hoca_id' => $hoca_id]);
                                            while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                                                $sonuc['ders_adi']
                                            ?>
                                                <option class="dropdown-item" href="#" name="ders_adi"><?php echo $sonuc['ders_adi'] ?></option>

                                            <?php } ?>

                                        </div>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div><button class="btn btn-primary" type="submit">Search</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div class="row">
        <div class="col">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-light navbar-expand-md navigation-clean">
                            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

                            <div class="container">
                                <div class="row">

                                    <p></p>
                                    <h1>Ögrenci Listeleme - Not Girişi Panel</h1>

                                    <p> </p>
                                    <p> </p>
                                    <div class="panel panel-default panel-table">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-8">
                                                </div>
                                                <div class="col-4 text-right">
                                                    <button type="button" class="btn btn-primary btn-create" data-toggle="modal" data-target="#ekle">Ögrenciye Ders Ekle</button>
                                                    <br>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <table class="table table-striped table-bordered table-list">

                                                <thead>
                                                    <tr>
                                                        <th><em class="fa fa-cog"></em></th>
                                                        <th class="hidden-xs">ID</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Hoca İsim</th>
                                                        <th>Ders İsim</th>
                                                        <th>Ders Kodu</th>
                                                        <th>Vize</th>
                                                        <th>Final</th>
                                                        <th>Harf Notu</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    include("baglan.php");
                                                    if (isset($_POST["ders_adi"])) {
                                                        $sorgu = $baglan->prepare("SELECT * FROM ders_secim JOIN ders ON ders_secim.ders_id = ders.ders_id JOIN hoca ON ders.hoca_id = hoca.hoca_id JOIN ogrenci ON ders_secim.ogrenci_id = ogrenci.id LEFT JOIN ders_not ON ders.ders_id = ders_not.ders_id and ogrenci.id = ders_not.ogrenci_id WHERE  ders.ders_adi = ? order by ogrenci.id");
                                                        $sorgu->execute(array(
                                                            $_POST["ders_adi"]

                                                        ));
                                                        while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                                                            $id = $sonuc["id"];
                                                            $secim_id = $sonuc["secim_id"];
                                                            $vize = $sonuc["vize"];
                                                            $final = $sonuc["final"];
                                                            $harf_notu = $sonuc["harf_notu"];
                                                            $harf_notu = $vize * 0.4 + $final * 0.6;
                                                            if ($harf_notu <= 29 & $harf_notu >= 0 || $final < 50) {
                                                                $harf_notu = "FF";
                                                            } else if ($harf_notu <= 59 & $harf_notu >= 30 & $final >= 50) {

                                                                $harf_notu = "DD";
                                                            } else if ($harf_notu <= 67 & $harf_notu >= 60 & $final >= 50) {

                                                                $harf_notu = "CC";
                                                            } else if ($harf_notu <= 75 & $harf_notu >= 68 & $final >= 50) {

                                                                $harf_notu = "CB";
                                                            } else if ($harf_notu <= 83 & $harf_notu >= 76 & $final >= 50) {

                                                                $harf_notu = "BB";
                                                            } else if ($harf_notu <= 91 & $harf_notu >= 84 & $final >= 50) {

                                                                $harf_notu = "BA";
                                                            } else if ($harf_notu <= 100 & $harf_notu >= 92 & $final >= 50) {
                                                                $harf_notu = "AA";
                                                            }
                                                    ?>
                                                            <tr>
                                                                <td align="center">
                                                                    <button class="btn btn-default" type="button" data-toggle="modal" data-target="#not_duzenle<?= $secim_id ?>"><em class="fa fa-pencil"></em></button>

                                                                </td>
                                                                <td class="hidden-xs"><?php echo $id ?></td>
                                                                <td><?php echo $sonuc["username"] ?></td>
                                                                <td><?php echo $sonuc["mail"] ?></td>
                                                                <td><?php echo $sonuc["hoca_isim"] ?></td>
                                                                <td><?php echo $sonuc["ders_adi"] ?></td>
                                                                <td><?php echo $sonuc["ders_kodu"] ?></td>
                                                                <td><?php echo $vize ?></td>
                                                                <td><?php echo $final ?></td>
                                                                <td><?php echo $harf_notu ?></td>
                                                            </tr>
                                                        <?php }
                                                    } else {
                                                        $sorgu = $baglan->prepare("SELECT * FROM ders_secim JOIN ders ON ders_secim.ders_id = ders.ders_id JOIN hoca ON ders.hoca_id = hoca.hoca_id JOIN ogrenci ON ders_secim.ogrenci_id = ogrenci.id LEFT JOIN ders_not ON ders.ders_id = ders_not.ders_id and ogrenci.id = ders_not.ogrenci_id WHERE hoca.hoca_id = :hoca_id order by ogrenci.id");
                                                        $sorgu->execute(['hoca_id' => $hoca_id]);
                                                        while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                                                            $id = $sonuc["id"];
                                                            $secim_id = $sonuc["secim_id"];
                                                            $vize = $sonuc["vize"];
                                                            $final = $sonuc["final"];
                                                            $harf_notu = $sonuc["harf_notu"];
                                                            $harf_notu = $vize * 0.4 + $final * 0.6;
                                                            if ($harf_notu <= 29 & $harf_notu >= 0 || $final < 50) {
                                                                $harf_notu = "FF";
                                                            } else if ($harf_notu <= 59 & $harf_notu >= 30 & $final >= 50) {

                                                                $harf_notu = "DD";
                                                            } else if ($harf_notu <= 67 & $harf_notu >= 60 & $final >= 50) {

                                                                $harf_notu = "CC";
                                                            } else if ($harf_notu <= 75 & $harf_notu >= 68 & $final >= 50) {

                                                                $harf_notu = "CB";
                                                            } else if ($harf_notu <= 83 & $harf_notu >= 76 & $final >= 50) {

                                                                $harf_notu = "BB";
                                                            } else if ($harf_notu <= 91 & $harf_notu >= 84 & $final >= 50) {

                                                                $harf_notu = "BA";
                                                            } else if ($harf_notu <= 100 & $harf_notu >= 92 & $final >= 50) {
                                                                $harf_notu = "AA";
                                                            }
                                                        ?>
                                                            <tr>
                                                                <td align="center">
                                                                    <button class="btn btn-default" type="button" data-toggle="modal" data-target="#not_duzenle<?= $secim_id ?>"><em class="fa fa-pencil"></em></button>

                                                                </td>
                                                                <td class="hidden-xs"><?php echo $id ?></td>
                                                                <td><?php echo $sonuc["username"] ?></td>
                                                                <td><?php echo $sonuc["mail"] ?></td>
                                                                <td><?php echo $sonuc["hoca_isim"] ?></td>
                                                                <td><?php echo $sonuc["ders_adi"] ?></td>
                                                                <td><?php echo $sonuc["ders_kodu"] ?></td>
                                                                <td><?php echo $vize ?></td>
                                                                <td><?php echo $final ?></td>
                                                                <td><?php echo $harf_notu ?></td>
                                                            </tr>
                                                    <?php }
                                                    } ?>
                                                </tbody>

                                            </table>

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


                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- EKLE Modal -->
    <div class="modal fade" id="ekle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Öğrenci İşlemleri</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="ogrenci_ekle.php" method="POST">
                        <label>Öğrenci İsim:</label>
                        <select name="username" class="form-control" required>
                            <?php
                            $sorgu = $baglan->prepare("SELECT * FROM ogrenci");
                            $sorgu->execute();
                            while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <option value="<?php echo $sonuc['id']; ?>"><?php echo $sonuc['username']; ?></option>
                            <?php } ?>
                        </select>
                        <br>
                        <label>Ders İsim:</label>
                        <select class="form-control" name="ders_adi" required>
                            <?php
                            include "baglan.php";
                            $sorgu = $baglan->prepare("SELECT * FROM ders join hoca on ders.hoca_id = hoca.hoca_id where hoca.hoca_id= :hoca_id");
                            $sorgu->execute(['hoca_id' => $hoca_id]);
                            while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                                $sonuc['ders_adi']
                            ?>
                                <option value="<?php echo $sonuc['ders_id']; ?>"><?php echo $sonuc['ders_adi'] ?></option>

                            <?php } ?>
                        </select>
                        <br>

                        <a href="ogrenci_ekle.php?"><button type="submit" class="btn btn-success ">Ekle</button></a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Duzenle Modal -->
    <?php
    include "baglan.php";
    $sorgu = $baglan->prepare("SELECT * FROM ders_secim JOIN ders ON ders_secim.ders_id = ders.ders_id JOIN hoca ON ders.hoca_id = hoca.hoca_id JOIN ogrenci ON ders_secim.ogrenci_id = ogrenci.id LEFT JOIN ders_not ON ders.ders_id = ders_not.ders_id and ogrenci.id = ders_not.ogrenci_id WHERE hoca.hoca_id = :hoca_id order by ogrenci.id");
    $sorgu->execute(['hoca_id' => $hoca_id]);
    while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
        $secim_id = $sonuc['secim_id'];
        $username = $sonuc['username'];
        $ders_adi = $sonuc['ders_adi'];
        $ders_kodu = $sonuc['ders_kodu'];
        $vize = $sonuc['vize'];
        $final = $sonuc['final'];
    ?>
        <div class="modal fade" id="not_duzenle<?= $secim_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Not İşlemleri</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="not_duzenle.php?secim_id=<?= $secim_id ?>" method="POST">
                            <label>Öğrenci İsim:</label>
                            <input class="form-control" type="text" class="field left" readonly="readonly" value="<?= $sonuc["username"] ?>" name="username" required>
                            <br>
                            <label>Ders İsim:</label>
                            <input class="form-control" type="text" value="<?= $sonuc["ders_adi"] ?>" name="ders_adi" readonly>
                            <br>
                            <label>Ders Kodu:</label>
                            <input class="form-control" type="text" value="<?= $sonuc["ders_kodu"] ?>" name="ders_kodu" readonly>
                            <br>
                            <label>Vize:</label>
                            <input class="form-control" type="text" value="<?= $sonuc["vize"] ?>" name="vize" required>
                            <br>
                            <label>Final:</label>
                            <input class="form-control" type="text" value="<?= $sonuc["final"] ?>" name="final" required>
                            <br>

                            <a href="not_duzenle.php?secim_id=<?= $secim_id ?>"><button type="submit" class="btn btn-success ">Duzenle</button></a>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <footer class="page-footer">
        <div class="container">
            <div class="links"><a href="#">About me</a><a href="#">Contact me</a><a href="#">Q&A</a></div>
            <div class="social-icons"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-instagram-outline"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a></div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="assets3/js/script.min.js?h=966da766b68dcd93a4104dcd4792da82"></script>

</body>

</html>