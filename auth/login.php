<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <?php include '../sources/include/bootStrap.html'; ?>

<body class="bg-light">

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-12 col-md-6 col-lg-4">

            <div class="card shadow">
                <div class="card-body p-4">

                    <h3 class="text-center mb-4">Accedi</h3>

                    <form action="access.php" method="POST">

                        <?php 

                        session_start();

                        $error = "";
                        if(isset($_GET["error"])){
                            $error = $_GET["error"];
                        }
                        if(isset($_SESSION["id"])){
                            header("Location: ../diary/view.php");
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
                            <button type="submit" class="btn btn-success">Login</button>
                        </div>

                    </form>

                    <div class="text-center mt-3">
                        <small>Non hai un account? <a href="register.php">Registrati</a></small>
                        <div>
                        <small><a href="forgotPasswd.php">Password dimenticata?</a></small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>