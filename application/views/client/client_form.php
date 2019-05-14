
        <h2 style="margin-top:0px">Client <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
    	    <div class="form-group">
                <label for="varchar">Nama Client <?php echo form_error('nama_client') ?></label>
                <input type="text" class="form-control" name="nama_client" id="nama_client" placeholder="Nama Client" value="<?php echo $nama_client; ?>" />
            </div>
    	    <div class="form-group">
                <label for="alamat_client">Alamat Client <?php echo form_error('alamat_client') ?></label>
                <textarea class="form-control" rows="3" name="alamat_client" id="alamat_client" placeholder="Alamat Client"><?php echo $alamat_client; ?></textarea>
            </div>
    	    <div class="form-group">
                <label for="varchar">No Telpon <?php echo form_error('no_telpon') ?></label>
                <input type="text" class="form-control" name="no_telpon" id="no_telpon" placeholder="No Telpon" value="<?php echo $no_telpon; ?>" />
            </div>
    	    <input type="hidden" name="id_client" value="<?php echo $id_client; ?>" /> 
    	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    	    <a href="<?php echo site_url('client') ?>" class="btn btn-default">Cancel</a>
	   </form>
