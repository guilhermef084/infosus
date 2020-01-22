<?php

	session_start();
	
	include 'conexao.php';
	include("../../../configADM.php");
    protegePagina();
	$nome = @$_POST['txtNomeHospital'];
    $cep = @$_POST['txtCepHospital'];
	$logradouro = @$_POST['txtLogradouroHospital'];
	$numero = @$_POST['txtNumeroHospital'];
	$complemento = @$_POST['txtComplementoHospital'];
    $bairro = @$_POST['txtBairroHospital'];
	$cidade = @$_POST['txtCidadeHospital'];
	$estado = @$_POST['txtEstadoHospital'];
    $login = @$_POST['txtLoginHospital'];
    $senha = @$_POST['txtSenhaHospital'];
    $ativo = 1;
	
	$con= new mysqli($server, $user, $pass, $bd) or die(mysql_error());
	
	if(isset($_POST['btnCadastrar'])){
		if($con){
			$query = $con->query("insert into tbhospital values(null, '$nome', '$cep', '$logradouro', '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$login', '$senha','$ativo');");
            header('location:home.php');
		}
		else{
			die("Erro: ".mysqli_error($con));
		}
	}
	
?>