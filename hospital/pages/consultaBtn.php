<?php
    include "../common.php";
	include "../class/o_paciente.php";
	include "../class/o_asignarAtencion.php";

	//echo $_POST['ejecutar'];
	$o_asignarAtencion = new o_asignarAtencion;
	
	if($_POST['ejecutar'] == 1 ) $atenderPrioridad = $o_asignarAtencion->atenderPrioridad();
    if($_POST['ejecutar'] == 2 ) $atenderPrioridad = $o_asignarAtencion->liberarConsulta();
    //echo json_encode('OK');
    


?>