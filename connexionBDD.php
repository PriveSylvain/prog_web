<?php
try
{	
	/* 	BDD_Sylvain : " $bdd = new PDO('mysql:host=localhost;dbname=sylvain;charset=utf8', 'root', '');"
		BDD_Eric bat 640: "$bdd = new PDO('mysql:host=tp-sgbd.ups.u-psud.fr;dbname=eantho1_a','eantho1_a','eantho1_a',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));"
		BDD Amine : 
	*/
	$bdd = new PDO('mysql:host=localhost;dbname=sylvain;charset=utf8', 'root', '');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
?>
