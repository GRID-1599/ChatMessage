function getLogInForm() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("bodyDisplay").innerHTML = xhr.responseText;
        }
    };

    xhr.open("GET", "php/logIn.php", true);
    xhr.send();
}

function getRegistrationForm() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("bodyDisplay").innerHTML = xhr.responseText;
        }
    };

    xhr.open("GET", "php/register.php", true);
    xhr.send();
}

function setUserStatus(userName, isOnline) {
    status = (isOnline == true) ? "online" : "offline";
    var data = "userName=" + userName + "&status=" + status;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/setStatus.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
        }
    };
    console.log(data);
    xhr.send(data);
}