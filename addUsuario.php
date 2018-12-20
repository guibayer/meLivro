<?php 
  require_once('config.php');
  #require_once('usuarios/functions.php'); 
  require_once(DBAPI);
  #addUser();
?>

<html>

<head>

<title> Cadastrando Usuário </title>
<script type="text/javascript">
function cadastroSucesso(){
  setTimeout("window.location='index.php'", 3000);
}
function cadastroFail(){
  setTimeout("window.location='html/telacadastro.html'", 3000)
}
</script>
</head>

<body>
<?php
  $database = open_database();

  $usuario = isset($_POST["usuario"]) ? addslashes(trim($_POST["usuario"])) : FALSE; 
  $cpf = isset($_POST["cpf"]) ? addslashes(trim($_POST["cpf"])) : FALSE; 
  $senha = isset($_POST["pass"]) ? addslashes(trim($_POST["pass"])) : FALSE; 
  $endereco = isset($_POST["endereco"]) ? addslashes(trim($_POST["endereco"])) : FALSE; 
  $email = isset($_POST["email"]) ? addslashes(trim($_POST["email"])) : FALSE; 
  $cidade = isset($_POST["cidade"]) ? addslashes(trim($_POST["cidade"])) : FALSE; 
  $sex = isset($_POST["sex"]) ? addslashes(trim($_POST["sex"])) : FALSE; 
  $telefone = isset($_POST["telefone"]) ? addslashes(trim($_POST["telefone"])) : FALSE; 

  if(!$cpf || !$senha || !$usuario || !$senha || !$endereco || !$email || !$sex || !$telefone || !$cidade){
    echo "Todos os campos são necessários!"; 
    echo "<script>cadastroFail()</script>";
  }
  else {
    $sql = mysqli_query($database, "INSERT INTO pessoa(nome, cpf, email, senha, admin) VALUES ('$usuario', '$cpf', '$email', '$senha', '0')") or die (mysqli_error($database));
    $sql = mysqli_query($database, "INSERT INTO usuario(cidade, endereco, telefone, sexo, cpf) VALUES ('$cidade', '$endereco', '$telefone', '$sex', '$cpf')") or die (mysqli_error($database));
    echo "Cadastrando"; 
    echo "<script>cadastroSucesso()</script>";
  }
?>
</body>