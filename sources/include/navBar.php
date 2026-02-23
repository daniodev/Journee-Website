<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
.custom-navbar {
    position: fixed;
    top: 0;
    width: 100%;
    background-color: #FFDB97 !important;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    z-index: 1000;
    border-radius: 0 0 40px 40px;
    margin: 0 auto;
    padding-top: 0px !important;
    padding-bottom: 0px !important;
}

.journee {
    font-size: clamp(15px, 5vw, 35px);
    color: #000;
    font-weight: bold;
    line-height: 1;
    margin: 0 !important;
    padding: 0 !important;
    margin-left: clamp(-27px, -5vw, -35px) !important;
}

.profile {
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

.logo {
    height: clamp(50px, 6vw, 70px);
    width: auto;
    display: block;
}

.navbar-brand {
    display: flex;
    align-items: center;
    gap: 0;
}
.login{
    color: #000;
    font-weight: bold;
    text-decoration: none;
    font-family: 'IBM Plex Sans', sans-serif;
    font-size: 4vh;
}
.signup{
    color: #000;
    font-weight: bold;
    text-decoration: none;
    font-family: 'IBM Plex Sans', sans-serif;
    font-size: 4vh;
}
</style>

<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <img src="../../sources/images/Logo.png" alt="J" class="logo">
            <h1 class="journee">ournee</h1>
        </a>

        <?php

        if(!isset($_SESSION["id"])){
            echo "<div class='d-flex gap-1'>";
            echo "<a href='/auth/login/' class='login'>Log in | </a>";
            echo "<a href='/auth/register/' class='signup'>Sign in</a>";
            echo "</div>";

        }else{

            echo "<div class='profile'>";
                
                include 'db.php';

                if(isset($_SESSION["id"])){
                    $nome = $_SESSION["nome"];
                    $cognome = $_SESSION["cognome"];
                    $startingLetter = strtoupper($nome[0] . $cognome[0]);
                    echo $startingLetter;
                }
        }
        echo "</div>";
        ?>
    </div>
</nav>