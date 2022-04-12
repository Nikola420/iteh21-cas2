<?php 

require "dbBroker.php";
require "model/user.php";


session_start();
if(isset($_POST['username']) && isset($_POST['password'])){
    $uname = $_POST['username'];
    $upass = $_POST['password'];

    $conn = new mysqli();

    $korisnik = new User(null,$uname,$upass);
    $odg = User::logInUser($korisnik,$conn);  // staticki pristup funkcijama preko klase 


    if($odg->num_rows==1){
        echo '<script> console.log("Uspesno ste se prijavili") </script>';
        $_SESSION['user_id'] = $korisnik->id;
        header('Location: home-kostur.php');
        exit();
    } else{
        echo "Neuspesno";
    }


    



}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>FON: Zakazivanje kolokvijuma</title>

</head>
<body>
    <div class="login-form">
        <div class="main-div">
            <form method="POST" action="#">
                <div class="container">
                    <label class="username">Korisnicko ime</label>
                    <input type="text" name="username" class="form-control"  required>
                    <br>
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                    <button type="submit" class="btn btn-primary" name="submit">Prijavi se</button>
                </div>

            </form>
        </div>

        
    </div>
</body>
</html>