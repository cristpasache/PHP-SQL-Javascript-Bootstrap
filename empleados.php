<?php 

require_once 'conexion.php';

$IDPERIODO = htmlspecialchars($_POST['idperiodo'], ENT_QUOTES, 'UTF-8');
$TIPOTRAB 	 = 'empleados';
$IDESTADOS = htmlspecialchars($_POST['idestados'], ENT_QUOTES, 'UTF-8');

$sentencia = $pdo->prepare("EXEC PL_LISTAR_ASISTENCIA_EMPLEADO ?, ?, ?");
$sentencia->bindParam(1, $IDPERIODO);
$sentencia->bindParam(2, $TIPOTRAB);
$sentencia->bindParam(3, $IDESTADOS);

$sentencia->execute();
$json = array();
        
while($row = $sentencia->fetch()) {
    $json[] = array(
        'Codigo' => $row['Codigo'],
        'Nombres' => $row['Nombres'],
    );
}  

$jsonstring = json_encode($json);
echo $jsonstring;

?>