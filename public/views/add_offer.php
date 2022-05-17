<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <script type="text/javascript" src="../public/js/add_offer.js" defer></script>
    <meta charset="utf-8">
    <title>Offer Page</title>
</head>

<body>
    <div class="search-container">
        <?php include 'nav.php';?>

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
                    <select name="offer-province" id="offer-province-select">
                        <option value="">Województwo</option>
                        <?php foreach ($provinces as $province): ?>
                            <option value="<?= $province["name"]; ?>"><?= $province["name"]; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label class="offer-container-text" id="offer-container-city">Miasto</label>
                    <select name="offer-city" id="offer-city">
                        <option value="">Miasto</option>
                    </select>

                    <label class="offer-container-text" id="offer-container-number-of-people">Ilosc osób</label>
                    <select name="offer-number-of-people" id="number-of-people">
                        <option value="">Ilość osób</option>
                        <?php for ($x = 1; $x <= 10; $x++): ?>
                            <option value="<?= $x; ?>"><?= $x; ?></option>
                        <?php endfor; ?>
                    </select>

                    <label class="offer-container-text" id="offer-container-time">Czas</label>
                    <select name="offer-time" id="number-of-people">
                        <option value="">Czas(miesiace)</option>
                        <?php for ($x = 1; $x <= 24; $x++): ?>
                            <option value="<?= $x; ?>"><?= $x; ?></option>
                        <?php endfor; ?>
                    </select>

                    <label class="offer-container-text" for="img">Wybierz zdjecie:</label>
                    <input type="file" id="img" name="file" accept="image/*">

                    <button type="submit" class="button" id="registration-button">Utwórz</button>
                </form>
            </div>
        </body>
        <?php include 'footer.php';?>
    </div>
</body>