<?php

require 'db.php';

$id = intval($_GET['id']);
$sql = "DELETE FROM catatan WHERE id = $id";
$conn->prepare($sql)->execute();

header("Location: index.php");