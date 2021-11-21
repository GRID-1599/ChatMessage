<?php
session_start();

$_SESSION['userName'] = $_GET['userName'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Activity 5 | Home Page</title>
    <link rel="stylesheet" href="css/homePageStyle.css">
    <script src="js/flowScript.js"></script>
    <script src="js/homePageScript.js"></script>
    <script src="js/tableScript.js"></script>
    <script src="js/chatWindow.js"></script>

</head>

<body>

    <header>
        <img id='userProfile' src='user pics/default.png'>
        <div id='accountCont'> 
            <label id='account'>Account: </label>
            <label id='user'> " + userName + "</label>
            <br>
            <button id="btnEdit" onclick='profileEdit()'>Edit Profile</button>
        </div>
        <nav id='profileCont'>
            
            <button id='btnLogOut' onclick='logOut()'>LOG OUT</button>
            
        </nav>
    </header>

    <section id="editProfile">
        <button id="closeButton" onclick="closeModal()">&times</button>
        <div id="imagePreview">
            <img src="" alt="User Profile" id="image">
        </div>
        <form id="formImage" onsubmit="return false">
            <input type="file" name="image" id="btnImageInput" accept="image/png, image/gif, image/jpeg">
            <br>
            <button id="doneButton" onclick="done()">Done</button>
        </form>
    </section>

    <section id="tableDisplay"></section>
    <section id="modalContainer"></section>

    <section id="activeUserWindow">
        <label> List of Active Users </label><br>
        <div id="listOfUser"></div>
    </section>

    <div id="chatWindow">
        <div id="head">
            <label id="userToChat"></label>
            <button id="closeChat" onclick="closeMessage()">&times</button>
        </div>
        <div id="chatMessages">
           
        </div>
        <div id="chatInputs">
            <textarea name="chatText" id="chatText" cols="35"></textarea>
            <button onclick="send()">Send</button>
        </div>
    </div>

</body>

</html>