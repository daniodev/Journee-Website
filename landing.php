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
    background-color: #fe7d82;
    border-color: #fe7d82;
    color: white;

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
    color: white;
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
}

.mission-div {
    background-color: #FFECC6;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    margin: 0 20vw;
    padding-left: 50px;
    padding-right: 50px;
    padding-bottom: 50px;
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
    padding: 90px 30px;
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
    </style>

</head>
    <body>

        <h1 class="phrases">
            Been feeling off?<br>
            You know what it takes...<br>
            Start Journaling
        </h1>

        <form action="auth/register/">
        <button class="btn btn-journee">
        Get started
        </button>
        </form>

        <div class="mission-div p-50">
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
        </div>

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