<?php
    error_reporting(0);
    ini_set(“display_errors”, 0 );

    include 'conexao.php';
    
    $codHospitalLogado=@$_POST['codHospitalLogado'];
    $nomeEspecialidade = @$_POST['txtNome'];

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
					
    if(isset($_POST['cadastrarEspecialidade'])){							
		if($con){
			$query = $con->query("call spEsp ('$nomeEspecialidade',$codHospitalLogado);");
				if($query){
                     while($reg=$query->fetch_array()){
                        if($reg['Especialidade ja existente, impossivel Cadastrar!'] == "Especialidade ja existente, impossivel Cadastrar!"){
?>        
<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function () { 
            swal("Especialidade já cadastrada, por favor verifique!","","error");
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
            swal("Especialidade cadastrada com sucesso!","","success");
        }, 400);
    });
</script>
<?php                               
                        }
                    }
				}
            }
        }
?>