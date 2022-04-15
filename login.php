<?php
session_start();

$nik=@$_POST['nik'];
$nama=@$_POST['nama'];
$file="file/".$nik."-".$nama.".txt";

//jika ditekan tombol pengguna baru
if (isset($_POST['pengguna_baru'])) {
    if (empty(file_exists($file))) {
        $fh=fopen($file, "w");
        fwrite($fh, "");
        fclose($fh);
        $alert="<div class='alert alert-success'>Anda Berhasil Bergabung</div>";
        $_SESSION['nik']=$nik;
        $_SESSION['nama']=$nama;
        echo "<meta http-equiv='refresh', content='2; url=index.php'>";
    }
    else{
        $alert="<div class='alert alert-danger'>Anda Sudah Terdaftar!</div>";
    }
}
//jika di tekan tombol masuk
elseif(isset($_POST['masuk'])){
    if (!empty(file_exists($file))) {
        $alert="<div class='alert alert-success'>Anda Berhasil Masuk!</div>";
        $_SESSION['nik']=$nik;
        $_SESSION['nama']=$nama;
        echo "<meta http-equiv='refresh', content='2; url=index.php'>";
    }
    else{
        $alert="<div class='alert alert-danger'>Anda Belum Terdaftar!</div>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="boot.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card mt-5">
                    <div class="card-body py-5" style="border-top-right-radius: 10%">
                        <h2 class="text-primary text-center">Calculator Scientific</h2>
                        <p class="text-center text-secondary small mb-4">Technology use php, html, css and javascript <br>by Sahat Parulian</p>
                        <?php echo @$alert ?>
                        <!-- form login -->
                        <form action="" method="POST">
                            <p>Nomor Induk Kependudukan</p>
                            <input type="number" name="nik" class="form-control mb-4" placeholder="NIK" required>
                            <p>Username</p>
                            <input type="text" name="nama"class="form-control mb-4" placeholder="Username" required>
                            <a href="https://api.whatsapp.com/send?phone=628811564391&text=Saya%20lupa%20nomor%20induk%20kependudukan%20untuk%20login." style="text-decoration: none; color: red;">Lupa NIK?</a>
                            <p style="margin-top: 10px;">Pengguna baru? masukan isian diatas lalu klik tombol merah dibawah ini</p>
                            <div class="form-inline btn-a">
                                <button class="btn btn-danger" name="pengguna_baru">Saya Pengguna baru</button>
                                <button class="btn btn-primary btn-b" name="masuk">MASUK</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script src="jquery/jquery.j"></script>
</body>
</html>