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
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../../arquivos-js-css/assets/images/favicontcc.png">
    <title>Médicos</title>
    
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

    <!-- sweaterAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/datatables.min.css"/>    
    
    <?php 
        require_once('processosPHP/crud/inserirMedico.php');
        require_once('processosPHP/crud/inserirMedicoEspecialidade.php');
        $codHospitalLogado = $_SESSION['usuarioID']; 
    ?>
<style>
#image_pre{
	-webkit-border-radius:25em;
    height: 200px;
    width: 200px;
    margin-left:40%;
    }
.checkE{
       background-color: aqua;
    }
</style>
<style>
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
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
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
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                
                <div class="row justify-content-between">
                    <button type="button" class="mx-3 btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                    Novo Médico
                    </button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title-lg" id="exampleModalLabel">Novo Médico</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" class="needs-validation" name="form" enctype="multipart/form-data" novalidate>
                                  <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <img src="arquivos-upados/fotoPadrao.png" id="image_pre" class="card__profile" />
                                            <input type="file" id="upload" class="preview form-control" name="pic" accept="image/*"/>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="validationCustom01" class="col-form-label">Nome:</label>
                                            <input type="text" id="validationCustom01" name="txtNome" class="form-control" required /> 
                                              <div class="invalid-feedback">
                                                Campo obrigatório*
                                              </div>
                                        </div>
                                         <div class="col-sm-6"> 
                                            <label for="validationCustom02" class="col-form-label">Sobrenome:</label>
                                            <input type="text" id="validationCustom02" name="txtSobreNome" class="form-control" required />
                                            <div class="invalid-feedback">
                                                Campo obrigatório*
                                            </div>
                                        </div>
                                    </div>
                                      
                                    <div class="row">
                                        <div class="col-sm-6">
                                        <label for="validationCustom03" class="col-form-label">CPF:</label>
                                            <input type="text" id="validationCustom03" autocomplete="off" name="txtCPF" class="form-control" onkeyup="cpfCheck(this);"   onkeypress="formatar('###.###.###-##',this);" maxlength="14" required />
                                            <span id="cpfResponse"></span>
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="col-sm-6"> 
                                            <label for="validationServer03" class="col-form-label">CRM:</label>
                                            <input type="text" id="validationServer03" name="txtCRM" class="form-control" required />
                                            <input type="hidden" value="<?php echo $_SESSION['usuarioID']; ?>" name="codHospitalLogado"/>
                                            <div class="invalid-feedback">
                                                Campo obrigatório*
                                            </div>
                                        </div>
                                    </div>
                                      <div class="row">
                                          <div class="col-sm-5">
                                            <label class="col-form-label">Buscar as especialidade:</label>
                                             <input type="text" class="form-control" name="texto" onkeyup="trocaOpcao(this.value, document.form.selectEspecialidade);">  
                                          </div>
                                      
                                      </div>
                                      
                                      <div class="row">
                                            <!-- SELECT E ADD -->
                                            <div class="col-sm-5"> 
                                                <label class="col-form-label">Escolha as especialidade:</label>
                                                   <select id="especialidadeSelect" class="form-control"  name="selectEspecialidade" style="overflow:auto;" multiple>
                                                       <!-- PHP PARA MONTAR AS OPTIONS DA ESPECIALIDADE -->
                                                       <?php include 'processosPHP/processoSelectEspecialidade.php'; ?>
                                                    </select>
                                            </div>

                                            <div class="col-sm-1">
                                                <label class="col-form-label">&nbsp;</label>
                                                <button type="button" id="add" class="btn btn-success">+</button>
                                            </div>      
                                            <!-- FIM SELECT ADD -->

                                            <div class="col-sm-5">
                                                <label class="col-form-label">Especialidades escolhidas:</label>
                                                <select id="item" class="form-control" name="selectE[]" style="overflow:auto" multiple>
                                                    <!-- É PREENCHIDO PELO USER -->
                                                </select>
                                            </div>

                                             <div class="col-sm-1">
                                                 <label class="col-form-label">&nbsp;</label>
                                                    <button type="button" id="remove" class="btn btn-danger">
                                                            -
                                                    </button>
                                             </div>                                         
                                         </div>
                                  </div>
                                    
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit"class="btn btn-primary" name="cadastrarMedico">Cadastrar </button>
                                  </div>
                              </form>
                            </div>
		                  </div>
		              </div>
                    </div>
                </div>
                
              <!-- conteudo -->
              <div class="row mt-2">
                   <div class="container card pb-3">
                        <div id="listar">
                            <?php require_once('processosPHP/processaMedicos.php'); ?>
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
            <!--modal confirmar-->
            <div class="modal fade" id="modalConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Deseja realmente ativar esse médico?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button id="confirmar" type="button" class="btn btn-success">Confirmar</button>
                    </div>
                </div>
                </div>
            </div>
            <!--modal confirmar-->
    </div>
    
    <!-- scripts de ações -->
    <!-- preview img -->
    <script type="text/javascript">
	$(function(){
		$('#upload').change(function(){
			const file = $(this)[0].files[0]
			const fileReader = new FileReader()
			fileReader.onloadend = function(){
				$('#image_pre').attr('src',fileReader.result)
			}
			fileReader.readAsDataURL(file)
		})
	})
    </script>
    <!-- buscar especialidade -->
    <script type="text/javascript">
      function trocaOpcao(valor, objSel) {
        for (i=0; i < objSel.length; i++){
              qtd = valor.length;
              if (objSel.options[i].text.substring(0, qtd).toUpperCase() == valor.toUpperCase()) {
                    objSel.selectedIndex = i;
                    break;
              }
        }
    }
    </script>
    
    <!-- remove da combo -->
    <script type="text/javascript">
        $(document).ready(function () {
            function selecionarOptions(){
                    var i=0
                    var tamanhoCombo = document.getElementById("item").options.length;
                    console.log(tamanhoCombo)

                    while(i<tamanhoCombo){
                        document.getElementById("item").options[i].selected = true;
                        i++;
                    }
                }
            $("#remove").on("click", function () {
                $("#item option:selected").remove();
                selecionarOptions();
            });
        });
    </script>
    <!-- add na combo -->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#add").on("click", function () {
                $("#especialidadeSelect option:selected").each(function() {
                   var especialidadeSelect = $(this).val();
                   var especialidadeSelectt = $(this).text();
                    $("#item").append("<option selected value='" + especialidadeSelect + "'>" + especialidadeSelectt + "</option>");
                }); 
            });
        });
    </script>
     
    <!-- validação bootstrap -->
    <script type="text/javascript">
        (function() {
          'use strict';
            window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                }
                    form.classList.add('was-validated');
                }, false);
            });
            }, false);
            })();
    </script>
   
    
    <!-- mascara de cpf -->
    <script type="text/javascript">
        function formatar(mascara, documento){
            var i = documento.value.length;
            var saida = mascara.substring(0,1);
            var texto = mascara.substring(i)

            if (texto.substring(0,1) != saida){
                documento.value += texto.substring(0,1);
            }
        }
    </script>
    
    <!-- validação de cpf -->
    <script type="text/javascript">
         function is_cpf (c) {
             if((c = c.replace(/[^\d]/g,"")).length != 11)
                return false
             
             if (c == "00000000000")
                 return false;
             
             var r;
             var s = 0;

             for (i=1; i<=9; i++)
                 s = s + parseInt(c[i-1]) * (11 - i);
                 r = (s * 10) % 11;
                    
                    if ((r == 10) || (r == 11))
                        r = 0;

                    if (r != parseInt(c[9]))
                        return false;

                        s = 0;

                    for (i = 1; i <= 10; i++)
                        s = s + parseInt(c[i-1]) * (12 - i);

                        r = (s * 10) % 11;

                        if ((r == 10) || (r == 11))
                                r = 0;
                        if (r != parseInt(c[10]))
                                return false;
                                                    
                                return true;
            }
            cpfCheck = function (el) {
             
            var valor = document.getElementById('cpfResponse').innerHTML = is_cpf(el.value)? '<span style="color:green">&nbsp CPF Válido</span>' : '<span style="color:red">&nbsp CPF Inválido*</span>';
             
            var valorInput = document.getElementById('validationCustom03').value
                                                    
                //MUDAR A COR 1.0
                if(valor === '<span style="color:green">&nbsp CPF Válido</span>'){ 
                    document.getElementById('validationCustom03').className = 'form-control is-valid';
                }
                if(valor === '<span style="color:red">&nbsp CPF Inválido*</span>'){
                     document.getElementById('validationCustom03').className = 'form-control  is-invalid';
                }
                if(el.value==''){
                    document.getElementById('cpfResponse').innerHTML = '';
                    document.getElementById('validationCustom03').className = 'form-control';
                }
                //MUDA A COR 2.0
                if(valorInput === '111.111.111-11' || valorInput === '222.222.222-22' || valorInput === '333.333.333-33' || valorInput === '444.444.444-44' || valorInput === '555.555.555-55' || valorInput === '666.666.666-66' || valorInput === '777.777.777-77' || valorInput === '888.888.888-88' || valorInput === '999.999.999-99' || valorInput === '000.000.000-00'){
                    document.getElementById('cpfResponse').innerHTML = '<span style="color:red">&nbsp CPF Inválido*</span>';
                    document.getElementById('validationCustom03').className = 'form-control  is-invalid';
                }
                                                    
            }
    </script>
    <!-- excluir medico -->
    <script type="text/javascript">
        $('#tabela_dados tbody td a.excluir').click(function(e){
            e.preventDefault();
            let elemento = $(this).parent().parent();   
            let id_medico=$(this).attr("title");
            $("#confirmar").attr("title",id_medico)
        });
        $("#confirmar").click(function(){
            let id_medico = $("#confirmar").attr("title")
            $.ajax({
                type:"POST",
                data:"idMedico="+ id_medico,
                url:"processosPHP/crud/inativarMedico.php",
                async:false
            }).done(function(data){
                $sucesso = $.parseJSON(data)['sucesso'];
                if($sucesso){
                    swal({
                        title: "Excluido com Sucesso!",
                        text: "",
                        icon: "success",
                        button: "Fechar"
                    }).then(function(result) {
                        if (result) {
                            window.location.reload()
                        } else {
                            alert("Você não será redirecionado pois clicou em \"Cancel\"");
                        }
                    });
                }else{
                    console.log("Erro ao tentar excluir");
                }
            }).fail(function(){
                console.log("Erro nos sistema");
            });
        });
    </script>
        
    <script src="../../../arquivos-js-css/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- DataTables.js -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/datatables.min.js"></script>
    
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
    
    <script>
    $(document).ready(function() {
        $('#tabela_dados').DataTable( {
            "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nenhum registro inativo!",
                "info": "Mostrando página _PAGE_ of _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próximo"
                },
                "search":"Buscar:"
            }
        });
    });
    </script>
</body>

</html>