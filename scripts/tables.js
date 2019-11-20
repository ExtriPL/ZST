function createTable(table)
{
    let naglowek;
    naglowek = "<tr>";
    naglowek += "<th>L.p.</th>";
    for(col of table[0])
    {
        naglowek+="<th>" + col + "</th>";
    }
    naglowek+="</tr>";
    document.getElementById("header").innerHTML += naglowek;
    
    let max = 11;
    if(table.length < max) max = table.length;
    for(let i = 1; i < max; i++)
    {
        let wiersz;
        wiersz="<tr>";
        wiersz += "<td>"+ i + "</td>";
        for(let col of table[i])
        {
            wiersz+="<td>" + col + "</td>";
        }
        wiersz+="</tr>";
        document.getElementById("dane").innerHTML += wiersz;
    }
}