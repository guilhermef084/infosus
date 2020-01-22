<?php
    
    include 'conexao.php';
    include_once("../../../configADM.php");
    protegePagina();

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
    $query = $con->query("SELECT codLogin ,nome, login, senha FROM tbLogin");

    $codLogin = @$_POST['codLogin'];
    $nome = @$_POST['nome'];
    $login = @$_POST['login'];
    $senha = @$_POST['senha'];

    if(isset($_POST['alterarAdministrador'])){	
			if($con){
				$query = $con->query("UPDATE tbLogin set nome='$nome'
                                    ,login='$login'
                                    ,senha='$senha'
								where login='$login';
								");
					}if($query){
					}
					else{
						die ("Erro: ".mysqli_error($con));
					}
				}

?>