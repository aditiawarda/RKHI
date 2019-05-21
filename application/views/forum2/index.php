<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1>Forum Diskusi</h1>
</div>
<!-- /.container-fluid -->
<?php foreach ($list_konten as $d) { ?>
<div class="row">
        <div class="col">
            <div class="card text-right">
                <h5 class="card-header text-left" style="background-color:#4e73df;color:black"><?php echo $d->judul_konten ?><h6 style="color:red"> Dibuat <?php echo $d->date_created_konten ?></h6></h5>

                <div class="card-body">
                    <div class="form-group" style="float:left;">
                    <?php echo $d->isi_konten ?>
                </div>
                    <div class="col-sm-12">

                        <button type="button" onclick="javascript:top.location.href='<?=base_url("/data_master/lihat/konten/{$d->id_konten}");?>';" class="btn btn-primary fas fa-comment">Lihat Diskusi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <?php } ?>

</div>
<!-- End of Main Content -->