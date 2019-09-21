let cityId = '7532212';
let weatherRefreshInterval = 500;
let temp;//, pressure, humidity, temp_max, temp_min, wind_speed, wind_deg;

function getWeatherData()
{
    let dailyrequest = new XMLHttpRequest();
    let weatherForecast = new XMLHttpRequest(); //Pogoda na kilka dni
    dailyrequest.open('GET', 'http://api.openweathermap.org/data/2.5/weather?id=' + cityId + '&units=metric&appid=b67b20c37194b3c3764485580c451127', true);
    weatherForecast.open('GET', 'http://api.openweathermap.org/data/2.5/forecast/daily?id=' + cityId + '&cnt=3&appid=7a2866a17c9ee6d742b9e02da5561421', true);

    dailyrequest.onload = function()
    {
        let data = JSON.parse(this.response);

        //Reading data
        temp = data.main.temp; 
        /*pressure = data.main.pressure;
        humidity = data.main.humidity;
        temp_min = data.main.temp_min;
        temp_max = data.main.temp_max;
        wind_speed = data.wind.speed;
        wind_deg = data.wind.deg;*/
    }
    weatherForecast.onload = function()
    {
        let data = JSON.parse(this.response);
        //console.log(data);
    }

    //Funkcja wykonywana asynchronicznie
    dailyrequest.send();
    weatherForecast.send();
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
        //generate
    }
}

setInterval(reloadWeather, weatherRefreshInterval);