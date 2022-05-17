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
    <?php include 'nav.php';?>
    <body>
    <div class="show-offers-container">
        <div id="full-photo-section">
            <img src="/public/uploads/<?= $offersList[0]->getImage(); ?>">
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
    <?php include 'footer.php';?>
</div>
</body>