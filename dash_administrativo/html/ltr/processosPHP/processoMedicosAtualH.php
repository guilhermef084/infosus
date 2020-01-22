<?php
    date_default_timezone_set('America/Sao_Paulo');

    include 'conexao.php';

    $teste = "14/10/2018";
    $matricula = date ("Y-m-d");
    
    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
    $query = $con->query("SELECT nomeMedico, cpfMedico FROM tbPlantao");

     echo "<table class='table' style='text-align: left;'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th scope='col'>Nome do médico</th>";
                echo "<th scope='col'>CPF MÉDICO</th>";
            echo "</tr>";
        echo "</thead>";

    while($reg = $query->fetch_array()) {
		  echo '<tbody>';
            echo '<tr>';
                 echo '<td>'.$reg['nomeMedico'].'</td>';
                 echo '<td>'.$reg['cpfMedico'].'</td>';
            echo '</tr>';
        echo '</tbody>';
    }
    echo "</table>";
?> 