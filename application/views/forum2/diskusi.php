<div class="container">
    <div class="row">
        <div class="col">

            <!-- Topbar Search -->
            
            <div class="card-body table-responsive p-0">
            <table  id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nama Author</th>
                        <th scope="col">Judul Konten</th>
                        <th scope="col">Isi Konten</th>
                        <th scope="col">Tanggal Buat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_konten as $d) { ?>
                    <tr>
                        <td> <?php echo $d->id_user ?></td>
                        <td> <?php echo $d->judul_konten ?></td>
                        <td> <?php echo $d->isi_konten ?></td>
                        <td> <?php echo $d->date_created_konten ?></td>
                        <td>
                            <button type="button" onclick="javascript:top.location.href='<?= base_url("/data_master/edit/{$d->id_konten}"); ?>';" class="btn btn-danger btn-sm">Edit</button>
                            <button type="button" onclick="javascript:top.location.href='<?= base_url("/data_master/delete/konten/{$d->id_konten}"); ?>';" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>