<?php
    session_start();
?>

<?php
    if(isset($_SESSION['admin'])){
        $username_mess = $_SESSION['admin'];
    }else{
        echo '<meta http-equiv="refresh" content="0;url=prijava.php"/>';
    }
    
    $mess = NULL;
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3600;url=./note_pages/odjava.php?auto_odjava"/>

    <link href="../assets/img/logo.png" rel="icon">

    <title>Dublin's Pub - Dodati proizvod</title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="../assets/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/admin_style.css" rel="stylesheet">

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
                                    <a class="nav-link" href="../narudzbe_admin.php" style="color: #f2f2f2;">Narudžbe</a>
                                </li>
                                <li class="nav-item headli">
                                    <a class="nav-link" href="../admin_users.php" style="color: #f2f2f2;">Korisnici</a>
                                </li>
                                <li class="nav-item headli">
                                    <a class="nav-link" href="../admin.php" style="color: #f2f2f2;"><img src="../assets/img/user.png" 
                                    style="height: 25px; width: 25px;"> <?php echo $username_mess ?></a>
                                </li>
                                <li class="nav-item headli">
                                    <a class="nav-link menu-imgs" href="./note_pages/odjava.php?odjava" style="color: #f2f2f2;">Odjava
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
        
        <?php
            if(isset($_POST['dodati_prv'])){
                $postoji = FALSE;
                $naziv = $_POST['naziv'];
                $tip = $_POST['tip'];
                $cijena = $_POST['cijena'];
                $zaliha = $_POST['zaliha'];
                $kol = $_POST['kol'];
                include './mysql.php';
                $stmt = $conn->prepare("SELECT naziv FROM products");
                $stmt->execute();
                $result = $stmt->get_result();
                while($row = $result->fetch_assoc()){
                    if($naziv == $row['naziv']){
                        $postoji = TRUE;
                        break;
                    }
                }
                if($postoji == FALSE){
                    include './mysql.php';
                    $sql = "INSERT INTO products (naziv, cijena, zaliha, količina, tip) VALUES(?,?,?,?,?)";
                    $stmtinsert = $db->prepare($sql);
                    $result = $stmtinsert->execute([$naziv, $cijena, $zaliha, $kol, $tip]);
                }else{
                    $mess = "
                        <center>
                        <hr class='mb-3'>
                        <br>
                        <h3 class='red'>Proizvod sa tim nazivom već postoji!</h3>
                        <br>
                        <hr class='mb-3'>
                        </center>
                    ";
                }
                echo '<meta http-equiv="refresh" content="0;url=../admin.php"/>';
            }
        ?>
        
        <form action="" method="POST">
                    <br><br><br>
                    <center>
                    <hr class="mb-3">
                        <label class="white" for="naziv" style="text-align: left;"><b>Naziv stavke:</b></label><br>
                        <input class="form-control" type="text" name="naziv" placeholder="Naziv stavke" maxlength="74" required><br><br>
                        <?= $mess ?>
                        <label class="white" for="tip" style="text-align: left;"><b>Odaberite tip:</b></label><br>
                        <select name="tip" class="dropdown drp_tip">
                            <option value=""></option>
                            <option value="topli">Toplo</option>
                            <option value="bezalk">Bez alkohola</option>
                            <option value="pivo">Pivo</option>
                            <option value="alk">Alkohol</option>
                            <option value="vina">Vino</option>
                            <option value="mje_alk">Mješani alkohol</option>
                        </select><br><br>
                        <label class="white" for="cijena" style="text-align: left;"><b>Cijena:</b></label><br>
                        <input class="form-control num_dod" type="number" name="cijena" placeholder="0.00" maxlength="8" value="0" min="0" onchange="setTwoNumberDecimal" step="0.1" required><br>
                        <label class="white" for="zaliha" style="text-align: left;"><b>Zaliha:</b></label><br>
                        <input class="form-control num_dod" type="number" name="zaliha" placeholder="0.00" maxlength="8" value="0" min="0" onchange="setTwoNumberDecimal" step="1" required><br>
                        <label class="white" for="kol" style="text-align: left;"><b>Količina za prodaju:</b></label><br>
                        <input class="form-control num_dod" type="text" name="kol" placeholder="Količina za prodaju" maxlength="29" style="width: 200px;" required>
                        <br><br>
                        <table><tr><td class="lozinka_td"><button name="dodati_prv" class="btn_kosarica" style="margin-left: 0px; width: 200px;">Dodaj u ponudu</button></td></tr></table>
                        <br>
                        </center>
        </form>
                        <center>
                        <a href="../admin.php" class="none"><table><tr><td class="lozinka_td"><button class="btn_red" style="margin-left: 0px; width: 200px;">Odustani</button></td></tr></table></a>
                        <br><br>
                        <hr class="mb-3">
                        </center>
                    
        
        
        
        
        
        
    <br><br><br><br><br><br>
    <footer class='footer_final'>
        <h5><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h5>
    </footer>
</body>
</html>
