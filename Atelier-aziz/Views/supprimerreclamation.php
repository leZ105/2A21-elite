<?php
	include '../Controller/reclamationC.php';
	$reclamationC=new reclamationC();
	$reclamationC->supprimerreclamation($_GET["IDR"]);
	header('location:afficherListereclamations.php');
?>