<?php

class o_asignarAtencion
{
	function lst_consulta(){

        $consulta = array();
        $sql = "SELECT * FROM consulta ";

        $rs = $GLOBALS['db']->Execute($sql);
        $i = 0;
            while(!$rs->EOF){

                $consulta[$i]['id'] = $rs->fields['id'];
                $consulta[$i]['cantPacientes'] = $rs->fields['cantPacientes'];
                $consulta[$i]['nombreEspecialista'] = $rs->fields['nombreEspecialista'];
                $consulta[$i]['tipoConsulta'] = $rs->fields['tipoConsulta'];
                $consulta[$i]['estado'] = $this->lit_estadoConsulta($rs->fields['estado']);
                $consulta[$i]['id_hospital'] = $this->lit_hospital($rs->fields['id_hospital']);
                $consulta[$i]['id_paciente'] = ($rs->fields['id_paciente']) ? $this->lit_paciente($rs->fields['id_paciente']) : "";
                $i++;
                $rs->MoveNext();

            }
        //echo "<pre>";print_r($consulta);echo "</pre>";
        return $consulta;
    }


    function lit_hospital($id){

        $sql = "SELECT nomHospital FROM hospital WHERE id = '{$id}'";
        //echo $sql;
        $str = "";
        $rs = $GLOBALS['db']->Execute($sql);
        $str = $rs->fields['nomHospital'];

        return $str;
    }
    function lit_paciente($id=null){

        $sql = "SELECT nombre FROM paciente WHERE id_paciente = '{$id}'";
        //echo $sql;
        $str = "";
        $rs = $GLOBALS['db']->Execute($sql);
        $str = $rs->fields['nombre'];

        return $str;
    }
    function lit_estadoConsulta($id){
        $estado = "";
        if($id == 0) $estado = "<p style='color:green'>Disponible<p>";
        if($id == 1) $estado = "<p style='color:red'>Ocupado<p>";

        return $estado;
    }

    function atenderPrioridad(){

        $consultas = array();
        $sql = "SELECT * FROM consulta where estado = 0 ";
        $rs = $GLOBALS['db']->Execute($sql);
        $i = 0;
            //busco las consultas disponibles
            while(!$rs->EOF){

                $hospital = $this->lit_hospital($rs->fields['id_hospital']);
                $consultas[$hospital][$rs->fields['tipoConsulta']]['id'] = $rs->fields['id'];
                $consultas[$hospital][$rs->fields['tipoConsulta']]['id_hospital'] = $rs->fields['id_hospital'];
                $consultas[$hospital][$rs->fields['tipoConsulta']]['tipoConsulta'] = $rs->fields['tipoConsulta'];
                $i++;
                $rs->MoveNext();
                
            }
        //echo "<pre>";print_r($consultas);echo "</pre>";
        // segun consultas disponibles reviso que existan pacientes para ser atendidos segun prioridad
        foreach ($consultas as $tipoConsulta => $val) {
            foreach ($val as $key => $value) {
                $atencion = "";
                //echo "<pre>";print_r($value);echo "</pre>";
                if($value['tipoConsulta'] == 'URGENCIA'){
                    $sql = "SELECT * FROM paciente 
                                WHERE id_hospital = '{$value['id_hospital']}' 
                                AND tipoConsulta = '{$value['tipoConsulta']}'
                                AND estado = 0 
                                Order by prioridad DESC, ordenLlegada ASC 
                                limit 1;";

                }else{ 
                    $sql = "SELECT * FROM paciente 
                                WHERE id_hospital = '{$value['id_hospital']}' 
                                AND tipoConsulta = '{$value['tipoConsulta']}'
                                AND estado = 0 
                                Order by ordenLlegada 
                                limit 1;";
                }                
                //echo $sql."<br>";
                $rs = $GLOBALS['db']->Execute($sql);
                $atencion = $rs->fields['id_paciente'];
                if(isset($atencion)){
                    // despues de ya obtener las prioridades, lo asigno el paciente a la consulta y cambio estados en pacientes/consulta
                    $cont = 0;
                    $updConsulta = "UPDATE consulta 
                                        SET id_paciente='{$atencion}', estado = 1
                                        WHERE id = '{$value['id']}' 
                                        AND id_hospital = '{$value['id_hospital']}' 
                                        AND tipoConsulta = '{$value['tipoConsulta']}'
                                        ";
                    //echo $updConsulta."<br>";
                    $GLOBALS['db']->Execute($updConsulta);

                    $updPaciente = "UPDATE paciente 
                                        SET estado = 1
                                        WHERE id_paciente = '{$atencion}' 
                                        ";
                    //echo $updPaciente."<br>";
                    $GLOBALS['db']->Execute($updPaciente);

                    //obtendo la cantidad de pacientes atendidos
                    $sql = "SELECT cantPacientes as cant 
                                FROM consulta 
                                WHERE id = '{$value['id']}' 
                                AND id_hospital = '{$value['id_hospital']}'";
                    //echo $sql."<br>";
                    $rs = $GLOBALS['db']->Execute($sql);
                    $cont = $rs->fields['cant'];
                    $cont = $cont + 1;
                    //actualizo cantidad de pacientes
                    $upd = "UPDATE consulta 
                                SET cantPacientes = {$cont}
                                WHERE id = '{$value['id']}' 
                                AND id_hospital = '{$value['id_hospital']}'";
                    //echo $upd;            
                    $GLOBALS['db']->Execute($upd);                       
                }   
            }
        }        
    }
    function liberarConsulta(){
        //libero las consultas ocupadas
        $updConsulta = "UPDATE consulta 
                    SET id_paciente = 0, estado = 0
                    WHERE estado = 1";
        $GLOBALS['db']->Execute($updConsulta);

        $updPaciente = "UPDATE paciente
                            SET estado = 2
                            WHERE estado = 1";
        $GLOBALS['db']->Execute($updPaciente);
    }
}

?>
