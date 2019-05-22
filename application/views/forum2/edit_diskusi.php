<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col">
            <div class="card text-right">
                <h5 class="card-header text-left">Post Diskusi</h5>
                <div class="card-body">
                    <?php foreach($konten_diskusi as $d){ ?>
                     
                     <form action="<?php echo base_url(). 'data_master/update'; ?>" method="post">
                    <div class="form-group col-sm-10">
                        <label for="judul_diskusi_d" style="float:left">Judul Diskusi</label>
                        <input type="hidden" name="id_konten" value="<?php echo $d->id_konten ?>">
                        <input type="text" class="form-control" placeholder="Masukan judul Diskusi" name="judul_konten" id="exampleFormControlInput1" value="<?php echo $d->judul_konten ?>">
                        <label for="isi_diskusi_d" style="float:left">Isi Diskusi</label>
                        <textarea class="form-control" placeholder="Isi Diskusi" name="isi_konten" id="exampleFormControlInput1" ><?php echo $d->isi_konten ?></textarea>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Edit Diskusi</button>

                    </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <br>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->