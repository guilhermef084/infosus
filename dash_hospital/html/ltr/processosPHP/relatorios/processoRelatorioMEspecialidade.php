<?php

    date_default_timezone_set('America/Sao_Paulo');

    include 'conexao.php';
    include_once ("../../../../config.php");
    protegePagina();    
   

    $plantao="";
    $html = "";
	$space = " ";
    $nome="<b>"."Nome:"."</b>";
    $cpf="<b>"."CPF:"."</b>";
    $crm="<b>"."CRM:"."</b>";    
	$especialidades="<b>Especialidades:</b>";
    
    $diaAtual = date ("d/m/Y");

    //Variavel Post
    $especialidadeSelect=@$_POST['selectE2'];
    $dataInicio=@$_POST['dataInicio'];
    $dataFim=@$_POST['dataFim'];
    
     /* MUDANDO $dataInicio */
    $exploded = explode("-", $dataInicio);
    $exploded = array_reverse($exploded);
    $novaDataInicio = implode("/", $exploded);

    /* MUDANDO $dataFim */
    $exploded1 = explode("-", $dataFim);
    $exploded1 = array_reverse($exploded1);
    $novaDataFim = implode("/", $exploded1);

    $codHospitalLogado=$_SESSION['usuarioID']; 

    //Junta a variavel
    $especialidadeSelect2 = implode("','", $especialidadeSelect);
    
    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());

    //referenciar o DomPDF com namespace
    use Dompdf\Dompdf;

    // include autoloader
    require_once("dompdf/autoload.inc.php");
				
    //Criando a Instancia
    $dompdf = new DOMPDF();

	$queryMedico = $con->query("SELECT codMedico, nomeMedico, sobreNomeMedico, cpfMedico, crmMedico, fotoMedico, inativo FROM tbMedico where inativo=1 and codHospital='$codHospitalLogado'");

          while($regMedico = $queryMedico->fetch_array()) {
              $idMedico=$regMedico['codMedico'];
              $html.=$nome.$space.$nomeMedico=$regMedico['nomeMedico'].$space.$sobreNomeMedico=$regMedico['sobreNomeMedico']."<br/>";
              $html.=$cpf.$space.$cpfMedico=$regMedico['cpfMedico']."<br/>";
              $html.=$crm.$space.$crmMedico=$regMedico['crmMedico']."<br/><br/>";
              $html.="<u>".$especialidades."</u>";       
              
              $queryMedicoEsp = $con->query("SELECT * FROM tbEspecialidade
                                      inner join tbMedicoEspecialidade on tbEspecialidade.codEspecialidade = tbMedicoEspecialidade.codEspecialidade 
                                        where codMedico='$idMedico'");
              
                while($regMedicoEsp = $queryMedicoEsp->fetch_array()) {
                
                 $html.="<br>".$valorEspecialidade = $regMedicoEsp['nomeEspecialidade'];
                }
              
              
               $query = $con->query("SELECT codMedico, nomeEspecialidade, horaInicio, horaFim, data  FROM tbPlantao 
                            WHERE 
                            data BETWEEN '$novaDataInicio' and '$novaDataFim' 
                            and nomeEspecialidade IN ('$especialidadeSelect2')
                            and codHospital='$codHospitalLogado'
                            and codMedico='$idMedico'
                            order by data");
                
                    //MONTA A TABELA
                   $html.="<h4 style='text-align: left;'>Plantões</h4>";
                        $html.='<table">';
                            $html.='<thead>';
                                $html.='<tr class="table table-bordered table-primary">';
                                  $html.='<th>Data do Plantão</th>';
                                  $html.='<th>Especialidade(Dia)</th>';
                                  $html.='<th>Hora de Entrada</th>';
                                  $html.='<th>Hora de Saida</th>';
                                 $html.='</tr>';
                             $html.='</thead>';

                            while($reg2=$query->fetch_array()){
                                 $html.='<tbody>';
                                    $html.='<tr>';
                                      $html.='<td class="table-secondary table-bordered">'.$reg2['data'].'</td>';
                                      $html.='<td class="table-secondary table-bordered">'.$reg2['nomeEspecialidade'].'</td>';
                                      $html.='<td class="table-secondary table-bordered">'.$reg2['horaInicio'].'</td>';
                                      $html.='<td class="table-secondary table-bordered">'.$reg2['horaFim'].'</td>';
                                    $html.='</tr>';
                                  $html.='</tbody>';
                            }
                    $html.='</table>';
                    $html.="<br/>";
                  $html.="<hr/>";
          }
    
    // Carrega seu HTML
    $dompdf->load_html('
            <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/>
            <img src="favicontcc.png" style="height:10%;width:10%;position:absolute;top:-2%;"></img>
            <img src="pala.png" style="height:15%;width:15%;position:absolute;left:10%;top:0.5%;"></img>
            <h3 style="text-align: right;">Relatório Geral - Médicos</h3>
            <h6 style="text-align: right;">Data de emissão: '.$diaAtual.'</h6>
            <div style="height:3%;width:100%;background-color:#7cb3d2;"></div>
            <br/>
            <h3><b>Médicos</b></h3>
            <hr></hr>
            <p>'.$html.'</p>
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