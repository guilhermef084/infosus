<?php	
    
    date_default_timezone_set('America/Sao_Paulo');

    include 'conexao.php';
    include_once ("../../../../config.php");
     
    $codHospitalLogado = $_SESSION['usuarioID'];
    
    $space=" ";
    $html="";

    $diaAtual = date ("d/m/Y");

    $dataInicio = @$_POST['dataInicio'];
    $dataFim = @$_POST['dataFim'];
    $especialidade = @$_POST['especialidade'];

    /* MUDANDO $dataInicio */
    $exploded = explode("-", $dataInicio);
    $exploded = array_reverse($exploded);
    $novaDataInicio = implode("/", $exploded);

    /* MUDANDO $dataFim */
    $exploded1 = explode("-", $dataFim);
    $exploded1 = array_reverse($exploded1);
    $novaDataFim = implode("/", $exploded1);
	
	$con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());

    //referenciar o DomPDF com namespace
    use Dompdf\Dompdf;

    // include autoloader
    require_once("dompdf/autoload.inc.php");
				
    //Criando a Instancia
    $dompdf = new DOMPDF();        
    
if(empty($dataInicio) and empty($dataFim)){
    //CONSULTA QUE TRAS OS PLANTOES FEITOS POR ESSE MEDICO
    $query = $con->query("SELECT nomeMedico,sobreNomeMedico,nomeEspecialidade, horaInicio, horaFim, data
                            FROM tbplantao
                            inner JOIN tbmedico
                            on tbplantao.codMedico = tbmedico.codMedico
                            where tbplantao.codHospital='$codHospitalLogado'
                            ORDER BY data");
                    
    $html.="<h4>Plantonistas</h4>";
        $html.='<table">';
            $html.='<thead>';
                $html.='<tr class="table table-bordered table-primary">';
                    $html.='<th>Médico Plantonista</th>';
                    $html.='<th>Data do Plantão</th>';
                    $html.='<th>Especialidade(Dia)</th>';
                    $html.='<th>Hora de Entrada</th>';
                    $html.='<th>Hora de Saida</th>';
                    $html.='</tr>';
            $html.='</thead>';
              
            while($reg=$query->fetch_array()){
                    $html.='<tbody>';
                        $html.='<tr>';
                            $html.='<td class="table-secondary table-bordered">'.$reg['nomeMedico'].$space.$reg['sobreNomeMedico'].'</td>';
                            $html.='<td class="table-secondary table-bordered">'.$reg['data'].'</td>';
                            $html.='<td class="table-secondary table-bordered">'.$reg['nomeEspecialidade'].'</td>';
                            $html.='<td class="table-secondary table-bordered">'.$reg['horaInicio'].'</td>';
                            $html.='<td class="table-secondary table-bordered">'.$reg['horaFim'].'</td>';
                        $html.='</tr>';
                    $html.='</tbody>';
                        }
                $html.='</table>';
                $html.="<br/>";
       
    // Carrega seu HTML
    $dompdf->load_html('
            <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/>
            <img src="favicontcc.png" style="height:10%;width:10%;position:absolute;top:-2%;"></img>
            <img src="pala.png" style="height:15%;width:15%;position:absolute;left:10%;top:0.5%;"></img>
            <h3 style="text-align: right;">Relatório - Plantão</h3>
            <h6 style="text-align: right;">Data de emissão: '.$diaAtual.'</h6>
            <div style="height:3%;width:100%;background-color:#7cb3d2;"></div>
            <br/>
            <div>
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
}else{
    //CONSULTA QUE TRAS OS PLANTOES FEITOS POR ESSE MEDICO
    $query2 = $con->query("SELECT nomeMedico,sobreNomeMedico,nomeEspecialidade, horaInicio, horaFim, data
                            FROM tbplantao
                            inner JOIN tbmedico
                            on tbplantao.codMedico = tbmedico.codMedico
                            WHERE data BETWEEN '$novaDataInicio' and '$novaDataFim' and tbplantao.codHospital='$codHospitalLogado' and nomeEspecialidade='$especialidade'
                            ORDER BY data");
                    
    $html.="<h4 style='text-align: left;'>Plantonistas no período do dia: $novaDataInicio ao dia: $novaDataFim <br/>
    com a especialidade: $especialidade</h4>";
        $html.='<table">';
            $html.='<thead>';
                $html.='<tr class="table table-bordered table-primary">';
                    $html.='<th>Médico Plantonista</th>';
                    $html.='<th>Data do Plantão</th>';
                    $html.='<th>Especialidade(Dia)</th>';
                    $html.='<th>Hora de Entrada</th>';
                    $html.='<th>Hora de Saida</th>';
                    $html.='</tr>';
            $html.='</thead>';
              
            while($reg=$query2->fetch_array()){
                    $html.='<tbody>';
                        $html.='<tr>';
                            $html.='<td class="table-secondary table-bordered">'.$reg['nomeMedico'].$space.$reg['sobreNomeMedico'].'</td>';
                            $html.='<td class="table-secondary table-bordered">'.$reg['data'].'</td>';
                            $html.='<td class="table-secondary table-bordered">'.$reg['nomeEspecialidade'].'</td>';
                            $html.='<td class="table-secondary table-bordered">'.$reg['horaInicio'].'</td>';
                            $html.='<td class="table-secondary table-bordered">'.$reg['horaFim'].'</td>';
                        $html.='</tr>';
                    $html.='</tbody>';
                        }
                $html.='</table>';
                $html.="<br/>";
       
    
    
    // Carrega seu HTML
    $dompdf->load_html('
            <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/>
            <img src="favicontcc.png" style="height:10%;width:10%;position:absolute;top:-2%;"></img>
            <img src="pala.png" style="height:15%;width:15%;position:absolute;left:10%;top:0.5%;"></img>
            <h3 style="text-align: right;">Relatório - Plantão</h3>
            <h6 style="text-align: right;">Data de emissão: '.$diaAtual.'</h6>
            <div style="height:3%;width:100%;background-color:#7cb3d2;"></div>
            <br/>
            <div>
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
}   
?>