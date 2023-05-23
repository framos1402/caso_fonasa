<?php

	include "../common.php";
	include "../class/o_paciente.php";
	include "../class/o_filtros.php";
	include "../class/o_asignarAtencion.php";

	

	$o_filtros = new o_filtros;
	$o_asignarAtencion = new o_asignarAtencion;
	$o_paciente = new o_paciente;

	if($_POST['list'] != "") $o_paciente->lista = $_POST['list'] ;
	$ordenLlegadaAsc = "ordenLlegada";
	$prioridad = $o_paciente->asignar_prioridad();
	$paciente = $o_paciente->lst_tbl($ordenLlegadaAsc);

	include "../templates/lista.refresh.php";

?>