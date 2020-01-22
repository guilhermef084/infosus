<?php 
    require_once("conexao.php");

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());

    if(isset($_POST["idFuncionario"])) {
        $idFuncionario = $_POST["idFuncionario"];
        $status = 0;
        
        $update = "UPDATE `tbFuncionario` SET `inativo`='$status' WHERE codFuncionario='$idFuncionario'";
        $con_update = mysqli_query($con,$update);

        if($con_update) {
            $retorno["sucesso"] = true;
            $retorno["mensagem"] = "Funcionario inativado com sucesso";
        } else {
            $retorno["sucesso"] = false;
            $retorno["mensagem"] = "Falha no sistema, tente mais tarde.";
        }
    }
    // converter retorno em json
    echo json_encode($retorno);
?>