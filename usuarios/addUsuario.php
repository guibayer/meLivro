<?php 
  require_once('functions.php'); 
  addUser();
?>

<?php include(HEADER_TEMPLATE); ?>
 <body>
 	<hr>
	<hr>
    <div id = "conteudo">
    <h2 class="display-3"> Novo Usuario </h2>

<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="usuario['nome']" placeholder="Digite seu nome">
    </div>

    <div class="form-group col-md-4">
      <label for="campo2">CPF</label>
      <input type="text" class="form-control" name="usuario['cpf']" placeholder="Digite seu CPF" maxlength="14">
    </div>

    <div class="form-group col-md-4">
      <label for="campo3">Senha</label>
      <input type="password" class="form-control" name="usuario['senha']" maxlength="15" placeholder="Digite sua senha">
    </div>
    <div class="form-group col-md-7">
      <label for="campo1">Endereço</label>
      <input type="text" class="form-control" name="usuario['endereco']" placeholder="Digite seu endereco">
    </div>

  </div>
  <div class="row">
  
    
    <div class="form-group col-md-5">
      <label for="campo2">Email</label>
      <input type="text" class="form-control" name="usuario['email']"  placeholder="Digite seu e-mail">
    </div>
    
    
    <div class="form-group col-md-5">
      <label for="campo3">Cidade</label>
      <input type="text" class="form-control" name="usuario['cidade']" placeholder="Digite sua cidade">
    </div>
  </div>
  
  <div class="row">
    <div class="form-group col-md-2">
    <label for="campo1">Sexo</label>
	<select type="text" class="form-control" placeholder="F/M" name="usuario['sexo']">
		<option value="f">Feminino</option>
		<option value="m">Masculino</option>
	  </select>
  </div>

    
    <div class="form-group col-md-5">
      <label for="campo2">Telefone</label>
      <input type="text" class="form-control" name="usuario['telefone']" placeholder="Digite seu telefone">
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
</body>

<?php include(FOOTER_TEMPLATE); ?>