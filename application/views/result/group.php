<table class="table table-striped">
	<thead>
		<th>Номер группы</th>
		<th>Год поступления</th>
		<th>Специальность</th>
		<th>Действия</th>    
	</thead>
	<tbody>
		<?php if($group): ?>
		<?php foreach($group as $item): ?>
		<tr>
			<td valign="bottom"><?php echo $item['group']?></td>
			<td valign="center"><?php echo date("Y", strtotime($item['date_receipt']))?></td>
			<td valign="center"><?php echo $item['title_spec']?></td>
				<td valign="center"><button class="btn btn-warning btn-xs">
						<span class="glyphicon glyphicon-pencil"></span> Изменить
					</button><button onclick="del(<?php echo $item['id_group']; ?>)" class="delete btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span>Удалить</button></td>
		</tr>
		<?php endforeach; ?>
		<?php else: ?>
			<td colspan="4"><center>Добавьте статью</center></td>
		<?php endif; ?>
	</tbody>
</table>