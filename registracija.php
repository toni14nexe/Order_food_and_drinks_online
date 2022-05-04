<?php
    session_start();
?>

<?php
    include './quick_php/mysql.php';
?>
<?php
    if(isset($_SESSION['user'])){
        echo '<meta http-equiv="refresh" content="0;url=user_ind.php"/>';
    }
    if(isset($_SESSION['konobar'])){
        echo '<meta http-equiv="refresh" content="0;url=konobar.php"/>';
    }
    if(isset($_SESSION['admin'])){
        echo '<meta http-equiv="refresh" content="0;url=admin.php"/>';
    }
?>

<?php
    $error_u = NULL;
    $error_e = NULL;

    if(isset($_POST['create'])){
        $username = $_POST['username'];
        $email = $_POST['email'];

        $sql_u = "SELECT * FROM users WHERE username='$username'";
        $res_u = mysqli_query($dbu, $sql_u) or die(mysqli_error($dbu));
    
        if(mysqli_num_rows($res_u) > 0 || $username=='users' || $username=='products'){
            $error_u = "<h7 class='err_txt'><br>Korisničko ime je već zauzeto!<br><br></h7>";
        }

        $sql_e = "SELECT * FROM users WHERE email='$email'";
        $res_e = mysqli_query($dbu, $sql_e) or die(mysqli_error($dbu));
        
        if(mysqli_num_rows($res_e) > 0){
            $error_e = "<h7 class='err_txt'>Email je već registriran!<br><br></h7>";
        }
    }
?>

<!DOCTYPE html>
<html lang="hr">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="./assets/img/logo.png" rel="icon">

    <title>Dublin's Pub - Registracija</title>

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="./assets/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="./assets/css/style.css" rel="stylesheet">
</head>

<body style="font-family: 'Times New Roman', Times, serif; font-size: large; color: white; background-color: black;
    background-image: url('https://toni-web.com/stable_img/coffee.jpg'); background-position-y: -81px;">

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

<?php
    include './quick_php/mobitel.php';
    
    $style_a = NULL;
    if($mobitel == TRUE){
        $style_a = "style='width: 90%;'";
    }else{
        $style_a = NULL;
    }
?>

<header id="header" class="fixed-top">
        <nav id="nbar" class="navbar navbar-expand-lg navbar-light bg-dark">
            <div id="myhead">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item headli">
                                <a class="nav-link" href="index.php" style="color: #f2f2f2;">Naslovna</a>
                            </li>
                            <li class="nav-item headli">
                                <a class="nav-link" href="index.php#onama" style="color: #f2f2f2;">O nama</a>
                            </li>
                            <li class="nav-item headli nav-item" >
                                <a class="nav-link" href="index.php#cjenik" style="color: #f2f2f2;">Cjenik</a>
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
    


    <main>
        <div>
            <?php
                $error = NULL;
                
                if(isset($_POST['create'])){
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $adresa = $_POST['adresa'];
                    $mjesto = $_POST['mjesto'];
                    $broj = $_POST['broj'];
                    $password = $_POST['password'];
                    $password2 = $_POST['password2'];
                    $password_md = md5($password);
                    $vkey = md5(time().$username);
                    $verified = '0';
                    $role = 'user';
                
                    if(strlen($username) < 5){
                        $error;
                    }elseif(strlen($password) < 8){
                        $error;
                    }elseif($password2 != $password){
                        $error;
                    }elseif ($error_u == NULL && $error_e == NULL){
                        $sql = "INSERT INTO users (firstname, lastname, username, email, adresa, mjesto, broj, password, vkey, verified, role) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
                        $stmtinsert = $db->prepare($sql);
                        $result = $stmtinsert->execute([$firstname, $lastname, $username, $email, $adresa, $mjesto, $broj, $password_md, $vkey, $verified, $role]);
                        if($result){
          
          //POSLATI MAIL LOKALNO
          //                  $to = $email;
          //                  $subject = "Email Verification";
          //                  $message = "
          //                      Za verifikaciju Dublin's pub računa kliknite na poveznicu:
          //                      <a href='$vkey_link$vkey'>verifikacija</a> 
          //                      <br>Vaš email: $email<br>Vaš username: $username<br>
          //                  ";
          //                  $headers = "From: toni14nexe@gmail.com \r\n";
          //                  $headers .= "MIME-Version: 1.0" . "\r\n";
          //                  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
          //                  mail($to,$subject,$message,$headers);
          //POSLATI MAIL ONLINE
                              ini_set( 'display_errors',1 );
                              error_reporting( E_ALL );
                              $to = $email;
                              $subject = "Email verifikacija";
                              $message = "
                                  Za verifikaciju Dublin's pub računa kliknite na poveznicu:
                                  <a href='$vkey_link$vkey'>verifikacija</a> 
                                  <br>Vaš email: $email<br>Vaš username: $username<br>
                              ";
                              $headers .= "From: Dublin's Pub <dublinspub@toni-web.com> \r\n";
                              $headers .= "MIME-Version: 1.0" . "\r\n";
                              $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                              mail($to,$subject,$message, $headers);
          //                  
          
          
                            echo '<meta http-equiv="refresh" content="0;url=./note_pages/uspjelo_slanje.php"/>';
                        }else{
                            echo '<meta http-equiv="refresh" content="0;url=./note_pages/neuspjelo_slanje.php"/>';
                        }
                    }
                }
            ?>
        </div>

        <form action="registracija.php" method="post">
            <div class="container">
                <div class="row">
                    <center><div class="col-sm-8">
                        <h1 class='font'><br><br>Registracija</h1>
                        <p class='font'>Unesite podatke za registraciju</p>
                        <hr class="mb-3" style="height: 4px;">

                        <label for="firstname"><b>Ime</b></label><br>
                        <input class="form-control" type="text" name="firstname" placeholder="Ime" <?= $style_a ?> required><br>

                        <label for="lastname"><b>Prezime</b></label><br>
                        <input class="form-control" type="text" name="lastname" placeholder="Prezime" <?= $style_a ?> required><br>

                        <label for="username"><b>Korisničko ime</b></label><br>
                        <input class="form-control" type="text" name="username"  placeholder="Korisničko ime" <?= $style_a ?> required>

                        <center>
                            <?php echo $error_u; ?>
                        </center>

                        <?php
                        if(isset($_POST['create'])){
                            $username = $_POST['username'];
                            if(strlen($username) < 5){
                                echo '<h7 class="err_txt">Korisničko ime se mora sastojati od najmanje 5 znamenki!</br></h7>';
                            }}
                        ?>

                        <label for="email"><b>Email</b></label><br>
                        <input class="form-control" type="email" name="email" placeholder="Email" <?= $style_a ?> required style="width: 50%;"><br> 

                        <center>
                            <?php echo $error_e; ?>
                        </center>

                        <label for="adresa"><b>Adresa i kućni broj</b></label><br>
                        <input class="form-control" type="text" name="adresa"  placeholder="Adresa i kućni br." <?= $style_a ?> required><br>

                        <label for="mjesto"><b>Mjesto</b></label><br>
                        <input class="form-control" type="text" name="mjesto"  placeholder="Mjesto" <?= $style_a ?> required><br>

                        <label for="Mobitel/telefon"><b>broj</b></label><br>
                        <input class="form-control" type="text" name="broj"  placeholder="Mobitel/telefon" <?= $style_a ?> required><br>
                        
                        <label for="password"><b>Lozinka</b></label><br>
                        <input class="form-control" type="password" name="password"  placeholder="Lozinka" <?= $style_a ?> required><br>

                        <label for="password2"><b>Potvrdite lozinku</b></label><br>
                        <input class="form-control" type="password" name="password2"  placeholder="Potvrdite lozinku" <?= $style_a ?> required><br>
                        
                        <?php
                        if(isset($_POST['create'])){
                            $password = $_POST['password'];
                            $password2 = $_POST['password2'];
                            if(strlen($password) < 8 && $password != $password2){
                                echo "<h7 class='err_txt'>Lozinka se mora sastojati od najmanje 8 znakova!<br>Lozinke vam se ne podudaraju!</h7>";
                            }elseif(strlen($password) < 8){
                                echo "<h7 class='err_txt'>Lozinka se mora sastojati od najmanje 8 znakova!</br></h7>";
                            }
                            else{
                                echo "<h7 class='err_txt'>Lozinke vam se ne podudaraju!</br></h7>";
                            }
                        }
                        ?>

                        <?php 
                            
                        ?>

                        <hr class="mb-3" style="height: 4px;">
                        <input type="submit" name="create" value="Registracija" class="btn btn-outline-dark btn-lg font">
                        <hr class="mb-3" style="height: 4px;">
                    </div>
                </center></div>
            </div>
        </form>
    </main>

    <footer>
        <h5 style="font-family: 'Times New Roman', Times, serif;"><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h5>
    </footer>
</body>
</html>