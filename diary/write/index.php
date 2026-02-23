<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <title>Scrivi il tuo diario</title>

  <?php
    include '../../sources/include/bootStrap.html';
    include '../../sources/include/db.php';
    session_start();

    if(!isset($_SESSION["id"])){
      header("Location: ../../auth/login/");
      exit;
    }

    function getTipologiaById($idTipologia, $conn) {
      $query = "SELECT * FROM TipologiaScale WHERE idTipoScala = " . $idTipologia;
      $result = mysqli_query($conn, $query);
      $answer = mysqli_fetch_array($result);
      return $answer['descrizione'];
    }
  ?>

  <style>
    body {
      margin: 0;
      background-image: url('../../sources/images/backgrounds/write.png');
      font-family: 'IBM Plex Sans', sans-serif;
      background-size: 100% 100%;
      overflow-x: hidden;
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

    .text {
      background-color: #FFFFFFD9 !important;
      backdrop-filter: blur(5px);
      -webkit-backdrop-filter: blur(5px);
      border: white solid 2px;
      border-radius: 20px;
      resize: none;
    }

    .title {
      height: 10vh;
      margin-bottom: 18px;
      font-size: clamp(25px, 5vw, 45px);
      font-weight: bold;
      text-align: center;
    }
    .title::placeholder {
      font-size: clamp(25px, 5vw, 45px);
      font-weight: bold;
      text-align: center;
    }

    .content {
    border: white solid 2px;
    border-radius: 20px;
    height: 65vh;
    font-size: clamp(12px, 5vw, 18px);
    }
    .content::placeholder {
    font-size: clamp(12px, 5vw, 18px);
    }

    .inputs { margin-top: 15vh; }
    .textarea { resize: none !important; }

    /* --- BOTTOM BAR --- */
    .bottom-bar {
      margin-top: 18px;
      display: grid;
      grid-template-columns: 1fr auto 1fr;
      align-items: center;
      margin-bottom: clamp(200px, 5vh, 400px);
    }

    .bottom-bar .btn-custom {
      justify-self: end;
    }

    .date-pill {
      justify-self: start;
      background: #ffffffd9;
      border: 2px solid #fff;
      border-radius: 999px;
      padding: 10px 14px;
      width: fit-content;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
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
  </style>
</head>

<body>
  <?php include '../../sources/include/navBar.php'; ?>

  <form action="sendData.php" method="post">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="inputs col-7">

          <div class="row-1">
            <textarea class="form-control text title" id="title" name="title" rows="1"
                      placeholder="Title here. A poetic one?" required></textarea>
          </div>

          <div class="row-7">
            <textarea class="form-control text content" id="comments" name="comments" rows="7"
                      placeholder="No hints. It's your day after all!" required></textarea>
          </div>

          <div class="bottom-bar">
            <div class="date-pill" aria-label="Date"><?= date('d/m/Y')?></div>

            <div class="pager" aria-label="Pagination">
              <button type="button" class="pager-btn" aria-label="Previous">‹</button>
              <span class="pager-text">1/2</span>
              <button type="button" class="pager-btn" aria-label="Next">›</button>
            </div>

            <button type="submit" class="btn btn-custom btn-lg">Next!</button>
          </div>

        </div>

        <!--
        <div class="col-5">
          <div class="row">
            <?php for($i=1; $i<=3; $i++): ?>
              <?php $question = getTipologiaById($i, $conn); ?>
              <h4><?= $question ?></h4>

              <?php for($j=1; $j<=5; $j++): ?>
                <div class="col-1">
                  <div class="form-check">
                    <input class="form-check-input" type="Radio"
                           name="scale<?= $i ?>" value="<?= $j ?>"
                           <?php if($j==5) echo "required"; ?>>
                    <label class="form-check-label"><?= $j ?></label>
                  </div>
                </div>
              <?php endfor; ?>
            <?php endfor; ?>
          </div>
        </div>
        -->

      </div>
    </div>
  </form>
</body>
</html>