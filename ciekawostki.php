<?php
session_start();
if (!isset($_SESSION['uzytkownik'])){
    @$LOGGED=FALSE;
}else
{
    @$LOGGED=TRUE;
}
?>
<!DOCTYPE html>
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
        <li class="nav-item">
        <a class="nav-link" href="kontakt_pomoc.php">Kontakt - pomoc</a>
        </li>
    </ul>
    </div>
</div>
</nav>
<main>
1. Początek sportu <br>
...
<br>
2. Siatkówka <br>
...
<br>
3. Medal olimpijski<br>
...
<br>
4. Jocem Rindt<br>
...
<br>
5. Finlandia<br>
...
<br>
6. Tenis<br>
...
<br>
7. Flaga olimpijska<br>
...
<br>
8. Żużel<br>
...
<br>
9. Skok w dal<br>
...
</main>

<footer class="bg-dark text-white text-center p-3">
    &copy; 2023 Sportowe zawirowania. Wszelkie prawa zastrzeżone.
  </footer>
</body>
</html>