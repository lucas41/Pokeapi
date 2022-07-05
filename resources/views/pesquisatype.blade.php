<?php
$nome =  $json->name;

echo "<h2> Nome dos pomeons dos tipo ". $nome . "</h2>";


foreach ($json->pokemon as $k => $v) {
    echo $v->pokemon->name . '<br>';
  }
?>