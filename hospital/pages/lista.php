<?php
	include "class/o_paciente.php";
	include "class/o_filtros.php";
	include "class/o_asignarAtencion.php";

	
	$o_paciente = new o_paciente;
	$o_filtros = new o_filtros;
	$o_asignarAtencion = new o_asignarAtencion;
	
	$ordenLlegadaAsc = "ordenLlegada";
	$prioridad = $o_paciente->asignar_prioridad();
	$paciente = $o_paciente->lst_tbl($ordenLlegadaAsc);
	$cmb_lst = $o_filtros->cmb_lst();

	
	include "templates/lista.php";

?>
