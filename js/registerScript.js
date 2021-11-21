var userFirstName;
var userLastName;
var userUserName;
var userPassword;

function getUserInfosInputs() {
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var userName = document.getElementById("userUserName").value;
    var password1 = document.getElementById("userPassword").value;
    var password2 = document.getElementById("confirmPassword").value;
    var note = "";
    if (firstName == "") {
        note = "Please input your firstname"
        document.getElementById("firstName").focus()
    } else if (lastName == "") {
        note = "Please input your last name"
        document.getElementById("lastName").focus()
    } else if (userName == "") {
        note = "Please input your username"
        document.getElementById("userUserName").focus()
    } else if (password1 == "") {
        note = "Please input your password"
        document.getElementById("userPassword").focus()
    } else if (password2 == "") {
        note = "Please confirm your password"
        document.getElementById("confirmPassword").focus()
    } else {
        userFirstName = firstName;
        userLastName = lastName;
        userUserName = userName;
        if (password1 == password2) {
            userPassword = password2;
            postNewUser();
            getLogInForm();
        } else {
            note = "Please confirm again your password"
            document.getElementById("confirmPassword").focus()
            document.getElementById("confirmPassword").value = ""
        }
    }

    document.getElementById("note").innerHTML = note;

}

function postNewUser() {
    var data = "firstName=" + userFirstName + "&lastName=" + userLastName + "&username=" + userUserName + "&password=" + userPassword;
    console.log(data);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/postUser.php", true);

    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //xhr.setRequestHeader("Content-length", params.length);
    //xhr.setRequestHeader("Connection", "close");

    //xhr.setRequestHeader('Content-Type', 'application/json; charset=UTF-8')
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // console.log(xhr.responseText);
        }
    };
    xhr.send(data);
}