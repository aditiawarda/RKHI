<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
   <div class="row">
        <div class="col">
            <div class="card text-right">
                <h5 class="card-header text-left" style="background-color:#4e73df;color:black"><?php echo $judul_konten ?></h5>
                <div class="card-body">
                    <div class="form-group" style="float:left;">
                    <?php echo $isi_konten ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col">
            <div class="card text-right">
                <h5 class="card-header text-left">Komentar</h5>
                <div class="card-body">
                    <form action="<?php echo base_url(). 'data_master/chat/'.$id_konten; ?>" method="post">
                    <div class="form-group col-sm-10">
                        <input type="text" class="form-control" placeholder="Isi Komentar" name="isi" id="exampleFormControlInput1">
                    </div>
                    <div class="col-sm-12">
                        <button type="submit"  class="btn btn-primary fas fa-comment">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
         <button type="button" onclick="javascript:top.location.href='<?=base_url("/data_master/lihatkomentar/{$id_konten}");?>';" class="btn btn-primary fas fa-comment">Lihat Komentar</button>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->