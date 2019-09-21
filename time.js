function showTime() {
    document.getElementById('date').innerHTML = date();
    document.getElementById('time').innerHTML = time();
}

function date(){
    var d = new Date();
    var days = ["poniedziałek", "wtorek", "środa", "czwartek", "piątek", "sobota", "niedziela"];
    var months = ["I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII"];

    return days[d.getDay() - 1] + ", " + d.getDate() + " " + months[d.getMonth()] + " " + d.getFullYear();
}

function time(){
    var d = new Date();
    var minutes = d.getMinutes().toString().length == 2 ? d.getMinutes() : "0" + d.getMinutes();

    return d.getHours() + ":" + minutes;
}
showTime();

window.setInterval('showTime()', 10000);