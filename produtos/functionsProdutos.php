<?php

require_once(DBAPI);

$produtos = null;
$produto = null;

/**
 *  Listagem de Clientes
 */
function indexProdutos() {
  global $produtos;
  $produtos = findProdutos_all('produto');
}

/**
 *  Visualização de um Cliente
 */
function viewProduto($id = null) {
  global $produto;
  $produto = findProdutos('produtos', $id);
}

function viewProdutoportipo($tipo = null) {
  global $produtos;
  $produtos = findProdutosportipo('produto', $tipo);
}

function viewProdutopornome($palavra = null) {
  global $produtos;
  $produtos = findProdutospornome('produto', $palavra);
}

/**
 *  Pesquisa Todos os Registros de uma Tabela
 */
function findProdutos_all( $table ) {
  return findProdutos($table);
}

function findProdutospornome( $table = null, $palavra = null ) {
  
	$database = open_database();
	$found = null;
    try{
		$palavra = trim($_POST['palavra']);
		$sql = mysqli_query($database, "SELECT * FROM produto WHERE titulo LIKE '%".$palavra."%' ORDER BY CODPROD DESC");
		if (!$sql)
		{
			echo("Error description: " . mysqli_error($con));
		}
		//$result = $database->query($sql);
	    if ($sql->num_rows > 0) {
        $found = $sql->fetch_all(MYSQLI_ASSOC);
      }
      //var_dump($found);die;

    } catch (Exception $e) {
      $_SESSION['message'] = $e->GetMessage();
      $_SESSION['type'] = 'danger';
    }	
	close_database($database);
	return $found;
}
function findProdutosportipo( $table = null, $tipo = null ) {
  
	$database = open_database();
	$found = null;
    try{
		$sql = mysqli_query($database, "SELECT * FROM produto WHERE produto.TIPOPRODUTO = '$tipo' ORDER BY CODPROD DESC");
		if (!$sql)
		{
			echo("Error description: " . mysqli_error($con));
		}
		//$result = $database->query($sql);
	    if ($sql->num_rows > 0) {
        $found = $sql->fetch_all(MYSQLI_ASSOC);
      }
      //var_dump($found);die;

    } catch (Exception $e) {
      $_SESSION['message'] = $e->GetMessage();
      $_SESSION['type'] = 'danger';
    }	
	close_database($database);
	return $found;
}
/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
function findProdutos( $table = null, $id = null ) {
  
	$database = open_database();
	$found = null;

  if($table == 'produto'){
    try{
		$sql = "SELECT * FROM produto ORDER BY CODPROD DESC";
		$result = $database->query($sql);
	    if ($result->num_rows > 0) {
        $found = $result->fetch_all(MYSQLI_ASSOC);
      }
      //var_dump($found);die;

    } catch (Exception $e) {
      $_SESSION['message'] = $e->GetMessage();
      $_SESSION['type'] = 'danger';
    }
  }else{
    try {
      if ($id) {
		$sql = "SELECT * FROM produto WHERE produto.CODPROD = " . $id;
        $resultaux = $database->query($sql);
		
		if (!$resultaux) {
			trigger_error('Invalid query: ' . $database->error);
		}
		
		if ($resultaux->num_rows > 0) {
			$found = $resultaux->fetch_assoc();
			if($found['TIPOPRODUTO'] == '0'){
				
				$sql2 = "SELECT * FROM (
				SELECT produto.CODPROD, produto.CPFUSUARIO, produto.TIPOPRODUTO, produto.TITULO, produto.PRECO, produto.DESCRICAO, produto.IMAGEM, revista.ISSN, revista.EDITORA
				FROM produto INNER JOIN revista ON produto.CODPROD = revista.CODPROD
				) AS subquery WHERE subquery.CODPROD = " . $id;
				$result = $database->query($sql2);
				if ($result->num_rows > 0) {
					$found = $result->fetch_assoc();
				}
				if (!$result) {
					trigger_error('Invalid query: ' . $database->error);
				}
			}elseif($found['TIPOPRODUTO'] == '1'){
				$sql2 = "SELECT * FROM (
				SELECT produto.CODPROD, produto.CPFUSUARIO, produto.TIPOPRODUTO, produto.TITULO, produto.PRECO, produto.DESCRICAO, produto.IMAGEM, paper.AUTOR, paper.ANO_PUBLICACAO
				FROM produto INNER JOIN paper ON produto.CODPROD = paper.CODPROD
				) AS subquery WHERE subquery.CODPROD = " . $id;
				$result = $database->query($sql2);
				if ($result->num_rows > 0) {
					$found = $result->fetch_assoc();
				}
				if (!$result) {
					trigger_error('Invalid query: ' . $database->error);
				}
			}elseif($found['TIPOPRODUTO'] == '2'){
				$sql2 = "SELECT * FROM (
				SELECT produto.CODPROD, produto.CPFUSUARIO, produto.TIPOPRODUTO, produto.TITULO, produto.PRECO, produto.DESCRICAO, produto.IMAGEM, livro.AUTOR, livro.ISBN, livro.EDICAO
				FROM produto INNER JOIN livro ON produto.CODPROD = livro.CODPROD
				) AS subquery WHERE subquery.CODPROD = " . $id;
				$result = $database->query($sql2);
				if ($result->num_rows > 0) {
					$found = $result->fetch_assoc();
				}
				if (!$result) {
					trigger_error('Invalid query: ' . $database->error);
				}			  
			}
		}
        
      } else {
        
        $sql = "SELECT * FROM produto WHERE produto.CODPROD = " . $id;
        $result = $database->query($sql);
        
        if ($result->num_rows > 0) {
          $found = $result->fetch_all(MYSQLI_ASSOC);
        }
      }
    } catch (Exception $e) {
      $_SESSION['message'] = $e->GetMessage();
      $_SESSION['type'] = 'danger';
    }
  }
	
	close_database($database);
  return $found;
}

/**
 *	Atualizacao/Edicao de Cliente
 */
function editProduto() {
  if (isset($_GET['id'])) {
	
    $id = $_GET['id'];
    if (isset($_POST['produto'])) {
      $produto = $_POST['produto'];
      updateProduto('produto', $id, $produto);
      header('location: listarprod.php');
    } else {
      global $produto;
      $produto = findProdutos('produtos', $id);
    } 
  } else {
    header('location: index.php');
  }
}
/**
 *  Atualiza um registro em uma tabela, por ID
 */
function updateProduto($table = null, $id = 0, $data = null) {
	$database = open_database();
	$sql1 = "UPDATE produto SET TITULO = '{$data["'titulo'"]}', PRECO = '{$data["'preco'"]}', DESCRICAO = '{$data["'descricao'"]}', IMAGEM = '{$data["'imagem'"]}' WHERE produto.CODPROD = '$id'";
	
	
	$sqlaux = mysqli_query($database, "SELECT TIPOPRODUTO FROM produto WHERE produto.CODPROD = '$id'")or die(mysql_error());
	$tipodoproduto = mysqli_fetch_array($sqlaux);
	
	if($tipodoproduto[0] == 0){
		$sql2 = mysqli_query($database, "UPDATE revista SET ISSN = '{$data["'issn'"]}', EDITORA = '{$data["'editora'"]}' WHERE revista.CODPROD =" . $id)or die(mysql_error());
	}elseif($tipodoproduto[0] == 1){
		$sql2 = mysqli_query($database, "UPDATE paper SET AUTOR = '{$data["'autor'"]}', COAUTOR = '{$data["'coautor'"]}', AREA_CONHECIMENTO = '{$data["'areadeconhecimento'"]}', ANO_PUBLICACAO = '{$data["'anodepublicacao'"]}' , INSTITUICAO = '{$data["'instituicao'"]}'WHERE paper.CODPROD =" . $id)or die(mysql_error());
	}elseif($tipodoproduto[0] == 2){
		$sql2 = mysqli_query($database, "UPDATE livro SET AUTOR = '{$data["'autor'"]}', ISBN = '{$data["'isbn'"]}' , EDICAO = '{$data["'edicaodolivro'"]}'WHERE livro.CODPROD = '$id'")or die(mysql_error());
	}
	try {
		$database->query($sql1);
		$database->query($sql2);
		$_SESSION['message'] = 'Registro atualizado com sucesso.';
		$_SESSION['type'] = 'success';
	} catch (Exception $e) { 
		$_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
		$_SESSION['type'] = 'danger';
	} 
	close_database($database);
}

/**
 *  Exclusão de um Cliente
 */
function deleteProduto($id = null) {
  global $produto;
  $produto = removeProduto('usuario', $id);
  header('location: listarprod.php');
}

/**
 *  Remove uma linha de uma tabela pelo ID do registro
 */
function removeProduto( $table = null, $id = null ) {
  $database = open_database();
	
  try {
    if ($id) {
		$sqlresult = mysqli_query($database, "SELECT TIPOPRODUTO FROM produto WHERE livro.CODPROD = '$id'");
		$result = mysqli_fetch_array($sqlresult);
		//echo $result['TIPOPRODUTO'];
		$sql1 = "DELETE FROM produto WHERE produto.CODPROD = '$id'";
		if($resultado['TIPOPRODUTO'] = 0){
			$sql2 = "DELETE FROM revista WHERE revista.CODPROD = '$id'";
		}elseif($resultado['TIPOPRODUTO'] = 1){
			$sql2 = "DELETE FROM paper WHERE paper.CODPROD = '$id'";
		}elseif($resultado['TIPOPRODUTO'] = 2){
			$sql2 = "DELETE FROM livro WHERE livro.CODPROD = '$id'";
		}
		if ($result = $database->query($sql1)) {   	
			$_SESSION['message'] = "Registro Removido com Sucesso.";
			$_SESSION['type'] = 'success';
		}
		if ($result = $database->query($sql2)) {   	
			$_SESSION['message'] = "Registro Removido com Sucesso.";
			$_SESSION['type'] = 'success';
		}
    }
  } catch (Exception $e) { 
    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
  }
  close_database($database);
}
?>