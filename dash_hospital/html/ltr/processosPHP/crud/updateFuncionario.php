<?php 
    require_once("conexao.php");

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());

    if(isset($_POST["idFuncionario"])) {
        $idFuncionario = $_POST["idFuncionario"];
        $nomeFuncionario = $_POST['txtNome'];
        $sobreNomeFuncionario = $_POST['txtSobreNome'];
        $emailFuncionario = $_POST['txtEmail'];

        $update = "UPDATE `tbFuncionario` SET `nomeFuncionario`='$nomeFuncionario', `sobreNomeFuncionario`='$sobreNomeFuncionario', `emailFuncionario`='$emailFuncionario' WHERE codFuncionario='$idFuncionario'";
        $con_update = mysqli_query($con,$update);

        if($con_update) {
            $retorno["sucesso"] = true;
            $retorno["mensagem"] = "Funcionario alterado com sucesso";
        } else {
            $retorno["sucesso"] = false;
            $retorno["mensagem"] = "Falha no sistema, tente mais tarde.";
        }
    }
    // converter retorno em json
    echo json_encode($retorno);
?>