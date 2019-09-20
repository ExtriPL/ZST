function showTime() {
var d = new Date();
document.getElementById('date').innerHTML = data();
document.getElementById('time').innerHTML = d.getHours() + ":" + d.getMinutes();
}

function data(){
    var d = new Date();
}

window.setInterval('showTime()', 1000);