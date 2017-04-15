<?php


require_once("../config.php");
require_once(DBAPI);

$reservas_salas = null;

# O Reservas a serem editadas
$reservas_salas = null;

# Listagem de Reservas
function index() {
    global $reservas_salas;

    # Grupo de reservas para listagem
    $reservas_salas = find('reservas_salas',null,1);
    $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
    $hora = $today->format("H:i");

    # Concluí reservas que passaram do prazo
    if(is_array($reservas_salas)){
        foreach($reservas_salas as $sal){
            if(date('H:i', strtotime('+60 minute', strtotime($sal['hora']))) < $hora){
                $database = open_database();
                $database->query("UPDATE reservas_salas SET concluido = 1 WHERE id = ".$sal['id']);
            }
        }
    }
}

# Cria Reservas
function novo() {
    if (!empty($_POST['reservas_salas'])) {

        $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
        $_POST['reservas_salas']['concluido'] = 0;
        $reservas_salas = $_POST['reservas_salas'];
        save_new('reservas_salas', $reservas_salas);
        header('location: index.php');
    }
}

# Busca dados para edição
function editar() {
    $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_POST['reservas_salas'])) {
            $reservas_salas = $_POST['reservas_salas'];
            $reservas_salas['data_edicao'] = $now->format("Y-m-d H:i:s");
            save_edit('reservas_salas', $id, $reservas_salas);
            header('location: index.php');
        } else {
            global $reservas_salas;
            $reservas_salas = find('reservas_salas', $id);
        }
    } else {
        header('location: index.php');
    }
}

function delete($id = null) {
    global $reservas_salas;
    $reservas_salas = remove('reservas_salas', $id);
    header('location: index.php');
}
