<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>

    <?php include '../../sources/include/bootStrap.html'; ?>
    
</head>

<body class="bg-light">
<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-12 col-md-6 col-lg-4">

            <div class="card shadow">
                <div class="card-body p-4">

                    <h3 class="text-center mb-4">Registrati</h3>

                    <form action="../../auth/register/signin.php" method="POST">

                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Mario" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Cognome</label>
                            <input type="text" name="cognome" class="form-control" placeholder="Rossi" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="mariorossi" required>
                        </div>

                        <?php 
                            $error = "";
                            if(isset($_GET["error"])){
                                $error = $_GET["error"];
                            }
                        ?>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control <?php if($error==1) echo "is-invalid"; ?>" placeholder="email@example.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                            <input id="password" type="password" name="password" class="form-control <?php if($error == 2) echo "is-invalid"; ?>" required>
                            <button class="btn btn-outline-secondary" type="button"id="togglePassword">
                                <img id="eyeIcon" src="../sources/images/eyeOpen.png" width="17" height="17">
                            </button>
                            </div>
                        </div>

                        <?php include '../../sources/include/viewPasswd.html'; ?>

                        <div class="mb-3">
                            <label class="form-label">Conferma Password</label>
                            <input type="password" name="confirmPassword" class="form-control <?php if($error == 2) echo "is-invalid"; ?>" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">
                                Registrati
                            </button>
                            <small class="text-center"><a href="../login/">Hai già un account? Accedi</a></small>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>