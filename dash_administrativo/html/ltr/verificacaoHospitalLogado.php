<?php
    session_start();

    $loginSession = $_SESSION['loginHospital'];
    $senhaSession = $_SESSION['senhaHospital'];
    $codSession = $_SESSION['codHospital'];

    $con = new mysqli("localhost", "root", "", "bdinfosus") or die(mysql_error());
	$query = $con->query("SELECT codHospital, loginHospital, senhaHospital FROM tbhospital");

    while($reg=$query->fetch_array()){
    
    $codbd = $reg['codHospital'];
    $loginbd = $reg['loginHospital'];
    $senhabd = $reg['senhaHospital'];
    
    if (($loginbd != $loginSession) && ($senhabd != $senhaSession) & ($codbd == $codSession))
    {
        header("Location: ../../../index2.php");
    }
}
?>