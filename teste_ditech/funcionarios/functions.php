<?php


require_once("../config.php");
require_once(DBAPI);

$funcionarios = null;

# O funcionário a ser editado
$funcionario = null;

# Listagem de Funcionários
function index() {
	global $funcionarios;
        
        # Grupo de funcionários para listagem
	$funcionarios = find_all('funcionarios');
}

# Cria funcionários
function novo() {
  if (!empty($_POST['funcionario'])) {
    
    $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
    $funcionario = $_POST['funcionario'];
    $funcionario['data_edicao'] = $funcionario['data_criacao'] = $today->format("Y-m-d H:i:s");
    
    save_new('funcionarios', $funcionario);
    header('location: index.php');
  }
}

# Busca dados para edição
function editar() {
    $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_POST['funcionario'])) {
            $funcionario = $_POST['funcionario'];
            $funcionario['data_edicao'] = $now->format("Y-m-d H:i:s");
            save_edit('funcionarios', $id, $funcionario);
            header('location: index.php');
        } else {
            global $funcionario;
            $funcionario = find('funcionarios', $id);
        } 
    } else {
        header('location: index.php');
    }
}

function delete($id = null) {
    global $funcionario;
    $funcionario = remove('funcionarios', $id);
    header('location: index.php');
}
