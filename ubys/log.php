<?php
function uye_log($islem,$username){
    include("baglan.php");

    $ip = $_SERVER["REMOTE_ADDR"];
    date_default_timezone_set('Europe/Istanbul');
    $zaman = date('d.m.Y H:i:s');  

    $log = $baglan->prepare("INSERT INTO uye_log SET 
    islem_tipi = :islem_tipi, 
    islem_zaman = :islem_zaman, 
    islem_kisi = :islem_kisi, 
    islem_ip = :islem_ip");
-
    $gonder = $log->execute(array(
        "islem_tipi" => $islem,
        "islem_zaman" => $zaman,
        "islem_kisi" => $username,
        "islem_ip" => $ip,
        
    ));
}


?>