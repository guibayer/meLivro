<?php
	require_once('../config.php');
	include(HEADER_TEMPLATE);
	require_once('functionsProdutos.php'); 
	viewProdutoportipo($_GET['id']);
?>
<div class="container">

    <hgroup class="mb20">
		<h1>Resultados da Busca</h1>
		<h2 class="lead"> Resultados encontrados para a busca 
		<?php if($_GET['id'] == '0'){ //Revista?>
			<strong class="text-danger">Revistas</strong></h2>								
		<?php } elseif($_GET['id'] == '1'){ ?>
			<strong class="text-danger">Artigos</strong></h2>
		<?php }elseif($_GET['id'] == '2'){?>
			<strong class="text-danger">Livros</strong></h2>
		<?php }?>	
		
	</hgroup>

    <section class="col-xs-12 col-sm-6 col-md-12">
		<?php if ($produtos) : 
			$tmp = 1;
		?>
		<?php foreach ($produtos as $produtoaux) : 
			viewProduto($produtoaux['CODPROD']);
			if($produto['TIPOPRODUTO'] == '0'){ //Revista?>
			<article class="search-result row">
				<div class="col-xs-12 col-sm-12 col-md-3">
					<a href="viewProduto.php?id=<?php echo $produto['CODPROD']; ?>" title="resultbusca" class="thumbnail">
						<img src="upload/<?php echo $produto["IMAGEM"]; ?>"  height="200px" width="150px" alt="resultbusca" />
					</a>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-2">
					<h6><?php echo $produto['TITULO']; ?></h6>
					<span class="bfilt-l-i-text js-filter-highlight-text"><?php echo $produto['EDITORA']; ?></span>
					<br></br>
					<button class="btn btn-sm btn-outline">R$ <?php echo $produto['PRECO']; ?></button>				
				</div>
				<div class="col-xs-12 col-sm-12 col-md-7">
					<ul class="meta-search">
						<li><i class="glyphicon glyphicon-tags"></i> <span>Anunciado por:</span></li> 
						<img src="imagem/icon_user.png"  alt="useraccount" title="useraccount" height="99px"> 
						<li><i class="glyphicon glyphicon-tags"></i> <span>Pedro</span></li>
					</ul>
				</div>
			</article>

		<?php } elseif($produto['TIPOPRODUTO'] == '1'){ ?>
			<article class="search-result row">
				<div class="col-xs-12 col-sm-12 col-md-3">
					<a href="viewProduto.php?id=<?php echo $produto['CODPROD']; ?>" title="resultbusca" class="thumbnail">
						<img src="upload/<?php echo $produto["IMAGEM"]; ?>"  height="200px" width="150px" alt="resultbusca" />
					</a>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-2">
					<h6><?php echo $produto['TITULO']; ?></h6>
					<span class="bfilt-l-i-text js-filter-highlight-text"><?php echo $produto['AUTOR']; ?></span>
					<br></br>
					<button class="btn btn-sm btn-outline">R$ <?php echo $produto['PRECO']; ?></button>				
				</div>
				<div class="col-xs-12 col-sm-12 col-md-7">
					<ul class="meta-search">
						<li><i class="glyphicon glyphicon-tags"></i> <span>Anunciado por:</span></li> 
						<img src="imagem/icon_user.png"  alt="useraccount" title="useraccount" height="99px"> 
						<li><i class="glyphicon glyphicon-tags"></i> <span>Pedro</span></li>
					</ul>
				</div>
			</article>
		
		<?php }elseif($produto['TIPOPRODUTO'] == '2'){?>
			<article class="search-result row">
				<div class="col-xs-12 col-sm-12 col-md-3">
					<a href="viewProduto.php?id=<?php echo $produto['CODPROD']; ?>" title="resultbusca" class="thumbnail">
						<img src="upload/<?php echo $produto["IMAGEM"]; ?>"  height="200px" width="150px" alt="resultbusca" />
					</a>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-2">
					<h6><?php echo $produto['TITULO']; ?></h6>
					<span class="bfilt-l-i-text js-filter-highlight-text"><?php echo $produto['AUTOR']; ?></span>
					<br></br>
					<button class="btn btn-sm btn-outline">R$ <?php echo $produto['PRECO']; ?></button>				
				</div>
				<div class="col-xs-12 col-sm-12 col-md-7">
					<ul class="meta-search">
						<li><i class="glyphicon glyphicon-tags"></i> <span>Anunciado por:</span></li> 
						<img src="imagem/icon_user.png"  alt="useraccount" title="useraccount" height="99px"> 
						<li><i class="glyphicon glyphicon-tags"></i> <span>Pedro</span></li>
					</ul>
				</div>
			</article>		
		<?php }?>	
		<?php
			if ($tmp++ == 6) break;
			endforeach; ?>
		<?php else : ?>
			<h1>Nenhum registro encontrado.</h1>
		<?php endif; ?>
	
		
    </section>
</div>


    <nav aria-label="Page navigation" id="div1">
        <ul class="pager">
            <a href="#" aria-label="Previous">
                <button> <span aria-hidden="true">«</span></button>
            </a>
            <button ><a href="busca.html" class="active">1</a></button>
            <button><a href="#">2</a></button>
            <button><a href="#">3</a></button>
            <button><a href="#">4</a></button>
            <button><a href="#">5</a></button>
            <a href="#" aria-label="Next">
            <button><span aria-hidden="true">»</span></button>
           </a>
        </ul>
     </nav>
	 
	<?php include(FOOTER_TEMPLATE); ?>