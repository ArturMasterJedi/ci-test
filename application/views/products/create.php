<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="card">
				<div class="card-header">
					<h4>Добавление товара</h4>
					<a href="<?php base_url();?>/products/index" class="btn btn-danger">Назад</a>
				</div>
				<?php
				if ($this->session->flashdata()){
					echo "<div class='alert alert-success'>";
						echo $this->session->flashdata('status');
					echo "</div>";
				}
				?>
				<div class="card-body">
					<form method="POST" enctype="multipart/form-data" action="<?echo base_url('products/add');?>">
						<div class="form-group">
							<label for="">Введите название товара</label>
							<input type="text" class="form-control" name="name" placeholder="Введите название">
							<span><?php echo form_error('name');?></span>
						</div>
						<div class="form-group">
							<label for="">Введите описание товара</label>
							<input type="text" class="form-control" name="description" placeholder="Введите описание">
							<span><?php echo form_error('description');?></span>
						</div>
						<div class="form-group">
							<label for="">Введите цену товара</label>
							<input type="text" class="form-control" name="price" placeholder="Введите цену">
							<span><?php echo form_error('price');?></span>
						</div>
						<div class="form-group">
							<label for="">Выберите категорию</label><br>
							<select name="category">
								<?php
								if (!empty($category)) {
									foreach ($category as $tmp) {
										echo "<option value='{$tmp->name}'>{$tmp->name}</option>";
									}
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Выберите фото товара</label>
							<input type="file" name="name_image" class="form-control">
							<span><?php if(isset($image_error)){echo $image_error;} ?></span>
						</div>
						<br/>
						<div class="form-group">
							<input type="submit" class="btn btn-success px-5" name="product_save" value="Добавить">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
