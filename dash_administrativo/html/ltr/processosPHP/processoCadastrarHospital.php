<?php
    include 'conexao.php';
    include_once("../../../configADM.php");
    protegePagina();
    //VARIAVEIS POST
    $nomeHospital = @$_POST['nomeHospital'];
    $cepHospital = @$_POST['cepHospital'];
    $logradouroHospital = @$_POST['logradouroHospital'];
    $numHospital = @$_POST['numHospital'];
    $compHospital = @$_POST['compHospital'];
    $bairroHospital = @$_POST['bairroHospital'];
    $cidadeHospital = @$_POST['cidadeHospital'];
    $estadoHospital = @$_POST['estadoHospital'];
    $loginHospital = @$_POST['loginHospital'];
    $senhaHospital = @$_POST['senhaHospital'];
    $ativo=1;

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
					
        if(isset($_POST['cadastrarHospital'])){							
            if($con){
				$query = $con->query("insert into tbHospital values(null,'$nomeHospital','$cepHospital','$logradouroHospital','$numHospital','$compHospital','$bairroHospital','$cidadeHospital','$estadoHospital','$loginHospital','$senhaHospital','$ativo');");
				if($query){
                     header('Location:hospital.php');
				}else{
                     die ("Erro: ".mysqli_error($con));
				}
            }	
        }
?>