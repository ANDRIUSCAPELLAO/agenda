<?php

class Login extends Conect {
	
	private $login;
	
	public function setLogin($login){
		$this->login = $login;		
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}
	public function getLogin(){
		return $this->login;
	}
	public function getSenha(){
		return $this->senha;
	}
// Validação do usuário/senha digitados
	public function logar(){
		$pdo = parent::getDB();
		$logar = $pdo->prepare("SELECT * FROM usuarios WHERE login= ? AND senha =?");
	
		$logar->bindValue(1,$this->getLogin());
		$logar->bindValue(2,$this->getSenha());
		$logar->execute();
		if($logar->rowCount() == 1):
			$dados = $logar->fetch(PDO::FETCH_OBJ);
			$_SESSION['login']= $dados->usuario_login;
			$_SESSION['logado']=true;

	
// Segunda Validação
$sql = "SELECT `id`, `nome`, `nivel` FROM `usuarios` WHERE (`usuario` = '". $usuario ."') AND (`senha` = '". sha1($senha) ."') AND (`ativo` = 1) LIMIT 1";
$query = mysql_query($sql);
if (mysql_num_rows($query) != 1) {
	// Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado, e apos redireciona.
	
	 echo "<script type='text/javascript'>
			alert('Usuario ou Senha invalidos');
			window.location='./index.php';
			</script>";
			
		
} else {
	// Salva os dados encontados na variável $resultado
	$resultado = mysql_fetch_assoc($query);

	// Se a sessão não existir, inicia uma
	if (!isset($_SESSION)) session_start();

	// Salva os dados encontrados na sessão
	$_SESSION['UsuarioID'] = $resultado['id'];
	$_SESSION['UsuarioNome'] = $resultado['nome'];
	$_SESSION['UsuarioNivel'] = $resultado['nivel'];

		
	// Redireciona o usuario de acordo com o nivel de permissao
 if ($resultado['nivel'] == 0) {
 header("Location: map.php"); exit;
 } elseif ($resultado['nivel'] == 1) {
 header("Location: map.php"); exit;
 } elseif ($resultado['nivel'] == 2) {
 header("Location: MenuRestrito.php"); exit;
 }
 }	
			
			
			
			
			
			
		
			return true;
			
			
			
			
			
		else:
			return false;
		endif;
		
		
	}
		
	public static function deslogar(){
		if(isset($_SESSION['logado'])):
			unset($_SESSION['logado']);
			session_destroy();
		header("Location:http://localhost/agenda/agenda/index.php");
	endif;
	}
	}

