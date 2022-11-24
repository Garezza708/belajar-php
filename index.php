<?php
    $con = mysqli_connect("localhost", "root", "", "fakultas");

    if (mysqli_connect_errno()) {
        echo "failed to connecct to mysql : " . mysqli_connect_error();
        exit();
    }else{
        echo"connected";
    }

    $querym = "select * from mahasiswa";
    $queryj = "select * from jurusan";

    $result = mysqli_query($con, $querym);
    $mahasiswa = [];

    if($result){
        while($row = mysqli_fetch_assoc($result)){
            // echo"<br>". $row["Nama"]. " " . $row["NIM"];
            $mahasiswa[] = $row;
        }
        mysqli_free_result($result);
    }

// tutup koneksi mysql
// mysqli_close($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <a href="insert.php">tambah data</a>
    <table border="1" style="width: 100%;">
        <tr>
            <th>NIM</th>
            <th>NAMA</th>
            <th>Option</th>
        </tr>
        <?php foreach($mahasiswa as $value):?>
        <tr>
            <td><?php echo $value["NIM"]; ?></td>
            <td><?php echo $value["Nama"]; ?></td>
            <td>EDIT | DELETE</td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>