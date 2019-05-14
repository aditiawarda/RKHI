
        <h2 style="margin-top:0px">Client List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('client/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('client/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('client'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        		<th>Nama Client</th>
        		<th>Alamat Client</th>
        		<th>Action</th>
                    </tr><?php
                    foreach ($client_data as $client)
                    {
                    ?>
            <tr>
    			<td width="80px"><?php echo ++$start ?></td>
    			<td><?php echo $client->nama_client ?></td>
    			<td><?php echo $client->alamat_client ?></td>
    			<td style="text-align:center" width="200px">
    				<?php 
    				echo anchor(site_url('client/read/'.$client->id_client),'Read', array('class'=>'btn btn-primary btn-sm')); 
    				echo ' | '; 
    				echo anchor(site_url('client/update/'.$client->id_client),'Update', array('class'=>'btn btn-default btn-sm')); 
    				echo ' | '; 
    				echo anchor(site_url('client/delete/'.$client->id_client),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
    				?>
    			</td>
		  </tr>
                <?php
                }
                ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('client/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
