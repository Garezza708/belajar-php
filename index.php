<?php
// config connect to server
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fakultas";

// Create new object connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    exit("Connection failed: " . $conn->connect_error);
}

// $sql = "insert into mahasiswa (id_Jurusan, NIM, Nama, Jenis_kelamin, tempat_lahir, tanggal_lahir, alamat) values ('2', '111111111111', 'AAAAAAAAAAAAAAAAAA', 'Perempuan', 'AAAAAA', '10001-04-23', 'AAAAAAAAAAAAAAAAAAAAA')";
// if ($conn->query($sql) === TRUE) {
//     echo "new record has been successfully created";
// } else {
//     echo "error : " . $sql . "<br>" . $conn->error; 
// }

// $sql = "update jurusan set Nama = 'test update' where id = 2;";
// if ($conn->query($sql) === TRUE) {
//     echo "new update has been successfully created";
// } else {
//     echo "error : " . $sql . "<br>" . $conn->error; 
// }

// $sql = "delete from jurusan where id = 3";
// if ($conn->query($sql) === TRUE) {
//     echo "new data change has been successfully created";
// } else {
//     echo "error : " . $sql . "<br>" . $conn->error; 
// }

// $sql = "select id,kode,nama from jurusan";
// $result = $conn->query($sql);

// if ($result->num_rows>0) {
//     while ($row = $result->fetch_assoc()) {
//         echo "id : " . $row['id']. " - kode jurusan : " . $row['kode'] . " - nama jurusan : " . $row['nama'] . "<br>";
//     }
// } else {
//     echo "error : 0 result"; 
// }

$sql = "select id,kode,nama from jurusan where nama = 'test update' ";
$result = $conn->query($sql);

if ($result->num_rows>0) {
    while ($row = $result->fetch_assoc()) {
        echo "id : " . $row['id']. " - kode jurusan : " . $row['kode'] . " - nama jurusan : " . $row['nama'] . "<br>";
    }
} else {
    echo "error : 0 result"; 
}

// $sql = "select id,kode,nama from jurusan order by kode ";
// $result = $conn->query($sql);

// if ($result->num_rows>0) {
//     while ($row = $result->fetch_assoc()) {
//         echo "id : " . $row['id']. " - kode jurusan : " . $row['kode'] . " - nama jurusan : " . $row['nama'] . "<br>";
//     }
// } else {
//     echo "error : 0 result"; 
// }
?>