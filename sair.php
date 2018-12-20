<?php
	session_start();
	unset($_SESSION["cpf"]);
	unset($_SESSION["nome"]);
	unset($_SESSION["admin"]);
	unset($_SESSION["senha"]);
	session_destroy();
	header("Location: index.php");
?>