<?php

echo '<h2>HABILIDADES</h2>';
foreach($json->abilities as $k => $v) {
    echo $v->ability->name.'<br>';
}
echo '<h2> Nome </h2>';
echo $json->forms[0]->name;
echo '<h2>TIPO</h2>';
echo $json->types[0]->type->name;
echo '<h2>FOTOS</h2>';
echo '<img src="'.$json->sprites->front_default.'" width="200">';
echo '<img src="'.$json->sprites->back_default.'" width="200">';


?>