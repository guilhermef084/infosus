<?php 
    require_once("conexao.php");

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());

    if( isset($_POST["idMedicoEspecialidade"]) ) {
        $idMedicoEspecialidade = $_POST["idMedicoEspecialidade"];
        
        $exclusao = "DELETE FROM tbMedicoEspecialidade ";
        $exclusao .= "WHERE codMedicoEspecialidade = {$idMedicoEspecialidade}";
        $con_exclusao = mysqli_query($con,$exclusao);

        if($con_exclusao) {
            $retorno["sucesso"] = true;
            $retorno["mensagem"] = "Transportadora excluida com sucesso.";
        } else {
            $retorno["sucesso"] = false;
            $retorno["mensagem"] = "Falha no sistema, tente mais tarde.";
        }
    }

    // converter retorno em json
    echo json_encode($retorno);
?>