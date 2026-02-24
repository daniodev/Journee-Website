<?php
session_start();

if(!isset($_GET["id"]) || !isset($_SESSION["id"])){
    header("Location: ../../");
    exit;
}

include '../../sources/include/db.php';
include '../../sources/include/bootStrap.html';

$query = "SELECT titolo, giornoScrittura, pensieroGiornaliero FROM Pagine WHERE idUtente = ". $_SESSION["id"] . " AND idPagina = " . $_GET["id"];

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 0){
    header("Location: ../../");
    exit;
}

$page = mysqli_fetch_array($result);

include '../../sources/include/navbar.php';
?>

<style>
    body{
        margin: 0;
        background-image: url('../../sources/images/backgrounds/view.png');
        font-family: 'IBM Plex Sans', sans-serif;
        background-size: cover;
        background-position: center;
        min-height: 100vh;
        overflow-x: hidden;
        margin-top: 150px;
    }
    .title{
        text-align: center;
        font-size: clamp(25px, 5vw, 45px);
        background-color: #FFFFFFD9 !important;
        margin: 0 20vw;
        border-radius: 30px;
        padding-top: 20px;
        padding-bottom: 20px;
        font-weight: bold;
    }
    .content{
        background-color: #FFFFFFD9 !important;
        margin: 20px 20vw 0 20vw;
        border-radius: 30px;
        padding: 30px;
        font-size: clamp(15px, 4vw, 22px);
    }
    .bottom-bar {
        margin-top: 18px;
        display: grid;
        grid-template-columns: 1fr auto 1fr;
        align-items: center;
        margin-bottom: clamp(200px, 5vh, 400px);
        margin-left: 20vw;
        margin-right: 20vw;
    }

    .bottom-bar .btn-custom {
        justify-self: end;
    }

    .left-group {
        justify-self: start;
        display: inline-flex;
        align-items: center;
        gap: 10px; /* ← spazio tra data e cestino */
    }

    .date-pill {
        background: #ffffffd9;
        border: 2px solid #fff;
        border-radius: 999px;
        padding: 10px 14px;
        width: fit-content;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .pager {
        justify-self: center;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #ffffffd9;
        border: 2px solid #fff;
        border-radius: 999px;
        padding: 6px 10px;
        user-select: none;
    }

    .pager-btn {
        width: 26px;
        height: 26px;
        border: none;
        border-radius: 999px;
        background: #fff;
        line-height: 26px;
        font-weight: 700;
        cursor: pointer;
    }

    .pager-text {
        font-weight: 700;
        font-size: 14px;
        opacity: .85;
    }

    .btn-custom {
        background-color: #fe7d82;
        border-color: #fe7d82;
        border-radius: 40px;
        padding-left: 50px;
        padding-right: 50px;
        font-weight: bold;
    }

    .btn-custom:hover {
        background-color: #e86f74;
        border-color: #e86f74;
    }

    .recicleBin {
        background: #ffffffd9;
        border-radius: 5px;
        padding: 10px;
        display: inline-flex;
        align-items: center;
        cursor: pointer;
    }

    .recicleBin:hover {
        background: #ffe0e1;
    }
</style>

<body>
    <h1 class="title"><?php echo "''" . $page["titolo"] . "''"; ?></h1>
    <p class="content">
        <?php echo $page["pensieroGiornaliero"]; ?>
    </p>

    <div class="bottom-bar">

        <div class="left-group">
            <div class="date-pill" aria-label="Date">
                <?= date('d/m/Y H:i', strtotime($page["giornoScrittura"])) ?>
            </div>
            <div class="recicleBin">
                <a href="../../diary/delete/?id=<?= $_GET["id"] ?>"
                   onclick="return confirm('Sei sicuro di voler eliminare questa pagina? L\'operazione è irreversibile.')">
                    <img src="../../sources/images/recicleBin.png" alt="Delete" width="24" height="24">
                </a>
            </div>
        </div>


        <div class="pager" aria-label="Pagination">
            <button type="button" class="pager-btn" aria-label="Previous">‹</button>
            <span class="pager-text">1/2</span>
            <button type="button" class="pager-btn" aria-label="Next">›</button>
        </div>

        <button type="submit" class="btn btn-custom btn-lg">Next!</button>

    </div>
</body>