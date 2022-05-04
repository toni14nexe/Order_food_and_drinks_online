<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="600;url=odjava.php?auto_odjava"/>
    
    <link href="../assets/img/logo.png" rel="icon">
    <title>Dublin's Pub</title>

    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<?php
    if(isset($_SESSION['admin'])){
        $username_mess = $_SESSION['admin'];
        if(isset($_POST['create'])){

        }
    }else{
        echo '<meta http-equiv="refresh" content="0;url=odjava.php"/>';
    }

    $naslov = NULL;
?>


<body style="color: white;
    background-image: url('https://toni-web.com/stable_img/coffee.jpg'); background-position-y: -81px;">
    <main>
        <center><div class="container" style="background-color: black; opacity: 0.8; width: 80%;">
            <div class="row">
            <br>
                <div class="col-sm-8">
                    <h3><br></h3>
                    <hr class="mb-3" style="color: green;">
                    <center><h3>Korisnički račun i povijest narudžbi je uspješno obrisan!<br></h3></center>
                    <hr class="mb-3" style="color: green;">
                    <center><img src="../assets/img/success.png" style="width: 25%; margin-left: ; margin-right: auto;"></center>
                    <hr class="mb-3" style="color: green;">
                    <a href="../admin_users.php"><button class="btn_page">POVRATAK NA PROFIL</button></a>
                    <br>
                </div></center>
            </div>
        </div>
    </main>

    <footer>
        <h5 style="font-family: 'Times New Roman', Times, serif;"><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h5>
    </footer>
</body>
</html>