<?
    	include "../class/o_registro.php";
        include "../common.php";

        $o_registro = new o_registro();



?>

<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Registrar Paciente</h4>
			</div>
			<div class="modal-body">
			<form role="form" method="POST" id="frm_agregar" name="frm_agregar" onsubmit="return validacion()">
			<!-- <div class="row"> <h1>Activa User: <b><?//=$activauser?></b></h1></div> -->
				<div class="row ">
						<div class="col-lg-2"><label>Hospital</label></div>
						<div class="col-lg-10"><select id="hospital" name="hospital" class="form-control m-b">
											<option value="">Seleccione Hospital</option>
											<option value="1">San jose del maipo</option>
											<option value="2">San juan de dios</option>
											<option value="3">San juan del norte</option>
										</select>
						</div>				
				</div>
				<div class="hr-line-dashed"></div>
				<div class="row">
					<div class="col-lg-2 control-label"><label>Rut</label></div>
					<div class="col-lg-10"><input onkeypress="return justNumbers(event);" maxlength="9" type="text" id="rut" name="rut" placeholder="Rut: sin puntos ni guiones, K reemplácela por un 0" class="form-control" value=""></div>
				</div>
                <div class="hr-line-dashed"></div>
				<div class="row">
					<div class="col-lg-2 control-label"><label>Edad</label></div>
					<div class="col-lg-10"><input onkeypress="return justNumbers(event);" type="text" id="edad" name="edad" pattern="" placeholder="Edad" class="form-control" value=""></div>
				</div>
				<div class="hr-line-dashed"></div>
				<div class="row">
					<div class="col-lg-2 control-label"><label>Nombre</label></div>
					<div class="col-lg-10"><input type="text" id="nombres" name="nombre" placeholder="Nombre" class="form-control" value=""></div>
				</div>
				<div class="hr-line-dashed"></div>
				<div id="peso" class="row">
					<div class="col-lg-2 control-label"><label>Peso</label></div>
					<div class="col-lg-10"><input type="text" id="peso" name="peso" pattern="" placeholder="Peso" class="form-control" value=""></div>
				</div>
				<div id="" class="hr-line-dashed"></div>
				<div id="estatura" class="row">
					<div class="col-lg-2 control-label"><label>Estatura</label></div>
					<div class="col-lg-10"><input type="text" id="estatura" name="estatura" pattern="" placeholder="Estatura en CM" class="form-control" value=""></div>
				</div>
				<div id="" class="hr-line-dashed"></div>
				<div id="fumador" class="row">
					<div class="col-lg-1 control-label"><label >Fumador</label></div>
					<div class="col-lg-5"><select id="fumador" name="fumador" class="form-control m-b">
										<option value="">Seleccione</option>
                                        <option value="0">Si</option>
                                        <option value="1">No</option>
                                    </select></div>
					<div class="col-lg-1 control-label"><label>Años Fumando</label></div>
					<div class="col-lg-5"><input type="text" id="anosFumando" name="anosFumando" pattern="" placeholder="Ingresar años fumando" class="form-control" value=""></div>
				</div>
				<div id="" class="hr-line-dashed"></div>
				<div id="dieta" class="row">
					<div class="col-lg-2 control-label"><label>Tiene dieta</label></div>
					<div class="col-lg-10"><select id="dieta" name="dieta" class="form-control m-b">
										<option value="">Seleccione</option>
                                        <option value="0">Si</option>
                                        <option value="1">No</option>
                                    </select></div>
				</div>
				
			</div>
			
			<div class="modal-footer">
				<div id="alertMsg" class="alert alert-dismissable" style="display:none;">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
					<div id="resul"></div>
				</div>
				<button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
				<button type="submit" id="btnSubmit" onclick="usuario_result();" class="btn btn-primary">Guardar</button>
			</div>
			</form>


<script>
$(document).ready(function(){
	$('#fumador').hide();
	$('#peso').hide();
	$('#estatura').hide();
	$('#dieta').hide()	
	$("#edad").change(function(){
			//alert($('#edad').val());
			if( $("#edad").val() >= 16 && $("#edad").val() <= 40 ){

				$('#fumador').show()
				let opcion = $("#fumador option: selected")
				console.log(opcion)
				if($('#fumador').val() == '2') $('#anosFumando').hide()
				$('#peso').hide()
				$('#estatura').hide()
				$('#dieta').hide()	
				
			}else if($("#edad").val() > 1 && $("#edad").val() < 16){

				$('#peso').show()
				$('#estatura').show()
				$('#fumador').hide()
				$('#dieta').hide()

			}else{

				$('#dieta').show()
				$('#fumador').hide()
				$('#peso').hide()
				$('#estatura').hide()
			}
			
			
	});

});
function justNumbers(e) {
    var keynum = window.event ? window.event.keyCode : e.which;
    if ( keynum == 8 ) return true;
    return /\d/.test(String.fromCharCode(keynum));
}

function validar()
{
	var campos = ["hospital","edad","rut","nombre" ];
	for (var i=0; i< campos.length; i++)
	{
		//reviso campos vacios
		if ($("#" + campos[i]).val() == "") return "Debe ingresar " + campos[i];
	
		
		
		
	}
	var edad = $("#edad").val();
	if(edad > 100 || edad == 0) return "Debes agregar hasta min 1 y max 100 años";

	return "";
}

function usuario_result()
{
	$("#btnSubmit").prop("disabled", true);
	$(window).scrollTop(0);
	var error = "";
	error = validar();
	
	if (error != "")
	{
		$("#resul").html(error);
		$("#alertMsg").addClass("alert-danger");
		$("#alertMsg").show().delay(5000).slideUp(200, function() { $(this).hide(); });
		$("#btnSubmit").prop("disabled", false);
		return false;
	}

	$.ajax({
		type: "POST",
		url: "pages/agregarPaciente.refresh.php",
		data: $("#frm_agregar").serialize(),
		complete: function(obj, rst)
		{
			
			console.log(obj.responseText)
			
			
			error = obj.responseText;
			if (rst == "success")
			{
				
				$("#resul").html("Usuario Agregado!");
				$("#alertMsg").removeClass("alert-danger");
				$("#alertMsg").addClass("alert-success");
				$("#alertMsg").show().delay(1000).slideUp(200, function() { $(this).hide(); location.reload(); });
				
			}
			else
			{
				$("#resul").html(error);
				$("#alertMsg").addClass("alert-danger");
				$("#alertMsg").show().delay(5000).slideUp(200, function() { $(this).hide(); });
			}
		},
		error: function( jqXHR, textStatus, errorThrown ) {
			alert("error");
			console.log(jqXHR);
			console.log(textStatus);
			console.log(errorThrown);
		}
	});
	$("#btnSubmit").prop("disabled", false);
	return false;	
}
</script>            
