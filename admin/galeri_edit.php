<?php include '_header.php';
error_reporting(0);
?>
<!-- content -->
<div class="container mt-5">
    <div class="card im-box">
        <h5 class="card-header">Udah Data Galeri</h5>
        <div class="card-body">
            <h5 class="card-title">Form Edit Galeri</h5>

            <?php
            $id = $_GET['id'];
            $user = $_GET['id_user'];
            $data = mysqli_query($con, "SELECT * FROM gallery inner join user on gallery.id_user=user.id_user");

            $row = mysqli_fetch_array($data); ?>
            <form action="proses_galeri_edit.php?id_user=<?=$user?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" value="<?= $row['id'] ?>">
                    <label for="">Gambar</label>
                    <input type="file" name="gambar" class="form-control"><br>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea rows="5" cols="100" name="keterangan" class="ckeditor" class="form-control" id="keterangan"><?= $row['keterangan'] ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="update" class="btn btn-primary ">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ./content -->
<?php include '_footer.php'; ?>