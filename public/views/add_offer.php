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
                <?php
                    if($_SESSION['email'] !== 'guest'){
                        echo "<script type=\"text/javascript\">document.getElementById('header-li-show').style.display = 'block';</script>";
                }?>
                <li id="header-li-show" class="header-li" style="display: none;"><a href="offer" >Dodaj ogłoszenie</a></li>
                <li class="header-li"><a href="search">Szukaj</a></li>
            </ul>
        </nav>

        <body>
            <h1>Dodaj ogłoszenie</h1>
            <div class="offer-container">
                <form action="addOffer" method="POST" ENCTYPE="multipart/form-data">
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
                    <input name="input-offer-container-province" type="text" placeholder="Województwo">

                    <label class="offer-container-text" id="offer-container-city">Miasto</label>
                    <input name="input-offer-container-city" type="text" placeholder="Miasto">

                    <label class="offer-container-text" id="offer-container-number-of-people">Ilosc osób</label>
                    <input name="input-offer-container-number-of-people" type="text" placeholder="Ilosc osób">

                    <label class="offer-container-text" id="offer-container-time">Czas</label>
                    <input name="input-offer-container-time" type="text" placeholder="Czas">

                    <label class="offer-container-text" for="img">Wybierz zdjecie:</label>
                    <input type="file" id="img" name="img" accept="image/*">

                    <input type="submit" value="Create" class="button" id="registration-button"></input>
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