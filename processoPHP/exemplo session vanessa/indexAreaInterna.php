<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
            //include ("verificacaoUsuarioLogado.php");
            include_once ("verificacaoUsuarioLogado.php");
        
            $codhospital = $_SESSION['codhospital'];
        echo($codhospital);
        
        ?>
        <h1>Ola, adm</h1>
        <h3>Voce acessou a area interna do site!</h3>
        <br>
        <a href="produtos.php"> Veja os produtos da loja </a>
        <br>
        <a href="logout.php">Sair</a>

    </body>
</html>
