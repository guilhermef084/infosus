<?php
    
    require_once("crud/conexao.php");
    
    require_once("../../../config.php");
    protegePagina();
    $codHospitalLogado=$_SESSION['usuarioID']; 

    $con = new mysqli($server, $user, $pass, $bd) or die (mysql_error());
    $query = $con->query("SELECT codTipoAcesso, descricaoTipo FROM tbTipoAcesso");
    
	while($reg = $query->fetch_array()) {
        $codTipoAcesso = $reg['codTipoAcesso'];
        $descricaoTipo = $reg['descricaoTipo'];
        
            echo "<option value='$codTipoAcesso'>$descricaoTipo</option>";   
    }   
?>