<?php
    include 'processoModalAdministrador.php';
    include 'processoInativarAdministrador.php';
    include 'conexao.php';
    include_once("../../../configADM.php");
    protegePagina();

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
    
    $pesquisar = @$_POST['txtBuscar'];
    $resulta_select = "SELECT codLogin, nome, login, senha FROM tblogin  WHERE nome LIKE '%$pesquisar%' and inativo=1";
    $resultado_busca = mysqli_query($con, $resulta_select);
   
    while($reg=mysqli_fetch_array($resultado_busca)) {
    
        $codLogin = $reg['codLogin'];
        $nome = $reg['nome'];
        $login = $reg['login'];
        $senha = $reg['senha'];
    
            
     echo '<div class="card col-3">';
         echo        '<div class=row>';
                            echo '<form method="post" action="processosPHP/processoRelatorioIndA.php" target="_blank" enctype="multipart/form-data">'; 
                echo        '<div class="card-body">';
                echo            "<label class='col-form-label'>Administrador: </label><br/>";   
                echo                "<label class='col-form-label'><h6>$nome</h6></label>";
                                    echo '<div class="row">'; 
                                        echo '<div class="col-3">';
                                         echo '<input type="hidden" name="idLogin" value="'.$codLogin.'"/>';
//                                            echo '<button type="submit" name="relatorioInd" class="btn btn-primary">
//                                                    <img src="icon/svg/si-glyph-print.svg" width="20px" height="27px"/>
//                                                  </button>';
                                                    echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".exampleModal1" 
                                            data-whatever="'.$nome.'" 
                                            data-whateverid="'.$codLogin.'" 
                                            data-whatevernome="'.$nome.'" 
                                            data-whateversobre="'.$login.'" 
                                            data-whatevercpf="'.$senha.'">
                                        <i class="fas fa-pencil-alt"></i>
            </button>';  
                                            echo '</div>';  
     //====================================== BOTAO EDITAR
                                        echo '<div class="col-3">';
                                            echo '<button type="button" class="btn btn-danger" data-toggle="modal" data-target=".modalConfirmar" data-whateverid2="'.$codLogin.'">
                                            <i class="fas fa-pencil-alt"></i>
                                            </button>';
                                        echo '</div>';
    //==========================================BOTAO EXCLUIR
                                         echo '<div class="col-3">';

                                        echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                echo '</form>';   
				            echo '</div>';
				        echo '</div>';
                //Começo Modal de Confirmação de Exclusao
                echo '<div class="modal fade modalConfirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
                    echo '<div class="modal-dialog" role="document">';
                        echo '<div class="modal-content">';
                            echo '<div class="modal-header">';
                                echo '<h5 class="modal-title" id="exampleModalLabel">Deseja realmente excluir esse médico?</h5>';
                                echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                                echo '<span aria-hidden="true">&times;</span>';
                                echo  '</button>';
                            echo '</div>';
                                echo '<div class="modal-footer">';
                                echo '<form method="post">';
                                echo '<input type="hidden" id="id-recipient2" name="idLogin2" value="'.$codLogin.'">';
                                echo '<button type="submit" name="excluirADM" class="btn btn-success"  data-toggle="modal" data-target=".buttonS">
                                Sim
                                </button>';
                                echo '</form>';
                                echo  '<button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>';       
                        echo '</div>';
                    echo '</div>';
                 echo '</div>';
            echo '</div>';
            //Fim Modal de Confirmação de Exclusao
    }
?>

<script>
        $('.modalConfirmar').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var recipientId2 = button.data('whateverid2');
            
          var modal = $(this);
          modal.find('#id-recipient2').val(recipientId2);
        })
</script>

<script>
    $('.exampleModal1').on('show.bs.modal', function(event) {

        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('whatever');
        var recipientId = button.data('whateverid');
        var recipientNome = button.data('whatevernome');
        var recipientLogin = button.data('whateversobre');
        var recipientSenha = button.data('whatevercpf');

        var modal = $(this);
        modal.find('.modal-title').text('Administrador: ' + recipient);
        modal.find('#idLogin').val(recipientId);
        modal.find('#nome').val(recipientNome);
        modal.find('#login').val(recipientLogin);
        modal.find('#senha').val(recipientSenha);

    })

</script>