<?php
echo <<<_MAIN
<div id="registerForm" class="container">
    <h1>REGISTER</h1>
    <input type="text" name="Firstname" id="firstName" placeholder="First Name">
    <input type="text" name="Lastname" id="lastName" placeholder="Last Name">
    <input type="text" name="Username" id="userUserName" placeholder="Username">
    <input type="password" name="Password" id="userPassword" placeholder="Password">
    <input type="password" name="Password" id="confirmPassword" placeholder="Confirm Password">
    <p id="note"> </p>
    
    <button id="btnRegister" onclick="getUserInfosInputs()">REGISTER</button>
    <button id="btnLogin" onclick="getLogInForm()">BACK</button>
    
    </div>
_MAIN;
?>