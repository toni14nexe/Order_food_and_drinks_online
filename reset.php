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
    if(isset($_SESSION['admin'])){
        echo '<meta http-equiv="refresh" content="0;url=admin.php"/>';
    }
?>

<?php
    $error = NULL;

    if(isset($_POST['reset'])){
        $email = $_POST['email'];
        include './quick_php/mysql.php';
        $resultSet = $mysqli->query("SELECT * FROM users WHERE email = '$email' LIMIT 1");
        $row = $resultSet->fetch_assoc();
        
        if($resultSet->num_rows != 0){
            $vkey = $row['vkey'];
            $username = $row['username'];
            $mysqli->query("UPDATE users SET verified = 0 WHERE vkey = '$vkey' LIMIT 1");
            $vkey2 = md5(time().$username);
            $mysqli->query("UPDATE users SET vkey='$vkey2' WHERE vkey = '$vkey' LIMIT 1");
    //LOKALNI MAIL
    //        $to = $email;
    //        $subject = "Resetiranje lozinke - Dublin's pub";
    //        $message = "
    //            Za resetiranje Dublin's pub računa kliknite na poveznicu:
    //            <a href='$vkey2_link$vkey2'>resetiranje</a>
    //            <br>Vaš email: $email<br>Vaš username: $username<br>
    //        ";
    //        $headers = "From: toni14nexe@gmail.com \r\n";
    //        $headers .= "MIME-Version: 1.0" . "\r\n";
    //        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    //        mail($to,$subject,$message,$headers);
    //ONLINE MAIL        
            ini_set( 'display_errors',1 );
            error_reporting( E_ALL );
            $to = $email;
            $subject = "Resetiranje lozinke - Dublin's pub";
            $message = "
                Za resetiranje Dublin's pub računa kliknite na poveznicu:
                <a href='$vkey2_link$vkey2'>resetiranje</a>
                <br>Vaš email: $email<br>Vaš username: $username<br>
            ";
            $headers .= "From: Dublin's Pub <dublinspub@toni-web.com> \r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail($to,$subject,$message, $headers);
    //                          
                              
            echo '<meta http-equiv="refresh" content="0;url=./note_pages/uspjelo_slanje.php"/>';
        }else{
            $error = "<h7 style='color: white;'>Ne postojeća email adresa!</h7>";
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

    <title>Dublin's Pub - Reset lozinke</title>

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="./assets/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="./assets/css/style.css" rel="stylesheet">
</head>
<body style="font-family: 'Times New Roman', Times, serif; font-size: large; color: white;
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
        <form action="" method="POST">
            <div class="container">
                <div class="row">
                    <center><div class="col-sm-10">
                        <h1><br><br>Resetiranje lozinke</h1>
                        <p>Unesite podatke za resetiranje</p>
                        <hr class="mb-3" style="height: 4px;">

                        <label for="username" style="text-align: left;"><b>Vaš email</b></label><br>
                        <input class="form-control" type="email" name="email" placeholder="Unesite email" style="width: 50%;" required><br>

                        <center>
                            <?php echo $error; ?>
                        </center>

                        <br><hr class="mb-3" style="height: 4px;">
                        <input type="submit" name="reset" value="Resetiraj" class="btn btn-outline-dark btn-lg" required>
                        <hr class="mb-3" style="height: 4px;">
                </center></div>
            </div>
        </form>
    </main>

    <footer>
        <h5 style="font-family: 'Times New Roman', Times, serif;"><br>Copyright 2022 Ⓒ Toni Kolarić<br><br></h5>
    </footer>

</body>
</html>