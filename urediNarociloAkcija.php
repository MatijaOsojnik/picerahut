<?php 

include 'baza.php';
session_start();

if(isset($_POST['id']) && isset($_POST['vrsta_pice']) && isset($_POST['kolicina_pic']) && isset($_POST['velikost_pice']) && isset($_POST['dodatki']) && isset($_POST['kolicina_dodatkov']) && isset($_POST['cas_prevzema'])){

		$narocilo_id = $_POST['id'];
        $pica_id = $_POST['vrsta_pice'];
        $kolicina_pic = $_POST['kolicina_pic'];
        $velikost_id = $_POST['velikost_pice'];
        $dodatek_id = $_POST['dodatki'];
        $kolicina_dodatkov = $_POST['kolicina_dodatkov'];
        $cas_prevzema = $_POST['cas_prevzema'];
        $uporabnik_id = $_SESSION['id'];

        $query = "UPDATE narocila SET kolicina=?, kolicina_dodatkov=?, datum_prevzema=?, dodatek_id=?, pica_id=?, velikost_id=? WHERE id=?";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$kolicina_pic, $kolicina_dodatkov, $cas_prevzema, $dodatek_id, $pica_id, $velikost_id, $narocilo_id]);

        // $narocilo_id = $pdo->lastInsertId();
        
        // $query = "UPDATE dodatki_narocila SET dodatek_id=? WHERE narocilo_id=?";

        // $stmt = $pdo->prepare($query);
        // $stmt->execute([$dodatek_id, $narocilo_id]);

        // $query = "UPDATE narocila_pice SET pica_id=? WHERE narocilo_id=?";

        // $stmt = $pdo->prepare($query);
        // $stmt->execute([$pica_id, $narocilo_id]); 
               
        // $query = "UPDATE narocila_velikosti SET velikost_id=? WHERE narocilo_id=?";

        // $stmt = $pdo->prepare($query);
        // $stmt->execute([$velikost_pice_id, $narocilo_id]);

        header("Location: narocila.php");
} 
// else {

// 	$_SESSION['err'] = 3;
// 	header("Location: registracija.php");
// }
// elseif(isset($_POST['name']) && isset($_POST['postCode']) && isset($_POST['street']) && isset($_POST['title']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['passwordConfirm'])){
//     $_SESSION['err'] = 2;
//     header("Location: registerPerson.php");
// }

?>