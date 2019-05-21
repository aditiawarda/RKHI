<div class="container">
    <div class="row">
        <div class="col">

            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <table class="table table-hover mt-4">
                <thead>
                    <tr>
                        <th scope="col">Id Konten</th>
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
                        <td> <?php echo $d->id_konten ?></td>
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