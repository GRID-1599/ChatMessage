<?php
echo <<<_MAIN
<div id = "loginPage">   
        <h1>LOGIN</h1>

        <input type="text" name="Username" id="userName" placeholder="Username">

        <input type="password" name="Password" id="password" placeholder="Password">

        <p id="note"> </p>

        <button id="btnLogin" onclick="getUsers()">LOG IN</button>

        <button id="btnRegister" onclick="getRegistrationForm()">REGISTER</button>

    </div>
_MAIN;
?>