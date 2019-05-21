<div class="jumbroton">
	<h1>Balas Pesan</h1><br>
</div>
<?php foreach($kirim_email as $u){ ?>
<form action="<?php echo base_url(); ?>pesan/send" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="from" id="exampleInputEmail1" value="<?php echo $u->email ?>">
    </div>
    <div class="form-group">
        <label for="">Pesan</label>
        <textarea class="form-control" rows="3" name="message"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>

<?php } ?>