<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl4.css">
</head>

<body>
    <div class="baner">
        <h1>Forum wielbicieli psów</h1>
    </div>
    <div class="lewy">
        <img src="obraz.jpg" alt="foksterier" height="500px">
    </div>
    <div>
        <div class="prawy1">
            <h2>Zapisz się</h2>
            <form action="logowanie.php" method="post">
                login: <input type="text" name="login">
                <br>
                haslo: <input type="password" name="haslo">
                <br>
                powtórz haslo: <input type="password" name="phaslo">
                <br>
                <button onclick="klick()">Zapisz</button>
            </form>
            <?php
            if (isset($_POST['login'])) {

                $login = $_POST['login'];
                $haslo = $_POST['haslo'];
                $phaslo = $_POST['phaslo'];
                if (empty($login) || empty($haslo) || empty($phaslo)) {
                    echo '<p> wypełnij wszystkie pola </p>';
                } else {
                    if ($haslo != $phaslo) {
                        echo '<p> hasła nie są takie same, konto nie zostało dodane </p>';
                    } else {
                        $open = mysqli_connect('localhost', 'root', '', 'psy');
                        $test = mysqli_query($open, "SELECT login FROM uzytkownicy WHERE login='$login'");
                        if (mysqli_num_rows($test) > 0) {
                            echo '<p> login występuje w bazie danych, konto nie zostało dodane </p>';
                        } else {
                            $szyfr = sha1($haslo);
                            $wyslac = mysqli_query($open, "INSERT INTO uzytkownicy(login, haslo) VALUES ('$login', '$szyfr')");
                        }
                        mysqli_close($open);
                    }
                }
            }
            ?>
        </div>
        <div class="prawy2">
            <h2>Zapraszamy wszystkich</h2>
            <ol>
                <li>właścicieli psów</li>
                <li>weterynarzy</li>
                <li>tych, co chcą kupić psa</li>
                <li>tych, co lubią psy</li>
            </ol>
            <a href="regulamin.html">Przeczytaj regulamin forum</a>
        </div>
    </div>
    <footer>Stronę wykonał: 22222222222</footer>
</body>

</html>