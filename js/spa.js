function loadPartial(partialName) {
    var ajaxRequest = new XMLHttpRequest();
    ajaxRequest.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("partials-container").innerHTML = this.responseText;
        }
    };
    ajaxRequest.open("GET", partialName, true);
    ajaxRequest.send();
}

window.onload = function(e) {
    //loadPartial('partials/landing/index.html');
}

function triggersearch(){
	var ajaxRequest = new XMLHttpRequest();
	var term = document.getElementById('search').value;
    ajaxRequest.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        	console.log(this.responseText);
            document.getElementById("show").innerHTML = this.responseText;
        }
    };
    ajaxRequest.open("POST", "services.php", true);
    ajaxRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajaxRequest.send("term="+term);
}