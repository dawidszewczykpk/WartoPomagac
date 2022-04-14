const offerClick = document.querySelectorAll(".single-offer");
const fullPhoto = document.getElementById("full-photo-section");

function maxImage() {
    fullPhoto.getElementsByTagName('img')[0].src = this.getElementsByTagName('img')[0].src;
}
offerClick.forEach(div => div.addEventListener("click", maxImage));