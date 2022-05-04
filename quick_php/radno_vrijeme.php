<?php
    $vrijeme_sat = (int) date("H");
    $vrijeme_sat = $vrijeme_sat + 1;
    $pocetni_sat = '7';
    $zavrsni_sat = '23';
        
    if($vrijeme_sat < $pocetni_sat  || $vrijeme_sat >= $zavrsni_sat){
        echo '<meta http-equiv="refresh" content="0;url=../note_pages/izvan_vremena.php"/>';
    }
?>