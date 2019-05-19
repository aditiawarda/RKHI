<div class="jumbroton">
	<h1 style="text-decoration: underline;">Delete Video</h1><br>
</div>

<form enctype="multipart/form-data" action="<?php echo base_url(). 'Video/insert'; ?>" method="post">
	<div class="table-responsive">
		<table class="table table-hover">
			<tr class="success">
				<th class="thead-light" style="font-weight: bold; font-family: sans-serif;">Judul video</th>
				<th class="thead-light" style="font-weight: bold; font-family: sans-serif;">Hapus video</th>
			</tr>
			<tr class="active">
					<?php foreach($video_kategori as $data2){ ?>
						<td>
							<?= $data2->judul ?>
						</td>
						<td>
							<button type="submit" class="btn-danger" style="border-radius: 30px;">Hapus</button>
						</td>
					<?php }?>
			</tr>
		</table>
	</div>
	<button type="submit" name="submit" class="btn btn-success pull-right">Simpan</button><br>
</form>