<div class="alert alert-danger col-sm-12" id="error" style="display:none;"></div>
<h1>Пользователи</h1>
<h2><small>Добавить пользователя</small></h2>
<div class="container">
	<form class="form-horizontal" role="form" method="POST" id="form_article">
		<div class="form-group col-sm-12">
			<label class="control-label">Полное имя:</label>
			<input type="text" class="form-control" id="full_name" placeholder="Введите полное имя">
		</div>
		<div class="form-group col-sm-12" style="padding:0;">
			<div class="col-sm-6">
				<label class="control-label">Адрес e-mail:</label>
				<input name="view" type="text" id="e_mail" class="form-control" placeholder="E-Mail" />
			</div>
			<div class="col-sm-6">
				<label class="control-label">Пароль:</label>
				<input name="view" type="password" id="password" class="form-control" placeholder="Пароль" />
			</div>
		</div>
		<div class="form-group col-sm-12" style="padding:0;">
			<div class="col-sm-6">
				<label class="control-label">Группа:</label>
				<select class="form-control" id="group">
					<?php 
					foreach ($group as $value) {
						echo "<option value='".$value['id_group']."' >".$value['group']."</option>";
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group col-sm-12 text-right">
			<div class="btn-group">
				<input type="reset" class="btn btn-default" value="Очистить форму">
				<input type="button" onclick="add()" class="btn btn-primary" value="Добавить пользователя">
			</div>
		</div>
	</form>
</div>
<div class="form-group col-sm-12" style="padding: 0; margin-top: 30px;">
	<h2 class="col-sm-8"><small>Список пользователей</small></h2>
	<div class="input-group col-sm-4 text-right" style="padding: 10px 15px 0 0;">
		<input type="text" class="form-control" id="search" placeholder="Поиск">
		<span class="input-group-btn">
      		<button class="btn btn-primary" id="search_b" onclick="search('all')" type="button">Поиск</button>
     	</span>
	</div>
</div>
<div class="container">
	<ul class="nav nav-tabs" id="myTab" style="margin-right: 30px;">
  		<li class="active"><a onclick="first();filter('all')" href="#">Все</a></li>
  		<li><a onclick="last();filter('0')" href="#">Неподтвержденные</a></li>
	</ul>
	<div class="container col-sm-12" id="res" style="padding:0 30px 0 0;">
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
				<td style="vertical-align:middle;"><?php if ($item['active']==1) { echo "<span class='label label-success' style='padding:5px; font-size: 11px;'><span class='glyphicon glyphicon-ok'></span> Подтвержден</span>"; } else {echo "<span class='label label-default' style='padding:5px; font-size: 11px;'>Ожидание</	span>"; } ?></td> 
					<td style="vertical-align:middle;">
						<div class="btn-group" style="padding:0;">
							<button onclick="info(<?php echo $item['id_user']; ?>)" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-warning btn-xs">
								<span class="glyphicon glyphicon-pencil"></span> Изменить
							</button>
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
		<?php echo $pagination; ?>
	</div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="modal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Карточка пользователя</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
function last() {
	$('#myTab a:last').tab('show');
}
function first() {
	$('#myTab a:first').tab('show');
}
function info(id) {
	$.ajax({
		type: "POST",
		url: "/Select/id_user",
		data: {	id:id },
		dataType: "html",
		beforesend: function () {
			$("#modal").html("<center><img src='<?php echo URL::base(); ?>public/image/system/load.gif' style='margin:50px;' /></center>");
		},
		success: function(data) {
			$("#modal").html(data);
		}
	});
}

function add() {
	var full_name = document.getElementById('full_name').value;
	var e_mail = document.getElementById('e_mail').value;
	var password = document.getElementById('password').value;
	var group = document.getElementById('group').value;
	$.ajax({
		type: "POST",
		url: "/Insert/user",
		data: {	full_name:full_name,
				e_mail:e_mail,
				password:password,
				group:group },
		dataType: "html",
		beforesend: function () {
			$("#res").html("<center><img src='<?php echo URL::base(); ?>public/image/system/load.gif' style='margin:50px;' /></center>");
		},
		success: function(data) {
			$("#res").html(data);
		}
	});
};

function filter(filter) {
	
	$.ajax({
		type: "POST",
		url: "/Select/users",
		data: {	filter:filter },
		dataType: "html",
		beforesend: function () {
			$("#search_b").attr("onClick","search("+filter+")");
			$("#res").html("<center><img src='<?php echo URL::base(); ?>public/image/system/load.gif' style='margin:50px;' /></center>");
		},
		success: function(data) {
			$("#res").html(data);
		}
	});
}

function confirm(id) {
	$.ajax({
		type: "POST",
		url: "/Update/user",
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

function search(filter) {
	var search = document.getElementById('search').value;
	$.ajax({
		type: "POST",
		url: "/Select/users",
		data: {	search:search, filter:filter },
		dataType: "html",
		beforesend: function () {
			$("#res").html("<center><img src='<?php echo URL::base(); ?>public/image/system/load.gif' style='margin:50px;' /></center>");
		},
		success: function(data) {
			$("#res").html(data);
		}
	});
}

function del(id) {
	$.ajax({
		type: "POST",
		url: "/Delete/user",
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