<?php
$munculform = false;
$munculkalkulator = false;
$munculpenjumlhan = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_GET['action'];

    if ($action == 'form') {
        $munculform = true;

        $nama = $_POST ['nama'];
        $nim = $_POST ['nim'];
        $nilai = $_POST ['nilai'];
        $absen = $_POST ['absen'];

        if ($nilai>=75 && $absen>=75) {
            $lulus = "Selamat anda lulus";
        } else {
            $lulus = "maaf anda tidak lulus";
        }
    }


    if ($action == 'kalkulator'){
        $munculkalkulator = true;

        $a = $_POST ['angka1'];
        $b = $_POST ['angka2'];
        $op = $_POST ['operasi'];

        if ($op == "tambah") {
            $hasil = $a+$b;
        } elseif ($op == "kurang") {
            $hasil = $a-$b;
        } elseif ($op == "kali") {
            $hasil = $a*$b;
        } elseif ($op == "bagi") {
            $hasil = $a/$b;
        } else {
            $hasil = "pilih operasi";
        }
    }

    // Penjumlahan
    if($action == 'penjumlahan'){
        $munculpenjumlhan = true;
        $angka1 = $_POST["angka1"];
            $angka2 = $_POST["angka2"];

            $hasil = $angka1 + $angka2;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas Formulir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: whitesmoke;
        }

        .container {
            background-color: white;
        }
    </style>
</head>
<!-- Form penjumlahan -->
    <div class="container p-3 mt-5 border">
        <h2 class="text-center">FORM PENJUMLAHAN</h2>
            <form action="formulir.php?action=penjumlahan" method="POST">
    <div class="mb-3">
                <label for="angka1" class="form-label">Angka 1</label>
                <input type="number" class="form-control" placeholder="masukan angka1" name="angka1">
            </div>
            <div class="mb-3">
                <label for="angka2" class="form-label">Angka 2</label>
                <input type="number" class="form-control" placeholder="masukan angka2" name="angka2">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php if ($munculpenjumlhan == true) { ?>
            <h3 class="text-center">Hasil dari penjumlahan adalah
                <?= $hasil ?>
            </h3>
        <?php } ?>
    </div>
   <!-- Form kelulusan -->
    <div class="container p-3 mt-5 border">
        <h2 class="text-center">FORM KELULUSAN</h2>
        <form action="formulir.php?action=form" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" placeholder="masukan nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="NIM" class="form-label">NIM</label>
                <input type="text" class="form-control" placeholder="masukan NIM" name="nim">
            </div>
            <div class="mb-3">
                <label for="nilai" class="form-label">Nilai</label>
                <input type="number" class="form-control" placeholder="masukan nilai" name="nilai">
            </div>
            <div class="mb-3">
                <label for="absen" class="form-label">Absen</label>
                <input type="number" class="form-control" placeholder="masukan absen" name="absen">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php if ($munculform == true) { ?>
            <h3 class="text-center">
                <?= $nama ?>, dengan NIM
                <?= $nim ?>.
                <?= $lulus ?>
            </h3>
        <?php } ?>
    </div>

    <!-- Kalkulator -->
    <div class="container p-3 mt-5 border">
        <h2 class="text-center">FORM PERHITUNGAN</h2>
        <form action="formulir.php?action=kalkulator" method="POST">
            <div class="mb-3">
                <label for="angka1" class="form-label">Angka 1</label>
                <input type="number" class="form-control" placeholder="masukan angka1" name="angka1">
            </div>
            <div class="mb-3">
                <label for="angka2" class="form-label">Angka 2</label>
                <input type="number" class="form-control" placeholder="masukan angka2" name="angka2">
            </div>
            <select class="form-select mb-3" aria-label="Default select example" name="operasi">
                <option selected>Pilih Operasi</option>
                <option value="tambah">Tambah</option>
                <option value="kurang">Kurang</option>
                <option value="kali">Kali</option>
                <option value="bagi">Bagi</option>
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php if ($munculkalkulator == true) { ?>
            <h3 class="text-center">
                Hasilnya adalah
                <?= $hasil ?>
            </h3>
        <?php } ?>
    </div>