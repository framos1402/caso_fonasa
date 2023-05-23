<?php

class o_registro
{
	//insertar los pacientes a la base de datos
	function agregar($data=array())
	{
		$hora = "SELECT NOW() as hora,NOW()+1 as horaid";
		$rs = $GLOBALS['db']->Execute($hora);
		$fecha_orden = $rs->fields['hora'];
		$fecha_actual = round($rs->fields['horaid'],0);
		
		//tabla paciente
		//genero un id unico con el rut y la fecha
		$id = $data['rut'].$fecha_actual;
		$sql  = "INSERT INTO paciente ";
		$sql .= "SET id_paciente 			= '{$data['rut']}', id ='{$id}', ";
		$sql .= "nombre 					= '{$data['nombre']}',";
		$sql .= "edad 						= '{$data['edad']}',";
		$sql .= "peso 						= '{$data['peso']}',";
		$sql .= "estatura 					= '{$data['estatura']}',";
		$sql .= "ordenLlegada 				= '{$fecha_orden}',";
		$sql .= "id_hospital 				= '{$data['hospital']}',";
		$sql .= "estado 					= '0',";
		$sql .= "noHistoriaClinica 			= {$this->historiaClinica($data['rut'])}";
	

		if($GLOBALS['db']->Execute($sql)){

			if ($data['edad'] <= 15){
				// tabla pninno
				$relacionPesoEstatura 		= 0;
				$relacionPesoEstatura 		= $data['peso'] - $data['estatura'];
				$sql2  = "INSERT INTO pninno ";
				$sql2 .= "SET relacionPesoEstatura = '{$relacionPesoEstatura}',";
				$sql2 .= "id_registro 		= '{$id}' ";
				
				$GLOBALS['db']->Execute($sql2);
	
			}elseif($data['edad'] >= 16 && $data['edad'] <= 40){
				// tabla pjoven
				$sql3  = "INSERT INTO pjoven ";
				$sql3 .= "SET fumador 		= '{$data['fumador']}',";
				$sql3 .= "anos_fumando 		= '{$data['anosFumando']}',";
				$sql3 .= "id_registro 		= '{$id}' ";
				
				$GLOBALS['db']->Execute($sql3);
	
			}else{
				//tabla panciano
				$sql4  = "INSERT INTO panciano ";
				$sql4 .= "SET tieneDieta 	= '{$data['dieta']}',";
				$sql4 .= "id_registro 		= '{$id}' ";
				
				$GLOBALS['db']->Execute($sql4);
	
			}
		}

		
		if ($GLOBALS['db']->ErrorMsg() == "")
		{
			return array(	"status" => "OK",
							"msg" 	 => "Usuario creado correctamente."
						);
		}
		else
		{
			return array(	"status" => "Error",
							"msg" 	 => "Ocurrió un problema y el usuario no se pudo crear."
						);
		}
	}

	function historiaClinica($rut){

		$cont =
		$sql = "SELECT noHistoriaClinica as hc from paciente WHERE id_paciente = '{$rut}' order by ordenLlegada DESC limit 1";
		$rs = $GLOBALS['db']->Execute($sql);
		$cont = $rs->fields['hc'] + 1;

		return $cont;
	}
	
}
?>