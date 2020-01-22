<?php	
    date_default_timezone_set('America/Sao_Paulo');

    require_once("../crud/conexao.php");

    require 'vendor/autoload.php';
    require_once 'dompdf/autoload.inc.php';

    $diaAtual = date ("d/m/Y");
  
    $html = "";
    $plantao="";
	$space = " ";
    $nome="<b>"."Nome:"."</b>";
    $cpf="<b>"."CPF:"."</b>";
    $crm="<b>"."CRM:"."</b>";    
    $especialidades="<b>Especialidades:</b>";
    
    $codHospital = @$_POST['codHospitalLogado'];

	$con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
	$query = $con->query("SELECT codMedico, nomeMedico, sobreNomeMedico, cpfMedico, crmMedico, fotoMedico, inativo FROM tbMedico where inativo=1 and codHospital=1");
    $total = mysqli_num_rows($query);

          while($reg = $query->fetch_array()) {
              $idMedico=$reg['codMedico'];
              
              $html.=$nome.$space.$nomeMedico=$reg['nomeMedico'].$space.$sobreNomeMedico=$reg['sobreNomeMedico']."<br/>";
              $html.=$cpf.$space.$cpfMedico=$reg['cpfMedico']."<br/>";
              $html.=$crm.$space.$crmMedico=$reg['crmMedico']."<br/><br/>";
              $html.="<u>".$especialidades."</u>";       
              
              $query1 = $con->query("SELECT * FROM tbEspecialidade
                                      inner join tbMedicoEspecialidade on tbEspecialidade.codEspecialidade = tbMedicoEspecialidade.codEspecialidade 
                                        where codMedico='$idMedico'");
                while($reg1 = $query1->fetch_array()) {
                
                 $html.="<br>".$valorEspecialidade = $reg1['nomeEspecialidade'];
                  
                 } 
               //CONSULTA QUE TRAS OS PLANTOES FEITOS POR ESSE MEDICO
                $query2 = $con->query("SELECT codMedico, nomeEspecialidade, horaInicio, horaFim, data  FROM tbPlantao where codMedico='$idMedico'");
                    
                    $html.="<h2 style='text-align: left;'>Últimos plantões</h2>";
                    $html.='<table border="1" style="text-align: center;">';
                        $html.='<thead>';
                            $html.='<tr>';
                              $html.='<th>Data do Plantão</th>';
                              $html.='<th>Especialidade(Dia)</th>';
                              $html.='<th>Hora de Entrada</th>';
                              $html.='<th>Hora de Saida</th>';
                             $html.='</tr>';
                         $html.='</thead>';
              
                        while($reg2=$query2->fetch_array()){
                             $html.='<tbody>';
                                $html.='<tr>';
                                  $html.='<td>'.$reg2['data'].'</td>';
                                  $html.='<td>'.$reg2['nomeEspecialidade'].'</td>';
                                  $html.='<td>'.$reg2['horaInicio'].'</td>';
                                  $html.='<td>'.$reg2['horaFim'].'</td>';
                                $html.='</tr>';
                              $html.='</tbody>';
                        }
                $html.='</table>';
                $html.="<br/>";
              $html.="<hr/><br/>";
          }
       
   // reference the Dompdf namespace
   use Dompdf\Dompdf;

   // instantiate and use the dompdf class
   $dompdf = new Dompdf();

   
   
   if($total >0){
        $dompdf->loadHtml('
            <title>Relatório Geral - Médicos</title>
            <link rel="stylesheet" type="text/css" media="screen" href="../../../../../arquivos-js-css/assets/libs/lib-custom/css/bootstrap.min.css"/>
            <link rel="stylesheet" type="text/css" href="../../../../../arquivos-js-css/dist/css/style-custom.css"/>
               
            <div id="head">
                Começo
            </div>

            <div id="body">
               '.$html.'
            </div>

            <div id="footer">
                fim
            </div>
        ');
}
   /*if($total==0){
       $dompdf->loadHtml('
           <title>Relatório Geral - Usuários</title>
           <link rel="stylesheet" type="text/css" media="screen" href="../../../../../arquivos-js-css/assets/libs/lib-custom/css/bootstrap.min.css"/>        
           <link rel="stylesheet" type="text/css" href="../../../../../arquivos-js-css/dist/css/style-custom.css"/>
           <p class="teste">haaa</p>
           
           <div id="head">
               Começo
           </div>

           <div id="body">
               CORPO
           </div>

           <div id="footer">
               FIM
           </div>
     ');
   }*/

   // Render the HTML as PDF
   $dompdf->render();

   $dompdf->stream("relatorio_geral_medicos.pdf", array("Attachment" => false));
?>