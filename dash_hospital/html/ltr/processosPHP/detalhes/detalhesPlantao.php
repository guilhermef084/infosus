<?php 
    require_once("../../../../../config.php");
    
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
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../../../assets/images/favicontcc.png">
    <title>InfoSUS</title>
    
    <!-- Custom CSS -->
    <link href="../../../../dist/css/style.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../../css/bootstrap.min.css"/>
    <link href="../../css/bootstrap-datepicker.css" rel="stylesheet"/>
    
    <!-- icones -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <!-- sweaterAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <?php include_once ("../../../../../config.php");
        protegePagina();
    ?>
    
    <?php $codHospitalLogado = $_SESSION['usuarioID']; ?>
        
<style>
#image_pre{
    -webkit-border-radius:25em;
    height: 200px;
    width: 200px;
    margin-left:40%;
}
.card__profile {
  align-self: center;
  justify-self: center;
  display: block;
  overflow: hidden;
  width: 10vmax;
  height: 10vmax;
  max-width: 170px;
  max-height: 170px;
  border-radius: 50%;
}

.card__profile img {
  -webkit-transform: scale(1.5, 1.5)  translateZ(0);
  transform: scale(1.5, 1.5)  translateZ(0);
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: 50% 50%;
  -webkit-filter: grayscale(50%) contrast(75%) brightness(1.3);
  filter: grayscale(50%) contrast(75%) brightness(1.3);
  -webkit-transition: all var(--speed) ease;
  transition: all var(--speed) ease;
  mix-blend-mode: normal;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}
</style>
    
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
                                <img src="../../../../assets/images/iconcima.png" width="50px" height="50px" alt="homepage" class="light-logo" />
                            </b>
                            <span class="logo-text">
                                <img src="../../../../assets/images/pala.png" width="100px" height="25px" class="light-logo" alt="homepage" />
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
                        <li class="nav-item search-box">
                            <form class="app-search position-absolute">
                                <input type="hidden" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item">
                            <a class="nav-link text-muted waves-effect waves-dark pro-pic" data-toggle="modal" data-target=".modalLogout">
                                <img src="../../icon/iconlogout.png" class="rounded-circle" width="31">
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
            <?php require_once("../components/menu.php"); ?>
        </aside>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="text-muted">Médicos</h4>
                    </div>
					
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Médicos</li>
                                    <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                
              <!-- conteudo -->
              <div class="row mt-2">
                   <div class="container">
                        <div id="listar">
                        
                        </div>
                   </div>
               </div>
        </div>
            
        </div>
        <!-- modal logout-->
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
    </div>
    
    <script src="../../../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../../../dist/js/custom.min.js"></script>

</body>

</html>