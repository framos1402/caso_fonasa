<link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

<div class="modal inmodal" id="form_adduser" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content animated bounceInRight">
			<div class="modal-header">
                <i class="fa fa-user modal-icon"></i>
                <h4 class="modal-title">Nuevo Usuario</h4>
			</div>
			<div class="modal-body">
			                <div id="alerta-completar" class="alert" style="display:none;"></div>
				<form method="post" id="frm_usuario" name="frm_usuario" onsubmit="return nuevo_usuario();">
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" id="nombre" name="nombre" placeholder="Nombre" class="form-control" />
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Apellido Paterno</label>
							<input type="text" id="ap_paterno" name="ap_paterno" placeholder="Apellido Paterno" class="form-control" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Apellido Materno</label>
							<input type="text" id="ap_materno" name="ap_materno" placeholder="Apellido Materno" class="form-control" />
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Usuario</label>
							<input type="text" id="usuario" name="usuario" placeholder="Usuario" class="form-control" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Clave</label>
							<input type="password" id="clave" name="clave" placeholder="Clave" class="form-control" />
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Confirmar Clave</label>
							<input type="password" id="reclave" name="reclave" placeholder="Confirmar Clave" class="form-control" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Correo</label>
							<input type="text" id="correo" name="correo" placeholder="Correo" class="form-control" />
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Cargo</label>
							<input type="text" id="cargo" name="cargo" placeholder="Cargo" class="form-control" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Estado</label>
							<select id="estado" name="estado" class="form-control">
								<option value="">Seleccione opción</option>
								<option value="1">Activo</option>
								<option value="2">Inactivo</option>
							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Perfil</label>
							<select id="perfil" name="perfil" class="form-control">
								<option value="">Seleccione opción</option>
								<option value="1">Administrador</option>
								<option value="2">Usuario</option>
							</select>
						</div>
					</div>
				</div>
				<div id="lst_clinicas" class="row" style="display:none;">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Clinica</label>
							<?=$o_filtros->cmb_clinicas("Seleccione opción");?>
						</div>
					</div>
				</div>
			</div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="aceptar">Aceptar</button>
                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
            </div>
			</form>
		</div>
	</div>
</div>

<div class="modal inmodal" id="form_moduser" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
			<?php
			
			?>
	<div class="modal-dialog modal-lg">
		<div class="modal-content animated bounceInRight">
			<div class="modal-header">
                <i class="fa fa-user modal-icon"></i>
                <h4 class="modal-title">Modificar Usuario</h4>
			</div>
			<div class="modal-body">
			                <div id="alerta-completar" class="alert" style="display:none;"></div>
				<form method="post" id="frm_mod_usuario" name="frm_mod_usuario" onsubmit="return mod_usuario();">
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" id="mnombre" name="nombre" placeholder="Nombre" class="form-control" />
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Apellido Paterno</label>
							<input type="text" id="map_paterno" name="ap_paterno" placeholder="Apellido Paterno" class="form-control" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Apellido Materno</label>
							<input type="text" id="map_materno" name="ap_materno" placeholder="Apellido Materno" class="form-control" />
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Usuario</label>
							<input readonly="readonly" type="text" id="musuario" name="usuario" placeholder="Usuario" class="form-control" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Clave</label>
							<input type="password" id="mclave" name="mclave" placeholder="Clave" class="form-control" />
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Confirmar Clave</label>
							<input type="password" id="mreclave" name="mreclave" placeholder="Confirmar Clave" class="form-control" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Correo</label>
							<input type="text" id="mcorreo" name="correo" placeholder="Correo" class="form-control" />
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Cargo</label>
							<input type="text" id="mcargo" name="cargo" placeholder="Cargo" class="form-control" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Estado</label>
							<select id="mestado" name="estado" class="form-control">
								<option value="">Seleccione opción</option>
								<option value="1">Activo</option>
								<option value="2">Inactivo</option>
							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Perfil</label>
							<select id="mperfil" name="perfil" class="form-control">
								<option value="">Seleccione opción</option>
								<option value="1">Administrador</option>
								<option value="2">Usuario</option>
							</select>
						</div>
					</div>
				</div>
				<div id="mlst_clinicas" class="row" style="display:none;">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Clinica</label>
							<?=$o_filtros->cmb_clinicas("Seleccione opción","modificar");?>
						</div>
					</div>
				</div>
			</div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" onClick="comprobarForm()" id="maceptar">Aceptar</button>
                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
            </div>
			</form>
		</div>
	</div>
</div>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><i class="fa fa-users"></i> Usuarios</h2>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
	<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Listado de Usuarios </h5>
					<div class="ibox-tools">
						<button type="button" data-toggle="modal" data-target="#form_adduser" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Agregar Usuario</button>
					</div>
				</div>
				<div class="ibox-content">

					<table class="table table-bordered">
						<thead>
						<tr>
							<th>Usuario</th>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Perfil</th>
							<th>Clinica</th>
							<th width="90">Acciones</th>
						</tr>
						</thead>
						<tbody>
						<?=$lst_tbl?>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>

<script src="js/plugins/sweetalert/sweetalert.min.js"></script>
<script>
function comprobarForm(){ 
   	clave1 = document.frm_mod_usuario.mclave.value
   	clave2 = document.frm_mod_usuario.mreclave.value
	
   	if (clave1 != clave2){
      	//alert("Las dos claves son distintas...\n Ingresé y Confirme la Clave nuevamente") 
		swal({
			
			title: "Las Claves No Coinciden",
			text:"Favor Ingréselas Nuevamente",
			type: "warning",
			
		})//("Las Claves No Coinciden, Favor Ingréselas Nuevamente");
	}else if($("#mperfil").val() == 2){
		
			if($("#mid_clinica").val() == 0){
				
				swal({
				
				title: "No se ha seleccionado Clínica",
				text:"Debe seleccionar alguna",
				type: "warning",
				
				})}
		
	}
      	
} 
$("#perfil").on("change", function() {
	if ($(this).val() == 2)
	{
		$("#lst_clinicas").show();
	}
	else
	{
		$('#id_clinica')[0].selectedIndex = 0;
		$("#lst_clinicas").hide();
	}
});

$("#mperfil").on("change", function() {
	if ($(this).val() == 2)
	{
		$("#mlst_clinicas").show();
	}
	else
	{
		$('#id_clinica')[0].selectedIndex = 0;
		$("#mlst_clinicas").hide();
	}
});

function cargar_usuario(id_usuario)
{
	$.ajax({
		type: "GET",
		url: "pages/usuarios1.php?usuario=" + id_usuario,
		complete: function(obj, rst)
		{
			//alert(obj.responseText);
			var result = $.parseJSON(obj.responseText);
			$("#mnombre").val(result['nombre']);
			$("#map_paterno").val(result['ap_paterno']);
			$("#map_materno").val(result['ap_materno']);
			$("#musuario").val(result['usuario']);
			$("#mclave").val(result['clave']);
			$("#mreclave").val(result['clave']);
			$("#mcorreo").val(result['correo']);
			$("#mcargo").val(result['cargo']);
			$("#mestado").val(result['activo']);
			$("#mperfil").val(result['perfil']);
			if ($("#mperfil").val() == 2)
			{
				$('#mid_clinica')[0].selectedIndex = result['id_clinica'];
				$("#mlst_clinicas").show();
				
			}else{
				$("#mlst_clinicas").hide();
			}
			
			/*
			var result = $.parseJSON(obj.responseText);
			$("#alerta-completar").html(result['status'] + ": " + result['msg']);
			if (result['status'] == "Error")  
			{
				$("#alerta-completar").addClass("alert-danger");
				$("#alerta-completar").fadeIn();
				setTimeout(function(){ $("#alerta-completar").fadeOut(); }, 3000);
			}
			else
			{
				$("#alerta-completar").removeClass("alert-danger");
				$("#alerta-completar").addClass("alert-success");
				$("#alerta-completar").fadeIn();
				setTimeout(function(){ location.reload(true); }, 3000);
			}
			*/
		}
	});
}

function nuevo_usuario()
{
	$.ajax({
		type: "POST",
		url: "pages/agregarPaciente.php",
		data: $("#frm_usuario").serialize(),
		complete: function(obj, rst)
		{
			var result = $.parseJSON(obj.responseText);
			$("#alerta-completar").html(result['status'] + ": " + result['msg']);
			if (result['status'] == "Error")  
			{
				$("#alerta-completar").addClass("alert-danger");
				$("#alerta-completar").fadeIn();
				setTimeout(function(){ $("#alerta-completar").fadeOut(); }, 3000);
			}
			else
			{
				$("#alerta-completar").removeClass("alert-danger");
				$("#alerta-completar").addClass("alert-success");
				$("#alerta-completar").fadeIn();
				setTimeout(function(){ location.reload(true); }, 3000);
			}
		}
	});
	return false;
}

function mod_usuario()
{
	//$("#maceptar").prop("disabled", "disabled");
	$.ajax({
		type: "POST",
		url: "pages/usuarios.modificar.php",
		data: $("#frm_mod_usuario").serialize(),
		complete: function(obj, rst)
		{
			var result = $.parseJSON(obj.responseText);
			$("#alerta-completar").html(result['status'] + ": " + result['msg']);
			if (result['status'] == "Error")  
			{
				$("#alerta-completar").addClass("alert-danger");
				$("#alerta-completar").fadeIn();
				setTimeout(function(){ $("#alerta-completar").fadeOut(); }, 1000);
			}
			else
			{
				$("#alerta-completar").removeClass("alert-danger");
				$("#alerta-completar").addClass("alert-success");
				$("#alerta-completar").fadeIn();
				setTimeout(function(){ location.reload(true); }, 1000);
			}
		}
	});
	return false;
}

$('.btnEliminar').click(function () {
	var usuario_eliminar = $(this).attr('attr-user');
	swal(
		{
			title: "Estás seguro?",
			text: "Realmente quieres eliminar este usuario?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Sí, estoy seguro!",
			cancelButtonText: "Cancelar",
			closeOnConfirm: false,
			closeOnCancel: false 
		},
		function (isConfirm) 
		{
			if (isConfirm) {
				$.ajax({
					type: "POST",
					url: "pages/usuarios.eliminar.php",
					data: { usuario: usuario_eliminar },
					complete: function(obj, rst)
					{
						var result = $.parseJSON(obj.responseText);
						if (result['status'] == "Error")
							swal("Error!", result['msg'], "error");
						else
							swal({ title : "Eliminado!", text: "El usuario ha sido eliminado", type: "success" }, function (isConfirm) { location.reload(true); });
					}
				});
			} else {
				swal("Cancelado", "El usuario no se ha eliminado.", "error");
			}
		}
	);
});
</script>