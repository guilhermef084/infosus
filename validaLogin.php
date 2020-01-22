<?php

    $login = $_POST['txtUsuario'];
    $senha = $_POST['txtSenha'];

    $con = new mysqli("localhost", "root", "", "bdinfosus") or die(mysql_error());
	$query = $con->query("SELECT login, senha FROM tblogin");

    while($reg=$query->fetch_array()){
    
    $loginbd = $reg['login'];
    $senhabd = $reg['senha'];
        
    if (($loginbd == $login) && ($senhabd == $senha))
    {
        session_start();
        
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        
        header("Location: InfoH\html\ltr\home.php");
    }
    else
    {
       header("Location:index.php");
    }
        }
            
?>
            