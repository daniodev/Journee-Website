<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journee</title>

    <link rel="stylesheet" href="sources/css/css.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <?php include 'sources/include/bootStrap.html'; ?>

    <style>

body {
    margin: 0;
    /* background-color: #ffbf4a; */
    background-image: url('sources/images/background.png');
    font-family: 'IBM Plex Sans', sans-serif;
    background-size: cover;
    min-height: 100vh;
    overflow-x: hidden;
}

.journee {
    margin-top: clamp(50px, 5vw, 70px);
    font-size: clamp(10px, 5vw, 40px);
    color: #000;  
    font-weight: bold;
    padding-left: 5%;
}

.phrases {
    margin-top: 4%;
    font-size: clamp(15px, 6vw, 70px);
    text-align: center;
    color: #000;
    font-weight: 600;
}

.btn-journee {
    background-color: #fe7d82;
    border-color: #fe7d82;
    color: #000;

    font-size: clamp(5px, 5vw, 30px);
    padding: 10px 20px;

    border-radius: 40px;
    font-weight: bold;
    display: block;
    margin: 0 auto;
}

.btn-journee:hover {
    background-color: #e86f74;
    border-color: #e86f74;
    color: #000;
}

.mission{
    text-align: center;
    font-family: 'IBM Plex Sans', sans-serif;
    margin-top: 20vh;
    font-weight: bold;
    font-size: clamp(10px, 6vw, 50px);
}

.mission-text {
    text-align: center;
    font-family: 'IBM Plex Sans', sans-serif;
    font-size: clamp(5px, 5vw, 20px);
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-left: 20vw;
    margin-right: 20vw;
}

.features {
    margin-top: 80px;
    display: flex;
    justify-content: center;
    gap: 40px;
    padding: 0 40px 100px;
    flex-wrap: wrap;
}

.feature-card {
    background: #fecc68;
    width: 300px;
    padding: 40px 30px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.feature-card .icon {
    font-size: 60px;
    margin-bottom: 20px;
}

.feature-card p {
    font-size: 16px;
}

.feature-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-15px) scale(1.03);
    box-shadow: 0 20px 40px rgba(0,0,0,0.25);
}
    </style>

</head>
    <body>
        <h1 class="journee">Journee</h1>

        <h1 class="phrases">
            Been feeling off?<br>
            You know what it takes..<br>
            Start Journaling
        </h1>

        <form action="auth/register/">
        <button class="btn btn-journee">
        Get started
        </button>
        </form>

        <h1 class="mission">
            Our Mission
        </h1>

        <p class="mission-text">
        Sed eget augue ac nibh condimentum viverra ut ut lectus.
        Nullam a vulputate nibh. Fusce et turpis posuere, venenatis erat
        vel, consectetur tellus. Donec eu ex nec metus dignissim
        convallis. Praesent efficitur, odio ac iaculis pellentesque, tellus
        nibh pharetra est, vel accumsan lorem magna luctus nulla.
        Proin suscipit lectus ac aliquet sollicitudin. Donec convallis,
        eros sed placerat consequat, ex ligula dapibus ex, quis dictum
        leo turpis eget augue
        </p>

            <div class="features">
        <div class="feature-card">
            <div class="icon">
                <img src="sources/images/brain.png" alt="Brain icon">
            </div>
            <p>
                Nullam semper, mauris non pellentesque mollis,
                mi est blandit metus, nec viverra orci mauris vitae massa.
            </p>
        </div>

        <div class="feature-card">
            <div class="icon">
                <img src="sources/images/crown.png" alt="Crown icon">
            </div>
            <p>
                Nullam semper, mauris non pellentesque mollis,
                mi est blandit metus, nec viverra orci mauris vitae massa.
            </p>
        </div>

        <div class="feature-card">
            <div class="icon">
                <img src="sources/images/smile.png" alt="Smile icon">
            </div>
            <p>
                Nullam semper, mauris non pellentesque mollis,
                mi est blandit metus, nec viverra orci mauris vitae massa.
            </p>
        </div>
    </div>
</body>