<?php
    include 'conexao.php';
    include_once("../../../configADM.php");
    protegePagina();

    //VARIAVEIS POST
    $nome = @$_POST['nome'];
    $login = @$_POST['login'];
    $senha = @$_POST['senha'];
    $ativo=1;

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
					
        if(isset($_POST['cadastrarAdministrador'])){							
            if($con){
				$query = $con->query("insert into tbLogin values(null,'$nome','$login','$senha','$ativo');");
				if($query){
                     header('Location:administrador.php');
				}else{
                     die ("Erro: ".mysqli_error($con));
				}
            }	
        }
?>