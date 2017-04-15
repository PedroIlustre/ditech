<?php 
require_once 'config.php'; 
require_once DBAPI;

include(HEADER_TEMPLATE); 
$db = open_database(); ?>

<h2>Bem vindo <?=$_SESSION['nome']?></h2>
<hr />

<?php if ($db) { ?>

<div class="row">

    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="funcionarios" class="btn btn-default">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-users fa-5x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Funcionários</p>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="salas" class="btn btn-default">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-legal fa-5x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Salas</p>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="reservas_salas" class="btn btn-default">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-calendar fa-5x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Reservar Sala</p>
                </div>
            </div>
        </a>
    </div>
</div>

<?php }else { ?>
    <div class="alert alert-danger" role="alert">
        <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
    </div>

<?php } ?>

<?php include(FOOTER_TEMPLATE);