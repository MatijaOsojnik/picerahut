<?php

include 'glava.php';

if (isset($_SESSION['id']) && isset($_SESSION['ime']) && isset($_SESSION['priimek'])) {
    echo "<script> location.href='narocila.php'; </script>";
} else {
    ?>

<div class="container p-0">
    <div class="container bg-white rounded-bottom shadow-box m-0 mb-3">
        <div class="row pt-3 pb-2 px-3">
            <div class="col-12 px-0">
                <h3 class="blue"><strong>Prijava</strong></h3>
            </div>
        </div>
    </div>

<?php
if (isset($_SESSION['err'])) {

        if ($_SESSION['err'] == 5) {
            echo "<div class='alert alert-danger' role='alert'>
            Uporabnik s takim e-mailom ne obstaja!
        </div>";
            unset($_SESSION['err']);
        } elseif ($_SESSION['err'] == 6) {
            echo "<div class='alert alert-danger' role='alert'>
            Napačno geslo!
        </div>";
            unset($_SESSION['err']);
        }
    }
    ?>

<div>
	<form action="loginAkcija.php" method="post">			
		<div class="form-group mb-3">
		    <label for="email">Email</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Vpišite e-mail">
  		</div>
		<div class="form-group mb-3">
		  <label for="password">Geslo</label>
 		  <input type="password" class="form-control" name="password" id="password" placeholder="Vpišite geslo">
		</div>

		<div class="mb-3">
			 	<span class="d-block pa-3">Še nimate računa? <a href="registracija.php" class="pa-3">Registrirajte se!</a></span>
		</div>

  <button type="submit" class="btn btn-primary">Prijava</button>

	</form>
</div>

<?php } include 'footer.php' ?>