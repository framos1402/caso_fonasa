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
				<th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" style="width: 387.75px;">Idem-consulta</th>
				<th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" style="width: 474.75px;">Pacientes Atendidos</th>
				<th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" style="width: 428.75px;">Nom Especialista</th>
				<th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" style="width: 334.75px;">Tipo Consulta</th>
				<th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" style="width: 244px;">Estado</th>
				<th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" style="width: 244px;">Hospital</th>
				<th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" style="width: 244px;">Paciente</th>	
			</tr>
            </thead>
            <tbody>
			<?foreach ($consulta as $key => $value) {?>
				<tr class="gradeA odd" role="row">
                <td class="sorting_1"><?=$value['id']?></td>
                <td><?=$value['cantPacientes']?></td>
                <td><?=$value['nombreEspecialista']?></td>
                <td class="center"><?=$value['tipoConsulta']?></td>
                <td class="center"><b><?=$value['estado']?></b></td>
				<td class="center"><?=$value['id_hospital']?></td>
				<td class="center"><?=$value['id_paciente']?></td>
				
            </tr></tbody>
			<?}?>	
            
  
            </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="editable_info" role="status" aria-live="polite"></div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="editable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="editable_previous"><a href="#" aria-controls="editable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="editable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="editable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="editable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="editable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="editable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="editable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="editable_next"><a href="#" aria-controls="editable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>

            </div>
            </div>
            </div>
            </div>
</div>






<script type="text/javascript" language="javascript">

function mostrarConsulta(){

}

function llamar(id)
{
    console.log(id)
    $(".modal-content").html("<center><h4 style='padding:20px;'>Cargando...</h4></center>");
        $.ajax({
            type: "GET",
        url: "pages/consultajs.php?id_consulta=" + id,
            complete: function(obj, rst)
            {
            $(".modal-content").html(obj.responseText);
            }
        });
    location.reload();    
    $("#myModal").modal();
}
//busqueda en la tabla	
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

