function checkForRefreshFlag() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if(this.response){
          location.reload();
        }
      }
    };
    xhttp.open("GET", "refresh.php", true);
    xhttp.send();
  }
  setInterval('checkForRefreshFlag()', 5000);