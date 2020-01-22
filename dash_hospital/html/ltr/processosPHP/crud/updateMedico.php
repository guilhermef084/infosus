<?php 
    require_once("conexao.php");

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());

    if(isset($_POST["idMedico"])) {
        $idMedico = $_POST["idMedico"];
        $nomeMedico = $_POST['txtNomeMedico'];
        $sobreNomeMedico = $_POST['txtSobreNomeMedico'];

        $update = "UPDATE `tbMedico` SET `nomeMedico`='$nomeMedico', `sobreNomeMedico`='$sobreNomeMedico' WHERE codMedico='$idMedico'";
        $con_update = mysqli_query($con,$update);

        if($con_update) {
            $retorno["sucesso"] = true;
            $retorno["mensagem"] = "Medico alterado com sucesso";
        } else {
            $retorno["sucesso"] = false;
            $retorno["mensagem"] = "Falha no sistema, tente mais tarde.";
        }
    }
    // converter retorno em json
    echo json_encode($retorno);
?>