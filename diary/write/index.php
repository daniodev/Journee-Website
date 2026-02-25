<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Scrivi il tuo diario - Journee</title>
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <?php
    include '../../sources/include/bootStrap.html';
    include '../../sources/include/db.php';
    session_start();

    if(!isset($_SESSION["id"])){
      header("Location: ../../auth/login/");
      exit;
    }

    // Carica le domande/scale dal database
    $queryScale = "SELECT * FROM tipologiascale";
    $resultScale = mysqli_query($conn, $queryScale);
    ?>

    <style>
    /* Configurazione generale della pagina */
    body {
        margin: 0;
        padding-top: 50px;
        background-image: url('../../sources/images/backgrounds/write.png');
        font-family: 'IBM Plex Sans', sans-serif;
        background-size: cover;
        background-attachment: fixed;
        overflow-x: hidden;
    }

    /* Stile del bottone rosa arrotondato */
    .btn-custom {
        background-color: #ff758b;
        border-radius: 40px;
        padding: 10px 50px;
        font-weight: bold;
        color: white;
    }

    .btn-custom:hover {
        background-color: #ff506c;
        border-radius: 40px;
        padding: 10px 50px;
        font-weight: bold;
        color: white;
    }

    /* Box di testo con effetto sfocato (vetro) */
    .text-area-custom {
        background-color: #FFFFFFD9 !important;
        backdrop-filter: blur(5px);
        border-radius: 20px;
        resize: none;
        margin-top: 30px;
        margin-bottom: 10px;
    }

    .title-field {
        height: 10vh;
        font-size: clamp(25px, 5vw, 45px);
        font-weight: bold;
        text-align: center;
    }

    .content-field {
        height: 60vh;
        font-size: 18px;
    }

    /* Layout della barra di navigazione inferiore */
    .bottom-bar {
        display: grid;
        grid-template-columns: 1fr auto 1fr;
        align-items: center;
        padding-bottom: 50px;
    }

    /* Classe per nascondere gli step non attivi */
    .hidden-step {
        display: none !important;
    }

    /* Stile per la pillola della data */
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

    /* Stile per il selettore di pagina (1/2) */
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

    /* Titolo bianco con ombra per risaltare sullo sfondo */
    .scale-title {
        color: white;
        font-weight: bold;
        font-size: 1.2rem;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        margin-bottom: 8px;
        display: block;
    }

    /* Contenitore principale della scala (il bordo bianco esterno) */
    .custom-progress-container {
        position: relative;
        width: 100%;
        height: 18px;
        background: rgba(255, 255, 255, 0.2); /* Sfondo traccia scura */
        border: 2px solid rgba(255, 255, 255, 0.8); /* Bordo bianco */
        border-radius: 50px;
        overflow: visible; 
        display: flex;
        align-items: center;
    }

    /* La barra rosa che scorre (arrotondata e fluida) */
    .progress-fill-pink {
        position: absolute;
        left: 0;
        height: 100%;
        background-color: #fe7d82;
        border-radius: 50px; 
        z-index: 1;
        width: 0%; /* La larghezza viene gestita dal JS */
        transition: width 0.05s linear;
    }

    /* Livello sopra la barra che contiene i 5 pallini */
    .steps-overlay {
        position: absolute;
        width: 100%;
        padding: 0 4px;
        display: flex;
        justify-content: space-between;
        z-index: 2;
        pointer-events: none; /* Permette di cliccare lo slider sotto i pallini */
    }

    /* Stile dei pallini (bianchi di base) */
    .step-dot {
        width: 14px;
        height: 14px;
        background: white;
        border: 2px solid #ccc;
        border-radius: 50%;
        transition: all 0.2s ease;
    }

    /* Colore dei pallini quando la barra rosa li raggiunge */
    .step-dot.active {
        background: #fceabb; /* Giallino crema */
        border-color: #f39c12; /* Bordo arancione */
        box-shadow: 0 0 5px rgba(243, 156, 18, 0.5);
    }

    /* Lo slider trasparente che cattura il movimento del mouse */
    .invisible-range {
        position: absolute;
        width: 100%;
        opacity: 0;
        z-index: 3;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <?php include '../../sources/include/navBar.php'; ?>

    <form action="sendData.php" method="post" id="diaryForm">
        <div class="container-fluid mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    
                    <textarea class="form-control text-area-custom title-field" name="title" placeholder="Title here. A poetic one" required></textarea>
                    
                    <div id="step-1">
                        <textarea class="form-control text-area-custom content-field" name="comments" placeholder="No hints. It's your day after all!" required></textarea>
                    </div>

                    <div id="step-2" class="hidden-step">
                        <div class="list-group">
                            <?php while($row = mysqli_fetch_array($resultScale)): ?>
                            <div class="list-group-item bg-transparent border-0 p-0 mb-5">
                                <span class="scale-title"><?= $row["descrizione"] ?></span>

                                <div class="custom-progress-container">
                                    <div class="progress-fill-pink"></div>

                                    <div class="steps-overlay">
                                        <div class="step-dot"></div>
                                        <div class="step-dot"></div>
                                        <div class="step-dot"></div>
                                        <div class="step-dot"></div>
                                        <div class="step-dot"></div>
                                    </div>

                                    <input type="range" class="invisible-range"
                                        name="valutazione[<?= $row['idTipoScala'] ?>]" min="1" max="5" step="1"
                                        value="3" oninput="updateDots(this)">
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>

                    <div class="bottom-bar">
                        <div class="date-pill"><?= date('d/m/Y')?></div>

                        <div class="pager shadow-sm">
                            <button type="button" class="pager-btn" onclick="toggleStep(1)">‹</button>
                            <span id="page-indicator" class="pager-text">1/2</span>
                            <button type="button" class="pager-btn" onclick="toggleStep(2)">›</button>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-custom">Next!</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>

    <script>
    // Gestione del cambio pagina tra Step 1 e Step 2
    function toggleStep(step) {
        const step1 = document.getElementById('step-1');
        const step2 = document.getElementById('step-2');
        const indicator = document.getElementById('page-indicator');

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

    // Funzione che aggiorna visivamente la barra rosa e i pallini
    function updateDots(el) {
        const val = parseFloat(el.value);
        const container = el.closest('.list-group-item');
        const fill = container.querySelector('.progress-fill-pink');
        const dots = container.querySelectorAll('.step-dot');

        // Calcola quanto deve essere larga la barra rosa (da 0% a 100%)
        let percentage = ((val - 1) / (5 - 1)) * 100;

        // Mantiene sempre un minimo di barra rosa visibile per estetica
        const minWidth = 2.5; 
        if (percentage < minWidth) {
            percentage = minWidth;
        }

        // Allunga o accorcia fisicamente la barra rosa
        fill.style.width = percentage + "%";

        // Cicla i pallini: se il valore è superato, diventano arancioni (active)
        dots.forEach((dot, index) => {
            if (val >= (index + 1)) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }

    // Al caricamento della pagina, disegna subito le barre basandosi sul valore iniziale (3)
    document.querySelectorAll('.invisible-range').forEach(range => updateDots(range));
    </script>
</body>
</html>