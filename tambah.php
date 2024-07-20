<?php
    include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Aplikasi CRUD-MAHASISWA</title>
</head>
<body>
   <div class="w-50 mx-auto border p-3 mt-3">
        <a href="index.php">Kembali ke home</a>
        <form action="tambah.php" method="post">
            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim" class="form-control required">
            <label for="nama">Nama Mahasiswa</label>
            <input type="text" id="nama" name="nama" class="form-control required">

            <label for="jurusan">Jurusan</label>
            <select name="jurusan" id="jurusan" name="jurusan" class="form-select required">
                <option value="informatika">Teknik Informatika</option>
                <option value="arsistek">Teknik Arsistek </option>
                <option value="sipil">Teknik Sipil </option>
                <option value="mesin">Teknik Mesin</option>
                <option value="elektro">Teknik Elektro </option>
            </select>

            <label for="alamat">Alamat</label>
            <input type="text" id="alamat"  name="alamat" class="form-control required">

            <label for="telp">Telepon</label>
            <input type="text" id="telp" name="telp" class="form-control required">

            <input class="btn btn-success mt-3" type="submit" name="tambah" value="Tambah Data">
        </form>
   </div>

   <?php
    
    if (isset($_POST['tambah'])) {
        //menampilakan data ke dalam html
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];

        $jurusanSelect = $_POST['jurusan'];
        //cara baca nya adalah jika jurusan adalah informatika
        if ($jurusanSelect == 'informatika'){
            // simbol = di baca sama dengan 
            $jurusan = 'Teknik Informatika';

        }if ($jurusanSelect == 'arsistek'){
            // simbol = di baca sama dengan 
            $jurusan = 'Teknik arsistek';
            
        }if ($jurusanSelect == 'sipil'){
            // simbol = di baca sama dengan 
            $jurusan = 'Teknik sipil';
        }if ($jurusanSelect == 'mesin'){
                // simbol = di baca sama dengan 
            $jurusan = 'Teknik mesin';
        
        }if ($jurusanSelect == 'elektro'){
            // simbol = di baca sama dengan 
            $jurusan = 'Teknik elektro';
        }


        // untuk mengambil data dari databases;
        $sqlGet = "SELECT * FROM mahasiswa WHERE nim='$nim'";
        $queryGet = mysqli_query($conn, $sqlGet);
        $cek = mysqli_num_rows($queryGet);



        // untuk menambah data ke dalam databases;
        $sqlInsert = "INSERT INTO mahasiswa (nim,nama,jurusan,alamat,telp)
                     VALUES ('$nim','$nama','$jurusan','$alamat','$telp')";
        
        $queryInsert = mysqli_query($conn, $sqlInsert);


        // aritmatika && adalah kemudian
        //cek kondisi
        if (isset($sqlInsert) && $cek <= 0 ){ // jika masukan data kemudian kurang dari nol (kosong) maka data berhasil di tambah
            echo "
            <div class='alert alert-succes'>Data berhasil ditambahkan <a href='index.php'>Lihat data</a></div>
        ";

        } else if ($cek > 0) {
            # >= jika data sudah ada maka gagal di tambahkan
            echo " <div class='alert alert-danger'>Data gagal ditambahkan <a href='index.php'>Lihat data</a></div> ";
        }


        // header("location: index.php");
    }

    ?>
    
    
</body>
</html>
