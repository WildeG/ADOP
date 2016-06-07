<table class="table table-striped">
	<thead>
		<th>№</th>
		<th>ФИО</th>
		<th>E-mail</th>
		<th>Группа</th>
		<th>Дата поступления</th>
		<th>Активация</th>
		<th>Действия</th>
	</thead>
	<tbody>
		<?php if(isset($user)): ?>
		<?php foreach($user as $item): ?>
		<tr>
			<td style="vertical-align:middle;"><?php echo $item['id_user']?></td>
			<td style="vertical-align:middle;"><?php echo $item['full_name']?></td>
			<td style="vertical-align:middle;"><?php echo $item['e-mail']?></td>
			<td style="vertical-align:middle;"><?php echo $item['group']?></td>
			<td style="vertical-align:middle;"><?php echo date("d.m.Y", strtotime($item['date_receipt']))?></td>
				<td style="vertical-align:middle;"><?php if ($item['active']==1) { echo "<span class='label label-success' style='padding:5px; font-size: 11px;'><span class='glyphicon glyphicon-ok'></span> Подтвержден</span>"; } else {echo "<span class='label label-default' style='padding:5px; font-size: 11px;'>Ожидание<span>"; } ?></td> 
			<td style="vertical-align:middle;">
				<div class="btn-group" style="padding:0;">
					<button onclick="del(<?php echo $item['id_user']; ?>)" class="delete btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-trash"></span> Удалить
					</button>
					<button onclick="info(<?php echo $item['id_user']; ?>)" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-info btn-xs">
						<span class="glyphicon glyphicon-info-sign"></span> Подробно
					</button>
					<?php if ($item['active']==0) {
								echo "<button onclick='confirm(".$item['id_user'].")' class='btn btn-success btn-xs'> <span class='glyphicon glyphicon-ok'></span> Подтвердить </button>"; } ?>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
		<?php else: ?>
			<td colspan="8"><center>Добавьте пользователя</center></td>
		<?php endif; ?>
	</tbody>
</table>