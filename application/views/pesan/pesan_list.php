<div class="jumbroton">
	<h1>Pesan Masuk</h1><br>
</div>

    <table class="table table-hover mt-4">
        <thead>

             <tr>
                <th scope="col"><b>No.</b></th>
                <th scope="col"><b>Nama</b></th>
                <th scope="col"><b>Email</b></th>
                <th scope="col"><b>Subject</b></th>
                <th scope="col"><b>Pesan</b></th>
                <th scope="col"><b>Action</b></th>
            </tr>
        </thead>       
            <?php 
            $no = 1;
            foreach($kirim_email as $kirim){ 
            ?>

           
        <tbody>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $kirim->nama_depan." ".$kirim->nama_belakang ?></td>
                <td><?php echo $kirim->email ?></td>
                <td><?php echo $kirim->subject ?></td>
                <td><?php echo $kirim->pesan ?></td>
                <td width="200px">
                    <?php
                        echo anchor(site_url('pesan/balas/'.$kirim->id_email),'Balas', array('class'=>'btn btn-primary btn-sm')); 
                    ?>
                </td>
                
            </tr>
	    	<?php } ?>
        <tbody>
	</table>