<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Offer Page</title>
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
            <h1>Dodaj ogłoszenie</h1>
            <div class="offer-container">
                <form action="add_offer" method="POST" ENCTYPE="multipart/form-data">
                    <div class="messages">
                        <?php
                            if(isset($messages)){
                                foreach($messages as $message) {
                                    echo $message;
                                }
                            }
                        ?>
                    </div>
                    <label class="offer-container-text" id="offer-container-province">Województwo</label>
                    <select name="offer-province" id="province-select">
                        <option value="">Województwo</option>
                        <?php foreach ($provinces as $province): ?>
                            <option value="<?= $province["name"]; ?>"><?= $province["name"]; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label class="offer-container-text" id="offer-container-city">Miasto</label>
                    <input name="offer-city" type="text" placeholder="Miasto">

                    <label class="offer-container-text" id="offer-container-number-of-people">Ilosc osób</label>
                    <input name="offer-number-of-people" type="text" placeholder="Ilosc osób">

                    <label class="offer-container-text" id="offer-container-time">Czas</label>
                    <input name="offer-time" type="text" placeholder="Czas">

                    <label class="offer-container-text" for="img">Wybierz zdjecie:</label>
                    <input type="file" id="img" name="file" accept="image/*">

                    <button type="submit" class="button" id="registration-button">Utwórz</button>
                </form>
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