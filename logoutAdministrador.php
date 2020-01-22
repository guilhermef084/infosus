<?php
include("configADM.php");
protegePagina();
$row=mysqli_fetch_array($qr);
@session_start();
session_destroy(); // Destrói a sessão limpando todos os valores salvos
session_unset(); // Limpa as variavéis globais da seção

mysqli_close($_SG['conexao']);

header( 'Location:index.php' ) ;
?>