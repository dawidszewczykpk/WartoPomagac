const province_add_offer = document.getElementById("offer-province-select");
const city_add_offer = document.getElementById("offer-city");

province_add_offer.addEventListener("change", function (event) {
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
        city_add_offer.innerHTML = "";
        city_add_offer.add(new Option('Miasto', ''));
        cities.forEach(_city => {
            city_add_offer.add(new Option(_city['name'], _city['name']));
        });

    });
});
