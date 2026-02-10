<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="sources/css/css.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <?php include 'sources/include/bootStrap.html'; ?>

    <style>

body {
    margin: 0;
    background-color: #ffbf4a;
    font-family: 'IBM Plex Sans', sans-serif;font-family: 'IBM Plex Sans', sans-serif;
}

.hero {
    position: relative;
    width: 100%;
}

.hero-bg {
    width: 100%;
    height: auto;
    display: block;
}

.hero-content {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.journee {
    margin-top: 5%;
    font-size: 40px;
    color: #000;
    padding-right: 70%;
    font-weight: bold;
}

.phrases {
    margin-top: 4%;
    font-size: 70px;
    text-align: center;
    color: #000;
    font-weight: 600;
}

.btn-journee {
    background-color: #fe7d82;
    border-color: #fe7d82;
    color: #000;

    font-size: 30px;
    padding: 10px 20px;

    border-radius: 40px;
    font-weight: bold;
}

.btn-journee:hover {
    background-color: #e86f74;
    border-color: #e86f74;
    color: #000;
}

.mission{
    text-align: center;
    font-family: 'IBM Plex Sans', sans-serif;
    margin-top: 42%;
    font-weight: bold;
    font-size: 50px;
}

.mission-text {
    text-align: center;
    font-family: 'IBM Plex Sans', sans-serif;
    font-size: 25px;
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
    background: #ffd778;
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
    font-style: italic;
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
<section class="hero">
    <img src="/sources/images/background.png" class="hero-bg">

    <div class="hero-content">
        <h1 class="journee">Journee</h1>

        <h1 class="phrases">
            Been feeling off?<br>
            You know what it takes..<br>
            Start Journaling
        </h1>

        <a href="auth/register/">
        <button class="btn btn-journee">
        Get started
        </button>
        </a>

        <h1 class="mission">
            Our Mission
        </h1>

        <p class="mission-text">
        Sed eget augue ac nibh condimentum viverra ut ut lectus. <br>
        Nullam a vulputate nibh. Fusce et turpis posuere, venenatis erat <br>
        vel, consectetur tellus. Donec eu ex nec metus dignissim <br> 
        convallis. Praesent efficitur, odio ac iaculis pellentesque, tellus <br>
        nibh pharetra est, vel accumsan lorem magna luctus nulla. <br>
        Proin suscipit lectus ac aliquet sollicitudin. Donec convallis, <br>
        eros sed placerat consequat, ex ligula dapibus ex, quis dictum <br>
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


    </div>

</section>
