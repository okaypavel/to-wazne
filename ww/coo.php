<?php
$tabl = mysqli_connect('localhost', 'root', '', 'poradnia');
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$nazw1 = mysqli_query($tabl, "SELECT * FROM pacjenci WHERE nazwisko = '$nazwisko'");
if(mysqli_num_rows($nazw1) == 0) {
    $nazw2 = mysqli_query($tabl, "INSERT INTO pacjenci(nazwisko) VALUES ('$nazwisko')");
} else {
    echo "nie";
}
mysqli_close($tabl);
?>