<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journee</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <?php include 'sources/include/bootStrap.html'; ?>
    <?php include 'sources/include/navbar.php'; ?>

    <style>

body {
    margin: 0;
    background-image: url('sources/images/backgrounds/landing.png');
    font-family: 'IBM Plex Sans', sans-serif;
    background-size: cover;
    min-height: 100vh;
    overflow-x: hidden;
}
.phrases {
    margin-top: 4%;
    font-size: clamp(15px, 6vw, 70px);
    text-align: center;
    color: #000;
    font-weight: 600;
    padding-top: 10%;
}

.btn-journee {
    background-color: #ff758b;
    border-color: #ff758b;
    color: white;

    font-size: clamp(5px, 5vw, 30px);
    padding: 10px 20px;
    
    border-radius: 40px;
    font-weight: bold;
    display: block;
    margin: 0 auto;
    margin-top: 3%;
}

.btn-journee:hover {
    background-color: #ff506c;
    border-color: #ff506c;
    color: white;
}

.mission{
    text-align: center;
    font-family: 'IBM Plex Sans', sans-serif;
    font-weight: bold;
    font-size: clamp(10px, 6vw, 50px);
}

.mission-text {
    text-align: center;
    font-family: 'IBM Plex Sans', sans-serif;
    font-size: clamp(5px, 5vw, 20px);
    display: block;
    flex-direction: column;
    gap: 10px;
}

.mission-div {
    background-color: #FFECC6;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    margin: 0 clamp(30vw, 10vw, 20vw) !important;
    margin-top: 20vh !important;
    padding: clamp(20px, 4vw, 40px) 30px 20px;
}
.features {
    margin-top: 100px;
    display: flex;
    justify-content: center;
    gap: 40px;
    padding: 0 40px 100px;
    flex-wrap: wrap;
}

.feature-card {
    background: rgba(255, 255, 255, 0.4) !important;
    width: 300px;
    padding: 80px 30px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    margin-top: 5%;
}

.feature-card .icon {
    font-size: 60px;
    margin-bottom: 20px;
}

.feature-card p {
    font-size: 16px;
}
.txt{
    font-style: italic !important;
}
.images{
    width: 150px;
    height: 150px;
}
    </style>

</head>
    <body>

        <h1 class="phrases">
            Giornata turbolenta? <br>
            Lasciati andare.. <br>
            Siamo con te, tutti i Journee!
        </h1>

        <form action="auth/register/">
        <button class="btn btn-journee">
        Inizia ora!
        </button>
        </form>

        <div class="mission-div p-50">
        <h1 class="mission">
            La nostra missione
        </h1>

        <p class="mission-text">
        È da un po’ che pensi di concederti dello spazio, vero?
        <br>Ricostruire giornate, processare avvenimenti, trovare risposte..
        <br>Se sei qui è probabile che la tua vita sia più impegnativa di 
        <br>quella dei tuoi coetanei, o solamente più difficile da elaborare..
        
        <br><br>La soluzione che abbiamo riservato per te richiede costanza.
        <br>Si tratta della scrittura di un diario. 
        <br>È la forma di introspezione più semplice e studi provano sia 
        <br>anche la più efficace!
        </p>
        </div>

            <div class="features">
        <div class="feature-card">
            <div class="icon">
                <img src="sources/images/cervello.png" class="images" alt="Brain icon">
            </div>
            <p class="txt">
                Connetterai pensieri e sentimenti, raggiungerai una consapevolezza fondata sulla conoscenza della tua persona!
            </p>
        </div>

        <div class="feature-card">
            <div class="icon">
                <img src="sources/images/corona.png" class="images" alt="Crown icon">
            </div>
            <p class="txt">
                Ripercorrendo le giornate, capirai errori fatti in passato e formulerai strategie per raggiungere i tuoi obiettivi!
            </p>
        </div>

        <div class="feature-card">
            <div class="icon">
                <img src="sources/images/faccina.png" class="images" alt="Smile icon">
            </div>

            <p class="txt">
                Potrai vantare un umore più stabile che mai, basato sulle solide fondamenta dalla chiarezza mentale!
            </p>
        </div>
    </div>
</body>