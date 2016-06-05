<p id="error" style="display:none; padding: 10px 20px; margin-left: 10px;" class="bg-danger bg-rounded col-sm-12"></p>
<h1>Руководители</h1>
<h2><small>Добавить руководителя</small></h2>
<div class="container">
	<form action="/Insert/add_view" class="form-horizontal" role="form" method="POST" id="form_article">
		<div class="form-group col-sm-12" style="padding:0;">
			<div class="col-sm-4">
				<input name="view" type="text" class="form-control" placeholder="Код специальности" />
			</div>
			<div class="col-sm-6">
				<input name="view" type="text" class="form-control" placeholder="Название" />
			</div>
			<div class="col-sm-2">
				<button type="submit" class="btn btn-primary ">Добавить руководителя</button>
			</div>
		</div>
	</form>
</div>
<h2><small>Список руководителей</small></h2>
<div class="container">
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
				<td valign="center"><?php if (isset($item['count'])) { echo $item['count']; } else { echo "0"; } ?></td> <td valign="center"><button onclick="del(<?php echo $item['id_manager']; ?>)" class="delete btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Удалить</button></td>
			</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<td colspan="4"><center>Добавьте руководителя</center></td>
			<?php endif; ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
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