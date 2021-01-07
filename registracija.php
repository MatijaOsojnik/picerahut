<?php 
include_once 'glava.php';

?>


<div class="container p-0">

    <div class="container bg-white rounded-bottom shadow-box m-0 mb-3">
        <div class="row pt-3 pb-2 px-3">
            <div class="col-12 px-0">
                <h3 class="blue"><strong>Registracija</strong></h3>
            </div>
        </div>
    </div>

    <?php
        if(isset($_SESSION['err'])){
            $err = $_SESSION['err'];

            if($err == 3){
                echo    "<div class='alert alert-danger' role='alert'>Prosimo, da izpolnite vsa polja.</div>";
                $err = NULL;
                unset($_SESSION['err']);
            }
            elseif($err == 4){
                echo "<div class='alert alert-danger' role='alert'>Uporabnik s tem emailom že obstaja!</div>";
                $err = NULL;
                unset($_SESSION['err']);
            }
        }
    ?>

<div>
	<form action="registracijaAkcija.php" method="post">
		<div class="form-group mb-3">
		    <label for="ime">Ime</label>
		    <input type="text" class="form-control" id="ime" name="ime" required placeholder="Vpišite vaše ime">
  		</div>
		<div class="form-group mb-3">
		    <label for="priimek">Priimek</label>
		    <input type="text" class="form-control" id="priimek" name="priimek" required placeholder="Vpišite vaš priimek">
  		</div>  				
		<div class="form-group mb-3">
		    <label for="email">Email</label>
		    <input type="email" class="form-control" id="email" name="email" required placeholder="Vpišite e-mail">
  		</div>
 		<div class="form-group mb-3">
		    <label for="tel">Telefon</label>
		    <input type="text" class="form-control" id="tel" name="tel" required placeholder="Vpišite vašo telefonsko številko">
  		</div> 		
		<div class="form-group mb-3">
		  <label for="password">Geslo</label>
 		  <input type="password" class="form-control" name="password" id="password" required placeholder="Vpišite geslo">
		</div>

		<div class="mb-3">
			 	<span class="d-block pa-3">Že imate račun? <a href="login.php" class="pa-3">Prijavite se!</a></span>
		</div>

  <button type="submit" class="btn btn-primary">Registracija</button>

	</form>
</div>

<?php include 'footer.php' ?>