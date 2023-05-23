<?php

class o_filtros
{
	function cmb_lst()
	{
		$str = "<select id='list' name='list' class='form-control'>
				<option value=''>Orden de llegada</option>
				<option value='1'>Listar Pacientes Mayor Riesgo</option>
				<option value='2'>Listar Pacientes Fumadores Urgentes</option>
				<option value='3'>Listar Por Prioridad Atención</option>
				<option value='4'>Paciente Mas Anciano</option>
			</select>";
		return $str;
	}
}

?>
