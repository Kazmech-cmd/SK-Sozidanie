<?php
// --- НАСТРОЙКИ ---
$to_email = ""; 
$botToken = "";
$chatId = "";

// --- ПОЛУЧЕНИЕ ДАННЫХ ---
$name = isset($_POST['user_name']) ? strip_tags($_POST['user_name']) : 'Не указано';
$phone = isset($_POST['user_phone']) ? strip_tags($_POST['user_phone']) : 'Не указано';
$date = date("d.m.Y H:i");

if (!empty($_POST['user_name']) && !empty($_POST['user_phone'])) {

    // 1. ОТПРАВКА НА ПОЧТУ (через PHP на сервере)
    $headers = "From: site@sozidanie.ru\r\n";
    $headers .= "Reply-To: site@sozidanie.ru\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    $mail_text = "Новая заявка с сайта СК Созидание\n\n";
    $mail_text .= "Имя: $name\n";
    $mail_text .= "Телефон: $phone\n";
    $mail_text .= "Дата: $date";

    // Собачка @ перед mail подавляет ошибки, если на локалке не настроен почтовый сервер
    @mail($to_email, "Заявка от $name", $mail_text, $headers);

    // 2. ПОДГОТОВКА ТЕКСТА ДЛЯ TELEGRAM
    $message = "📩 НОВАЯ ЗАЯВКА: СК СОЗИДАНИЕ\n\n";
    $message .= "👤 Имя: $name\n";
    $message .= "📞 Телефон: $phone\n";
    $message .= "⏰ Время: $date";
    
    $tg_url = "" . urlencode($message);

    // 3. РЕЗЕРВНАЯ ЗАПИСЬ В ЛОГ (для отчета)
    $log = $date . " | " . $name . " | " . $phone . PHP_EOL;
    file_put_contents('requests.log', $log, FILE_APPEND);

    // 4. ВЫВОД JS ДЛЯ ТЕЛЕГРАМА И РЕДИРЕКТА
    echo "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='utf-8'>
        <title>Обработка заявки...</title>
    </head>
    <body>
        <p>Заявка принята! Перенаправляем на сайт...</p>
        <script>
            // Браузер сам делает запрос к Telegram, обходя блокировку сервера
            fetch('$tg_url', { mode: 'no-cors' })
            .then(() => {
                window.location.href = 'index.php?status=ok#feedback';
            })
            .catch(() => {
                window.location.href = 'index.php?status=ok#feedback';
            });
        </script>
    </body>
    </html>
    ";
    exit();
} else {
    header("Location: index.php?status=error#feedback");
    exit();
}
?>