<?php
    header("Location: index2.php");
    session_start();
    unset($_SESSION['loginHospital']);
    unset($_SESSION['senhaHospital']);
    unset($_SESSION['codHospital']);
    session_destroy();
?>
