<p id="error" style="display:none; padding: 10px 20px; margin-left: 10px;" class="bg-danger bg-rounded col-sm-12"></p>
<h1>Отчеты</h1>
<div class="container">
	<ul class="nav nav-tabs col-xs-12" id="myTab">
  		<li class="active"><a href="#">Отчет по руководителям</a></li>
	</ul>
	<div class="container col-xs-12">
		<table class="table table-striped col-xs-12" style="margin-top:10px;">
		<thead>
			<th>Руководитель</th>
			<th>Пользователь</th>
			<th>Вид проекта</th>
			<th>Количество проектов</th>
		</thead>
		<tbody>
		<?php
		foreach ($report as $key => $value) {
			$i = 1;
			$finishcount = 0;
			$finuser = 0;
			$finish = 0;
			$text = "";
			
			foreach ($value as $key2 => $value2) {
				if ($i>1) {
					$text .= "<tr>";
				}
				$text .= "<td rowspan='".count($value2)."'>".$key2."</td>";
				$b = 1;
				foreach ($value2 as $key3 => $value3) {
					$finish += count($value3);
					if ($b>1) {
						$text .= "<tr>";
					}
					$text .= "<td>".$key3."</td><td>".$value3."</td>";
					if ($b<1) {
						$text .= "</tr>";
					}
					$b++;
					$finishcount += $value3;
				}
				if ($i<1) {
					$text .= "</tr>";
				}
				$i++;
				$finuser += 1;
			}
			echo "<tr><td rowspan='".$finish."' style='background:#F9F9F9;'>".$key."</td>";
			echo $text;
			echo "</tr><tr class='warning'><td>Итого</td><td>".$finuser."</td><td></td><td>".$finishcount."</td></tr>";
		}

		?>
		</tboby>
		</table>
	</div>
</div>