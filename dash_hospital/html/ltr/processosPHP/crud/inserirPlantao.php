<?php 
    session_start();
    
    require_once("conexao.php");
    
    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());

    $data=@$_POST['data'];
    $plantonistas = @$_POST['plantao'];
    $codHospitalLogado = $_SESSION['usuarioID'];

    foreach ($plantonistas as $cod => $medico) {
        if (isset($medico['codMedico'])) {

            $inserir    = "insert into tbplantao "; 
            $inserir    .= "values ";
            $inserir    .= "(null,'{$medico['codMedico']}','{$medico['nomeEspecialidade']}','{$medico['horaEntrada']}','{$medico['horaSaida']}','$data','$codHospitalLogado')";
            
            $con_inserir = mysqli_query($con,$inserir);

            if($con_inserir) {
                $retorno["sucesso"] = true;
                $retorno["mensagem"] = "Plantao cadastrado com sucesso!";
            } else {
                $retorno["sucesso"] = false;
                $retorno["mensagem"] = "Falha no sistema, tente mais tarde.";
            }
        }
    }
    
            // converter retorno em json
            echo json_encode($retorno);
?>