<?php

	session_start();
	
	if ($_POST['usuario'] == "" || $_POST['clave'] == ""){
		header("location: login.php?error=2");
	}
	else{
		define("_DIR_CLASS", 	 "class/");
		define("_DIR_ADODB" , 	 _DIR_CLASS."adodb/");

		require _DIR_CLASS."bd.inc.php";
		
		
		include "class/o_paciente.php";
		$o_paciente = new o_paciente;
		
		$auth = $o_paciente->auth($_POST['usuario'], $_POST['clave']);
		//echo $auth;
		if ($auth == "ok") header("location: index.php");
		else header("location: login.php?error=$auth");
	}

?>