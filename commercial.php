<?php
// Отключаем вывод системных ошибок на экран, чтобы не ломать верстку
error_reporting(0);
include 'db.php';
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Коммерческое строительство — СК Созидание</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/commercial.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/adaptiv.css">
</head>

<body class="comm-page">

    <?php include 'header.php'; ?>

    <main>
        <section class="hero-comm">
            <div class="container">
                <h1>КОММЕРЧЕСКОЕ <br><span>СТРОИТЕЛЬСТВО</span></h1>
                <p>Строим для тех, кто строит бизнес. Индивидуальные решения для любых масштабов.</p>
                <a href="#callback" class="btn-gold">Обсудить проект</a>
            </div>
        </section>

        <section class="section-padding">
            <div class="container">
                <h2 class="section-label">СОЗИДАНИЕ</h2>
                <div class="stats-stepper">
                    <div class="stat-card" style="--i: 0">
                        <span class="num">23</span>
                        <p>ГОДА НА РЫНКЕ СТРОИТЕЛЬСТВА</p>
                    </div>
                    <div class="stat-card" style="--i: 1">
                        <span class="num">100+</span>
                        <p>КРУПНЫХ ПРОЕКТОВ</p>
                    </div>
                    <div class="stat-card" style="--i: 2">
                        <span class="num">9</span>
                        <p>ГОРОДОВ ПРИСУТСТВИЯ</p>
                    </div>
                    <div class="stat-card" style="--i: 3">
                        <span class="num">250к</span>
                        <p>М² ПОСТРОЕННОЙ НЕДВИЖИМОСТИ</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding light-bg">
            <div class="container">
                <div class="types-header">
                    <h2>СТРОИМ ДЛЯ ТЕХ, <br>КТО СТРОИТ БИЗНЕС</h2>
                    <p>Компания «Созидание» занимается строительством коммерческих объектов любой сложности под ключ.
                    </p>
                </div>
                <div class="types-grid">
                    <div class="type-card">
                        <div class="type-img"><img src="img/commercial/1.jpg" alt="ТЦ"></div>
                        <span>ТОРГОВЫЕ ЦЕНТРЫ</span>
                    </div>
                    <div class="type-card">
                        <div class="type-img"><img src="img/commercial/2.jpg" alt="БЦ"></div>
                        <span>БИЗНЕС-ЦЕНТРЫ</span>
                    </div>
                    <div class="type-card">
                        <div class="type-img"><img src="img/commercial/3.jpg" alt="Склады"></div>
                        <span>СКЛАДСКИЕ ЗДАНИЯ</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding light-bg">
            <div class="container">
                <div class="why-layout">
                    <div class="why-title">
                        <h2>ПОЧЕМУ <br>ВЫБИРАЮТ НАС</h2>
                    </div>
                    <div class="benefits-grid">
                        <div class="benefit">
                            <span class="b-num">01</span>
                            <div class="b-text">
                                <h3>ПРОЗРАЧНАЯ СМЕТА</h3>
                                <p>Без скрытых расходов и лишних переплат.</p>
                            </div>
                        </div>
                        <div class="benefit">
                            <span class="b-num">02</span>
                            <div class="b-text">
                                <h3>СТОИМОСТЬ И ГРАФИК</h3>
                                <p>Зафиксированы в официальном договоре.</p>
                            </div>
                        </div>
                        <div class="benefit">
                            <span class="b-num">03</span>
                            <div class="b-text">
                                <h3>КОНТРОЛЬ КАЧЕСТВА</h3>
                                <p>Отчетность на каждом этапе строительства.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>

</body>

</html>