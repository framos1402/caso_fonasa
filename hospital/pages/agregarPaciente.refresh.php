<?php

	include "../common.php";
	include "../class/o_registro.php";

	$o_registro = new o_registro();

	print_r($_POST);

	 $agregar = $o_registro->agregar($_POST);

     //echo json_encode($agregar);


?>
