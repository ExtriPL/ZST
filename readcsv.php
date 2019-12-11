<?php
$newTable = []; //Tabela przechowująca najnowsze wyniki
$allTables = []; //Wszystkie tabele
$scoreTable = []; //Tabela przechowująca najlepsze wyniki
$path = "competitions"; //Nazwa folderu przechowującego pliki konkursowe
$fileName = "konkurs"; //Nazwa pliku, po której mają być rozpoznawane pliki .csv
$filesCount = count(glob($path."/"."*")); //Liczba plików
$pointsColumnName = "Suma punktów"; //Nazwa kolumny z punktami
$additionalPointsFromPlace = 100; //Liczba dodatkowych punktów za 1 miejsce
$additionalPointsFromPlaceDecrease = 20; //Zmniejszeliczby punktów za każde kolejne miejsce
$placesToReward = 3; //Liczba miejsc, za które są dodatkowe punkty

//Funkcja sortujące
function sorting($a, $b)
{
  return $a[count($a) - 1] < $b[count($b) - 1];
}

//Sprawdza, który index w tabeli $array odpowiada podanym danym w tabeli $reg, muszą się zgadzać tylko te dane, które są podane w $reg. Kolejność danych nie jest istotna
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
  if (($h = fopen($path."/".$fileName.$i.".csv", "r")) !== FALSE) 
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
//Przyznawanie dodatkowych punktów za kolejność odpowiedzi
foreach($allTables as &$table)
{
  $rewardedCount = 0;

  for($i = 0; $rewardedCount < $placesToReward; $i++)
  {
    $points = &$table[$i][count($table[$i]) - 1];
    if(strtolower($points) != $pointsColumnName && $points != 0)
    {
      //echo "<script>console.log(".json_encode($table[$i]).");</script>";
      $points = "".($points + $additionalPointsFromPlace - $additionalPointsFromPlaceDecrease * $rewardedCount);
      $rewardedCount++;
      //echo "<script>console.log(".json_encode($table[$i]).");</script>";
    }
  }
}

//Uzupełnianie tabeli $newTable najnowszymi danymi
foreach($allTables[$filesCount - 1] as $value)
{
  $newTable[] = $value;
}

//tworzenie listy z punktami
foreach($allTables as $table)
{
  echo "<script>console.log(".json_encode($table).");</script>";
  for($i = 0; $i < count($table); $i++)
  {
    echo "<script>console.log(".json_encode($table[$i]).");</script>";
    //Zabezpieczenie przed sortowaniem tytułowego wiersza
    if($table[$i][count($table[$i]) - 1] != $pointsColumnName)
    {
      $reg = []; //Rejestr wpisów, po których ma zostać odnaleziony wpis w tabeli $scoreTable(imie, nazwisko, e-mail itp. ale nie po punktach)
      //Wypełnianie rejestru odpowiednimi wpisami, ostatnia kolumna jest pomijana(są to punkty)
      for($j = 0; $j < count($table[$i]) - 1; $j++)
      {
        $reg[] = $table[$i][$j];
      }
      echo "<script>console.log(".json_encode($table[$i]).");</script>";
      echo "<script>console.log(".json_encode($reg).");</script>";
      $points = $table[$i][count($table[$i]) - 1]; //zczytywanie punktów, które następnie przypiszemy, lub dodamy, do odpowiedniego wpisu w tabeli $scoreTable
      echo "<script>console.log(".$points.");</script>";
      $registryIndex = getRegistryIndex($reg, $scoreTable); //Odnaleziony index wpisu w tabeli $scoreTable
      if($registryIndex != -1) //Jeżeli index został odnaleziony, dodajemy zdobytą liczbę punktów, do tych, które już znajdują się w tabeli
      {
        $scoreTable[$registryIndex][count($scoreTable[$registryIndex]) - 1] += $points;
      }
      else //Jeżeli index nie został odnaleziony, tworzymy nowy wpis
      {
        $reg[] = $points;
        $scoreTable[] = $reg;
      }

      //echo "<script>console.log(".json_encode($reg).");</script>";
    }
  }
}

//usort($newTable, "sorting"); //Sortowanie tabeli po liczbie punktów
//usort($scoreTable, "sorting"); //Sortowanie tabeli po liczbie punktów
array_unshift($scoreTable, $newTable[0]); //Dodawanie wiersza z nagłówkami
?>