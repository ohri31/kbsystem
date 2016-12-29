0+4function toggle_menu(id) {
    var e = document.getElementById(id);
    var showbtn = document.getElementById('smore');

    if (e.style.display == 'block' || e.style.display == 'block!important') {
        e.style.display = 'none';
        showbtn.style.float = 'right';
        showbtn.style.textAlign = 'center';
        showbtn.style.width = '60px';
        showbtn.style.paddingRight = '0px';
    } else {
        e.style.display = 'block';
        showbtn.style.float = 'right';

        showbtn.style.textAlign = 'right';
        showbtn.style.paddingRight = '20px';
    }
}

/* Tree view */
function treeView(element) {
    var sibling = element.nextSibling.nextElementSibling;
    if (sibling.style.display == 'none' || sibling.style.display == '')
        sibling.style.display = 'block';
    else
        sibling.style.display = 'none';
}
