<?php
    session_start();
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
    <script src="./assets/js/smooth-scroll.polyfills.min.js"></script>
    <link href="./assets/css/style.css" rel="stylesheet">
</head>

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
    include './quick_php/mysql.php';
    $vkey = $_GET['vkey'];
    $resultSet = $mysqli->query("SELECT * FROM users WHERE vkey = '$vkey' LIMIT 1");
    $row = $resultSet->fetch_assoc();
    $username = $row['username'];
    $email = $row['email'];

    $message = "<h5 class='font'>Korisničko ime: $username<br>Email: $email<br></h5>";
    $error = NULL;

    if(isset($_POST['reset'])){
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if($password2 == $password && strlen($password) > 7){           
            include './mysql.php';
            $password = md5($password);
            $sql = "UPDATE users SET password='$password' WHERE username='$username'";
            if ($conn->query($sql) === TRUE) { }
            $sql = "UPDATE users SET verified='1' WHERE username='$username'";
            if ($conn->query($sql) === TRUE) {
                echo '<meta http-equiv="refresh" content="0;url=./note_pages/uspjelo_azuriranje.php"/>';
            }else{}
        }elseif(strlen($password) < 8 && $password != $password2){
            $error = "<h7 class='err_txt'>Lozinka se mora sastojati od najmanje 8 znakova!<br>Lozinke vam se ne podudaraju!</h7>";
        }
        elseif(strlen($password) < 8){
            $error = "<h7 class='err_txt'>Lozinka se mora sastojati od najmanje 8 znakova!</br></h7>";
        }
        else{
            $error = "<h7 class='err_txt'>Lozinke vam se ne podudaraju!</br></h7>";
        }
    }
?>

<body style="font-family: 'Times New Roman', Times, serif; font-size: large; color: white;
background-image: url('https://toni-web.com/stable_img/coffee.jpg'); background-position-y: -81px;">
    <main>
        <form action="" method="POST">
            <div class="container">
                <div class="row">
                    <center><div class="col-sm-10">
                        <h1 class='font'><br>Resetiranje lozinke</h1>
                        <p class='font'>Unesite podatke za resetiranje</p>
                        <hr class="mb-3" style="height: 4px;">

                        <center>
                            <?php echo $message; ?>
                        </center>

                        <hr class="mb-3" style="height: 4px;">
                        <label for="password" style="text-align: left;"  class='font'><b>Lozinka</b></label><br>
                        <input class="form-control" type="password" name="password" placeholder="Unesite lozinku" style="width: 50%;" required><br>

                        <label for="password2" style="text-align: left;" class='font'><b>Potvrdite lozinku</b></label><br>
                        <input class="form-control" type="password" name="password2" placeholder="Potvrdite lozinku" style="width: 50%;" required><br>

                        <center>
                            <?php echo $error; ?>
                        </center>

                        <br><hr class="mb-3" style="height: 4px;">
                        <input type="submit" name="reset" value="Resetiraj" class="btn btn-outline-dark btn-lg font">
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