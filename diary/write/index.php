<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <title>Scrivi il tuo diario - Journee</title>

  <?php
    include '../../sources/include/bootStrap.html';
    include '../../sources/include/db.php';
    session_start();

    if(!isset($_SESSION["id"])){
      header("Location: ../../auth/login/");
      exit;
    }

    // Recuperiamo le tipologie di scale dal database
    $queryScale = "SELECT * FROM tipologiascale";
    $resultScale = mysqli_query($conn, $queryScale);
  ?>

  <style>
    body {
      margin: 0;
      padding-top: 50px;
      background-image: url('../../sources/images/backgrounds/write.png');
      font-family: 'IBM Plex Sans', sans-serif;
      background-size: cover;
      background-attachment: fixed;
      overflow-x: hidden;
    }

    .btn-custom {
      background-color: #fe7d82;
      border-color: #fe7d82;
      border-radius: 40px;
      padding: 10px 50px;
      font-weight: bold;
      color: white;
    }
    .btn-custom:hover {
      background-color: #e86f74;
      color: white;
    }

    .text-area-custom {
      background-color: #FFFFFFD9 !important;
      backdrop-filter: blur(5px);
      border: white solid 2px;
      border-radius: 20px;
      resize: none;
    }

    .title-field {
      height: 10vh;
      font-size: clamp(25px, 5vw, 45px);
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;
    }

    .content-field {
      height: 60vh;
      font-size: 18px;
    }

    /* Container delle Scale */
    .scale-container {
      background-color: #FFFFFFD9;
      border-radius: 20px;
      padding: 30px;
      height: 72vh; /* Allineato all'altezza dei testi */
      overflow-y: auto;
    }

    .bottom-bar {
      margin-top: 20px;
      display: grid;
      grid-template-columns: 1fr auto 1fr;
      align-items: center;
      padding-bottom: 50px;
    }

    .date-pill, .pager {
      background: #ffffffd9;
      border: 2px solid #fff;
      border-radius: 999px;
      padding: 8px 16px;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
    }

    .pager-btn {
      border: none;
      background: #fff;
      border-radius: 50%;
      width: 30px;
      height: 30px;
      cursor: pointer;
      font-weight: bold;
    }

    .hidden-step { display: none !important; }
  </style>
</head>

<body>
  <?php include '../../sources/include/navBar.php'; ?>

  <form action="sendData.php" method="post" id="diaryForm">
    <div class="container-fluid mt-5">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

          <div id="step-1">
            <textarea class="form-control text-area-custom title-field" name="title" 
                      placeholder="Title here. A poetic one" required></textarea>
            
            <textarea class="form-control text-area-custom content-field" name="comments" 
                      placeholder="No hints. It's your day after all!" required></textarea>
          </div>

          <div id="step-2" class="hidden-step">
            <div class="scale-container shadow-sm">
                <h2 class="text-center mb-4">Inserisci i valori da te desider</h2>
                <p class="text-muted text-center">Valuta da 1 a 5 (massimo 3 scale)</p>
                
                <div class="list-group">
                    <?php while($row = mysqli_fetch_array($resultScale)): ?>
                    <div class="list-group-item d-flex flex-column p-3 mb-2 border-0 rounded shadow-sm">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="form-check">
                                <input class="form-check-input limit-check" type="checkbox" 
                                       name="tipologie[]" value="<?= $row['idTipoScala'] ?>" 
                                       id="c<?= $row['idTipoScala'] ?>">
                                <label class="form-check-label fw-bold" for="c<?= $row['idTipoScala'] ?>">
                                    <?= $row["descrizione"] ?>
                                </label>
                            </div>
                            <small class="text-muted"><?= $row["nome"] ?></small>
                        </div>
                        
                        <div class="px-3">
                            <input type="range" class="form-range scale-range" 
                                   name="valutazione[<?= $row['idTipoScala'] ?>]" 
                                   min="1" max="5" value="3" disabled>
                            <div class="d-flex justify-content-between small text-muted">
                                <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
          </div>

          <div class="bottom-bar">
            <div class="date-pill"><?= date('d/m/Y')?></div>

            <div class="pager shadow-sm">
              <button type="button" class="pager-btn" onclick="toggleStep(1)">‹</button>
              <span class="pager-text mx-2" id="page-indicator">1/2</span>
              <button type="button" class="pager-btn" onclick="toggleStep(2)">›</button>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-custom shadow-sm">Next!</button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </form>

  <script>
    const step1 = document.getElementById('step-1');
    const step2 = document.getElementById('step-2');
    const indicator = document.getElementById('page-indicator');

    function toggleStep(step) {
        if (step === 1) {
            step1.classList.remove('hidden-step');
            step2.classList.add('hidden-step');
            indicator.innerText = "1/2";
        } else {
            step1.classList.add('hidden-step');
            step2.classList.remove('hidden-step');
            indicator.innerText = "2/2";
        }
    }

    // Logica limite 3 checkbox e attivazione range
    const checkboxes = document.querySelectorAll(".limit-check");
    
    checkboxes.forEach(cb => {
      cb.addEventListener("change", function () {
        const checkedCount = document.querySelectorAll(".limit-check:checked").length;
        const rangeInput = this.closest('.list-group-item').querySelector('.scale-range');

        if (checkedCount > 3) {
          this.checked = false;
          rangeInput.disabled = true;
          alert("Puoi selezionare un massimo di 3 scale per oggi.");
        } else {
            // Abilita o disabilita lo slider in base alla selezione
            rangeInput.disabled = !this.checked;
        }
      });
    });

    // Validazione prima dell'invio
    document.getElementById('diaryForm').onsubmit = function(e) {
        const checkedCount = document.querySelectorAll(".limit-check:checked").length;
        if (checkedCount === 0) {
            alert("Per favore, seleziona almeno una scala di valutazione nello step 2!");
            toggleStep(2);
            return false;
        }
    };
  </script>
</body>
</html>