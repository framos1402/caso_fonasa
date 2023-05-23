<?php
	include "class/o_paciente.php";
	include "class/o_asignarAtencion.php";

	
	$o_asignarAtencion = new o_asignarAtencion;
	
	//$atenderPrioridad = $o_asignarAtencion->atenderPrioridad();
	//$consulta = $o_asignarAtencion->lst_consulta();
	
	include "templates/consulta.php";
	

?>
