<div class="jumbroton">
	<h1 style="text-decoration: underline;">Daftar Resource Buku</h1><br>
</div>
<?php if(!empty($book_resource)) { foreach($book_resource as $row){ ?>
	<div class="file-box">
	    <div class="box-content">
	        <h2 style="color: #3498db">Judul - <?php echo $row['judul']; ?></h2>
	        <div class="preview">
	            <embed src="<?php echo base_url().'uploads/books/'.$row['file_type']; ?>">
	        </div>
	        <a href="<?php echo base_url().'Book/download/'.$row['id']; ?>" class="dwn">Download</a>
	    </div>
	</div>
<?php } } ?>