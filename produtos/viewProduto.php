<?php 
	require_once("../config.php");
	require_once('functionsProdutos.php'); 
	viewProduto($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<?php 
	if($produto['TIPOPRODUTO'] == '0'){ //Revista?>
	<div class="conteudo">
		
		<div class="itens">
			<div class="titulolivro">
				<h1><?php echo $produto['TITULO']; ?></h1>
				
			</div>
		</div>
		 
		<img class="imagemview" src="upload/<?php echo $produto['IMAGEM']; ?>" alt="Icarus" />
		
			<div class="conteudo">
				<p class="livro-specs info-tipo">
						<span class="info-label"><h6>Tipo:</h6></span>
							<span itemprop="tipo">Revista</span>
						</a>
					</p>
					<p class="livro-specs info-isbn">
						<span class="info-label"><h6>ISSN:</h6></span> <?php echo $produto['ISSN']; ?>
					</p>    
					 <p class="livro-specs info-edicao">
						<span class="info-label"><h6>Editora:</h6></span> 
						<span itemprop="edicao"><?php echo $produto['EDITORA']; ?></span>
					</p>
				</p>     
					<p class="livro-specs info-descricao">
							<span class="info-label"><h6>Descricao:</h6></span> 
							<?php echo $produto['DESCRICAO']; ?>
						</p>      
			 </div>
			 <div class="pedido">
			   <a href="pedido.php"
					<span class="pedidoProduto"> Realizar Pedido</span> 
			   </a/>
		   </div> 
				  <p class="valorlivro">R$ <?php echo $produto['PRECO']; ?></p>

    </div>
<?php } elseif($produto['TIPOPRODUTO'] == '1'){ ?>
		<div class="conteudo">
		
		<div class="itens">
			<div class="titulolivro">
				<h1><?php echo $produto['TITULO']; ?></h1>
				
			</div>
		</div>
		 
		<img src="upload/<?php echo $produto['IMAGEM']; ?>" class="imagemview" alt="Icarus" />
		
			<div class="conteudo">
				<p class="livro-specs info-tipo">
						<span class="info-label"><h6>Tipo:</h6></span>
							<span itemprop="tipo">Paper</span>
						</a>
					</p>
					<p class="livro-specs info-isbn">
						<span class="info-label"><h6>Autor:</h6></span> <?php echo $produto['AUTOR']; ?>
					</p>    
					 <p class="livro-specs info-edicao">
						<span class="info-label"><h6>Ano de publicação:</h6></span> 
						<span itemprop="edicao"><?php echo $produto['ANO_PUBLICACAO']; ?></span>
					</p>
				</p>     
					<p class="livro-specs info-descricao">
							<span class="info-label"><h6>Descricao:</h6></span> 
							<?php echo $produto['DESCRICAO']; ?>
						</p>      
			 </div>
			 <div class="pedido">
			   <a href="pedido.php"
					<span class="pedidoProduto"> Realizar Pedido</span> 
			   </a/>
		   </div> 
				  <p class="valorlivro">R$ <?php echo $produto['PRECO']; ?></p>

    </div>
<?php }elseif($produto['TIPOPRODUTO'] == '2'){?>
	<div class="conteudo">
		
		<div class="itens">
			<div class="titulolivro">
				<h1><?php echo $produto['TITULO']; ?></h1>
				
			</div>
		</div>
		 
		<img src="upload/<?php echo $produto['IMAGEM']; ?>" alt="Icarus" class="imagemview"/>
		
			<div class="conteudo">
				<p class="livro-specs info-tipo">
						<span class="info-label"><h6>Tipo:</h6></span>
							<span itemprop="tipo">Livro</span>
						</a>
					</p>
					<p class="livro-specs info-isbn">
						<span class="info-label"><h6>Autor:</h6></span> <?php echo $produto['AUTOR']; ?>
					</p>   
					<p class="livro-specs info-isbn">
						<span class="info-label"><h6>ISBN:</h6></span> <?php echo $produto['ISBN']; ?>
					</p>    
					 <p class="livro-specs info-edicao">
						<span class="info-label"><h6>Edição:</h6></span> 
						<span itemprop="edicao"><?php echo $produto['EDICAO']; ?></span>
					</p>
				</p>     
					<p class="livro-specs info-descricao">
							<span class="info-label"><h6>Descricao:</h6></span> 
							<?php echo $produto['DESCRICAO']; ?>
						</p>      
			 </div>
			 <div class="pedido">
			   <a href="pedido.php"
					<span class="pedidoProduto"> Realizar Pedido</span> 
			   </a/>
		   </div> 
				  <p class="valorlivro">R$ <?php echo $produto['PRECO']; ?></p>

    </div>
<?php }?>	



<?php include(FOOTER_TEMPLATE); ?>