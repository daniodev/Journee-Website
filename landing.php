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

    </div>

</section>
