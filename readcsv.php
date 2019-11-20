<?php
$newTable = [];
$allTables = [];
$scoreTable = [];
$filesCount = count(glob("csv/"."*"));

//Funkcja sortujące
function sorting($a, $b)
{
  return $a[count($a) - 1] < $b[count($b) - 1];
}

function getRegistryIndex($reg, $array)
{
  $result = -1;

  //echo $reg[0] . ", " . $reg[1] . ", " . $reg[2] . "<br>";
  //echo "-------------<br>";

  for($i = 0; $i < count($array); $i++)
  {
    $row = $array[$i];
    //echo $row[0] . ", " . $row[1] . ", " . $row[2] . "<br>**********<br>";
    $correct = true;
    //echo "T". $i . " ";
    for($j = 0; $j < count($row) - 1; $j++)
    {
      if($reg[$j] != $row[$j])
      {
        //echo $reg[$j] . ", " . $row[$j] . "<br>";
        $correct = false;
        break;
      }
    }

    if($correct)
    {
      $result = $i;
      break;
    }
  }

  //echo "<br>";

  return $result;
}

//Wczytywanie plików
for($i = 1; $i <= $filesCount; $i++)
{
  if (($h = fopen("csv/konkurs".$i.".csv", "r")) !== FALSE) 
  {
    $temp = [];
    while (($data = fgetcsv($h, 1000, ";")) !== FALSE) 
    {	
        $temp[] = $data;
    }

    array_push($allTables, $temp);

    fclose($h);
  }
}
foreach($allTables[$filesCount - 1] as $value)
{
  $newTable[] = $value;
}

//tworzenie listy z punktami
foreach($allTables as $table)
{
  for($i = 0; $i < count($table); $i++)
  {
    if(strtolower($table[$i][count($table[$i]) - 1]) != "punkty")
    {
      $reg = [];
      for($j = 0; $j < count($table[$i]) - 1; $j++)
      {
        $reg[] = $table[$i][$j];
      }
      $points = $table[$i][count($table[$i]) - 1];
      $registryIndex = getRegistryIndex($reg, $scoreTable);
      if($registryIndex != -1)
      {
        
        $points2 = $scoreTable[$registryIndex][2];
        $scoreTable[$registryIndex][count($scoreTable[$registryIndex]) - 1] += $points;
        //echo $points . ", " . $points2 . ", ";
      }
      else
      {
        $reg[] = $points;
        $scoreTable[] = $reg;
        //echo $reg[0] . ", " . $reg[1] . ", " . $reg[2] . ", ";
      }
      //echo $registryIndex . " ";
      //echo $reg[0] . ", " . $reg[1] . ", " . $reg[2] . "<br>";
    }
  }
}

//Sortowanie tabel po liczbie punktów
usort($newTable, "sorting");
usort($scoreTable, "sorting");
array_unshift($scoreTable, $newTable[0]);
?>