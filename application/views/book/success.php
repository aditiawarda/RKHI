<div class="jumbroton">
	<h1 style="text-decoration: underline;">Tambah Buku</h1><br>
</div>
<tr class="table-success">
	<div class="alert alert-success">
		<strong>Success!</strong> <?= $this->session->flashdata('success1'); ?>
	</div>
</tr>

<form enctype="multipart/form-data" action="<?php echo base_url(). 'Book/insert'; ?>" method="post">
	<div class="table-responsive">
		<table class="table table-hover">
			<tr class="success">
				<th class="thead-light" style="font-weight: bold; font-family: sans-serif;">Judul video</th>
				<th class="thead-light" style="font-weight: bold; font-family: sans-serif;">Tambahkan</th>
				<th class="thead-light" style="font-weight: bold; font-family: sans-serif;">Kategori video</th>
			</tr>
			<tr class="active">
				<td><input type="text" name="judul" class="form-control" id="judul"></td>
				<td><input type="file" name="book" id="book"></td>
				<td>
					<select name="kategori" class="form-control form-control-lg">
						<?php foreach($video_kategori as $data2){ ?>
							<option><?= $data2->kategori_video ?></option>
						<?php }?>
					</select>
				</td>
			</tr>
		</table>
	</div>
	<button type="submit" name="submit" class="btn btn-success pull-right">Simpan</button><br>
</form>