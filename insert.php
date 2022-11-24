<?php
    if (isset($_POST['submit'])){
        //var_dump($_POST);
        $NIM = $_POST['NIM'];
        $Nama = $_POST['Nama'];
        $id_Jurusan = $_POST['id_Jurusan'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];

        // Buat koneksi dengan MySQL
        $con = mysqli_connect("localhost","root","","fakultas");

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }else{
            echo 'koneksi berhasil';
        }

        $sql = "insert into mahasiswa (id_jurusan, nim, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat)
        values ($id_Jurusan,'$NIM', '$Nama', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat')";

        if (mysqli_query($con, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
          
        mysqli_close($con);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>
<body>
    <h1>Tambah Data</h1>
    <a href="index.php">Ga Jadi Masukin Data hehe</a>
    <form action="" method="post">
        NIM: <input type="text" name="NIM"><br>
        Nama: <input type="text" name="Nama"><br>
        ID Jurusan: <input type="number" name="id_Jurusan"><br>
        Jenis Kelamin: <input type="text" name="jenis_kelamin"><br>
        Tempat Lahir: <input type="text" name="tempat_lahir"><br>
        Tanggal Lahir (yyyy-mm-dd): <input type="text" name="tanggal_lahir"><br>
        Alamat: <input type="text" name="alamat"><br>
        <button type="submit" name="submit">Tambah Data</button>
    </form>
</body>
</html>