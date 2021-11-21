getOnlineUsers()

var seconds = 60000; // 60 secs / 1 minute
setInterval(() => {
    getOnlineUsers()
}, seconds);

function getOnlineUsers() {
    var xhr = new XMLHttpRequest()
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("listOfUser").innerHTML = xhr.responseText;
            console.log("online user updated");
        }
    };
    xhr.open("GET", "php/getOnlineUsers.php?userName=" + sessionStorage.getItem('username'), true);
    xhr.send();
    return
}

var userName = "";

function showMessageWindow(user, username) {
    getMessages()
    modal = document.getElementById("chatWindow");
    modal.style.display = "none";
    modal.style.display = "block";
    document.getElementById("userToChat").innerHTML = user
    userName = username;
    document.getElementById("chatText").value = ""
}

function closeMessage() {
    modal = document.getElementById("chatWindow");
    modal.style.display = "none";
}

function send() {
    var theMessage = document.getElementById("chatText").value;
    var thisUser = sessionStorage.getItem('username');
    var toThisUser = userName;
    var data = "from=" + thisUser + "&to=" + toThisUser + "&message=" + theMessage;

    var xhr = new XMLHttpRequest()
    xhr.open("POST", "php/postChatMessage.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText)
        }
    };
    xhr.send(data);
    document.getElementById("chatText").value = ""
        //console.log(messages)
}
setInterval(() => {
    getMessages()
}, 1000);


function getMessages() {
    if (userName != "") {
        var thisUser = sessionStorage.getItem('username');
        var toThisUser = userName;
        var xhr = new XMLHttpRequest()
        xhr.open("GET", "php/getChatMessages.php?fromThisUser=" + thisUser + "&toThisUser=" + toThisUser, true);
        xhr.onreadystatechange = () => {
            if (xhr.readyState == 4 && xhr.status == 200) {
                //console.log(xhr.responseText)
                document.getElementById("chatMessages").innerHTML = xhr.responseText
            }
        };
        xhr.send();
    }
}