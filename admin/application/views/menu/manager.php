<h1>Руководители</h1>
<h2><small>Добавить руководителя</small></h2>
<div class="container">
	<form class="form-horizontal" role="form" method="POST" id="form_article">
		<div class="form-group col-sm-12" style="padding:0;">
			<div class="col-sm-10">
				<input name="full_name" id="full_name" type="text" class="form-control" placeholder="Полное имя" />
			</div>
			<div class="col-sm-2">
				<button type="button" onclick="add()" class="btn btn-primary ">Добавить руководителя</button>
			</div>
		</div>
	</form>
</div>
<p id="error" style="display:none; padding: 10px 20px; margin-left: 10px;" class="bg-success bg-rounded col-sm-12"></p>
<h2><small>Список руководителей</small></h2>
<div class="container" id="res">
	<table class="table table-striped">
		<thead>
			<th>ФИО руководители</th>
			<th>Количество курируемых проектов</th>
			<th>Действия</th>
		</thead>
		<tbody>
			<?php if($mang): ?>
			<?php foreach($mang as $item): ?>
			<tr>
				<td valign="center"><?php echo $item['full_name']?></td>
				<td valign="center">
					<?php if (isset($item['count'])) { echo $item['count']; } else { echo "0"; } ?>
				</td> 
				<td valign="center"><button class="btn btn-warning btn-xs">
						<span class="glyphicon glyphicon-pencil"></span> Изменить
					</button><button onclick="del(<?php echo $item['id_manager']; ?>)" class="delete btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Удалить</button>
				</td>
			</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<td colspan="4"><center>Добавьте руководителя</center></td>
			<?php endif; ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
function add() {
	var full_name = document.getElementById('full_name').value;
	$.ajax({
		type: "POST",
		url: "/Insert/manager",
		data: {	full_name:full_name },
		dataType: "html",
		beforesend: $(function () {
			$("#res").html("<center><img src='<?php echo URL::base(); ?>public/image/system/load.gif' style='margin:50px;' /></center>");
		}),
		success: function(data) {
			$('#form_article').trigger('reset');
			$("#res").html(data);
			$("#error").html("Руководитель успешно добавлен!");
			$("#error").fadeIn(100,function() { $("#error").fadeOut(3000); }); 
		}
	}); 
};
function del(id) {
	$.ajax({
		type: "POST",
		url: "/Delete/manager",
		data: {	id:id },
		dataType: "html",
		beforesend: $(function () {
			$("#res").html("<center><img src='<?php echo URL::base(); ?>public/image/system/load.gif' style='margin:50px;' /></center>");
		}),
		success: function(data) {
			$("#res").html(data);
		}
	});
}
</script>