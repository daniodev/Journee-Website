<nav class="navbar navbar-expand-lg" style="background-color: #d090d2;" >
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
        <img src="../sources/images/example-logo.png" width="30" height="24">
        Journee</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Esplora</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contatti</a>
                </li>
            </ul>

            <?php
            
            include '../sources/include/db.php';

            session_start();
            if(isset($_SESSION["id"])){

            $id = $_SESSION["id"];

            echo "<div class='d-flex gap-2'>";
            echo "<a href='./diary/view.php' class='btn btn-warning'>Vai al diario</a>";
            echo "</div>";

            }else{

            echo "<div class='d-flex gap-2'>";
            echo "<a href='../auth/login.php' class='btn btn-warning'>Accedi all'area riservata</a>";
            echo "</div>";

            }

            ?>            
        </div>
    </div>
</nav>