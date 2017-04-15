<?php
require_once('functions.php');
novo();
include(HEADER_TEMPLATE);

$database = open_database();
$sql = "SELECT * FROM salas";
$result = $database->query($sql);
$salas = $result->fetch_all(MYSQLI_ASSOC);
$today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
?>
    <h2>Nova Reserva</h2>
    <form id="adiciona_reserva" action="novo.php" method="post" data-toggle="validator">
        <input type="hidden" name="reservas_salas[id_funcionario]" value="<?=$_SESSION['id_usuario']?>">
        <!-- area de campos do form -->
        <hr />
        <div class="row">
            <div class="form-group col-md-7">
                <label for="name">Selecione a Sala</label>
                <select id="sel_sala" name="reservas_salas[id_sala]">
                    <option value=""> ..: SELECIONE :..</option>
                    <?php
                    foreach($salas as $sala){ ?>
                        <option value="<?=$sala['id']?>"><?=$sala['nome']?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
                <label for="campo3">Horário Reserva</label>
                <input type="text" class="form-control"  name='reservas_salas[hora]' value="<?= $today->format('H:i')?>">
            </div>
        </div>
        <div id="actions" class="row">
            <div class="col-md-12">
                <input type="button" id="salvar_salas" value="Salvar" class="btn btn-primary">
                <a href="index.php" class="btn btn-default">Cancelar</a>
            </div>
        </div>
    </form>

<?php include(FOOTER_TEMPLATE);