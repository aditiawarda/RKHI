<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1>Komentar</h1>
</div>
<!-- /.container-fluid -->
<?php foreach ($list_konten as $d) { ?>
<div class="row">
        <div class="col">
            <div class="card text-right">
                <h5 class="card-header text-left" style="background-color:#4e73df;color:black">Posting</h5>
                <div class="card-body">
                    <div class="form-group" style="float:left;">
                    <?php echo $d->isi ?>
                </div>

                </div>
            </div>
        </div>
    </div>
    
<?php }?>
    <br>

<div class="col-sm-12">

                        <button type="button" onclick="javascript:top.location.href='<?=base_url("/data_master/lihat/konten/{id_konten}");?>';" class="btn btn-primary fas fa-comment">Kembali</button>
                    </div>
</div>
<!-- End of Main Content -->