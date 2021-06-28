<?php 
if(isset($_GET["duyuru_id"]))
{
	include("baglan.php");
	$sorgu=$baglan->prepare('DELETE FROM duyuru WHERE duyuru_id=?');
	$sonuc=$sorgu->execute([$_GET['duyuru_id']]);
	if($sonuc){
                echo " <script type='text/javascript'>
        alert('Veri basariyla silindi');
        </script>";
		header("refresh:0.1; url=table3.php"); 
	}
	else
		echo("Kayıt silinemedi.");
}
?>