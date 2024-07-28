<?php
session_start();
if (!isset($_SESSION['uzytkownik'])){
  @$LOGGED=FALSE;
}else
{
  @$LOGGED=TRUE;
}
?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
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
    html, body {
      height: 100%;
    }

    body {
      display: flex;
      flex-direction: column;
    }

    main {
      flex: 1;
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
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation"
        type="button">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="strona_glowna.php">Strona główna</a>
        </li>
        <?php
if($LOGGED) {
   echo '<li class="nav-item">
   <a class="nav-link" href="logout.php"">Wyloguj się</a>
 </li>';
} else {
  echo '<li class="nav-item">
  <a class="nav-link" href="zaloguj_sie.php">Zaloguj się</a>
</li>
<li class="nav-item">
<a class="nav-link" href="rejestracja.php">Zarejestruj się</a>
</li>';
}
?>
</ul>
</div>
</div>
</nav>
<main>
<form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Podaj email</label>
    <input id="email" name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Twój email">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">W czym możemy Ci pomóc?</label>
    <textarea input id="text" name="text" type="text" class="form-control" id="exampleFormControlTextarea1" rows="7"></textarea>
  </div>
  <button id="loginBtn" name="wyslij" class="btn btn-outline-dark" type="submit">Wyślij</button>
</form>
</main>
<?php
$link = mysqli_connect('localhost', 'root', '', 'baza_hasel');

if (isset($_GET['wyslij'])) {
  $email = @$_GET['email'];
  $tekst = @$_GET['text'];
  
  // Sprawdzenie poprawności adresu e-mail
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo '<div id="komunikat_blad" style="color: red;">' . htmlspecialchars('Niepoprawny adres e-mail. Proszę podać poprawny adres e-mail.') . '</div>';
  } elseif (empty($tekst)) {
      echo '<div id="komunikat_blad" style="color: red;">' . htmlspecialchars('Zgłoszenie nie może być puste. Proszę wpisać treść zgłoszenia.') . '</div>';
  } else {
      $zapytanie = "INSERT INTO kontakt_pomoc (email, informacja) VALUES ('$email', '$tekst')";
      $wynik_zapytania = mysqli_query($link, $zapytanie) or die('ERROR: ' . mysqli_error($link));

      if ($wynik_zapytania) {
          echo '<div id="komunikat_sukces" style="color: red;">' . htmlspecialchars('Twoje zgłoszenie zostało wysłane. Dziękujemy za informacje.') . '</div>';
      }
  }
}
mysqli_close($link);
?>


  <footer class="bg-dark text-white text-center p-3">
  &copy; 2023 Sportowe zawirowania. Wszelkie prawa zastrzeżone.
  </footer>
</body>
</html>