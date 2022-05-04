<?php
    session_start();
?>

<?php

    include './quick_php/radno_vrijeme.php';

    if(isset($_SESSION['user'])){
        $username_mess = $_SESSION['user'];
        if(isset($_POST['create'])){}
    }else{
        echo '<meta http-equiv="refresh" content="0;url=./note_pages/odjava.php"/>';
    }

    $uk_cijena = 0;
    $uk_kol = 0;
            include './quick_php/mysql.php';
    
            $stmt = $conn->prepare("SELECT * FROM $username_mess ORDER BY naziv ASC");
            $stmt->execute();
            $result = $stmt->get_result();
        
            while($row = $result->fetch_assoc()){
                $uk_cijena = $uk_cijena + $row['cijena'];
                $uk_cijena = sprintf("%.2f", $uk_cijena);
                $uk_kol = $uk_kol + $row['količina'];
            }
            if($uk_kol == 0){ 
                echo '<meta http-equiv="refresh" content="0;url=user_ind.php"/>';
            }

            $stmt = $conn->prepare("SELECT * FROM users WHERE username='$username_mess'");
            if($stmt == NULL) { echo '<meta http-equiv="refresh" content="0;url=user_ind.php"/>'; }
            $stmt->execute();
            $result = $stmt->get_result();

            include './quick_php/mysql.php';
    
            $stmt = $conn->prepare("SELECT * FROM users WHERE username='$username_mess'");
            $stmt->execute();
            $result = $stmt->get_result();
            
            if($stmt == NULL) { 
                echo '<meta http-equiv="refresh" content="0;url=user_ind.php"/>';
            }
            while($row = $result->fetch_assoc()){
                $adresa = $row['adresa'];
                $mjesto = $row['mjesto'];
                $broj = $row['broj'];
            }
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="600;url=./note_pages/odjava.php?auto_odjava"/>

    <link href="./assets/img/logo.png" rel="icon">

    <title>Dublin's Pub - <?= $username_mess ?> - Narudžba</title>

    <link href="./assets/css/products_style.css" rel="stylesheet">   
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="./assets/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./assets/js/smooth-scroll.polyfills.min.js"></script>
    <link href="./assets/css/style.css" rel="stylesheet">
</head>

<?php
    include './quick_php/mobitel.php';
    
    $style_a = NULL;
    if($mobitel == TRUE){
        $style_a = "style='width: 80%;'";
        echo "
            <style>
                .products_table{
                    border: 3px solid white;
                    margin-left: auto; 
                    margin-right: auto;
                    width: 97%;
                }
                td{
                    font-size: 0.6em;
                }
                .img1 {
                    height: 15px; 
                    width: 15px;
                }
                
                .img2 {
                    height: 15px; 
                    width: 15px;
                    display: none;
                }
                .img-fix {
                    height: 15px; 
                    width: 15px; 
                    margin-bottom: 6px; 
                    margin-top: -8px;
                }
                .btn-dodaj {
                    height: 20px;
                    background-color: rgb(208, 247, 201);
                    border-radius: 10px;
                }
                #napomena{
                    width: 80%;
                }
            </style>
        ";
    }else{
        $style_a = NULL;
        echo "
            <style>
                #napomena{
                    width: 50%;
                }
            </style>
        ";
    }
?>

<?php 
    include './quick_php/broj_kosarica.php';
?>

<body>
    <script>
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("nbar").style.top = "0";
        } else {
            document.getElementById("nbar").style.top = "-65px";
        }
        prevScrollpos = currentScrollPos;
    }
    </script>



    <main>
        <header id="header" class="fixed-top">
            <nav id="nbar" class="navbar navbar-expand-lg navbar-light bg-dark">
                <div id="myhead">
                    <div class="container-fluid">
                        <button name="submit" value="submit" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item headli">
                                    <a class="nav-link" href="user_ind.php" style="color: #f2f2f2;">Naslovna</a>
                                </li>
                                <li class="nav-item headli">
                                    <a class="nav-link" href="./user_ind.php#onama" style="color: #f2f2f2;">O nama</a>
                                </li>
                                <li class="nav-item headli">
                                    <a class="nav-link" href="narudzba.php" style="color: #f2f2f2;">Ponuda</a>
                                </li>
                                <li class="nav-item headli">
                                    <a class="nav-link" href="user.php" style="color: #f2f2f2;"><img src="./assets/img/user.png" 
                                    style="height: 25px; width: 25px;"> <?php echo $username_mess ?></a>
                                </li>
                                <li class="nav-item headli">
                                    <a class="nav-link menu-imgs" href="kosarica.php" title="Košarica">
                                        <h7 class="br_kosarica"><?php echo $br_kosarica ?></h5>
                                        <img class="img1" src="./assets/img/kosarica.png">
                                        <img class="img2" src="./assets/img/kosarica-hover.png"><!-- nav-link:hover background-color rgb(80,80,80) -->
                                    </a>
                                </li>
                                <li class="nav-item headli">
                                    <a class="nav-link menu-imgs" href="./note_pages/odjava.php?odjava" style="color: #f2f2f2;">Odjava
                                        <img class="img1" src="./assets/img/odjaviti.png">
                                        <img class="img2" src="./assets/img/odjaviti-hover.png">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>  
                </div>
            </nav>
        </header>



            <center><br><br><br>
                <hr class='mb-3'>
                <h1 style='color: white;'><?= $username_mess ?></h1>
                <h1 style='color: white;'>Želite li potvrditi svoju narudžbu?</h1>
                <h3 style='color: white;'>Ukupna vrijednost za platiti: <?= $uk_cijena ?> kn</h3>
                <h4 style='color: white;'>Plaćanje se odvija gotovinom konobaru!</h4>
                <hr class='mb-3'><br>
            <center>
        <table class="products_table">
            <tr style="background-color: rgb(12, 51, 1);">
                <td>NAZIV</td>
                <td>KOLIČINA</td>
                <td>CIJENA</td>
            </tr>
        <?php
            include './quick_php/mysql.php';
            if($conn->connect_error){
                die("Connection Failed!".$conn->connect_error);
            }
     
            $stmt = $conn->prepare("SELECT * FROM $username_mess ORDER BY naziv ASC");
            $stmt->execute();
            $result = $stmt->get_result();

            $i = 1;
            if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';
            }else{ $i = 0; $boja = 'rgb(32, 116, 15)';}

            while($row = $result->fetch_assoc()):
                $id = $row['id'];
                $naziv = $row['naziv'];
                $kol = $row['količina'];
                $cijena = $row['cijena'];
        ?>

            <tr style="background-color: <?= $boja ?>">
                <input type="hidden" name="id" value="<?=$id?>">
                <td><?= $naziv ?></td>
                <td><?= $row['količina'] ?> kom</td>
                <td><?= $cijena . ' kn' ?></td>
            </tr>

        <?php
                if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';}
                else{ $i = 0; $boja = 'rgb(32, 116, 15)';}
            endwhile;
        ?>

        <tr style='background-color: rgb(12, 51, 1); border-top: 1px solid white;'><td></td><td><br></td><td></td></tr>
            <tr style='background-color: rgb(12, 51, 1);'>
                <td></td>
                <td></td>
                <td>UKUPNO: <?= $uk_cijena ?> kn</td>
            </tr>
        </table>
        <br>
        <hr class='mb-3'>
        <br>

        <form action="" method="post">
            <label for="adresa" style="color: white;">Adresa i kućni broj</label><br>
            <input class="form-control" type="text" name="adresa"  value="<?= $adresa ?>" <?= $style_a ?> required><br>

            <label for="mjesto" style="color: white;">Mjesto</label><br>
            <input class="form-control" type="text" name="mjesto"  value="<?= $mjesto ?>" <?= $style_a ?> required><br>

            <label for="broj" style="color: white;">Mobitel/telefon</label><br>
            <input class="form-control" type="text" name="broj"  value="<?= $broj ?>" <?= $style_a ?> required><br>

            <br><hr class='mb-3'>
            <label for="napomena"><h5 style="color:white;">Napomena/komentar narudžbe:</h5></label>
            <br>
            <textarea id="napomena" name="napomena" placeholder="Napomena/komentar..." rows="4" cols="50" maxlength="200"></textarea>
            <br><hr class='mb-3'>

            <br><div class='tipke_div'>
            <div class='tipke_s_div'>
                <button class='btn_red' name="odustani">ODUSTANI</button>
            </div>
            <div class='tipke_s_div'>
                <button class='btn_kosarica' name="potvrdi">POTVRDI</button>
            </div>
        </div></form>
        <br><hr class='mb-3'><br>

        <?php
            if(isset($_POST['odustani'])){
                echo '<meta http-equiv="refresh" content="0;url=./kosarica.php"/>';
            }

            if(isset($_POST['potvrdi'])){
                $napomena = $_POST['napomena'];
                $narudzba = "<table style='width:100%;border: 3px solid white;'><tr><td>NAZIV</td><td>KOL</td><td>CIJENA</td></tr>";
                $adresa = $_POST['adresa'];
                $mjesto = $_POST['mjesto'];
                $broj = $_POST['broj'];

                $stmt = $conn->prepare("SELECT * FROM users WHERE username = '$username_mess'");
                $stmt->execute();
                $result = $stmt->get_result();

                while($row = $result->fetch_assoc()){
                    $ime_prez = $row['firstname'] . ' ' . $row['lastname'];
                    $email = $row['email'];
                }

                $stmt = $conn->prepare("SELECT * FROM $username_mess ORDER BY naziv ASC");
                $stmt->execute();
                $result = $stmt->get_result();

                while($row = $result->fetch_assoc()){
                    $id = $row['id'];
                    $naziv = $row['naziv'];
                    $kol = $row['količina'];
                    $cijena = $row['cijena'];

                    $narudzba = $narudzba . "<tr><td>".$naziv."</td><td>".$kol."</td><td>".$cijena."</td></tr>";

                    //oduzimanje zalihe i dodavanje u prodano
                    //kava
                    if($id > 9999 && $id < 10014){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 11;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 11;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 12;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 12;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 13;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 13;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 14;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 14;";
                        if ($conn->query($sql) === TRUE){}
                        continue;
                    }
                    //čaj
                    if($id == 11000){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 20;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 20;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11001){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 21;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 21;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11002){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 22;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 22;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11003){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 23;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 23;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11004){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 24;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 24;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11005){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 25;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 25;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11006){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 26;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 26;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    //čaj s medom
                    if($id == 11007){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 20;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 20;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 19;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 19;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11008){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 21;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 21;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 19;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 19;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11009){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 22;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 22;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 19;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 19;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11010){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 23;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 23;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 19;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 19;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11011){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 24;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 24;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 19;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 19;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11012){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 25;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 25;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 19;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 19;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11013){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 26;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 26;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 19;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 19;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    //bezkofeinska
                    if($id > 10019 && $id < 10026){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 1;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 1;";
                        if ($conn->query($sql) === TRUE){}
                        continue;
                    }
                    //cappucinno
                    if($id == 11040){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 40;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 40;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11041){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 41;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 41;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11042){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 42;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 42;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11043){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 43;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 43;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11044){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 44;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 44;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11045){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 45;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 45;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11046){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 46;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 46;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    //hidra
                    if($id == 73){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 74;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 74;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    //jamnica
                    if($id == 11550){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11551){
                        $kol = $kol * 0.5;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11552){
                        $kol = $kol * 0.3;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11553){
                        $kol = $kol * 0.2;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11554){
                        $kol = $kol * 0.1;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    //točena coca-cola
                    if($id == 11555){
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 93;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 93;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11556){
                        $kol = $kol * 0.5;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 93;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 93;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11557){
                        $kol = $kol * 0.30;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 93;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 93;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11558){
                        $kol = $kol * 0.20;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 93;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 93;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11559){
                        $kol = $kol * 0.10;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 93;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 93;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    //turska coca-cola
                    if($id == 11561){
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 94;";
                        if ($conn->query($sql) === TRUE){}
                        $kol = $kol * 0.25;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 93;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 93;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11562){
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 94;";
                        if ($conn->query($sql) === TRUE){}
                        $kol = $kol * 0.15;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 93;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 93;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11563){
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 94;";
                        if ($conn->query($sql) === TRUE){}
                        $kol = $kol * 0.1;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 93;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 93;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    //graševina belje
                    if($id == 11500){
                        $kol = $kol * 1;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 201;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 201;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11501){
                        $kol = $kol * 0.2;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 201;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 201;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11502){
                        $kol = $kol * 0.1;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 201;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 201;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    //graševina kutjevo
                    if($id == 11503){
                        $kol = $kol * 1;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 202;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 202;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11504){
                        $kol = $kol * 0.2;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 202;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 202;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11505){
                        $kol = $kol * 0.1;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 202;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 202;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    //frankovka belje
                    if($id == 11506){
                        $kol = $kol * 1;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 203;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 203;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11507){
                        $kol = $kol * 0.2;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 203;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 203;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 11508){
                        $kol = $kol * 0.1;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 203;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 203;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    //pol-pol belje
                    if($id == 204){
                        $kol1 = $kol;
                        $sql = "UPDATE products SET prodano=prodano+$kol1 WHERE id = 204;";
                        if ($conn->query($sql) === TRUE){}
                        $kol = $kol * 0.1;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 201;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 201;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 205){
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 205;";
                        if ($conn->query($sql) === TRUE){}
                        $kol = $kol * 0.15;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 201;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 201;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    //pol-pol kutjevo
                    if($id == 206){
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 206;";
                        if ($conn->query($sql) === TRUE){}
                        $kol = $kol * 0.1;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 202;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 202;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 207){
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 207;";
                        if ($conn->query($sql) === TRUE){}
                        $kol = $kol * 0.15;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 202;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 202;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 80;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    //bambus belje
                    if($id == 208){
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 208;";
                        if ($conn->query($sql) === TRUE){}
                        $kol = $kol * 0.1;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 203;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 203;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 93;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 93;";
                        if ($conn->query($sql) === TRUE){}continue;}
                    if($id == 209){
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 209;";
                        if ($conn->query($sql) === TRUE){}
                        $kol = $kol * 0.15;
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 203;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 203;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 93;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 93;";
                        if ($conn->query($sql) === TRUE){}continue;}
            
                    //oduzimanje juicea, tangerine, bittera, tonica u žesti
                    else{
                        //žesta količina
                        if($id > 140 && $id < 190){
                            $kol = $kol * 0.03;}
                        //miješana žesta količina I PREBAVICANJE ID-a mij.žeste u ID žeste
                        if($id > 300 && $id < 320){
                            $kol1 = $kol;
                            //oduzimanje kole
                            if($id > 300 && $id < 305 || $id > 306 && $id < 311 || $id == 313){
                                $kol = $kol * 0.1;
                                $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 93;";
                                if ($conn->query($sql) === TRUE){}
                                $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 93;";
                                if ($conn->query($sql) === TRUE){}
                                if($id == 301){ $id = 141; }
                                if($id == 302){ $id = 142; }
                                if($id == 303){ $id = 143; }
                                if($id == 304){ $id = 144; }
                                if($id == 307){ $id = 170; }
                                if($id == 308){ $id = 146; }
                                if($id == 309){ $id = 147; }
                                if($id == 310){ $id = 169; }
                                if($id == 313){ $id = 179; }
                                $kol = 1;}
                            //oduzimanje juicea
                            if($id == 306 || $id == 312){
                                $kol = $kol * 0.5;
                                $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 62;";
                                if ($conn->query($sql) === TRUE){}
                                $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 62;";
                                if ($conn->query($sql) === TRUE){}
                                if($id == 306){ $id = 145; }
                                if($id == 312){ $id = 176; }
                                $kol = 1;}
                            //oduzimanje spritea
                            if($id == 311){
                                $kol = $kol * 0.5;
                                $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 54;";
                                if ($conn->query($sql) === TRUE){}
                                $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 54;";
                                if ($conn->query($sql) === TRUE){}
                                $id = 175;
                                $kol = 1;}
                            //oduzimanje tonica
                            if($id == 314){
                                $kol = $kol * 0.5;
                                $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 60;";
                                if ($conn->query($sql) === TRUE){}
                                $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 60;";
                                if ($conn->query($sql) === TRUE){}
                                $id = 178;
                                $kol = 1;}
                            //oduzimanje biter-lemona
                            if($id == 315){
                                $kol = $kol * 0.5;
                                $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 59;";
                                if ($conn->query($sql) === TRUE){}
                                $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 59;";
                                if ($conn->query($sql) === TRUE){}
                                $id = 178;
                                $kol = 1;}
                            //oduzimanje tangerine
                            if($id == 316){
                                $kol = $kol * 0.5;
                                $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = 58;";
                                if ($conn->query($sql) === TRUE){}
                                $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = 58;";
                                if ($conn->query($sql) === TRUE){}
                                $id = 178;
                                $kol = 1;}

                            $kol = $kol1 * 0.03;
                        }
                        $sql = "UPDATE products SET zaliha=zaliha-$kol WHERE id = $id;";
                        if ($conn->query($sql) === TRUE){}
                        $sql = "UPDATE products SET prodano=prodano+$kol WHERE id = $id;";
                        if ($conn->query($sql) === TRUE){}
                    }
                    

                    
                }
                $narudzba = $narudzba . "</table>";

                $date = date("d.m.Y.");
                $vrijeme = time();
                
                //dodavanje nove narudžbe u tablicu 'narudzbe'
                include './quick_php/mysql.php';
                $sql = "INSERT INTO narudzbe (user, ime_prez, proizvodi, napomena, cijena, status, date, adresa, mjesto, broj) VALUES(?,?,?,?,?,?,?,?,?,?)";
                $stmtinsert = $db->prepare($sql);
                $result = $stmtinsert->execute([$username_mess, $ime_prez, $narudzba, $napomena, $uk_cijena, 'Poslana narudžba', $date, $adresa, $mjesto, $broj]);

                //brisanje stare tablice $username_mess naziva 
                include './quick_php/mysql.php';
                $sql = "DROP TABLE $username_mess;";
                if ($conn->query($sql) === TRUE) {} else {}
                
                $sql = "UPDATE narudzbe SET broj='1' WHERE id='0'";
                    if ($conn->query($sql) === TRUE) {}
                
                $username_mess = $_SESSION['user'];
        //POSLATI MAIL LOKALNO
          //    $to = $email;
          //    $subject = "Email Verification";
          //    $message = "
          //        <h3>$username hvala Vam na narudžbi!<br></h3
          //        Narudžbu možete nastaviti pratiti na svome računu: http://localhost/zavrsni/user.php
          //    ";
          //     $headers = "From: Dublin's Pub <toni14nexe@gmail.com> \r\n";
          //     $headers .= "MIME-Version: 1.0" . "\r\n";
          //     $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
          //     mail($to,$subject,$message,$headers);
          //POSLATI MAIL ONLINE
                ini_set( 'display_errors',1 );
                error_reporting( E_ALL );
                $from = "dublinspub@toni-web.com";
                $to = $email;
                $subject = "Narudžba je zaprimljena!";
                $message = "
                 <h3>$username_mess hvala Vam na narudžbi!<br></h3>
                  Narudžbu možete nastaviti pratiti na svome računu: https://toni-web.com/user.php
                ";
                $headers = "From: Dublin's Pub <dublinspub@toni-web.com> \r\n";
                $headers .= "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                mail($to,$subject,$message, $headers);
          //    

                echo '<meta http-equiv="refresh" content="0;url=./note_pages/zaprimita.php"/>';
            }
        ?>
    </main>


    
    <footer id='footer_index'>
        <h5><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h5>
    </footer>
</body>
</html>