<?php	
    
    include 'conexao.php';


	$html = "";
	$space = " ";
    $nome="<b>"."Nome Médico: "."</b>";
    $cep="<b>"."Especialidade: "."</b>";
    $logradouro="<b>"."Entrada: "."</b>";  
    $entrada="<b>"."Saída: "."</b>";  
    $data="<b>"."Data: "."</b>";  
    $space= " ";
	
    $btn=@_POST['rw'];
    $diaAtual = date ("d/m/Y");

    $idHospital=@$_POST['idHospital2'];

	$con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
	
	$query = $con->query("SELECT Plant.codPlantao, Plant.nomeEspecialidade, Plant.codHospital, Plant.horaInicio, Plant.horaFim, Plant.data, Med.nomeMedico, Hosp.nomeHospital from tbPlantao as Plant 
    inner join tbMedico as Med on Plant.codMedico=Med.codMedico 
        inner join tbHospital as Hosp on Plant.codHospital=Hosp.codHospital where Hosp.codHospital = '".$idHospital."'");

        
          while($reg = $query->fetch_array()) {
              $html.="<br/>";
              $nomeHospital = $reg['nomeHospital'];
             $html.=$nome.$space.$nomeMedico = $reg['nomeMedico']."<br/>";
                $html.=$cep.$space.$nomeEspecialidade = $reg['nomeEspecialidade']."<br/>";
                $html.=$logradouro.$space.$horaInicio = $reg['horaInicio']."<br/>";
                $html.=$entrada.$space.$horaFim = $reg['horaFim']."<br/>";
                $html.=$data.$space.$dataPlantao = $reg['data']."<br/>";
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
                        <h3 style="text-align: right;">Plantonistas Cadastrados</h3>
                        <h6 style="text-align: right;">Data de emissão: '.$diaAtual.'</h6>
                        <h4 style="text-align: center;">'.$nomeHospital.'</h4>
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
