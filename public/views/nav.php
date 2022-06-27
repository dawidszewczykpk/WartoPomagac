<nav>
    <ul class="header-nav">
        <li class="header-li"><img src="../img/logo.svg"></li>
        <li id="header-li-show-search" class="header-li" style="display: none;"><a href="add_offer" >Dodaj ogłoszenie</a></li>
        <?php
        if(isset($_SESSION['email']) && isset($_SESSION['permission']) && $_SESSION['permission'] === 2){
            echo "<script type=\"text/javascript\">document.getElementById('header-li-show-search').style.display = 'block';</script>";
        }?>
        <li class="header-li"><a href="search">Szukaj</a></li>
        <li class="header-li" id="logout" style="display: none;"><a href="logout" >Logout</a></li>
        <?php
        if(isset($_SESSION['email'])){
            echo "<script type=\"text/javascript\">document.getElementById('logout').style.display = 'block';</script>";
        }?>
    </ul>
</nav>