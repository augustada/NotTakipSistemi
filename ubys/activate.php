<?php
include("baglan.php");
$duyuru_durum = $_GET["duyuru_durum"];
$duyuru_id = $_GET["duyuru_id"];
$sorgu= $baglan->prepare("UPDATE duyuru SET duyuru_durum = :duyuru_durum WHERE duyuru_id = :duyuru_id");
$sorgu->execute(array("duyuru_durum"=> $duyuru_durum, "duyuru_id"=> $duyuru_id));
header("location:table3.php");

?>