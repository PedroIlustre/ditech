<?php

require_once('../config.php');
require_once(DBAPI);

$salas = null;

# Sala a ser editado
$sala = null;

# Listagem de Salas
function index() {
	global $salas;
        
        # Grupo de Salas para listagem
	$salas = find_all('salas');
}

# Cria funcionários
function novo() {
  if (!empty($_POST['sala'])) {
    $sala = $_POST['sala'];
    
    save_new('salas', $sala);
    header('location: index.php');
  }
}

# Busca dados para edição
function editar() {
    $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_POST['sala'])) {
            $sala = $_POST['sala'];
            save_edit('salas', $id, $sala);
            header('location: index.php');
        } else {
            global $sala;
            $sala = find('salas', $id);
        } 
    } else {
        header('location: index.php');
    }
}

function delete($id = null) {
    global $sala;
    $sala = remove('salas', $id);
    header('location: index.php');
}
