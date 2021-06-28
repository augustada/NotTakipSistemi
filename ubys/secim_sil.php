<?php 
if(isset($_GET["secim_id"]))
{
	include("baglan.php");
	

        $sorgu = $baglan->prepare('SELECT * FROM ders_secim JOIN ders_not ON ders_secim.ders_id=ders_not.ders_id AND ders_secim.ogrenci_id=ders_not.ogrenci_id WHERE ders_secim.secim_id=?');
        $sorgu -> execute([$_GET['secim_id']]);
        if ($sorgu->rowCount()) {
            echo ("<script type='text/javascript'>alert('Bu derse kayıtlı not var!');</script>");
            header("Refresh: 0.1; url=table4.php");
        } 

	else {

	$sorgu=$baglan->prepare('DELETE FROM ders_secim WHERE secim_id=?');
	$sonuc=$sorgu->execute([$_GET['secim_id']]);
	if($sonuc){
                echo " <script type='text/javascript'>
        alert('Veri basariyla silindi');
        </script>";
		header("refresh:0.1; url=table4.php"); 
	}
	else
		echo("Kayıt silinemedi.");
}
}
