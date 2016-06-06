<p id="error" style="display:none; padding: 10px 20px; margin-left: 10px;" class="bg-danger bg-rounded col-sm-12"></p>
<h1>Специальности</h1>
<h2><small>Добавить специальность</small></h2>
<div class="container">
	<form class="form-horizontal" role="form" method="POST" id="form_article">
		<div class="form-group col-sm-12" style="padding:0;">
			<div class="col-sm-4">
				<input name="view" type="text" class="form-control" id="cod" placeholder="Код специальности" />
			</div>
			<div class="col-sm-6">
				<input name="view" type="text" class="form-control" id="title" placeholder="Название" />
			</div>
			<div class="col-sm-2">
				<button type="button" onclick="add()" class="btn btn-primary ">Добавить специальность</button>
			</div>
		</div>
	</form>
</div>
<h2><small>Список специальностей</small></h2>
<div class="container" id="res">
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
				<td valign="center"><button onclick="del(<?php echo $item['cipher']; ?>)" class="delete btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span>&nbspУдалить</button></td>
			</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<td colspan="4"><center>Добавьте специальность</center></td>
			<?php endif; ?>
		</tbody>
	</table>
</div>


<script type="text/javascript">
function add() {
	var cod = document.getElementById('cod').value;
	var title = document.getElementById('title').value;
	$.ajax({
		type: "POST",
		url: "/Insert/specialties",
		data: {	cod:cod,
				title:title },
		dataType: "html",
		beforesend: function () {
			$("#res").html("<center><img src='<?php echo URL::base(); ?>public/image/system/load.gif' style='margin:50px;' /></center>");
		},
		success: function(data) {
			$("#res").html(data);
		}
	});
};

function del(id) {
	$.ajax({
		type: "POST",
		url: "/Delete/specialties",
		data: {	id:id },
		dataType: "html",
		beforesend: function () {
			$("#res").html("<center><img src='<?php echo URL::base(); ?>public/image/system/load.gif' style='margin:50px;' /></center>");
		},
		success: function(data) {
			$("#res").html(data);
		}
	});
}
</script>