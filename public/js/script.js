let $año = document.getElementById('CBX_Año');
let $mes = document.getElementById('CBX_Mes');
let $estado = document.getElementById('CBX_Estados');
let $empleado = document.getElementById('CBX_Empleado');

function listar_anio() {
    $.ajax({
        url: 'anio.php',
        type: 'GET',
        success: function(response) {
            const años = JSON.parse(response);
            let template = ''
            
            años.forEach(año => {
                template += `<option class="form-control" selected value="${año.IdAño}">${año.Año}</option>`;
            })
            $año.innerHTML = template;
            var idanio = $("#CBX_Año").val();
            listar_mes(idanio);
        }
    })
}

function listar_mes(idanio) {
    $.ajax({
        url: 'mes.php',
        type: 'POST',
        data: { idanio:idanio},
        success: function(response) {
            const respuestas = JSON.parse(response);
            let template = ''
           
            respuestas.forEach(respuesta => {
                template += `<option class="form-control" selected value="${respuesta.IdPeriodo}">${respuesta.Mes}</option>`;
            })
            $mes.innerHTML = template;
            var idperiodo = $("#CBX_Mes").val();
            listar_estados(idperiodo);
        }
    })
}

function listar_estados(idperiodo) {
    $.ajax({
        url: 'estados.php',
        type: 'POST',
        data: { idperiodo:idperiodo},
        success: function(response) {
            const estados = JSON.parse(response);
            let template = ''
            
            estados.forEach(estado => {
                template += `<option class="form-control" selected value="${estado.IdEstados}">${estado.Descripcion}</option>`;
            })
            $estado.innerHTML = template;
            var idperiodo = $("#CBX_Mes").val();
            var idestados = $("#CBX_Estados").val();
            listar_empleados(idperiodo, idestados);
        }
    })
}

function listar_empleados(idperiodo, idestados) {
    $.ajax({
        url: 'empleados.php',
        type: 'POST',
        data: { idperiodo:idperiodo, idestados:idestados },
        success: function(response) {
            const empleados = JSON.parse(response);
            let template = ''
            
            empleados.forEach(empleado => {
                template += `<option class="form-control" selected value="${empleado.Codigo}">${empleado.Nombres}</option>`;
            })
            $empleado.innerHTML = template;
            listar();
        }
    })
}

var table;
function listar() {
    var idperiodo = $("#CBX_Mes").val();
    var idtrabajador = $("#CBX_Empleado").val();
    var idestados = $("#CBX_Estados").val();
    table = $('#listTable').DataTable({
        "ordering": false,
        "searching": { "regex": true },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "serverSide": true,
        "serverMethod": 'post',
        "ajax": 
        { 
            'url':'listar.php',
            type: 'POST',
            data: { idperiodo:idperiodo, idtrabajador:idtrabajador, idestados:idestados },
        },
        'columns': [
            { data: 'Codigo' },
            { data: 'DNI' },
            { data: 'Apellidos' },
            { data: 'Nombres' },
            { data: 'FechaIngreso' },
            { data: 'TotalBruto' },
            { data: 'TotalDescuento' },
            { data: 'TotalNeto' },
            { data: 'Estado' },
        ],
        "language": idioma_español,
    });
    document.getElementById("listTable_filter").style.display="none";
}