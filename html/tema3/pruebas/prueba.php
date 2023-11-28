<?php
$ciclos=array( "DAW"=>array("PR"=>"Programación","BD"=>"Basesde datos","DWES"=>"Desarrollowebenentornoservidor"), 
                "DAM"=>array("PR"=>"Programación","BD"=>"Basesde datos","PMDM"=>"Programaciónmultimediayde dispositivosmóviles") );

foreach( $ciclos as $ciclo => $array )
{ print"<p>".$ciclo."</p>";
     foreach( $array as $inicial => $nombre )
     { print"<p>".$inicial."->"; 
        print$nombre."</p>"; } }