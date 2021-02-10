<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("konsumen/templates/head.php");
	$id_user = $this->session->userdata('id');
	?>
</head>

<body id="page-top">

	<?php $this->load->view("konsumen/templates/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("konsumen/templates/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("konsumen/templates/breadcrumb.php") ?>
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<?php $id = $this->session->userdata('id');
						$val = $this->db->query("SELECT * FROM user where id_user='$id'")->row_array();
						if ($val['level'] == 'Superadmin') :
						?>
							<a href="<?php echo site_url('konsumen/konsumen/add') ?>"><i class="fas fa-plus"></i> Tambah Data</a>
						<?php endif; ?>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Foto</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th>Telephone</th>
										<th>Email</th>
										<th>Username</th>
										<th>Password</th>

										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($konsumen as $konsumen) : ?>
										<tr>
											<td>
												<img src="<?php echo base_url('assets/foto_konsumen/' . $konsumen->foto) ?>" width="64" />
											</td>
											<td width="150">
												<?php echo $konsumen->nama ?>
											</td>
											<td>
												<?php echo $konsumen->alamat ?>
											</td>
											<td>
												<?php echo $konsumen->telephone ?>
											</td>
											<td>
												<?php echo $konsumen->email ?>
											</td>
											<td>
												<?php echo $konsumen->username ?>
											</td>
											<td>
												<?php echo $konsumen->password ?>
											</td>


											<td width="250">
												<a href="<?php echo site_url('konsumen/konsumen/edit/' . $id_user) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
												<?php $id = $this->session->userdata('id');
												$val = $this->db->query("SELECT * FROM user where id_user='$id'")->row_array();
												if ($val['level'] == 'Superadmin') :
												?>
													<a onclick="deleteConfirm('<?php echo site_url('konsumen/konsumen/delete/' . $konsumen->id_user) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
												<?php endif; ?>
											</td>
										</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->
			<!-- Sticky Footer -->
			<?php $this->load->view("konsumen/templates/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("konsumen/templates/scrolltop.php") ?>
	<?php $this->load->view("konsumen/templates/modal.php") ?>

	<?php $this->load->view("konsumen/templates/js.php") ?>

	<script>
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>
</body>

</html>