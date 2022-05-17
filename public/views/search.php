<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <script type="text/javascript" src="../public/js/search.js" defer></script>
    <meta charset="utf-8">
    <title>Search Page</title>
</head>

<body>
    <div class="search-container">
        <?php include 'nav.php';?>
        <body>
            <h1>Wyszukaj oferte</h1>
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <form class="search-panel" action="show_offers" method="POST">
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

                <button type="submit" class="button" id="search-button">Szukaj</button>
            </form>
            <div class="show-offerts-panel">

                <div class="show-panel-left">
                    <div id="left">
                        <img src="../img/angle-left-solid.svg">
                    </div>
                </div>

                <div class="show-panel-left-center"></div>

                <div class="show-panel-center"></div>

                <div class="show-panel-right-center"></div>

                <div class="show-panel-right">
                    <div id="right">
                        <img src="../img/angle-right-solid.svg">
                    </div>
                </div>
            </div>
        </body>

        <?php include 'footer.php';?>
    </div>
</body>

<template class="offer-template">
    <img class="show-panel-img" src="">
    <ul class="show-panel-ul">
        <li class="show-panel-province"></li>
        <li class="show-panel-city"></li>
        <li class="show-panel-ammount"></li>
        <li class="show-panel-time"></li>
    </ul>
    <button class="button-show-panel"></button>
</template>