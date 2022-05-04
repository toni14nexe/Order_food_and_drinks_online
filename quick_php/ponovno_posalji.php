<?php
    include './mysql.php';
    $email = $_GET['email'];
    $resultSet = $mysqli->query("SELECT * FROM users WHERE email = '$email' LIMIT 1");
    $row = $resultSet->fetch_assoc();
    $username = $row['username'];
    $vkey = $row['vkey'];

    $mysqli->query("UPDATE users SET verified = 0 WHERE vkey = '$vkey' LIMIT 1");
    $vkey2 = md5(time().$username);
    $mysqli->query("UPDATE users SET vkey='$vkey2' WHERE vkey = '$vkey' LIMIT 1");

    $to = $email;
    $subject = "Email verifikacija - Dublin's pub";
    $message = "
        Za verifikaciju Dublin's pub računa kliknite na poveznicu:
        <a href='$vkey2'>verifikacija</a>
        <br>Vaš email: $email<br>Vaš username: $username<br>
    ";
    $headers = "From: toni14nexe@gmail.com \r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    mail($to,$subject,$message,$headers);
    echo '<meta http-equiv="refresh" content="0;url=../note_pages/uspjelo_slanje.php"/>';
?>