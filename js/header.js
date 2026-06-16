document.addEventListener('DOMContentLoaded', function() {
    const openBtn = document.getElementById('openMenu');
    const closeBtn = document.getElementById('closeMenu');
    const fullMenu = document.getElementById('fullMenu');

    // Проверяем, существуют ли кнопки на странице
    if (openBtn && closeBtn && fullMenu) {
        
        // Открытие полноэкранного меню
        openBtn.addEventListener('click', () => {
            fullMenu.classList.add('active');
            document.body.style.overflow = 'hidden'; // Запрет скролла основной страницы
        });

        // Закрытие по кнопке-крестику
        closeBtn.addEventListener('click', () => {
            fullMenu.classList.remove('active');
            document.body.style.overflow = ''; // Возвращаем скролл
        });

        // Закрытие при клике по любой ссылке в меню
        const menuLinks = document.querySelectorAll('.full-menu-link');
        menuLinks.forEach(link => {
            link.addEventListener('click', () => {
                fullMenu.classList.remove('active');
                document.body.style.overflow = '';
            });
        });

        // Закрытие по клавише Esc (для удобства)
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && fullMenu.classList.contains('active')) {
                fullMenu.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }
});