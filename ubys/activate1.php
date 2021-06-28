<?php
include("baglan.php");
$durum = $_GET["durum"];
$id = $_GET["id"];
$sorgu= $baglan->prepare("UPDATE ogrenci SET durum = :durum WHERE id = :id");
$sorgu->execute(array("durum"=> $durum, "id"=> $id));
header("location:dashboard.php");

?>