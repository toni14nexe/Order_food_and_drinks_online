<?php
    session_start();
?>

<?php
    if(isset($_SESSION['user'])){
        $username_mess = $_SESSION['user'];
        if(isset($_POST['create'])){

        }
    }else{
        echo '<meta http-equiv="refresh" content="0;url=./note_pages/odjava.php"/>';
    }

    $naslov = NULL;
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="600;url=./note_pages/odjava.php?auto_odjava"/>

    <link href="./assets/img/logo.png" rel="icon">

    <title>Dublin's Pub - <?= $username_mess ?> - Košarica</title>

    <link href="./assets/css/products_style.css" rel="stylesheet">   
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="./assets/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./assets/js/smooth-scroll.polyfills.min.js"></script>
    <link href="./assets/css/style.css" rel="stylesheet">
</head>

<?php
    include './quick_php/mobitel.php';
    
    if($mobitel == TRUE){
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
            </style>
        ";
    }else{
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


    
    <table class="products_table">
    <?php
        $uk_cijena = 0;
        $uk_kol = 0;
        $ispis = '
            <center><br><br><br>
                <hr class="mb-3">
                <h1 style="color: white;">Košarica</h1>
                <hr class="mb-3"><br>
            </center>
            <tr style="background-color: rgb(12, 51, 1);">
                <td>NAZIV</td>
                <td>KOLIČINA</td>
                <td>CIJENA</td>
                <td>UKLONI</td>
            </tr>
        ';
        include './quick_php/mysql.php';
        if($conn->connect_error){
            die("Connection Failed!".$conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT * FROM $username_mess ORDER BY naziv ASC");
        $result = NULL;

        $postoji = false;
        if($stmt == NULL) { //KOŠARICA NE POSTOJI
            $postoji = false;
            $naslov = 'Košarica ne postoji';
            echo "
                <center><br><br><br>
                <hr class='mb-3'>
                <h1 style='color: white;'>Košarica je prazna!</h1>
                <hr class='mb-3'><br>
                <img src='./assets/img/prazna_kosarica.png' style='width: 15%'>
                <br><br>
                <hr class='mb-3'>
                <div class='tipke_s_div'>
                    <a href='narudzba.php'><button class='btn_kosarica'>PONUDA</button></a>
                </div></center>
            "; }
        else{ //KOŠARICA POSTOJI
            $postoji = true;
            $naslov = 'Košarica';
            $stmt = $conn->prepare("SELECT * FROM $username_mess ORDER BY naziv ASC");
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $uk_kol = $uk_kol + $row['količina'];
                $uk_cijena = $uk_cijena + $row['cijena'];
            }
            if($uk_kol == 0){ 
                $postoji = false;
                echo "
                    <center><br><br><br>
                    <hr class='mb-3'>
                    <h1 style='color: white;'>Košarica je prazna!</h1>
                    <hr class='mb-3'><br>
                    <img src='./assets/img/prazna_kosarica.png' style='width: 15%'>
                    <br><br>
                    <hr class='mb-3'>
                    <div class='tipke_s_div'>
                        <a href='narudzba.php'><button class='btn_kosarica'>PONUDA</button></a>
                    </div></center>
                ";
        }
        }

        if($postoji == true):
            echo $ispis;
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
                <form action="" method="post">
                    <tr style="background-color: <?= $boja ?>">
                        <input type='hidden' name='id' value='<?=$id?>'>
                        <td><?= $naziv ?></td>
                        <td><?= $row['količina'] ?> kom</td>
                        <td><?= $cijena . ' kn' ?></td>
                        <td><button type="submit" name="create" style="height: 40px;" class="btn-dodaj">
                            <img class="img1 img-fix" src="./assets/img/smece.png">
                            <img class="img2 img-fix" src="./assets/img/smece-hover.png"></button></td>
                    </tr>
                </form>

    <?php
                if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';}
                else{ $i = 0; $boja = 'rgb(32, 116, 15)';}
            endwhile;
            $uk_cijena = sprintf("%.2f", $uk_cijena);
            echo "
            <tr style='background-color: rgb(12, 51, 1); border-top: 1px solid white;'><td></td><td></td><td><br></td><td></td></tr>
            <tr style='background-color: rgb(12, 51, 1);'>
                <td></td>
                <td></td>
                <td>UKUPNO: $uk_cijena kn</td>
                <td></td>
            </tr>
            ";
        endif;
        
        if(isset($_POST['create'])){
            $sql = "DELETE FROM $username_mess WHERE id=$id";
                if ($conn->query($sql) === TRUE){}
                echo '<meta http-equiv="refresh" content="0;url=kosarica.php"/>';
            }
    ?>
    </table>
    <center><br><hr class='mb-3'></center>

    <?php
        if($postoji == true){
            echo "
            <center>
            <div class='tipke_div'>
                <div class='tipke_s_div'>
                    <a href='narudzba.php'><button class='btn_kosarica'>PONUDA</button></a>
                </div>
                <div class='tipke_s_div'>
                    <a href='naruci.php'><button class='btn_kosarica'>NARUČI</button></a>
                </div>
            </div>
            <hr class='mb-3'>
            </center>
            ";
        }
    ?>

</main>
    
    
    <footer id='footer_index'>
        <h5><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h5>
    </footer>
</body>
</html>