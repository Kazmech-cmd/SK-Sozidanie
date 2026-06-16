<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>СК Созидание</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Playfair+Display:wght@700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/adaptiv.css">

    <?php
    $currentPage = basename($_SERVER['PHP_SELF'], ".php");
    if (file_exists("css/{$currentPage}.css")) {
        echo '<link rel="stylesheet" href="css/' . $currentPage . '.css">';
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/menu.js" defer></script>
</head>

<body>

    <div class="full-menu" id="fullMenu">
        <button class="close-menu" id="closeMenu">&times;</button>

        <div class="menu-wrap">
            <div class="menu-navigation">
                <div class="menu-column">
                    <span class="menu-category">Недвижимость</span>
                    <ul class="menu-links">
                        <li><a href="projects.php"><span class="nav-num">01</span> Проекты</a></li>
                        <li><a href="apartments.php"><span class="nav-num">02</span> Выбрать квартиру</a></li>
                        <li><a href="commercial.php"><span class="nav-num">03</span> Коммерческое строительство</a></li>
                    </ul>
                </div>

                <div class="menu-column">
                    <span class="menu-category">Компания</span>
                    <ul class="menu-links">
                        <li><a href="about.php"><span class="nav-num">04</span> О компании</a></li>
                        <li><a href="news.php"><span class="nav-num">05</span> Новости и акции</a></li>
                        <li><a href="pay.php"><span class="nav-num">06</span> Способы покупки</a></li>
                        <li><a href="contacts.php"><span class="nav-num">07</span> Контакты</a></li>
                    </ul>
                </div>
            </div>

            <div class="menu-sidebar">
                <div class="menu-contact-info">
                    <p class="menu-label">Наш офис</p>
                    <p class="menu-value">г. Барнаул, ул. Льва Толстого, 16</p>
                </div>
                <div class="menu-contact-info">
                    <p class="menu-label">Связаться</p>
                    <a href="tel:+70000000000" class="menu-phone">8 (800) 555-35-35</a>
                </div>
            </div>
        </div>
    </div>

    <header class="header">
        <nav class="nav-container">
            <a href="index.php" class="header-logo-block">
                <img src="img/index/logo-icon.png" alt="СЗ Созидание" class="header-logo-img">
                <div class="header-logo-text">
                    <span class="logo-main">СОЗИДАНИЕ</span>
                    <span class="logo-sub">Специализированный застройщик</span>
                </div>
            </a>

            <div class="nav-menu">
                <button class="menu-open-btn" id="openMenu">
                    <span>МЕНЮ</span>
                    <div class="burger-icon">
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </button>
            </div>
        </nav>
        <script src="js/header.js" defer></script>
    </header>