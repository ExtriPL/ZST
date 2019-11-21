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

  for($i = 0; $i < count($array); $i++)
  {
    $row = $array[$i];
    $correct = true;
    for($j = 0; $j < count($row) - 1; $j++)
    {
      if($reg[$j] != $row[$j])
      {
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
      }
      else
      {
        $reg[] = $points;
        $scoreTable[] = $reg;
      }
    }
  }
}

//Sortowanie tabel po liczbie punktów
usort($newTable, "sorting");
usort($scoreTable, "sorting");
array_unshift($scoreTable, $newTable[0]);
?>