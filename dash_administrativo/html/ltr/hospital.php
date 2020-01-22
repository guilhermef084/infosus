<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../arquivos-js-css/assets/images/favicontcc.png">
    <title>Hospitais</title>
    
    <!-- CSS -->
    <link href="../../../arquivos-js-css/dist/css/style.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../../../arquivos-js-css/assets/libs/lib-custom/css/bootstrap.min.css"/>
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../../../arquivos-js-css/assets/libs/lib-custom/js/bootstrap.min.js"></script>

    <!-- icones -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

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
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            <form method="post" class="app-search position-absolute">
                                <input type="text" class="form-control" name="txtBuscar" placeholder="Buscar &amp; enter">
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
            <div class="scroll-sidebar">
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
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Hospitais</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Hospitais</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <hr>
                 <div class="row">
                    <div class="col-5">
                     <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Novo Hospital</button>
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Novo Hospital</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
								  </div>
								  <div class="modal-body">
									<form method="post" class="was-validated">
									  <div class="form-group">
                                        <div clas="row">
                                            <label for="nomeHospital" class="col-form-label">Nome Hospital:</label>
                                            <input type="text" id="nomeHospital" class="form-control" name="nomeHospital" required/>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="cepHospital" class="col-form-label">CEP:</label>
                                                <input type="text" id="cepHospital" class="form-control" name="cepHospital" required/>
                                            </div>
                                            <div class="col-6">
                                                <label for="logradouroHospital" class="col-form-label">Logradouro:</label>
                                                <input type="text" id="logradouroHospital" class="form-control" name="logradouroHospital" />
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-6">
                                                <label for="numHospital" class="col-form-label">Número:</label>
                                                <input type="text" id="numHospital" class="form-control" name="numHospital" required/>
                                            </div>
                                            <div class="col-6">
                                                <label for="compHospital" class="col-form-label">Complemento:</label>
                                                <input type="text" id="compHospital" class="form-control" name="compHospital"/>
                                            </div>
                                         </div>
                                          <div class="row">
                                            <div class="col-6">
                                                <label for="bairroHospital" class="col-form-label">Bairro:</label>
                                                <input type="text" id="bairroHospital" class="form-control" name="bairroHospital" required/>
                                            </div>
                                            <div class="col-6">
                                                <label for="cidadeHospital" class="col-form-label">Cidade:</label>
                                                <input type="text" id="cidadeHospital" class="form-control" name="cidadeHospital" required/>
                                            </div>
                                         </div>
                                          <div class="row">
                                            <div class="col-6">
                                                <label for="estadoHospital" class="col-form-label">Estado:</label>
                                                <input type="text" id="estadoHospital" class="form-control" name="estadoHospital" required/>
                                            </div>
                                         </div> 
                                          <div class="row">
                                            <div class="col-6">
                                                <label for="loginHospital" class="col-form-label">Login:</label>
                                                <input type="text" id="loginHospital" class="form-control" name="loginHospital" required/>
                                            </div>
                                            <div class="col-6">
                                                <label for="senhaHospital" class="col-form-label">Senha:</label>
                                                <input type="password" id="senhaHospital" class="form-control" name="senhaHospital" required/>
                                            </div>
                                         </div>
                                    </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
									<button type="submit" name="cadastrarHospital" class="btn btn-primary" id="cad">Cadastrar</button>
								  </div>
								  </form>
								</div>
							  </div>
							</div>
                        </div>
                    </div>
                     <div class="col-4">
                     <a href="processosPHP/processoRelatorioGeralH.php" target="_blank">
                        <button type="button" class="btn btn-primary" style="margin-left:490px;" value="Salvar">Relatório Geral</button>
                     </a>
                </div>
                </div>
            </div>
                 <div class="container-fluid">
                 <style>
                     .lefts{
                         margin-left: 105px;
                     }
                 </style>
                <div class="row">
                    <?php include 'processosPHP/processoHospital.php'; ?>  
                </div>
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
                                 
                                <a href="../../../logoutAdministrador.php">
                                    <button type="button" class="btn btn-success" data-toggle="modal"  name="confirmarLogout">
                                    Sim
                                    </button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                                 </a>

                            </form>
                        </div>
                </div>
            </div>
        </div>
        <!-- MODAL DE LOGOUT -->
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
</body>

</html>