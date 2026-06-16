<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Наши проекты</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/projects.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/projects.css">
    <link rel="stylesheet" href="css/adaptiv.css">

    <script src="js/menu.js" defer></script>
</head>
<body>

<?php include 'header.php'; ?>

<main class="catalog-page">
    <div class="catalog-hero">
        <div class="container">
            <h1 class="catalog-title">Наши проекты</h1>
        </div>
    </div>

    <div class="container">
        <div class="city-tabs">
            <button class="tab-btn active" onclick="filterCity('belokurikha')">Белокуриха</button>
            <button class="tab-btn" onclick="filterCity('barnaul')">Барнаул</button>
        </div>

        <div class="projects-grid active" id="belokurikha">
            <article class="project-card">
                <div class="card-img-wrap">
                    <img src="img/projects/novoe.jpg" alt="Новое пространство">
                    <div class="card-badges">
                        <span class="badge status">Дом сдан</span>
                        <span class="badge promo">3% ипотека</span>
                    </div>
                    <div class="card-price">от 5.4 млн. ₽</div>
                </div>
                <div class="card-body">
                    <div class="card-header">
                        <h3>Новое пространство</h3>
                        <div class="card-discount">Скидка 15%</div>
                    </div>
                    <p class="card-address">Белокуриха, ул. Набережная, 36</p>
                    <p class="card-desc">Уютный жилой комплекс у реки в тихом центре города.</p>
                </div>
            </article>

            <article class="project-card">
                <div class="card-img-wrap">
                    <img src="img/projects/soboleva.jpg" alt="Дом на Соболева">
                    <div class="card-badges">
                        <span class="badge status">Дом сдан</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-header">
                        <h3>Дом на Соболева</h3>
                        <div class="card-discount">Скидка 20%</div>
                    </div>
                    <p class="card-address">Белокуриха, ул. Соболева, 22</p>
                    <p class="card-desc">Современный дом с большими квартирами в сердце города-курорта.</p>
                </div>
            </article>
        </div>

        <div class="projects-grid" id="barnaul">
            <article class="project-card">
                <div class="card-img-wrap">
                    <img src="img/projects/severnoe.jpg" alt="Северное сияние">
                    <div class="card-badges">
                        <span class="badge status build">4 квартал 2027</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-header">
                        <h3>Северное сияние</h3>
                    </div>
                    <p class="card-address">Барнаул, ул. Папанинцев, 161</p>
                    <p class="card-desc">Комфортный жилой комплекс клубного типа в центре Барнаула.</p>
                </div>
            </article>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>

<script>
function filterCity(cityId) {
    document.querySelectorAll('.projects-grid').forEach(grid => grid.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
    
    document.getElementById(cityId).classList.add('active');
    event.currentTarget.classList.add('active');
}
</script>

</body>
</html>