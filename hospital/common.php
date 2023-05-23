<?php

	session_start();

	if (!isset($_SESSION['user'])) redirect("login.php");
	
	define("_DIR_CLASS", 	 "class/");
	define("_DIR_ADODB" , 	 _DIR_CLASS."adodb/");
	define("_TITLE_", "");

	require _DIR_CLASS."bd.inc.php";
	
	function redirect($url)
	{
		echo "<script>document.location='".$url."'</script>";
		exit;
	}

	function aasort (&$array, $key) 
	{
		$sorter=array();
		$ret=array();
		reset($array);
		foreach ($array as $ii => $va) {
			$sorter[$ii]=$va[$key];
		}
		arsort($sorter);
		foreach ($sorter as $ii => $va) {
			$ret[$ii]=$array[$ii];
		}
		$array=$ret;
		return $array;
	}

	$GLOBALS['dia_literal'] = array(
				"Mon" => "Lunes",
				"Tue" => "Martes",
				"Wed" => "Miércoles",
				"Thu" => "Jueves",
				"Fri" => "Viernes",
				"Sat" => "Sábado",
				"Sun" => "Domingo"
				);

	$GLOBALS['vistas'] = array(	"1" => "Dashboard",
				"8" => "General",
				"2" => "Rankinkg",
				"3" => "Evolutivo",
				"4" => "Tipo Paciente",
				"5" => "Gestión Paciente",
				"9" => "Gestión Médico",
				"10" => "Gestión Recepcionista",
				"6" => "Descargas",
				"7" => "Calidad de Datos",
				"50" => "Usuarios",
				"51" => "Logs Vistas",
				"52" => "Logs Acceso"
			);
			
	$GLOBALS['clinicas'] = array(	"1" => "Clínica Portada",
				"2" => "Clínica Atacama",
				"3" => "Clínica Los Coihues",
				"4" => "Clínica Lircay",
				"5" => "Clínica Los Andes",
				"6" => "Hospital Clínico del Sur ",
				"7" => "Clínica Puerto Montt",
				"" => "Administradores",
			);		

	$colores = array( "1" => "#badce6",
						"2" => "#70b1c9",
						"3" => "#3f97b5",
						"4" => "#71bde2",
						"5" => "#007cbb",
						"6" => "#0868ab",
						"7" => "#00548b",
						
						);
?>
