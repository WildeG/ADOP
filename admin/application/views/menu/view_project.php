<p id="error" style="display:none; padding: 10px 20px; margin-left: 10px;" class="bg-danger bg-rounded col-sm-12"></p>
<h1>Виды проектов</h1>
<h2><small>Добавить вид</small></h2>
<div class="container">
	<div class="col-sm-10" style="padding-left:0;">
		<input id="view" name="view" type="text" class="form-control" placeholder="Название вида" />
	</div>
	<button type="button" class="btn btn-primary col-sm-2" onclick="add()">Добавить вид</button>
</div>
<h2><small>Список видов</small></h2>
<div id="res" class="container">
	<?php echo $table; ?>
</div>


<script type="text/javascript">
function add() {
	var view = document.getElementById('view').value;
	$.ajax({
		type: "POST",
		url: "/Insert/view_project",
		data: {	view:view },
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
	if(confirm('Вы действительно хотите удалить?')){
		$.ajax({
			type: "POST",
			url: "/Delete/view_project",
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
}
</script>