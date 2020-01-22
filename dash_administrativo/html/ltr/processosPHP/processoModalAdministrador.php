<?php
        
        include 'processoInativarAdministrador.php';
        include 'processoAlterarAdministrador.php';
		include 'conexao.php';
        include_once("../../../configADM.php");
        protegePagina();
    
        $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
        $query = $con->query("SELECT codLogin, nome, login, senha FROM tbLogin");
		
		while($reg=$query->fetch_array()){
        
        //VARIAVEIS BANCO
        $codLogin = $reg['codLogin'];
        $nome = $reg['nome'];
        $login = $reg['login'];
        $senha = $reg['senha'];
            
            //MODAL DE ALTERAR
            echo '<div class="modal fade exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
							echo '<div class="modal-dialog modal-lg" role="document">';
								echo'<div class="modal-content">';
								 echo '<div class="modal-header">';
									echo '<h5 class="modal-title" id="exampleModalLabel">Novo Administrador</h5>';
									echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
									  echo '<span aria-hidden="true">&times;</span>';
									echo '</button>';
								  echo '</div>';
								  echo '<div class="modal-body">';
									echo '<form method="post">';
									  echo '<div class="form-group">';;
                                        echo '<div clas="row">';
                                            echo '<label for="nomeHospital" class="col-form-label">Nome Administrador:</label>';
                                            echo '<input type="hidden" id="idLogin" name="idLogin" value"'.$codLogin.'"/>';
                                            echo '<input type="text" id="nome" class="form-control" name="nome" value="'.$nome.'"/>';
                                        echo '</div>';
                                          echo '<div class="row">';
                                            echo '<div class="col-6">';
                                               echo '<label for="loginHospital" class="col-form-label">Login:</label>';
                                                echo '<input type="text" id="login" class="form-control" name="login" value="'.$login.'"/>';
                                           echo '</div>';
                                            echo '<div class="col-6">';
                                                echo '<label for="senha" class="col-form-label">Senha:</label>';
                                                echo '<input type="text" id="senha" class="form-control" name="senha" value="'.$senha.'"/>';
                                            echo '</div>';
                                         echo '</div>';
                                    echo '</div>';
								  echo '<div class="modal-footer">';
									echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>';
									echo '<button type="submit" name="alterarAdministrador" class="btn btn-primary" id="cad">Alterar
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
    $('.exampleModal1').on('show.bs.modal', function(event) {

        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('whatever');
        var recipientId = button.data('whateverid');
        var recipientNome = button.data('whatevernome');
        var recipientLogin = button.data('whateverlogin');
        var recipientSenha = button.data('whateversenha');

        var modal = $(this);
        modal.find('.modal-title').text('Admnistrador: ' + recipient);
        modal.find('#idLogin').val(recipientId);
        modal.find('#nome').val(recipientNome);
        modal.find('#login').val(recipientLogin);
        modal.find('#senha').val(recipientSenha);

    })

</script>
