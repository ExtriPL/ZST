let city = 'Radom';
let temp, pressure, humidity, temp_max, temp_min, wind_speed, wind_deg;

function getWeather()
{
    let request = new XMLHttpRequest();
    request.open('GET', 'http://api.openweathermap.org/data/2.5/weather?q=' + city + '&appid=b67b20c37194b3c3764485580c451127', true);

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

getWeather();