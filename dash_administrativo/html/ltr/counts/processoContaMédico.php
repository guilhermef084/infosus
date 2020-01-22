<?php

    include 'conexao.php';
    include_once("../../../configADM.php");
    protegePagina();

    $resulta_select = "SELECT COUNT codMedico FROM tblogin  WHERE inativo=1";
    $resultado_busca = mysqli_query($con, $resulta_select);

    while($reg = mysqli_fetch_array($resultado_busca)) {
    
        echo $codMedico = $reg['codMedico'];
    }
        
?>