<div class="jumbroton">
	<h1 style="text-decoration: underline;">Delete Video</h1><br>
</div>

<div class="table-responsive">
	<table class="table table-hover">
		<?php
		if($this->session->flashdata('success')){
			?>
				<div class="alert alert-success">
				  <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php
		}
		?>
		<?php
		if($this->session->flashdata('failed')){
			?>
				<div class="alert alert-danger">
				  <strong>Failed!</strong> <?php echo $this->session->flashdata('failed'); ?>
				</div>
			<?php
		}
		?>
		
		<tr class="success">
			<th class="thead-light" style="font-weight: bold; font-family: sans-serif;">Judul video</th>
			<th class="thead-light" style="font-weight: bold; font-family: sans-serif;">Hapus video</th>
		</tr>
		<?php foreach($video_kategori as $data2){ ?>
		<tr class="active">
			<td>
				<?= $data2->judul ?>
			</td>
			<td>
				<a onclick="return confirm('Yakin Ingin Menghapus Video Ini?')" href="<?= base_url(); ?>Video/actionDelete/<?= $data2->id; ?>">
					<button class="btn-danger" style="border-radius: 30px;">
						Hapus
					</button>
				</a>
			</td>
		</tr>
		<?php }?>
	</table>
</div>