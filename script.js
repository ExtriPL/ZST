function writeContent()
{
    let img = makeImg("https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Fwallpaperplay.com%2Fwalls%2Ffull%2Fc%2Fc%2Fd%2F3089.jpg&f=1&nofb=1");
    let con = makeText('Przykład', 'To jest przykładowy tekst. To jest przykładowy tekst. To jest przykładowy tekst. To jest przykładowy tekst. To jest przykładowy tekst.')

    document.getElementById("carousel").innerHTML = makeItem(img, con);
}

function makeItem(img, con)
{
    return '<div class="carousel-item active">' + img + con + '</div>';
}

function makeImg(url)
{
    return '<img src=' + url + '>'
}

function makeText(title, text)
{
    return '<div class="carousel-caption text-white"><h1 class="display-2">' + title + '</h1><h3>' + text + '</h3></div>'
}

writeContent();