<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <script type="text/javascript" src="../public/js/script.js" defer></script>
    <meta charset="utf-8">
    <title>Register Page</title>
</head>

<body>
    <div class="search-container">
        <nav>
            <ul class="header-nav">
                <li class="header-li"><img src="../img/logo.svg"></li>
                <li class="header-li"><a href="javascript:void(0)">Dodaj ogłoszenie</a></li>
                <li class="header-li"><a href="javascript:void(0)">Szukaj</a></li>
            </ul>
        </nav>

        <body>
            <h1>Rejestracja</h1>
            <div class="registration-container">
                <form class="register" action="register" method="POST">
                    <div class="messages">
                        <?php
                            if(isset($messages)){
                                foreach($messages as $message) {
                                    echo $message;
                                }
                            }
                        ?>
                    </div>
                    <div class="container-text">Imie</div>
                    <input name="name" type="text" placeholder="Imie">
                    <div class="container-text">Nazwisko</div>
                    <input name="surname" type="text" placeholder="Nazwisko">
                    <div class="container-text">E-mail</div>
                    <input name="email" type="text" placeholder="email@email.com">
                    <div class="container-text">Hasło</div>
                    <input name="password" type="password" placeholder="haslo">
                    <div class="container-text">Potwierdź hasło</div>
                    <input name="confirmedPassword" type="password" placeholder="Potwierdz haslo">
                    <div class="container-text">Chcę dodać ofertę</div>
                    <input type="checkbox" id="want-add-offer" name="want-add-offer" value="true">
                    <button type="submit" class="button" id="registration-button">Utwórz
                    </button>
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