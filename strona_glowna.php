<?php
// Rozpoczęcie sesji
session_start();

// Sprawdzenie, czy użytkownik jest zalogowany
if (!isset($_SESSION['uzytkownik'])){
    // Jeśli nie, zmienna LOGGED ustawiona na FALSE
    @$LOGGED = FALSE;
} else {
    // Jeśli tak, zmienna LOGGED ustawiona na TRUE
    @$LOGGED = TRUE;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Wymagane elementy meta -->
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
	.card-body1{
	  /* Styling dla kafelka 1 */
	  background-image: url('ekstraklasa.png'); 
	  background-size: contain;
	  background-repeat: no-repeat;
    background-position: center;
    position: relative;
    height: 150px; 
    overflow: hidden;
	  background-color: rgba(255, 255, 255, 0.2); 
	  padding: 8px;
    }
	.card-body2{
	  /* Styling dla kafelka 2 */
	  background-image: url('ligue1.png');
	  background-size: contain;
	  background-repeat: no-repeat;
      background-position: center;
      position: relative;
      height: 150px;
      overflow: hidden;
	  background-color: rgba(255, 255, 255, 0.2);
	padding: 8px;
    }
	.card-body3{
	  /* Styling dla kafelka 3 */
	  background-image: url('premier.png');
	  background-size: contain;
	  background-repeat: no-repeat;
      background-position: center;
      position: relative;
      height: 150px;
      overflow: hidden;
	  background-color: rgba(255, 255, 255, 0.2);
	padding: 8px;
    }
	.card-body4{
	  /* Styling dla kafelka 4 */
	  background-image: url('bundesliga.png');
	  background-size: contain;
	  background-repeat: no-repeat;
      background-position: center;
      position: relative;
      height: 150px;
      overflow: hidden;
	  background-color: rgba(255, 255, 255, 0.2);
	padding: 8px;
    }
	
	.card-body5{
	  /* Styling dla kafelka 5 */
	  background-image: url('seriaa.png');
	  background-size: contain;
	  background-repeat: no-repeat;
      background-position: center;
      position: relative;
      height: 150px;
      overflow: hidden;
	  background-color: rgba(255, 255, 255, 0.2);
	padding: 8px;
    }
	.card-body6{
	  /* Styling dla kafelka 6 */
	  background-image: url('plusliga.png');
	  background-size: contain;
	  background-repeat: no-repeat;
      background-position: center;
      position: relative;
      height: 150px;
      overflow: hidden;
	  background-color: rgba(255, 255, 255, 0.2);
	padding: 8px;
    }
  </style>
  <
  <title>Sportowe zawirowania</title>
</head>
<body>
  <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand fs-3" href="strona_glowna.php">Sportowe zawirowania</a>
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
          // Warunek sprawdzający, czy użytkownik jest zalogowany
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

  <div class="container mt-4">
    <div class="row">
      <!-- Kafelki -->
      <div class="col-4 mb-4 ">
        <div class="card">
          <div class="card-body1">
            <h5 class="card-title"><b>Ekstraklasa</b></h5>
            <p class="card-text"><b>Ranking</b></p>
            <a href="ekstraklasa.php" class="btn btn-dark bg-dark">Sprawdź!</a>
          </div>
        </div>
      </div>

      <div class="col-4 mb-4">
        <div class="card ">
          <div class="card-body2">
            <h5 class="card-title"><b>Ligue 1</b></h5>
            <p class="card-text"><b>Ranking</b></p>
            <a href="ligue1.php" class="btn btn-dark bg-dark">Sprawdź!</a>
          </div>
        </div>
      </div>

      <div class="col-4 mb-4">
        <div class="card">
          <div class="card-body3">
            <h5 class="card-title">Premier League</h5>
            <p class="card-text">Ranking</p>
            <a href="premierleague.php" class="btn btn-dark bg-dark">Sprawdź!</a>
          </div>
        </div>
      </div>

      <div class="col-4 mb-4">
        <div class="card">
          <div class="card-body4">
            <h5 class="card-title"><b>Bundesliga</b></h5>
            <p class="card-text"><b>Ranking</b></p>
            <a href="bundesliga.php" class="btn btn-dark bg-dark">Sprawdź!</a>
          </div>
        </div>
      </div>

      <div class="col-4 mb-4">
        <div class="card">
          <div class="card-body5">
            <h5 class="card-title"><b>Serie A</b></h5>
            <p class="card-text"><b>Ranking</b></p>
            <a href="serieA.php" class="btn btn-dark bg-dark">Sprawdź!</a>
          </div>
        </div>
      </div>

      <div class="col-4 mb-4">
        <div class="card">
          <div class="card-body6">
            <h5 class="card-title"><b>Plus Liga</b></h5>
            <p class="card-text"><b>Ranking</b></p>
            <a href="PlusLiga.php" class="btn btn-dark bg-dark">Sprawdź!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  // Warunek sprawdzający, czy użytkownik jest zalogowany
  if($LOGGED) {
   echo '<div class="col-12 mb-4">
   <div class="card mx-auto w-75" style="height: 200px;">
     <div class="card-body">
       <h5 class="card-title text-center">Ciekawostki z świata sportu</h5>
       <p class="card-text text-center">Co kryje sport?</p>
       <a href="ciekawostki.php" class="btn btn btn-dark bg-dark d-flex justify-content-center align-items-center ">Sprawdź!</a>
     </div>
   </div>
 </div>';
} else {
  echo '<div class="col-12 mb-4">
  <div class="card mx-auto w-75" style="height: 200px;">
    <div class="card-body">
      <h5 class="card-title text-center">Zalecamy zalogowanie!</h5>
      <p class="card-text text-center">Więcej materiałów jak się zalogujesz!!</p>
      <a href="zaloguj_sie.php" class="btn btn btn-dark bg-dark d-flex justify-content-center align-items-center ">Sprawdź!</a>
    </div>
  </div>
</div>';
}
?>
  <!-- Stopka -->
  <footer class="bg-dark text-white text-center p-3">
    &copy; 2023 Sportowe zawirowania. Wszelkie prawa zastrzeżone.
  </footer>
</body>
</html>
