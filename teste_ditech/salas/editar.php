<?php 
  require_once('functions.php'); 
  editar();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Sala</h2>

<form action="editar.php?id=<?php echo $sala['id']; ?>" method="post">
    <hr />
    <div class="row">
        <div class="form-group col-md-7">
            <label for="name">Nome </label>
            <input type="text" class="form-control" name="sala['nome']" value="<?php echo $sala['nome']; ?>">
        </div>

    <div id="actions" class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php" class="btn btn-default">Cancelar</a>
        </div>
    </div>
</form>

<?php include(FOOTER_TEMPLATE);