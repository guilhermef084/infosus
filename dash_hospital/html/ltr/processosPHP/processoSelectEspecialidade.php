<?php
    require_once("crud/conexao.php");

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
    $query = $con->query("SELECT codEspecialidade, nomeEspecialidade FROM tbEspecialidade");
    
	while($reg = $query->fetch_array()) {
        $codEspecialidade = $reg['codEspecialidade'];
        $nomeEspecialidade = $reg['nomeEspecialidade'];
?>
    <select name="select_01">
        <option value='<?php echo $codEspecialidade ?>'>$nomeEspecialidade</option> 
    </select>
<?php
    }   
?>