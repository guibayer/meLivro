<?php
    require_once('functionsUsuario.php');
	indexUser();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<hr>
	<hr>
	<div class="row">
		<div class="col-sm-6">
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="html/telacadastro.html"><i class="fa fa-plus"></i> Fazer Cadastro</a>
	    	<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>

<div class="table-responsive-sm">
	<table class="table">
	<thead>
		<tr>
			<th class="table-secondary" scope="col">Nome</th>
			<th class="table-secondary" scope="col">CPF/CNPJ</th>
			<th class="table-secondary" scope="col">Telefone</th>
			<th class="table-secondary" scope="col">Email</th>
			<th class="table-secondary" scope="col">Cidade</th>
			<th class="table-secondary" scope="col">Opções</th>
		</tr>
	</thead>
	<tbody>

	<?php 
	if ($usuarios) : 
		foreach ($usuarios as $usuario) : ?>	
		<tr>
			<td scope="row"><?php echo $usuario["NOME"]; ?></td>
			<td><?php echo $usuario["CPF"]; ?></td>
			<td><?php echo $usuario["TELEFONE"]; ?></td>
			<td><?php echo $usuario["EMAIL"]; ?></td>
			<!-- <td><?php echo $usuario["SENHA"]; ?></td>  -->
			<td><?php echo $usuario["CIDADE"]; ?></td>

			<td class="table-secondary">
				<a href="viewUsuario.php?id=<?php echo $usuario['CPF']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
				<a href="editUsuario.php?id=<?php echo $usuario['CPF']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
				<a href="deleteUsuario.php?id=<?php echo $usuario['CPF']; ?>" class="btn btn-sm btn-danger">Excluir	</a>
			</td>
		</tr>
		<?php endforeach; ?>
	<?php else : ?>
		<tr>
			<td colspan="6">Nenhum registro encontrado.</td>
		</tr>
	<?php endif; ?>
	</tbody>
	</table>
</div>

<?php include(FOOTER_TEMPLATE); ?>