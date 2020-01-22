<?php
include("config.php");
protegePagina();
$codHospitalLogado=$_SESSION['usuarioID'];

$qr=mysqli_query($_SG['conexao'], "SELECT * FROM tbhospital where codHospital='$codHospitalLogado'");
$row=mysqli_fetch_array($qr);

@session_start();
session_destroy(); // Destrói a sessão limpando todos os valores salvos
session_unset(); // Limpa as variavéis globais da seção
mysqli_close($_SG['conexao']);
header( 'Location: index2.php' );
?>