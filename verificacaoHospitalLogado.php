<?php

   session_start();

    $loginSession = $_SESSION['loginHospital'];
    $senhaSession = $_SESSION['senhaHospital'];
    $codHospitalLogado = $_SESSION['codHospital'];

    $con = new mysqli("localhost", "root", "", "bdinfosus") or die(mysql_error());
	$query = $con->query("SELECT codHospital, loginHospital, senhaHospital FROM tbhospital");

    $achou = false;

    while($reg=$query->fetch_array()){
    
    $codbd = $reg['codHospital'];
    $loginbd = $reg['loginHospital'];
    $senhabd = $reg['senhaHospital'];
    
        if (($loginbd != $loginSession) && ($senhabd != $senhaSession) && ($codbd == $codHospitalLogado))
        {
        $achou = true;
        }
    }

    if($achou==true){
    header("Location: ../../../logouthosp.php");
    }

?>