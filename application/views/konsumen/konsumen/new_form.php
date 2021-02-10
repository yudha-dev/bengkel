<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("konsumen/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("konsumen/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("konsumen/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("konsumen/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('success'); ?>
					</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('konsumen/konsumen/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('konsumen/konsumen/add') ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="nama">Nama</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<input class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" type="text" name="alamat" placeholder="" />
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="telephone">Telephone</label>
								<input class="form-control <?php echo form_error('telephone') ? 'is-invalid' : '' ?>" type="text" name="telephone" placeholder="" />
								<div class="invalid-feedback">
									<?php echo form_error('telephone') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" type="text" name="email" placeholder="" />
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="username">Username </label>
								<input class="form-control <?php echo form_error('username') ? 'is-invalid' : '' ?>" type="text" name="username" placeholder="" />
								<div class="invalid-feedback">
									<?php echo form_error('username') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="password">Password </label>
								<input class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" type="text" name="password" placeholder="" />
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="foto">Foto</label>
								<input class="form-control-file <?php echo form_error('foto') ? 'is-invalid' : '' ?>" type="file" name="foto" />
								<div class="invalid-feedback">
									<?php echo form_error('foto') ?>
								</div>
							</div>
							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>




				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("konsumen/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("konsumen/_partials/scrolltop.php") ?>

		<?php $this->load->view("konsumen/_partials/js.php") ?>

</body>

</html>