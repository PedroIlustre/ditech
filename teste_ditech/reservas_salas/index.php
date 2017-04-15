<?php
require_once('functions.php');
index();

include(HEADER_TEMPLATE);

?>

    <header>
        <div class="row">
            <div class="col-sm-6">
                <h2>Reservas</h2>
            </div>
            <div class="col-sm-6 text-right h2">
                <a class="btn btn-primary"  href="novo.php"><i class="fa fa-plus"></i> Nova Reserva</a>
                <a class="btn btn-default" href="../logado.php"><i class="fa fa-reply"></i> Voltar</a>
            </div>
        </div>
    </header>

<?php if (!empty($_SESSION['message'])){ ?>
    <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo $_SESSION['message']; ?>
    </div>
    <?php clear_messages(); ?>
<?php } ?>

    <hr>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th width="30%">Sala</th>
            <th width="30%">Reservada pelo Usuário </th>
            <th width="10%">Horário </th>
        </tr>
        </thead>
        <tbody>
        <?php if ($reservas_salas) {

            foreach ($reservas_salas as $reserva) {

                ?>
                <tr>
                    <td><?php echo $reserva['id']; ?></td>
                    <td><?php echo $reserva['sala']; ?></td>
                    <td><?php echo $reserva['funcionario']; ?></td>
                    <td><?php echo $reserva['hora']; ?></td>
                    </td>
                </tr>
            <?php   }
        }else{?>
            <tr>
                <td colspan="6">Nenhum registro encontrado.</td>
            </tr>
        <?php   } ?>
        </tbody>
    </table>
<?php

include('modal.php');
include(FOOTER_TEMPLATE);