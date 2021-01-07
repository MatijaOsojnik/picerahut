<?php
    include 'glava.php';
    include 'baza.php';
?>

<?php
    if (!isset($_SESSION['id']) && !isset($_SESSION['ime']) && !isset($_SESSION['priimek'])) {
    echo "<script> location.href='login.php'; </script>";
} else {
?>

    <div style="background-image: url('ozadje.jpg'); opacity: 0.9;"> 
    <div class="container p-3">
        <h3 class="text-center mb-3" style="background-color:rgba(255, 255, 162, 0.76);">NAROČILO</h3>
        <form action="narociAkcija.php" method="post">
            <div class="row">
                <!-- <div class="mb-3 col-6">
                    <label for="ime" style="background-color:rgba(255, 255, 162, 0.76);" class="form-label">Ime</label>
                    <input class="form-control" type="text" id="ime">
                </div>
                <div class="mb-3 col-6">
                    <label for="priimek" style="background-color:rgba(255, 255, 162, 0.76);" class="form-label">Priimek</label>
                    <input class="form-control" type="text" id="priimek">
                    
                </div>
                <div class="mb-3 col-6">
                    <label for="email" style="background-color:rgba(255, 255, 162, 0.76);" class="form-label">Email</label>
                    <input class="form-control" type="email" id="email">
                </div>
                <div class="mb-3 col-6">
                    <label for="telefon" style="background-color:rgba(255, 255, 162, 0.76);" class="form-label">Telefon</label>
                    <input class="form-control" type="tel" id="telefon">
                </div> -->

                <div class="mb-3 col-6">
                    <label for="pice" style="background-color:rgba(255, 255, 162, 0.76);" class="form-label">Vrsta pice</label>
    
                    <select name="vrsta_pice" id="pice" class="form-select">
                    <?php
                    
                    include_once 'baza.php';

                    $query = "SELECT * FROM pice ORDER BY id;";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();

                    while ($row = $stmt->fetch()) {
                        echo '<option value="'.$row['id'].'">'.$row['ime'].'</option>';
                    }
                    ?>                        
                    </select>                        
                </br>
                <div class="mb-3 col-6">
                        <label for="st_pic" style="background-color:rgba(255, 255, 162, 0.76);" class="form-label">Količina</label>
                        <input class="form-control" type="number" name="kolicina_pic" value="1" id="st_pic">
                    </div>
                </div>
                <div class="mb-3 col-6">
                    <label for="velikost_pice" style="background-color:rgba(255, 255, 162, 0.76);"  class="form-label">Velikost pice</label>
                  <select name="velikost_pice" id="velikost_pice" class="form-select">
                    <?php
                    
                    include_once 'baza.php';

                    $query = "SELECT * FROM velikosti ORDER BY id;";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();

                    while ($row = $stmt->fetch()) {
                        echo '<option value="'.$row['id'].'">'.$row['ime'].'</option>';
                    }
                    ?>   
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="Dodatki" style="background-color:rgba(255, 255, 162, 0.76);" class="form-label">Dodatki</label>
                    <select name="dodatki" id="dodatki" class="form-select">
                    <?php
                    
                    include_once 'baza.php';

                    $query = "SELECT * FROM dodatki ORDER BY id;";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();

                    while ($row = $stmt->fetch()) {
                        echo '<option value="'.$row['id'].'">'.$row['ime'].'</option>';
                    }
                    ?>  
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="stDodatkov" style="background-color:rgba(255, 255, 162, 0.76);" class="form-label">Količina dodatkov</label>
                    <input class="form-control" name="kolicina_dodatkov" type="number" value="1"id="stDodatkov">
                </div>
                <div class="mb-3 col-6">
                    <label for="date" style="background-color:rgba(255, 255, 162, 0.76);" class="form-label">Izberi čas in datum prevzema</label>
                    <input class="form-control" type="datetime-local" name="cas_prevzema" id="date"  min="2021-01-01T08:00" max="2021-12-12T21:00" placeholder="Izberi datum">
                    <small>Odpiralni čas picerije je od 8:00-21:00.</small>
                </div>
<!--                 <div class="mb-3 col-6">
                <label for="appt" class="form-label" style="background-color:rgba(255, 255, 162, 0.76);">Izberi čas prevzema</label>
                    <input class="form-control" type="time" id="appt" name="appt"
                    min="08:00" max="21:00" required>
                   <small>Odpiralni čas picerije je od 8:00-21:00.</small>
                </div> -->
            </br>
                <div class="mb-3 col-12">
                    <button type="submit" class="btn btn-large" style="background-color: orange; color: white;">Oddaj naročilo</button>
                </div>
            </div>
        </form>
    </div>
<?php 
}
    include 'footer.php';
?>
