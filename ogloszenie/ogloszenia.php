<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Portal ogłoszeniowy</title>

    <link rel="stylesheet" type="text/css" href="styl1.css">
</head>
<body>
    <div class="baner">
        <h1>Portal Ogłoszeniowy</h1>
    </div>
    <div class="lewy-panel">
        <h2>Kategorie ogłoszeń</h2>
        <ol>
            <li>Książki</li>
            <li>Muzyka</li>
            <li>Filmy</li>
        </ol>

        <img src="ksiazki.jpg" alt="Kupię / sprzedam książkę">

        <table>
            <tr>
                <td>Liczba ogłoszeń</td>
                <td>Cena ogłoszenia</td>
                <td>Bonus</td>
            </tr>
            <tr>
                <td>1 - 10</td>
                <td>1 PLN</td>
                <td rowspan="3">Subskrypcja newslettera to upust 0,20 PLN na ogłoszenie</td>
            </tr>
            <tr>
                <td>11 - 50</td>
                <td>0,80 PLN</td>
            </tr>
            <tr>
                <td>51 i więcej</td>
                <td>0,60 PLN</td>
            </tr>
        </table>
    </div>
    <div class="prawy-panel">
        <h2>Ogłoszenia kategorii książki</h2>
        <?php
            $db = mysqli_connect("localhost", "root", "", "ogloszenia");

            $query1 = mysqli_query($db, "SELECT id, tytul, tresc FROM ogloszenie WHERE kategoria = 1");

            $query2 = mysqli_query($db, "SELECT uzytkownik.telefon FROM ogloszenie, uzytkownik WHERE uzytkownik.id = ogloszenie.uzytkownik_id");
            
            while ($row1 = mysqli_fetch_assoc($query1)
            and $row2 = mysqli_fetch_assoc($query2)) {
                echo "<h3>".$row1['id']." ".$row1['tytul']."</h3>";
                echo $row1['tresc']."<br />";
                echo "telefon kontaktowy: ".$row2['telefon'];
            }

            mysqli_close($db);
        ?>
    </div>
    <div class="stopka">
        Portal ogłoszeniowy opracował: 00000000001
    </div>
</body>
</html>