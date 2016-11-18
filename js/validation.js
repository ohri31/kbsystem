function magicValidate(nazivPolja, element, minLen = 0, emailRegex = false, sameValue = null, sameValueField = null, blankSpace = false) {
    var flag = "";
    var success = true;
    var inputValue = element.value;

    flag += nazivPolja + ": ";

    if (inputValue.length == 0) {
        flag += "Fill in please. ";
        success = false;
    }

    if (minLen != 0 && inputValue.length < minLen) {
        flag += "Must contain at least " + minLen + " characters. ";
        success = false;
    }

    if (emailRegex) {
        var erg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!erg.test(inputValue)) {
            flag += "Invalid e-mail format. ";
            success = false;
        }
    }

    if (!blankSpace) {
        var bs = /\s/;
        if (bs.test(inputValue)) {
            flag += "No whitespaces alloawed. ";
            success = false;
        }
    }

    if (sameValue != null) {
        if (sameValue != inputValue) {
            flag += "Value must be the same as the value of " + sameValueField + " field. ";
            success = false;
        }
    }

    if (!success) {
        console.log(element.nextSibling.nextElementSibling.innerHTML);
        element.nextSibling.nextElementSibling.innerHTML = flag;
        element.style.borderColor = "#e74c3c";
    } else {
        element.nextSibling.nextElementSibling.innerHTML = "";
        element.style.borderColor = "#d5d5d5";
    }

    return success;
}

function selectValidate(elementName, element) {
    if (element.options[element.selectedIndex].hasAttribute('disabled')) {
        element.nextSibling.nextElementSibling.innerHTML = elementName + ": Please, select a valid option.";
        element.style.borderColor = "#e74c3c";
        return false;
    }
    element.nextSibling.nextElementSibling.innerHTML = "";
    element.style.borderColor = "#d5d5d5";
    return true;
}


/* Validation trigger functions */

/* Login validation trigger */
function validateLogin() {
    var gv = true;

    /* Vlaidation content */
    if (!magicValidate("E-mail", document.getElementById('login-email'), 0, true)) gv = false;
    if (!magicValidate("Password", document.getElementById('login-pass'), 8)) gv = false;

    if (!gv) event.preventDefault();
}

function validateRegister() {
    var gv = true;

    /* Vlaidation content */
    if (!magicValidate("E-mail", document.getElementById('register-email'), 0, true)) gv = false;
    if (!magicValidate("Password", document.getElementById('register-pass'), 8)) gv = false;
    if (!magicValidate("Repeated password", document.getElementById('register-pass-repeat'), 8, false, document.getElementById('register-pass').value, "Password")) gv = false;
    if (!magicValidate("Organisation", document.getElementById('register-organisation'), 0, false, null, null, true)) gv = false;

    if (!gv) event.preventDefault();
}

function validateCreate() {
    event.preventDefault();
    var gv = true;

    /* Vlaidation content */
    if (!magicValidate("Article title", document.getElementById('content-title'), 120, false, null, null, true)) gv = false;
    if (!magicValidate("Article description", document.getElementById('content-description'), 280, false, null, null, true)) gv = false;
    if (!magicValidate("Content", document.getElementById('content-body'), 0, false, null, null, true)) gv = false;
    if (!selectValidate("Knowledge base", document.getElementById("content-kb"))) gv = false;
    if (!selectValidate("Category", document.getElementById("content-category"))) gv = false;

    if (!gv) event.preventDefault();
}