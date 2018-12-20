<?php

require_once('../config.php');
require_once(DBAPI);

$usuarios = null;
$usuario = null;

/**
 *  Listagem de Clientes
 */
function indexUser() {
  global $usuarios;
  $usuarios = findUser_all('usuario');
}

/**
 *  Cadastro de Clientes
 */
function addUser() {
  if (!empty($_POST['usuario'])) {
    $usuario = $_POST['usuario'];
    //$today = date_create('now', new DateTimeZone('America/Sao_Paulo'));    
    //$usuario['modified'] = $usuario['created'] = $today->format("Y-m-d H:i:s");
    
    
    
    saveUser('usuario', $usuario);
    header('location: index.php');
  }
}

/**
*  Insere um registro no BD
*/
function saveUser($table = null, $data = null) {
  $database = open_database();

  if($table == 'usuario'){

    $sql1 = "INSERT INTO pessoa (NOME, CPF, EMAIL, SENHA, ADMIN)
    VALUES ('{$data["'nome'"]}','{$data["'cpf'"]}', '{$data["'email'"]}', '{$data["'senha'"]}', '0')";
    
    $sql2 = "INSERT INTO usuario (CIDADE, ENDERECO, TELEFONE, SEXO, CPF)
    VALUES ('{$data["'cidade'"]}','{$data["'endereco'"]}', '{$data["'telefone'"]}', '{$data["'sexo'"]}', '{$data["'cpf'"]}')";
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
}
  close_database($database);
}

/**
 *  Visualização de um Cliente
 */
function viewUser($id = null) {
  global $usuario;
  $usuario = findUser('usuarios', $id);
}

/**
 *	Atualizacao/Edicao de Cliente
 */
function editUser() {
  if (isset($_GET['id'])) {
	
    $id = $_GET['id'];
    if (isset($_POST['usuario'])) {
      $usuario = $_POST['usuario'];
      updateUser('usuario', $id, $usuario);
      header('location: index.php');
    } else {
      global $usuario;
      $usuario = findUser('usuarios', $id);
    } 
  } else {
    header('location: index.php');
  }
}
/**
 *  Atualiza um registro em uma tabela, por ID
 */
function updateUser($table = null, $id = 0, $data = null) {
	$database = open_database();
	// remove a ultima virgula
	$items = rtrim($items, ',');
	$sql1 = "UPDATE pessoa SET NOME = '{$data["'nome'"]}', CPF = '{$data["'cpf'"]}', EMAIL = '{$data["'email'"]}', ADMIN = '0' WHERE pessoa.CPF =" . $id;
		
	$sql2 = "UPDATE usuario SET CIDADE = '{$data["'cidade'"]}', ENDERECO = '{$data["'endereco'"]}', TELEFONE = '{$data["'telefone'"]}', SEXO = '{$data["'sexo'"]}', CPF = '{$data["'cpf'"]}' WHERE usuario.CPF =" . $id;
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
 *  Pesquisa Todos os Registros de uma Tabela
 */
function findUser_all( $table ) {
  return findUser($table);
}

/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
function findUser( $table = null, $id = null ) {
  
	$database = open_database();
	$found = null;

  if($table == 'usuario'){
    try{
      $sql = "SELECT * FROM pessoa INNER JOIN usuario ON pessoa.cpf=usuario.cpf";
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
        $sql = "SELECT * FROM (
		SELECT pessoa.cpf,pessoa.NOME,pessoa.EMAIL,pessoa.ADMIN,usuario.CIDADE, usuario.ENDERECO, usuario.TELEFONE, usuario.SEXO FROM pessoa INNER JOIN usuario ON pessoa.cpf=usuario.cpf
		) AS subquery WHERE subquery.cpf = " . $id;
        $result = $database->query($sql);
        
        if ($result->num_rows > 0) {
          $found = $result->fetch_assoc();
        }
        
      } else {
        
        $sql = "SELECT pessoa.cpf,pessoa.NOME,pessoa.EMAIL,pessoa.ADMIN,usuario.CIDADE, usuario.ENDERECO, usuario.TELEFONE, usuario.SEXO FROM pessoa INNER JOIN usuario ON pessoa.cpf=usuario.cpf";
        $result = $database->query($sql);
        
        if ($result->num_rows > 0) {
          $found = $result->fetch_all(MYSQLI_ASSOC);
          
          /* Metodo alternativo
          $found = array();
          while ($row = $result->fetch_assoc()) {
            array_push($found, $row);
          } */
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
 *  Exclusão de um Cliente
 */
function deleteUser($id = null) {
  global $usuario;
  $usuario = removeUser('usuario', $id);
  header('location: index.php');
}

/**
 *  Remove uma linha de uma tabela pelo ID do registro
 */
function removeUser( $table = null, $id = null ) {
  $database = open_database();
	
  try {
    if ($id) {
      $sql1 = "DELETE FROM usuario WHERE usuario.CPF = " . $id;
      $sql2 = "DELETE FROM pessoa WHERE pessoa.CPF = " . $id;
      //$result = $database->query($sql1);
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