<?php 
  require_once('functions.php'); 
  novo();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Nova Sala</h2>

<form action="novo.php" method="post">
  <!-- area de campos do form -->
  <hr />
    <div class="row">
        <div class="form-group col-md-7">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="sala['nome']">
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