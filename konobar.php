<?php
    session_start();
?>

<?php
    if(isset($_SESSION['konobar'])){
        $username_mess = $_SESSION['konobar'];
    }else{
        echo '<meta http-equiv="refresh" content="0;url=prijava.php"/>';
    }
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="36000;url=./note_pages/odjava.php?auto_odjava"/>

    <link href="./assets/img/logo.png" rel="icon">

    <title>Dublin's Pub - <?= $username_mess ?></title>

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="./assets/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="./assets/css/style.css" rel="stylesheet">
    <link href="./assets/css/waiter_style.css" rel="stylesheet">
</head>

<body>
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
                                    <a class="nav-link" href="narudzbe_kon.php" style="color: #f2f2f2;">Narudžbe</a>
                                </li>
                                <li class="nav-item headli">
                                    <a class="nav-link" href="konobar.php" style="color: #f2f2f2;"><img src="./assets/img/user.png" 
                                    style="height: 25px; width: 25px;"> <?php echo $username_mess ?></a>
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

        <center>
            <br><br><br>
            <hr class="mb-3">
            <h3>Ponuda</h3>
            <br>
            <hr class="mb-3">
            <div class="ponuda">
                
                <!-- TOPLI NAPITCI -->
                <h3>Topli napitci</h3>
            <?php
                include './quick_php/broj_kosarica.php';
                $stmt = $conn->prepare("SELECT * FROM products WHERE tip = 'topli' ORDER BY naziv ASC");
                $stmt->execute();
                $result = $stmt->get_result();
                echo "
                    <table class='products_table'>
                        <tr>
                            <td>Naziv</td>
                            <td>Zaliha</td>
                            <td>Promijeni zalihu</td>
                            <td>Nedostupno</td>
                        </tr>
                ";
                while($row = $result->fetch_assoc()){
                    $boja = NULL;
                    $zaliha = $row['zaliha'];
                    $naziv = $row['naziv'];
                    $id = $row['id'];
                    if($zaliha == 0) {
                        $boja = "style='color: rgb(255, 102, 102); font-weight: bold; text-decoration: underline;'";
                    }
                    echo "
                    <tr>
                        <td $boja>$naziv</td>
                        <td $boja>$zaliha</td>
                        <td><a href='./quick_php/dodaj_zalihu_kon.php?id=$id' class='pon_a'>Promijeni zalihu</a></td>
                        <td><a href='./quick_php/nedostupno_zaliha_kon.php?id=$id' class='pon_a'>Nedostupno</a></td>
                    </tr>
                    ";
                }
                echo "
                    </table>
                ";
            ?>

                <!-- BEZALKOHOLNA PIĆA -->
                <br><h3>Bezalkoholna pića</h3>
            <?php
                include './quick_php/broj_kosarica.php';
                $stmt = $conn->prepare("SELECT * FROM products WHERE tip = 'bezalk' ORDER BY naziv ASC");
                $stmt->execute();
                $result = $stmt->get_result();
                echo "
                    <table class='products_table'>
                        <tr>
                            <td>Naziv</td>
                            <td>Zaliha</td>
                            <td>Promijeni zalihu</td>
                            <td>Nedostupno</td>
                        </tr>
                ";
                while($row = $result->fetch_assoc()){
                    $boja = NULL;
                    $zaliha = $row['zaliha'];
                    $naziv = $row['naziv'];
                    $id = $row['id'];
                    if($zaliha == 0) {
                        $boja = "style='color: rgb(255, 102, 102); font-weight: bold; text-decoration: underline;'";
                    }
                    echo "
                    <tr>
                        <td $boja>$naziv</td>
                        <td $boja>$zaliha</td>
                        <td><a href='./quick_php/dodaj_zalihu_kon.php?id=$id' class='pon_a'>Promijeni zalihu</a></td>
                        <td><a href='./quick_php/nedostupno_zaliha_kon.php?id=$id' class='pon_a'>Nedostupno</a></td>
                    </tr>
                    ";
                }
                echo "
                    </table>
                ";
            ?>

                <!-- PIVA I CIDERI -->
                <br><h3>Piva i cideri</h3>
            <?php
                include './quick_php/broj_kosarica.php';
                $stmt = $conn->prepare("SELECT * FROM products WHERE tip = 'pivo' ORDER BY naziv ASC");
                $stmt->execute();
                $result = $stmt->get_result();
                echo "
                    <table class='products_table'>
                        <tr>
                            <td>Naziv</td>
                            <td>Zaliha</td>
                            <td>Promijeni zalihu</td>
                            <td>Nedostupno</td>
                        </tr>
                ";
                while($row = $result->fetch_assoc()){
                    $boja = NULL;
                    $zaliha = $row['zaliha'];
                    $naziv = $row['naziv'];
                    $id = $row['id'];
                    if($zaliha == 0) {
                        $boja = "style='color: rgb(255, 102, 102); font-weight: bold; text-decoration: underline;'";
                    }
                    echo "
                    <tr>
                        <td $boja>$naziv</td>
                        <td $boja>$zaliha</td>
                        <td><a href='./quick_php/dodaj_zalihu_kon.php?id=$id' class='pon_a'>Promijeni zalihu</a></td>
                        <td><a href='./quick_php/nedostupno_zaliha_kon.php?id=$id' class='pon_a'>Nedostupno</a></td>
                    </tr>
                    ";
                }
                echo "
                    </table>
                ";
            ?>

            <!-- VINA -->
            <br><h3>Vina</h3>
            <?php
                include './quick_php/broj_kosarica.php';
                $stmt = $conn->prepare("SELECT * FROM products WHERE tip = 'vina' ORDER BY naziv ASC");
                $stmt->execute();
                $result = $stmt->get_result();
                echo "
                    <table class='products_table'>
                        <tr>
                            <td>Naziv</td>
                            <td>Zaliha</td>
                            <td>Promijeni zalihu</td>
                            <td>Nedostupno</td>
                        </tr>
                ";
                while($row = $result->fetch_assoc()){
                    $boja = NULL;
                    $zaliha = $row['zaliha'];
                    $naziv = $row['naziv'];
                    $id = $row['id'];
                    if($zaliha == 0) {
                        $boja = "style='color: rgb(255, 102, 102); font-weight: bold; text-decoration: underline;'";
                    }
                    echo "
                    <tr>
                        <td $boja>$naziv</td>
                        <td $boja>$zaliha</td>
                        <td><a href='./quick_php/dodaj_zalihu_kon.php?id=$id' class='pon_a'>Promijeni zalihu</a></td>
                        <td><a href='./quick_php/nedostupno_zaliha_kon.php?id=$id' class='pon_a'>Nedostupno</a></td>
                    </tr>
                    ";
                }
                echo "
                    </table>
                ";
            ?>

            <!-- JAKA ALKOHOLNA PIĆA -->
            <br><h3>Jaka alkoholna pića</h3>
            <?php
                include './quick_php/broj_kosarica.php';
                $stmt = $conn->prepare("SELECT * FROM products WHERE tip = 'alk' ORDER BY naziv ASC");
                $stmt->execute();
                $result = $stmt->get_result();
                echo "
                    <table class='products_table'>
                        <tr>
                            <td>Naziv</td>
                            <td>Zaliha</td>
                            <td>Promijeni zalihu</td>
                            <td>Nedostupno</td>
                        </tr>
                ";
                while($row = $result->fetch_assoc()){
                    $boja = NULL;
                    $zaliha = $row['zaliha'];
                    $naziv = $row['naziv'];
                    $id = $row['id'];
                    if($zaliha == 0) {
                        $boja = "style='color: rgb(255, 102, 102); font-weight: bold; text-decoration: underline;'";
                    }
                    echo "
                    <tr>
                        <td $boja>$naziv</td>
                        <td $boja>$zaliha</td>
                        <td><a href='./quick_php/dodaj_zalihu_kon.php?id=$id' class='pon_a'>Promijeni zalihu</a></td>
                        <td><a href='./quick_php/nedostupno_zaliha_kon.php?id=$id' class='pon_a'>Nedostupno</a></td>
                    </tr>
                    ";
                }
                echo "
                    </table>
                ";
            ?>

            <!-- MIJEŠANA ALKOHOLNA PIĆA -->
            <br><h3>Miješana alkoholna pića</h3>
            <?php
                include './quick_php/broj_kosarica.php';
                $stmt = $conn->prepare("SELECT * FROM products WHERE tip = 'mje_alk' ORDER BY naziv ASC");
                $stmt->execute();
                $result = $stmt->get_result();
                echo "
                    <table class='products_table'>
                        <tr>
                            <td>Naziv</td>
                            <td>Zaliha</td>
                            <td>Promijeni zalihu</td>
                            <td>Nedostupno</td>
                        </tr>
                ";
                while($row = $result->fetch_assoc()){
                    $boja = NULL;
                    $zaliha = $row['zaliha'];
                    $naziv = $row['naziv'];
                    $id = $row['id'];
                    if($zaliha == 0) {
                        $boja = "style='color: rgb(255, 102, 102); font-weight: bold; text-decoration: underline;'";
                    }
                    echo "
                    <tr>
                        <td $boja>$naziv</td>
                        <td $boja>$zaliha</td>
                        <td><a href='./quick_php/dodaj_zalihu_kon.php?id=$id' class='pon_a'>Promijeni zalihu</a></td>
                        <td><a href='./quick_php/nedostupno_zaliha_kon.php?id=$id' class='pon_a'>Nedostupno</a></td>
                    </tr>
                    ";
                }
                echo "
                    </table>
                ";
            ?>
            
                <br><br>
                <hr class='mb-4'>
            </div>
        </center>
        
        <br><br><br><br><br><br>
        <footer class='footer_final'>
            <h5><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h5>
        </footer>
</body>
</html>
