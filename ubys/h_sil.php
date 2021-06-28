<?php 
if(isset($_GET["hoca_id"]))
{
	include("baglan.php");
	$sorgu=$baglan->prepare('DELETE FROM hoca WHERE hoca_id=?');
	$sonuc=$sorgu->execute([$_GET['hoca_id']]);
	if($sonuc){
                echo " <script type='text/javascript'>
        alert('Veri basariyla silindi');
        </script>";
		header("refresh:0.1; url=table.php"); 
	}
	else
		echo("Kayıt silinemedi.");
}
?>