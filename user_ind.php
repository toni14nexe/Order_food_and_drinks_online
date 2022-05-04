<?php
    session_start();
?>

<?php
    if(isset($_SESSION['user'])){
        $username_mess = $_SESSION['user'];
    }else{
        echo '<meta http-equiv="refresh" content="0;url=./note_pages/odjava.php"/>';
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

    <title>Dublin's Pub - <?= $username_mess ?></title>

    <link href="./assets/css/products_style.css" rel="stylesheet">  
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="./assets/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./assets/js/smooth-scroll.polyfills.min.js"></script>
    <link href="./assets/css/style.css" rel="stylesheet">
</head>

<?php
  function onamaFun() {
    header("Location: user_ind.php#onama");
  }
  if (isset($_GET['onama'])) {
    onamaFun();
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
                                    <a class="nav-link" href="#onama" style="color: #f2f2f2;">O nama</a>
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

        <div class="hero-image">
            <div class="hero-text">
            <h1 style="font-size:50px">Dublin's Pub</h1>
            <a href="narudzba.php"><button  style="border-radius: 10px; border: solid;">NARUČI</button></a>
            </div>
        </div>
    <main>
        <section id="onama">
            <div class="onama" style="color: white;">
                <center><br><hr class='mb-3' style="width: 80%;"></center>
                <h1 style="margin-top: 0%;">O nama</h1>
                <center><hr class='mb-3' style="width: 80%;"></center>
                <div class="container fluid">
                    <div class="row">
                        <div style="text-align: center;">
                            <div>
                                <p>Dublin's Pub je pub sa dugom poviješću u samom centru Našica i raspolaže širokim asortimanom pića za izbor.
                                    <br>Posjetite nas i uživajte u opuštenoj atmosferi uz pažljivo odabranu muziku prigodnu svakome dijelu dana.
                                </p>
                            </div>
                            <center><hr class='mb-3' style="width: 100%;"></center>
                            <h7>Trg dr. Franje Tuđmana 2, Našice<br><br></h7>
                            <div style="width: 80%; margin-right: auto; margin-left: auto; height: 40%;">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1663.0946878801499!2d18.089603381578552!3d45.49033294468495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475d0db3517f6a41%3A0xb737f4618b07ea9d!2sDublin&#39;s%20pub!5e0!3m2!1shr!2shr!4v1638541250347!5m2!1shr!2shr" width="100%" height="100%" style="border: double;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fav_div1">
                    <a href="https://www.facebook.com/DublinsPubNa" target="_blank"><img src="./assets/img/facebook.png" class="favicon_fac" title="Facebook link"></a>
                </div>
                <div class="fav_div2">
                    <a href="https://www.instagram.com/dublins.pub/?hl=hr" target="_blank"><img src="./assets/img/instagram.png" class="favicon_ins" title="Instagram link"></a>
                </div>
            </div>
        </section>
    </main>

    <footer id="footer_index">
        <h5><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h5>
    </footer>
</body>
</html>