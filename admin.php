<?php
    session_start();
?>

<?php
    if(isset($_SESSION['admin'])){
        $username_mess = $_SESSION['admin'];
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
    <meta http-equiv="refresh" content="3600;url=./note_pages/odjava.php?auto_odjava"/>

    <link href="./assets/img/logo.png" rel="icon">

    <title>Dublin's Pub - <?= $username_mess ?></title>

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="./assets/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="./assets/css/style.css" rel="stylesheet">
    <link href="./assets/css/admin_style.css" rel="stylesheet">

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
                                    <a class="nav-link" href="narudzbe_admin.php" style="color: #f2f2f2;">Narudžbe</a>
                                </li>
                                <li class="nav-item headli">
                                    <a class="nav-link" href="admin_users.php" style="color: #f2f2f2;">Korisnici</a>
                                </li>
                                <li class="nav-item headli">
                                    <a class="nav-link" href="admin.php" style="color: #f2f2f2;"><img src="./assets/img/user.png" 
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

        <?php
            include './quick_php/mysql.php';

            $stmt = $conn->prepare("SELECT * FROM users WHERE username = '$username_mess'");
            $stmt->execute();
            $result = $stmt->get_result();
            
            while($row = $result->fetch_assoc()){
                $email = $row['email'];
                $id = $row['id'];
            }
        ?>

            <center>
                <br><br><br><br>
                <hr class="mb-3">
                <form action="" method="post">
                    <div class="podaci">
                        <br><h5 class="white">Username:  <?= $username_mess ?></h5>
                        <br><h5 class="white">Email:  <?= $email ?></h5>
                        <br><table><tr><td class="lozinka_td"><button name="promijeni_lozinku" class="btn_kosarica" style="margin-left: 0px; width: 200px;">Promijeni lozniku</button></td></tr></table>
                    </div>
                <hr class="mb-3">
                    <h5 class="white">Upravljanje zalihom:</h5>
                    <table><tr><td class="lozinka_td"><button name="zaliha" class="btn_kosarica" style="margin-left: 0px; width: 200px;">Zaliha</button></td></tr></table>
                <hr class="mb-3">
                    <h5 class="white">Upravljanje ponudom:</h5>
                    <table><tr><td class="lozinka_td"><button name="ponuda" class="btn_kosarica" style="margin-right: 10px; width: 200px;">Dodati</button></td>
                    <td class="lozinka_td"><button name="ukloniti" class="btn_kosarica" style="margin-left: 10px; width: 200px;">Ukloniti</button></td></tr></table>
                    <table><tr><td class="lozinka_td"><button name="pro_cij" class="btn_kosarica" style="margin-right: 10px; width: 200px;">Promijeni cijenu</button></td></tr></table>
                <hr class="mb-3">
                </form>
            </center>
    
        <?php
            if(isset($_POST['promijeni_lozinku'])){
                echo '
                <center>
                <form action="" method="post">
                <label for="password" style="text-align: left; color: white;"><b>Nova lozinka</b></label><br>
                <input class="form-control" type="password" name="password" placeholder="Unesite lozinku" style="width: 50%;" required><br>
                <label for="password2" style="text-align: left; color: white;"><b>Potvrdite lozinku</b></label><br>
                <input class="form-control" type="password" name="password2" placeholder="Potvrdite lozinku" style="width: 50%;" required><br>
                
                    <div class="tipke_div">
                        <div class="tipke_s_div">
                            <button class="btn_loz" stype="submit" name="reset">Promijeni</button>
                        </div>
                        <br>
                    </div>
                </form>
                <hr class="mb-3">
                </center>
                ';
            }
            $error = NULL;
            $pass_ok = FALSE;
                if(isset($_POST['reset'])){
                    if($pass_ok == FALSE){
                        $password = $_POST['password'];
                        $password2 = $_POST['password2'];
                        if(strlen($password) < 8 && $password != $password2){
                            $error = "<h7 style='color:red;'>Lozinka se mora sastojati od najmanje 8 znakova!<br>Lozinke vam se ne podudaraju!</h7>";
                            $pass_ok = FALSE;
                        }
                        elseif(strlen($password) < 8){
                            $error = "<h7 style='color:red;'>Lozinka se mora sastojati od najmanje 8 znakova!</br></h7>";
                            $pass_ok = FALSE;
                        }
                        elseif($password != $password2){
                            $error = "<h7 style='color:red;'>Lozinke vam se ne podudaraju!</br></h7>";
                            $pass_ok = FALSE;
                        }
                        else{
                            $pass_ok = TRUE;
                        }
                        echo '
                        <center>
                        <form action="./admin.php" method="post">
                        <label for="password" style="text-align: left; color: white;"><b>Nova lozinka</b></label><br>
                        <input class="form-control" type="password" name="password" placeholder="Unesite lozinku" style="width: 50%;" required><br>
                        <label for="password2" style="text-align: left; color: white;"><b>Potvrdite lozinku</b></label><br>
                        <input class="form-control" type="password" name="password2" placeholder="Potvrdite lozinku" style="width: 50%;" required><br>
                        '.$error.'
                        
                            <div class="tipke_div">
                                <div class="tipke_s_div">
                                    <button class="btn_pass" stype="submit" name="reset">Promijeni</button>
                            </div>
                        </form>
                        <hr class="mb-4">
                        </center>
                        ';
                    }
                        if($pass_ok == TRUE){
                            $password = $_POST['password'];
                            $password2 = $_POST['password2'];
                            if($password2 == $password && strlen($password) > 7){    
                                include './quick_php/mysql.php';
                                $password = md5($password);
                                $sql = "UPDATE users SET password='$password' WHERE username='$username_mess'";
                                if ($conn->query($sql) === TRUE) {}
                                echo '<meta http-equiv="refresh" content="0;url=./note_pages/pass_update_admin.php"/>';
                                } else {}
                            }
                }
                
                
            
            if(isset($_POST['zaliha'])){
                
                // TOPLI NAPITCI
                echo "
                    <h3 class='white'>Topli napitci</h3>
                ";
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
                <br><h3 class='white'>Bezalkoholna pića</h3>
            <?php
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
                <br><h3 class='white'>Piva i cideri</h3>
            <?php
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
            <br><h3 class='white'>Vina</h3>
            <?php
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
            <br><h3 class='white'>Jaka alkoholna pića</h3>
            <?php
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
            <br><h3 class='white'>Miješana alkoholna pića</h3>
            <?php
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
                    <center>
                        <br><br>
                        <hr class='mb-3'>
                    </center>
                ";
            }
            
            
            
            if(isset($_POST['ponuda'])){
                echo '<meta http-equiv="refresh" content="0;url=./quick_php/dodaj_proizvod.php"/>';
            }
            
            if(isset($_POST['ukloniti'])){
                echo '<meta http-equiv="refresh" content="0;url=./quick_php/ukloni_proizvod.php"/>';
            }
            
            if(isset($_POST['pro_cij'])){
                echo '<meta http-equiv="refresh" content="0;url=./quick_php/promijeni_cijenu.php"/>';
            }
        ?>
        
        

    <br><br><br><br><br><br>
    <footer class='footer_final'>
        <h5><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h5>
    </footer>
</body>
</html>