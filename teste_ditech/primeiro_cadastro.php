<?php

  require_once('funcionarios/functions.php');
  novo_out();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Funcionário</h2>

<form action="novo.php" method="post">
  <!-- area de campos do form -->
  <hr />
    <div class="row">
        <div class="form-group col-md-7">
            <label for="name">Nome / Razão Social</label>
            <input type="text" class="form-control" name="funcionario['nome']">
        </div>
        <div class="form-group col-md-2">
            <label for="campo2">Telefone</label>
            <input type="text" class="form-control" name="customer['phone']">
        </div>
        <div class="form-group col-md-7">
            <label for="name">Nome de Acesso</label>
            <input type="text" class="form-control" name="funcionario['nome_usuario']">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2">
            <label for="name">Senha</label>
            <input type="text" class="form-control" name="funcionario['senha']">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2">
            <label for="campo3">Data de Cadastro</label>
            <input type="text" class="form-control" name="funcionario['data_cricao']" value="<?= date('d/m/Y')?>" disabled>
        </div>
    </div>  
    <div id="actions" class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php" class="btn btn-default">Cancelar</a>
        </div>
    </div>
</form>

<?php include(FOOTER_TEMPLATE); 