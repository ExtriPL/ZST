let cityId = '7532212';
let weatherRefreshInterval = 500;
let temp, pressure, humidity, temp_max, temp_min, wind_speed, wind_deg;

function getWeatherData()
{
    let request = new XMLHttpRequest();
    request.open('GET', 'http://api.openweathermap.org/data/2.5/weather?id=' + cityId + '&units=metric&appid=b67b20c37194b3c3764485580c451127', true);

    request.onload = function()
    {
        let data = JSON.parse(this.response);

        //Reading data
        temp = data.main.temp; 
        pressure = data.main.pressure;
        humidity = data.main.humidity;
        temp_min = data.main.temp_min;
        temp_max = data.main.temp_max;
        wind_speed = data.wind.speed;
        wind_deg = data.wind.deg;
    }

    //Funkcja wykonywana asynchronicznie
    request.send();
}

function reloadWeather()
{
    getWeatherData();
    reloadWeatherBar();
    reloadWeatherSlide();
}

function reloadWeatherBar()
{
    document.getElementById("temp").innerHTML = Math.round(temp) + "°C";
}

function reloadWeatherSlide()
{
    let weatherSlide = document.getElementById("weatherSlide");
    let carousel = document.getElementById("carousel");

    if(weatherSlide != null)
    {
        //reload
    }
    else
    {
        //carousel.innerHTML += '<div id="weatherSlide" class="carousel-item active h-100"><div class="row h-100"><div class="col-sm h-100" style="background-color:rgb(84, 103, 128)"><div id="weatherImage"></div><div id="weatherTemp"></div><div id="weatherTempMin"></div><div id="weatherTempMax"></div><div id="weatherHumidity"></div><div id="weatherPressure"></div><div id="weatherWindSpeed"></div><div id="weatherWindDeg"></div></div></div></div>';
    }
}

setInterval(reloadWeather, weatherRefreshInterval);
