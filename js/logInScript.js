//var usersArr = new Array(); // arrays of users and password from user.xml
var validUserName;
var validPassword;

function getUsers() {
    // var users = new Array();
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            usersArr = xhr.responseText.split('|'); // seperator para maging array
            checkUser(usersArr);
        }
    };

    xhr.open("GET", "php/getUsers.php", true);
    xhr.send();

}

function checkUser(usersArr) {
    var userName = document.getElementById("userName").value;
    var password = document.getElementById("password").value;
    //console.log("username: " + userName + " | password: " + password);
    var note = "";
    if (userName != "") {
        if (checkUserName(userName, usersArr)) {
            if (password != "") {
                if (password == validPassword) {
                    setUserStatus(userName, true);
                    window.location.href = "homePage.php?userName=" + userName;
                    sessionStorage.setItem("username", userName);

                } else {
                    document.getElementById("password").focus();
                    note = "Login failed: Password is incorrect";
                }
            } else {
                document.getElementById("password").focus();
                note = "Please input your password"
            }
        } else {
            document.getElementById("password").value = "";
            document.getElementById("userName").focus();
            note = "Login failed: Username is incorrect";
        }
    } else {
        document.getElementById("userName").focus();
        document.getElementById("password").value = "";
        note = "Please input your username"
    }
    document.getElementById("note").innerHTML = note;
}

function checkUserName(usernameEntered, userArr) {
    //return (usernameEntered == validUserName) ? true : false;
    var flag = false;
    for (i = 0; i < userArr.length; i = i + 2) {
        if (usernameEntered == userArr[i]) {
            validUserName = userArr[i];
            validPassword = userArr[i + 1];
            flag = true;
            break;
        }
    }
    return flag;
}

function postUser() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "homePage.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // console.log(xhr.responseText);
        }
    };
    xhr.send(validUserName);
}