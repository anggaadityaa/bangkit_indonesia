<?php
include '_config.php';

$user = $_GET['id_user'];
$keterangan = $_POST['keterangan'];
$id = $_POST['id'];

//upload dan simpan galeri
$namafile = $_FILES['gambar']['name'];
$tmp_name = $_FILES['gambar']['tmp_name'];

move_uploaded_file($tmp_name, 'img_galeri/' . $namafile);

$update = mysqli_query($con, "UPDATE gallery SET gambar='$namafile', id_user=$user, keterangan='$keterangan' WHERE id = $id");

if ($update) { ?>
    <script>
        alert('Data berhasil diubah!')
        location.href = 'page_galeri.php'
    </script>
<?php
} else { ?>
    <script>
        alert('Data Gagal diubah!')
        location.href = 'page_galeri.php'
    </script>
<?php } ?>