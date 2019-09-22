function checkForRefreshFlag() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText == "true"){
          location.reload();
        }
      }
    };
    xhttp.open("GET", "flag.txt", true);
    xhttp.send();
  }
  setInterval('checkForRefreshFlag()', 5000);