getMovies()


function getMovies() {
    var xhr = new XMLHttpRequest()
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("tableDisplay").innerHTML = xhr.responseText;
            //getOnlineUsers()
        }
    };
    xhr.open("GET", "php/getMovies.php", true);
    xhr.send();
}

function showModal(movieCode, isShow) {
    // console.log(movieCode + " show: " + isShow)
    var modal = document.getElementById("modalContainer");
    if (isShow == false) {
        modal.style.display = "none";
    } else {
        modal.style.display = "block";
        getUsers(movieCode);

        //modalX = 210; // pang add sa x pos 
        //modaly = 160; // pang add sa y pos 

        var screeenW = window.innerWidth;
        var screeenH = window.innerHeight;
        //console.log(screeenW + " || " + screeenH);

        document.addEventListener('mousemove', (event) => {
            var modal = document.getElementById("modalContainer");
            xPos = event.clientX;
            yPos = event.clientY;
            modalX = (xPos >= (screeenW / 2)) ? -210 : 210;
            modalY = (yPos >= (screeenH / 2)) ? -160 : 160;
            modal.style.left = (event.clientX + modalX) + 'px';
            modal.style.top = (event.clientY + modalY) + 'px';
            //console.log(event.clientX + " || " + event.clientY);
        });
    }


}

function getUsers(movieCode) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/getMovie.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("modalContainer").innerHTML = xhr.responseText;
        }
    };
    xhr.send("movieCode=" + movieCode);
}