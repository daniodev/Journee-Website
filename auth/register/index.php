<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <?php include '../../sources/include/bootStrap.html'; ?>

    <style>
        body {
            background-image: url('../../sources/images/backgrounds/write.png');
            background-size: cover;
            background-position: center;
        }

        .btn-register {
            background-color: #fe7d82;
            border-color: #fe7d82;
        }

        .btn-register:hover {
            background-color: #e86f74;
            border-color: #e86f74;
        }

        .card {
            border: none;
            border-radius: 1rem;
        }

        .card-body {
            background-color: rgba(255, 219, 151, 0.95);
            backdrop-filter: blur(6px);
            border-radius: 1rem;
        }
    </style>
</head>

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

                    <h3 class="text-center mb-4 fw-bold">Registrati</h3>

                    <?php if ($error == 1): ?>
                        <div class="alert alert-danger py-2 text-center">
                            Email già registrata
                        </div>
                    <?php elseif ($error == 2): ?>
                        <div class="alert alert-danger py-2 text-center">
                            Le password non coincidono
                        </div>
                    <?php endif; ?>

                    <form action="../../auth/register/signin.php" method="POST">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" name="nome" class="form-control" placeholder="Mario" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Cognome</label>
                                <input type="text" name="cognome" class="form-control" placeholder="Rossi" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email"
                                   class="form-control <?php if ($error == 1) echo 'is-invalid'; ?>"
                                   placeholder="email@example.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <input id="password" type="password" name="password"
                                       class="form-control <?php if ($error == 2) echo 'is-invalid'; ?>" required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <img id="eyeIcon" src="../../sources/images/eyeOpen.png" width="17" height="17">
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Conferma Password</label>
                            <input type="password" name="confirmPassword"
                                   class="form-control <?php if ($error == 2) echo 'is-invalid'; ?>" required>
                            </div>

                        <?php include '../../sources/include/viewPasswd.html'; ?>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-register fw-semibold">
                                Registrati
                            </button>
                            <small class="text-center mt-2">
                                <a href="../../auth/login/">Hai già un account? Accedi</a>
                            </small>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
