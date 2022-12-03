<?php
header("Content-Type: text/xmlns");
require 'database.php';

echo "<?xml version='1.0' encoding='UTF-8'?>
<rss xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xmlns:xsd='http://www.w3.org/2001/XMLSchema' versiion='2.0'>
	<channel>
		<title>Super Web</title>
		<description>PHP'de 45 Günde 45 Proje</description>
		<link>http://www.superwebyazilim.com</link>
		<language>tr</language>";
		
		$Sorgu 			= $VeritabaniBaglantisi->prepare("SELECT * FROM urunler");

		$Sorgu->execute();
		$KayitSayisi 	= $Sorgu->rowCount();
		$Kayitlar 		= $Sorgu->fetchAll(PDO::FETCH_ASSOC);

		if($KayitSayisi > 0 ){
			foreach($Kayitlar as $Kayit){
				echo "
			<item>
				<title>{$Kayit['urun_adi']}</title>
				<price>{$Kayit['urun_fiyat']}</price>
			</item>

				";
			}
		}
echo "
	</channel>
</rss>
	";

$db = null;
?>
