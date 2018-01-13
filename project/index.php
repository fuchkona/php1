<?php
spl_autoload_register(function ($class_name) {
    require_once 'engine/classes/' . $class_name . '.php';
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nik's market</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main_new.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/png">
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="js/nouislider.min.js" type="text/javascript"></script>
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="container box-flex">
            <div class="header-left box-flex">
                <a href="<?= $_SERVER['SCRIPT_NAME'] ?>" class="logo">
                    <img src="images/logo.png" alt="Logo">
                    BRAN<span>D</span>
                </a>
                <form class="box-flex header-search-box">
                    <button id="browse-btn" type="button" class="btn-browse">Browse <span
                                class="fa fa-caret-down"></span>
                    </button>
                    <input type="text" placeholder="Search for Item..." class="search-input" required/>
                    <button type="submit" class="btn-search"><span class="fa fa-search"></span></button>
                </form>
            </div>

            <div class="header-right box-flex">
                <a id="main-cart-btn" class="btn-cart">
                    <img src="images/cart.png" alt="Cart">
                </a>
                <button class="btn-my-account btn-red">My Account <span class="fa fa-caret-down"></span></button>
            </div>
        </div>
    </header>
    <nav class="container nav">
        <ul>
            <li><a href="<?= $_SERVER['SCRIPT_NAME'] ?>" class="active">Home</a></li>
            <li><a href="?page=products">Man</a></li>
            <li><a href="?page=products">Women</a></li>
            <li><a href="?page=products">Kids</a></li>
            <li><a href="?page=products">Accoseriese</a></li>
            <li><a href="?page=products">Featured</a></li>
            <li><a href="?page=products">Hot Deals </a></li>
        </ul>
    </nav>
    <div>
        <?php
        if (!isset($_GET['page']) || $_GET['page'] == 'index') {
            require_once 'pages/index.php';
        } else {
            require_once 'pages/' . $_GET['page'] . '.php';
        }
        ?>
    </div>
    <div class="subscribe">
        <div class="container">
            <div>
                <div class="subscribe-panel-left">
                    <div class="subscribe-img">
                        <img src="images/face-1.png" alt="">
                    </div>
                    <div class="subscribe-text-l">
                        “Vestibulum quis porttitor dui! Quisque viverra nunc mi, <br/>a pulvinar purus condimentum a.
                        Aliquam condimentum mattis neque sed pretium”
                        <div class="subscribe-text-l-title">
                            <div class="subscribe-text-l-title-first">Bin Burhan</div>
                            <div class="subscribe-text-l-title-second">Dhaka, Bd</div>
                        </div>
                        <div class="subscribe-btn-l">
                            <div></div>
                            <div class="active"></div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <div class="subscribe-panel-right">
                    <div class="subscribe-text-r-title">Subscribe</div>
                    <div class="subscribe-text-r-sub-title">FOR OUR NEWLETTER AND PROMOTION</div>
                    <form>
                        <div class="subscribe-btn">
                            <input type="text" placeholder="Enter Your Email" required
                                   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                            <button type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-down">
        <div class="container box-flex">
            <div class="nav-down-about">
                <a href="#" class="logo">
                    <img src="images/logo.png" alt="Logo">BRAN<span>D</span>
                </a> Objectively transition extensive data rather than cross functional solutions. Monotonectally
                syndicate
                multidisciplinary materials before go forward benefits. Intrinsicly syndicate an expanded array of
                processes
                and cross-unit partnerships. <br><br>Efficiently plagiarize 24/365 action items and focused
                infomediaries.
                <br>Distinctively seize superior initiatives for wireless technologies. Dynamically optimize.
            </div>
            <div class="nav-down-menu-item nav-down-menu-item-1">
                <p>COMPANY</p>
                <nav>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">How It Works</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="nav-down-menu-item nav-down-menu-item-2">
                <p>INFORMATION</p>
                <nav>
                    <ul>
                        <li><a href="#">Tearms &amp; Condition</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">How to Buy</a></li>
                        <li><a href="#">How to Sell</a></li>
                        <li><a href="#">Promotion</a></li>
                    </ul>
                </nav>
            </div>
            <div class="nav-down-menu-item nav-down-menu-item-3">
                <p>SHOP CATEGORY</p>
                <nav>
                    <ul>
                        <li><a href="#">Men</a></li>
                        <li><a href="#">Women</a></li>
                        <li><a href="#">Child</a></li>
                        <li><a href="#">Apparel</a></li>
                        <li><a href="#">Brows All</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <footer class="copyright">
        <div class="container box-flex">
            <div>&copy; 2017 Brand All Rights Reserved.</div>
            <div class="copyright-social-btns">
                <a href="#" class="copyright-social-btn"><span class="fa fa-facebook"></span></a>
                <a href="#" class="copyright-social-btn"><span class="fa fa-twitter"></span></a>
                <a href="#" class="copyright-social-btn"><span class="fa fa-linkedin"></span></a>
                <a href="#" class="copyright-social-btn"><span class="fa fa-pinterest-p"></span></a>
                <a href="#" class="copyright-social-btn"><span class="fa fa-google-plus"></span></a>
            </div>
        </div>
    </footer>
</div>
<div id="browse-categories" class="browse-categories">
    <nav class="browse-categories-nav">
        <p>Women</p>
        <ul>
            <li><a href="#">Dresses </a></li>
            <li><a href="#">Tops </a></li>
            <li><a href="#">Sweaters/Knits </a></li>
            <li><a href="#">Jackets/Coats</a></li>
            <li><a href="#"> Blazers </a></li>
            <li><a href="#">Denim </a></li>
            <li><a href="#">Leggings/Pants</a></li>
            <li><a href="#"> Skirts/Shorts</a></li>
            <li><a href="#">Accessories</a></li>
        </ul>
    </nav>
    <nav class="browse-categories-nav">
        <p>Men</p>
        <ul>
            <li><a href="#">Tees/Tank tops </a></li>
            <li><a href="#">Shirts/Polos </a></li>
            <li><a href="#">Sweaters </a></li>
            <li><a href="#">Sweatshirts/Hoodies </a></li>
            <li><a href="#">Blazers </a></li>
            <li><a href="#">Jackets/vests </a></li>
        </ul>
    </nav>
</div>
<div id="main-cart" class="main-cart">
    <div id="main-cart-body" class="main-cart-body">

    </div>
    <a href="?page=checkout" class="checkout-btn">Checkout</a>
    <a href="?page=shopping-cart" class="go-to-cart-btn">Go to cart</a>
</div>
<script src="js/main.js" type="text/javascript"></script>
<script src="js/classes/Container.js" type="text/javascript"></script>
<script src="js/classes/Cart.js" type="text/javascript"></script>
</body>

</html>

