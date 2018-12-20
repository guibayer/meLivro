<?php 
  require_once('functionsProdutos.php'); 
  editProduto();
?>

<?php include(HEADER_TEMPLATE); ?>
  <hr />
<h2>Atualizar Produto</h2>
<form action="editProduto.php?id=<?php echo $produto['CODPROD'];?>" method="post">
 	  <hr />
	  <div class="row">
		<div class="form-group col-md-7">
		  <label for="name">Titulo</label>
		  <input type="text" class="form-control" name="produto['titulo']" value="<?php echo $produto['TITULO'];?>">
		</div>

		<div class="form-group col-md-4">
		  <label for="campo2">Preço</label>
		  <input type="number" class="form-control" name="produto['preco']" value="<?php echo $produto['PRECO'];?>" value="1" min="1">
		</div>

		<div class="form-group col-md-4">
		  <label for="campo3">Descrição</label>
		  <input type="text" class="form-control" name="produto['descricao']" maxlength="15" value="<?php echo $produto['DESCRICAO'];?>">
		</div>
		<div class="form-group col-md-7">
		  <label for="campo1">Imagem</label>
		  <input type="text" class="form-control" name="produto['imagem']" value="<?php echo $produto['IMAGEM'];?>">
		</div>

	  </div>
	  
	  
	<?php 
	$database = open_database();
	if ($produto['TIPOPRODUTO'] == 0) {
	$sqlresult = mysqli_query($database, "SELECT * FROM revista WHERE revista.CODPROD = '{$produto["CODPROD"]}'");
	$result = mysqli_fetch_array($sqlresult);
	?>
		<div class="row">
			<div class="form-group col-md-5">
				<label for="campo2">ISSN</label>
				<input type="text" class="form-control" name="produto['issn']"  value="<?php echo $result['ISSN'];?>">
			</div>
			
			
			<div class="form-group col-md-5">
				<label for="campo3">Editora</label>
				<input type="text" class="form-control" name="produto['editora']" value="<?php echo $result['EDITORA'];?>">
			</div>
		</div>
	<?php }elseif($produto['TIPOPRODUTO'] == 1) {
		$sqlresult = mysqli_query($database, "SELECT * FROM paper WHERE paper.CODPROD = '{$produto["CODPROD"]}'");
		$result = mysqli_fetch_array($sqlresult);
		?>
		<div class="row">
		
			<div class="form-group col-md-5">
				<label for="campo2">Autor</label>
				<input type="text" class="form-control" name="produto['autor']"  value="<?php echo $result['AUTOR'];?>">
			</div>
			
			
			<div class="form-group col-md-5">
				<label for="campo3">Coautor</label>
				<input type="text" class="form-control" name="produto['coautor']" value="<?php echo $result['COAUTOR'];?>">
			</div>
		</div>
		<div class="row">
		
			<div class="form-group col-md-5">
				<label for="campo2">Área de conhecimento</label>
				<input type="text" class="form-control" name="produto['areadeconhecimento']"  value="<?php echo $result['AREA_CONHECIMENTO'];?>">
			</div>
			
			
			<div class="form-group col-md-3">
				<label for="campo3">Ano de publicação</label>
				<input type="number" class="form-control" name="produto['anodepublicacao']" value="<?php echo $result['ANO_PUBLICACAO'];?>" min="1910">
			</div>
			
			<div class="form-group col-md-3">
				<label for="campo3">Instituição</label>
				<input type="text" class="form-control" name="produto['instituicao']" value="<?php echo $result['INSTITUICAO'];?>">
			</div>
		</div>
		<?php }elseif($produto['TIPOPRODUTO'] == 2){ 
		$sqlresult = mysqli_query($database, "SELECT * FROM livro WHERE livro.CODPROD = '{$produto["CODPROD"]}'");
		$result = mysqli_fetch_array($sqlresult);
		?>
		<div class="row">
		
			<div class="form-group col-md-5">
			  <label for="campo2">Autor</label>
			  <input type="text" class="form-control" name="produto['autor']"  value="<?php echo $result['AUTOR'];?>">
			</div>
			
			
			<div class="form-group col-md-3">
			  <label for="campo3">ISBN</label>
			  <input type="text" class="form-control" name="produto['isbn']" value="<?php echo $result['ISBN'];?>" min="1910">
			</div>
			
			<div class="form-group col-md-3">
			  <label for="campo3">Edição</label>
			  <input type="number" class="form-control" name="produto['edicaodolivro']" value="<?php echo $result['EDICAO'];?>">
			</div>
		</div>
		<?php } ?>
	  
	  <div id="actions" class="row">
		<div class="col-md-12">
		  <button type="submit" name="submit" class="btn btn-primary">Salvar</button>
		  <a href="index.php" class="btn btn-default">Cancelar</a>
		</div>
	  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>