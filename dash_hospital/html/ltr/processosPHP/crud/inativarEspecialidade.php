<?php 
    require_once("conexao.php");

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());

    if(isset($_POST["idEspecialidade"])) {
        $idEspecialidade = $_POST["idEspecialidade"];
        $status = 0;
        
        $update = "UPDATE `tbEspecialidade` SET `statusEspecialidade`='$status' WHERE codEspecialidade='$idEspecialidade'";
        $con_update = mysqli_query($con,$update);

        if($con_update) {
            $retorno["sucesso"] = true;
            $retorno["mensagem"] = "Especialidade inativada com sucesso";
        } else {
            $retorno["sucesso"] = false;
            $retorno["mensagem"] = "Falha no sistema, tente mais tarde.";
        }
    }
    // converter retorno em json
    echo json_encode($retorno);
?>