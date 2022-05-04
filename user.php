<?php
    session_start();
?>

<?php
    if(isset($_SESSION['user'])){
        $username_mess = $_SESSION['user'];
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

    <title>Dublin's Pub - <?= $username_mess ?></title>

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="./assets/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script src="./assets/js/smooth-scroll.polyfills.min.js"></script>
    <link href="./assets/css/style.css" rel="stylesheet">
    <link href="./assets/css/products_style.css" rel="stylesheet">

</head>

<?php
    include './quick_php/mobitel.php';
    
    if($mobitel == TRUE){
        echo "
            <style>
                .btn_kosarica{
                    text-decoration: none;
                    width: 95%;
                    border: 3px solid white;
                    border-radius: 20px;
                    font-size: 0.7em;
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


        <center><br><br><br>
        <hr class='mb-3'>
        <h3 style="color: white;"><?= $username_mess ?></h3>
        <hr class='mb-3'>
        <form action="" method="post">
            <div class='tipke_div'>
                <div class='tipke_s_div'>
                    <button class='btn_kosarica' stype="submit" name="podaci">PODACI</button>
                </div>
                <div class='tipke_s_div'>
                    <button class='btn_kosarica' stype="submit" name="narudzbe">NARUDŽBE</button>
                </div>
            </div>
        </form>
        <hr class='mb-3'>
        </center>


        <?php
            include './quick_php/mysql.php';

            $sql = "SELECT * FROM users WHERE username='$username_mess'";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $ime = $row['firstname'];
                $prezime = $row['lastname'];
                $username = $row['username'];
                $adresa = $row['adresa'];
                $mjesto = $row['mjesto'];
                $broj = $row['broj'];
                $email = $row['email'];
                $dat_cre = date("d.m.Y - H:i", strtotime($row['createdate'].' +1 hour'));
            }

            if(isset($_POST['podaci'])){
                empty($_POST['azurirano']);
                echo '
                <form action="" method="post">
                    <div class="podaci" style="text-align: left;">
                        <h5>Ime: '.$ime.' &emsp;<button class="promijeni" name="ime">Promijeni</button></h5>
                        <h5>Prezime:  '.$prezime.' &emsp;<button class="promijeni" name="prezime">Promijeni</button></h5>
                        <h5>Adresa i kućni broj: '.$adresa.' &emsp;<button class="promijeni" name="adresa">Promijeni</button></h5>
                        <h5>Mjesto: '.$mjesto.' &emsp;<button class="promijeni" name="mjesto">Promijeni</button></h5>
                        <h5>Broj: '.$broj.' &emsp;<button class="promijeni" name="broj">Promijeni</button></h5>
                        <br><h5>Username:  '.$username.'</h5>
                        <br><h5>Email:  '.$email.'</h5>
                        <br><h5>Registriran: '.$dat_cre.'</h5>
                        <br><table><tr><td class="lozinka_td"><button name="promijeni_lozinku" class="btn_kosarica" style="margin-left: 0px; width: 200px;">Promijeni lozniku</button></td></tr></table>
                    </div>
                </form>
                <center><hr class="mb-3"></center>
                ';
            }
            if(isset($_POST['ime'])){
                echo '
                <form action="" method="post">
                    <div class="podaci">
                        <h5>Ime: '.$ime.' &emsp;</h5>
                        <label for="ime" style="text-align: left; color: white;"><b>Unesite ime: </b></label>
                        <input class="form-control" style="width: 200px; height: 30px;" type="text" name="novo_ime" placeholder="Unesite ime">
                        &emsp;<button class="promijeni_btn" name="promijeni_ime">Promijeni</button>
                        &emsp;<button class="promijeni_btn_red" name="podaci">Odustani</button><br><br>
                        <h5>Prezime:  '.$prezime.' &emsp;<button class="promijeni" name="prezime">Promijeni</button></h5><br>
                        <h5>Adresa i kućni broj: '.$adresa.' &emsp;<button class="promijeni" name="adresa">Promijeni</button></h5><br>
                        <h5>Mjesto: '.$mjesto.' &emsp;<button class="promijeni" name="mjesto">Promijeni</button></h5><br>
                        <h5>Broj: '.$broj.' &emsp;<button class="promijeni" name="broj">Promijeni</button></h5><br>
                        <br><h5>Username:  '.$username.'</h5>
                        <br><h5>Email:  '.$email.'</h5>
                        <br><h5>Registriran: '.$dat_cre.'</h5>
                        <br><table><tr><td class="lozinka_td"><button name="promijeni_lozinku" class="btn_kosarica" style="margin-left: 0px; width: 200px;">Promijeni lozniku</button></td></tr></table>
                    </div>
                </form>
                <center><hr class="mb-3"></center>
                ';
            }
            if(isset($_POST['prezime'])){
                echo '
                <form action="" method="post">
                    <div class="podaci">
                        <h5>Ime: '.$ime.' &emsp;<button class="promijeni" name="ime">Promijeni</button></h5><br>
                        <h5>Prezime:  '.$prezime.' &emsp;</h5>
                        <label for="prezime" style="text-align: left; color: white;"><b>Unesite prezime: </b></label>
                        <input class="form-control" style="width: 200px; height: 30px;" type="text" name="novo_prezime" placeholder="Unesite prezime">
                        &emsp;<button class="promijeni_btn" name="promijeni_prezime">Promijeni</button>
                        &emsp;<button class="promijeni_btn_red" name="podaci">Odustani</button><br><br>
                        <h5>Adresa i kućni broj: '.$adresa.' &emsp;<button class="promijeni" name="adresa">Promijeni</button></h5><br>
                        <h5>Mjesto: '.$mjesto.' &emsp;<button class="promijeni" name="mjesto">Promijeni</button></h5><br>
                        <h5>Broj: '.$broj.' &emsp;<button class="promijeni" name="broj">Promijeni</button></h5><br>
                        <br><h5>Username:  '.$username.'</h5>
                        <br><h5>Email:  '.$email.'</h5>
                        <br><h5>Registriran: '.$dat_cre.'</h5>
                        <br><table><tr><td class="lozinka_td"><button name="promijeni_lozinku" class="btn_kosarica" style="margin-left: 0px; width: 200px;">Promijeni lozniku</button></td></tr></table>
                    </div>
                </form>
                <center><hr class="mb-3"></center>
                ';
            }
            if(isset($_POST['adresa'])){
                echo '
                <form action="" method="post">
                    <div class="podaci">
                        <h5>Ime: '.$ime.' &emsp;<button class="promijeni" name="ime">Promijeni</button></h5><br>
                        <h5>Prezime:  '.$prezime.' &emsp;<button class="promijeni" name="prezime">Promijeni</button></h5><br>
                        <h5>Adresa i kućni broj: '.$adresa.' &emsp;</h5>
                        <label for="adresa" style="text-align: left; color: white;"><b>Unesite adresu i kućni broj: </b></label>
                        <input class="form-control" style="width: 200px; height: 30px;" type="text" name="nova_adresa" placeholder="Unesite adresu">
                        &emsp;<button class="promijeni_btn" name="promijeni_adresu">Promijeni</button>
                        &emsp;<button class="promijeni_btn_red" name="podaci">Odustani</button><br><br>
                        <h5>Mjesto: '.$mjesto.' &emsp;<button class="promijeni" name="mjesto">Promijeni</button></h5><br>
                        <h5>Broj: '.$broj.' &emsp;<button class="promijeni" name="broj">Promijeni</button></h5><br>
                        <br><h5>Username:  '.$username.'</h5>
                        <br><h5>Email:  '.$email.'</h5>
                        <br><h5>Registriran: '.$dat_cre.'</h5>
                        <br><table><tr><td class="lozinka_td"><button name="promijeni_lozinku" class="btn_kosarica" style="margin-left: 0px; width: 200px;">Promijeni lozniku</button></td></tr></table>
                    </div>
                </form>
                <center><hr class="mb-3"></center>
                ';
            }
            if(isset($_POST['mjesto'])){
                echo '
                <form action="" method="post">
                    <div class="podaci">
                        <h5>Ime: '.$ime.' &emsp;<button class="promijeni" name="ime">Promijeni</button></h5><br>
                        <h5>Prezime:  '.$prezime.' &emsp;<button class="promijeni" name="prezime">Promijeni</button></h5><br>
                        <h5>Adresa i kućni broj: '.$adresa.' &emsp;<button class="promijeni" name="adresa">Promijeni</button></h5><br>
                        <h5>Mjesto: '.$mjesto.' &emsp;</h5>
                        <label for="mjesto" style="text-align: left; color: white;"><b>Unesite mjesto: </b></label>
                        <input class="form-control" style="width: 200px; height: 30px;" type="text" name="novo_mjesto" placeholder="Unesite mjesto">
                        &emsp;<button class="promijeni_btn" name="promijeni_mjesto">Promijeni</button>
                        &emsp;<button class="promijeni_btn_red" name="podaci">Odustani</button><br><br>
                        <h5>Broj: '.$broj.' &emsp;<button class="promijeni" name="broj">Promijeni</button></h5><br>
                        <br><h5>Username:  '.$username.'</h5>
                        <br><h5>Email:  '.$email.'</h5>
                        <br><h5>Registriran: '.$dat_cre.'</h5>
                        <br><table><tr><td class="lozinka_td"><button name="promijeni_lozinku" class="btn_kosarica" style="margin-left: 0px; width: 200px;">Promijeni lozniku</button></td></tr></table>
                    </div>
                </form>
                <center><hr class="mb-3"></center>
                ';
            }
            if(isset($_POST['broj'])){
                echo '
                <form action="" method="post">
                    <div class="podaci">
                        <h5>Ime: '.$ime.' &emsp;<button class="promijeni" name="ime">Promijeni</button></h5><br>
                        <h5>Prezime:  '.$prezime.' &emsp;<button class="promijeni" name="prezime">Promijeni</button></h5><br>
                        <h5>Adresa i kućni broj: '.$adresa.' &emsp;<button class="promijeni" name="adresa">Promijeni</button></h5><br>
                        <h5>Mjesto: '.$mjesto.' &emsp;<button class="promijeni" name="mjesto">Promijeni</button></h5><br>
                        <h5>Broj: '.$broj.' &emsp;</h5>
                        <label for="broj" style="text-align: left; color: white;"><b>Unesite broj: </b></label>
                        <input class="form-control" style="width: 200px; height: 30px;" type="text" name="novi_broj" placeholder="Unesite broj">
                        &emsp;<button class="promijeni_btn" name="promijeni_broj">Promijeni</button>
                        &emsp;<button class="promijeni_btn_red" name="podaci">Odustani</button><br><br>
                        <br><h5>Username:  '.$username.'</h5>
                        <br><h5>Email:  '.$email.'</h5>
                        <br><h5>Registriran: '.$dat_cre.'</h5>
                        <br><table><tr><td class="lozinka_td"><button name="promijeni_lozinku" class="btn_kosarica" style="margin-left: 0px; width: 200px;">Promijeni lozniku</button></td></tr></table>
                    </div>
                </form>
                <center><hr class="mb-3"></center>
                ';
            }
            if(isset($_POST['promijeni_ime'])){
                $novo = $_POST['novo_ime'];
                if($novo == NULL){
                    echo "
                            <center><h5 style='color: white;'>Pogreška prilikom unosa imena!</h5>
                            <hr class='mb-3'</center>
                        ";
                }
                else{
                    include './quick_php/mysql.php';
                    $sql = "UPDATE users SET firstname='$novo' WHERE id='$id';";
                    if ($conn->query($sql) === TRUE) {
                        isset($_POST['podaci']);
                        echo "
                            <center><h5 style='color: white;'>Ime je ažurirano!</h5>
                            <hr class='mb-3'</center>
                        ";
                    } else {}
                }
            }
            if(isset($_POST['promijeni_prezime'])){
                $novo = $_POST['novo_prezime'];
                if($novo == NULL){
                    echo "
                            <center><h5 style='color: white;'>Pogreška prilikom unosa prezimena!</h5>
                            <hr class='mb-3'</center>
                        ";
                }
                else{
                    include './quick_php/mysql.php';
                    $sql = "UPDATE users SET lastname='$novo' WHERE id='$id';";
                    if ($conn->query($sql) === TRUE) {
                        isset($_POST['podaci']);
                        echo "
                            <center><h5 style='color: white;'>Prezime je ažurirano!</h5>
                            <hr class='mb-3'</center>
                        ";
                    } else {}
                }
            }
            if(isset($_POST['promijeni_adresu'])){
                $novo = $_POST['nova_adresa'];
                if($novo == NULL){
                    echo "
                            <center><h5 style='color: white;'>Pogreška prilikom unosa adrese!</h5>
                            <hr class='mb-3'</center>
                        ";
                }
                else{
                    include './quick_php/mysql.php';
                    $sql = "UPDATE users SET adresa='$novo' WHERE id='$id';";
                    if ($conn->query($sql) === TRUE) {
                        isset($_POST['podaci']);
                        echo "
                            <center><h5 style='color: white;'>Adresa je ažurirana!</h5>
                            <hr class='mb-3'</center>
                        ";
                    } else {}
                }
            }
            if(isset($_POST['promijeni_mjesto'])){
                $novo = $_POST['novo_mjesto'];
                if($novo == NULL){
                    echo "
                            <center><h5 style='color: white;'>Pogreška prilikom unosa mjesta!</h5>
                            <hr class='mb-3'</center>
                        ";
                }
                else{
                    include './quick_php/mysql.php';
                    $sql = "UPDATE users SET mjesto='$novo' WHERE id='$id';";
                    if ($conn->query($sql) === TRUE) {
                        isset($_POST['podaci']);
                        echo "
                            <center><h5 style='color: white;'>Mjesto je ažurirano!</h5>
                            <hr class='mb-3'</center>
                        ";
                    } else {}
                }
            }
            if(isset($_POST['promijeni_broj'])){
                $novo = $_POST['novi_broj'];
                if($novo == NULL){
                    echo "
                            <center><h5 style='color: white;'>Pogreška prilikom unosa broja!</h5>
                            <hr class='mb-3'</center>
                        ";
                }
                else{
                    include './quick_php/mysql.php';
                    $sql = "UPDATE users SET broj='$novo' WHERE id='$id';";
                    if ($conn->query($sql) === TRUE) {
                        isset($_POST['podaci']);
                        echo "
                            <center><h5 style='color: white;'>Broj je ažuriran!</h5>
                            <hr class='mb-3'</center>
                        ";
                    } else {}
                }
            }
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
                </center>
                ';
                echo '
                <center><hr class="mb-3"></center>
                <form action="" method="post">
                    <div class="podaci">
                        <h5>Ime: '.$ime.' &emsp;<button class="promijeni" name="ime">Promijeni</button></h5>
                        <h5>Prezime:  '.$prezime.' &emsp;<button class="promijeni" name="prezime">Promijeni</button></h5>
                        <br><h5>Username:  '.$username.'</h5>
                        <br><h5>Email:  '.$email.'</h5>
                        <br><h5>Registriran: '.$dat_cre.'</h5>
                    </div>
                </form>
                <center><hr class="mb-3"></center>
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
                        <form action="./user.php" method="post">
                        <label for="password" style="text-align: left; color: white;"><b>Nova lozinka</b></label><br>
                        <input class="form-control" type="password" name="password" placeholder="Unesite lozinku" style="width: 50%;" required><br>
                        <label for="password2" style="text-align: left; color: white;"><b>Potvrdite lozinku</b></label><br>
                        <input class="form-control" type="password" name="password2" placeholder="Potvrdite lozinku" style="width: 50%;" required><br>
                        '.$error.'
                        
                            <div class="tipke_div">
                                <div class="tipke_s_div">
                                    <button class="btn_loz" stype="submit" name="reset">Promijeni</button>
                                </div>
                                <br>
                            </div>
                        </form>
                        </center>
                        ';
                        echo '
                        <center><hr class="mb-3"></center>
                        <form action="" method="post">
                            <div class="podaci">
                                <h5>Ime: '.$ime.' &emsp;<button class="promijeni" name="ime">Promijeni</button></h5>
                                <h5>Prezime:  '.$prezime.' &emsp;<button class="promijeni" name="prezime">Promijeni</button></h5>
                                <br><h5>Username:  '.$username.'</h5>
                                <br><h5>Email:  '.$email.'</h5>
                                <br><h5>Registriran: '.$dat_cre.'</h5>
                            </div>
                        </form>
                        <center><hr class="mb-3"></center>
                        ';
                    }
                        if($pass_ok == TRUE){
                            isset($_POST['narudzba']);
                            $password = $_POST['password'];
                            $password2 = $_POST['password2'];
                            if($password2 == $password && strlen($password) > 7){
                                include './mysql.php';
                                $password = md5($password);
                                $sql = "UPDATE users SET password='$password' WHERE username='$username_mess'";
                                if ($conn->query($sql) === TRUE) {
                                    echo '<meta http-equiv="refresh" content="0;url=./note_pages/pass_update.php"/>';
                                } else {}
                            }
                        }
                }
                
                if(isset($_POST['narudzbe'])){
                    include './quick_php/mysql.php';

                    echo '
                        <center>
                            <div id="narudzbe_div">
                            </div>
                        </center>
                    ';
                }
                   
        ?>
     </main>

    <?php
        if($mobitel == TRUE){
            echo "
                <style>
                    h5{
                        font-size: 0.85em;
                    }
                </style>
            ";
        }else{
        }
    ?>

    <footer id="footer_index">
        <h5><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h5>
    </footer>

    <script language="javascript" type="text/javascript">
        function loadlink(){
            $('#narudzbe_div').load('./quick_php/live_nar_user.php',function () {
                $(this).unwrap();
            });
        }

        loadlink(); 
        setInterval(function(){
            loadlink()
        }, 30000);
    </script>

</body>
</html>