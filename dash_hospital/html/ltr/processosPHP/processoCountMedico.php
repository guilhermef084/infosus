<?php
        require_once("crud/conexao.php");

        require_once("../../../config.php");
        protegePagina();
        $codHospitalLogado=$_SESSION['usuarioID']; 

        $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());

        $query = "SELECT COUNT(*) AS TOTAL FROM tbMedico where inativo=1 and codHospital = '.$codHospitalLogado.'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        foreach ($row as $stringArray){
            //$stringArrayF = $stringArrayF.$stringArray;
        }
echo $stringArray;

?>
