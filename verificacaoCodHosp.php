<?php

    session_start();
    echo $codatual = $_SESSION['codHospital'];

    $con = new mysqli("localhost", "root", "", "bdinfosus") or die(mysql_error());
	$query = $con->query("SELECT codHospital  FROM tbhospital");

?>