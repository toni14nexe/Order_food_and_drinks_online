<?php
    $message = NULL;
    
    if(isset($_GET['vkey'])){
        $vkey = $_GET['vkey'];
        include '../quick_php/mysql.php';
        $resultSet = $mysqli->query("SELECT verified, vkey FROM users WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");
        if($resultSet->num_rows > 0){
            $update = $mysqli->query("UPDATE users SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");
            if($update){
                $message = "
                    <center><div class='col-sm-8 col-'>
                    <br><hr class='mb-3' style='color: green;'>
                    <center><h3>Račun vam je uspješno verificiran!<br></h3></center>
                    <hr class='mb-3' style='color: green;'>
                    <center><img src='../assets/img/success.png' style='width: 25%; margin-left: ; margin-right: auto;'></center>
                    <hr class='mb-3' style='color: green;'>
                    <a href='../index.php'><button class='btn_page'>POVRATAK NA NASLOVNU</button></a>
                    <br><br>
                    <a href='../prijava.php'><button class='btn_page'>PRIJAVITE SE</button></a>
                    <hr class='mb-3' style='color: green;'></center></div>
                ";
            }else{
                echo $mysqli->error;
            }
        }else{
            $message = "
                <center><div class='col-sm-8 col-'>
                <br><hr class='mb-3' style='color: green;'>
                <center><h3>Greška prilikom verifikacije računa!<br>Račun je nepostojeći ili je već verificiran!<br></h3></center>
                <hr class='mb-3' style='color: green;'>
                <center><img src='../assets/img/error.png' style='width: 25%; margin-left: ; margin-right: auto;'></center>
                <hr class='mb-3' style='color: green;'>
                <a href='../index.php'><button class='btn_page'>POVRATAK NA NASLOVNU</button></a>
                <hr class='mb-3' style='color: green;'></center></div>
            ";
        }
    }
    else{
        $message ="
            <center><div class='col-sm-8 col-'>
            <br><hr class='mb-3' style='color: green;'>
            <center><h3>Ups! Dogodila se greška!<br></h3></center>
            <hr class='mb-3' style='color: green;'>
            <center><img src='../assets/img/error.png' style='width: 25%; margin-left: ; margin-right: auto;'></center>
            <hr class='mb-3' style='color: green;'>
            <a href='../index.php'><button class='btn_page'>POVRATAK NA NASLOVNU</button></a>
            <hr class='mb-3' style='color: green;'></center></div>
        ";
    }
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="../assets/img/logo.png" rel="icon">
    
    <title>Dublin's Pub - Autentifikacija</title>

    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body  style="color: white;
    background-image: url('https://toni-web.com/stable_img/coffee.jpg'); background-position-y: -81px;">
    <main>
        <center><div class="container" style="background-color: black; opacity: 0.8; width: 80%;">
        <?php echo $message; ?>
        </div></center>
    </main>
    <footer>
        <h5 style="font-family: 'Times New Roman', Times, serif;"><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h5>
    </footer>
</body>
</html>