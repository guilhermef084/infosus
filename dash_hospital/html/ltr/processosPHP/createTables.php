<?php
    function createMedico($idMedico,$nomeMedico,$sobreNomeMedico,$crmMedico,$foto){
?>
    <tr align="left">
      <td>
        <?php
            if(file_exists("arquivos-upados/$foto")){
        ?>
            <img src="arquivos-upados/<?php echo $foto ?>" width="50px" height="50px"/>
        <?php
            }else{
        ?>
           <img src="arquivos-upados/fotoPadrao.png" width="50px" height="50px"/>
        <?php
            } 
        ?>
      </td>
      <th scope="row"><?php echo $idMedico; ?></th>
      <td><?php echo $nomeMedico." ".$sobreNomeMedico; ?></td>
      <td><?php echo $crmMedico; ?></td>
      <td>
      <form method="post" action="processosPHP/detalhes/detalhesMedico.php?location=2">
            <a class="excluir" title="<?php echo $idMedico; ?>" style="text-decoration:none;">
                <button type="button" data-toggle="modal" data-target="#modalConfirmation" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i>
                </button>
            </a>
            <input type="hidden" name="idMedico" value="<?php echo $idMedico; ?>"/>
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fas fa-eye"></i>
            </button>
        </form>
      </td>
    </tr>
<?php
    }
?>

<?php
    function createFuncionario($idFuncionario,$nomeFuncionario,$sobreNomeFuncionario,$tipoAcesso,$cpfFuncionario,$foto,$server,$user,$pass,$bd){
        $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
        $query = $con->query("SELECT descricaoTipo FROM tbTipoAcesso where codTipoAcesso=$tipoAcesso");
        while($reg = $query->fetch_array()) {
            $descricaoAcesso = $reg['descricaoTipo'];
        }
?>
    <tr align="left">
      <td>
        <?php
            if(file_exists("arquivos-upados/$foto")){
        ?>
            <img src="arquivos-upados/<?php echo $foto ?>" width="50px" height="50px"/>
        <?php
            }else{
        ?>
           <img src="arquivos-upados/fotoPadrao.png" width="50px" height="50px"/>
        <?php
            } 
        ?>
      </td>
      <th scope="row"><?php echo $idFuncionario; ?></th>
      <td><?php echo $nomeFuncionario." ".$sobreNomeFuncionario; ?></td>
      <td><?php echo $cpfFuncionario; ?></td>
      <td><?php echo $descricaoAcesso; ?></td>
      <td>
      <form method="post" action="processosPHP/detalhes/detalhesFuncionario.php?location=2">
            <a href="" class="excluir" title="<?php echo $idFuncionario; ?>" style="text-decoration:none;">
                <button type="button" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i>
                </button>
            </a>
            <input type="hidden" name="idFuncionario" value="<?php echo $idFuncionario; ?>"/>
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fas fa-eye"></i>
            </button>
        </form>
      </td>
    </tr>
<?php
    }
?>

<?php
    function createEspecialidade($idEspecialidade,$nomeEspecialidade){
?>
    <tr align="left">
      <th scope="row"><?php echo $idEspecialidade; ?></th>
      <td><?php echo $nomeEspecialidade ?></td>
      <td>
      <form method="post" action="processosPHP/detalhes/detalhesEspecialidade.php?location=2">
            <input type="hidden" name="idEspecialidade" value="<?php echo $idEspecialidade; ?>"/>
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fas fa-eye"></i>
                Detalhes
            </button>
            <a class="excluir" title="<?php echo $idEspecialidade; ?>" style="text-decoration:none;">
                <button type="button" data-toggle="modal" data-target="#modalConfirmation" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i>
                    Excluir
                </button>
            </a>
        </form>
      </td>
    </tr>
<?php
    }
?>

<?php
    function createPlantao($idMedico,$nomeMedico,$sobreNomeMedico,$server,$user,$pass,$bd){
        $space=" ";
        $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
        $query1 = $con->query("SELECT * FROM tbEspecialidade
                                inner join tbMedicoEspecialidade on tbEspecialidade.codEspecialidade = tbMedicoEspecialidade.codEspecialidade
                                where codMedico = $idMedico");
?>
    <tr align="right">
        <td>
            <a class="excluir" title="md_<?php echo $idMedico; ?>" style="text-decoration:none;">
                <input name='plantao[{<?php echo $idMedico; ?>}][codMedico]' class='md_<?php echo $idMedico; ?>' type='checkbox' value="<?php echo $idMedico; ?>"/>
            </a>
        </td>
        <td> 
            <label class='lblname_m'><?php echo $nomeMedico.$space.$sobreNomeMedico; ?></label>
        </td>

        <td>
            <select name='plantao[{<?php echo $idMedico; ?>}][nomeEspecialidade]' class='form-control md_<?php echo $idMedico; ?>' disabled>
                <option value='' class="form-control">Selecione uma especialidade...</option>
                    <?php
                        while($reg1 = $query1->fetch_array()) {
                            $valorEspecialidade = $reg1['nomeEspecialidade'];
                            $codEspecialidade = $reg1['codEspecialidade'];
                    ?>
                            <option value='<?php echo $valorEspecialidade; ?>' class="form-control">
                                    <?php echo $valorEspecialidade; ?>
                            </option>
                        <?php }//fechando while ?>
        </td>
        <td>
            <input type="text" class="form-control col-6 md_<?php echo $idMedico; ?>" name="plantao[{<?php echo $idMedico; ?>}][horaEntrada]" onkeypress="formatar(mascara,this)"  maxlength="5" disabled/>
        </td>
        <td>
            <input type='text' class='form-control col-6 md_<?php echo $idMedico; ?>' name='plantao[{<?php echo $idMedico; ?>}][horaSaida]'onkeypress='formatar(mascara,this)' maxlength='5' disabled/>
        </td>  
    </tr>
<?php
    }
?>

<?php
    function createPlantaoAtual($idMedico,$nomeMedico,$sobreNomeMedico,$nomeEspecialidade,$horaEntrada,$horaSaida){
        $space=" ";
?>
    <tr align="left">
      <th scope="row"><?php echo $idMedico; ?></th>
      <td><?php echo $nomeMedico.$space.$sobreNomeMedico; ?></td>
      <td><?php echo $nomeEspecialidade; ?> </td>
      <td><?php echo $horaEntrada; ?></td>
      <td><?php echo $horaSaida; ?> </td>
    </tr>
<?php
    }
?>
<?php
    function createMedicoInativos($idMedico,$nomeMedico,$sobreNomeMedico,$crmMedico,$foto){
?>
    <tr align="left">
      <td>
        <?php
            if(file_exists("arquivos-upados/$foto")){
        ?>
            <img src="arquivos-upados/<?php echo $foto ?>" width="50px" height="50px"/>
        <?php
            }else{
        ?>
           <img src="arquivos-upados/fotoPadrao.png" width="50px" height="50px"/>
        <?php
            } 
        ?>
      </td>
      <th scope="row"><?php echo $idMedico; ?></th>
      <td><?php echo $nomeMedico." ".$sobreNomeMedico; ?></td>
      <td><?php echo $crmMedico; ?></td>
      <td>
        <a class="excluir" title="<?php echo $idMedico; ?>" style="text-decoration:none;">
            <button type="button" data-toggle="modal" data-target="#modalConfirmation" class="btn btn-success btn-sm">
                <i class="fas fa-eye"></i>
                Ativar
            </button>
        </a>
      </td>
    </tr>
<?php
    }
?>

<?php
    function createFuncionarioInativos($idFuncionario,$nomeFuncionario,$sobreNomeFuncionario,$tipoAcesso,$cpfFuncionario,$foto,$server,$user,$pass,$bd){
        $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
        $query = $con->query("SELECT descricaoTipo FROM tbTipoAcesso where codTipoAcesso=$tipoAcesso");
        while($reg = $query->fetch_array()) {
            $descricaoAcesso = $reg['descricaoTipo'];
        }
?>
    <tr align="left">
      <td>
        <?php
            if(file_exists("arquivos-upados/$foto")){
        ?>
            <img src="arquivos-upados/<?php echo $foto ?>" width="50px" height="50px"/>
        <?php
            }else{
        ?>
           <img src="arquivos-upados/fotoPadrao.png" width="50px" height="50px"/>
        <?php
            } 
        ?>
      </td>
      <th scope="row"><?php echo $idFuncionario; ?></th>
      <td><?php echo $nomeFuncionario." ".$sobreNomeFuncionario; ?></td>
      <td><?php echo $cpfFuncionario; ?></td>
      <td><?php echo $descricaoAcesso; ?></td>
      <td>
        <a class="excluir" title="<?php echo $idFuncionario; ?>" style="text-decoration:none;">
            <button type="button" class="btn btn-success btn-sm">
                <i class="fas fa-eye"></i>
                Ativar
            </button>
        </a>
      </td>
    </tr>
<?php
    }
?>

<?php
    function createEspecialidadeInativas($idEspecialidade,$nomeEspecialidade){
?>
    <tr align="left">
      <th scope="row"><?php echo $idEspecialidade; ?></th>
      <td><?php echo $nomeEspecialidade ?></td>
      <td>
        <a class="excluir" title="<?php echo $idEspecialidade; ?>" style="text-decoration:none;">
            <button type="button" data-toggle="modal" data-target="#modalConfirmation" class="btn btn-success btn-sm">
                <i class="fas fa-eye"></i>
                Ativar
            </button>
        </a>
      </td>
    </tr>
<?php
    }
?>
