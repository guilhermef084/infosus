<!DOCTYPE html>
<html dir="ltr" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../arquivos-js-css/assets/images/favicontcc.png">
    <title>Painel de Controle</title>
    
    <!-- CSS -->
    <link href="../../../arquivos-js-css/dist/css/style.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../../../arquivos-js-css/assets/libs/lib-custom/css/bootstrap.min.css"/>
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../../../arquivos-js-css/assets/libs/lib-custom/js/bootstrap.min.js"></scri

    <!-- PHP -->
    <?php include 'processosPHP/processoCadastrarHospital.php'; ?>
   
    <!-- PHP LOGIN -->
    <?php
        include_once("../../../configADM.php");
        protegePagina();
    ?>
    
    <!-- JS para pegar ENDEREÇO COMPLETO -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#logradouroHospital").val("");
                $("#bairroHospital").val("");
                $("#cidadeHospital").val("");
                $("#estadoHospital").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cepHospital").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#logradouroHospital").val("...");
                        $("#bairroHospital").val("...");
                        $("#cidadeHospital").val("...");
                        $("#estadoHospital").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#logradouroHospital").val(dados.logradouro);
                                $("#bairroHospital").val(dados.bairro);
                                $("#cidadeHospital").val(dados.localidade);
                                $("#estadoHospital").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
    <?php
    include_once ("../../../configADM.php");
    protegePagina();
    ?>


    <!--?php include_once("counts/processoContaMédico.php") 
    
    ?>
-->
</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- TIRA O SUBLINHADO -->
     <style type="text/css"> 
     a:link { 
        text-decoration:none; 
     } 
     </style>

    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">

        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <div class="navbar-brand">
                        <a href="home.php" class="logo">
                            <b class="logo-icon">
                                <img src="../../../arquivos-js-css/assets/images/iconcima.png" width="50px" height="50px" alt="homepage" class="light-logo" />
                            </b>
                            <span class="logo-text">
                                <img src="../../../arquivos-js-css/assets/images/pala.png" width="100px" height="25px" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-magnify font-20 mr-1"></i>
                                    <div class="ml-1 d-none d-sm-block">
                                        <span>Buscar</span>
                                    </div>
                                </div>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Buscar &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item">
                            <a class="nav-link text-muted waves-effect waves-dark pro-pic" data-toggle="modal" data-target=".modalLogout">
                                <img src="../../../arquivos-js-css/assets/images/iconlogout.png" class="rounded-circle" width="31">
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="home.php" aria-expanded="false">
                                <i class="mdi mdi-account-network"></i>
                                <span class="hide-menu">Home</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="hospital.php" aria-expanded="false">
                                <i class="mdi mdi-account-network"></i>
                                <span class="hide-menu">Hospitais</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="administrador.php" aria-expanded="false">
                                <i class="mdi mdi-account-network"></i>
                                <span class="hide-menu">Administradores</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- MODAL DE LOGOUT -->
        <div class="modal fade modalLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false" data-target=".modal-footer">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deseja realmente sair?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <form method="post">
                            <a href="../../../logout.php">
                                <button type="button" class="btn btn-success" data-toggle="modal" name="confirmarLogout">
                                    Sim
                                </button>
                            </a>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL DE LOGOUT -->
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Painel Administrativo</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Perfil</li>

                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid" onLoad="initTimer();">

                <?php     
        // Formato 24 horas (de 1 a 24)
            $hora = date('G');
            if (($hora >= 0) AND ($hora < 5)) {
            $mensagem = "Já é madrugada";
            } else if (($hora >= 5) AND ($hora < 6)) {
            $mensagem = "Já esta amanhecendo";
            } else if (($hora >= 6) AND ($hora < 11)) {
            $mensagem = "Bom dia";
            } else if (($hora >= 11) AND ($hora < 18)) {
            $mensagem = "Boa Tarde";
            } else  {
            $mensagem = "Boa noite";
            }
                include '../../../functions.php';

        ?>


                <script>
                    function showTimer() {
                        var time = new Date();
                        var hour = time.getHours();
                        var minute = time.getMinutes();
                        var second = time.getSeconds();
                        if (hour < 10) hour = "0" + hour;
                        if (minute < 10) minute = "0" + minute;
                        if (second < 10) second = "0" + second;
                        var st = hour + ":" + minute + ":" + second;
                        document.getElementById("timer").innerHTML = st;
                    }

                    function initTimer() {
                        setInterval(showTimer, 1000);
                    }

                </script>


                <div class="card" style="width: 40rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <h4 class="h4 mb-1 font-weight-normal">
                                <?php echo $mensagem ?>, seja bem vindo ao sistema INFOSUS.</h4>
                        </li>
                        <li class="list-group-item"><a title="Este sistema deve ser utilizado apenas pelos funcionários e administradores." href="?mes=<?php echo date('m') ?>&ano=<?php echo date('Y') ?>">Hoje:<strong>
                                    <?php echo date('d') ?> de
                                    <?php echo mostraMes(date('m')) ?> de
                                    <?php echo date('Y') ?><br /><span id="timer"></span></strong></a></li>
                    </ul>
                </div>
                <br />
                <br />



                <style>
                    .table-responsive {
                        width: 100%;
                        max-width: 100%;
                        margin-bottom: 1rem;
                        background-color: transparent;
                    }

                </style>


                <!--     <style>
                    .card-bodycad {
                    flex: 1 1 auto;
                    padding: 2.50rem;
                        height: 60%;
                    background-color: #73A3A1;
                  
                    }
                    
                </style> -->

                <?php include_once("processosPHP/processoHospitalHome.php");?>
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 align-self-left">
                                    <h5 class="page-subtitle">
                                        Todos Plantonistas Cadastrados:
                                        <!--?php 
                                            date_default_timezone_set('America/Sao_Paulo');
                                            echo $matricula = date ("d/m/Y");
                                        ?-->
                                    </h5>
                                </div>
                                <?php include_once ("processosPHP/processoPlantaoAtualH.php"); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="icon/svg/si-glyph-person.svg" class="figure-img img-fluid rounded" style="width:33px;heigth:33px;">
                                <h5 style="color:#7cb3d2;">Médicos cadastrados: <?php include_once("processosPHP/processoCount.php")?></h5>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <img src="icon/svg/si-glyph-person.svg" class="figure-img img-fluid rounded" style="width:33px;heigth:33px;">
                                <h5 style="color:#7cb3d2;">Usúarios cadastrados:  <?php include_once("processosPHP/processoCountUsuario.php")?></h5>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <img src="icon/svg/si-glyph-person.svg" class="figure-img img-fluid rounded" style="width:33px;heigth:33px;">
                                <h5 style="color:#7cb3d2;">Especialidades cadastradas: <?php include_once("processosPHP/processoCountEspe.php")?></h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        <script src="../../../arquivos-js-css/assets/libs/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="../../../arquivos-js-css/assets/libs/popper.js/dist/umd/popper.min.js"></script>
        <script src="../../../arquivos-js-css/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="../../../arquivos-js-css/assets/extra-libs/sparkline/sparkline.js"></script>
        <!--Wave Effects -->
        <script src="../../../arquivos-js-css/dist/js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="../../../arquivos-js-css/dist/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="../../../arquivos-js-css/dist/js/custom.min.js"></script>
    </div>
</body>

</html>
