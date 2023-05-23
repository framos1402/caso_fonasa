<?php
	include "../common.php";
	include "../class/o_paciente.php";
	include "../class/o_asignarAtencion.php";

	$o_asignarAtencion = new o_asignarAtencion;
	
	$consulta = $o_asignarAtencion->lst_consulta();

	
	$jsonstring = json_encode($consulta);
	echo $jsonstring;
?>
