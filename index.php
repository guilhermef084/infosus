<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="login/images/iconlogo.png"/>

	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="login/fonts/iconic/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
	<link rel="stylesheet" type="text/css" href="login/css/style.css">


</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
                <form class="form-signin" method="post" action="validaLoginAdministrador.php">
					<span class="login100-form-logo">
						<div class="zmdi-infosus"></div>
					</span>

					<span class="login100-form-title p-b-10 p-t-40">
							Bem-vindo ao INFOSUS!
					</span>

					<span class="login100-form-title p-b-34">
							Administrador!
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Coloque um nome de usuário">
						<input class="input100" type="text" id="inputEmail" name="txtUsuario" placeholder="Login">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Coloque sua senha">
						<input class="input100" type="password" id="inputPassword" name="txtSenha" placeholder="Senha">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Lembre-me
						</label>
                    </div>
                
					<a class="opcao m-b-15"> Escolha a opção de entrada:</a>
					<div class="botao m-b-40">
                        <a href="index.php">
                            Administrador
                        </a>
                    <a href="index2.php">
                            Hospital
                    </a>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Entrar
						</button>
					</div>

					<div class="text-center p-t-20">
						<a class="txt1" href="#">
							Esqueceu sua senha?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="login/vendor/select2/select2.min.js"></script>
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
	<script src="login/js/main.js"></script>

</body>
</html>