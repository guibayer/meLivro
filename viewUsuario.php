<?php 
	require_once('functionsUsuario.php'); 
	viewUser($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<hr>

<form>
  <div class="form-group row">
	<div class="col">
		<label for="staticEmail" class="col-sm-2 col-form-label">Nome</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $usuario['NOME']; ?>" readonly>
		</div>
	</div>
	<div class="col">
		<label for="staticpass" class="col-sm-2 col-form-label">CPF</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $usuario['cpf']; ?>" readonly>
		</div>
	</div>
	<div class="col">
		<label for="staticEmail" class="col-sm-2 col-form-label">Sexo</label>
		<div class="col-sm-10">
			<?php if($usuario['SEXO'] == 'f'){ ?>
				<input class="form-control" type="text" placeholder="Feminino" readonly>
			<?php } else { ?>
				<input class="form-control" type="text" placeholder="Masculino" readonly>
			<?php }?>	
		</div>
	</div>
  </div>
  <div class="form-group row">
	<div class="col">
		<label for="staticpass" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $usuario['EMAIL']; ?>" readonly>
		</div>
	</div>
	<div class="col">
		<label for="staticpass" class="col-sm-2 col-form-label">Telefone</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $usuario['TELEFONE']; ?>" readonly>
		</div>
	</div>
  </div>
  <div class="form-group row">
	<div class="col">
		<label for="staticpass" class="col-sm-2 col-form-label">Endereço</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $usuario['ENDERECO']; ?>" readonly>
		</div>
	</div>
	<div class="col">
		<label for="staticpass" class="col-sm-2 col-form-label">Cidade</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $usuario['CIDADE']; ?>" readonly>
		</div>
	</div>
  </div>
</form>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="editUsuario.php?id=<?php echo $usuario['cpf']; ?>" class="btn btn-primary">Editar</a>
	  <a href="indexUsuario.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>