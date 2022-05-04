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

    <title>Dublin's Pub - Zaprimita narudžba</title>

    <link href="../assets/css/products_style.css" rel="stylesheet">   
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="../assets/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../assets/js/smooth-scroll.polyfills.min.js"></script>
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<?php
    if(isset($_SESSION['user'])){
        $username_mess = $_SESSION['user'];
        if(isset($_POST['create'])){

        }
    }else{
        echo '<meta http-equiv="refresh" content="0;url=odjava.php"/>';
    }

    $naslov = NULL;
?>

<?php
    include '../quick_php/broj_kosarica.php';
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
                                    <a class="nav-link" href="../user_ind.php" style="color: #f2f2f2;">Naslovna</a>
                                </li>
                                <li class="nav-item headli">
                                    <a class="nav-link" href="../user_ind.php#onama" style="color: #f2f2f2;">O nama</a>
                                </li>
                                <li class="nav-item headli">
                                    <a class="nav-link" href="../narudzba.php" style="color: #f2f2f2;">Ponuda</a>
                                </li>
                                <li class="nav-item headli">
                                    <a class="nav-link" href="../user.php" style="color: #f2f2f2;"><img src="../assets/img/user.png" 
                                    style="height: 25px; width: 25px;"> <?php echo $username_mess ?></a>
                                </li>
                                <li class="nav-item headli">
                                    <a class="nav-link menu-imgs" href="../kosarica.php" title="Košarica">
                                        <h7 class="br_kosarica"><?php echo $br_kosarica ?></h5>
                                        <img class="img1" src="../assets/img/kosarica.png">
                                        <img class="img2" src="../assets/img/kosarica-hover.png"><!-- nav-link:hover background-color rgb(80,80,80) -->
                                    </a>
                                </li>
                                <li class="nav-item headli">
                                    <a class="nav-link menu-imgs" href="./odjava.php?odjava" style="color: #f2f2f2;">Odjava
                                        <img class="img1" src="../assets/img/odjaviti.png">
                                        <img class="img2" src="../assets/img/odjaviti-hover.png">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>  
                </div>
            </nav>
        </header>



        <center>
            <br><br><br><hr class='mb-3'>
            <h1 style='color: white;'><?= $username_mess ?></h1>
            <h1 style='color: white;'>Vaša narudžba je zaprimljena!</h1>
            <hr class='mb-3'>
            <h3 style="color: white;">Status narudžbe pratite na svome profilu:</h3>
            <div class='tipke_div'>
                <div class='tipke_s_div'>
                    <a href="../user.php"><button class='btn_kosarica' name="odustani">MOJ PROFIL</button></a>
                </div>
            </div>
            <hr class='mb-3'>
        </center>



    </main>

    <footer id="footer_index">
        <h5><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h5>
    </footer>
</body>
</html>