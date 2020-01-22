<?php
    session_start();
    $loginSession = $_SESSION['login'];
    $senhaSession = $_SESSION['senha'];
            
    if(($loginSession != 'adm') || ($senhaSession != '1234'))
    {
        header("Location: index.html");
    }
?>