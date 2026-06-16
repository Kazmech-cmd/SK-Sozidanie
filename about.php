<?php
error_reporting(0);
include 'db.php';
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О компании СК Созидание — Надежный застройщик</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/commercial.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/adaptiv.css">
</head>

<body class="comm-page">

    <?php include 'header.php'; ?>

    <main>
        <section class="section-padding">
            <div class="container">
                <h2 class="section-label">ЦИФРЫ И ФАКТЫ</h2>
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
                <div class="why-layout">
                    <div class="why-title">
                        <h2>ПРИНЦИПЫ <br>НАШЕЙ РАБОТЫ</h2>
                    </div>
                    <div class="benefits-grid">
                        <div class="benefit">
                            <span class="b-num">01</span>
                            <div class="b-text">
                                <h3>ПРОЕКТИРОВАНИЕ</h3>
                                <p>Разработка полного цикла проектной документации.</p>
                            </div>
                        </div>
                        <div class="benefit">
                            <span class="b-num">02</span>
                            <div class="b-text">
                                <h3>СТРОИТЕЛЬСТВО</h3>
                                <p>Возведение объектов любой сложности собственными силами.</p>
                            </div>
                        </div>
                        <div class="benefit">
                            <span class="b-num">03</span>
                            <div class="b-text">
                                <h3>ВВОД В ЭКСПЛУАТАЦИЮ</h3>
                                <p>Сдача готового объекта точно в оговоренные сроки.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding quote-section">
            <div class="container">
                <div class="quote-wrapper">
                    <div class="quote-text">
                        <blockquote>
                            «С душой к делу. С любовью к людям. Наша цель — строить объекты, которые служат
                            десятилетиями, сохраняя экологию и комфорт.»
                        </blockquote>
                    </div>
                    <div class="quote-author">
                        <img src="img/about/photo.jpg" alt="Директор" class="author-photo">
                        <div class="author-info">
                            <h4>Иван Иванов</h4>
                            <p>Генеральный директор СК Созидание</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding">
            <div class="container">
                <div class="types-header">
                    <h2>НАШИ <br>СТРОЯЩИЕСЯ ОБЪЕКТЫ</h2>
                    <p>Актуальные площадки, где мы возводим будущее прямо сейчас.</p>
                </div>
                <div class="types-grid projects-mini-grid">
                    <div class="type-card project-small">
                        <div class="type-img"><img src="img/about/1.jpg" alt="Проект 1"></div>
                        <span>Коттеджный поселок «Правобережье»</span>
                    </div>
                    <div class="type-card project-small">
                        <div class="type-img"><img src="img/about/2.jpg" alt="Проект 2"></div>
                        <span>Спасо-Сергиевский Собор</span>
                    </div>
                    <div class="type-card project-small">
                        <div class="type-img"><img src="img/about/3.jpg" alt="Проект 3"></div>
                        <span>Промышленный технопарк</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding light-bg">
            <div class="container">
                <div class="types-header">
                    <h2>НАДЕЖНОСТЬ <br>ПОДТВЕРЖДЕНА</h2>
                    <p>Благодарсвенные письма и награды</p>
                </div>
                <div class="licenses-grid">
                    <a href="img/about/license1.jpg" target="_blank" class="license-item">
                        <img src="img/about/license1_thumb.jpg" alt="Лицензия 1">
                    </a>
                    <a href="img/about/license2.jpg" target="_blank" class="license-item">
                        <img src="img/about/license2_thumb.jpg" alt="Лицензия 2">
                    </a>
                    <a href="img/about/license3.jpg" target="_blank" class="license-item">
                        <img src="img/about/license3_thumb.jpg" alt="Лицензия 3">
                    </a>
                    <a href="img/about/license4.jpg" target="_blank" class="license-item">
                        <img src="img/about/license4_thumb.jpg" alt="Лицензия 4">
                    </a>
                </div>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>

</body>

</html>