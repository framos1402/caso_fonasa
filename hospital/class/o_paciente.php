<?php

class o_paciente
{
	var $lista = null;
	//ingreso con usuario y contraseña
	function auth($usuario, $clave){
		
		$sql = "SELECT * FROM acceso 
					WHERE user = '{$usuario}' 
					AND pass = '{$clave}'";

		if ($rs = $GLOBALS['db']->Execute($sql)){
			if ($rs->fields['user'] != ""){
								
				$_SESSION['user'] = $rs->fields['user'];
				
				return "ok";
			}
			else{
				return 1;
			}
		}
	}
	
	//debo generar la prioridad-riesgo con la formula entregada
	function asignar_prioridad(){
		
		$paciente = array();
		$prioridad = 0;
		$sql = "SELECT * FROM paciente where prioridad is null";
		$rs = $GLOBALS['db']->Execute($sql);
		$i = 0;
			while(!$rs->EOF){


				$paciente[$i]['id'] = $rs->fields['id'];
				// segun la edad llamo a otras funciones y que nos devuelva la prioridad
				if($rs->fields['edad'] >=1 && $rs->fields['edad'] <=15){

					$prioridad = $this->prioridad_nino($rs->fields['edad'], $rs->fields['peso'], $rs->fields['estatura']);
					$paciente[$i]['prioridad'] = $prioridad;
					$paciente[$i]['tipoConsulta'] = ($prioridad <= 4) ? "PEDIATRIA": "URGENCIA" ;

				}elseif($rs->fields['edad'] >=16 && $rs->fields['edad'] <=40){

					$prioridad = $this->prioridad_joven($rs->fields['id'], $rs->fields['edad']);
					$paciente[$i]['prioridad'] = $prioridad;
					$paciente[$i]['tipoConsulta'] = ($prioridad > 4) ? "URGENCIA": "CGI" ;

				}else{

					$prioridad =  $this->prioridad_anciano($rs->fields['id'], $rs->fields['edad'] );
					$paciente[$i]['prioridad'] = $prioridad;
					$paciente[$i]['tipoConsulta'] = ($prioridad > 4) ? "URGENCIA": "CGI" ;

				}	
				$i++;
				$rs->MoveNext();

			}
		if(count($paciente) >0 ) $this->update_prioridad($paciente);
		//echo "<pre>";print_r($paciente);echo "</pre>";	
	}

	//realizo el update en la BD con la prioridad
	function update_prioridad($paciente){
		
		foreach ($paciente as $key => $value) {

			$udp ="UPDATE paciente SET prioridad='{$value['prioridad']}', tipoConsulta='{$value['tipoConsulta']}' WHERE id = '{$value['id']}' ";
			$GLOBALS['db']->Execute($udp);
		}
		
	}

	//lista las personas que llegaron 
	function lst_tbl($orden=null)
	{
		//echo $this->lista;
		$paciente = array();
		
		if($this->lista == null)   $sql = "SELECT * from paciente  order by {$orden} ";
		elseif($this->lista == 1 ) $sql = "SELECT * from paciente   order by prioridad DESC,noHistoriaClinica DESC " ;
		elseif($this->lista == 2 ) $sql = "SELECT * from paciente INNER JOIN pjoven ON paciente.id = pjoven.id_registro order by prioridad DESC " ;
		elseif($this->lista == 3 ) $sql = "SELECT * from 
										   		(SELECT * from paciente where ((edad >= 1 AND edad <= 15) OR (edad >= 41)) order by prioridad DESC, ordenLlegada DESC) 
										   		as a
											UNION ALL
											SELECT * from 
												(SELECT * from paciente where edad >= 16 AND edad <= 40 order by prioridad DESC, ordenLlegada DESC) 
												as b" ;
		elseif($this->lista == 4 ) $sql = "SELECT * from paciente WHERE id = '{$this->MaxEdad()}'";
		//echo $sql;
		$rs = $GLOBALS['db']->Execute($sql);
		$i = 0;
			while(!$rs->EOF){

				$paciente[$i]['id_paciente'] = $rs->fields['id_paciente'];
				$paciente[$i]['nombre'] = $rs->fields['nombre'];
				$paciente[$i]['edad'] = $rs->fields['edad'];
				$paciente[$i]['peso'] = $rs->fields['peso'];
				$paciente[$i]['estatura'] = $rs->fields['estatura'];
				$paciente[$i]['hospital'] = $GLOBALS['o_asignarAtencion']->lit_hospital($rs->fields['id_hospital']);
				$paciente[$i]['prioridad'] = $rs->fields['prioridad'];
				$paciente[$i]['ordenLlegada'] = $rs->fields['ordenLlegada'];
				$paciente[$i]['tipoConsulta'] = $rs->fields['tipoConsulta'];
				$paciente[$i]['estado'] = $this->lit_estado($rs->fields['estado']);
				$paciente[$i]['historiaClinica'] = $rs->fields['noHistoriaClinica'];
				
				$i++;
				$rs->MoveNext();
			}
		//echo "<pre>";print_r($paciente);echo "</pre>";
		return $paciente;
		
	}

	function prioridad_nino($edad, $peso, $estatura){
		
		$prioridad = 0;
		if($edad >=1 && $edad <=5) $prioridad = $peso - ($estatura/100) + 3;
		if($edad >=6 && $edad <=12) $prioridad = $peso - ($estatura/100) + 2;
		if($edad >=13 && $edad <=15) $prioridad = $peso - ($estatura/100) + 1;
		//determinar riesgo
		$riesgo = (($edad * $prioridad) / 100);

		return round($riesgo,1);
	}

	function prioridad_joven($id_paciente,$edad){

		$prioridad = 0;
		$sql = "SELECT fumador, anos_fumando from pjoven 
					WHERE id_registro = '{$id_paciente}' 
					AND fumador = 1 ";
		$rs = $GLOBALS['db']->Execute($sql);
		($rs->fields['fumador'] == 1) ? $prioridad = ($rs->fields['anos_fumando']/4)+2 : $prioridad = 2;
		//determinar riesgo
		$riesgo = (($edad * $prioridad) / 100);

		return round($riesgo,1);
	}

	function prioridad_anciano($id_paciente,$edad){

		$dieta = 0;
		$prioridad = 0;
		$sql = "SELECT tieneDieta FROM panciano 
					WHERE id_registro = '{$id_paciente}' 
					AND tieneDieta = 1";
		$rs = $GLOBALS['db']->Execute($sql);
		$dieta = $rs->fields['tieneDieta'];
		($edad>= 60 && $edad <= 100 && $dieta == 1) ? $prioridad = ($edad/20)+4: $prioridad = ($edad/30)+3;
		//determinar riesgo
		$riesgo = (($edad * $prioridad) / 100) + 5.3;

		return round($riesgo,1);
	}
	function lit_estado($id=null){
		$estado = "";
        if($id == 0) $estado = "<p style='color:green'>En Espera<p>";
        if($id == 1) $estado = "<p style='color:blue'>En Atención<p>";
		if($id == 2) $estado = "<p style='color:red'>Atendido<p>";

        return $estado;
	}

	function MaxEdad(){
		$sql = "SELECT id, max(edad) from paciente GROUP BY 1 ORDER BY edad desc limit 1";
		$rs = $GLOBALS['db']->Execute($sql);

		return $rs->fields['id'];
		
	}

}
?>