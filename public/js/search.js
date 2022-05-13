const province = document.getElementById("province-select");
const city = document.getElementById("city");
//offers
const leftClick = document.getElementById("left");
const rightClick = document.getElementById("right");

const showPanelLeft = document.getElementsByClassName("show-panel-left-center");
const showPanelCenter = document.getElementsByClassName("show-panel-center");
const showPanelRight = document.getElementsByClassName("show-panel-right-center");

leftClick.addEventListener("click", function (event) {
    leftClickFunction();
});
rightClick.addEventListener("click", function (event) {
    rightClickFunction();
});

province.addEventListener("change", function (event) {

    console.log(this.value);
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

function leftClickFunction() {
    const newOffer = randomNewOffer();
    showPanelLeft[0].innerHTML = showPanelCenter[0].innerHTML;
    showPanelCenter[0].innerHTML = showPanelRight[0].innerHTML;
    showPanelRight[0].innerHTML = newOffer.innerHTML;
}

function rightClickFunction() {
    const newOffer = randomNewOffer();
    showPanelRight[0].innerHTML = showPanelCenter[0].innerHTML;
    showPanelCenter[0].innerHTML = showPanelLeft[0].innerHTML;
    showPanelLeft[0].innerHTML = newOffer.innerHTML;
}

function randomNewOffer() {
    fetch("/random", {
         method: "GET",
         headers: {
             'Content-Type': 'application/json'
         }
     }).then(function (response) {
         return response.json()
     }).then(function (offer) {
         return showNewOffer(offer)
     });
}

function showNewOffer(offer) {
    const template = document.querySelector("#offer-template");

    const clone = template.cloneNode(true);
    console.log(offer.image);
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${offer.img}`;
    const ul = clone.querySelector(".show-panel-ul");
    const liProvince = clone.querySelector("#show-panel-province");
    liProvince.innerHTML = offer.province;
    const liCity = clone.querySelector("#show-panel-city");
    liCity.innerHTML = offer.city;
    const liAmmount = clone.querySelector("#show-panel-ammount");
    liAmmount.innerHTML = offer.number_of_people;
    const liTime = clone.querySelector("#show-panel-time");
    liTime.innerHTML = project.time;
    ul.appendChild(liProvince);
    ul.appendChild(liCity);
    ul.appendChild(liAmmount);
    ul.appendChild(liTime);

    return clone;
}