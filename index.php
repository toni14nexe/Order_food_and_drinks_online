<?php
    session_start();
?>

<?php
    if(isset($_SESSION['user'])){
        echo '<meta http-equiv="refresh" content="0;url=user_ind.php"/>';
    }
    if(isset($_SESSION['konobar'])){
        echo '<meta http-equiv="refresh" content="0;url=konobar.php"/>';
    }
    
?>

<?php
  function onamaFun() {
    header("Location: index.php#onama");
  }
  if (isset($_GET['onama'])) {
    onamaFun();
  }

  function cjenikFun() {
    header("Location: index.php#cjenik");
  }
  if (isset($_GET['cjenik'])) {
    cjenikFun();
  }

  function topli() {
    header("Location: index.php#topli");
  }
  if (isset($_GET['topli'])) {
    topli();
  }

  function bezalk() {
    header("Location: index.php#bezalk");
  }
  if (isset($_GET['bezalk'])) {
    bezalk();
  }

  function piva() {
    header("Location: index.php#piva");
  }
  if (isset($_GET['piva'])) {
    piva();
  }

  function vina() {
    header("Location: index.php#vina");
  }
  if (isset($_GET['vina'])) {
    vina();
  }

  function alk() {
    header("Location: index.php#alk");
  }
  if (isset($_GET['alk'])) {
    alk();
  }

  function mje_alk() {
    header("Location: index.php#mje_alk");
  }
  if (isset($_GET['mje_alk'])) {
    mje_alk();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="google-site-verification" content="TpjNron2f58g-Gfg_cjysz6cikt14UxQKn1sdOX76g0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="./assets/img/logo.png" rel="icon">

    <title>Dublin's Pub</title>

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
                                <a class="nav-link" href="." style="color: #f2f2f2;">Naslovna</a>
                            </li>
                            <li class="nav-item headli" >
                                <a class="nav-link" href="#onama" style="color: #f2f2f2;">O nama</a>
                            </li>
                            <li class="nav-item headli" >
                                <a class="nav-link" href="#cjenik" style="color: #f2f2f2;">Cjenik</a>
                            </li>
                            <li class="nav-item headli">
                                <a class="nav-link" href="prijava.php" style="color: #f2f2f2;">Prijava</a>
                            </li>
                            <li class="nav-item headli">
                                <a class="nav-link" href="registracija.php" style="color: #f2f2f2;">Registracija</a>
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
                <a href="#cjenik"><button  style="border-radius: 10px; border: solid;">CIJENE</button></a>
                <br>
            </div>
        </div>
    
    

        
        
    <main>
        <section id="onama">
            <div class="onama" style="color: white;">
                <br><center><hr class='mb-3' style="width: 80%; color: white;"></center>
                <h1 style="margin-top: 0%;">O nama</h1>
                <center><hr class='mb-3' style="width: 80%; color: white;"></center>
                <div class="container fluid">
                    <div class="row">
                        <div style="text-align: center;">
                            <div>
                                <p>Dublin's Pub je pub sa dugom poviješću u samom centru Našica i raspolaže širokim asortimanom pića za izbor.
                                    <br>Posjetite nas i uživajte u opuštenoj atmosferi uz pažljivo odabranu muziku prigodnu svakome dijelu dana.
                                </p>
                            </div>
                            <center><hr class='mb-3' style="width: 100%; color: white;"></center>
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




        <section id=cjenik>
        <center><hr class='mb-3'></center>
        <h1 style="margin-top: 0%; color: white;">Cjenik</h1></section>
        <div class="drinks_div">
            <div class="col-md-6 drinks_s_div">
                <div class="drinks_xs_div">
                    <a href="#topli"><img class="drinks_img" src="./assets/img_drinks/kava.jpg" title="Topli napitci"></a>
                </div>
                <div class="drinks_xs_div">
                    <a href="#bezalk"><img class="drinks_img" src="./assets/img_drinks/bezalkohola.jpg" title="Bezalkoholna pića"></a>
                </div>
                <div class="drinks_xs_div">
                    <a href="#piva"><img class="drinks_img" src="./assets/img_drinks/pivo.jpg" title="Piva i cideri"></a>                    
                </div>
            </div>
            <div class="col-md-6 drinks_s_div">
                <div class="drinks_xs_div">
                    <a href="#vina"><img class="drinks_img" src="./assets/img_drinks/vino.jpg" title="Vina"></a>                    
                </div>
                <div class="drinks_xs_div">
                    <a href="#alk"><img class="drinks_img" src="./assets/img_drinks/zesta.jpg" title="Jaka alkoholna pića"></a>                    
                </div>
                <div class="drinks_xs_div">
                    <a href="#mje_alk"><img class="drinks_img" src="./assets/img_drinks/mje_alk.jpg" title="Miješana alkoholna pića"></a>
                </div>
            </div>
        </div>
        <section id=topli>
        <center><hr class='mb-3'></center>





        <h3 style="color: white">Topli napitci</h3></section>
        <table class="products_table">
        <tr style="background-color: rgb(12, 51, 1);">
            <td style="width: 20%;">NAZIV</td>
            <td style="width: 20%;">CIJENA</td>
            <td style="width: 20%;">KOL</td>
        </tr>
        <?php
            include './quick_php/mysql.php';
    
            $stmt = $conn->prepare("SELECT * FROM products WHERE tip = 'topli' ORDER BY naziv ASC");
            $stmt->execute();
            $result = $stmt->get_result();
            $i = 0; $boja = 'rgb(32, 116, 15)';

            $drop_mess = NULL;
            while($row = $result->fetch_assoc()):
                $id = $row['id'];
                $naziv = $row['naziv'];
                $cijena = $row['cijena'];
        ?>
        <form action="" method="post">
            <tr style="background-color: <?= $boja ?>">
                <input type="hidden" name="id" value="<?=$id?>">
                <td><?= $naziv ?><?php echo $drop_mess ?></td>
                <td><?= $cijena . ' kn' ?></td>
                <td><?= $row['količina'] ?></td>
            </tr>
        </form>
        <?php
            if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';}
            else{ $i = 0; $boja = 'rgb(32, 116, 15)';}
            endwhile;
        ?>
        </table>

               



        <section id=bezalk><h3 style="color: white"><br>Bezalkoholna pića</h3></section>
        <table class="products_table">
        <tr style="background-color: rgb(12, 51, 1);">
            <td style="width: 20%;">NAZIV</td>
            <td style="width: 20%;">CIJENA</td>
            <td style="width: 20%;">KOL</td>
        </tr>
        <?php
            include './quick_php/mysql.php';

    
            $stmt = $conn->prepare("SELECT * FROM products WHERE tip = 'bezalk' ORDER BY naziv ASC");
            $stmt->execute();
            $result = $stmt->get_result();
            $i = 0; $boja = 'rgb(32, 116, 15)';

            $drop_mess = NULL;
            while($row = $result->fetch_assoc()):
                $id = $row['id'];
                $naziv = $row['naziv'];
                $cijena = $row['cijena'];
        ?>
        <form action="" method="post">
            <tr style="background-color: <?= $boja ?>">
                <input type="hidden" name="id" value="<?=$id?>">
                <td><?= $naziv ?><?php echo $drop_mess ?></td>
                <td><?= $cijena . ' kn' ?></td>
                <td><?= $row['količina'] ?></td>
            </tr>
        </form>
        <?php
            if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';}
            else{ $i = 0; $boja = 'rgb(32, 116, 15)';}
            endwhile;
        ?>
        </table>





        <section id=piva><h3 style="color: white"><br>Piva i cideri</h3></section>
        <table class="products_table">
        <tr style="background-color: rgb(12, 51, 1);">
            <td style="width: 20%;">NAZIV</td>
            <td style="width: 20%;">CIJENA</td>
            <td style="width: 20%;">KOL</td>
        </tr>
        <?php
            include './quick_php/mysql.php';
    
            $stmt = $conn->prepare("SELECT * FROM products WHERE tip = 'pivo' ORDER BY naziv ASC");
            $stmt->execute();
            $result = $stmt->get_result();
            $i = 0; $boja = 'rgb(32, 116, 15)';

            $drop_mess = NULL;
            while($row = $result->fetch_assoc()):
                $id = $row['id'];
                $naziv = $row['naziv'];
                $cijena = $row['cijena'];
        ?>
        <form action="" method="post">
            <tr style="background-color: <?= $boja ?>">
                <input type="hidden" name="id" value="<?=$id?>">
                <td><?= $naziv ?><?php echo $drop_mess ?></td>
                <td><?= $cijena . ' kn' ?></td>
                <td><?= $row['količina'] ?></td>
            </tr>
        </form>
        <?php
            if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';}
            else{ $i = 0; $boja = 'rgb(32, 116, 15)';}
            endwhile;
        ?>
        </table>





        <section id=vina><h3 style="color: white"><br>Vina</h3></section>
        <table class="products_table">
        <tr style="background-color: rgb(12, 51, 1);">
            <td style="width: 20%;">NAZIV</td>
            <td style="width: 20%;">CIJENA</td>
            <td style="width: 20%;">KOL</td>
        </tr>
        <?php
            include './quick_php/mysql.php';
    
            $stmt = $conn->prepare("SELECT * FROM products WHERE tip = 'vina' ORDER BY naziv ASC");
            $stmt->execute();
            $result = $stmt->get_result();
            $i = 0; $boja = 'rgb(32, 116, 15)';

            $drop_mess = NULL;
            while($row = $result->fetch_assoc()):
                $id = $row['id'];
                $naziv = $row['naziv'];
                $cijena = $row['cijena'];
        ?>
        <form action="" method="post">
            <tr style="background-color: <?= $boja ?>">
                <input type="hidden" name="id" value="<?=$id?>">
                <td><?= $naziv ?><?php echo $drop_mess ?></td>
                <td><?= $cijena . ' kn' ?></td>
                <td><?= $row['količina'] ?></td>
            </tr>
        </form>
        <?php
            if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';}
            else{ $i = 0; $boja = 'rgb(32, 116, 15)';}
            endwhile;
        ?>
        </table>





    <section id=alk><h3 style="color: white"><br>Jaka alkoholna pića</h3></section>
        <table class="products_table">
        <tr style="background-color: rgb(12, 51, 1);">
            <td style="width: 20%;">NAZIV</td>
            <td style="width: 20%;">CIJENA</td>
            <td style="width: 20%;">KOL</td>
        </tr>
        <?php
            include './quick_php/mysql.php';
    
            $stmt = $conn->prepare("SELECT * FROM products WHERE tip = 'alk' ORDER BY naziv ASC");
            $stmt->execute();
            $result = $stmt->get_result();
            $i = 0; $boja = 'rgb(32, 116, 15)';

            $drop_mess = NULL;
            while($row = $result->fetch_assoc()):
                $id = $row['id'];
                $naziv = $row['naziv'];
                $cijena = $row['cijena'];
        ?>
        <form action="" method="post">
            <tr style="background-color: <?= $boja ?>">
                <input type="hidden" name="id" value="<?=$id?>">
                <td><?= $naziv ?><?php echo $drop_mess ?></td>
                <td><?= $cijena . ' kn' ?></td>
                <td><?= $row['količina'] ?></td>
            </tr>
        </form>
        <?php
            if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';}
            else{ $i = 0; $boja = 'rgb(32, 116, 15)';}
            endwhile;
        ?>
        </table>





        <section id=mje_alk><h3 style="color: white"><br>Miješana alkoholna pića</h3></section>
        <table class="products_table">
        <tr style="background-color: rgb(12, 51, 1);">
            <td style="width: 20%;">NAZIV</td>
            <td style="width: 20%;">CIJENA</td>
            <td style="width: 20%;">KOL</td>
        </tr>
        <?php
            include './quick_php/mysql.php';
    
            $stmt = $conn->prepare("SELECT * FROM products WHERE tip = 'mje_alk' ORDER BY naziv ASC");
            $stmt->execute();
            $result = $stmt->get_result();
            $i = 0; $boja = 'rgb(32, 116, 15)';

            $drop_mess = NULL;
            while($row = $result->fetch_assoc()):
                $id = $row['id'];
                $naziv = $row['naziv'];
                $cijena = $row['cijena'];
        ?>
        <form action="" method="post">
            <tr style="background-color: <?= $boja ?>">
                <input type="hidden" name="id" value="<?=$id?>">
                <td><?= $naziv ?><?php echo $drop_mess ?></td>
                <td><?= $cijena . ' kn' ?></td>
                <td><?= $row['količina'] ?></td>
            </tr>
        </form>
        <?php
            if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';}
            else{ $i = 0; $boja = 'rgb(32, 116, 15)';}
            endwhile;
        ?>
        </table>
        <br>
        <center><hr class='mb-3'></center>
        <br>

    <footer id="footer_index">
        <h5><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h55>
    </footer>
</body>
</html>