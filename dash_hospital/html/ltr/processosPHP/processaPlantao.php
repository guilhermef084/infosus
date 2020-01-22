<?php
    require_once("crud/conexao.php");
    require_once('createTables.php');

    $codHospitalLogado = $_SESSION['usuarioID'];
    $status=1;

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
    $query = $con->query("SELECT codMedico, nomeMedico, sobreNomeMedico FROM tbMedico where inativo=$status and codHospital='$codHospitalLogado'");
    $total_rows = mysqli_num_rows($query);
?>
<div class="row">
  <?php 
      //se nao encontrar nenhum registro
      if($total_rows == 0){
  ?>
    <div class="col-sm-12 pt-5 pl-5 pr-5 pb-5" align="center">
        <img src="icon/searching.svg" alt="" width="170px">
        <h3>Nenhum registro encontrado, cadastre.</h3>
    </div>
  <?php 
    }else{
  ?>
  <div class="col-sm-12">
    <div class="table-responsive-sm">
      <table id="tabela_dados" class="table table-striped border border-dark">
        <thead class="thead-dark">
          <tr align="right">
            <th scope='col'>#</th>
            <th scope='col'>Nome médico</th>
            <th scope='col'>Especialidades</th>
            <th scope='col'>Horário de Entrada</th>
            <th scope='col'>Horário de Saida</th>            
          </tr>
        </thead>
        <tbody>
        <?php while($reg=$query->fetch_array()){ ?>
          <div class="col-sm-4 mb-2 conts">
            <?php createPlantao($reg['codMedico'],$reg['nomeMedico'],$reg['sobreNomeMedico'],$server,$user,$pass,$bd);?>
          </div>
        <?php 
            }
          } 
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- FORMATAÇÃO DE HORA -->
<script>
    var mascara = "##:##";
    function formatar(mascara, documento){
    var i = documento.value.length;
    var saida = mascara.substring(0,1);
    var texto = mascara.substring(i)
        if (texto.substring(0,1) != saida){
                documento.value += texto.substring(0,1);
        }
    }
</script>