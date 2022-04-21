<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <title>Login Page</title>
</head>

<body>
    <div class="container">
        <div id="logo">
            <img src="../img/logo.svg">
        </div>
        <div class="login-container">
            <form class="login" action="login" method="POST">
                <div class="messages">
                    <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>
                </div>
                <div class="container-text">E-mail</div>
                <input name="email" type="text" placeholder="email@email.com">
                <div class="container-text">Hasło</div>
                <input name="password" type="password" placeholder="hasło">
                <button type="submit" id="login-button">Kontynuuj</button>
                <div class="create-account-text"><a href="register">Utwórz konto</a></div>
            </form>
        </div>
    </div>
</body>