<?php
    
//    include 'processoModalHospital.php';
//    include 'processoInativarHospital.php';
    include 'conexao.php';

    include_once("../../../configADM.php");
    protegePagina();

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
    
    $pesquisar=@$_POST['txtBuscar'];

    $space = "";
    
    $resulta_select = "SELECT codHospital, nomeHospital, cepHospital, logradouroHospital, numeroHospital, compHospital, bairroHospital, cidadeHospital, estadoHospital, loginHospital, senhaHospital FROM tbhospital  WHERE nomeHospital LIKE '%$pesquisar%' and inativo=1";


    
    $resultado_busca = mysqli_query($con, $resulta_select);
    //COMEÇO TABELA
        echo '<div class="card">';
        echo   '<div class="card-body">';
         echo '<table class="table table-borderless" id="funcao" onchange="mudouValor()">';
          echo "<thead>";
            echo "<tr>";
              echo '<th scope="col">Código</th>';
              echo '<th scope="col">Nome</th>';
              echo '<th scope="col">Bairro</th>';
              echo '<th scope="col">Informações</th>';
              echo '<th scope="col">Plantonistas</th>';
            echo "</tr>";
          echo "</thead>";

//SETA OS DADOS DO BANCO NAS VARIAVEIS-----------------------------------------------------------------------

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
        
    $resulta_select2 = "SELECT Plant.codPlantao, Plant.nomeEspecialidade, Plant.codHospital, Plant.horaInicio, Plant.horaFim, Plant.data, Med.nomeMedico, Hosp.nomeHospital from tbPlantao as Plant 
    inner join tbMedico as Med on Plant.codMedico=Med.codMedico 
        inner join tbHospital as Hosp on Plant.codHospital=Hosp.codHospital where Hosp.codHospital = '$codHospital' and Hosp.inativo = 1";
        
        $resultado_busca2 = mysqli_query($con, $resulta_select2);
        
        while($reg2 = mysqli_fetch_array($resultado_busca2)) {
        
        $codPlantao = $reg2['codPlantao'];
        $nomeMedico2 = $reg2['nomeMedico'];
        $nomeHospital2 = $reg2['nomeHospital'];
        $codHospital2 = $reg2['codHospital'];
        $nomeEspecialidade2 = $reg2['nomeEspecialidade'];
        $horaInicio = $reg2['horaInicio'];
        $horaFim = $reg2['horaFim'];
        $data = $reg2['data'];

        }
        
        //MEIO DA TABELA
          echo "<tbody>";
            echo "<tr>";
              echo '<th scope="row" name="Código">'.$codHospital.'</th>';
        
        //CÓDIGO CSS INLINE PARA MUDAR A COR DO BOTÃO -------------------------------------------------------
                echo '<style>
                .cor{

                color: #212529;
                background-color: #fff;
                border-color: #007bff;
                font-color: #fff;
                }                
                
                .cor2{

                color: #000000;
                background-color: #fff;
                border-color: #007bff;
                font-color: #000000;
                }
                </style>';
    //------------------------------------------------------------------------------------------------------//    
                  echo '<td>'.$nomeHospital.'</td>';
                  echo '<td>'.$bairroHospital.'</td>';
        
                  echo '<td> <a class="btn cor" data-toggle="modal" data-target=".modalVerMais" name="vermais" data-whatever="'.$nomeHospital.'" 
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
                             data-whateversenha="'.$senhaHospital.'"> Ver mais </a></td>';
        
 
                  echo "<td>";
                    echo '<form method="post" action="processosPHP/processoRelatorioHome.php" target="_blank" enctype="multipart/form-data">';
                  echo '<input type="hidden" name="idHospital2" value="'.$codHospital.'">';
                  echo '<button type="submit" name="relatorioInd" class="btn cor"> Médicos Plantonistas </button>';
                  echo '</form>';
                  echo "</td>";
            echo "</tr>";
        
            //<!-- Modal -->
            echo '<div class="modal fade modalVerMais" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true" >';
              echo '<div class="modal-dialog modal-dialog-centered" role="document">';
                echo '<div class="modal-content">';
                  echo '<div class="modal-header">';
                    echo '<h5 class="modal-title" id="TituloModalCentralizado">Informações '.$nomeHospital.'</h5>';
                     echo '<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">';
                        echo '<span aria-hidden="true">&times;</span>';
                    echo "</button>";
                  echo "</div>";
                  echo '<div class="modal-body">';
                    echo  '<div class="card">';
                  echo '<div class="card-body">';
                 echo '<h5 class="card-title">Informações Básicas</h5>';
                  echo '<form method="post">';
									  echo '<div class="form-group">';
                                        echo '<div clas="row">';
                                            echo '<input type="hidden" id="idHospital" name="codHospital" value"'.$codHospital.'"/>';
                                            echo '<label for="nomeHospital" class="col-form-label">Nome Hospital:</label>';
                                            echo '<input type="text" id="nomeHospital" class="form-control" disabled="disabled" name="nomeHospital"  value="'.$nomeHospital.'"/>';
                                        echo '</div>';
                                        echo '<div class="row">';
                                            echo '<div class="col-6">';
                                                echo '<label for="cepHospital" class="col-form-label">CEP:</label>';
                                                echo '<input type="text" id="cepHospital" class="form-control" name="cepHospital" disabled="disabled" value="'.$cepHospital.'"/>';
                                            echo '</div>';
                                            echo '<div class="col-6">';
                                               echo '<label for="logradouroHospital" class="col-form-label">Logradouro:</label>';
                                                echo '<input type="text" id="logradouroHospital" class="form-control" name="logradouroHospital" disabled="disabled" value="'.$logradouroHospital.'" />';
                                            echo '</div>';
                                        echo '</div>';
                                         echo '<div class="row">';
                                            echo '<div class="col-6">';
                                                echo '<label for="numHospital" class="col-form-label">Número:</label>';
                                                echo '<input type="text" id="numHospital" class="form-control" name="numHospital" disabled="disabled" value="'.$numHospital.'"/>';
                                            echo '</div>';
                                            echo '<div class="col-6">';
                                                echo '<label for="compHospital" class="col-form-label">Complemento:</label>';
                                                echo '<input type="text" id="compHospital" class="form-control" name="compHospital" disabled="disabled "value="'.$compHospital.'" />';
                                            echo '</div>';
                                         echo '</div>';
                                          echo '<div class="row">';
                                            echo '<div class="col-6">';
                                                echo '<label for="bairroHospital" class="col-form-label">Bairro:</label>';
                                                echo '<input type="text" id="bairroHospital" class="form-control" name="bairroHospital" disabled="disabled" value="'.$bairroHospital.'" />';
                                            echo '</div>';
                                            echo '<div class="col-6">';
                                                echo '<label for="cidadeHospital" class="col-form-label">Cidade:</label>';
                                                echo '<input type="text" id="cidadeHospital" class="form-control" name="cidadeHospital" disabled="disabled" value="'.$cidadeHospital.'" />';
                                            echo '</div>';
                                         echo '</div>';
                                          echo '<div class="row">';
                                            echo '<div class="col-6">';
                                                echo '<label for="estadoHospital" class="col-form-label">Estado:</label>';
                                                echo '<input type="text" id="estadoHospital" class="form-control" name="estadoHospital" disabled="disabled" value="'.$estadoHospital.'"/>';
                                            echo '</div>';
                                         echo '</div> ';
                                          echo '<div class="row">';
                                            echo '<div class="col-6">';
                                               echo '<label for="loginHospital" class="col-form-label">Login:</label>';
                                                echo '<input type="text" id="loginHospital" class="form-control" name="loginHospital" disabled="disabled" value="'.$loginHospital.'"/>';
                                           echo '</div>';
                                            echo '<div class="col-6">';
                                                echo '<label for="senhaHospital" class="col-form-label">Senha:</label>';
                                                echo '<input type="text" id="senhaHospital" class="form-control" name="senhaHospital" disabled="disabled" value="'.$senhaHospital.'"/>';
                                             echo '</div>';
                                          echo '</div>';
                                        echo '</div>';
                                    echo '</form>';
        
                        echo '<div class="modal-footer">';
                    echo '<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>';
//                    echo '<button type="button" class="btn btn-primary">Salvar mudanças</button>';
                  echo "</div>";
        echo '</div>'; 
        echo '</div>'; 
        echo '</div>';
        echo '</div>';
        echo '</div>';
        
    }
        
echo "</tbody>";  
echo "</table>";
echo "</div>";
echo "</div>";

?>
<script>
    $('.modalVerMais').on('show.bs.modal', function(event) {

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
function mudouValor(){
      //instancia um elemento do DOM através do respectivo id, que nesse caso é "COMBOFAB"
      var elemento = document.getElementById('funcao');
      //com o elemento instanciado, é possível capturar o valor da label
      var texto = elemento.options[elemento.selectedIndex].innerHTML;
 }
</script>

<script>
    $('.modalverPlantao').on('hidden.bs.collapse', function(event) {

        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('whatever');
        var recipientId = button.data('whateverid');
        var recipientNome = button.data('whatevernome');
        var recipientEspecialidade = button.data('whateverespecialidade');
        var recipientHoraInicio = button.data('whateverhorainicio');
        var recipientHoraFim = button.data('whateverhorafim');
        var recipientData = button.data('whateverdata');

        var modal = $(this);
        modal.find('.modal-title').text('Hospital: ' + recipient);
        modal.find('#idHospital').val(recipientId);
        modal.find('#nomeMedico').val(recipientNome);
        modal.find('#nomeEspecialidade').val(recipientEspecialidade);
        modal.find('#horaInicio').val(recipientHoraInicio);
        modal.find('#horaFim').val(recipientHoraFim);
        modal.find('#data').val(recipientData);
    })
</script>