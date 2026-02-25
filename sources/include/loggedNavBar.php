<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

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

.expand-btn {
    width: 60px;
    height: 60px;
    border-radius: 40px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.expand-btn img {
    width: 70px;
    height: 70px;
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

.brand-center {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    align-items: center;
    gap: 0;
}

.profile {
    background-color: #ff758b;
    border-radius: 40px;
    font-family: 'IBM Plex Sans', sans-serif;
    font-weight: bold;
    align-items: center;
    display: flex;
    justify-content: center;
    font-size: 22px;
    width: 50px;
    height: 50px;
    cursor: pointer;
    border: none !important;
    text-decoration: none !important;
    color: #000 !important;
}

.profile::after {
    display: none !important;
}

.logo {
    height: clamp(50px, 6vw, 70px);
    width: auto;
    display: block;
}

.login {
    color: #000;
    font-weight: bold;
    text-decoration: none;
    font-family: 'IBM Plex Sans', sans-serif;
    font-size: 4vh;
}

.signup {
    color: #000;
    font-weight: bold;
    text-decoration: none;
    font-family: 'IBM Plex Sans', sans-serif;
    font-size: 4vh;
}

.dropdown-menu {
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    border: none;
    min-width: 160px;
}

.dropdown-item {
    color: #e84c4c;
    font-family: 'IBM Plex Sans', sans-serif;
    font-weight: 600;
    font-size: 15px;
    background: none;
    width: 100%;
    text-align: left;
    border: none;
    padding: 12px 18px;
}

.dropdown-item:hover {
    background-color: #fff0f0;
    color: #e84c4c;
}

.offcanvas .btn-close {
  position: absolute;
  top: 0px;
  left: 0px;
  z-index: 1055;
  background-image: none !important;
  background: transparent !important;
}
.offcanvas-title{
    font-family: 'IBM Plex Sans', sans-serif;
    font-weight: bold;
    font-size: 30px;
    color: #000;
    margin-top: 10%;
}
.no-pages{
    font-family: 'IBM Plex Sans', sans-serif;
    font-size: 20px;
    color: #000;
}

/* Diary items nel pannello */
.diary-item {
  display: flex;
  gap: 15px;
  padding: 15px 0;
  border-bottom: 1px solid #e0e0e0;
}

.diary-item:last-child {
  border-bottom: none;
}

.diary-date {
  min-width: 50px;
  font-family: 'IBM Plex Sans', sans-serif;
  font-weight: 700;
  font-size: 16px;
  padding: 8px 12px;
  border-radius: 20px;
  text-align: center;
  color: gray;
}

.diary-content {
  flex: 1;
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  gap: 10px;
}

.diary-title {
  font-family: 'IBM Plex Sans', sans-serif;
  font-weight: 600;
  font-size: 18px;
  color: #333;
  margin: 0;
  flex: 1;
  line-height: 2;
}

.diary-actions {
  display: flex;
  margin-left: auto;
}

.btn-view, .btn-delete {
  width: 36px;
  height: 36px;
  font-size: 16px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  border: none;
    border-radius: 999px;
}

.btn-view {
  color: #000;
}

.btn-view:hover {
  transform: scale(1.05);
}

.btn-delete {
  color: white;
}

.btn-delete:hover {
  transform: scale(1.05);
}

  
  .diary-content {
    flex-direction: column;
    align-items: stretch;
  }

</style>

<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container-fluid px-4">

        <div class="expand-btn" data-bs-toggle="offcanvas" data-bs-target="#leftPanel" aria-controls="leftPanel">
            <img src="../../sources/images/ExpanIcon.png" alt="Expand">
        </div>

        <div class="brand-center">
            <img src="../../sources/images/Logo.png" alt="J" class="logo">
            <h1 class="journee">ournee</h1>
        </div>

        <!-- Profilo a destra -->
        <?php
        if(!isset($_SESSION["id"])){
            echo "<div class='d-flex gap-1'>";
            echo "<a href='/auth/login/' class='login'>Log in | </a>";
            echo "<a href='/auth/register/' class='signup'>Sign in</a>";
            echo "</div>";
        } else {
            include 'db.php';
            $nome = $_SESSION["nome"];
            $cognome = $_SESSION["cognome"];
            $startingLetter = strtoupper($nome[0] . $cognome[0]);
            ?>

            <div class="dropdown">
                <div class="profile dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $startingLetter ?>
                </div>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form action="../../auth/logout.php" method="POST"
                              onsubmit="return confirm('Sei sicuro di voler uscire?')">
                            <button type="submit" class="dropdown-item">Esci</button>
                        </form>
                    </li>
                </ul>
            </div>

        <?php } ?>
    </div>
</nav>

<div class="offcanvas offcanvas-start" tabindex="-1" id="leftPanel" aria-labelledby="leftPanelLabel">
    <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="leftPanelLabel">I tuoi Journee</h2>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                    <img src="../../sources/images/ExpanIcon.png" alt="Expand" width="70" height="70">
                </button>
    </div>
    <hr>
        <div class="offcanvas-body">
                <ul class="list-unstyled">
                
                <?php

                $id = $_SESSION["id"];

                $query = "SELECT idPagina, titolo, giornoScrittura, pensieroGiornaliero FROM pagine WHERE idUtente = ". $id . " ORDER BY giornoScrittura DESC";
                $result = mysqli_query($conn, $query);
                $pages = mysqli_fetch_all($result, MYSQLI_ASSOC);

                if (empty($pages)) {
                echo "<div class='no-pages'>
                            Sembra te non abbia scritto ancora nulla.  
                             <a href='../../diary/write/'>Inizia ora!</a>
                      </div>"; ?>
                <?php
            } else {
            foreach ($pages as $page) {
                $idPagina = $page["idPagina"];
                $titolo = !empty($page["titolo"]) 
                        ? htmlspecialchars($page["titolo"]) 
                        : "Senza titolo";
                $testo = !empty($page["pensieroGiornaliero"]) 
                        ? htmlspecialchars(substr($page["pensieroGiornaliero"], 0, 100)) . "..."
                        : "Nessun pensiero registrato...";
                $data = date("d/m", strtotime($page["giornoScrittura"]));
            ?>
                <!-- ITEM DEL DIARY - dentro il foreach -->
                <div class="diary-item">
                    <div class="diary-date"><?= $data ?></div>
                    <div class="diary-content">
                        <div class="diary-title"><?= $titolo ?></div>
                        <div class="diary-actions">
                            <button class="btn-view">
                                                <a href="../../diary/view/?id=<?= $idPagina ?>">
                                <img src="../../sources/images/eyeOpen.png" alt="View" width="24" height="24">
                                </a>
                            </button>
                            <button class="btn-delete">
                                <a href="../../diary/delete/?id=<?= $idPagina ?>"
                                onclick="return confirm('Sei sicuro di voler eliminare questa pagina? L\'operazione è irreversibile.')">
                                <img src="../../sources/images/recicleBin.png" alt="Delete" width="24" height="24">
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
        <?php
        }

            }
            ?>
                
                </ul>
        </div>
</div>