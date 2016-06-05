<table class="table table-striped">
	<thead>
		<th>Номер</th>
		<th>Вид проекта</th> 
		<th>Действия</th>    
	</thead>
	<tbody>
		<?php if($view): ?>
		<?php foreach($view as $item): ?>
		<tr>
			<td valign="bottom"><?php print $item['id_view']?></td>
			<td valign="center"><?php print $item['view']?></td>
			<td valign="center"><button onclick="del(<?php echo $item['id_view']; ?>)" class="delete btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Удалить</button></td>
		</tr>
		<?php endforeach; ?>
		<?php else: ?>
			<td colspan="4"><center>Добавьте статью</center></td>
		<?php endif; ?>
	</tbody>
</table>