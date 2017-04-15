<?php 
  require_once('functions.php'); 
  novo();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Funcionário</h2>
<script>
    $(document).ready(function(){
        $('.phone').mask('0000-0000');
    });
    </script>
<form id="adiciona_funcionario" action="novo.php" method="post" data-toggle="validator">
  <!-- area de campos do form -->
  <hr />
    <div class="row">

        <div class="form-group col-md-7">
            <label for="name">Nome / Razão Social</label>
            <input type="text" class="form-control" maxlength="100" name="funcionario['nome']" required>
        </div>
        <div class="form-group col-md-2">
            <label for="campo2">Telefone</label>
            <input type="text" class="phone" name="customer['phone']">
        </div>
        <div class="form-group col-md-7">
            <label for="name">Nome de Acesso</label>
            <input type="text" class="form-control" size='10' name="funcionario['nome_usuario']" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2">
            <label for="name">Senha</label>
            <input type="password" class="form-control" name="funcionario['senha']" required>
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