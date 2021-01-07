<?php
    include 'glava.php';
    include 'baza.php';
?>

<?php
    if (!isset($_GET['id']) && !isset($_SESSION['id'])) { //ali je bil v urlju poslan id in ali je uporabnik prijavljen
    echo "<script> location.href='login.php'; </script>";
} else {
    $narocilo_id = $_GET['id'];
    // $query = "SELECT n.* FROM dodatki d INNER JOIN narocila n ON n.dodatek_id=d.id INNER JOIN velikosti v ON n.velikost_id=v.id INNER JOIN pice p ON n.pica_id=p.id WHERE n.id=?";

    $query = "SELECT * FROM narocila WHERE id=?";

        $stmt = $pdo->prepare($query);
$stmt->execute([$narocilo_id]);
$narocilo = $stmt->fetch();

$pretvorjenDatum = strtotime($narocilo['datum_prevzema']);
$datum = date('Y-m-d\TH:i', $pretvorjenDatum);
?>

    <div style="background-image: url('ozadje.jpg'); opacity: 0.9;"> 
    <div class="container p-3">
        <h3 class="text-center mb-3" style="background-color:rgba(255, 255, 162, 0.76);">NAROČILO</h3>
        <form action="urediNarociloAkcija.php" method="post">
            <input type="hidden" name="id" value="<?php echo $narocilo['id'] ?>">
            <div class="row">

                <div class="mb-3 col-6">
                    <label for="pice" style="background-color:rgba(255, 255, 162, 0.76);" class="form-label">Vrsta pice</label>
    
                    <select name="vrsta_pice" id="pice" class="form-select" >
                    <?php
                

                    $query = "SELECT * FROM pice ORDER BY id;";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();

                    while ($row = $stmt->fetch()) {
                        if($row['id'] == $narocilo['pica_id']) {
                        echo '<option value="'.$row['id'].'" selected>'.$row['ime'].'</option>';
                        } else {
                        echo '<option value="'.$row['id'].'">'.$row['ime'].'</option>';                            
                        }
                    }
                    ?>                        
                    </select>                        
                </br>
                <div class="mb-3 col-6">
                        <label for="st_pic" style="background-color:rgba(255, 255, 162, 0.76);" class="form-label">Količina</label>
                        <input class="form-control" type="number" name="kolicina_pic" value="<?php echo $narocilo['kolicina'] ?>" id="st_pic">
                    </div>
                </div>
                <div class="mb-3 col-6">
                    <label for="velikost_pice" style="background-color:rgba(255, 255, 162, 0.76);"  class="form-label">Velikost pice</label>
                  <select name="velikost_pice" id="velikost_pice" class="form-select">
                    <?php
                

                    $query = "SELECT * FROM velikosti ORDER BY id;";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();

                    while ($row = $stmt->fetch()) {
                        if($row['id'] == $narocilo['velikost_id']) {
                        echo '<option value="'.$row['id'].'" selected>'.$row['ime'].'</option>';
                        } else {
                        echo '<option value="'.$row['id'].'">'.$row['ime'].'</option>';                            
                        }
                    }
                    ?>   
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="Dodatki" style="background-color:rgba(255, 255, 162, 0.76);" class="form-label">Dodatki</label>
                    <select name="dodatki" value="<?php echo $narocilo['dodatek_id'] ?>" id="dodatki" class="form-select">
                    <?php
                    
                    $query = "SELECT * FROM dodatki ORDER BY id;";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();

                    while ($row = $stmt->fetch()) {
                        if($row['id'] == $narocilo['dodatek_id']) {
                        echo '<option value="'.$row['id'].'" selected>'.$row['ime'].'</option>';
                        } else {
                        echo '<option value="'.$row['id'].'">'.$row['ime'].'</option>';                            
                        }
                    }
                    ?>   
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="stDodatkov" style="background-color:rgba(255, 255, 162, 0.76);" class="form-label">Količina dodatkov</label>
                    <input class="form-control" name="kolicina_dodatkov" type="number" value="<?php echo $narocilo['kolicina_dodatkov'] ?>" id="stDodatkov">
                </div>
                <div class="mb-3 col-6">
                    <label for="date" style="background-color:rgba(255, 255, 162, 0.76);" class="form-label">Izberi čas in datum prevzema</label>
                    <input class="form-control" value="<?php echo $datum ?>" type="datetime-local" name="cas_prevzema" id="date"  min="2021-01-01T08:00" max="2021-12-12T21:00" placeholder="Izberi datum">
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
                    <button type="submit" class="btn btn-large" style="background-color: orange; color: white;">Posodobi</button>
                </div>
            </div>
        </form>
    </div>
<?php 
}
    include 'footer.php';
?>
