<?php
  session_start();
  if(!isset($_SESSION['moodstudy.com'])){
    header('location:index.php');
  }
  if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
      include_once('database.php');
      $database = new Database;
      $matiere = $_POST['matiere'];
      $email = $_SESSION['moodstudy.com'];
      $coefficient = $_POST['coefficient'];
      $interet = $_POST['interet'];
      $connaissance = $_POST['connaissance'];

      $database->conn = $database->connect();
      $sql = "INSERT INTO Matieres VALUES(NULL,'$email','$matiere','$coefficient','$connaissance')";
      mysqli_query($database->conn,$sql);
      header('location:listes.php');
  }
?>

<!DOCTYPE html>
<html lang="fr" >
<head>
  <meta charset="UTF-8">
  <title><?=$_SESSION['moodstudy.com']?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="home-style.css">
<style>
  form{
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .heure{
    margin: 0 5px;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-direction:column;
  }
  select,input{
    width: 100%;
    height: 50px;
    font-size:22px;
    border-radius:6px;
    border: none;
    border-radius: 12px;
    box-shadow: 0 10px 20px 0 #3cb37177, inset 0px -4px 8px 0 SeaGreen;
    border: none !important;
    padding: 0px 20px 5px 20px;
    background-color:#fff;
    color:#555;
  }
  input[type='submit']{
    background-color:#90ee12;
    transition: all 0.3s ease-out;
  }
  input[type='submit']:hover{
    background-color:SeaGreen;
  }
  .deco {
  position: relative;
  background: white;
  font-size: 12pt;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-decoration: none;
  padding: 10px 20px;
  color: dimgray;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 10px 20px 0 #000000bb, inset 0px -5px 10px 1px SeaGreen;
}

.deco::after {
  position: absolute;
  top: 110%;
  left: 0;
  width: 100%;
  height: 100%;
  content: "";
  background: MediumSpringGreen;
  border-radius: 12px;
  box-shadow: 0 10px 20px 0 #000000bb, inset 0px -5px 10px 1px SeaGreen;
  opacity: 0;
  z-index: -1;
}

.deco a:hover {
  transform: translateY(5px);
  color: black;
}

.deco:hover::after {
  top: 0;
  opacity: 1;
}

.deco:active {
  transform: scale(0.92);
}
  @media (max-width: 800px){
    form{
      flex-direction:column;
    }
    .large-banner{
      margin:70px 0;
      height:350px;
    }
  }
</style>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="dashboard-river">

  <div class="dashboard-container">

    <div class="dashboard">

      <div class="ui-row-1">

        <div class="logo-comp">
          <div><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 297 297" xml:space="preserve">
              <g>
                <path d="M48.523,73.196h18.131c5.597,0,10.137-4.536,10.137-10.134c0-5.6-4.54-10.137-10.137-10.137H48.523 c-5.599,0-10.137,4.537-10.137,10.137C38.387,68.66,42.925,73.196,48.523,73.196z" />
                <path d="M47.628,123.657c0-5.598-4.54-10.137-10.137-10.137H19.357c-5.599,0-10.135,4.539-10.135,10.137 c0,5.597,4.536,10.135,10.135,10.135h18.134C43.088,133.792,47.628,129.254,47.628,123.657z" />
                <path d="M277.643,95.387h-18.135c-5.597,0-10.137,4.539-10.137,10.135c0,5.601,4.54,10.137,10.137,10.137h18.135 c5.599,0,10.135-4.536,10.135-10.137C287.777,99.926,283.241,95.387,277.643,95.387z" />
                <path d="M140.148,203.69v83.173c0,5.598,4.54,10.137,10.137,10.137c5.599,0,10.137-4.539,10.137-10.137V203.69h93.406 c5.597,0,10.137-4.539,10.137-10.136c0-5.598-4.54-10.137-10.137-10.137H227.05c3.911-8.197,5.898-17.617,5.898-28.209 c0-29.299-21.058-60.583-39.637-88.187c-5.055-7.506-9.829-14.599-13.809-21.124c-1.689-3.791-1.094-19.677,1.284-34.106 c0.487-2.938-0.344-5.942-2.271-8.212c-1.926-2.27-4.752-3.58-7.73-3.58h-40.998c-2.977,0-5.803,1.313-7.729,3.58 c-1.924,2.268-2.755,5.271-2.273,8.21c2.383,14.432,2.978,30.316,1.288,34.107c-3.984,6.527-8.759,13.619-13.813,21.126 c-18.579,27.604-39.639,58.887-39.639,88.186c0,10.592,1.987,20.012,5.902,28.209H46.745c-5.601,0-10.137,4.539-10.137,10.137 c0,5.597,4.536,10.136,10.137,10.136H140.148z M202.707,183.418H97.864c-6.701-7.003-9.968-16.27-9.968-28.209 c0-23.111,19.222-51.669,36.182-76.865c5.209-7.738,10.13-15.05,14.363-21.993c4.769-7.819,4.27-23.774,2.954-36.077h17.781 c-1.316,12.302-1.813,28.257,2.952,36.077c4.233,6.943,9.153,14.252,14.362,21.992c16.96,25.197,36.184,53.755,36.184,76.866 C212.675,167.148,209.406,176.417,202.707,183.418z" />
              </g>
            </svg></div>
          <p>MOODSTUDY</p>
        </div>

        <div class="search">
          <input type="search" id="search" name="search" placeholder="Search for clay...">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
          </svg>
        </div>

        <div class="profile">
          <a href="deconnexion.php" class="deco">
            Deconnexion
          </a>
          <div></div>
        </div>

        <div class="profile-small">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
            <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
          </svg>
        </div>

      </div>

      <div class="ui-row-2">

        <div class="left-sidebar">

          <div onclick="redirectPage();">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
              <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
            </svg>
          </div>
          <script>
            function redirectPage() {
              window.location.href = 'home.php'; // Remplacez par l'URL de destination
            }
          </script>

          <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
              <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2z" />
            </svg>
          </div>

          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
              <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
              <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
              <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
            </svg>
          </div>

          <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-tags-fill" viewBox="0 0 16 16">
              <path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
              <path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z" />
            </svg>
          </div>

        </div>

        <div class="main-content">

          <div class="header">

            <div class="clay-category">
              <!--FABIEN-->
              <a href="ajouter-temps-libres.php" class="three">
                <p>Ajouter temps libre</p>
              </a>
              <!--FABIEN-->
            </div>

            <div class="clay-category">
              <!--FABIEN-->
              <a href="#" class="three">
                <p>Ajouter du matière</p>
              </a>
              <!--FABIEN-->
            </div>

            <div class="clay-category">
              <!--FABIEN-->
              <a href="ajouter-humeur.php" class="three">
                <p>Modifier l'humeur</p>
              </a>
              <!--FABIEN-->
            </div>

          </div>
          <div class="large-banner">
            <form action="" method="POST">
                  <div class="heure">
                    <label for="subjectName">Nom du matière</label>
                    <input type="text" class="subjectName" name="matiere" placeholder="Nom du matière" required />
                  </div>
                  <div class="heure">
                    <label for="coefficient">Coefficient</label>
                    <input type="number" class="subjectCoefficient" name="coefficient" placeholder="Coefficient" min="1" required />
                  </div>
                  <div class="heure">
                    <label for="knowledge">Connaissance</label>
                    <input type="number" class="subjectKnowledge" name="connaissance" placeholder="Connaissance" min="0" max="100" required />
                  </div>
                  <div class="heure">
                    <label>Sauvegarder</label>
                    <input type="submit" name="submit" value="ajouter">
                  </div>
                <div id="subjects"></div>
            </form>
          </div>
      </div>

    </div>

  </div>

</div>
<!-- partial -->
  
</body>
</html>
