<?php
    session_start();
?>

<?php
    if(isset($_SESSION['user'])){
        $username_mess = $_SESSION['user'];
        if(isset($_POST['create'])){}
    }else{
        echo '<meta http-equiv="refresh" content="0;url=./odjava.php"/>';
    }
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="600;url=./note_pages/odjava.php?auto_odjava"/>

    <link href="../assets/img/logo.png" rel="icon">

    <title>Dublin's Pub - <?= $username_mess ?> - Narudžba</title>

    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body style="color: white;
    background-image: url('https://toni-web.com/stable_img/coffee.jpg'); background-position-y: -81px;">
    <main>
        <center>
        <div class="container" style="background-color: black; opacity: 0.8; width: 80%;">
            <div class="row">
            <br>
                <div class="col-sm-8">
                    <h3><br></h3>
                    <hr class="mb-3" style="color: green;">
                    <h3>Narudžba nije uspjela - izvan radnoga vremena!<br>Dostava je omogućena svakim danom od 7:00 do 23:00!</h3>
                    <hr class="mb-3" style="color: green;">
                    <img src="../assets/img/nije_poslano.png" style="width: 25%; margin-left: ; margin-right: auto;">
                    <hr class="mb-3" style="color: green;">
                    <a href="../user_ind.php"><button class="btn_page">POVRATAK NA NASLOVNU</button></a>
                    <br><? echo $rv_mess; ?>
                    <hr class="mb-3" style="color: green;">
                </div>
            </div>
        </div>
        </center>
    </main>

    <footer>
        <h5 style="font-family: 'Times New Roman', Times, serif;"><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h5>
    </footer>
</body>
</html>