<?php	
    
    include 'conexao.php';


	$html = "";
	$space = " ";
    $nome="<b>"."Nome Hospital: "."</b>";
    $cep="<b>"."CEP: "."</b>";
    $logradouro="<b>"."Logradouro: "."</b>";  
    $numero="<b>"."Número: "."</b>";  
    $complemento="<b>"."Complemento: "."</b>";
    $bairro="<b>"."Bairro: "."</b>";
    $cidade="<b>"."Cidade: "."</b>"; 
    $estado="<b>"."Estado: "."</b>";
    $login="<b>"."Login: "."</b>"; 
    $senha="<b>"."Senha: "."</b>"; 
    $nomeE="<b>"."Nome Especialidade: "."</b>";
    $nomeM="<b>"."Nome Medico: "."</b>";
    $inicio="<b>"."Inicio: "."</b>";
    $fim="<b>"."Fim: "."</b>";
    $space= " ";

    $diaAtual = date ("d/m/Y");
    $btn=@_POST['rw'];

	$con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
	
	$query = $con->query("SELECT codHospital, nomeHospital, cepHospital, logradouroHospital, numeroHospital, compHospital, bairroHospital, cidadeHospital, estadoHospital, loginHospital, senhaHospital FROM tbhospital where inativo=1");

    $query1 = $con->query("SELECT Plant.codPlantao, Plant.nomeEspecialidade, Plant.codHospital, Plant.horaInicio, Plant.horaFim, Plant.data, Med.nomeMedico, Hosp.nomeHospital from tbPlantao as Plant 
            inner join tbMedico as Med on Plant.codMedico=Med.codMedico 
                inner join tbHospital as Hosp on Plant.codHospital=Hosp.codHospital");
		
          while($reg = $query->fetch_array()) {
              $html."<br/>";
              $html."<br/>";
              $html."<br/>";
             $html.=$nome.$space.$nomeHospital = $reg['nomeHospital']."<br/>";
                $html.=$cep.$space.$cepHospital = $reg['cepHospital']."<br/>";
                $html.=$logradouro.$space.$logradouroHospital = $reg['logradouroHospital']."<br/>";
                $html.=$numero.$space.$numHospital = $reg['numeroHospital']."<br/>";
                $html.=$complemento.$space.$compHospital = $reg['compHospital']."<br/>";
                $html.=$bairro.$space.$bairroHospital = $reg['bairroHospital']."<br/>";
                $html.=$cidade.$space.$cidadeHospital = $reg['cidadeHospital']."<br/>";
                $html.=$estado.$space.$estadoHospital = $reg['estadoHospital']."<br/>";
                $html.=$login.$space.$loginHospital = $reg['loginHospital']."<br/>";
                $html.=$senha.$space.$senhaHospital = $reg['senhaHospital']."<br/>";
                $html.='<hr>';
          }
            $html.="<h2 style='margin-left: 33%; text-transform: uppercase;'>Plantões</h2>";
                $html.='<table">';
                    $html.='<thead>';
                        $html.='<tr class="table table-bordered table-primary">';
                            $html.='<th>Especialidade</th>';
                            $html.='<th>Nome do Médico</th>';
                            $html.='<th>Hora de Entrada</th>';
                            $html.='<th>Hora de Saida</th>';
                            $html.='<th>Data</th>';
                            $html.='<th>Hospital</th>';
                            $html.='</tr>';
                    $html.='</thead>';

            while($reg = $query1->fetch_array()) {
                    $html.='<tbody>';
                        $html.='<tr>';
                            $html.='<td class="table-secondary table-bordered">'.$reg['nomeEspecialidade'].'</td>';
                            $html.='<td class="table-secondary table-bordered">'.$reg['nomeMedico'].'</td>';
                            $html.='<td class="table-secondary table-bordered">'.$reg['horaInicio'].'</td>';
                            $html.='<td class="table-secondary table-bordered">'.$reg['horaFim'].'</td>';
                            $html.='<td class="table-secondary table-bordered">'.$reg['data'].'</td>';
                            $html.='<td class="table-secondary table-bordered">'.$reg['nomeHospital'].'</td>';
                
                        $html.='</tr>';
                    $html.='</tbody>';
                        }
                $html.='</table>';
                $html.="<br/>";
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
                        <h3 style="text-align: right;">Relatório Geral - Hospital</h3>
                        <h6 style="text-align: right;">Data de emissão: '.$diaAtual.'</h6>
                        <div style="height:3%;width:100%;background-color:#7cb3d2;"></div>
                        <div style="margin-left: 7%;">
                        <p>'.$html.'</p>
                        </div>
                        <hr/>
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
