<?php

    include 'conexao.php';
    include_once("../../../configADM.php");
    protegePagina();

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
    $query = $con->query("SELECT * FROM tbhospital");
        
         $inativo=0;
		 $codHospital = @$_POST['idHospital2'];

		if(isset($_POST['excluirHOSP'])){	
			if($con){
				$query = $con->query("UPDATE tbhospital set inativo=0 where codHospital='$codHospital';");
					}if($query){
					}
					else{
						die ("Erro: ".mysqli_error($con));
					}
				}
?>