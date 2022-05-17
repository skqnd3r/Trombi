function set_theme() {
    if (localStorage.getItem('theme') == null) {
        localStorage.setItem('theme', '0');
    } else {
        if (localStorage.getItem('theme') == 0) {
            document.body.style.backgroundImage = "url('../picture/fond-jour.png')";
        } else {
            document.body.style.backgroundImage = "url('../picture/fond-nuit1.png')";
        }
    }
}

function changeColor() {
    if (localStorage.getItem('theme') == 0) {
        document.body.style.backgroundImage = "url('../picture/fond-nuit1.png')";
        localStorage.setItem('theme', '1');
        return
    }
    if (localStorage.getItem('theme') == 1) {
        document.body.style.backgroundImage = "url('../picture/fond-jour.png')";
        localStorage.setItem('theme', '0');
        return
    }
}

function search() {
    let input = document.getElementById('barre').value; //<-id de ma barre
    let x = document.getElementsByClassName('test'); //<- nom eleve
    let y = document.getElementsByClassName('student'); //<- image eleve

    //Condition image eleve
    for (i = 0; i < y.length; i++) {
        if (!y[i].innerHTML.includes(input)) {
            y[i].style.display = "none";
        } else {
            y[i].style.display = "block";
        }
    }
}

function yo() {
    alert("L'employé a bien été ajoutée");
}

function profiler(login) {
    var url = "http://127.0.0.1:8000/profile/" + login;
    var element = document.getElementById("profilediv");
    element.setAttribute("src", url);
}

function closeprofiler() {
    var element = parent.document.getElementById("profilediv");
    element.removeAttribute("src");
}

function updateprofile(login) {
    var url = "http://127.0.0.1:8000/profile/" + login + "/update";
    var element = parent.document.getElementById("profilediv");
    element.setAttribute("src", url);
}

function admin(service) {
    if (service == null) {
        var url = "http://127.0.0.1:8000/admin";
        var element = document.getElementById("profilediv");
        element.setAttribute("src", url);
        return;
    } else {
        var url = "http://127.0.0.1:8000/admin/"+service;
        var element = parent.document.getElementById("profilediv");
        element.setAttribute("src", url);
    }
}
