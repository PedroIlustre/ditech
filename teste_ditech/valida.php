<?php

// Inclui o arquivo com o sistema de segurança
require_once("seguranca.php");
// Verifica se um formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    // Salva duas variáveis com o que foi digitado no formulário
    // Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
    $senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
    // Utiliza uma função criada no seguranca.php pra validar os dados digitados

    if (validaUsuario($usuario, $senha) == true) {
        session_destroy();
        session_start();

        $login = $_POST['usuario'];
        $senha = $_POST['senha'];

        $mysqli = new mysqli('localhost', '', '', 'test');
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        } else {
            $sql = ("SELECT * FROM funcionarios  WHERE nome_usuario = '$login' AND senha = '".base64_encode($senha)."'");
            $result = $mysqli->query($sql);
            $dados = $result->fetch_array();
        }
        if($result->num_rows > 0 ) {
            $_SESSION['usuario'] = $login;
            $_SESSION['senha'] = $senha;
            $_SESSION['nome'] = $dados['nome'];
            $_SESSION['id_usuario'] = $dados['id'];
            header('location:logado.php');
        } else {
            unset ($_SESSION['usuario']);
            unset ($_SESSION['senha']);
            expulsaVisitante();
            
        }
    } else {
        // O usuário e/ou a senha são inválidos, manda de volta pro form de login
        // Para alterar o endereço da página de login, verifique o arquivo seguranca.php
        expulsaVisitante();
    }
}
