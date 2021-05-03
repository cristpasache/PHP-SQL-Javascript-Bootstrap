<?php 

require_once 'conexion.php';

$idperiodo = htmlspecialchars($_POST['idperiodo'], ENT_QUOTES, 'UTF-8');

$sentencia = $pdo->prepare("EXEC PL_LISTAR_ESTADOS_PLANILLA ?");
$sentencia->bindParam(1, $idperiodo);

$sentencia->execute();
$json = array();
        
while($row = $sentencia->fetch()) {
    $json[] = array(
        'IdEstados' 	=> $row['IdEstados'],
        'Descripcion' 	=> $row['Descripcion'],
    );
}  

$jsonstring = json_encode($json);
echo $jsonstring;

?>