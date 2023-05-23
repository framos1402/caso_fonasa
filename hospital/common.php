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
?>
