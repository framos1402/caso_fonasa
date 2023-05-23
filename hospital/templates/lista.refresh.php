
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
                    <a data-toggle="modal" class="btn btn-primary" href="javascript:registrarPaciente(&quot;Ingresar&quot;);">Registrar paciente</a>

                    </div>
                    <div class="col-sm-6">
                        
                <div id="editable_filter" class="dataTables_filter"><label>Busqueda:<input type="search" id="searchTerm" class="form-control input-sm" placeholder="" onkeyup="doSearch()" aria-controls="editable"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped table-bordered table-hover  dataTable" id="datos" role="grid" aria-describedby="editable_info">
            <thead>
            <tr role="row">		
				<th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" style="width: 387.75px;">Nombre</th>
				
				<th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" style="width: 428.75px;">Edad</th>
				<th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" style="width: 334.75px;">hospital</th>
				<th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" style="width: 244px;">Tipo Consulta</th>
				<th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" style="width: 244px;">Prioridad</th>
                <th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" style="width: 244px;">Estado</th>
				<th class="sorting_asc" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="" style="width: 244px;">Orden Llegada</th>
					
			</tr>
            </thead>
            <tbody>
			<?foreach ($paciente as $key => $value) {?>
				<tr class="gradeA odd" role="row">
                <td class="sorting_1"><?=$value['nombre']?></td>

                <td><?=$value['edad']?></td>
                <td class="center"><?=$value['hospital']?></td>
                <td class="center"><?=$value['tipoConsulta']?></td>
				<td class="center"><b><?=$value['prioridad']?></b></td>
                <td class="center"><b><?=$value['estado']?></b></td>
				<td class="center"><?=$value['ordenLlegada']?></td>
				
            </tr></tbody>
			<?}?>	
            
  
            </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="editable_info" role="status" aria-live="polite"></div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="editable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="editable_previous"><a href="#" aria-controls="editable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="editable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="editable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="editable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="editable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="editable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="editable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="editable_next"><a href="#" aria-controls="editable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>

            </div>
            </div>
            </div>
            </div>
</div>





