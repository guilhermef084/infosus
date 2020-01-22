<?php 
    require_once('crud/conexao.php');
    require_once('createTables.php');

    $status=0;
    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
    $query = $con->query("SELECT * from tbFuncionario where codHospital=$codHospitalLogado and inativo=$status");

    $total_rows = mysqli_num_rows($query);
?>
<div class="row">
  <?php 
      //se nao encontrar nenhum registro
      if($total_rows == 0){
  ?>
    <div class="col-sm-12 pt-5 pl-5 pr-5 pb-5" align="center">
        <img src="../../assets/images/searching.svg" alt="" width="170px">
        <h3>Nenhum registro inativo encontrado.</h3>
    </div>
  <?php 
    }else{
  ?>
  <div class="col-sm-12">
    <div class="table-responsive-sm">
      <table id="tabela_dados" class="table table-striped border border-dark table-hover">
        <thead class="thead-dark">
          <tr align="left">
            <th scope="col">#</th>
            <th scope="col">Código do Funcionário</th>
            <th scope="col">Nome do Funcionário</th>
            <th scope="col">CPF</th>
            <th scope="col">Nível de Acesso</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
        <?php while($reg=$query->fetch_array()){ ?>
          <div class="col-sm-4 mb-2 conts">
            <?php createFuncionarioInativos($reg['codFuncionario'],$reg['nomeFuncionario'],$reg['sobreNomeFuncionario'],$reg['codTipoAcesso'],$reg['cpfFuncionario'],$reg['fotoFuncionario'],$server,$user,$pass,$bd);?>
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
<script>
    
</script>