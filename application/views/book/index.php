<div class="jumbroton">
	<h1>Daftar Resource Buku</h1><br>
</div>
<?php if(!empty($book_resource)) { foreach($book_resource as $row){ ?>
	<div class="file-box">
	    <div class="box-content">
	        <h2 style="color: #3498db">Judul - <?php echo $row['judul']; ?></h2>
	        <div class="preview">
	            <embed src="<?php echo base_url().'uploads/books/'.$row['file_type']; ?>" width="1030" height="800">
	        </div>
	        <button type="button" class="btn btn-primary btn-sm"><a href="<?php echo base_url().'Book/download/'.$row['id']; ?>" class="dwn"><font color="white">Download</font></a></button>
	    </div>
	</div>
<?php } } ?>