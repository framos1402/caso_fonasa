<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><i class="fa fa-dashboard"></i> Consultas de atención FONASA</h2>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<br />

<div id="resultado">
<div class="row">
	<div class="col-lg-12">
		<div class="ibox collapsed float-e-margins">
			<div class="ibox-title">
				<h5>Ejecución</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			<div class="ibox-content" style="display: block;">
				<form id="frm_result" method="POST" role="form" class="form-inline">
						<button id="asignarConsulta" class="btn btn-w-m btn-danger" value="asig" type="submit">Asignar Horas Prioridad</button>
				</form>
				<form id="frm_limpiar" method="POST" role="form" class="form-inline">
						<button id="limpiarConsulta" class="btn btn-w-m btn-success" type="submit">Limpiar Consultas</button>
				</form>
			</div>
		</div>
	</div>
</div>	
<div class="row">
            <div class="col-lg-12">
            <div class="ibox float-e-margins">
            <div class="ibox-title">
               
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        
                    </a>
                </div>
            </div>
            <div class="ibox-content">

            <div id="editable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
				<div class="row">
					<div class="col-sm-6">
						<div class="dataTables_length" id="editable_length">
					</div></div><div class="col-sm-6"><div id="editable_filter" class="dataTables_filter"><label>Busqueda:<input type="search" id="searchTerm" class="form-control input-sm" placeholder="" onkeyup="doSearch()" aria-controls="editable"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped table-bordered table-hover  dataTable" id="datos" role="grid" aria-describedby="editable_info">
            <thead>
            <tr role="row">		
				<th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" >N° Consulta</th>
				<th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" >Pacientes Atendidos</th>
				<th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" >Nom Especialista</th>
				<th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" >Tipo Consulta</th>
				<th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" >Estado</th>
				<th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" >Hospital</th>
				<th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" >Paciente</th>	
			</tr>
            </thead>
            <tbody id="consulta">

			</tbody>
			
            
  
            </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="editable_info" role="status" aria-live="polite"></div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="editable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="editable_previous"><a href="#" aria-controls="editable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="editable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="editable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="editable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="editable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="editable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="editable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="editable_next"><a href="#" aria-controls="editable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>

            </div>
            </div>
            </div>
            </div>
</div>






<script type="text/javascript" language="javascript">

$(document).ready(function () {
	consulta();

	function consulta(){
		$.ajax({
			url: 'pages/consulta.refresh.php',
			type: 'GET',
			success: function (response) {
				let vacio="";
				let consulta = JSON.parse(response)
				let template = ''
				consulta.forEach(consulta => {
					template += `
						<tr>
							<td>${consulta.id}</td>
							<td>${consulta.cantPacientes}</td>
							<td>${consulta.nombreEspecialista}</td>
							<td>${consulta.tipoConsulta}</td>
							<td>${consulta.estado}</td>
							<td>${consulta.id_hospital}</td>
							<td>${consulta.id_paciente}</td>
						</tr>
					`
				});
				$('#consulta').html(template)
			}
		})
	}
	$('#frm_limpiar').submit(function(e){
		let ejecutar = "2";
		$.ajax({
			url: 'pages/consultaBtn.php',
			type: 'POST',
			data: {ejecutar},
			success: function(response){
				console.log(response)
				$('#frm_result').trigger('reset')
			}
		})
		e.preventDedault();
		consulta();
	});
	$('#frm_result').submit(function(e){
		let ejecutar = "1";
		$.ajax({
			url: 'pages/consultaBtn.php',
			type: 'POST',
			data: {ejecutar},
			success: function(response){
				console.log(response)
				$('#frm_result').trigger('reset')
			}
		})
		e.preventDedault();
		consulta();
	});
})


//busqueda en la table	
function doSearch()
{
	const tableReg = document.getElementById('datos');
	const searchText = document.getElementById('searchTerm').value.toLowerCase();
	let total = 0;

	// Recorremos todas las filas con contenido de la tabla
	for (let i = 1; i < tableReg.rows.length; i++) {
		// Si el td tiene la clase "noSearch" no se busca en su cntenido
		if (tableReg.rows[i].classList.contains("noSearch")) {
		continue;
		}
		let found = false;
		const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
		// Recorremos todas las celdas
		for (let j = 0; j < cellsOfRow.length && !found; j++) {
			const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
			// Buscamos el texto en el contenido de la celda
			if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
				found = true;
				total++;
			}
		}
		if (found) {
			tableReg.rows[i].style.display = '';
		} else {
			// si no ha encontrado ninguna coincidencia, esconde la
			// fila de la tabla
			tableReg.rows[i].style.display = 'none';

		}

	}
	// mostramos las coincidencias
	const lastTR=tableReg.rows[tableReg.rows.length-1];
	const td=lastTR.querySelector("td");
	lastTR.classList.remove("hide", "red");
	if (searchText == "") {
		lastTR.classList.add("hide");
	} else if (total) {
		//td.innerHTML="Se ha encontrado "+total+" coincidencia"+((total>1)?"s":"");
	} else {
		lastTR.classList.add("red");
		//td.innerHTML="No se han encontrado coincidencias";
	}
}




</script>

