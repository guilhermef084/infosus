<?php
    require_once("../../../config.php");
    
    if(empty($_SESSION['log'])){
        $location=1;
        acessoNegado($location);
    }
?>
<!DOCTYPE html>
<html dir="ltr" lang="pt-br">

<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../../arquivos-js-css/assets/images/favicontcc.png">
    <title>Relatórios</title>
    
    <!-- Custom CSS -->
    <link href="../../../arquivos-js-css/dist/css/style.min.css" rel="stylesheet">
    <link href="../../../arquivos-js-css/dist/css/style-custom.css" rel="stylesheet">
    
    <link type="text/css" rel="stylesheet" href="../../../arquivos-js-css/assets/libs/lib-custom/css/bootstrap.min.css"/>
    
    <!-- icones -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    
    <!-- script -->
    <script src="../../../arquivos-js-css/assets/libs/lib-custom/js/js-custom/imagepreview.js"></script>
	<script src="../../../arquivos-js-css/assets/libs/lib-custom/js/bootstrap.min.js"></script>
    <script src="../../../arquivos-js-css/assets/libs/lib-custom/js/js-custom/mascara.min.js"></script>
    
    <?php $codHospitalLogado = $_SESSION['usuarioID']; ?>
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <div class="navbar-brand">
                        <a href="home.php" class="logo">
                            <!-- Logo icon -->
                            <b class="logo-icon">
                                <img src="../../../arquivos-js-css/assets/images/iconcima.png" width="50px" height="50px" alt="homepage" class="light-logo" />
                            </b>
                            <span class="logo-text">
                                <img src="../../../arquivos-js-css/assets/images/pala.png" width="100px" height="25px" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
                    <ul class="navbar-nav float-left mr-auto">
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
           <!-- TIRA O SUBLINHADO -->
           <style type="text/css"> 
            a:link 
            { 
            text-decoration:none; 
            } 
            </style>
            <?php require_once("processosPHP/components/menu.php"); ?>
        </aside>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Relatórios</h4>
                    </div>
					
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Relatórios</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- conteudo -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        Relatórios de Médicos
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <form method="post" action="processosPHP/relatorios/processoRelatorioGeralM.php" target="_blank">
                                    <button type="submit" class="btn btn-primary btn-sm form-control">
                                        Relatório Geral s/ periodo
                                    </button>
                                </form>
                            </div>                            
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-primary btn-sm form-control" data-toggle="modal" data-target="#rlt_e_medico">
                                    Relatório Específico
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fim conteudo -->
            <div id="modais">
                <?php require_once("processosPHP/createModals_r.php"); ?>
            </div>
            
        </div>
        <!-- modal logout -->
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
                                <button type="button" class="btn btn-success" data-toggle="modal"  name="confirmarLogout" > 
                                Sim
                                </button>
                                </a>    
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>  

                            </form>
                        </div>
                </div>
            </div>
        </div>
        <!-- modal logout -->
        <script type="text/javascript">
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                
                    if(panel.style.display === "block"){
                        panel.style.display = "none";
                    }else{
                        panel.style.display = "block";
                    }
                });
            }
        </script>
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
</body>

</html>