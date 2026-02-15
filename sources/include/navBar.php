<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
.custom-navbar {
    position: fixed;
    top: 0;
    width: 100%;

    background: rgba(255, 255, 255, 0.4) !important;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    z-index: 1000;
    border-radius: 0 0 40px 40px;
    margin: 0 auto;
}

.journee{
    font-size: clamp(15px, 5vw, 35px);
    color: #000;  
    font-weight: bold;
    padding-left: clamp(50px, 5vw, 100px);
    margin:0 !important;
    padding:0 !important;
    line-height:1;
}
.profile{
    background-color: #ff758a;
    border-radius: 40px;
    font-family: 'IBM Plex Sans', sans-serif;
    font-weight: bold;
    align-items: center;
    display: flex;
    justify-content: center;
    font-size: 22px;
    width: 50px;
    height: 50px;
}

.logo{
    height: clamp(35px, 8vw, 55px);
    width: auto;
}
.navbar-brand{
  display: flex;
  align-items: center;
}
</style>

<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
        <img src="../../sources/images/Logo.png" alt="J" class="logo">
        <h1 class="journee">
            ournee
        </h1>
        </a>

        <div class="profile">
            <?php
            
            include 'db.php';

            if(isset($_SESSION["id"])){

            $nome = $_SESSION["nome"];
            $cognome = $_SESSION["cognome"];

            $startingLetter = strtoupper($nome[0] . $cognome[0]);
            echo $startingLetter;
            }

            ?>   
        </div>         
    </div>
</nav>