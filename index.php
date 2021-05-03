<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Consulta</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<link rel="stylesheet" href="./public/css/bootstrap.min.css">
  	<link rel="stylesheet" href="./public/css/AdminLTE.min.css">
  	<link rel="stylesheet" href="./public/css/skin-blue.min.css">
  	<link rel="stylesheet" href="./public/css/datatables.min.css">
	<link rel="stylesheet" href="./public/css/select2.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Bitter:wght@400;700&display=swap" rel="stylesheet">
	<style>
		.hidden {
			display: none;
		}
		.head {
			background-color: #6610f2!important;
		}
	</style>
</head>
<body>
	<header>
		<nav class="navbar navbar-static-top bg-primary head" role="navigation">
	        <div class="container">            
	            <div class="navbar-header">
			        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
	                  	<span class="sr-only">Desplegar / Ocultar Menu</span>
	                   	<span class="icon-bar"></span>
	                   	<span class="icon-bar"></span>
	                   	<span class="icon-bar"></span>
	                </button>
	                <a href="" class="navbar-brand" style="margin-bottom: 5px">
	                  	<img src="./public/img/boostrap.png" alt="" width="32">
	                </a>
	            </div>
	        </div>
	    </nav>
	</header>
	<div class="container">
		<div class="row">
		    <div class="form-group">
				<div class="col-md-1" style="margin-top: 10px">
				   	<label for="año">Año:</label>
				</div>
				<div class="col-xs-2" style="margin-top: 5px">
					<select class="js-Combo form-control" name="state" id="CBX_Año" style="width: 100%"></select>
		        </div>
		        <div class="col-xs-1" style="margin-top: 10px">
				   	<label for="mail">Mes:</label>
				</div>
				<div class="col-xs-3" style="margin-top: 5px">
					<select class="js-Combo form-control" name="state" id="CBX_Mes" style="width: 100%"></select>
		        </div>
		        <div class="col-xs-2" style="margin-top: 5px">
					<select class="js-Combo form-control" name="state" id="CBX_Estados" style="width: 100%"></select>
		        </div>
		    </div>
		</div>
		<div class="row">
			<div class="form-group">
				<div class="col-xs-1" style="margin-top: 8px">
				   	<label for="mail">Empleado:</label>
				</div>
				<div class="col-xs-6" style="margin-top: 5px">
					<select class="js-Combo form-control" name="state" id="CBX_Empleado" style="width: 100%"></select>
		        </div>
		        <div class="col-xs-4">
		            <button type="submit" class="btn btn-primary" id="buscar" onclick="listar()"><b> Buscar</b></button>
				</div>
		    </div><br>
			<section class="content-header">
				<table id='listTable' class="table table-bordered table-striped dt-responsive" width="100%">
				    <thead>
				    	<tr>
					      	<th>Codigo</th>
					      	<th>DNI</th>
					      	<th>Apellidos</th>
					      	<th>Nombres</th>
					      	<th>Fecha Ingreso</th>
					      	<th>Total Bruto</th>
					      	<th>Total Descuento</th>
					      	<th>Total Neto</th>
					      	<th>Estado</th>
					    </tr>
					</thead>
				</table>
			</section>
		</div>
	</div>
	<script src="./public/js/jquery.min.js"></script>
  	<script src="./public/js/bootstrap.min.js"></script>
	<script src="./public/js/select2.min.js"></script>
	<script src="./public/js/adminlte.min.js"></script>
  	<script src="./public/js/datatables.min.js"></script>
  	<script src="./public/js/select2.min.js"></script>
  	<script src="./public/js/script.js"></script>
	<script>
		var idioma_español = {
		   	select: { rows: "%d fila seleccionada" },
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla =(",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": { "sFirst":    "Primero", "sLast":     "Último", "sNext":     "Siguiente", "sPrevious": "Anterior" },
		    "oAria": {
		    	"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		    	"sSortDescending": ": Activar para ordenar la columna de manera descendente" 
		    },
		    "buttons": { "copy": "Copiar", "colvis": "Visibilidad" }
		}
		$(document).ready(function() {
            $('.js-Combo').select2();
            listar_anio();
        });
        $("#CBX_Año").change(function(){
            var idanio = $("#CBX_Año").val();
            listar_mes(idanio);
        });
        $("#CBX_Mes").change(function(){
        	var idmes = $("#CBX_Mes").val();
        	listar_estados(idmes);
        });
        $("#CBX_Estados").change(function(){
        	var idmes = $("#CBX_Mes").val();
        	var idestados = $("#CBX_Estados").val();
            listar_empleados(idmes, idestados);
        });
        $("#buscar").click(function(){
        	listar();
        });
	</script>
</body>
</html>