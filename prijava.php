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

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="./assets/img/logo.png" rel="icon">

    <title>Dublin's Pub - Prijava</title>

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="./assets/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="./assets/css/style.css" rel="stylesheet">
</head>

<?php
    include './quick_php/mobitel.php';
    
    $style_a = NULL;
    if($mobitel == TRUE){
        $style_a = "style='width: 90%;'";
    }else{
        $style_a = NULL;
    }
?>

<?php
    if(isset($_SESSION['user'])){
        echo '<meta http-equiv="refresh" content="0;url=user_ind.php"/>';
    }
    if(isset($_SESSION['konobar'])){
        echo '<meta http-equiv="refresh" content="0;url=narudzbe_kon.php"/>';
    }
    if(isset($_SESSION['admin'])){
        echo '<meta http-equiv="refresh" content="0;url=narudzbe_admin.php"/>';
    }
?>

<?php
    $error = NULL;

    if(isset($_POST['submit'])){
        include './quick_php/mysql.php';

        $username = $mysqli->real_escape_string($_POST['username']);
        $password = $mysqli->real_escape_string($_POST['password']);
        $password = md5($password);

        $resultSet = $mysqli->query("SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1");

        if($resultSet->num_rows != 0){
            $row = $resultSet->fetch_assoc();
            $verified = $row['verified'];
            $email = $row['email'];
            $date = date("d.m.Y - H:i", strtotime($row['email_time']));
            $vkey = $row['vkey'];
            $role = $row['role'];

            if($verified == 1 && $role == 'user'){
                $_SESSION['user'] = $_POST['username'];
                $_SESSION['user_time'] = time();
                echo '<meta http-equiv="refresh" content="0;url=user_ind.php"/>';
            }elseif($verified == 1 && $role == 'konobar'){
                $_SESSION['konobar'] = $_POST['username'];
                $_SESSION['konobar_time'] = time();
                echo '<meta http-equiv="refresh" content="0;url=narudzbe_kon.php"/>';
            }elseif($verified == 1 && $role == 'admin'){
                $_SESSION['admin'] = $_POST['username'];
                $_SESSION['admin_time'] = time();
                echo '<meta http-equiv="refresh" content="0;url=narudzbe_admin.php"/>';
            }else{
                $error = "
                    <h7 style='color: white;'>Račun još nije verificiran!<br>Već Vam je poslan email za verifikaciju na $email!</h7>
                    <br><br><a href='./quick_php/ponovno_posalji.php?email=$email'><input type='btn' name='send' value='PONOVNO POŠALJI EMAIL' class='btn btn-outline-dark btn-lg'></a>
                    <div class='container'>
                        <div class='row'>
                            <center><div class='col-sm-10'>
                    </div></div></center></div>
                ";
                if(isset($_POST['send'])){
                    $sql = "UPDATE users SET verified = 0 WHERE username = $username;";
                }
            }
        }else{
            $error = "
            <h7 class='err_txt'>Krivo unešeno korisničko ime ili lozinka!</h7>
                <div class='container'>
                    <div class='row'>
                        <center><div class='col-sm-10'>
                </div></div></center></div>
            ";
        }
    }
   
?>


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
                            <h1 class='font'><br><br>Prijava</h1>
                            <p class='font'>Unesite podatke za prijavu</p>
                        </center>
                        <hr class="mb-3" style="height: 4px; width: 100%;">
                        <center><div class="col-sm-10">
                            <label for="username" style="text-align: left;"><b>Korisničko ime</b></label><br>
                            <input class="form-control" type="text" name="username" placeholder="Korisničko ime" <?= $style_a ?> required><br>

                            <label for="password"><b>Lozinka</b></label><br>
                            <input class="form-control" type="password" name="password" placeholder="Lozinka" <?= $style_a ?> required><br>
                        </center>

                        <center>
                            <?php echo $error; ?>
                        </center>

                        <center>
                            <a href="reset.php" class="zaboravio font"><br>Zaboravio/la sam lozinku ili korisničko ime</a>
                            <a href="registracija.php" class="zaboravio font"><br>Nemam račun - želim ga izraditi</a>

                            <br><br><hr class="mb-3" style="height: 4px;">
                            <input type="submit" name="submit" value="Prijava" class="btn btn-outline-dark btn-lg font" required>
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