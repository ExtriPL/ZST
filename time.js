function showTime() {
    var d = new Date();
    document.getElementById('date').innerHTML = data();
    document.getElementById('time').innerHTML = time();
}

function data(){
    var d = new Date();
    var date;
    var days = ["poniedziałek", "wtorek", "środa", "czwartek", "piątek", "sobota", "niedziela"];
    var months = ["I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII"];

    date = days[d.getDay() - 1] + ", " + d.getDate() + " " + months[d.getMonth()] + " " + d.getFullYear();

    return date;
}

function time(){
    var d = new Date();
    var time;
    var minutes;

    minutes = d.getMinutes().toString().length == 2 ? d.getMinutes() : "0" + d.getMinutes();

    time = d.getHours() + ":" + minutes;

    return time;
}
showTime();

window.setInterval('showTime()', 10000);