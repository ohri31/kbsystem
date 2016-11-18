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
    loadPartial('partials/landing/index.html');
}