<div class="alert alert-danger col-sm-12" id="error" style="display:none;"></div>
<h1>Пользователи</h1>
<h2><small>Добавить пользователя</small></h2>
<div class="container">
	<form action="/Insert/add_view" class="form-horizontal" role="form" method="POST" id="form_article">
		<div class="form-group col-sm-12">
			<label class="control-label">Полное имя:</label>
			<input type="text" class="form-control" id="fatherName" placeholder="Введите полное имя">
		</div>
		<div class="form-group col-sm-12" style="padding:0;">
			<div class="col-sm-6">
				<label class="control-label">Адрес e-mail:</label>
				<input name="view" type="text" class="form-control" placeholder="E-Mail" />
			</div>
			<div class="col-sm-6">
				<label class="control-label">Пароль:</label>
				<input name="view" type="password" class="form-control" placeholder="Пароль" />
			</div>
		</div>
		<div class="form-group col-sm-12" style="padding:0;">
			<div class="col-sm-6">
				<label class="control-label">Группа:</label>
				<select class="form-control">
					<?php 
					foreach ($group as $value) {
						echo "<option value='".$value['id_group']."' >".$value['group']."</option>";
					}
					?>
				</select>
			</div>
			<div class="col-sm-6">
				<label class="control-label">Год поступления:</label>
				<select class="form-control">
					<?php	for ($i=1990; $i <= date('Y'); $i++) {
						if ($i == (date('Y')-4)) { $selected = " selected "; } else { $selected = ''; };
						echo "<option ".$selected." >".$i."</option>";
					} ?>
				</select>
			</div>
		</div>
		<div class="form-group col-sm-12 text-right">
			<div class="btn-group">
				<input type="reset" class="btn btn-default" value="Очистить форму">
				<input type="submit" class="btn btn-primary" value="Зарегестрировать пользователя">
			</div>
		</div>
	</form>
</div>
<div class="form-group col-sm-12" style="padding: 0; margin-top: 30px;">
	<h2 class="col-sm-8"><small>Список пользователей</small></h2>
	<div class="input-group col-sm-4 text-right" style="padding: 10px 15px 0 0;">
		<input type="text" class="form-control" placeholder="Поиск">
		<span class="input-group-btn">
      		<button class="btn btn-primary" type="button">Поиск</button>
     	</span>
	</div>
</div>
<div class="container">
	<ul class="nav nav-tabs" style="margin-right: 30px;">
  		<li class="active"><a href="#">Все</a></li>
  		<li><a href="#">Неподтвержденные</a></li>
	</ul>
	<div class="container col-sm-12" style="padding:0 30px 0 0;">
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
							<button onclick="del(<?php echo $item['id_user']; ?>)" class="delete btn btn-danger btn-xs">
								<span class="glyphicon glyphicon-trash"></span> Удалить
							</button>
							<button onclick="info(<?php echo $item['id_user']; ?>)" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-info btn-xs">
								<span class="glyphicon glyphicon-info-sign"></span> Подробно
							</button>
						</div>
					</td>
				</tr>
				<?php endforeach; ?>
				<?php else: ?>
					<td colspan="8"><center>Добавьте пользователя</center></td>
				<?php endif; ?>
			</tbody>
		</table>
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



	$("#form_article").submit(function(){ 
	var form = $(this);
	
	$("[type=submit]",form).attr('disabled','disabled'); 
	$("#error").empty().hide();
	
	var view = $('[view=view]',form).val(); 
	// var description = $('[name=description]',form).val(); // берем текст из формы
	/** Если не заполнены поля - то выводим ошибку */
	if(view == ''){
		$("#error").html('Ошибка валидации формы!').slideDown();
		$("[type=submit]",form).removeAttr('disabled');
		return false;
	}
	$.ajax({ 
			type: "POST", // будем передавать данные через POST
			url: form.attr('action'), // берем адрес отправки формы и передаем туда наши данные аяксом
			data: form.serialize(), // серриализируем данные
			dataType: "json", // указываем, что нам вернется JSON
			beforeSend: function(){
				$("#loading").slideDown(); // показываем индикатор загрузки
			},
			success: function(data) { // когда получаем ответ
				if(!data.error){ // Если ошибки нет, то выводим список статей
					// Если есть статьи - то будем их выводить
					if(data.content){
						var html = '';
						for(var A in data.content){
							var item = data.content[A];
							html += '<tr><td>'+item.id+'</td><td>'+item.name+'</td><td><a class="delete btn btn-danger"href="/articles/delete/'+item.id+'">Удалить</a></td></tr>';
						}
						$('table.articles tbody').html(html);
					}
					form.trigger('reset');
				}else{
					$("#error").html(data.message).slideDown();
				}
				
				$("[type=submit]",form).removeAttr('disabled');
				$("#loading").slideUp();
			},
			error: function(){ // Если сервер вернул ошибку, 4хх, 5хх
				/** Выводим ошибку, делаем кнопку отправки снова активной и убираем индикатор загрузки */
				$("#error").html('Произошла ошибка').slideDown();
				$("[type=submit]",form).removeAttr('disabled');
				$("#loading").slideUp();
			}
	});
	
	return false;
});

/** Функция удаления статьи */
$('body').on('click','.delete',function(){
	var link = $(this);
	if(confirm('Вы действительно хотете удалить?')){
		$.ajax({
			type: "POST",
			url: link.attr('href'), // берем адрес из ссылки
			dataType: "json",
			success: function(data) { // когда получаем ответ
				if(!data.error){ // Если ошибки нет, то удаляем строку
					link.closest('tr').hide(function(){
						$(this).remove();
					})
				}else{ // Если сервер вернул ошибку то выводим текст ошибки
					$("#error").html(data.message).slideDown();
				}
			}
		});
	}
	return false;
});
</script>