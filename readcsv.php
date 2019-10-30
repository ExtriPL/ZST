<?php
$table = [];


if (($h = fopen("danecsv.csv", "r")) !== FALSE) 
{
  while (($data = fgetcsv($h, 1000, ";")) !== FALSE) 
  {		
    
    $table[] = $data;
  }

  fclose($h);
}

echo $table[4][0];

?>