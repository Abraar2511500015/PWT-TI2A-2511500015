<div cass="content-header">
    <div class="container-fluid">
    </div>
</div>
<?php
if(isset($_POST['tambah'])){
    $pl = $_POST['pl'];
    $pb = $_POST['pb'];
    $cek = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username' "));

    if($cek)(
        $update = mysqli_query($koneksi,"UPDATE user SET password = '$pb' WHERE password = '$pl' AND username = '$username' ");
        if($update)(
            echo "benar";
        )
    )
}
?>