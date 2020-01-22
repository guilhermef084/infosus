<?php

    date_default_timezone_set('America/Sao_Paulo');

    include 'conexao.php';
    
    $idMedico=@$_POST['idMedico'];
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

    $diaAtual = date ("d/m/Y");

    $html = "";
    $plantao = "";
	$space = " ";
    $nome="<b>"."Nome:"."</b>";
    $cpf="<b>"."CPF:"."</b>";
    $crm="<b>"."CRM:"."</b>";
	$especialidades="<b>Especialidades:</b>";

    $nomePDF="";

	$con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
    $query = $con->query("SELECT codMedico, nomeMedico, sobreNomeMedico, cpfMedico, crmMedico, fotoMedico, inativo FROM tbMedico where inativo=1 and codMedico='$idMedico'");

     if(isset($_POST['relatorioInd'])){
         while($reg = $query->fetch_array()) {
                 $html.=$nome.$space.$nomeMedico=$reg['nomeMedico'].$space.$sobreNomeMedico=$reg['sobreNomeMedico']."<br/>";
                  $html.=$cpf.$space.$cpfMedico=$reg['cpfMedico']."<br/>";
                  $html.=$crm.$space.$crmMedico=$reg['crmMedico']."<br/><br/>";
                  $html.="<u>".$especialidades."</u>";
               
             
                echo  "<hr/><br/>";
        }
         //CONSULTA QUE TRAS AS ESPECIALIDADES DESSE MEDICO
         $query1 = $con->query("SELECT * FROM tbEspecialidade
                                inner join tbMedicoEspecialidade on tbEspecialidade.codEspecialidade = tbMedicoEspecialidade.codEspecialidade 
                                where codMedico='$idMedico'");
             
        while($reg1 = $query1->fetch_array()) {
            
           $html.="<br>".$valorEspecialidade = $reg1['nomeEspecialidade'];
                  
        } 
        
        //CONSULTA QUE TRAS OS PLANTOES FEITOS POR ESSE MEDICO
        $query2 = $con->query("SELECT codMedico, nomeEspecialidade, horaInicio, horaFim, data  FROM tbPlantao where data BETWEEN '$novaDataInicio' and '$novaDataFim' and codMedico='$idMedico'");
         
           $html.="<h4 style='text-align: left;'>Plantonistas no período do dia: $novaDataInicio ao dia: $novaDataFim</h4>";        
            $plantao.='<table">';
                 $plantao.='<thead>';
                     $plantao.='<tr class="table table-bordered table-primary">';
                       $plantao.='<th>Data do Plantão</th>';
                       $plantao.='<th>Especialidade(Dia)</th>';
                       $plantao.='<th>Hora de Entrada</th>';
                       $plantao.='<th>Hora de Saida</th>';
                      $plantao.='</tr>';
                  $plantao.='</thead>';
                 
                 while($reg2=$query2->fetch_array()){
                          $plantao.='<tbody>';
                             $plantao.='<tr>';
                               $plantao.='<td class="table-secondary table-bordered">'.$reg2['data'].'</td>';
                               $plantao.='<td class="table-secondary table-bordered">'.$reg2['nomeEspecialidade'].'</td>';
                               $plantao.='<td class="table-secondary table-bordered">'.$reg2['horaInicio'].'</td>';
                               $plantao.='<td class="table-secondary table-bordered">'.$reg2['horaFim'].'</td>';
                             $plantao.='</tr>';
                           $plantao.='</tbody>';
                    }
                  $plantao.='</table>';
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
             <img src="favicontcc.png" style="height:10%;width:10%;position:absolute;top:-2%"></img>
             <img src="pala.png" style="height:15%;width:15%;position:absolute;left:10%;top:0.5%;"></img>
             <h3 style="text-align: right;">Relatório Individual - Médico</h3>
             <h6 style="text-align: right;">Data de emissão: '.$diaAtual.'</h6>
             <div style="height:3%;width:100%;background-color:#7cb3d2;"></div>
             <br/>
             <p>'.$html.'</p>
             <h4 style="text-align: left;"Plantões</h4>
             <p style="align: center;">'.$plantao.'</p>
        ');

    //Renderizar o html
    $dompdf->render();

    //Exibibir a página
    $dompdf->stream(
        "relatorioindividual_medicos.pdf", 
         array(
            "Attachment" => false //Para realizar o download somente alterar para true
         )
    );

?>