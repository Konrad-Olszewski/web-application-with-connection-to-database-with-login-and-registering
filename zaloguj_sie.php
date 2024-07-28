<?php session_start(); 

    function cezarEncrypt($text, $shift) {
        $result = '';

        for ($i = 0; $i < strlen($text); $i++) {
            $char = $text[$i];

            if (ctype_alpha($char)) {
                $asciiOffset = ord(ctype_upper($char) ? 'A' : 'a');
                $result .= chr(($asciiOffset + (ord($char) - $asciiOffset + $shift) % 26));
            } else {
                $result .= $char;
            }
        }

        return $result;
    }

    function cezarDecrypt($text, $shift) {
        return cezarEncrypt($text, 26 - $shift);
    }

    function vigenereDecrypt($ciphertext, $key) {
        $result = '';
        $key = strtoupper($key);
        $keyLength = strlen($key);

        for ($i = 0, $j = 0; $i < strlen($ciphertext); $i++) {
            $char = $ciphertext[$i];

            if (ctype_alpha($char)) {
                $isUpperCase = ctype_upper($char);
                $char = chr(((ord($char) - ($isUpperCase ? 65 : 97) - (ord($key[$j % $keyLength]) - 65) + 26) % 26) + ($isUpperCase ? 65 : 97));
                $j++;
            }

            $result .= $char;
        }

        return $result;
    }
	
	function encryptNumbers($text, $shift)
{
    $result = '';

    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];

        if (ctype_digit($char)) {
            $result .= chr((ord($char) - ord('0') + $shift) % 10 + ord('0'));
        } else {
            $result .= $char;
        }
    }

    return $result;
}


	function decryptNumbers($text, $shift)
{
    return encryptNumbers($text, 10 - $shift);
}

// Sprawdź, czy przycisk "Zaloguj się" został naciśnięty
if (isset($_POST['login'])) {
    $link = mysqli_connect('localhost', 'root', '', 'baza_hasel');
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $haslo = mysqli_real_escape_string($link, $_POST['password']);

    if ($email != '' && $haslo != '') {
        $zapytanie = "SELECT email, haslo FROM uzytkownicy WHERE email='$email'";
        $wynik_zapytania = mysqli_query($link, $zapytanie) or die('ERROR' . mysqli_error($link));

        if (mysqli_num_rows($wynik_zapytania) > 0) {
            $wiersz = mysqli_fetch_assoc($wynik_zapytania);
            $email_baza = $wiersz["email"];
            $haslo_baza = $wiersz["haslo"];
			
			$haslo_baza = decryptNumbers($haslo_baza, 4);
            $haslo_baza = vigenereDecrypt($haslo_baza, 'strona');
            $haslo_baza = cezarDecrypt($haslo_baza, 3);
			
			

            if ($email == $email_baza and $haslo == $haslo_baza) {
				@$_SESSION['uzytkownik'] = $email;
                header('Location: strona_glowna.php');
                echo '<div id="komunikat_sukces" style="color: green;">' . htmlspecialchars('Logowanie zakończone sukcesem') . '</div>';
                
				
            } else {
                echo '<div id="komunikat_blad" style="color: red;">' . htmlspecialchars('Niepoprawny login lub hasło') . '</div>';
            }
        } else {
            echo '<div id="komunikat_blad" style="color: red;">' . htmlspecialchars('Użytkownik o podanym adresie email nie istnieje.') . '</div>';
        }
    } else {
        echo '<div id="komunikat_blad" style="color: red;">' . htmlspecialchars('Nie wpisano pełnych danych (email i hasło są wymagane).') . '</div>';
    }

    mysqli_close($link);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        footer {
            margin-top: auto;
        }
		
			#komunikat_blad {
    text-align: center;
    background-color: #ffcccc; /* Jasno czerwone tło */
    color: #660000; /* Ciemny kolor czcionki */
    padding: 10px; /* Dodatkowy padding dla lepszego wyglądu */
    border: 2px solid #990000; /* Gruba ramka o ciemniejszym czerwonym kolorze */
    border-radius: 8px; /* Zaokrąglenie narożników */
		}
	
	#komunikat_sukces {
    text-align: center;
    background-color: #ccffcc; /* Jasno zielone tło */
    color: #006600; /* Ciemny zielony kolor czcionki */
    padding: 10px; /* Dodatkowy padding dla lepszego wyglądu */
    border: 2px solid #006600; /* Gruba ramka o ciemniejszym zielonym kolorze */
    border-radius: 8px; /* Zaokrąglenie narożników */
}
    </style>
    <title>Sportowe zawirowania</title>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="strona_glowna.php">Sportowe zawirowania</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText"
                aria-expanded="false" aria-label="Toggle navigation" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="strona_glowna.php">Strona główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kontakt_pomoc.php">Kontakt - pomoc</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rejestracja.php">Zarejestruj się</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
    <!-- Panel logowania -->
    <form class="d-flex flex-column align-items-center" method="post">
        <input id="email" name='email' class="form-control mb-3" type="email" placeholder="Email" aria-label="Email">
        <div class="input-group mb-3">
            <input id="password" name='password' class="form-control mb-3" type="password" placeholder="Hasło" aria-label="Hasło">
            <div class="input-group-append">
                <div class="input-group-text">
                    <button class="btn btn-outline-dark" type="button" onclick="togglePasswordVisibility('password', 'togglePasswordIcon')">
                        <span id="togglePasswordIcon">&#x1F441;</span>
                    </button>
                </div>
            </div>
        </div>
        <button id="loginBtn" name="login" class="btn btn-outline-dark" type="submit" >Zaloguj się</button>
    </form>

    <script>
    function togglePasswordVisibility(inputId, iconId) {
        var passwordInput = document.getElementById(inputId);
        var icon = document.getElementById(iconId);

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.innerHTML = "&#x1F441;";
        } else {
            passwordInput.type = "password";
            icon.innerHTML = "&#x1F441;";
        }
    }
</script>
</main>




    <footer class="bg-dark text-white text-center p-3">
        &copy; 2023 Sportowe zawirowania. Wszelkie prawa zastrzeżone.
    </footer>

</body>

</html>
