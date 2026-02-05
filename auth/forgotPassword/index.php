<?php
// Include Bootstrap per lo stile
include '../../sources/include/bootStrap.html';
?>
<!-- Contenitore centrato verticalmente e orizzontalmente -->
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
       <!-- Form per inviare l'email -->
    <form action="forgotPasswdProcess.php" method="POST" class="w-100">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                                <!-- Card Bootstrap -->
                <div class="card shadow">
                    <div class="card-body text-center">
                                               <!-- Campo email -->
                        <div class="mb-3">
                            <label class="form-label">INSERISCI LA TUA EMAIL</label>
                            <br>
                            <small class="text-muted d-block mb-1">
                                Nota, se l'email non è registrata, non riceverai alcuna email.
                            </small>
                            <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
                        </div>
                                       <!-- Bottone di invio -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Invia</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
