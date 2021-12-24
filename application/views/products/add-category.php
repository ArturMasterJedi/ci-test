<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="card">
				<div class="card-header">
					<h4>Добавление товара</h4>
					<a href="<?= base_url('/products/index');?>" class="btn btn-danger">Назад</a>
				</div>
				<?php
				if ($this->session->flashdata()){
					echo "<div class='alert alert-success'>";
					echo $this->session->flashdata('status');
					echo "</div>";
				}
				?>
				<div class="card-body">
					<form method="POST" enctype="multipart/form-data" action="<?echo base_url('products/add-category');?>">
						<div class="form-group">
							<label for="">Введите название категории</label>
							<input type="text" class="form-control" name="name" placeholder="Введите название">
							<span><?php echo form_error('name');?></span>
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
