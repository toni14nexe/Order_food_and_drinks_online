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
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="600;url=./note_pages/odjava.php?auto_odjava"/>

    <link href="./assets/img/logo.png" rel="icon">

    <title>Dublin's Pub - <?= $username_mess ?> - Ponuda</title>

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="./assets/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./assets/js/smooth-scroll.polyfills.min.js"></script>
    <link href="./assets/css/style.css" rel="stylesheet">
    <link href="./assets/css/products_style.css" rel="stylesheet">   
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

<body onload="window.open(url, '_blank');">
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
                                    <a class="nav-link" href="user_ind.php#onama" style="color: #f2f2f2;">O nama</a>
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

    <br><br>



        <center><hr class='mb-3'></center>
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
        <section id='topli'>
        <center><hr class='mb-3'></center>




    <!-- TOPLI NAPITCI -->
    
    <h3 style="color: white;"><b>Topli napitci</b></h3></section>
    <table class="products_table">
        <tr style="background-color: rgb(12, 51, 1);">
            <td>NAZIV</td>
            <td>CIJENA</td>
            <td>KOL</td>
            <td>KOM</td>
            <td>DODAJ</td>
        </tr>
    <?php
        $zal1 = NULL;
        $zal2 = NULL;
        $toc_min = NULL;
        $toc_belje = NULL;
        $toc_bitter = NULL;
        $toc_cola = NULL;
        $toc_frank = NULL;
        $toc_juice = NULL;
        $toc_kut = NULL;
        $toc_sprite = NULL;
        $toc_tang = NULL;
        $toc_tonic = NULL;

        function topli() {
            echo '<meta http-equiv="refresh" content="0;url=narudzba.php#topli"/>';
        }if (isset($_GET['topli'])) {
            topli();
        }

        include './quick_php/mysql.php';

        $stmt = $conn->prepare("SELECT * FROM products WHERE tip = 'topli' ORDER BY naziv ASC");
        $stmt->execute();
        $result = $stmt->get_result();
        $i = 0; $boja = 'rgb(32, 116, 15)';

        if(isset($_POST['create'])){
            $id = $_POST['id'];
            $kol = $_POST['kol'];

            //opis
            $opis = NULL;
            if($id == 11){ $opis = $_POST['opis_kava']; }
            if($id == 12){ $opis = $_POST['opis_kava_mlijeko']; }
            if($id == 13){ $opis = $_POST['opis_kava_šlag']; }
            if($id == 14){ $opis = $_POST['opis_kava_mlijeko_šlag']; }
            if($id == 20){ $opis = $_POST['opis_čaj']; }
            if($id == 21){ $opis = $_POST['opis_čaj_med']; }
            if($id == 1){ $opis = $_POST['opis_bezkofeinska']; }
            if($id == 40){ $opis = $_POST['opis_cappucinno']; }



            while($row = $result->fetch_assoc()){
                if($id == $row['id']){
                    $naziv = $row['naziv'].' '.$opis;
                    $cijena = $row['cijena'];


                    //za id kave
                    if($opis == 'espresso' && $id == 11){ $id=10000; }
                    if($opis == 'produžena' && $id == 11){ $id=10001; }
                    if($opis == 'americanno' && $id == 11){ $id=10002; }
                    if($opis == 'stretto' && $id == 11){ $id=10003; }
                    if($opis == 'velika s toplim' && $id == 12){ $id=10004; }
                    if($opis == 'velika s hladnim' && $id == 12){ $id=10005; }
                    if($opis == 'mala s toplim' && $id == 12){ $id=10006; }
                    if($opis == 'mala s hladnim' && $id == 12){ $id=10007; }
                    if($opis == 'velika' && $id == 13){ $id=10008; }
                    if($opis == 'mala' && $id == 13){ $id=10009; }
                    if($opis == 'velika s toplim' && $id == 14){ $id=10010; }
                    if($opis == 'velika s hladnim' && $id == 14){ $id=10011; }
                    if($opis == 'mala s toplim' && $id == 14){ $id=10012; }
                    if($opis == 'mala s hladnim' && $id == 14){ $id=10013; }
                    //za id čaja
                    if($opis == 'kamilica' && $id == 20){ $id=11000; $naziv = 'Čaj '.$opis;}
                    if($opis == 'menta' && $id == 20){ $id=11001; $naziv = 'Čaj '.$opis;}
                    if($opis == 'jabuka-cimet' && $id == 20){ $id=11002; $naziv = 'Čaj '.$opis;}
                    if($opis == 'borovnica' && $id == 20){ $id=11003; $naziv = 'Čaj '.$opis;}
                    if($opis == 'jagoda-vanilija' && $id == 20){ $id=11004; $naziv = 'Čaj '.$opis;}
                    if($opis == 'zeleni' && $id == 20){ $id=11005; $naziv = 'Čaj '.$opis;}
                    if($opis == 'crni' && $id == 20){ $id=11006; $naziv = 'Čaj '.$opis;}
                    //za id čaja s medom
                    if($opis == 'kamilica' && $id == 21){ $id=11007;  $naziv = 'Čaj s medom '.$opis; $cijena = 10;}
                    if($opis == 'menta' && $id == 21){ $id=11008;  $naziv = 'Čaj s medom '.$opis; $cijena = 10;}
                    if($opis == 'jabuka-cimet' && $id == 21){ $id=11009;  $naziv = 'Čaj s medom '.$opis; $cijena = 10;}
                    if($opis == 'borovnica' && $id == 21){ $id=110010;  $naziv = 'Čaj s medom '.$opis; $cijena = 10;}
                    if($opis == 'jagoda-vanilija' && $id == 21){ $id=11011;  $naziv = 'Čaj s medom '.$opis; $cijena = 10;}
                    if($opis == 'zeleni' && $id == 21){ $id=11012;  $naziv = 'Čaj s medom '.$opis; $cijena = 10;}
                    if($opis == 'crni' && $id == 21){ $id=11013;  $naziv = 'Čaj s medom '.$opis; $cijena = 10;}
                    //za id bezkofeinske
                    if($opis == 'velika s toplim' && $id == 1){ $id=10020;  $naziv = 'Bezkofeinska '.$opis;}
                    if($opis == 'velika s hladnim' && $id == 1){ $id=10021;  $naziv = 'Bezkofeinska '.$opis;}
                    if($opis == 'velika sa šlagom' && $id == 1){ $id=10022;  $naziv = 'Bezkofeinska '.$opis;}
                    if($opis == 'mala s toplim' && $id == 1){ $id=10023;  $naziv = 'Bezkofeinska '.$opis;}
                    if($opis == 'mala s hladnim' && $id == 1){ $id=10024;  $naziv = 'Bezkofeinska '.$opis;}
                    if($opis == 'mala sa šlagom' && $id == 1){ $id=10025;  $naziv = 'Bezkofeinska '.$opis;}
                    //za id cappucinna
                    if($opis == 'classic' && $id == 40){ $id=11040; $naziv = 'Cappucinno '.$opis;}
                    if($opis == 'čokolada' && $id == 40){ $id=11041; $naziv = 'Cappucinno '.$opis;}
                    if($opis == 'vanilija' && $id == 40){ $id=11042; $naziv = 'Cappucinno '.$opis;}
                    if($opis == 'bananacinno' && $id == 40){ $id=11043; $naziv = 'Cappucinno '.$opis;}
                    if($opis == 'kokos-bij.čok' && $id == 40){ $id=11044; $naziv = 'Cappucinno '.$opis;}
                    if($opis == 'irish' && $id == 40){ $id=11045; $naziv = 'Cappucinno '.$opis;}
                    if($opis == 'lješnjak' && $id == 40){ $id=11046; $naziv = 'Cappucinno '.$opis;}



                    $cijena = $cijena * $kol;
                    $sql = "CREATE TABLE $username_mess (
                        id int PRIMARY KEY,
                        naziv VARCHAR(50) UNIQUE KEY,
                        količina INT NOT NULL,
                        cijena DECIMAL(11,2) NOT NULL,
                        opis VARCHAR(50) NULL);
                        ";
                    if(mysqli_query($link, $sql)){ //ako ne postoji
                        $sql = "INSERT INTO $username_mess (id, naziv, količina, cijena) VALUES(?,?,?,?);";
                        $stmtinsert = $db->prepare($sql);
                        $stmtinsert->execute([$id, $naziv, $kol, $cijena]);
                        echo '<meta http-equiv="refresh" content="0;url=narudzba.php?topli=true"/>';
                    }else{ //ako već postoji
                        $stmt = $conn->prepare("SELECT * FROM $username_mess");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $postoji = false;
                        while($row = $result->fetch_assoc()){
                            if($id == $row['id']){
                                $postoji = true;
                                $uk_kol = $kol + $row['količina'];
                                $uk_cijena = $cijena + $row['cijena'];
                                break;
                            }
                        }
                        if($postoji == false){
                            $sql = "INSERT INTO $username_mess (id, naziv, količina, cijena) VALUES(?,?,?,?);";
                            $stmtinsert = $db->prepare($sql);
                            $stmtinsert->execute([$id, $naziv, $kol, $cijena]);
                        }else{
                            $sql = "UPDATE $username_mess SET količina = $uk_kol WHERE id = $id;";
                            if ($conn->query($sql) === TRUE) {
                                $sql = "UPDATE $username_mess SET cijena = $uk_cijena WHERE id = $id;";
                                    if ($conn->query($sql) === TRUE){}
                            }
                        }
                        echo '<meta http-equiv="refresh" content="0;url=narudzba.php?topli=true"/>';
                        $postoji = false;
                    }
                }
            }
            $kol_br = NULL;
            while($row = $result->fetch_assoc()){
                $zaliha = $row['zaliha'];
                $id = $row['id'];
                if($row['zaliha'] == 0){
                    $zaliha = 'nedostupno';
                }else{ $zaliha = 'dostupno'; }
                if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';}
                else{ $i = 0; $boja = 'rgb(32, 116, 15)';}
            }
        }

        $drop_mess = NULL;
        while($row = $result->fetch_assoc()):
            $zaliha = $row['zaliha'];
            $id = $row['id'];
            $naziv = $row['naziv'];
            $cijena = $row['cijena'];

            //preskoči čaj
            if($id > 21 && $id < 40){ $id = NULL; continue; };
            //preskoči cappucinno
            if($id > 40 && $id < 50){ $id = NULL; continue; };
            
            if($id == 11){//'kava' dropdown
                $drop_mess = '<select name="opis_kava" class="dropdown">
                    <option value="espresso">espresso</option>
                    <option value="produžena">produžena</option>
                    <option value="americanno">americanno</option>
                    <option value="stretto">stretto</option>
                </select>';
            }
            elseif($id == 12){//'kava mlijeko' dropdown
                $drop_mess = '<select name="opis_kava_mlijeko" class="dropdown">
                    <option value="velika s toplim">velika s toplim</option>
                    <option value="velika s hladnim">velika s hladnim</option>
                    <option value="mala s toplim">mala s toplim</option>
                    <option value="mala s hladnim">mala s hladnim</option>
                </select>';
            }
            elseif($id == 13){//'kava šlag' dropdown
                $drop_mess = '<select name="opis_kava_šlag" class="dropdown">
                    <option value="velika">velika</option>
                    <option value="mala">mala</option>
                </select>';
            }
            elseif($id == 14){//'kava mlijeko & šlag' dropdown
                $drop_mess = '<select name="opis_kava_mlijeko_šlag" class="dropdown">
                    <option value="velika s toplim">velika s toplim</option>
                    <option value="velika s hladnim">velika s hladnim</option>
                    <option value="mala s toplim">mala s toplim</option>
                    <option value="mala s hladnim">mala s hladnim</option>
                </select>';
            }
            elseif($id == 20){//'čaj' dropdown
                $naziv = "Čaj";
                $drop_mess = '<select name="opis_čaj" class="dropdown">
                    <option value="kamilica">kamilica</option>
                    <option value="menta">menta</option>
                    <option value="jabuka-cimet">jabuka-cimet</option>
                    <option value="borovnica">borovnica</option>
                    <option value="jagoda-vanilija">jagoda-vanilija</option>
                    <option value="zeleni">zeleni</option>
                    <option value="crni">crni</option>
                </select>';
            }
            elseif($id == 21){//'čaj s medom' dropdown
                $naziv = "Čaj s medom";
                $cijena = "10,00 ";
                $drop_mess = '<select name="opis_čaj_med" class="dropdown">
                    <option value="kamilica">kamilica</option>
                    <option value="menta">menta</option>
                    <option value="jabuka-cimet">jabuka-cimet</option>
                    <option value="borovnica">borovnica</option>
                    <option value="jagoda-vanilija">jagoda-vanilija</option>
                    <option value="zeleni">zeleni</option>
                    <option value="crni">crni</option>
                </select>';
            }
            elseif($id == 1){//'bezkofeinska kava' dropdown
                $drop_mess = '<select name="opis_bezkofeinska" class="dropdown">
                    <option value="velika s toplim">velika s toplim</option>
                    <option value="velika s hladnim">velika s hladnim</option>
                    <option value="velika sa šlagom">velika sa šlagom</option>
                    <option value="mala s toplim">mala s toplim</option>
                    <option value="mala s hladnim">mala s hladnim</option>
                    <option value="mala sa šlagom">mala sa šlagom</option>
                </select>';
            }
            elseif($id == 40){//'cappucinno' dropdown
                $naziv = "Cappucinno";
                $drop_mess = '<select name="opis_cappucinno" class="dropdown">
                    <option value="classic">classic</option>
                    <option value="čokolada">čokolada</option>
                    <option value="vanilija">vanilija</option>
                    <option value="bananacinno">bananacinno</option>
                    <option value="kokos-bij.čok">kokos-bij.čok</option>
                    <option value="irish">irish</option>
                    <option value="lješnjak">lješnjak</option>
                </select>';
            }
            else{
                $drop_mess = NULL;
            }
            
            $max = NULL;
            if($row['zaliha'] > 10){
                $max = 10;
            }else{
                $max = $row['zaliha'];
            }
            if($row['zaliha']==0){
                $kol_br = NULL;
                $btn = '<h7 style="color: red; text-decoration: underline;">nedostupno</h7>';
            }else{ 
                $kol_br = 1;
                $btn = '
                    <button type="submit" name="create" class="btn-dodaj">
                    <img class="img1 img-fix" src="./assets/img/dodaj.png">
                    <img class="img2 img-fix" src="./assets/img/dodaj-hover.png"></button>
                ';
            }
    ?>

    <form action="" method="post">
        <tr style="background-color: <?= $boja ?>">
            <input type="hidden" name="id" value="<?=$id?>">
            <td><?= $naziv ?><?php echo $drop_mess ?></td>
            <td><?= $cijena . ' kn' ?></td>
            <td><?= $row['količina'] ?></td>
            <td><input type="number" name="kol" value="<?php echo $kol_br?>" min="1" max="<?= $max ?>"
                style="width: 45px; background-color: rgb(208, 247, 201);"></td>
            <td><?php echo $btn?></td>
        </tr>
    </form>
        
    
    <?php
        if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';}
        else{ $i = 0; $boja = 'rgb(32, 116, 15)';}
        $kol_br = NULL;
        endwhile;
    ?>





    <!-- BEZALKOHOLNA PIĆA -->
    
    <table  class="products_table">
    <section id='bezalk'></section>
    <h3 style="color: white;"><b><br>Bezalkoholna pića</b></h3>
        <tr style="background-color: rgb(12, 51, 1);">
            <td>NAZIV</td>
            <td>CIJENA</td>
            <td>KOL</td>
            <td>KOM</td>
            <td>DODAJ</td>
        </tr>
    <?php
        function bezalk() {
            echo '<meta http-equiv="refresh" content="0;url=narudzba.php#bezalk"/>';
        }if (isset($_GET['bezalk'])) {
            bezalk();
        }

        include './quick_php/mysql.php';

        $stmt = $conn->prepare("SELECT * FROM products WHERE tip = 'bezalk' ORDER BY naziv ASC");
        $stmt->execute();
        $result = $stmt->get_result();
        $i = 0; $boja = 'rgb(32, 116, 15)';

        if(isset($_POST['create'])){
            $id = $_POST['id'];
            $kol = $_POST['kol'];

            //opis
            $opis = NULL;
            if($id == 73){ $opis = $_POST['opis_hidra']; }
            if($id == 56){ $opis = $_POST['opis_jana_vit']; }
            if($id == 62){ $opis = $_POST['opis_juice']; }
            if($id == 82){ $opis = $_POST['opis_juicy_vita']; }
            if($id == 58){ $opis = $_POST['opis_schweppes']; }
            if($id == 80){ $opis = $_POST['opis_jamnica']; }
            if($id == 93){ $opis = $_POST['opis_toc_cola']; }
            if($id == 94){ $opis = $_POST['opis_tur_cola']; }



            while($row = $result->fetch_assoc()){
                if($id == $row['id']){
                    $naziv = $row['naziv'];
                    $cijena = $row['cijena'];


                    //zapamtiti točene proizvode
                    if($id == 80) { $toc_min = $row['zaliha']; }
                    if($id == 93) { $toc_cola = $row['zaliha']; }
                    if($id == 62) { $toc_juice = $row['zaliha']; }
                    if($id == 54) { $toc_sprite = $row['zaliha']; }
                    if($id == 60) { $toc_tonic = $row['zaliha']; }
                    if($id == 59) { $toc_bitter = $row['zaliha']; }
                    if($id == 58) { $toc_tang = $row['zaliha']; }

                    
                    //za id hidre
                    if($opis == 'citrus' && $id == 73){ $id=73;  $naziv = 'Hidra '.$opis;}
                    if($opis == 'naranča' && $id == 73){ $id=74;  $naziv = 'Hidra '.$opis;}
                    //za id jane vitamin
                    if($opis == 'limun' && $id == 56){ $id=56;  $naziv = 'Jana vitamin '.$opis;}
                    if($opis == 'naranča' && $id == 56){ $id=57;  $naziv = 'Jana vitamin '.$opis;}
                    //za id juice
                    if($opis == 'naranča' && $id == 62){ $id=62;  $naziv = 'Juice '.$opis;}
                    if($opis == 'marelica' && $id == 62){ $id=63;  $naziv = 'Juice '.$opis;}
                    if($opis == 'jabuka' && $id == 62){ $id=64;  $naziv = 'Juice '.$opis;}
                    if($opis == 'jagoda' && $id == 62){ $id=65;  $naziv = 'Juice '.$opis;}
                    if($opis == 'crni ribizl' && $id == 62){ $id=66;  $naziv = 'Juice '.$opis;}
                    //za id juicy-vita
                    if($opis == 'naranča' && $id == 82){ $id=82;  $naziv = 'Juicy vita '.$opis;}
                    if($opis == 'limun' && $id == 82){ $id=83;  $naziv = 'Juicy vita '.$opis;}
                    if($opis == 'bazga-limun' && $id == 82){ $id=84;  $naziv = 'Juicy vita '.$opis;}
                    if($opis == 'grejp' && $id == 82){ $id=85;  $naziv = 'Juicy vita '.$opis;}
                    //za id schweppes
                    if($opis == 'tangerina' && $id == 58){ $id=58;  $naziv = 'Schweppes '.$opis;}
                    if($opis == 'bitter-lemon' && $id == 58){ $id=59;  $naziv = 'Schweppes '.$opis;}
                    if($opis == 'tonic' && $id == 58){ $id=60;  $naziv = 'Schweppes '.$opis;}
                    //za id jamnice
                    if($opis == '1,0 l' && $id == 80){ $id=11550;  $naziv = 'Jamnica mineralna '.$opis; $cijena = 20;}
                    if($opis == '0,5 l' && $id == 80){ $id=11551;  $naziv = 'Jamnica mineralna '.$opis; $cijena = 10;}
                    if($opis == '0,3 l' && $id == 80){ $id=11552;  $naziv = 'Jamnica mineralna '.$opis; $cijena = 6;}
                    if($opis == '0,2 l' && $id == 80){ $id=11553;  $naziv = 'Jamnica mineralna '.$opis; $cijena = 4;}
                    if($opis == '0,1 l' && $id == 80){ $id=11554;  $naziv = 'Jamnica mineralna '.$opis; $cijena = 2;}
                    //za id točene coca-cole
                    if($opis == '1,0 l' && $id == 93){ $id=11555;  $naziv = 'Točena Coca-Cola '.$opis; $cijena = 40;}
                    if($opis == '0,5 l' && $id == 93){ $id=11556;  $naziv = 'Točena Coca-Cola '.$opis; $cijena = 20;}
                    if($opis == '0,3 l' && $id == 93){ $id=11557;  $naziv = 'Točena Coca-Cola '.$opis; $cijena = 12;}
                    if($opis == '0,2 l' && $id == 93){ $id=11558;  $naziv = 'Točena Coca-Cola '.$opis; $cijena = 8;}
                    if($opis == '0,1 l' && $id == 93){ $id=11559;  $naziv = 'Točena Coca-Cola '.$opis; $cijena = 4;}
                    //za id turske coca-cole
                    if($opis == '0,5 l' && $id == 94){ $id=11561;  $naziv = 'Turska Coca-Cola '.$opis; $cijena = 15;}
                    if($opis == '0,3 l' && $id == 94){ $id=11562;  $naziv = 'Turska Coca-Cola '.$opis; $cijena = 9;}
                    if($opis == '0,2 l' && $id == 94){ $id=11563;  $naziv = 'Turska Coca-Cola '.$opis; $cijena = 6;}
                    


                    $cijena = $cijena * $kol;
                    $sql = "CREATE TABLE $username_mess (
                        id int PRIMARY KEY,
                        naziv VARCHAR(50) UNIQUE KEY,
                        količina DECIMAL(11,2) NOT NULL,
                        cijena DECIMAL(11,2) NOT NULL,
                        opis VARCHAR(50) NULL);
                        ";
                    if(mysqli_query($link, $sql)){ //ako ne postoji
                        $sql = "INSERT INTO $username_mess (id, naziv, količina, cijena) VALUES(?,?,?,?);";
                        $stmtinsert = $db->prepare($sql);
                        $stmtinsert->execute([$id, $naziv, $kol, $cijena]);
                        echo '<meta http-equiv="refresh" content="0;url=narudzba.php?bezalk=true"/>';
                    }else{ //ako već postoji
                        $stmt = $conn->prepare("SELECT * FROM $username_mess");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $postoji = false;
                        while($row = $result->fetch_assoc()){
                            if($id == $row['id']){
                                $postoji = true;
                                $uk_kol = $kol + $row['količina'];
                                $uk_cijena = $cijena + $row['cijena'];
                                break;
                            }
                        }
                        if($postoji == false){
                            $sql = "INSERT INTO $username_mess (id, naziv, količina, cijena) VALUES(?,?,?,?);";
                            $stmtinsert = $db->prepare($sql);
                            $stmtinsert->execute([$id, $naziv, $kol, $cijena]);
                        }else{
                            $sql = "UPDATE $username_mess SET količina = $uk_kol WHERE id = $id;";
                            if ($conn->query($sql) === TRUE) {
                                $sql = "UPDATE $username_mess SET cijena = $uk_cijena WHERE id = $id;";
                                    if ($conn->query($sql) === TRUE){}
                            }
                        }
                        echo '<meta http-equiv="refresh" content="0;url=narudzba.php?bezalk=true"/>';
                        $postoji = false;
                    }
                }
            }
            $kol_br = NULL;
            while($row = $result->fetch_assoc()){
                $zaliha = $row['zaliha'];
                $id = $row['id'];
                if($row['zaliha'] == 0){
                    $zaliha = 'nedostupno';
                }else{ $zaliha = 'dostupno'; }
                if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';}
                else{ $i = 0; $boja = 'rgb(32, 116, 15)';}
            }
        }

        $drop_mess = NULL;
        while($row = $result->fetch_assoc()):
            $zaliha = $row['zaliha'];
            $id = $row['id'];
            $naziv = $row['naziv'];
            $cijena = $row['cijena'];
            
            //preskoči hidru
            if($id == 74){ $id = NULL; continue; };
            //preskoči janu vitamin
            if($id == 57){ $id = NULL; continue; };
            //preskoči juice
            if($id > 62 && $id < 72){ $id = NULL; continue; };
            //preskoči juice
            if($id > 82 && $id < 93){ $id = NULL; continue; };
            //preskoči schweppes
            if($id > 58 && $id < 61){ $id = NULL; continue; };

            if($id == 73){//'hidra' dropdown
                $naziv = 'Hidra';
                $drop_mess = '<select name="opis_hidra" class="dropdown">
                    <option value="citrus">citrus</option>
                    <option value="naranča">naranča</option>
                </select>';
            }
            elseif($id == 56){//'jana vitamin' dropdown
                $naziv = 'Jana vitamin';
                $drop_mess = '<select name="opis_jana_vit" class="dropdown">
                    <option value="limun">limun</option>
                    <option value="naranča">naranča</option>
                </select>';
            }
            elseif($id == 62){//'juice' dropdown
                $naziv = 'Juice';
                $drop_mess = '<select name="opis_juice" class="dropdown">
                    <option value="naranča">naranča</option>
                    <option value="marelica">marelica</option>
                    <option value="jabuka">jabuka</option>
                    <option value="jagoda">jagoda</option>
                    <option value="crni ribizl">crni ribizl</option>
                </select>';
            }
            elseif($id == 82){//'juicy vita' dropdown
                $naziv = 'Juicy vita';
                $drop_mess = '<select name="opis_juicy_vita" class="dropdown">
                    <option value="naranča">naranča</option>
                    <option value="limun">limun</option>
                    <option value="bazga-limun">bazga-limun</option>
                    <option value="grejp">grejp</option>
                </select>';
            }
            elseif($id == 58){//'schweppes' dropdown
                $naziv = 'Schweppes';
                $drop_mess = '<select name="opis_schweppes" class="dropdown">
                    <option value="tangerina">tangerina</option>
                    <option value="bitter-lemon">bitter-lemon</option>
                    <option value="tonic">tonic</option>
                </select>';
            }
            elseif($id == 80){//'jamnica mineralna' dropdown
                $drop_mess = '<select name="opis_jamnica" class="dropdown">
                    <option value="1,0 l">1,0 l</option>
                    <option value="0,5 l">0,5 l</option>
                    <option value="0,3 l">0,3 l</option>
                    <option value="0,2 l">0,2 l</option>
                    <option value="0,1 l">0,1 l</option>
                </select>';
            }
            elseif($id == 93){//'točena coca-cola' dropdown
                $drop_mess = '<select name="opis_toc_cola" class="dropdown">
                    <option value="1,0 l">1,0 l</option>
                    <option value="0,5 l">0,5 l</option>
                    <option value="0,3 l">0,3 l</option>
                    <option value="0,2 l">0,2 l</option>
                    <option value="0,1 l">0,1 l</option>
                </select>';
            }
            elseif($id == 94){//'turska coca-cola' dropdown
                $drop_mess = '<select name="opis_tur_cola" class="dropdown">
                    <option value="0,5 l">0,5 l</option>
                    <option value="0,3 l">0,3 l</option>
                    <option value="0,2 l">0,2 l</option>
                </select>';
            }
            else{
                $drop_mess = NULL;
            }

            $max = NULL;
            if($row['zaliha'] > 10){
                $max = 10;
            }else{
                $max = $row['zaliha'];
            }
            if($row['zaliha']==0){
                $kol_br = NULL;
                $btn = '<h7 style="color: red; text-decoration: underline;">nedostupno</h7>';
            }else{ 
                $kol_br = 1;
                $btn = '
                    <button type="submit" name="create" class="btn-dodaj">
                    <img class="img1 img-fix" src="./assets/img/dodaj.png">
                    <img class="img2 img-fix" src="./assets/img/dodaj-hover.png"></button>
                ';
            }
    ?>

    <form action="" method="post">
        <tr style="background-color: <?= $boja ?>">
            <input type="hidden" name="id" value="<?=$id?>">
            <td><?= $naziv ?><?php echo $drop_mess ?></td>
            <td><?= $cijena . ' kn' ?></td>
            <td><?= $row['količina'] ?></td>
            <td><input type="number" name="kol" value="<?php echo $kol_br?>" min="1" max="<?= $max ?>"
                style="width: 45px; background-color: rgb(208, 247, 201);"></td>
            <td><?php echo $btn?></td>
        </tr>
    </form>
    
    
    <?php
        if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';}
        else{ $i = 0; $boja = 'rgb(32, 116, 15)';}
        $kol_br = NULL;
        endwhile;
    ?>





    <!-- PIVA I CIDERI -->
    
    <table  class="products_table">
    <section id='piva'></section>
    <h3 style="color: white;"><b><br>Piva i cideri</b></h3>
        <tr style="background-color: rgb(12, 51, 1);">
            <td>NAZIV</td>
            <td>CIJENA</td>
            <td>KOL</td>
            <td>KOM</td>
            <td>DODAJ</td>
        </tr>
    <?php
        function piva() {
            echo '<meta http-equiv="refresh" content="0;url=narudzba.php#piva"/>';
        }if (isset($_GET['piva'])) {
            piva();
        }

        include './quick_php/mysql.php';

        $stmt = $conn->prepare("SELECT * FROM products WHERE tip = 'pivo' ORDER BY naziv ASC");
        $stmt->execute();
        $result = $stmt->get_result();
        $i = 0; $boja = 'rgb(32, 116, 15)';

        if(isset($_POST['create'])){
            $id = $_POST['id'];
            $kol = $_POST['kol'];

            //opis
            $opis = NULL;
            if($id == 102){ $opis = $_POST['opis_somersby']; }



            while($row = $result->fetch_assoc()){
                if($id == $row['id']){
                    $naziv = $row['naziv'];
                    $cijena = $row['cijena'];


                    
                    //za id somersby
                    if($opis == 'jabuka' && $id == 102){ $id=102;  $naziv = 'Somersby '.$opis;}
                    if($opis == 'lubenica' && $id == 102){ $id=103;  $naziv = 'Somersby '.$opis;}
                    


                    $cijena = $cijena * $kol;
                    $sql = "CREATE TABLE $username_mess (
                        id int PRIMARY KEY,
                        naziv VARCHAR(50) UNIQUE KEY,
                        količina DECIMAL(11,2) NOT NULL,
                        cijena DECIMAL(11,2) NOT NULL,
                        opis VARCHAR(50) NULL);
                        ";
                    if(mysqli_query($link, $sql)){ //ako ne postoji
                        $sql = "INSERT INTO $username_mess (id, naziv, količina, cijena) VALUES(?,?,?,?);";
                        $stmtinsert = $db->prepare($sql);
                        $stmtinsert->execute([$id, $naziv, $kol, $cijena]);
                        echo '<meta http-equiv="refresh" content="0;url=narudzba.php?piva=true"/>';
                    }else{ //ako već postoji
                        $stmt = $conn->prepare("SELECT * FROM $username_mess");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $postoji = false;
                        while($row = $result->fetch_assoc()){
                            if($id == $row['id']){
                                $postoji = true;
                                $uk_kol = $kol + $row['količina'];
                                $uk_cijena = $cijena + $row['cijena'];
                                break;
                            }
                        }
                        if($postoji == false){
                            $sql = "INSERT INTO $username_mess (id, naziv, količina, cijena) VALUES(?,?,?,?);";
                            $stmtinsert = $db->prepare($sql);
                            $stmtinsert->execute([$id, $naziv, $kol, $cijena]);
                        }else{
                            $sql = "UPDATE $username_mess SET količina = $uk_kol WHERE id = $id;";
                            if ($conn->query($sql) === TRUE) {
                                $sql = "UPDATE $username_mess SET cijena = $uk_cijena WHERE id = $id;";
                                    if ($conn->query($sql) === TRUE){}
                            }
                        }
                        echo '<meta http-equiv="refresh" content="0;url=narudzba.php?piva=true"/>';
                        $postoji = false;
                    }
                }
            }
            $kol_br = NULL;
            while($row = $result->fetch_assoc()){
                $zaliha = $row['zaliha'];
                $id = $row['id'];
                if($row['zaliha'] == 0){
                    $zaliha = 'nedostupno';
                }else{ $zaliha = 'dostupno'; }
                if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';}
                else{ $i = 0; $boja = 'rgb(32, 116, 15)';}
            }
        }

        $drop_mess = NULL;
        while($row = $result->fetch_assoc()):
            $zaliha = $row['zaliha'];
            $id = $row['id'];
            $naziv = $row['naziv'];
            $cijena = $row['cijena'];
            
            //preskoči somersby
            if($id == 103){ $id = NULL; continue; };

            if($id == 102){//'somersby' dropdown
                $naziv = 'Somersby';
                $drop_mess = '<select name="opis_somersby" class="dropdown">
                    <option value="jabuka">jabuka</option>
                    <option value="lubenica">lubenica</option>
                </select>';
            }
            else{
                $drop_mess = NULL;
            }

            $max = NULL;
            if($row['zaliha'] > 10){
                $max = 10;
            }else{
                $max = $row['zaliha'];
            }
            if($row['zaliha']==0){
                $kol_br = NULL;
                $btn = '<h7 style="color: red; text-decoration: underline;">nedostupno</h7>';
            }else{ 
                $kol_br = 1;
                $btn = '
                    <button type="submit" name="create" class="btn-dodaj">
                    <img class="img1 img-fix" src="./assets/img/dodaj.png">
                    <img class="img2 img-fix" src="./assets/img/dodaj-hover.png"></button>
                ';
            }
    ?>

    <form action="" method="post">
        <tr style="background-color: <?= $boja ?>">
            <input type="hidden" name="id" value="<?=$id?>">
            <td><?= $naziv ?><?php echo $drop_mess ?></td>
            <td><?= $cijena . ' kn' ?></td>
            <td><?= $row['količina'] ?></td>
            <td><input type="number" name="kol" value="<?php echo $kol_br?>" min="1" max="<?= $max ?>"
                style="width: 45px; background-color: rgb(208, 247, 201);"></td>
            <td><?php echo $btn?></td>
        </tr>
    </form>
    
    
    <?php
        if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';}
        else{ $i = 0; $boja = 'rgb(32, 116, 15)';}
        $kol_br = NULL;
        endwhile;
    ?>





<!-- VINA -->
    
<table  class="products_table">
    <section id='vina'></section>
    <h3 style="color: white;"><b><br>Vina</b></h3>
        <tr style="background-color: rgb(12, 51, 1);">
            <td>NAZIV</td>
            <td>CIJENA</td>
            <td>KOL</td>
            <td>KOM</td>
            <td>DODAJ</td>
        </tr>
    <?php
        function vina() {
            echo '<meta http-equiv="refresh" content="0;url=narudzba.php#vina"/>';
        }if (isset($_GET['vina'])) {
            vina();
        }

        include './quick_php/mysql.php';

        $stmt = $conn->prepare("SELECT * FROM products WHERE tip = 'vina' ORDER BY naziv ASC");
        $stmt->execute();
        $result = $stmt->get_result();
        $i = 0; $boja = 'rgb(32, 116, 15)';

        if(isset($_POST['create'])){
            $id = $_POST['id'];
            $kol = $_POST['kol'];

            //opis
            $opis = NULL;
            if($id == 201){ $opis = $_POST['opis_grasbelje']; }
            if($id == 202){ $opis = $_POST['opis_graskutjevo']; }
            if($id == 203){ $opis = $_POST['opis_frankbelje']; }



            while($row = $result->fetch_assoc()){
                if($id == $row['id']){
                    $naziv = $row['naziv'];
                    $cijena = $row['cijena'];

                    
                    //za id graševine belje
                    if($opis == '1,0 l' && $id == 201){ $id=11500;  $naziv = 'Graševina Belje '.$opis;}
                    if($opis == '0,2 l' && $id == 201){ $id=11501;  $naziv = 'Graševina Belje '.$opis; $cijena = 14;}
                    if($opis == '0,1 l' && $id == 201){ $id=11502;  $naziv = 'Graševina Belje '.$opis; $cijena = 7;}
                    //za id graševine kutjevo
                    if($opis == '1,0 l' && $id == 202){ $id=11503;  $naziv = 'Graševina Kutjevo '.$opis;}
                    if($opis == '0,2 l' && $id == 202){ $id=11504;  $naziv = 'Graševina Kutjevo '.$opis; $cijena = 16;}
                    if($opis == '0,1 l' && $id == 202){ $id=11505;  $naziv = 'Graševina Kutjevo '.$opis; $cijena = 8;}
                    //za id frankovke belje
                    if($opis == '1,0 l' && $id == 203){ $id=11506;  $naziv = 'Frankovka Belje '.$opis;}
                    if($opis == '0,2 l' && $id == 203){ $id=11507;  $naziv = 'Frankovka Belje '.$opis; $cijena = 14;}
                    if($opis == '0,1 l' && $id == 203){ $id=11508;  $naziv = 'Frankovka Belje '.$opis; $cijena = 7;}


                    $cijena = $cijena * $kol;
                    $sql = "CREATE TABLE $username_mess (
                        id int PRIMARY KEY,
                        naziv VARCHAR(50) UNIQUE KEY,
                        količina DECIMAL(11,2) NOT NULL,
                        cijena DECIMAL(11,2) NOT NULL,
                        opis VARCHAR(50) NULL);
                        ";
                    if(mysqli_query($link, $sql)){ //ako ne postoji
                        $sql = "INSERT INTO $username_mess (id, naziv, količina, cijena) VALUES(?,?,?,?);";
                        $stmtinsert = $db->prepare($sql);
                        $stmtinsert->execute([$id, $naziv, $kol, $cijena]);
                        echo '<meta http-equiv="refresh" content="0;url=narudzba.php?vina=true"/>';
                    }else{ //ako već postoji
                        $stmt = $conn->prepare("SELECT * FROM $username_mess");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $postoji = false;
                        while($row = $result->fetch_assoc()){
                            if($id == $row['id']){
                                $postoji = true;
                                $uk_kol = $kol + $row['količina'];
                                $uk_cijena = $cijena + $row['cijena'];
                                break;
                            }
                        }
                        if($postoji == false){
                            $sql = "INSERT INTO $username_mess (id, naziv, količina, cijena) VALUES(?,?,?,?);";
                            $stmtinsert = $db->prepare($sql);
                            $stmtinsert->execute([$id, $naziv, $kol, $cijena]);
                        }else{
                            $sql = "UPDATE $username_mess SET količina = $uk_kol WHERE id = $id;";
                            if ($conn->query($sql) === TRUE) {
                                $sql = "UPDATE $username_mess SET cijena = $uk_cijena WHERE id = $id;";
                                    if ($conn->query($sql) === TRUE){}
                            }
                        }
                        echo '<meta http-equiv="refresh" content="0;url=narudzba.php?vina=true"/>';
                        $postoji = false;
                    }
                }
            }
            $kol_br = NULL;
            while($row = $result->fetch_assoc()){
                $zaliha = $row['zaliha'];
                $id = $row['id'];
                if($row['zaliha'] == 0){
                    $zaliha = 'nedostupno';
                }else{ $zaliha = 'dostupno'; }
                if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';}
                else{ $i = 0; $boja = 'rgb(32, 116, 15)';}
            }
        }

        $drop_mess = NULL;
        while($row = $result->fetch_assoc()):
            $zaliha = $row['zaliha'];
            $id = $row['id'];
            $naziv = $row['naziv'];
            $cijena = $row['cijena'];

            if($id == 201){//'graševina belje' dropdown
                $drop_mess = '<select name="opis_grasbelje" class="dropdown">
                    <option value="1,0 l">1,0 l</option>
                    <option value="0,2 l">0,2 l</option>
                    <option value="0,1 l">0,1 l</option>
                </select>';
            }
            elseif($id == 202){//'graševina kutjevo' dropdown
                $drop_mess = '<select name="opis_graskutjevo" class="dropdown">
                    <option value="1,0 l">1,0 l</option>
                    <option value="0,2 l">0,2 l</option>
                    <option value="0,1 l">0,1 l</option>
                </select>';
            }
            elseif($id == 203){//'frankovka belje' dropdown
                $drop_mess = '<select name="opis_frankbelje" class="dropdown">
                    <option value="1,0 l">1,0 l</option>
                    <option value="0,2 l">0,2 l</option>
                    <option value="0,1 l">0,1 l</option>
                </select>';
            }
            else{
                $drop_mess = NULL;
            }

            $max = NULL;
            if($row['zaliha'] > 10){
                $max = 10;
            }else{
                $max = $row['zaliha'];
            }
            if($row['zaliha']==0){
                $kol_br = NULL;
                $btn = '<h7 style="color: red; text-decoration: underline;">nedostupno</h7>';
            }else{ 
                $kol_br = 1;
                $btn = '
                    <button type="submit" name="create" class="btn-dodaj">
                    <img class="img1 img-fix" src="./assets/img/dodaj.png">
                    <img class="img2 img-fix" src="./assets/img/dodaj-hover.png"></button>
                ';
            }
    ?>

    <form action="" method="post">
        <tr style="background-color: <?= $boja ?>">
            <input type="hidden" name="id" value="<?=$id?>">
            <td><?= $naziv ?><?php echo $drop_mess ?></td>
            <td><?= $cijena . ' kn' ?></td>
            <td><?= $row['količina'] ?></td>
            <td><input type="number" name="kol" value="<?php echo $kol_br?>" min="1" max="<?= $max ?>"
                style="width: 45px; background-color: rgb(208, 247, 201);"></td>
            <td><?php echo $btn?></td>
        </tr>
    </form>
    
    
    <?php
        if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';}
        else{ $i = 0; $boja = 'rgb(32, 116, 15)';}
        $kol_br = NULL;
        endwhile;
    ?>





    <!-- JAKA ALKOHOLNA PIĆA -->
    
    <table  class="products_table">
    <section id='alk'></section>
    <h3 style="color: white;"><b><br>Jaka alkoholna pića</b></h3>
        <tr style="background-color: rgb(12, 51, 1);">
            <td>NAZIV</td>
            <td>CIJENA</td>
            <td>KOL</td>
            <td>KOM</td>
            <td>DODAJ</td>
        </tr>
    <?php
        function alk() {
            echo '<meta http-equiv="refresh" content="0;url=narudzba.php#alk"/>';
        }if (isset($_GET['alk'])) {
            alk();
        }

        include './quick_php/mysql.php';

        $stmt = $conn->prepare("SELECT * FROM products WHERE tip = 'alk' ORDER BY naziv ASC");
        $stmt->execute();
        $result = $stmt->get_result();
        $i = 0; $boja = 'rgb(32, 116, 15)';

        if(isset($_POST['create'])){
            $id = $_POST['id'];
            $kol = $_POST['kol'];

            //opis
            $opis = NULL;
            if($id == 148){ $opis = $_POST['opis_rakija']; }



            while($row = $result->fetch_assoc()){
                if($id == $row['id']){
                    $naziv = $row['naziv'];
                    $cijena = $row['cijena'];


                    
                    //za id rakije
                    if($opis == 'šljivovica' && $id == 148){ $id=148;  $naziv = 'Rakija '.$opis;}
                    if($opis == 'medica' && $id == 148){ $id=149;  $naziv = 'Rakija '.$opis;}
                    if($opis == 'travarica' && $id == 148){ $id=150;  $naziv = 'Rakija '.$opis;}
                    if($opis == 'komovica' && $id == 148){ $id=151;  $naziv = 'Rakija '.$opis;}
                    if($opis == 'višnjevac' && $id == 148){ $id=152;  $naziv = 'Rakija '.$opis;}
                    if($opis == 'orahovac' && $id == 148){ $id=153;  $naziv = 'Rakija '.$opis;}


                    $cijena = $cijena * $kol;
                    $sql = "CREATE TABLE $username_mess (
                        id int PRIMARY KEY,
                        naziv VARCHAR(50) UNIQUE KEY,
                        količina DECIMAL(11,2) NOT NULL,
                        cijena DECIMAL(11,2) NOT NULL,
                        opis VARCHAR(50) NULL);
                        ";
                    if(mysqli_query($link, $sql)){ //ako ne postoji
                        $sql = "INSERT INTO $username_mess (id, naziv, količina, cijena) VALUES(?,?,?,?);";
                        $stmtinsert = $db->prepare($sql);
                        $stmtinsert->execute([$id, $naziv, $kol, $cijena]);
                        echo '<meta http-equiv="refresh" content="0;url=narudzba.php?alk=true"/>';
                    }else{ //ako već postoji
                        $stmt = $conn->prepare("SELECT * FROM $username_mess");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $postoji = false;
                        while($row = $result->fetch_assoc()){
                            if($id == $row['id']){
                                $postoji = true;
                                $uk_kol = $kol + $row['količina'];
                                $uk_cijena = $cijena + $row['cijena'];
                                break;
                            }
                        }
                        if($postoji == false){
                            $sql = "INSERT INTO $username_mess (id, naziv, količina, cijena) VALUES(?,?,?,?);";
                            $stmtinsert = $db->prepare($sql);
                            $stmtinsert->execute([$id, $naziv, $kol, $cijena]);
                        }else{
                            $sql = "UPDATE $username_mess SET količina = $uk_kol WHERE id = $id;";
                            if ($conn->query($sql) === TRUE) {
                                $sql = "UPDATE $username_mess SET cijena = $uk_cijena WHERE id = $id;";
                                    if ($conn->query($sql) === TRUE){}
                            }
                        }
                        echo '<meta http-equiv="refresh" content="0;url=narudzba.php?alk=true"/>';
                        $postoji = false;
                    }
                }
            }
            $kol_br = NULL;
            while($row = $result->fetch_assoc()){
                $zaliha = $row['zaliha'];
                $id = $row['id'];
                if($row['zaliha'] == 0){
                    $zaliha = 'nedostupno';
                }else{ $zaliha = 'dostupno'; }
                if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';}
                else{ $i = 0; $boja = 'rgb(32, 116, 15)';}
            }
        }

        $drop_mess = NULL;
        while($row = $result->fetch_assoc()):
            $zaliha = $row['zaliha'];
            $id = $row['id'];
            $naziv = $row['naziv'];
            $cijena = $row['cijena'];
            
            //preskoči rakiju
            if($id > 148 && $id < 154){ $id = NULL; continue; };

            if($id == 148){//'rakija' dropdown
                $naziv = 'Rakija';
                $drop_mess = '<select name="opis_rakija" class="dropdown">
                    <option value="šljivovica">šljivovica</option>
                    <option value="medica">medica</option>
                    <option value="travarica">travarica</option>
                    <option value="komovica">komovica</option>
                    <option value="višnjevac">višnjevac</option>
                    <option value="orahovac">orahovac</option>
                </select>';
            }
            else{
                $drop_mess = NULL;
            }

            $max = NULL;
            if($row['zaliha'] > 10){
                $max = 10;
            }else{
                $max = $row['zaliha'];
            }
            if($row['zaliha']==0){
                $kol_br = NULL;
                $btn = '<h7 style="color: red; text-decoration: underline;">nedostupno</h7>';
            }else{ 
                $kol_br = 1;
                $btn = '
                    <button type="submit" name="create" class="btn-dodaj">
                    <img class="img1 img-fix" src="./assets/img/dodaj.png">
                    <img class="img2 img-fix" src="./assets/img/dodaj-hover.png"></button>
                ';
            }
    ?>

    <form action="" method="post">
        <tr style="background-color: <?= $boja ?>">
            <input type="hidden" name="id" value="<?=$id?>">
            <td><?= $naziv ?><?php echo $drop_mess ?></td>
            <td><?= $cijena . ' kn' ?></td>
            <td><?= $row['količina'] ?></td>
            <td><input type="number" name="kol" value="<?php echo $kol_br?>" min="1" max="<?= $max ?>"
                style="width: 45px; background-color: rgb(208, 247, 201);"></td>
            <td><?php echo $btn?></td>
        </tr>
    </form>
    
    
    <?php
        if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';}
        else{ $i = 0; $boja = 'rgb(32, 116, 15)';}
        $kol_br = NULL;
        endwhile;
    ?>






    <!-- MIJEŠANA ALKOHOLNA PIĆA -->
    
    <table  class="products_table">
    <section id='mje_alk'></section>
    <h3 style="color: white;"><b><br>Miješana alkoholna pića</b></h3>
        <tr style="background-color: rgb(12, 51, 1);">
            <td>NAZIV</td>
            <td>CIJENA</td>
            <td>KOL</td>
            <td>KOM</td>
            <td>DODAJ</td>
        </tr>
    <?php
        function mje_alk() {
            echo '<meta http-equiv="refresh" content="0;url=narudzba.php#mje_alk"/>';
        }if (isset($_GET['mje_alk'])) {
            mje_alk();
        }

        include './quick_php/mysql.php';

        $stmt = $conn->prepare("SELECT * FROM products WHERE tip = 'mje_alk' ORDER BY naziv ASC");
        $stmt->execute();
        $result = $stmt->get_result();
        $i = 0; $boja = 'rgb(32, 116, 15)';

        if(isset($_POST['create'])){
            $id = $_POST['id'];
            $kol = $_POST['kol'];

            //opis
            $opis = NULL;
            if($id == 314){ $opis = $_POST['opis_gin']; }


            while($row = $result->fetch_assoc()){
                if($id == $row['id']){
                    $naziv = $row['naziv'];
                    $cijena = $row['cijena'];
                    

                    //za id gina
                    if($opis == 'tonic' && $id == 314){ $id=314;  $naziv = 'Gin '.$opis;}
                    if($opis == 'bitter-lemon' && $id == 314){ $id=315;  $naziv = 'Gin '.$opis;}
                    if($opis == 'tangerina' && $id == 314){ $id=316;  $naziv = 'Gin '.$opis;}


                    $cijena = $cijena * $kol;
                    $sql = "CREATE TABLE $username_mess (
                        id int PRIMARY KEY,
                        naziv VARCHAR(50) UNIQUE KEY,
                        količina DECIMAL(11,2) NOT NULL,
                        cijena DECIMAL(11,2) NOT NULL,
                        opis VARCHAR(50) NULL);
                        ";
                    if(mysqli_query($link, $sql)){ //ako ne postoji
                        $sql = "INSERT INTO $username_mess (id, naziv, količina, cijena) VALUES(?,?,?,?);";
                        $stmtinsert = $db->prepare($sql);
                        $stmtinsert->execute([$id, $naziv, $kol, $cijena]);
                        echo '<meta http-equiv="refresh" content="0;url=narudzba.php?mje_alk=true"/>';
                    }else{ //ako već postoji
                        $stmt = $conn->prepare("SELECT * FROM $username_mess");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $postoji = false;
                        while($row = $result->fetch_assoc()){
                            if($id == $row['id']){
                                $postoji = true;
                                $uk_kol = $kol + $row['količina'];
                                $uk_cijena = $cijena + $row['cijena'];
                                break;
                            }
                        }
                        if($postoji == false){
                            $sql = "INSERT INTO $username_mess (id, naziv, količina, cijena) VALUES(?,?,?,?);";
                            $stmtinsert = $db->prepare($sql);
                            $stmtinsert->execute([$id, $naziv, $kol, $cijena]);
                        }else{
                            $sql = "UPDATE $username_mess SET količina = $uk_kol WHERE id = $id;";
                            if ($conn->query($sql) === TRUE) {
                                $sql = "UPDATE $username_mess SET cijena = $uk_cijena WHERE id = $id;";
                                    if ($conn->query($sql) === TRUE){}
                            }
                        }
                        echo '<meta http-equiv="refresh" content="0;url=narudzba.php?mje_alk=true"/>';
                        $postoji = false;
                    }
                }
            }
            $kol_br = NULL;
            while($row = $result->fetch_assoc()){
                $zaliha = $row['zaliha'];
                $id = $row['id'];
                if($row['zaliha'] == 0){
                    $zaliha = 'nedostupno';
                }else{ $zaliha = 'dostupno'; }
                if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';}
                else{ $i = 0; $boja = 'rgb(32, 116, 15)';}
            }
        }

        $drop_mess = NULL;
        while($row = $result->fetch_assoc()):
            $zaliha = $row['zaliha'];
            $id = $row['id'];
            $naziv = $row['naziv'];
            $cijena = $row['cijena'];

            //preskoči gin
            if($id == 315 || $id == 316){ $id = NULL; continue; };

            if($id == 314){//'rakija' dropdown
                $naziv = 'Gin';
                $drop_mess = '<select name="opis_gin" class="dropdown">
                    <option value="tonic">tonic</option>
                    <option value="bitter-lemon">bitter-lemon</option>
                    <option value="tangerina">tangerina</option>
                </select>';
            }
            else{
                $drop_mess = NULL;
            }

            $max = NULL;
            if($row['zaliha'] > 10){
                $max = 10;
            }else{
                $max = $row['zaliha'];
            }
            if($row['zaliha']==0){
                $kol_br = NULL;
                $btn = '<h7 style="color: red; text-decoration: underline;">nedostupno</h7>';
            }else{ 
                $kol_br = 1;
                $btn = '
                    <button type="submit" name="create" class="btn-dodaj">
                    <img class="img1 img-fix" src="./assets/img/dodaj.png">
                    <img class="img2 img-fix" src="./assets/img/dodaj-hover.png"></button>
                ';
            }
    ?>

    <form action="" method="post">
        <tr style="background-color: <?= $boja ?>">
            <input type="hidden" name="id" value="<?=$id?>">
            <td><?= $naziv ?><?php echo $drop_mess ?></td>
            <td><?= $cijena . ' kn' ?></td>
            <td><?= $row['količina'] ?></td>
            <td><input type="number" name="kol" value="<?php echo $kol_br?>" min="1" max="<?= $max ?>"
                style="width: 45px; background-color: rgb(208, 247, 201);"></td>
            <td><?php echo $btn?></td>
        </tr>
    </form>
    
    
    <?php
        if($i == 0){ $i = 1; $boja = 'rgb(16, 71, 6)';}
        else{ $i = 0; $boja = 'rgb(32, 116, 15)';}
        $kol_br = NULL;
        endwhile;
    ?>
    </table>
    <br>
    <center><hr class='mb-3'></center>
    <br>
</main>

    <footer id="footer_index">
        <h5><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h5>
    </footer>
</body>
</html>