<p id="error" style="display:none; padding: 10px 20px; margin-left: 10px;" class="bg-danger bg-rounded col-sm-12"></p>
<h1>Группы</h1>
<h2><small>Добавить группу</small></h2>
<div class="container">
	<form class="form-horizontal" role="form" method="POST" id="form_article">
		<div class="form-group">
		<div class="col-sm-4">
			<input id="numbgr" type="text" class="form-control" placeholder="Номер группы" />
		</div>
		<div class="col-sm-4">
			<input id="year" type="date" class="form-control" />
		</div>
		<div class="col-sm-4">
			<select class="form-control col-sm-4" id="spec">
				<?php 
				foreach ($specialty as $value) {
					echo "<option>".$value['cipher']."</option>";
				}
				?>
			</select>
		</div>
		</div>
		<div class="form-group">
		<div class="col-sm-2 col-sm-offset-10" align="right">
			<button type="button" onclick="add()" class="btn btn-primary ">Добавить группу</button>
		</div>
		</div>
	</form>
</div>
<h2><small>Список групп</small></h2>
<div class="container" id="res">
	<?php echo $content; ?>
</div>


<script type="text/javascript">
function add() {
	var numbgr = document.getElementById('numbgr').value;
	var year = document.getElementById('year').value;
	var spec = document.getElementById('spec').value;
	$.ajax({
		type: "POST",
		url: "/Insert/group",
		data: {	numbgr:numbgr,
			year:year,
			spec:spec },
		dataType: "html",
		beforesend: function() {
			$("#res").html("<center><img src='/public/image/system/load.gif' style='margin:50px;' /></center>");
		},
		success: function(data) {
			$("#res").html(data);
		}
	}); 
};
function del(id) {
	$.ajax({
		type: "POST",
		url: "/Delete/group",
		data: {	id:id },
		dataType: "html",
		beforesend: function() {
			$("#res").html("<center><img src='/public/image/system/load.gif' style='margin:50px;' /></center>");
		},
		success: function(data) {
			$("#res").html(data);
		}
	});
}
</script>