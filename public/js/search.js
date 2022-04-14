const form = document.querySelector("form");
const offerContainer = document.querySelector(".show-offers-container");
const searchContainer = document.querySelector(".search-body-container");
const province = document.getElementById("province");
const city = document.getElementById("city");
const numberOfPeople = document.getElementById("number-of-people");
const button = document.getElementById("search-button");

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

button.addEventListener("click", function (event) {
    console.log(searchContainer);
    searchContainer.style.display = "none";
    offerContainer.style.display = "flex";
});

function leftClickFunction() {
    const newOffer = randomNewOffer(document.getElementsByClassName("show-panel-right-center")[0]);
    showPanelLeft[0].innerHTML = showPanelCenter[0].innerHTML;
    showPanelCenter[0].innerHTML = showPanelRight[0].innerHTML;
    showPanelRight[0].innerHTML = newOffer.innerHTML;
}

function rightClickFunction() {
    const newOffer = randomNewOffer(document.getElementsByClassName("show-panel-left-center")[0]);
    showPanelRight[0].innerHTML = showPanelCenter[0].innerHTML;
    showPanelCenter[0].innerHTML = showPanelLeft[0].innerHTML;
    showPanelLeft[0].innerHTML = newOffer.innerHTML;
}

function randomNewOffer(template) {

    return showNewOffer(template, this);
    // fetch("/random", {
    //     method: "POST",
    //     headers: {
    //         'Content-Type': 'application/json'
    //     }
    // }).then(function (response) {
    //     return response.json()
    // }).then(function (offer) {
    //     return showNewOffer(offer)
    // });
}

function showNewOffer(template, offer) {
    const clone = template.cloneNode(true);

    const div = clone.querySelector("div");
    div.id = offer.id;
    const name = clone.querySelector("#show-panel-name");
    name.innerHTML = Date.now();
    const city = clone.querySelector("#show-panel-city");
    city.innerHTML = "offer.city";
    const ammount = clone.querySelector("#show-panel-ammount");
    ammount.innerHTML = "offer.ammount";
    const time = clone.querySelector("#show-panel-time");
    time.innerHTML = "offer.time";

    return clone;
}

function searchData() {
    const data = { province: province.value, city: city.value, numberOfPeople: numberOfPeople.value };
    fetch("/search", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json()
    }).then(function (offers) {
        offersSection.innerHTML = "";
        loadOffers(offers)
    });
}

button.addEventListener("click", function (event) {
    searchData
});

function loadOffers(offer) {
    projects.forEach(offer => {
        console.log(offer);
        createProject(offer);
    });
}

function createProject(offer) {
    const template = document.querySelector("#single-offer");

    //TODO open page and
    const clone = template.content.cloneNode(true);
    const div = clone.querySelector("div");
    div.id = offer.id;
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${offer.image}`;
    const offerDescriptions = clone.querySelector("ul");

    section.appendChild(clone);
}