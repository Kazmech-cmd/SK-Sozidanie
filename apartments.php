<?php
require_once 'db.php';

$apartments_list = []; // Изменил имя для ясности
$check_table = $mysqli->query("SHOW TABLES LIKE 'apartments_new'");

if ($check_table && $check_table->num_rows > 0) {
    $result = $mysqli->query("SELECT * FROM apartments_new ORDER BY id DESC");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $apartments_list[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Выбор квартиры по параметрам — СК Созидание</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/apartments.css">
    <link rel="stylesheet" href="css/adaptiv.css">
</head>

<body>

    <?php include 'header.php'; ?>

    <main class="apartments-page">
        <div class="container">
            <h1 class="page-title">Выберите квартиру <br><span>по параметрам</span></h1>

            <section class="filter-wrapper">
                <form id="filter-form" class="complex-filter" method="GET" action="apartments.php">
                    <div class="filter-row">
                        <div class="filter-group">
                            <label>Комнат</label>
                            <div class="rooms-selector">
                                <button type="button" class="room-btn" data-value="1">1</button>
                                <button type="button" class="room-btn" data-value="2">2</button>
                                <button type="button" class="room-btn" data-value="3">3</button>
                            </div>
                        </div>

                        <div class="filter-group">
                            <label>Площадь, м²</label>
                            <div class="manual-inputs">
                                <input type="number" id="area-min-input" name="area_min" value="25.5">
                                <input type="number" id="area-max-input" name="area_max" value="120.0">
                            </div>
                            <div class="range-slider-container">
                                <div class="slider-track" id="area-track"></div>
                                <input type="range" id="area-min-range" min="25.5" max="120" value="25.5" step="0.1">
                                <input type="range" id="area-max-range" min="25.5" max="120" value="120" step="0.1">
                            </div>
                        </div>

                        <div class="filter-group">
                            <label>Стоимость, ₽</label>
                            <div class="manual-inputs">
                                <input type="number" id="price-min-input" name="price_min" value="3000000">
                                <input type="number" id="price-max-input" name="price_max" value="15000000">
                            </div>
                            <div class="range-slider-container">
                                <div class="slider-track" id="price-track"></div>
                                <input type="range" id="price-min-range" min="3000000" max="15000000" value="3000000"
                                    step="50000">
                                <input type="range" id="price-max-range" min="3000000" max="15000000" value="15000000"
                                    step="50000">
                            </div>
                        </div>
                    </div>

                    <div class="filter-row">
                        <div class="filter-group">
                            <label>Этаж</label>
                            <div class="manual-inputs">
                                <input type="number" id="floor-min-input" name="floor_min" value="1">
                                <input type="number" id="floor-max-input" name="floor_max" value="16">
                            </div>
                            <div class="range-slider-container">
                                <div class="slider-track" id="floor-track"></div>
                                <input type="range" id="floor-min-range" min="1" max="16" value="1">
                                <input type="range" id="floor-max-range" min="1" max="16" value="16">
                            </div>
                        </div>

                        <div class="filter-group bottom-row">
                            <div class="search-input">
                                <input type="text" name="search" placeholder="Поиск по названию ЖК...">
                            </div>
                            <div class="sort-select">
                                <select name="sort">
                                    <option value="default">Порядок: по умолчанию</option>
                                    <option value="price_asc">Сначала дешевле</option>
                                    <option value="price_desc">Сначала дороже</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </section>

            <div class="apartments-grid" id="apartments-container">
                <?php if (!empty($apartments_list)): ?>
                    <?php foreach ($apartments_list as $flat): ?>
                        <article class="apartment-card">
                            <div class="ap-img"><img src="img/apartments/<?= $flat['image'] ?>" alt="Планировка"></div>
                            <div class="ap-info">
                                <p class="ap-project"><?= htmlspecialchars($flat['jk_name']) ?></p>
                                <h3 class="ap-type"><?= $flat['rooms'] ?>-к квартира, <?= $flat['area'] ?> м²</h3>
                                <div class="ap-bottom">
                                    <span class="ap-price"><?= number_format($flat['price'], 0, '', ' ') ?> ₽</span>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                <?php endif; ?>
            </div>

            <div class="load-more-box">
                <button type="button" id="load-more" class="btn-load-more active-btn">Загрузить еще</button>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>
    <script src="js/apartments.js"></script>
</body>

</html>