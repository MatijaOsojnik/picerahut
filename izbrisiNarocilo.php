<?php

session_start();
include 'baza.php';

if(isset($_GET['id']) && isset($_SESSION['id'])) { //Ali je v poslanemu requestu zraven id narocila in ali je uporabnik prijavljen
    
    $narocilo_id = $_GET['id'];

        // $query = "SELECT * FROM narocila WHERE id=?";

        // $stmt = $pdo->prepare($query);

        // $stmt->execute([$narocilo_id]);

        // $row = $stmt->fetch();


    //Ali je id uporabnika v naročilu enak prijavljenemu uporabniku
        $query = "DELETE FROM narocila WHERE id=?";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$narocilo_id]);

        header("Location: narocila.php");

}
else{
    header("Location: narocila.php");
}

?>