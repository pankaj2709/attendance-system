// ⏰ Live Time
function showTime() {
    let now = new Date();
    let time = now.toLocaleTimeString();
    document.getElementById("time").innerText = time;
}
setInterval(showTime, 1000);


function confirmLogout(){
    return confirm("Are you sure you want to Clock Out?");
}

function previewImage(input){
    let preview = document.getElementById("preview");

    if(input.files && input.files[0]){
        let reader = new FileReader();

        reader.onload = function(e){
            preview.src = e.target.result;
            preview.style.display = "block";
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function validateForm(){
    let file = document.getElementById("selfie").value;

    if(file === ""){
        alert("Please upload selfie");
        return false;
    }
    return true;
}