<?php include 'header.php'; ?>
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/adaptiv.css">

<main>

    <?php if (isset($_GET['status']) && $_GET['status'] == 'ok'): ?>
        <div class="status-alert success">СПАСИБО! ВАША ЗАЯВКА ПРИНЯТА.</div>
    <?php endif; ?>

    <!-- СЛАЙДЕР -->
    <section class="hero-slider">
        <div class="swiper main-slider">
            <div class="swiper-wrapper">

                <!-- СЛАЙД 1 -->
                <div class="swiper-slide"
                    style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('img/index/slider2.jpg');">

                    <div class="slide-container">

                        <!-- ЛЕВО -->
                        <div class="slide-top-left">
                            <span class="slide-tag">НАПРАВЛЕНИЕ</span>
                            <h2>РЕСТАВРАЦИЯ ХРАМОВ</h2>
                        </div>

                        <!-- ПРАВО -->
                        <div class="slide-stats-right">
                            <div class="mini-stat">
                                <span class="ms-num">18+</span>
                                <p class="ms-desc">объектов культурного наследия успешно реставрировано</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- СЛАЙД 2 -->
                <div class="swiper-slide"
                    style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('img/index/slider1.jpg');">

                    <div class="slide-container">

                        <div class="slide-top-left">
                            <span class="slide-tag">НАПРАВЛЕНИЕ</span>
                            <h2>ЖИЛЫЕ КОМПЛЕКСЫ</h2>
                        </div>

                        <div class="slide-stats-right">
                            <div class="mini-stat">
                                <span class="ms-num">150+</span>
                                <p class="ms-desc">современных квартир сдано в эксплуатацию за год</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- СЛАЙД 3 -->
                <div class="swiper-slide"
                    style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('img/index/slider3.jpg');">

                    <div class="slide-container">

                        <div class="slide-top-left">
                            <span class="slide-tag">НАПРАВЛЕНИЕ</span>
                            <h2>КОММЕРЦИЯ</h2>
                        </div>

                        <div class="slide-stats-right">
                            <div class="mini-stat">
                                <span class="ms-num">45+</span>
                                <p class="ms-desc">бизнес-центров и торговых площадей по всей стране</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- НАВИГАЦИЯ -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- СТАТИСТИКА -->
    <section class="stats-section">
        <div class="stats-container">
            <div class="stat-item">
                <span class="stat-num">22</span>
                <p class="stat-text">ГОДА НА РЫНКЕ</p>
            </div>
            <div class="stat-item">
                <span class="stat-num">150+</span>
                <p class="stat-text">ОБЪЕКТОВ СДАНО</p>
            </div>
            <div class="stat-item">
                <span class="stat-num">300+</span>
                <p class="stat-text">СПЕЦИАЛИСТОВ</p>
            </div>
        </div>
    </section>

    <!-- КАРТА -->
    <<section class="map-section">
        <h2 class="section-title">НАШ ОФИС</h2>

        <div id="map" class="map-container"></div>

        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
        <script type="text/javascript">
            ymaps.ready(function () {
                var myMap = new ymaps.Map("map", {
                    center: [53.354784, 83.733519], // Координаты ул. Северо-Западная, 2В
                    zoom: 16,
                    controls: ['zoomControl']
                });

                var myPlacemark = new ymaps.Placemark([53.354784, 83.733519], {
                    balloonContent: '<strong>СК СОЗИДАНИЕ</strong><br>Офис 15',
                    hintContent: 'Мы здесь!'
                }, {
                    preset: 'islands#redDotIcon' // Яркая красная точка
                });

                myMap.geoObjects.add(myPlacemark);
                myMap.behaviors.disable('scrollZoom'); // Чтобы карта не мешала скроллу страницы
            });
        </script>
        </section>
</main>

<script src="js/index.js"></script>

<?php include 'footer.php'; ?>