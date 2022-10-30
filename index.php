<?php
$nama = "awikwok";
$data = array('AAAA', 'BBBB', 'CCCC', 'DDDD', 'EEEE', 'FFFF');
// for
// $no = 25;
// for ($i=0; $i<$no; $i++) {
//     $n = $i + 1;
//     echo $n." ".$nama."<br/>";
// }

// while
$no = 100;
$i = 0;
while ($i < $no) {
     $n = $i + 1;
    echo $n." ".$nama."<br/>";
    $i++;
}

// do
// $no = 25;
// $i = 0;
// do {
//     $n = $i + 1;
//     echo $n." ".$nama."<br/>";
//     $i++;
// } while ($i < $no)

//perulangan data array
// $i = 0;
// while ($i < count($data)) {
//     echo $data[$i]."<br>";
//     $i++;
// }

//data array menggunakan forereach
// foreach($data as $value) {
//     echo $value."<br>";
// }

//percabangan
//pake if
// if ($nama == "awikwok") {
//     echo $nama." ....";
// } else if($nama == "AAAAA") {
//     echo $nama." ._.";
// } else {
//     echo $nama." ?_?";
// }

//switch case
// switch($nama) {
//     case "awikwoK":
//         $pesan = $nama." ...";
//     break;
//     case "AWIKWOK":
//         $pesan = $nama." ._.";
//     break;
//     case "awikwok":
//         $pesan = $nama." :3";
//     default:
//         $pesan = $nama." ?_?";
// }
// echo $pesan;
?>