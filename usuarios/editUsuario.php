<?php 
  require_once('functions.php'); 
  editUser();
?>

<?php include(HEADER_TEMPLATE); ?>
  <hr />
<h2>Atualizar Cliente</h2>


<form action="edit.php?id=<?php echo $usuario['cpf'];?>" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="usuario['nome']" value="<?php echo $usuario['NOME'];?>">
    </div>

    <div class="form-group col-md-4">
      <label for="campo2">CPF</label>
      <input type="text" class="form-control" name="usuario['cpf']" maxlength="14"value="<?php echo $usuario['cpf'];?>">
    </div>

  </div>
  <div class="row">
  
    
    
    <div class="form-group col-md-5">
      <label for="campo3">Cidade</label>
      <input type="text" class="form-control" name="usuario['cidade']" value="<?php echo $usuario['CIDADE'];?>">
    </div>
	
	    <div class="form-group col-md-7">
      <label for="campo1">Endereço</label>
      <input type="text" class="form-control" name="usuario['endereco']" value="<?php echo $usuario['ENDERECO'];?>">
    </div>
  </div>
  
  <div class="row">
  
    <div class="form-group col-md-5">
      <label for="campo2">Email</label>
      <input type="text" class="form-control" name="usuario['email']"  value="<?php echo $usuario['EMAIL'];?>">
    </div>
    <div class="form-group col-md-2">
    <label for="campo1">Sexo</label>
	<select type="text" class="form-control" name="usuario['sexo']">
		<option value="f">Feminino</option>
		<option value="m">Masculino</option>
	  </select>
  </div>

    
    <div class="form-group col-md-5">
      <label for="campo2">Telefone</label>
      <input type="text" class="form-control" name="usuario['telefone']" value="<?php echo $usuario['TELEFONE'];?>">
      <br></br>
    </div>     
  </div>
  
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>