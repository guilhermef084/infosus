<?php

    include 'conexao.php';
    include_once("../../../configADM.php");
    protegePagina();

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
    $query = $con->query("SELECT * FROM tbLogin");
        
        $inativo=0;
        $codLogin = @$_POST['idLogin2'];

		if(isset($_POST['excluirADM'])){	
			if($con){
				$query = $con->query("UPDATE tbLogin set inativo=0 where codLogin='$codLogin';");
					}if($query){
					}
					else{
						die ("Erro: ".mysqli_error($con));
					}
				}
?>