

<div class="row">
    <div class="s12">
        <div class="sub-header">
            <a class="title-sub-header"><img src="../../../../images/icons/money_black.png">Contato</a>
        </div>
    </div>
</div>


<form method="GET" action="controlador.php">
	<div class="col s12 iframe-content">
		<?php

		$sql = "SELECT * FROM website_contato"; 
		$query = sqlQueries($conn, $sql, true);

			if (count($query) > 0) {
		?>
				<table class="striped highlight tablesorter">
					<thead>
						<tr>
							<th class="no-sort"> <label> <input type="checkbox" class="check-all"> <span></span> </label> </th>
							<th data-column='1' class="hide-on-med-and-down">ID</th>
							<th data-column='2'>Nome</th>
							<th data-column='3'>Evento</th>
						</tr>
					</thead>
					<tbody>
		<?php
					foreach($query as $listar){
		?>
							<tr <?php echo (($listar['visto'] == '0') ? "style='background-color: #a5d6a7;'" : '');?>>
							<td class="no-search"> <label> <input type="checkbox" name="row_id[]" class="check-table" value="<?php echo $listar['id']; ?>"> <span></span> </label> </td>
							<td data-column='1' class="hide-on-med-and-down"> <?php echo $listar['id']; ?> </td>
							<td data-column='2'> <?php echo $listar['nome']; ?> </td>
							<td data-column='3'> <?php echo $listar['evento']; ?> </td>
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
					<span>Nenhum contato foi encontrado...</span>
				</div>
		<?php
			}
		?>
	</div>


	<div class="iframe-footer">	
		<button type="submit" class="blue darken-3 right" name="trigger" value="edit" disabled> <img src="../../../../images/icons/mode_edit_white.png"> Editar</button>
	</div>
</form>