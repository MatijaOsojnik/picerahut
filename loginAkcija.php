<?php 
    session_start();
    include_once 'baza.php';

    if(isset($_POST['email']) && isset($_POST['password'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM uporabniki WHERE email=?";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);

        if($stmt->rowCount() == 1){

            $uporabnik = $stmt->fetch();
            if(password_verify($password, $uporabnik['password'])){
                $_SESSION['id'] = $uporabnik['id'];
                header("Location: narocila.php");
                die();
            }
            else{
                // Napačno geslo
                $_SESSION['err'] = 6;
                header("Location: login.php");
            }
        }
        else{
            $_SESSION['err'] = 5;
            header("Location: login.php");
        }
    }

?>