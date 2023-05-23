<?php

	include "common.php";
	include "pages/header.php";
	
	//$page = "lista.php";

	if( !isset($_GET['cat']) ) $_GET['cat'] = "1";
	switch($_GET['cat']){

		case "1": $page = "lista.php"; break;			
		case "2": $page = "consulta.php"; break;

	}
	

	include "pages/$page";
	
	include "pages/footer.php";

?>
