<div class="jumbroton">
	<h1 style="text-decoration: underline;">Tambah Video</h1><br>
</div>

<form enctype="multipart/form-data" action="<?php echo base_url(). 'Video/insert'; ?>" method="post">
	<div class="table-responsive">
		<table class="table table-hover">
			<tr class="success">
				<th class="thead-light" style="font-weight: bold; font-family: sans-serif;">Judul video</th>
			</tr>
			<tr class="active">
				<td>
					<?php foreach($video_kategori as $data2){ ?>
						<?= $data2->judul ?>
					<?php }?>
				</td>
			</tr>
		</table>
	</div>
	<button type="submit" name="submit" class="btn btn-success pull-right">Simpan</button><br>
</form>