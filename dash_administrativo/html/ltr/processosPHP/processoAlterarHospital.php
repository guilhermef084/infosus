<?php
    
    include 'conexao.php';
    include_once("../../../configADM.php");
    protegePagina();

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
    $query = $con->query("SELECT codHospital, nomeHospital, cepHospital, logradouroHospital, numeroHospital, compHospital, bairroHospital, cidadeHospital, estadoHospital, loginHospital, senhaHospital FROM tbhospital");

    $codHospital = @$_POST['codHospital'];
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

    if(isset($_POST['alterarHospital'])){	
			if($con){
				$query = $con->query("UPDATE tbHospital set nomeHospital='$nomeHospital'
                                    ,cepHospital='$cepHospital'
                                    ,logradouroHospital='$logradouroHospital'
                                    ,numeroHospital='$numHospital'
                                    ,compHospital='$compHospital'
                                    ,bairroHospital='$bairroHospital'
                                    ,cidadeHospital='$cidadeHospital'
                                    ,estadoHospital='$estadoHospital'
                                    ,loginHospital='$loginHospital'
                                    ,senhaHospital='$senhaHospital'
								where codHospital='$codHospital';
								");
					}if($query){
					}
					else{
						die ("Erro: ".mysqli_error($con));
					}
				}

?>