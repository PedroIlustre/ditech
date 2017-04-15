<?php 
  require_once('functions.php'); 
  editar();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Funcionário</h2>

<form action="editar.php?id=<?php echo $funcionario['id']; ?>" method="post">
    <hr />
    <div class="row">
        <div class="form-group col-md-7">
            <label for="name">Nome / Razão Social</label>
            <input type="text" class="form-control" name="funcionario['nome']" value="<?php echo $funcionario['nome']; ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="campo2">Telefone</label>
            <input type="text" class="form-control" name="funcionario['fone']" value="<?php echo $funcionario['fone']; ?>">
        </div>
        <div class="form-group col-md-7">
            <label for="name">Nome de Acesso</label>
            <input type="text" class="form-control" name="funcionario['nome_usuario']" value="<?php echo $funcionario['nome_usuario']; ?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2">
            <label for="name">Senha</label>
            <input type="text" class="form-control" name="funcionario['senha']" value="<?php echo base64_decode($funcionario['senha']); ?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2">
            <label for="campo3">Data de Cadastro</label>
            <input type="text" class="form-control" name="funcionario['data_criacao']" disabled value="<?php echo $funcionario['data_criacao']; ?>">
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