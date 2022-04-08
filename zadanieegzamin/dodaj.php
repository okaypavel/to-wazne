<?php
$con = mysqli_connect('localhost', 'root', '', 'dane');

$tytul = $_POST['tytul'];
$gatunek = $_POST['gatunek'];
$rok = $_POST['rok'];
$ocena = $_POST['ocena'];

$sql = "insert into filmy(tytul, gatunek, rok, ocena) values('$tytul', $gatunek, $rok, $ocena)";

mysqli_query($con, $sql);
mysqli_close($con);
?>