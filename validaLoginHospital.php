<?php
// Inclui o arquivo com o sistema de segurança
require_once("config.php");
// Verifica se um formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Salva duas variáveis com o que foi digitado no formulário
  // Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
  $usuario = (isset($_POST['txtUsuario'])) ? $_POST['txtUsuario'] : '';
  $senha = (isset($_POST['txtSenha'])) ? $_POST['txtSenha'] : '';
  // Utiliza uma função criada no config.php pra validar os dados digitados
  if (validaUsuario($usuario, $senha) == true) {
    // O usuário e a senha digitados foram validados, manda pra página interna
	header("Location: dash_hospital/html/ltr/index.php?location=1");
  } else {
    // O usuário e/ou a senha são inválidos, manda de volta pro form de login
    // Para alterar o endereço da página de login, verifique o arquivo config.php
    expulsaVisitante();
  }
}