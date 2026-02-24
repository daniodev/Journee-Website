<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <title>Scrivi il tuo diario - Journee</title>

  <?php
    // Inclusione Bootstrap e connessione DB
    include '../../sources/include/bootStrap.html';
    include '../../sources/include/db.php';

    // Avvio sessione
    session_start();

    // Controllo autenticazione
    if(!isset($_SESSION["id"])){
      header("Location: ../../auth/login/");
      exit;
    }

    // Recupero delle tipologie di scale dal database
    $queryScale = "SELECT * FROM tipologiascale";
    $resultScale = mysqli_query($conn, $queryScale);
  ?>

   <style>
    /* Sfondo e font principale */
    body {
      margin: 0;
      padding-top: 50px;
      background-image: url('../../sources/images/backgrounds/write.png');
      font-family: 'IBM Plex Sans', sans-serif;
      background-size: cover;
      background-attachment: fixed;
      overflow-x: hidden;
    }

    /* Bottone personalizzato */
    .btn-custom {
      background-color: #fe7d82;
      border-radius: 40px;
      padding: 10px 50px;
      font-weight: bold;
      color: white;
    }

    /* Textarea con effetto vetro */
    .text-area-custom {
      background-color: #FFFFFFD9 !important;
      backdrop-filter: blur(5px);
      border-radius: 20px;
      resize: none;
    }

    /* Campo titolo */
    .title-field {
      height: 10vh;
      font-size: clamp(25px, 5vw, 45px);
      font-weight: bold;
      text-align: center;
    }

    /* Campo contenuto */
    .content-field {
      height: 60vh;
      font-size: 18px;
    }

    /* Contenitore delle scale */
    .scale-container {
      background-color: #FFFFFFD9;
      border-radius: 20px;
      padding: 30px;
      height: 72vh;
      overflow-y: auto;
    }

    /* Barra inferiore con data e navigazione */
    .bottom-bar {
      display: grid;
      grid-template-columns: 1fr auto 1fr;
      align-items: center;
      padding-bottom: 50px;
    }

    /* Nasconde uno step */
    .hidden-step { display: none !important; }
  </style>
</head>

<body>
  <?php include '../../sources/include/navBar.php'; ?>
  <!-- Form invio dati -->
  <form action="sendData.php" method="post" id="diaryForm">
    <div class="container-fluid mt-5">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
 <!-- STEP 1: Inserimento titolo e contenuto -->
          <div id="step-1">
            <textarea class="form-control text-area-custom title-field" name="title" 
                      placeholder="Title here. A poetic one" required></textarea>
            
            <textarea class="form-control text-area-custom content-field" name="comments" 
                      placeholder="No hints. It's your day after all!" required></textarea>
          </div>
 <!-- STEP 2: Selezione scale di valutazione -->
          <div id="step-2" class="hidden-step">
            <div class="scale-container shadow-sm">
                <h2 class="text-center mb-4">Inserisci i valori da te desider</h2>
                <p class="text-muted text-center">Valuta da 1 a 5 (massimo 3 scale)</p>
                
                <div class="list-group">
                     <!-- Ciclo dinamico sulle scale dal database -->
                    <?php while($row = mysqli_fetch_array($resultScale)): ?>

                    <div class="list-group-item d-flex flex-column p-3 mb-2 border-0 rounded shadow-sm">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                           <!-- Checkbox selezione scala -->
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
                        <!-- Slider valutazione (1-5) -->
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

                    <!-- Barra inferiore con data, navigazione step e submit -->
          <div class="bottom-bar">

            <!-- Data corrente -->
            <div class="date-pill"><?= date('d/m/Y')?></div>

            <!-- Navigazione tra step -->
            <div class="pager shadow-sm">
              <button type="button" onclick="toggleStep(1)">‹</button>
              <span id="page-indicator">1/2</span>
              <button type="button" onclick="toggleStep(2)">›</button>
            </div>

            <!-- Invio form -->
            <div class="text-end">
                <button type="submit" class="btn btn-custom">
                  Next!
                </button>
            </div>

          </div>

        </div>
      </div>
    </div>
  </form>

  <script>
    // Riferimenti agli step
    const step1 = document.getElementById('step-1');
    const step2 = document.getElementById('step-2');
    const indicator = document.getElementById('page-indicator');

    // Funzione per cambiare pagina (Step 1 ↔ Step 2)
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

    // Limite massimo 3 checkbox selezionabili
    const checkboxes = document.querySelectorAll(".limit-check");
    
    checkboxes.forEach(cb => {
      cb.addEventListener("change", function () {

        const checkedCount =
            document.querySelectorAll(".limit-check:checked").length;

        const rangeInput =
            this.closest('.list-group-item')
                .querySelector('.scale-range');

        // Se supera 3, annulla selezione
        if (checkedCount > 3) {
          this.checked = false;
          rangeInput.disabled = true;
          alert("Puoi selezionare massimo 3 scale.");
        } else {
          // Attiva/disattiva slider
          rangeInput.disabled = !this.checked;
        }
      });
    });

    // Validazione prima dell'invio
    document.getElementById('diaryForm').onsubmit = function() {

        const checkedCount =
            document.querySelectorAll(".limit-check:checked").length;

        if (checkedCount === 0) {
            alert("Seleziona almeno una scala.");
            toggleStep(2);
            return false; // blocca invio
        }
    };
</script>
</body>
</html>