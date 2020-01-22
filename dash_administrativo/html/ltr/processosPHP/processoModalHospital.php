     <?php
        
        include 'processoInativarHospital.php';
        include 'processoAlterarHospital.php';
		include 'conexao.php';
        include_once("../../../configADM.php");
        protegePagina();
    
        $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
        $query = $con->query("SELECT codHospital, nomeHospital, cepHospital, logradouroHospital, numeroHospital, compHospital, bairroHospital, cidadeHospital, estadoHospital, loginHospital, senhaHospital FROM tbhospital");
		
		while($reg=$query->fetch_array()){
        
        //VARIAVEIS BANCO
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
            
            //MODAL DE ALTERAR
            echo '<div class="modal fade exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
							echo '<div class="modal-dialog modal-lg" role="document">';
								echo'<div class="modal-content">';
								 echo '<div class="modal-header">';
									echo '<h5 class="modal-title" id="exampleModalLabel">Novo Hospital</h5>';
									echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
									  echo '<span aria-hidden="true">&times;</span>';
									echo '</button>';
								  echo '</div>';
								  echo '<div class="modal-body">';
									echo '<form method="post">';
									  echo '<div class="form-group">';;
                                        echo '<div clas="row">';
                                            echo '<label for="nomeHospital" class="col-form-label">Nome Hospital:</label>';
                                            echo '<input type="hidden" id="idHospital" name="codHospital" value"'.$codHospital.'"/>';
                                            echo '<input type="text" id="nomeHospital" class="form-control" name="nomeHospital" value="'.$nomeHospital.'"/>';
                                        echo '</div>';
                                        echo '<div class="row">';
                                            echo '<div class="col-6">';
                                                echo '<label for="cepHospital" class="col-form-label">CEP:</label>';
                                                echo '<input type="text" id="cepHospital" class="form-control" name="cepHospital" value="'.$cepHospital.'"/>';
                                            echo '</div>';
                                            echo '<div class="col-6">';
                                               echo '<label for="logradouroHospital" class="col-form-label">Logradouro:</label>';
                                                echo '<input type="text" id="logradouroHospital" class="form-control" name="logradouroHospital" value="'.$logradouroHospital.'" />';
                                            echo '</div>';
                                        echo '</div>';
                                         echo '<div class="row">';
                                            echo '<div class="col-6">';
                                                echo '<label for="numHospital" class="col-form-label">Número:</label>';
                                                echo '<input type="text" id="numHospital" class="form-control" name="numHospital" value="'.$numHospital.'"/>';
                                            echo '</div>';
                                            echo '<div class="col-6">';
                                                echo '<label for="compHospital" class="col-form-label">Complemento:</label>';
                                                echo '<input type="text" id="compHospital" class="form-control" name="compHospital"value="'.$compHospital.'" />';
                                            echo '</div>';
                                         echo '</div>';
                                          echo '<div class="row">';
                                            echo '<div class="col-6">';
                                                echo '<label for="bairroHospital" class="col-form-label">Bairro:</label>';
                                                echo '<input type="text" id="bairroHospital" class="form-control" name="bairroHospital"value="'.$bairroHospital.'" />';
                                            echo '</div>';
                                            echo '<div class="col-6">';
                                                echo '<label for="cidadeHospital" class="col-form-label">Cidade:</label>';
                                                echo '<input type="text" id="cidadeHospital" class="form-control" name="cidadeHospital"value="'.$cidadeHospital.'" />';
                                            echo '</div>';
                                         echo '</div>';
                                          echo '<div class="row">';
                                            echo '<div class="col-6">';
                                                echo '<label for="estadoHospital" class="col-form-label">Estado:</label>';
                                                echo '<input type="text" id="estadoHospital" class="form-control" name="estadoHospital" value="'.$estadoHospital.'"/>';
                                            echo '</div>';
                                         echo '</div> ';
                                          echo '<div class="row">';
                                            echo '<div class="col-6">';
                                               echo '<label for="loginHospital" class="col-form-label">Login:</label>';
                                                echo '<input type="text" id="loginHospital" class="form-control" name="loginHospital" value="'.$loginHospital.'"/>';
                                           echo '</div>';
                                            echo '<div class="col-6">';
                                                echo '<label for="senhaHospital" class="col-form-label">Senha:</label>';
                                                echo '<input type="password" id="senhaHospital" class="form-control" name="senhaHospital" value="'.$senhaHospital.'"/>';
                                            echo '</div>';
                                         echo '</div>';
                                    echo '</div>';
								  echo '<div class="modal-footer">';
									echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>';
									echo '<button type="submit" name="alterarHospital" class="btn btn-primary" id="cad">Alterar
                                    </button>';
								  echo '</div>';
								  echo '</form>';
								echo '</div>';
							  echo '</div>';
							echo '</div>';
                        echo '</div>';
        }
    ?>
  <script>
        $('.exampleModal1').on('show.bs.modal', function (event) {
          
          var button = $(event.relatedTarget);// Button that triggered the modal
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
