<?php

require 'db.php';
$sql = "SELECT * FROM language";
$result = $conn->query($sql);

if (isset($_POST['submit'])) {
    $tanggal = $_POST['tanggal'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $bahasa = $_POST['language_id'];



    $sql = "INSERT INTO catatan(tanggal, nama, deskripsi, bahasa) VALUES(?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssss", $tanggal, $nama, $deskripsi, $bahasa);
    $stmt->execute();

    header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS_202410101131</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>

<body style="padding-top: 4rem;">
    <div class="container">
        <div class="card-body bg-secondary">
            <div class="card-header bg-dark text-light">
                Dambah Data
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-light">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="exampleFormControlInput1">
                    </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-light">Nama Catatan</label>
                        <input type="text" name="nama" class="form-control" id="exampleFormControlInput1">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-light">Deskripsi Catatan</label>
                        <input type="text" name="deskripsi" class="form-control" id="exampleFormControlInput1">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-light">Bahasa</label>
                        <select class="form-select" name="language_id" id="language_id" required>
                            <?php while ($data = $result->fetch_assoc()): ?>
                                <option value="<?= $data['language_id'] ?>"><?= $data['name'] ?></option>
                            <?php endwhile ?>
                        </select>
                      </div>
                      <div class="d-flex justify-content-end">
                        <button type="submit" name="submit" class="btn btn-light">Submit</i></button>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>