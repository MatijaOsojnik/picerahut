<?php 

include 'baza.php';
session_start();

// function clean($string) {
//     $string = str_replace('>', '', $string);
//     $string = str_replace('<', '', $string);
//     $string = str_replace('=', '', $string);
//     $string = str_replace(';', '', $string);
 
//     return $string;
//  }

if(isset($_POST['ime']) && isset($_POST['priimek']) && isset($_POST['tel']) && isset($_POST['email']) && isset($_POST['password'])){

        $_SESSION['successRegister'] = 1;

        $ime = $_POST['ime'];
        $priimek = $_POST['priimek'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "SELECT * FROM uporabniki WHERE email=?";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);

        if($stmt->rowCount() != 0){
        	//Uporabnik s takšnim mailom že obstaja
            $_SESSION['err'] = 4;
            header("Location: registerPerson.php");
        }

        else{

        $query = "INSERT INTO uporabniki (ime, priimek, tel, email, password) VALUES (?,?,?,?,?)";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$ime, $priimek, $tel, $email, $password]);
        
        $query = "SELECT id, ime, priimek, email FROM uporabniki WHERE email=?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);

        $row = $stmt->fetch();
        $_SESSION['id'] = $row['id'];
        $_SESSION['ime'] = $row['ime'];        
        $_SESSION['priimek'] = $row['priimek'];
        $_SESSION['email'] = $row['email'];

        header("Location: narocila.php");
        }


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