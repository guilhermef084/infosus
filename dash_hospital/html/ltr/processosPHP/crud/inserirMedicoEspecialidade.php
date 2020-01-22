<?php

    include 'conexao.php';
    include_once ("../../../config.php");
    protegePagina();
    
    $codHospitalLogado=$_SESSION['usuarioID']; 
				
    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
					
    if(isset($_POST['cadastrarMedico'])){
       //inicio foreach
        foreach($_POST['selectE'] as $key => $value) {
        $separa = explode(',', $value);
            for ($i=0;$i<count($separa);$i++){
                    $convenio = $separa[$i];
                    if($con){
                        $query = $con->query("call spEspM ('$convenio','$codHospitalLogado')");
                    if($query){
                        
                    }else{
                        die ("Erro: ".mysqli_error($con));
                    }
                }	
            }
        }
    }
?>