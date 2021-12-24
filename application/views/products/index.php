<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div><h2>Все данные</h2></div>
			<div class="card mt-3">
				<div class="card-header">
					<a href="<?= base_url('/products/add')?>" class="btn btn-primary">Добавить товар</a>
					<a href="<?= base_url('/products/add-category')?>" class="btn btn-primary">Добавить категорию</a>
				</div>
				<div class="field-list">
					<div><h5>Фильтр по категории</h5></div>
					<div style="display: inline-flex" class="filter">
						<?php foreach ($category as $tmp):?>
							<span>&nbsp;</span><button class="<?php echo $tmp->name;?>"><?= $tmp->name;?></button><span>&nbsp;</span>
						<?php endforeach; ?>
					</div>
					<div><h5>Покакать по свойству купленные или нет</h5></div>
					<select class="filter-handle">
						<option value="">Все</option>
						<option value="1">Купленные</option>
						<option value="0">Не купленне</option>
					</select>
				</div>
				<div class="card-body">
					<table class="table wy-table-bordered" id="table">
						<tr>
							<th>ID</th>
							<th>Фото</th>
							<th>Название</th>
							<th>Описание</th>
							<th>Цена</th>
							<th>Дата добавления</th>
							<th colspan="2">Управление</th>
						</tr>
						<?php foreach ($products as $tmp):?>
						<tr data-type="<?php echo $tmp->status;?>" class="post <?php echo $tmp->category; ?>">
							<td><?php echo $tmp->id; ?></td>
							<td><img width="130px" src='/image/<?php echo $tmp->prod_image; ?>'></td>
							<td><?php echo $tmp->name; ?></td>
							<td><?php echo $tmp->description; ?></td>
							<td><?php echo $tmp->price; ?></td>
							<td><?php echo $tmp->data_time; ?></td>
							<?php
							if ($tmp->status == 0){
							?>
								<td><a class="btn btn-success" href="<?= base_url('/products/buyed/'.$tmp->id)?>">Пометить как купленное</a></td>

							<?php
							}else{
								echo "<td>Данный товар помечен как куплен</td>";
							}
							?>
							<td><a class="btn btn-danger" href="<?= base_url('/products/delete/'.$tmp->id)?>">Удалить</a></td>
						</tr>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$("button").click(function() {
		var show = $(this).attr('class');
		$('.post').each(function(){
			$(this).show();
			var test = $(this).attr('class');
			if (test.indexOf(show) < 0) $(this).hide();
		});
	});

	$('.filter-handle').on('change', function(e) {
		// retrieve the dropdown selected value
		var location = e.target.value;
		var table = $('#table');
		// if a location is selected
		if (location.length) {
			// hide all not matching
			table.find('tr[data-type!=' + location + ']').hide();
			// display all matching
			table.find('tr[data-type=' + location + ']').show();
		} else {
			// location is not selected,
			// display all
			table.find('tr').show();
		}
	});
</script>
