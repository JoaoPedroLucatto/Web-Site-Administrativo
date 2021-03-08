

<div class="row">
    <div class="s12">
        <div class="sub-header">
            <a class="title-sub-header"><img src="../../../../images/icons/folder-black.png">Projetos</a>
        </div>
    </div>
</div>


<form method="GET" action="controlador.php">
	<div class="col s12 iframe-content">
		<?php

		$sql = "SELECT id, titulo, datahorainclusao FROM projetos WHERE id_statusregistro IN (1, 2) ORDER BY id_statusregistro";
		$array_return = true; 
		$query = sqlQueries($conn, $sql, $array_return);
		$count = ($query ? 0 : count($query));

			if ($count > 0) {
		?>
				<table class="striped highlight tablesorter">
					<thead>
						<tr>
							<th class="no-sort"> <label> <input type="checkbox" class="check-all"> <span></span> </label> </th>
							<th data-column='1' class="hide-on-med-and-down">ID</th>
							<th data-column='2'>Nome Completo</th>
							<th data-column='3' class="hide-on-med-and-down">Data Inclusão</th>
						</tr>
					</thead>
					<tbody>
		<?php
					foreach($query as $listar){
		?>
							<tr>
							<td class="no-search"> <label> <input type="checkbox" name="row_id[]" class="check-table" value="<?php echo $listar['id']; ?>"> <span></span> </label> </td>
							<td data-column='1' class="hide-on-med-and-down"> <?php echo $listar['id']; ?> </td>
							<td data-column='2'> <?php echo $listar['titulo']; ?> </td>
							<td data-column='3' class="hide-on-med-and-down"> <?php echo $listar['datahorainclusao']; ?> </td>
							</tr>
		<?php
					}
		?>
					</tbody>
				</table>
		<?php
			}

			else {
		?>
				<div class="col s12 datatable-null">
					<span>Nenhum Usuário foi encontrado...</span>
				</div>
		<?php
			}
		?>
	</div>


	<div class="iframe-footer">
		<button type="submit" class="red darken-2 right" name="trigger" value="delete" disabled> <img src="../../../../images/icons/delete_white.png"> Excluir</button>
		<button type="submit" class="blue darken-3 right" name="trigger" value="edit" disabled> <img src="../../../../images/icons/mode_edit_white.png"> Editar</button>
		<button type="submit" class="green darken-2 right" name="trigger" value="new"><img src="../../../../images/icons/check-white.png"> Incluir</button>
	</div>
</form>