<?php
include '../../sources/include/bootStrap.html';
?>

<style>
        body {
            background-image: url('../../sources/images/background.png');
            background-size: cover;
            background-position: center;
        }
        .btn-send {
            background-color: #fe7d82 !important;
            border-color: #fe7d82 !important;
        }
        .btn-send:hover {
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

<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <form action="forgotPasswdProcess.php" method="POST" class="w-100">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <label class="form-label text-center fw-bold">Password dimenticata?</label>
                            <br>
                            <small class="text-muted d-block mb-1">Inserisci la tua mail. Nota, se l'email non è registrata, non riceverai alcuna email.</small>
                            <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-send">Invia</button>
                        </div>
                        <small>
                            <a href="../login/">Ricordi la password? Accedi</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
