<nav class="navbar navbar-expand-lg" style="background-color: #d090d2;" >
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
        <img src="../sources/images/example-logo.png" width="30" height="24">
        Journee</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>

        <style>
        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
        }
        </style>

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
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown link
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </li>
            </ul>

            <?php
            
            include 'db.php';

            //session_start();
            if(isset($_SESSION["id"])){

            $id = $_SESSION["id"];

            echo "<div class='d-flex gap-2'>";
            echo "<a href='./diary/view.php'>";
            echo "<img src='../sources/images/user.png' width='35' height='35' class='rounded-circle'>";
            echo "</a>";
            echo "<a href='./diary/view' class='btn btn-warning'>Ciao, " . $_SESSION["nome"] . "</a>";
            echo "</div>";

            }else{

            echo "<div class='d-flex gap-2'>";
            echo "<a href='../auth/login/' class='btn btn-warning'>Accedi all'area riservata</a>";
            echo "</div>";

            }

            ?>            
        </div>
    </div>
</nav>