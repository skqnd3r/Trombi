function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function profile(){
    
    if (document.cookie.indexOf('profile=') != -1) {
        var profil = getCookie("profile");
        const obj = JSON.parse(profil);
        console.log(obj);
        return;
    }
    console.log('no');
}


