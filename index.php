<?php

require 'db.php';

if (isset($_POST['submit'])) {
    $val = $_POST['sort'];
    if ($val == 'ASC') {
        $icon = '<i class="bi bi-sort-down-alt"></i>';
    } else {
        $icon = '<i class="bi bi-sort-down"></i>';
    }
} else {
    $val = "ASC";
    $icon = '<i class="bi bi-sort-down-alt"></i>';
}

$sql = "SELECT * FROM catatan INNER JOIN language on bahasa = language_id  ORDER BY id $val";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mochammad Dwi Rizky</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body style="padding-top: 4rem;">
    <div class="container">
        <div class="card-body bg-secondary">
            <div class="card-header bg-dark">
                <div class="d-flex justify-content-between align-items-center text-light">
                    Mochammad Dwi Rizky
                    <a href="tambah.php" class="btn btn-light">Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                <div class="d-flex justify-content-evenly">
                    <label for="name" class="form-label">
                    <input class="form-control" type="text" id="nama" placeholder="Cari">
                </div>
                    <form action="" method="post">
                        <input type="hidden" name="sort" value="<?= ($val == 'ASC') ? 'DESC' : 'ASC' ?>">
                        <button type="submit" name="submit" class="btn btn-light"><?= $icon ?></button>
                    </form>
                </div>
                <table class="table table-hover table-dark table-striped text-light">
                    <thead>
                        <tr>
                            <th scope="col">ID Catatan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama Catatan</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Bahasa</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data = $result->fetch_assoc()): ?>
                            <tr>
                                <th scope="row"><?= $data['id'] ?></th>
                                <td><?= $data['tanggal'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['deskripsi'] ?></td>
                                <td><?= $data['name'] ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="edit.php?id=<?= $data['id'] ?>"  class="btn btn-outline-light">Edit</a>
                                        <a onclick="hapus(<?= $data ['id'] ?>)" class="btn btn-outline-danger">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        const hapus = (id) => {
            let c = confirm('Apakah anda yakin ingin menghapus ID = ' + id +'?');
            if (c) {
                window.location = 'hapus.php?id=' + id;
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        var NameInput = document.getElementById('nama');

        function show(tanggal = '', nama = '', deskripsi = '', bahasa = '') {
            $.get(`dbapi.php?tanggal=${tanggal}&nama=${nama}&deskripsi=${deskripsi}&bahasa=${bahasa}`, function(response) {
                document.getElementById('hasil').innerHTML = null;
                var response = JSON.parse(response);
                if (response.length > 0) {
                    response.forEach(element => {
                        $("#hasil").append(`<table class="table table-hover table-dark table-striped text-light">
                    <thead>
                        <tr>
                            <th scope="col">ID Catatan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama Catatan</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Bahasa</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data = $result->fetch_assoc()): ?>
                            <tr>
                                <th scope="row"><?= $data['id'] ?></th>
                                <td><?= $data['tanggal'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['deskripsi'] ?></td>
                                <td><?= $data['name'] ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="edit.php?id=<?= $data['id'] ?>"  class="btn btn-outline-light">Edit</a>
                                        <a onclick="hapus(<?= $data ['id'] ?>)" class="btn btn-outline-danger">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>`);
                    });
                } else {
                    $("#hasil").html(`<div class='col-12'><div class='alert alert-warning' role='alert'>Data "${nama}" Tidak Ada</div></div>`);
                }
            }).fail(function(xhr, status, error) {
                $("#hasil").html(`<div class='col-12'><div class='alert alert-danger' role='alert'><strong>Error ${xhr.status}!</strong>${xhr.responseText}</div></div>`);
            });
        }

        $("#name").keyup(function(event) {
            event.preventDefault();
            show(NameInput.value, RatingInput.value, OrderInput.value);
        });

        $("#rating").change(function(event) {
            event.preventDefault();
            show(NameInput.value, RatingInput.value, OrderInput.value);
        });

        $("#order").change(function(event) {
            event.preventDefault();
            show(NameInput.value, RatingInput.value, OrderInput.value);
        });
    </script>