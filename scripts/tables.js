/*
    table - tabela z danymi
    columns - kolumny, które chcemy wyświetlić
    addLP - czy dodać liczbę porządkową
*/
function createTable(table, columns, addLP = true)
{
    if(columns.length == 0)
    {
        columns = [];
        for(col of table[0])
        {
            columns.push(col);
        }

        //console.log(columns);
    }
    //console.log(columns);

    let naglowek;
    naglowek = "<tr>";
    if(addLP) naglowek += "<th>L.p.</th>";
    for(col of table[0])
    {
        if(columns.includes(col))naglowek+="<th>" + col + "</th>";
    }
    naglowek+="</tr>";
    document.getElementById("header").innerHTML += naglowek;
    
    let max = 11;
    if(table.length < max) max = table.length;
    for(let i = 1; i < max; i++)
    {
        let wiersz;
        wiersz="<tr>";
        if(addLP)wiersz += "<td>"+ i + "</td>";
        for(let j = 0; j < table[i].length; j++)
        {
            let col = table[i][j];
            if(columns.includes(table[0][j]))wiersz+="<td>" + col + "</td>";
        }
        wiersz+="</tr>";
        document.getElementById("dane").innerHTML += wiersz;
    }
}