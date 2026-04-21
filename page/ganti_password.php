<div cass="content-header">
    <div class="container-fluid">
    </div>
</div>
<?php
if(isset($_POST['tambah'])){
    $pl = $_POST['pl'];
    $pb = $_POST['pb'];
    $cek = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM users WHERE Username = '$Username' "));

    if($cek){
        $update = mysqli_query($koneksi,"UPDATE users SET Password = '$pb' WHERE Password = '$pl' AND Username = '$Username' ");
        if($update) {
            echo "benar";
        }
    }
}
?>
