<?php
	require_once('config.php');
	require_once(DBAPI);
?>

<html>

<head>

<title> Autenticando usuário </title>
<script type="text/javascript">
function loginSucesso(){
	setTimeout("window.location='index.php'", 3000);
}
function loginFail(){
	setTimeout("window.location='telalogin.html'", 3000)
}
</script>
</head>

<body>
<?php
	$database = open_database();
	// Recupera o login 
	$cpf = isset($_POST["cpf"]) ? addslashes(trim($_POST["cpf"])) : FALSE; 
	// Recupera a senha, a criptografando em MD5 
	#$senha = isset($_POST["pass"]) ? md5(trim($_POST["pass"])) : FALSE; 
	$senha = isset($_POST["pass"]) ? addslashes(trim($_POST["pass"])) : FALSE; 
	if(!$cpf || !$senha) 
	{ 
		echo "Você deve digitar sua senha e cpf!"; 
		exit; 
} 
	
	$sql = mysqli_query($database, "SELECT * FROM pessoa WHERE cpf = '$cpf' and senha = '$senha'") or die (mysqli_error());
	$dadosusuario = mysqli_fetch_array($sql);
	$row = mysqli_num_rows($sql); 
	
	
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	if($row != 0){		
		$_SESSION["cpf"]=$cpf;
		$_SESSION["nome"]=$dadosusuario['NOME'];
		$_SESSION["admin"]=$dadosusuario['ADMIN'];
		$_SESSION["senha"]=$senha;
		echo "<h1>Login realizado com sucesso</h1>";
		echo "<h3>Em instantes você será redirecionado para a página inicial</h3>";
		echo "<script>loginSucesso()</script>";
		#session_start("jksfewhKJHiuusrfsklkhjpfsoekçkKJHhodiwIYGF");
		#$_SESSION[jksfewhKJHiuusrfsklkhjpfsoekçkKJHhodiwIYGF] = $l;
		//header("Location: index.php");
		//exit;
	}
	else {
		unset($_SESSION["cpf"]);
		unset($_SESSION["nome"]);
		unset($_SESSION["admin"]);
		unset($_SESSION["senha"]);
		echo " Nome de usuário ou senha inválido";
		echo "<script>loginFail()</script>";
		#header("Location:..//telalogin.php?action=fail");
	 };
?>
</body>