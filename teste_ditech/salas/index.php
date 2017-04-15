<?php
    require_once('functions.php');
    index();

include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
            <div class="col-sm-6">
                <h2>Salas</h2>
            </div>
            <div class="col-sm-6 text-right h2">
                <a class="btn btn-primary" href="novo.php"><i class="fa fa-plus"></i> Nova Sala</a>
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
            <th width="30%">Nome</th>
            <th width="30%">Opções</th>
	</tr>
</thead>
<tbody>
<?php if ($salas) { 
        foreach ($salas as $sala) { ?>
	<tr>
                    <td><?php echo $sala['id']; ?></td>
                    <td><?php echo $sala['nome']; ?></td>
                    <td class="actions text-left">
                            <a href="editar.php?id=<?php echo $sala['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-funcionario="<?php echo $sala['id']; ?>">
                                    <i class="fa fa-trash"></i> Excluir
                            </a>
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