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
    <div class="container mt-5">
        <a href="tambah.php" class="btn btn-primary btn-md mb-2"> Tambah Data</a>

        <table class="table table-striped table-hover mt-1">
            <thead class="table-dark">
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </thead>

            <?php
                $sqlGet = "SELECT * FROM mahasiswa"; // mengambil data dari tabel mahasiswa
                $query  = mysqli_query($conn , $sqlGet); // menghubungkan ke databases

                while ($data = mysqli_fetch_array($query)) { // me looping data dari tabel
                    
                    // mencetak data dalam bentuk html
                 echo "
                    <tbody>
                        <tr> 
                            <td>$data[nim]</td>
                            <td>$data[nama]</td>
                            <td>$data[jurusan]</td>
                            <td>$data[alamat]</td>
                            <td>$data[telp]</td>
                            <td>
                                <div class='row'>
                                    <div class='col d-flex justify-content'>
                                        <a href= 'update.php?nim=$data[nim]' class= 'btn btn-sm btn-warning'>Update</a>
                                    </div>
                                    <div class='col d-flex justify-content'>
                                        <a href= 'delete.php?nim=$data[nim]' class= 'btn btn-sm btn-danger'>Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                 ";
                }
            ?>
        </table>
    </div>
</body>
</html>
