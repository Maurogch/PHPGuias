<?php
    $array = array(1,2,3,4,5);

    foreach($array as $key => $value){ /*recorrer un array con string como indice*/
		echo "Indice " . $key . ", valor: " . $value . "<br>";
    }
    
    echo "<br><br>";

    array_splice($array, 1, 1);

    foreach($array as $key => $value){ /*recorrer un array con string como indice*/
		echo "Indice " . $key . ", valor: " . $value . "<br>";
    }
?>