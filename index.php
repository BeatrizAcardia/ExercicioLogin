<?php 
    //Verifica se o método da requisição HTTP é GET ou POST.
	//Se for GET, inicializa a variável $msg como uma string vazia.
	//Se for POST, começa a processar o formulário de login.
	if ($_SERVER["REQUEST_METHOD"] === 'GET') {

    	$msg = "";

    } else if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    	// simulando login e senha do bd
    	$loginBD = "admin";
    	$senhaBD = "123456";

        $login = $_POST["login"];
        $senha = $_POST["senha"];

		//Verifica se os campos login e senha não estão vazios após remover os espaços em branco.
        if ( (trim($login) != "") && (trim($senha) != "") ) { 

            if (strlen($login) < 5) {
            	$msg = "O login deve ter no mínimo 5 caracteres";

            } else if (strlen($senha) < 6) {
				$msg = "A senha deve ter no mínimo 6 caracteres";

        	//} else if ( ($login != $loginBD) ||	 ($senha != $senhaBD) ) {
			  } else if ( (($login) != $loginBD) ||	 (($senha) != $senhaBD) ) {        		        		

				$msg = "Login/senha inválido(s)";

            } else {
            	setcookie("login", $login, time()+3600, "/"); //Cria um cookie chamado login com o valor do login do usuário. O cookie expira em 1 hora (time() + 3600 segundos).
                header('Location: home.php'); //Redireciona o usuário para a página home.php
            }
            
        } else {
            $msg = "Informe seu login e sua senha";
        }

    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>


</head>
<body>

	<h1>Login</h1>

	<div>
		<form method="post">
			Login:<br>
			<input type="text" name="login">

			<br><br>

			Senha:<br>
			<input type="text" name="senha">		

			<br><br>
			<input type="submit" value="OK">
		</form>
	</div>

	<span><?= $msg; ?></span>

</body>
</html>