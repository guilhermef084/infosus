<?php
    
    include 'processoModalHospital.php';
    include 'processoInativarHospital.php';
    include 'conexao.php';

    include_once("../../../configADM.php");
    protegePagina();

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
    
    $pesquisar=@$_POST['txtBuscar'];
    $resulta_select = "SELECT codHospital, nomeHospital, cepHospital, logradouroHospital, numeroHospital, compHospital, bairroHospital, cidadeHospital, estadoHospital, loginHospital, senhaHospital FROM tbhospital  WHERE nomeHospital LIKE '%$pesquisar%' and inativo=1";
    $resultado_busca = mysqli_query($con, $resulta_select);

    while($reg = mysqli_fetch_array($resultado_busca)) {
    
        $codHospital = $reg['codHospital'];
        $nomeHospital = $reg['nomeHospital'];
        $cepHospital = $reg['cepHospital'];
        $logradouroHospital = $reg['logradouroHospital'];
        $numHospital = $reg['numeroHospital'];
        $compHospital = $reg['compHospital'];
        $bairroHospital = $reg['bairroHospital'];
        $cidadeHospital = $reg['cidadeHospital'];
        $estadoHospital = $reg['estadoHospital'];
        $loginHospital = $reg['loginHospital'];
        $senhaHospital = $reg['senhaHospital'];
       
        echo '<div class="card col-3">';
        echo        '<div class=row>';
        echo         '<form method="post" action="processosPHP/processoRelatorioIndH.php" target="_blank" enctype="multipart/form-data">';
        echo            '<input type="hidden" name="idHospital" value="'.$codHospital.'"/>';
        echo        '<div class="card-body">';
        echo            "<label class='col-form-label'>Hospital: </label>";   
        echo                "<label class='col-form-label'><h6>$nomeHospital</h6></label>";
        //BOTAO REL IND
        echo "<br/>";
                                            echo '<button type="submit" name="relatorioInd" class="btn btn-primary">
                                                    <i class="fas fa-print"></i>
                                                  </button>';
        
        //BOTÃO ALTERAR
        echo '&nbsp&nbsp<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".exampleModal1" 
                             data-whatever="'.$nomeHospital.'" 
                             data-whateverid="'.$codHospital.'" 
                             data-whatevernome="'.$nomeHospital.'" 
                             data-whatevercep="'.$cepHospital.'" 
                             data-whateverend="'.$logradouroHospital.'" 
                             data-whatevernum="'.$numHospital.'"
                             data-whatevercomp="'.$compHospital.'"
                             data-whateverbairro="'.$bairroHospital.'"
                             data-whatevercidade="'.$cidadeHospital.'"
                             data-whateverestado="'.$estadoHospital.'"
                             data-whateverlogin="'.$loginHospital.'"
                             data-whateversenha="'.$senhaHospital.'">              
                             
                             <i class="fas fa-pencil-alt"></i>
                            </button>';
        
        //BOTÃO EXCLUIR
        echo '&nbsp <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".modalConfirmar" data-whateverid2="'.$codHospital.'">
                        <i class="fas fa-trash-alt"></i>                 
                    </button>';
        echo             "</div>";
        echo         '</form>';
        echo           "</div>";
        echo         "</div>";
        
//Começo Modal de Confirmação de Exclusao
                echo '<div class="modal fade modalConfirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
                    echo '<div class="modal-dialog" role="document">';
                        echo '<div class="modal-content">';
                            echo '<div class="modal-header">';
                                echo '<h5 class="modal-title" id="exampleModalLabel">Deseja realmente excluir esse hospital?</h5>';
                                echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                                echo '<span aria-hidden="true">&times;</span>';
                                echo  '</button>';
                            echo '</div>';
                                echo '<div class="modal-footer">';
                                echo '<form method="post">';
                                echo '<input type="hidden" id="id-recipient2" name="idHospital2" value="'.$codHospital.'">';
                                echo '<button type="submit" name="excluirHOSP" class="btn btn-success"  data-toggle="modal" data-target=".buttonS">
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
    $('.exampleModal1').on('show.bs.modal', function(event) {

        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('whatever');
        var recipientId = button.data('whateverid');
        var recipientNome = button.data('whatevernome');
        var recipientCEP = button.data('whatevercep');
        var recipientEnd = button.data('whateverend');
        var recipientNum = button.data('whatevernum');
        var recipientComp = button.data('whatevercomp');
        var recipientBairro = button.data('whateverbairro');
        var recipientCidade = button.data('whatevercidade');
        var recipientEstado = button.data('whateverestado');
        var recipientLogin = button.data('whateverlogin');
        var recipientSenha = button.data('whateversenha');

        var modal = $(this);
        modal.find('.modal-title').text('Hospital: ' + recipient);
        modal.find('#idHospital').val(recipientId);
        modal.find('#nomeHospital').val(recipientNome);
        modal.find('#cepHospital').val(recipientCEP);
        modal.find('#logradouroHospital').val(recipientEnd);
        modal.find('#numHospital').val(recipientNum);
        modal.find('#compHospital').val(recipientComp);
        modal.find('#bairroHospital').val(recipientBairro);
        modal.find('#cidadeHospital').val(recipientCidade);
        modal.find('#estadoHospital').val(recipientEstado);
        modal.find('#loginHospital').val(recipientLogin);
        modal.find('#senhaHospital').val(recipientSenha);

    })
</script>
<script>
    $('.modalConfirmar').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var recipientId2 = button.data('whateverid2');

        var modal = $(this);
        modal.find('#id-recipient2').val(recipientId2);
    })
</script>