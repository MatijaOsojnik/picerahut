<?php 
    include 'glava.php';
    include 'baza.php';
?>

<?php
    if (!isset($_SESSION['id']) && !isset($_SESSION['ime']) && !isset($_SESSION['priimek'])) {
    echo "<script> location.href='login.php'; </script>";
} else {
?>

 <div class="container p-0">
        <div class="container bg-white rounded-bottom shadow-box m-0 mb-3">
            <div class="row pt-3 pb-2 px-3">
                <div class="col-12 px-0">
                    <h3 class="blue"><strong>Vaša naročila:</strong></h3>
                </div>
            </div>
        </div>

    <?php

    $uporabnik_id = $_SESSION['id'];

    $query = "SELECT n.*, d.ime AS dodatek, p.ime AS vrsta_pice, p.cena AS cena, v.ime AS velikost_pice, v.cena AS cena_velikosti FROM dodatki d INNER JOIN narocila n ON n.dodatek_id=d.id INNER JOIN velikosti v ON n.velikost_id=v.id INNER JOIN pice p ON n.pica_id=p.id WHERE n.uporabnik_id=?";

$stmt = $pdo->prepare($query);
$stmt->execute([$uporabnik_id]);

if($stmt->rowCount() == 0){
    echo '<div>
    Izvedli niste še nobenega naročila! Ko boste naročili prvo pico se vam bo prikazala tukaj!
  </div>';
}
else{

?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Številka narocila</th>
      <th scope="col">Vrsta</th>
      <th scope="col">Velikost</th>
      <th scope="col">Količina</th>
      <th scope="col">Dodatki</th>
      <th scope="col">Količina dodatkov</th>
      <th scope="col">Cena</th>
      <th scope="col">Prevzem</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($row = $stmt->fetch()) {
        ?>
    <?php
    $narocilo_id = $row['id'];
     echo "<tr><th scope='row'>".$row['id']."</th>
                <td>".$row['vrsta_pice']."</td>
                <td>".$row['velikost_pice']."</td>
                <td>".$row['kolicina']."</td>
                <td>".$row['dodatek']."</td>
                <td>".$row['kolicina_dodatkov']."</td>
                <td>".round($row['cena']*$row['kolicina']*$row['cena_velikosti'], 2)."€</td>
                <td>".$row['datum_prevzema']."</td>
    <td><a href='urediNarocilo.php?id=$narocilo_id' style='color: black'><i class='fas fa-pen'></i></a></td>
    <td>  <a href='izbrisiNarocilo.php?id=$narocilo_id' onclick=\"return confirm('Ali ste prepričani?');\" style='color: red'><i class='fas fa-times-circle'></i></a></td>
                </tr>"
    ?>  
        <?php
    }
    echo "  </tbody>
</table>";
}

?>
<a href="naroci.php" class="btn btn-large btn-primary my-4">Novo naročilo</a>
</div>
<?php 
}
    include 'footer.php';
?>