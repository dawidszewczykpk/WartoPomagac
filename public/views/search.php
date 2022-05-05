<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="../public/css/offer.css">
    <script type="text/javascript" src="../public/js/search.js" defer></script>
    <script type="text/javascript" src="../public/js/offers.js" defer></script>
    <meta charset="utf-8">
    <title>Search Page</title>
</head>

<body>
    <div class="search-container">
        <nav>
            <ul class="header-nav">
                <li class="header-li"><img src="../img/logo.svg"></li>
                <li id="header-li-show-search" class="header-li" style="display: none;"><a href="offer" >Dodaj ogłoszenie</a></li>
                <?php
                if(isset($_SESSION['email'])){
                    echo "<script type=\"text/javascript\">document.getElementById('header-li-show-search').style.display = 'block';</script>";
                }?>
                <li class="header-li"><a href="search">Szukaj</a></li>
            </ul>
        </nav>

        <body>
            <div class="search-body-container">
                <h1>Wyszukaj oferte</h1>
                <form class="search-panel">
                    <select name="province" id="province-select">
                        <option value="">Województwo</option>
                        <?php foreach ($provinces as $province): ?>
                            <option value="<?= $province["name"]; ?>"><?= $province["name"]; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <select name="city" id="city">
                        <option value="">Miasto</option>
                    </select>

                    <select name="number-of-people" id="number-of-people">
                        <option value="">Ilość osób</option>
                        <?php for ($x = 1; $x <= 10; $x++): ?>
                            <option value="<?= $x; ?>"><?= $x; ?></option>
                        <?php endfor; ?>
                    </select>

                    <div class="button" id="search-button">
                        <p>Szukaj</p>
                    </div>
                </form>
                <div class="show-offerts-panel">
                    <div class="show-panel-left">
                        <div id="left">
                            <img src="../img/angle-left-solid.svg">
                        </div>
                    </div>
                    <div class="show-panel-left-center">
                        <div><img src="../img/czarny.jpg"></div>
                        <ul class="show-panel-ul">
                            <li class="show-panel-name" id="show-panel-name">Name Surename</li>
                            <li id="show-panel-city">Krakow</li>
                            <li id="show-panel-ammount">Pokoje: 2</li>
                            <li id="show-panel-time">Czas: 2 miesiace</li>
                        </ul>
                        <button class="button-show-panel" id="show-panel-left-button">CONTACT</button>
                    </div>
                    <div class="show-panel-center">
                        <div><img src="../img/czarny.jpg"></div>
                        <ul class="show-panel-ul">
                            <li class="show-panel-name" id="show-panel-left-name">Name Surename</li>
                            <li id="show-panel-city">Krakow</li>
                            <li id="show-panel-ammount">Miejsca: 2</li>
                            <li id="show-panel-time">Czas: 2 miesiace</li>
                        </ul>
                        <button class="button-show-panel" id="show-panel-button">CONTACT</button>
                    </div>
                    <div class="show-panel-right-center">
                        <div><img src="../img/helpbox-contact.jpg"></div>
                        <ul class="show-panel-ul">
                            <li class="show-panel-name" id="show-panel-name">sdfsdfdsf sdfdsf</li>
                            <li id="show-panel-city">fedfd</li>
                            <li id="show-panel-ammount">Pokoje: 3</li>
                            <li id="show-panel-time">Czas: 1 miesiace</li>
                        </ul>
                        <button class="button-show-panel" id="show-panel-button">CONTACT</button>
                    </div>
                    <div class="show-panel-right">
                        <div id="right">
                            <img src="../img/angle-right-solid.svg">
                        </div>
                    </div>
                </div>
            </div>

            <div class="show-offers-container" style="display: none">
                <div id="full-photo-section">
                    <img src="../img/czarny.jpg">
                    <button class="button" id="show-offer-button">Wiecje informacji</button>
                </div>
                <section id="offers-section">
                    <div class="single-offer">
                        <img src="../img/czarny.jpg">
                        <div>
                            <ul class="header-nav">
                                <li class="single-offer-li">
                                    <p id="single-offer-city"> Miasto: Krakow</p>
                                </li>
                                <li class="single-offer-li">
                                    <p id="single-offer-peoples">Ilosc osob: 2</p>
                                </li>
                                <li class="single-offer-li">
                                    <p id="single-offer-time">Czas: 2 miesiace</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-offer">
                        <img
                            src="http://critterbabies.com/wp-content/gallery/kittens/happy-kitten-kittens-5890512-1600-1200.jpg">
                        <div>
                            <ul class="header-nav">
                                <li class="single-offer-li">
                                    <p id="single-offer-city"> Miasto: Krakow</p>
                                </li>
                                <li class="single-offer-li">
                                    <p id="single-offer-peoples">Ilosc osob: 2</p>
                                </li>
                                <li class="single-offer-li">
                                    <p id="single-offer-time">Czas: 2 miesiace</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-offer">
                        <img src="../img/helpbox-contact.jpg">
                        <div>
                            <ul class="header-nav">
                                <li class="single-offer-li">
                                    <p id="single-offer-city"> Miasto: Krakow</p>
                                </li>
                                <li class="single-offer-li">
                                    <p id="single-offer-peoples">Ilosc osob: 2</p>
                                </li>
                                <li class="single-offer-li">
                                    <p id="single-offer-time">Czas: 2 miesiace</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-offer">
                        <img src="../img/czarny.jpg">
                        <div>
                            <ul class="header-nav">
                                <li class="single-offer-li">
                                    <p id="single-offer-city"> Miasto: Krakow</p>
                                </li>
                                <li class="single-offer-li">
                                    <p id="single-offer-peoples">Ilosc osob: 2</p>
                                </li>
                                <li class="single-offer-li">
                                    <p id="single-offer-time">Czas: 2 miesiace</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-offer">
                        <img src="../img/czarny.jpg">
                        <div>
                            <ul class="header-nav">
                                <li class="single-offer-li">
                                    <p id="single-offer-city"> Miasto: Krakow</p>
                                </li>
                                <li class="single-offer-li">
                                    <p id="single-offer-peoples">Ilosc osob: 2</p>
                                </li>
                                <li class="single-offer-li">
                                    <p id="single-offer-time">Czas: 2 miesiace</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-offer">
                        <img src="../img/czarny.jpg">
                        <div>
                            <ul class="header-nav">
                                <li class="single-offer-li">
                                    <p id="single-offer-city"> Miasto: Krakow</p>
                                </li>
                                <li class="single-offer-li">
                                    <p id="single-offer-peoples">Ilosc osob: 2</p>
                                </li>
                                <li class="single-offer-li">
                                    <p id="single-offer-time">Czas: 2 miesiace</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-offer">
                        <img src="../img/czarny.jpg">
                        <div>
                            <ul class="header-nav">
                                <li class="single-offer-li">
                                    <p id="single-offer-city"> Miasto: Krakow</p>
                                </li>
                                <li class="single-offer-li">
                                    <p id="single-offer-peoples">Ilosc osob: 2</p>
                                </li>
                                <li class="single-offer-li">
                                    <p id="single-offer-time">Czas: 2 miesiace</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </body>

        <footer>
            <ul class="footer-nav">
                <li class="footer-li">
                    <div><a href="javascript:void(0)">Pomoc</a> <a href="javascript:void(0)">Szukaj</a> <a
                            href="javascript:void(0)">Kontakt</a></div>
                </li>
            </ul>
        </footer>
    </div>
</body>