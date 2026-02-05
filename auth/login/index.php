<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body {
            background-image: url('../../sources/images/background.png');
            background-size: cover;
            background-position: center;
        }
        .btn-login {
            background-color: #fe7d82 !important;
            border-color: #fe7d82 !important;
        }
        .btn-login:hover {
            background-color: #e86f74 !important;
            border-color: #e86f74 !important;
        }
        .card {
            border: none;
            border-radius: 1rem;
        }

        .card-body {
            background-color: rgba(255, 219, 151, 0.95);
            backdrop-filter: blur(6px);
        }
    </style>

    <?php include '../../sources/include/bootStrap.html'; ?>

<body class="bg-light">

<?php
    $error = 0;
    if (isset($_GET["error"])) {
        $error = (int) $_GET["error"];
    }
?>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-12 col-md-6 col-lg-4">

            <div class="card shadow">
                <div class="card-body p-4">

                    <h3 class="text-center mb-4 fw-bold">Accedi</h3>

                    <?php if ($error == 2): ?>
                        <div class="alert alert-danger py-2 text-center">
                            Email non registrata
                        </div>
                    <?php elseif ($error == 1): ?>
                        <div class="alert alert-danger py-2 text-center">
                            Password errata
                        </div>
                    <?php endif; ?>

                    <form action="/auth/login/access.php" method="POST">

                        <?php 

                        session_start();
                        if(isset($_SESSION["id"])){
                            header("Location: ../../diary/view/");
                            exit;
                        }
                        ?>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control <?php if($error==2) echo "is-invalid"; ?>" placeholder="email@example.com" required>
                        </div>

    
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control <?php if($error==1) echo "is-invalid"; ?>" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-login">Login</button>
                        </div>

                    </form>

                    <div class="text-center mt-3">
                        <small>Non hai un account? <a href="../register/">Registrati</a></small>
                        <div>
                        <small><a href="../forgotPassword/">Password dimenticata?</a></small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>