<?php
    session_start();
    $loginSession = $_SESSION['login'];
    $senhaSession = $_SESSION['senha'];
    $achou=false;

    $con = new mysqli("localhost", "root", "", "bdinfosus") or die(mysql_error());
	$query = $con->query("SELECT codLogin, login, senha FROM tbLogin where login='$loginSession' and senha='$senhaSession'");

    while($reg=$query->fetch_array()){
    
    $codLogin = $reg['codLogin'];
    $loginbd = $reg['login'];
    $senhabd = $reg['senha'];
    $achou = true;
    if ($achou==true)
    {
        
    }else if(!$query){
        header("Location: ../../../logoutAdministrador.php");
    }
}
?>