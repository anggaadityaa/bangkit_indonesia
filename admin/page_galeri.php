<?php include '_header.php';
$data = mysqli_query($con, "SELECT * FROM user");
?>
<!-- content -->
<div class="container mt-5">
    <div class="card im-box">
        <h5 class="card-header">Data Galeri</h5>
        <div class="card-body">
            <h5 class="card-title">Lihat Data Galeri</h5>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                Tambah Data Galeri
            </button>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $data = mysqli_query($con, "SELECT * FROM gallery inner join user on gallery.id_user=user.id_user");
                    foreach ($data as $row) :  ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><img src="<?= "img_galeri/" . $row['gambar'] ?>" width="70" height="70"></td>
                            <td><?= substr($row['keterangan'], 0, 200) ?></td>
                            <td>
                                <a class="badge badge-success" href="galeri_edit.php?id_user=<?= $row['id_user'] ?>&id=<?= $row['id']?>">Edit</a>
                                <a class="badge badge-danger" href="galeri_delete.php?id=<?= $row['id']?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- ./content -->

<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Galeri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="galeri_add.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id_user" class="form-control" value="<?= $row['id_user'] ?>">
                        <label for="">Gambar</label>
                        <input type="file" name="gambar" class="form-control" required>
                        <label for="">Keterangan</label>
                        <textarea rows="5" cols="100" name="keterangan" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger " data-dismiss="modal" onclick="self.history.back()">Close</button>
                        <button type="submit" name="upload" class="btn btn-primary ">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ./Modal add -->
<?php include '_footer.php'; ?>