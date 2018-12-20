<?php
include_once('../../config.php');

function open_database() {
	try {
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		return $conn;
	} catch (Exception $e) {
		echo $e->getMessage();
		return null;
	}
}
function close_database($conn) {
	try {
		mysqli_close($conn);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}

function addRevista() {
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	} 
  if (isset($_POST["submit"])) {
		if(isset($_FILES['arquivo'])){ 
			$extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
			$novo_nome = md5(time()). $extensao;
			$diretorio = "../upload/";
			
			move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
		}else{
		  echo "<h1>Você nao submeteu nenhuma imagem!</h1>";
		}
		$titulodarevista = $_POST['titulo'];
		$precodarevista = $_POST['preco'];
		$descricaodarevista = $_POST['descricao'];
		$database = open_database();
		$sql1 = mysqli_query($database, "INSERT INTO produto (CODPROD, CPFUSUARIO, TIPOPRODUTO, TITULO, PRECO, DESCRICAO, IMAGEM)
		VALUES (NULL, '{$_SESSION['cpf']}','0', '$titulodarevista', '$precodarevista', '$descricaodarevista', '$novo_nome')")or die(mysql_error());

		$issndarevista = $_POST['issn'];
		$editoradarevista = $_POST['editora'];

		$sqlaux = mysqli_query($database, "SELECT CODPROD FROM produto WHERE produto.TITULO = '$titulodarevista'")or die(mysql_error());
		$codigoproduto = mysqli_fetch_array($sqlaux);
		$sql2 = mysqli_query($database, "INSERT INTO revista (ISSN, EDITORA, CODPROD) VALUES ('$issndarevista','$editoradarevista', '$codigoproduto[0]')")or die(mysql_error());

		//var_dump($sql2);die;
		try {
		  $database->query($sql1);
		  $database->query($sql2);

		  $_SESSION['message'] = 'Registro cadastrado com sucesso.';
		  $_SESSION['type'] = 'success';

		} catch (Exception $e) { 
			echo "<h1>ERROU</h1>";
		  $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
		  $_SESSION['type'] = 'danger';
		}
		  //close_database($database);
		  //echo "<h1>".$contact['CODPROD']."</h1>";
		header('location: revista.php');
	}
}

function addPaper() {
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	} 
  if (isset($_POST["submit"])) {
	if(isset($_FILES['arquivo'])){ 
		$extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
		$novo_nome = md5(time()). $extensao;
		$diretorio = "../upload/";
		
		move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
	}else{
	  echo "<h1>Você nao submeteu nenhuma imagem!</h1>";
	}
    $titulodopaper = $_POST['titulo'];
    $precodopaper = $_POST['preco'];
    $descricaodopaper = $_POST['descricao'];
	$cpfusuario = $_SESSION['cpf'];

	$database = open_database();
	
	$sql1 = mysqli_query($database, "INSERT INTO produto (CODPROD, CPFUSUARIO, TIPOPRODUTO, TITULO, PRECO, DESCRICAO, IMAGEM)
	VALUES (NULL, '{$_SESSION['cpf']}', '1', '$titulodopaper', '$precodopaper', '$descricaodopaper', '$novo_nome')")or die(mysql_error());

    $autordopaper = $_POST['autor'];
    $coautordopaper = $_POST['coautor'];
	$areadeconhecimento = $_POST['areadeconhecimento'];
	$anodepublicacao = $_POST['anodepublicacao'];
	$instituicao = $_POST['instituicao'];
	
	$sqlaux = mysqli_query($database, "SELECT CODPROD FROM produto WHERE produto.TITULO = '$titulodopaper'");
	if (!$sqlaux) {
	  echo mysql_error();
	}
	$codigoproduto = mysqli_fetch_array($sqlaux);
	
	$sql2 = mysqli_query($database, "INSERT INTO paper (AUTOR, COAUTOR, AREA_CONHECIMENTO, ANO_PUBLICACAO, INSTITUICAO, CODPROD) VALUES ('$autordopaper','$coautordopaper', '$areadeconhecimento', '$anodepublicacao', '$instituicao','$codigoproduto[0]')")or die(mysql_error());

	//var_dump($sql2);die;
	try {
	  $database->query($sql1);
	  $database->query($sql2);

	  $_SESSION['message'] = 'Registro cadastrado com sucesso.';
	  $_SESSION['type'] = 'success';
	
	} catch (Exception $e) { 
	  $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
	  $_SESSION['type'] = 'danger';
	} 
	  //close_database($database);
	  //echo "<h1>".$contact['CODPROD']."</h1>";
    header('location: paper.php');
  }
}

function addLivro() {
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	} 
  if (isset($_POST["submit"])) {
	if(isset($_FILES['arquivo'])){ 
		$extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
		$novo_nome = md5(time()). $extensao;
		$diretorio = "../upload/";
		
		move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
	}else{
	  echo "<h1>Você nao submeteu nenhuma imagem!</h1>";
	}
    $titulodolivro = $_POST['titulo'];
    $precodolivro = $_POST['preco'];
    $descricaodolivro = $_POST['descricao'];
	$cpfusuario = $_SESSION['cpf'];

	$database = open_database();
	
	$sql1 = mysqli_query($database, "INSERT INTO produto (CODPROD, CPFUSUARIO, TIPOPRODUTO, TITULO, PRECO, DESCRICAO, IMAGEM)
	VALUES (NULL, '{$_SESSION['cpf']}', '2', '$titulodolivro', '$precodolivro', '$descricaodolivro', '$novo_nome')")or die(mysql_error());

    $autordolivro = $_POST['autor'];
    $isbn = $_POST['isbn'];
	$edicaodolivro = $_POST['edicaodolivro'];
	
	$sqlaux = mysqli_query($database, "SELECT CODPROD FROM produto WHERE produto.TITULO = '$titulodolivro'")or die(mysql_error());
	$codigoproduto = mysqli_fetch_array($sqlaux);
	
	$sql2 = mysqli_query($database, "INSERT INTO livro(AUTOR, ISBN, EDICAO, CODPROD) VALUES ('$autordolivro','$isbn', '$edicaodolivro', '$codigoproduto[0]')")or die(mysql_error());
	
	//var_dump($sql2);die;
	try {
	  $database->query($sql1);
	  $database->query($sql2);

	  $_SESSION['message'] = 'Registro cadastrado com sucesso.';
	  $_SESSION['type'] = 'success';
	
	} catch (Exception $e) { 
	  $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
	  $_SESSION['type'] = 'danger';
	} 
	  //close_database($database);
	  //echo "<h1>".$contact['CODPROD']."</h1>";
    header('location: livro.php');
  }
}


?>