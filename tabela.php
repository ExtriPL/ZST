<!DOCTYPE html>
<html lang="pl">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- <script src="scripts\galeria.js"></script> -->

        <title>Strona dla ZST</title>
    </head>
    <body>
            
            
       
        <?php
        $table = [];


        if (($h = fopen("zebranie.csv", "r")) !== FALSE) 
        {
        while (($data = fgetcsv($h, 1000, ";")) !== FALSE) 
        {		
            
            $table[] = $data;
        }

        fclose($h);
        }

        ?>

        

        <table class="table">
        <thead class="thead-dark" id="header">
            
        </thead>
            <tbody id="dane">               
            </tbody>
        </table>


        <script>
        var tabelka = <?php echo json_encode($table)?>;
        
        console.log(tabelka);

        let naglowek;
            naglowek="<tr>";
        for(col of tabelka[0])
        {
            naglowek+="<th>" + col + "</th>";
        }
        naglowek+="</tr>";
        document.getElementById("header").innerHTML += naglowek;
        
        for(let i = 1; i<tabelka.length; i++)
        {
            
            let wiersz;
            wiersz="<tr>";
            for(let col of tabelka[i])
            {
                
                wiersz+="<td>" + col + "</td>";
            }
            wiersz+="</tr>";
            document.getElementById("dane").innerHTML += wiersz;
        }
        </script>

        <!-- <script src="scripts\weather.js"></script>
        <script src="scripts\resize.js"></script>
        <script src="scripts\time.js"></script>
        <script src="scripts\refresh.js"></script> -->
        
    </body>
</html>