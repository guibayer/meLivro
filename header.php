<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MeLivro Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
    <script src="js/bootstrap.js"></script>
</head>



<body>
    <div class="armacao">
        <br></br>
          <a href="<?php echo BASEURL; ?>/index.php"><img src="imagem/logo1.png" alt="logo" title="MeLivro" height="95px" ></a>
        <div class="cabecalho">
			<?php	
			if(isset($_SESSION['nome'])){
				echo "<a href='#'>Olá ".$_SESSION['nome']."</a>
					  <a href='".BASEURL."/produtos/add/revista.php'><button class='button button2'>Cadastrar produto</button></a>
					  ";
				if(isset($_SESSION['admin'])){
					if($_SESSION['admin'] == 1){
						echo "<a href='indexUsuario.php'><button class='button button1'>Gerenciar Usuários</button></a>";
					}
				}
				echo "<a href='".BASEURL."/sair.php'><button class='button button3'>Sair</button></a>";
				
			}else{
				echo "<span class='info-label'>Olá Visitante</span>
                      <a href='".BASEURL."/html/telalogin.html'><button class='button button2'>Entrar</button></a>  
                      <a href='html/telacadastro.html'><button class='button button1'>Cadastre-se</button></a>
				";
			}

			?>      
           </div>

        <div class="corpo">
            
            <div class="menuContainer">
                
                <ul class="menu">
                    
                    <li>
                        <a href="<?php echo BASEURL; ?>/produtos/buscaportipo.php?id=2">Livros</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo BASEURL; ?>/produtos/buscaportipo.php?id=0">Revistas</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo BASEURL; ?>/produtos/buscaportipo.php?id=1">Artigos</a>
                    </li>
                    
                </ul>
            </div>

            </li></li>
            <br></br>

            <div class="busca">
				<form action="produtos/busca.php" method="post" class="form-inline mt-2 mt-md-0">
					<div class="input-group">
						<input type="text" class="form-control" size="95" name="palavra" placeholder="Digite o produto desejado">
						 
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" >
							<img src="imagem/searchicon.png"alt="busca" title="search"  height="15px"/>
						</button>
					</div>
				</form>
                
            </div>