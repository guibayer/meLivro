<?php 
  require_once('functions.php'); 
  if (isset($_GET['id'])){
    deleteUser($_GET['id']);
  } else {
    die("ERRO: ID não definido.");
  }
?>