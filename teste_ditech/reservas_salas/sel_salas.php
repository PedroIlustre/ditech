<?php

require_once('../inc/database.php');
require_once("../config.php");
require_once(DBAPI);


$sql = "SELECT rs.*,f.nome as usuario FROM reservas_salas rs
LEFT JOIN salas s ON s.id = rs.id_sala
LEFT JOIN funcionarios f ON f.id = id_funcionario
WHERE rs.concluido = 0
AND s.id = ".$_POST['reservas_salas']['id_sala']."
AND ADDTIME(rs.hora, \"01:00:00\") > '".$_POST['reservas_salas']['hora']."'";

$salas = open_procedure($sql);

# Encontrou Registros
if ($salas->num_rows > 0) {
    $sal = $salas->fetch_all(MYSQLI_ASSOC);
    echo json_encode(array('info'=>0,'usuario'=>$sal[0]['usuario'],'hora'=> date('H:i', strtotime('+60 minute', strtotime($sal[0]['hora'])))));
    exit;
}
echo json_encode(array('info'=>1));

