<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
            session_start();
            
            $kkj = $_SESSION['codhospital'];
            echo $kkj;
        ?>
        <h1>Ola, adm</h1>
        <h3>Voce acessou a pagina de produtos!</h3>
        <br>
        SELECT codUsuario,nomeUsuario,senhaUsuario from tbFuncionario where codHospital = $kkkj;
        <a href="indexAreaInterna.php"> Voltar </a>
        <br>
        <a href="logout.php">Sair</a>

    </body>
</html>
