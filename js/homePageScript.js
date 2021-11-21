//document.getElementById("userProfile").addEventListener("load", getMovies);
setProfile()
window.addEventListener("load", function() {
    (sessionStorage.getItem("username") == null) ? window.location.replace("index.php"): false;
    document.getElementById("user").innerHTML = sessionStorage.getItem('username')
});



function setProfile() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "php/getUserProfile.php?userName=" + sessionStorage.getItem('username'), true);
    //xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("userProfile").src = xhr.responseText;
            //console.log("user profile set: " + xhr.responseText);

        }
    };
    xhr.send();
}

var thisFile;
var isPicChange = false;
// edit profile
function profileEdit() {
    var modal = document.getElementById("editProfile");
    modal.style.display = "block";


    btnImageInput = document.getElementById("btnImageInput");
    previewCont = document.getElementById("imagePreview")
    previewImage = document.getElementById("image")

    previewImage.setAttribute("src", document.getElementById("userProfile").getAttribute('src'));

    btnImageInput.addEventListener("change", function() {
        const file = this.files[0];
        thisFile = file;
        if (file) {
            reader = new FileReader();
            previewImage.style.display = "block";
            reader.addEventListener("load", function() {
                previewImage.setAttribute("src", this.result);
                isPicChange = true
            });

            reader.readAsDataURL(file);
        }
    });
    return
}

function done() {
    var data = new FormData(document.getElementById('formImage'));

    isDataNull = (data.entries().next().value) ? false : true;
    //console.log(isPicChange)

    if (isPicChange) {
        xhr = new XMLHttpRequest()
        xhr.open("POST", "php/editProfilePic.php?name=" + sessionStorage.getItem('username'), true);
        xhr.onreadystatechange = () => {
            if (xhr.readyState == 4 && xhr.status == 200) {
                setProfile()
            }
        };
        xhr.send(data);
    }

    var modal = document.getElementById("editProfile");
    modal.style.display = "none";
}

function closeModal() {
    var modal = document.getElementById("editProfile");
    modal.style.display = "none";
}





// loag out

function logOut() {
    user = sessionStorage.getItem('username')
    console.log(user);
    setUserStatus(sessionStorage.getItem('username'), false);
    sessionStorage.removeItem("username");
    window.location.href = "index.php";
}