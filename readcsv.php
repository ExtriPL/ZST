<?php
$newTable = []; //Tabela przechowująca najnowsze wyniki
$allTables = []; //Wszystkie tabele
$scoreTable = []; //Tabela przechowująca najlepsze wyniki
$path = "competitions"; //Nazwa folderu przechowującego pliki konkursowe
$fileName = "konkurs"; //Nazwa pliku, po której mają być rozpoznawane pliki .csv
$filesCount = count(glob($path."/"."*")); //Liczba plików

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
//Uzupełnianie tabeli $newTable najnowszymi danymi
foreach($allTables[$filesCount - 1] as $value)
{
  $newTable[] = $value;
}

//tworzenie listy z punktami
foreach($allTables as $table)
{
  for($i = 0; $i < count($table); $i++)
  {
    //Zabezpieczenie przed sortowaniem tytułowego wiersza
    if(strtolower($table[$i][count($table[$i]) - 1]) != "punkty")
    {
      $reg = []; //Rejestr wpisów, po których ma zostać odnaleziony wpis w tabeli $scoreTable(imie, nazwisko, e-mail itp. ale nie po punktach)
      //Wypełnianie rejestru odpowiednimi wpisami, ostatnia kolumna jest pomijana(są to punkty)
      for($j = 0; $j < count($table[$i]) - 1; $j++)
      {
        $reg[] = $table[$i][$j];
      }
      $points = $table[$i][count($table[$i]) - 1]; //zczytywanie punktów, które następnie przypiszemy, lub dodamy, do odpowiedniego wpisu w tabeli $scoreTable
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
    }
  }
}

usort($newTable, "sorting"); //Sortowanie tabeli po liczbie punktów
usort($scoreTable, "sorting"); //Sortowanie tabeli po liczbie punktów
array_unshift($scoreTable, $newTable[0]); //Dodawanie wiersza z nagłówkami
?>