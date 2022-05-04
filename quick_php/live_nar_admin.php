<?php
    session_start();
?>


    <?php
        if(isset($_SESSION['admin'])){
            $username_mess = $_SESSION['admin'];
        }else{
            echo '<meta http-equiv="refresh" content="0;url=../note_pages/odjava.php"/>';
        }
    ?>
    
    <?php
        include '../quick_php/mysql.php';

        $date = date("d.m.Y.");

        $stmt = $conn->prepare("SELECT * FROM narudzbe WHERE id=0");
        $stmt->execute();
        $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()){
                if($row['broj'] > 0){
                echo"
                    <audio controls autoplay hidden='true'>
                    <source src='https://toni-web.com/assets/sound/mess.wav' type='audio/wav'>
                    </audio>
                ";
                $sql = "UPDATE narudzbe SET broj='0' WHERE id='0'";
                    if ($conn->query($sql) === TRUE) {}
                }else{};
            }else{};


        $stmt = $conn->prepare("SELECT * FROM narudzbe WHERE date='$date' ORDER BY vrijeme DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0){
            echo "
                <center>
                <h3 style='color: white;'>Nemate ni jednu narudžbu danas!</h3>
                <br><hr class='mb-4'>
                </center>
            ";
        }
        
        while($row = $result->fetch_assoc()){
            $br_nar = $br_nar + 1;
            $id = $row['id'];
            $status = $row['status'];
            $vrijeme = date("d.m.Y - H:i", strtotime($row['vrijeme'].' +1 hour'));
            $user = $row['user'];
            $adresa = $row['adresa'];
            $mjesto = $row['mjesto'];
            $broj = $row['broj'];
            $proizvodi = $row['proizvodi'];
            $cijena = $row['cijena'];
            $napomena = $row['napomena'];
            $ime = $row['ime_prez'];

            $boja = NULL;
            if($status == 'Poslana narudžba' || $status == NULL){
                $status = 'Primljena narudžba';
                $boja = 'red';
            }elseif($status == 'U izradi'){
                $boja = 'orange';
            }elseif($status == 'Predano dostavi'){
                $boja = 'rgb(32, 116, 15)';
            }elseif($status == 'Poziv'){
                $status = 'Zatražen poziv!';
                $boja = 'blue';
            }elseif($status == 'Otkazano'){
                $boja = 'rgb(80, 80, 80)';
            }else{}

            echo "<form action='' method='post'><center><div class='dropdown' style='width: 100%; background-color: black;'>";
            echo "
                <h7 style='color: white;'>ID: $id<br></h7>
                <button class='btn_narudzba'  style='background-color: $boja;'>
                <h7>
                &emsp; Vrijeme narudžbe: " . $vrijeme . "<br>
                Status: $status
                <br></h7></button>
            ";
            echo "
                <div id='drop_narudzba' class='dropdown-content'
                <a class='a_narudzba'><h5>
                <input type='hidden' name='id' value='$id'>
                <br><a target='_blank' style='color: white' href='./quick_php/vise_admin.php?username=$user'>$user</a><br>
                <br>Ime i prezime: $ime
                <br>Adresa: $adresa
                <br>Mjesto: $mjesto
                <br>Mob/tel: $broj<br><br>
                $proizvodi<br>
                UKUPNA CIJENA: $cijena kn<br>
                Napomena/komentar: $napomena<br>
                &emsp;<a href='./quick_php/print_admin.php?id=" . $id . "' target='_blank' style='color: white; text-decoration: underline;'>Printaj</a>
                </h5></a></div></div></center></form>
                <br><hr class='mb-4'>
            ";
        }
    ?>