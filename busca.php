<?php 
	require_once("config.php");
	include(HEADER_TEMPLATE);
	include	'produtos/functionsProdutos.php';
	indexProdutos();
?>
            
            <br></br>
            <div class="conteudo">
                
                <div class="banner">
                    
                    <img src="imagem/laranjamecanica.jpg" alt="Laranja Mecânica" height="200px"/>
                    
                    <div class="infoBanner">
                        
                        <p class="tituloBanner">
                           <a href="anunciobanner.php"> Laranja Mecânica</a>
                        </p>
                        
                        <p class="sinopseBanner">
                              Narrada pelo protagonista, o adolescente Alex, esta brilhante e perturbadora história cria uma sociedade futurista em que a violência atinge proporções gigantescas e provoca uma reposta igualmente agressiva de um governo totalitário.
                              A estranha linguagem utilizada por Alex - soberbamente engendrada pelo autor - empresta uma dimensão quase lírica ao texto.
                              Adaptado com maestria para o cinema em 1972 por Stanley Kubrick, é uma obra marcante.
                        </p>
                        
                        <p class="valorBanner">
                            R$ 25,00
                        </p>
                        
                    </div>
                    
                </div>
                
                <div class="itens">
                    
                    <h1>Produtos mais recentes</h1>
                    
						<?php if ($produtos) : 
							$tmp = 1;
						?>
						<?php foreach ($produtos as $produto) : ?>	
							<a href="produtos/viewProduto.php?id=<?php echo $produto['CODPROD']; ?>">
								<div class="itemListaConteudo">
									<img src="produtos/upload/<?php echo $produto["IMAGEM"]; ?>" height="200px" />
									<p class="tituloItemListaConteudo">
										<?php echo $produto["TITULO"]; ?>
									</p>
									<p class="valorItemListaConteudo">
										<?php echo $produto["PRECO"]; ?>
									</p>
								</div>
							</a>
						<?php 
							if ($tmp++ == 6) break;
							endforeach; ?>
						<?php else : ?>
							<h1>Nenhum registro encontrado.</h1>
						<?php endif; ?>
                    
                </div>
                
            </div>
        </div>
<?php include 'footer.php' ?>