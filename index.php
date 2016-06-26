<html>
  <head>
 
<title>SISTEMA X</title>
 
<!--Folha de estilo CSS -->
 <link href="style.css" rel="stylesheet" type="text/css" >
 
<link rel="shortcut icon" href="./images/antena2.ico" type="image/x-icon">
<link rel="icon" href="./images/antena2.ico" type="image/x-icon">
 
 <?php
 
 session_start();
 require_once "classes/Conect.php";
 require_once "classes/Login.php";
 
if(isset($_POST['ok'])):
	
		$login = filter_input(INPUT_POST,"login",FILTER_SANITIZE_MAGIC_QUOTES);
		$senha = filter_input(INPUT_POST,"senha",FILTER_SANITIZE_MAGIC_QUOTES);
	
	$l= new Login;
	$l->setLogin($login);
	$l->setSenha(SHA1($senha));
	
	if($l->logar()):
	header ("Location: Lista_cliente.php");
	else:
	$erro = "Erro ao logar";

	endif;
endif;
			
?>
 
 </head>
 </html>

<html> 
<head>
<body>

<h5>SISTEMA ANDRIUS</h5>


<form  id="login" method="post" action="">
  <label for="login" >Login:</label>
  <input  id="usuario" type="text" name="login" maxlength="50"/>
  <br />
  <label for="senha">Senha:</label>
  <input id="senha" type="password" name="senha" maxlength="50" />
  <input type="submit" name="ok" value="Entrar" class="login" />
  <?php echo isset ($erro) ? $erro : ''; ?>  
</form>



	<div id="rodape">
    <legend>Desenvolvido por andriuscapellao@gmail.com (2016)<br />	
	Versao 1.0
	</legend>
	</div>
</body>					

</head>
</html>	