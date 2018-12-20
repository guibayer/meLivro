<?php 
  require_once('../../config.php'); 
  require_once('addfuncoes.php'); 
  addPaper();
?>

<?php include(HEADER_TEMPLATE); ?>
 <body>
 	<hr>
	<hr>
	
    <div id = "conteudo">
    <h2 class="display-3"> Novo Paper</h2>
	<nav aria-label="...">
	  <ul class="pagination">
		<li class="page-item"><a class="page-link" href="revista.php">Revista</a></li>
		<li class="page-item active"><a class="page-link" href="paper.php">Paper</a></li>
		<li class="page-item"><a class="page-link" href="livro.php">Livro</a></li>
	  </ul>
	</nav>
	<form action="paper.php" method="post" enctype="multipart/form-data">
	  <hr />
	  <div class="row">
		<div class="form-group col-md-7">
		  <label for="name">Titulo</label>
		  <input type="text" class="form-control" name="titulo" placeholder="Titulo da revista">
		</div>

		<div class="form-group col-md-4">
		  <label for="campo2">Preço</label>
		  <input type="number" class="form-control" name="preco" placeholder="Preço" value="1" min="1">
		</div>

		<div class="form-group col-md-4">
		  <label for="campo3">Descrição</label>
		  <input type="text" class="form-control" name="descricao" maxlength="15" placeholder="Descrição">
		</div>
		<div class="form-group col-md-7">
		  <label for="campo1">Imagem</label>
		  <input type="file" class="form-control" name="arquivo" placeholder="Imagem">
		</div>

	  </div>
	  <div class="row">
		
		<div class="form-group col-md-5">
		  <label for="campo2">Autor</label>
		  <input type="text" class="form-control" name="autor"  placeholder="Autor">
		</div>
		
		
		<div class="form-group col-md-5">
		  <label for="campo3">Coautor</label>
		  <input type="text" class="form-control" name="coautor" placeholder="Coautor">
		</div>
	  </div>
	  <div class="row">
		
		<div class="form-group col-md-5">
		  <label for="campo2">Área de conhecimento</label>
		  <input type="text" class="form-control" name="areadeconhecimento"  placeholder="Área de conhecimento">
		</div>
		
		
		<div class="form-group col-md-3">
		  <label for="campo3">Ano de publicação</label>
		  <input type="number" class="form-control" name="anodepublicacao" value="1910" placeholder="Ex: 2002" min="1910">
		</div>
		
		<div class="form-group col-md-3">
		  <label for="campo3">Instituição</label>
		  <input type="text" class="form-control" name="instituicao" placeholder="Ex: UFPEL">
		</div>
	  </div>
	  
	  <div id="actions" class="row">
		<div class="col-md-12">
		  <button type="submit" name="submit" class="btn btn-primary">Salvar</button>
		  <a href="index.php" class="btn btn-default">Cancelar</a>
		</div>
	  </div>
	</form>
</body>

<?php include(FOOTER_TEMPLATE); ?>