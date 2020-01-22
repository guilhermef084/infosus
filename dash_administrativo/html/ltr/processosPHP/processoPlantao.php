<?php
    date_default_timezone_set('America/Sao_Paulo');

    include 'conexao.php';

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
    $query = $con->query("SELECT nomeEspecialidade, horaInicio, horaFim, nomeMedico, sobreNomeMedico FROM tbPlantao inner join tbMedico on tbPlantao.codMedico = tbMedico.codMedico");

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