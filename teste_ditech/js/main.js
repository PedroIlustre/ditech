$(document).ready(function(){
    $('#delete-modal').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget);
      var id = button.data('funcionario');

      var modal = $(this);
      modal.find('.modal-title').text('Excluir Funcionário #' + id);
      modal.find('#confirm').attr('href', 'delete.php?id=' + id);
    });

    $("#sel_sala").on('change',function(e){

    });

    $("#salvar_salas").on('click',function(e){

        if($("#sel_sala option:selected").val() == ''){
            alert('Selecione uma sala');
            return false;
        }

        $.ajax({
            type: "POST",
            url: '../reservas_salas/sel_salas.php',
            data: $("#adiciona_reserva").serialize(),
            dataType: 'json',
            success: function(r){
                if(r.info == 0){
                    alert("Sala reservada por " + r.usuario + " até às " + r.hora);
                    $("#sel_sala").val('');
                    return false
                }
                if(r.info == 1){
                    $.ajax({
                        type: "POST",
                        url: '../reservas_salas/novo.php',
                        data: $("#adiciona_reserva").serialize(),
                        success:function(r){
                        }
                    })
                }
            }
        });
    });

});
