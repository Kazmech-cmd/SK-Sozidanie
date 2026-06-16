document.addEventListener('DOMContentLoaded', function () {

    // --- 1. ПЕРЕМЕННЫЕ И КОНТЕЙНЕРЫ ---
    const filterForm = document.getElementById('filter-form');
    const container = document.getElementById('apartments-container'); // Твой ID из HTML
    const loadMoreBtn = document.getElementById('load-more');
    let offset = 9; // Начальный отступ для пагинации

    // --- 2. КНОПКИ КОМНАТ ---
    const roomBtns = document.querySelectorAll('.room-btn');
    roomBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            this.classList.toggle('active');
            updateFilters(); // Обновляем список при клике
        });
    });

    // --- 3. ИНИЦИАЛИЗАЦИЯ СЛАЙДЕРОВ ---
    function initDoubleSlider(minId, maxId, minInputId, maxInputId, trackId) {
        const minR = document.getElementById(minId);
        const maxR = document.getElementById(maxId);
        const minI = document.getElementById(minInputId);
        const maxI = document.getElementById(maxInputId);
        const track = document.getElementById(trackId);

        if (!minR || !maxR || !track) return;

        function updateVisuals() {
            let v1 = parseFloat(minR.value);
            let v2 = parseFloat(maxR.value);
            if (v1 > v2) { [v1, v2] = [v2, v1]; }

            minI.value = v1;
            maxI.value = v2;

            let p1 = ((v1 - minR.min) / (minR.max - minR.min)) * 100;
            let p2 = ((v2 - minR.min) / (minR.max - minR.min)) * 100;
            track.style.background = `linear-gradient(to right, #e9ecef ${p1}%, #1b4332 ${p1}%, #1b4332 ${p2}%, #e9ecef ${p2}%)`;
        }

        [minR, maxR].forEach(el => el.addEventListener('input', () => {
            updateVisuals();
        }));

        // Обновляем фильтры только когда пользователь отпустил ползунок (чтобы не спамить запросами)
        [minR, maxR].forEach(el => el.addEventListener('change', updateFilters));

        [minI, maxI].forEach(el => el.addEventListener('change', () => {
            minR.value = minI.value;
            maxR.value = maxI.value;
            updateVisuals();
            updateFilters();
        }));

        updateVisuals();
    }

    initDoubleSlider('area-min-range', 'area-max-range', 'area-min-input', 'area-max-input', 'area-track');
    initDoubleSlider('price-min-range', 'price-max-range', 'price-min-input', 'price-max-input', 'price-track');
    initDoubleSlider('floor-min-range', 'floor-max-range', 'floor-min-input', 'floor-max-input', 'floor-track');
    initDoubleSlider('ent-min-range', 'ent-max-range', 'ent-min-input', 'ent-max-input', 'ent-track');

    // --- 4. ЛОГИКА ФИЛЬТРАЦИИ ---
    function updateFilters() {
        offset = 0; // Сбрасываем отступ при изменении фильтров
        const data = getFilterData();
        const params = new URLSearchParams(data).toString();

        container.style.opacity = '0.5'; // Визуальный отклик загрузки

        fetch(`load_more.php?${params}&offset=0`)
            .then(response => response.text())
            .then(html => {
                container.style.opacity = '1';
                if (html.trim() === "empty" || html.trim() === "done") {
                    container.innerHTML = '<div class="no-results">Квартир с такими параметрами не найдено</div>';
                    if (loadMoreBtn) loadMoreBtn.style.display = 'none';
                } else {
                    container.innerHTML = html;
                    offset = 9; // Сбрасываем счетчик для кнопки "Загрузить еще"
                    if (loadMoreBtn) loadMoreBtn.style.display = 'block';
                }
            })
            .catch(err => console.error('Ошибка фильтрации:', err));
    }

    function getFilterData() {
        const data = {};

        // Комнаты
        const activeRooms = Array.from(document.querySelectorAll('.room-btn.active'))
            .map(btn => btn.getAttribute('data-value'));
        if (activeRooms.length > 0) data.rooms = activeRooms.join(',');

        // Диапазоны
        data.area_min = document.getElementById('area-min-input').value;
        data.area_max = document.getElementById('area-max-input').value;
        data.price_min = document.getElementById('price-min-input').value;
        data.price_max = document.getElementById('price-max-input').value;
        data.floor_min = document.getElementById('floor-min-input').value;
        data.floor_max = document.getElementById('floor-max-input').value;

        // Поиск и сортировка
        data.search = document.querySelector('input[name="search"]').value;
        data.sort = document.querySelector('select[name="sort"]').value;

        return data;
    }

    // --- 5. КНОПКА "ЗАГРУЗИТЬ ЕЩЕ" ---
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function () {
            const originalText = this.textContent;
            this.textContent = 'Загрузка...';

            const filters = getFilterData();
            const params = new URLSearchParams(filters).toString();

            fetch(`load_more.php?${params}&offset=${offset}`)
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === "empty" || data.trim() === "done") {
                        this.textContent = 'Квартир больше нет';
                        this.disabled = true;
                        setTimeout(() => { this.style.display = 'none'; }, 2000);
                    } else {
                        container.insertAdjacentHTML('beforeend', data);
                        offset += 9;
                        this.textContent = originalText;
                    }
                });
        });
    }

    // --- 6. ДОПОЛНИТЕЛЬНЫЕ СОБЫТИЯ ---
    // Сортировка
    document.querySelector('select[name="sort"]').addEventListener('change', updateFilters);

    // Поиск (с задержкой 500мс)
    let searchTimeout;
    document.querySelector('input[name="search"]').addEventListener('input', () => {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(updateFilters, 500);
    });

});