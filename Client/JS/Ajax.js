"use strict";

function createXMLHttpRequest(){

    var xhr;

     //if user runs on internet explorer - https://msdn.microsoft.com/en-us/library/dn423948(v=vs.85).aspx
     //https://youtu.be/r80S2CnCjLs
}


var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
    }
};
xmlhttp.open("GET", "gethint.php?q=" + str, true);
xmlhttp.send();



