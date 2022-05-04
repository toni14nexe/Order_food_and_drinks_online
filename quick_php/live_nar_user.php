<?php
    session_start();
?>

<?php
    if(isset($_SESSION['user'])){
        $username_mess = $_SESSION['user'];
    }else{
        echo '<meta http-equiv="refresh" content="0;url=../note_pages/odjava.php"/>';
    }
?>

<?php
        echo '<meta http-equiv="refresh" content="600;url=./note_pages/odjava.php?auto_odjava"/>';
        
        include '../quick_php/mysql.php';

        $date = date("d.m.Y.");

        $stmt = $conn->prepare("SELECT * FROM narudzbe WHERE user='$username_mess' ORDER BY vrijeme DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0){
            echo "
                <center>
                <h3 style='color: white;'>Nemate ni jednu narudžbu danas!</h3>
                <br><hr class='mb-4'>
                </center>
            ";
        }else{
            echo "
            <center><h5 style='color: white;'>Za otkazivanje/promjenu narudžbe nazovite nas na 000-000 ili zatražite poziv klikom
                na za to predviđenu tipku uz narudžbu!<br>Ukoliko se nakon toga ne javite, narudžba se automatski otkaziva!</h5>
            <hr class='mb-4'></center>
        ";
        }

        while($row = $result->fetch_assoc()){
            $id = $row['id'];
            $status = $row['status'];
            $ocekivati = NULL;
            $predano = NULL;
            $poslana = NULL;
            $za_t = $row['za_t'];

            $boja = NULL;
            if($status == 'Poslana narudžba' || $status == NULL){
                $boja = 'rgb(32, 116, 15)';
                $poslana = '<a href="./note_pages/poziv_y_n.php?id=' . $id . '" class="otk_pro">Zatraži poziv - otkazivanje/promjena</a>';
            }elseif($status == 'U izradi'){
                $boja = 'orange';
                $ocekivati = '<u>Poruka u ' . date("H:i", strtotime($row['dostava_t'].' +1 hour')) . '</u> Očekivati za ' . $za_t .
                    '<br><a href="./note_pages/poziv_y_n.php?id=' . $id . '" class="otk_pro">Zatraži poziv - otkazivanje/promjena</a>';
            }elseif($status == 'Predano dostavi'){
                $boja = 'red';
                $predano = ' u ' . date("H:i", strtotime($row['dostava_t'].' +1 hour'));
            }elseif($status == 'Poziv'){
                $status = 'Zatražen poziv!';
                $boja = 'blue';
            }elseif($status == 'Otkazano'){
                $boja = 'rgb(80, 80, 80)';
            }else{}

            echo "<form action='' method='post'><center><div class='dropdown' style='width: 100%; background-color: black;'>";
            echo "
                <h7 style='color: white;'>ID: $id<br>$ocekivati$poslana</h7>
                <button class='btn_narudzba' style='background-color: $boja;'>
                <h7>
                &emsp; Vrijeme narudžbe: " . date("d.m.Y - H:i", strtotime($row['vrijeme'].' +1 hour')) . "<br>
                Status: $status$predano<br>
                </h7></button>
            ";
            echo "
                <div id='drop_narudzba' class='dropdown-content'
                <a class='a_narudzba'><h5>
                <input type='hidden' name='id' value='$id'>
                Adresa: $row[adresa]<br>
                Mjesto: $row[mjesto]<br>
                Mob/tel: $row[broj]<br><br>
                $row[proizvodi]<br>
                UKUPNA CIJENA: $row[cijena] kn<br>
                Napomena/komentar: $row[napomena]<br>
                &emsp;<a href='./quick_php/print_user.php?id=" . $id . "' target='_blank' style='color: white; text-decoration: underline;' class='btn_print'>Printaj</a>
                </h5></a></div></div></center></form>
                <br><hr class='mb-4'>
            ";
        }

        
    ?>