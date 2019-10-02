function createSlides(fileList)
{
    for(let i = 0; i < fileList.length; i++)
    {
        let s = '';
        if(i == 0) s = ' active';
        document.getElementById("carousel").innerHTML += '<div class="carousel-item' + s +'"><img src=images/' + fileList[i] + ' alt="Tło"></div>';
    }
    
}