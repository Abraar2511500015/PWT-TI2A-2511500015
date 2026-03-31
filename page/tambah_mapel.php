<div class"content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Mata Pelajaran</h1>
        </div>
        </div>
    </div>
    </div>
    <?php
    //kode otomatis
    $carikode = mysqli_query($koneksi, "select max(Kd_mapel) from mapel") or die (mysqli_error());
    $datakode = mysqli_fetch_array($carikode);
    if ($datakode) {
        $nilaikode = substr($datakode[0], 2);
        $kode = (int) $nilaikode;
        $kode = $kode + 1;
        $hasilkode = "M".str_pad($kode, 3, "0", STR_PAD_LEFT);
    } else {$hasilkode = "M-"; }
    $_SESSION["KODE"] = $hasilkode;

    if(isset($_POST['tambah'])){
        $Kd_mapel = $_POST['Kd_mapel'];
        $Nm_mapel = $_POST['Nm_mapel'];
        $Kkm = $_POST['Kkm'];

        $insert = mysqli_query($koneki, "INSERT INTO mapel values ('$Kd_mapel', '$Nm_mapel', '$Kkm')");
        if($insert){
            echo '<div class="alert alert-info-dismissible">
            <button type="button" class="close" data-dismiss="alert"
            aria-hidden="true">X</button>
            <h5><i class="icon fas fa-info"></i> Info </h5>
            <h4>Berhasil Disimpan</h4></div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=mapel">';
        }else {
           
        }
    }