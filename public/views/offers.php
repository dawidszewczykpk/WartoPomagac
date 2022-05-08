<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="../public/css/offer.css">
    <script type="text/javascript" src="../public/js/offers.js" defer></script>
    <meta charset="utf-8">
    <title>Search Page</title>
</head>

<body>
<div class="search-container">
    <nav>
        <ul class="header-nav">
            <li class="header-li"><img src="../img/logo.svg"></li>
            <li id="header-li-show-search" class="header-li" style="display: none;"><a href="add_offer" >Dodaj ogłoszenie</a></li>
            <?php
            if(isset($_SESSION['email'])){
                echo "<script type=\"text/javascript\">document.getElementById('header-li-show-search').style.display = 'block';</script>";
            }?>
            <li class="header-li"><a href="search">Szukaj</a></li>
        </ul>
    </nav>

    <body>

    <div class="show-offers-container">
        <div id="full-photo-section">
            <img src="../img/czarny.jpg">
            <button class="button" id="show-offer-button">Wiecje informacji</button>
        </div>
        <section id="offers-section">
            <?php foreach ($offersList as $offer): ?>
                <div class="single-offer">
                    <img src="/public/uploads/<?= $offer->getImage(); ?>">
                    <div>
                        <ul class="header-nav">
                            <li class="single-offer-li">
                                <p id="single-offer-city"> Miasto: <?= $offer->getCity(); ?></p>
                            </li>
                            <li class="single-offer-li">
                                <p id="single-offer-peoples">Ilosc osob: <?= $offer->getNumberOfPeople(); ?></p>
                            </li>
                            <li class="single-offer-li">
                                <p id="single-offer-time">Czas: <?= $offer->getHowLong(); ?> miesiace</p>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
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