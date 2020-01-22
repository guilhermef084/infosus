<?php	
    
    include 'conexao.php';


	$html = "";
	$space = " ";
    $nome="<b>"."Nome Administrador: "."</b>";
    $cep="<b>"."Login: "."</b>";
    $logradouro="<b>"."Senha: "."</b>";  
    $space= " ";
	
    $btn=@_POST['rw'];
    $diaAtual = date ("d/m/Y");

    $idLogin=@$_POST['idLogin'];

	$con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
	
	$query = $con->query("SELECT codLogin, nome, login, senha FROM tblogin where inativo=1 and codLogin ='".$idLogin."'");
		
          while($reg = $query->fetch_array()) {
              $html.="<br/>";
             $html.=$nome.$space.$nomeHospital = $reg['nome']."<br/>";
                $html.=$cep.$space.$cepHospital = $reg['login']."<br/>";
                $html.=$logradouro.$space.$logradouroHospital = $reg['senha']."<br/>";
                $html.='<hr>';
          }
				//referenciar o DomPDF com namespace
				use Dompdf\Dompdf;

				// include autoloader
				require_once("dompdf/autoload.inc.php");
				
				//Criando a Instancia
				$dompdf = new DOMPDF();
				

				// Carrega seu HTML
				$dompdf->load_html('
                        <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/>
                        <img src="favicontcc.png" style="height:10%;width:10%;position:absolute;top:-2%;"></img>
                        <img src="pala.png" style="height:15%;width:15%;position:absolute;left:10%;top:0.5%;"></img>
                        <h3 style="text-align: right;">Relatório Individual - Administrador</h3>
                        <h6 style="text-align: right;">Data de emissão: '.$diaAtual.'</h6>
                        <div style="height:3%;width:100%;background-color:#7cb3d2;"></div>
                        <div style="margin-left: 7%;">
                        <p>'.$html.'</p>
                        </div>
                        
                ');

				//Renderizar o html
				$dompdf->render();

				//Exibibir a página
				$dompdf->stream(
					"relatoriogeral_medicos.pdf", 
					array(
						"Attachment" => false //Para realizar o download somente alterar para true
					)
				);
?>
