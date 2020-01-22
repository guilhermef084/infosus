<?php
    error_reporting(0);
    ini_set(“display_errors”, 0 );

    include "conexao.php";
    
    $codHospitalLogado=@$_POST['codHospitalLogado'];
    $codTipoAcesso = @$_POST['codTipoAcesso'];
    $nome = @$_POST['txtNome'];
    $sobreNome=@$_POST['txtSobreNome'];
    $cpf = @$_POST['txtCPF'];
    $email = @$_POST['txtEmail'];
    $senha = @$_POST['txtPass'];
    $status=1;

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());

        if(isset($_FILES['pic'])){
            $ext = strtolower(substr($_FILES['pic']['name'],-5)); //Pegando extensão do arquivo
            $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
            $dir = './arquivos-upados/'; //Diretório para uploads 
            move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
					
            if(isset($_POST['cadastrarFuncionario'])){				
				if($con){
				    $query = $con->query("call spCpFuncionario ('$nome','$sobreNome','$cpf','$new_name','$email','$senha',$status,$codHospitalLogado,$codTipoAcesso);");
				    if($query){
                       while($reg=$query->fetch_array()){
                           if($reg['CPF ja existente'] == "CPF ja existente"){
?>        
<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function () { 
            swal("CPF já cadastrado, por favor verifique!","","error");
        }, 400);
    });
</script>
<?php
                        }
                        if($reg['Cadastrado com sucesso!'] == "Cadastrado com sucesso!"){
?>
<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function () { 
            swal("Funcionário cadastrado com sucesso!","","success");
        }, 400);
    });
</script>
<?php
                               
                        }
                    }
				}
            }
        }
    }
?>