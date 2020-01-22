<?php
    date_default_timezone_set('America/Sao_Paulo');

    include 'conexao.php';
    include_once("../../../configADM.php");
    protegePagina();


    $teste = "14/10/2018";
    $matricula = date ("Y-m-d");
    

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
    $query = $con->query("SELECT nomeMedico, sobreNomeMedico, nomeEspecialidade, horaInicio, horaFim FROM tbPlantao inner join tbMedico on tbplantao.codMedico = tbmedico.codMedico");

     echo "<table class='table' style='text-align: left;'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th scope='col'>Nome Médico</th>";
                echo "<th scope='col'>Sobrenome</th>";
                echo "<th scope='col'>Especialidade</th>";
                echo "<th scope='col'>Horário de Entrada</th>";
                echo "<th scope='col'>Horário de Saida</th>";
            echo "</tr>";
        echo "</thead>";

    while($reg = $query->fetch_array()) {
		  echo '<tbody>';
            echo '<tr>';
                 echo '<td>'.$reg['nomeMedico'].'</td>';
                 echo '<td>'.$reg['sobreNomeMedico'].'</td>';
                 echo '<td>'.$reg['nomeEspecialidade'].'</td>';
                 echo '<td>'.$reg['horaInicio'].'</td>';
                 echo '<td>'.$reg['horaFim'].'</td>';
            echo '</tr>';
        echo '</tbody>';
    }
    echo "</table>";
?>