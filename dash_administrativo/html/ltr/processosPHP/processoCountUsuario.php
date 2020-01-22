<?php
        include 'conexao.php';

        $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());

        $query = "SELECT COUNT(*) AS TOTAL FROM tbLogin";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        foreach ($row as $stringArray){
            //$stringArrayF = $stringArrayF.$stringArray;
        }
echo $stringArray;

?>
