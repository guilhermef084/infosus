<?php
    session_start();

    $logado = false;
    $loginSession = $_SESSION['txtUsuario'];
    $senhaSession = $_SESSION['txtSenha'];

    $con = new mysqli("localhost", "root", "", "bdinfosus") or die(mysql_error());
	$query = $con->query("SELECT codLogin, login, senha FROM tblogin where login='$loginSession' and senha='$senhaSession'");

    while($reg=$query->fetch_array()){
    
    $codbd = $reg['codLogin'];
    $loginbd = $reg['login'];
    $senhabd = $reg['senha'];
    
    $logado = true;
    
    if (logado==true){
        
        }else if(loginSession == $_SESSION[''] && senhaSession == $_SESSION['']){
        header("Location: logoutAdministrador.php");
    }
}
    
?>