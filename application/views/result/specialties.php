<table class="table table-striped">
	<thead>
		<th>Код специальности</th>
		<th>Название</th>
		<th>Действия</th>    
	</thead>
	<tbody>
		<?php if($spec): ?>
		<?php foreach($spec as $item): ?>
		<tr>
			<td valign="bottom"><?php echo $item['cipher']?></td>
			<td valign="center"><?php echo $item['title_spec']?></td>
				<td valign="center"><button onclick="del(<?php echo $item['cipher']; ?>)" class="delete btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span>Удалить</button></td>
		</tr>
		<?php endforeach; ?>
		<?php else: ?>
			<td colspan="4"><center>Добавьте специальность</center></td>
		<?php endif; ?>
	</tbody>
</table>