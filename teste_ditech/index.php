<?php

require_once 'config.php'; 
require_once DBAPI;
include(HEADER_TEMPLATE_INDEX);  

if(isset($_GET['msg']) && $_GET['msg'] == 0){
    echo 'Usuário Invalido';
}
?>

<br> <br>
<form method="post" action="valida.php">
    <div class="row">
        <div class="form-group col-md-2">
            <label for="campo2">Usuário</label>
            <input type="text" name="usuario" maxlength="50" />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2">
            <label for="name">Senha</label>
            <input type="password" name="senha" maxlength="50" />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2">
            <input type="submit" value="Entrar" />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2">
            <a href="primeiro_cadastro.php">Cadastre-se</a>
        </div>
    </div>
</form>