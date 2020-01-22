<?php 
    require_once("conexao.php");

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());

    if(isset($_POST["idMedico"])) {
        $idMedico = $_POST["idMedico"];
        $status=1; //mudando status para ativo
        
        $update = "UPDATE `tbMedico` SET `inativo`='$status' WHERE codMedico='$idMedico'";
        $con_update = mysqli_query($con,$update);

        if($con_update) {
            $retorno["sucesso"] = true;
            $retorno["mensagem"] = "Medico ativado com sucesso";
        } else {
            $retorno["sucesso"] = false;
            $retorno["mensagem"] = "Falha no sistema, tente mais tarde.";
        }
    }
    // converter retorno em json
    echo json_encode($retorno);
?>