<?php 

require_once 'conexion.php';

$sentencia = $pdo->prepare("EXEC PL_LISTAR_AÑO_PLANILLA");
$sentencia->execute();
$json = array();
        
while($row = $sentencia->fetch()) {
    $json[] = array(
    	'IdAño' => $row['IdAño'],
        'Año'	=> $row['Año'],
    );
}  

$jsonstring = json_encode($json);
echo $jsonstring;

?>