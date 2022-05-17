const province = document.getElementById("province-select");

const city = document.getElementById("city");
//offers
const leftClick = document.getElementById("left");
const rightClick = document.getElementById("right");

const showPanelLeft = document.querySelector(".show-panel-left-center");
const showPanelCenter = document.querySelector(".show-panel-center");
const showPanelRight = document.querySelector(".show-panel-right-center");

leftClick.addEventListener("click", function (event) {
    leftClickFunction();
});
rightClick.addEventListener("click", function (event) {
    rightClickFunction();
});

province.addEventListener("change", function (event) {
    const data = {province: this.value};

    fetch("/cities", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json();
    }).then(function (cities) {
        city.innerHTML = "";
        city.add(new Option('Miasto', ''));
        cities.forEach(_city => {
            city.add(new Option(_city['name'], _city['name']));
        });

    });
});

document.addEventListener("DOMContentLoaded", function(){
    randomNewOffer(showPanelLeft);
    randomNewOffer(showPanelCenter);
    randomNewOffer(showPanelRight);
});

function leftClickFunction() {
    showPanelLeft.innerHTML = showPanelCenter.innerHTML;
    showPanelCenter.innerHTML = showPanelRight.innerHTML;
    showPanelRight.innerHTML ="";
    randomNewOffer(showPanelRight);
}

function rightClickFunction() {
    showPanelRight.innerHTML = showPanelCenter.innerHTML;
    showPanelCenter.innerHTML = showPanelLeft.innerHTML;
    showPanelLeft.innerHTML ="";
    randomNewOffer(showPanelLeft);
}

function randomNewOffer(arg) {
    fetch("/random", {
         method: "GET",
         headers: {
             'Content-Type': 'application/json'
         }
     }).then(function (response) {
         return response.json()
     }).then(function (offer) {
        arg.appendChild(showNewOffer(offer))
     });
}

function showNewOffer(offer) {
    const template = document.querySelector(".offer-template");
    const element = offer[0];
    const clone = template.content.cloneNode(true);

    const image = clone.querySelector("img");
    image.src = `/public/uploads/${element.img}`;
    const ul = clone.querySelector(".show-panel-ul");
    const liProvince = clone.querySelector(".show-panel-province");
    liProvince.innerHTML = `Województwo: ${element.province}`;
    const liCity = clone.querySelector(".show-panel-city");
    liCity.innerHTML = `Miasto: ${element.city}`;
    const liAmmount = clone.querySelector(".show-panel-ammount");
    liAmmount.innerHTML = `Ilość osób: ${element.number_of_people}`;
    const liTime = clone.querySelector(".show-panel-time");
    liTime.innerHTML = `Czas: ${element.how_long} mies`;

    const buttonShow = clone.querySelector(".button-show-panel");
    buttonShow.innerHTML = "Więcej informacji";

    return clone;
}