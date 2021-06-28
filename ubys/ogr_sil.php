<?php 
if(isset($_GET["id"]))
{
	include("baglan.php");
	$sorgu=$baglan->prepare('DELETE FROM ogrenci WHERE id=?');
	$sonuc=$sorgu->execute([$_GET['id']]);
	if($sonuc){
                echo " <script type='text/javascript'>
        alert('Veri basariyla silindi');
        </script>";
		header("refresh:0.1; url=dashboard.php"); 
	}
	else
		echo("Kayıt silinemedi.");
}
?>