<?php
    header("Location: index.html");
    
    session_start();
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    session_destroy();
?>
