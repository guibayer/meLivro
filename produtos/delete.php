<?php 
  require_once('functionsProdutos.php'); 
  if (isset($_GET['id'])){
    deleteProduto($_GET['id']);
  } else {
    die("ERRO: ID não definido.");
  }
?>