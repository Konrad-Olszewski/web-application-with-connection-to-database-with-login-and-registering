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


<table class="table table-hover">
    <tr>
    <thead>
    <td>Miejsce</td>
    <th scope="col">Drużyna</th>
    <th scope="col">Mecze Rozegrane</th>
    <th scope="col">Punkty</th>
    </thead>
    </tr>
    <tr>
    <td>1.</td>
    <td>Inter</td>
    <td>16</td>
    <td>41</td>
    </tr>
    <tr>
    <td>2.</td>
    <td>Juventus</td>
    <td>16</td>
    <td>37</td>
    </tr>
    <tr>
    <td>3.</td>
    <td>AC Milan</td>
    <td>16</td>
    <td>32</td>
    </tr>
    <tr>
    <td>4.</td>
    <td>Bologna</td>
    <td>16</td>
    <td>28</td>
    </tr>
    <tr>
    <td>5.</td>
    <td>Napoli</td>
    <td>16</td>
    <td>27</td>
    </tr>
    <tr>
    <td>6.</td>
    <td>Fiorentina</td>
    <td>16</td>
    <td>27</td>
    </tr>
    <tr>
    <td>7.</td>
    <td>Atalanta</td>
    <td>16</td>
    <td>26</td>
    </tr>
    <tr>
    <td>8.</td>
    <td>AS Roma</td>
    <td>16</td>
    <td>25</td>
    </tr>
    <tr>
    <td>9.</td>
    <td>Torino</td>
    <td>16</td>
    <td>23</td>
    </tr>
    <tr>
    <td>10.</td>
    <td>Monza</td>
    <td>16</td>
    <td>21</td>
    </tr>
    <tr>
    <td>11.</td>
    <td>Lazio</td>
    <td>16</td>
    <td>21</td>
    </tr>
    <tr>
    <td>12.</td>
    <td>Lecce</td>
    <td>16</td>
    <td>20</td>
    </tr>
    <tr>
    <td>13.</td>
    <td>Frosinone</td>
    <td>16</td>
    <td>19</td>
    </tr>
    <tr>
    <td>14.</td>
    <td>Genoa</td>
    <td>16</td>
    <td>16</td>
    </tr>
    <tr>
    <td>15.</td>
    <td>Sassuolo</td>
    <td>16</td>
    <td>16</td>
    </tr>
    <tr>
    <td>16.</td>
    <td>Cagliari</td>
    <td>16</td>
    <td>13</td>
    </tr>
    <tr>
    <td>17.</td>
    <td>Udinese</td>
    <td>16</td>
    <td>13</td>
    </tr>
    <tr>
    <td>18.</td>
    <td>Empoli</td>
    <td>16</td>
    <td>12</td>
    </tr>
    <tr>
    <td>19.</td>
    <td>Verona</td>
    <td>16</td>
    <td>11</td>
    </tr>
    <tr>
    <td>20.</td>
    <td>Salernitana</td>
    <td>16</td>
    <td>8</td>
    </tr>
    </table>

<footer class="bg-dark text-white text-center p-3">
    &copy; 2023 Sportowe zawirowania. Wszelkie prawa zastrzeżone.
  </footer>
</body>
</html>