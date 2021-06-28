<?php 
if(isset($_GET["ders_id"]))
{
	include("baglan.php");
	

        $sorgu = $baglan->prepare('SELECT * FROM ders_secim where ders_id=?');
        $sorgu -> execute([$_GET['ders_id']]);
        if ($sorgu->rowCount()) {
            echo ("<script type='text/javascript'>alert('Bu derse kayıtlı öğrenci var!');</script>");
            header("Refresh: 0.1; url=table2.php");
        } 

	else {

	$sorgu=$baglan->prepare('DELETE FROM ders WHERE ders_id=?');
	$sonuc=$sorgu->execute([$_GET['ders_id']]);
	if($sonuc){
                echo " <script type='text/javascript'>
        alert('Veri basariyla silindi');
        </script>";
		header("refresh:0.1; url=table2.php"); 
	}
	else
		echo("Kayıt silinemedi.");
}
}
