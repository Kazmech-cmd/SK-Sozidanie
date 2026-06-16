<?php
session_start();
require_once 'db.php';

$admin_pass = '12345'; 


if (isset($_POST['login_pass']) && $_POST['login_pass'] === $admin_pass) {
    $_SESSION['admin_auth'] = true;
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin.php");
    exit;
}

$authorized = isset($_SESSION['admin_auth']) && $_SESSION['admin_auth'] === true;
$tab = $_GET['tab'] ?? 'apartments_new';
$message = "";


if (isset($_POST['submit_form'])) {
    $sql = null; 

    if ($tab == 'apartments_new') { 
        $jk = $_POST['jk_name'];
        $r = $_POST['rooms'];
        $a = $_POST['area'];
        $p = $_POST['price'];
        $f = $_POST['floor'];
        $tf = $_POST['total_floors'];
        $img = 'plan_' . time() . '.png';

        if (move_uploaded_file($_FILES['image']['tmp_name'], 'img/apartments/' . $img)) {
            $sql = "INSERT INTO apartments_new (jk_name, rooms, area, floor, total_floors, price, image) 
                    VALUES ('$jk', '$r', '$a', '$f', '$tf', '$p', '$img')";
        }
    } elseif ($tab == 'projects') {
        $t = $_POST['title'];
        $d = $_POST['description'];
        $img = 'proj_' . time() . '.png';
        if (move_uploaded_file($_FILES['image']['tmp_name'], 'img/projects/' . $img)) {
            $sql = "INSERT INTO projects (title, description, image) VALUES ('$t', '$d', '$img')";
        }
    } elseif ($tab == 'news') {
        $t = $_POST['title'];
        $c = $_POST['content'];
        $date = date('Y-m-d');
        $img = 'news_' . time() . '.png';
        if (move_uploaded_file($_FILES['image']['tmp_name'], 'img/news/' . $img)) {
            $sql = "INSERT INTO news (title, content, date, image) VALUES ('$t', '$c', '$date', '$img')";
        }
    }

    
    if ($sql && $mysqli->query($sql)) {
        $message = "Запись успешно добавлена!";
    } else {
        
        $message = "Ошибка при добавлении: " . ($mysqli->error ?: "Файл не загружен на сервер");
    }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель управления | Созидание</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/adaptiv.css">
</head>

<body>

    <div class="admin-box">
        <?php if (!$authorized): ?>
            <div class="login-screen">
                <h2>Вход в систему</h2>
                <form method="POST">
                    <input type="password" name="login_pass" placeholder="Введите пароль" required>
                    <button type="submit">Войти</button>
                </form>
            </div>
        <?php else: ?>
            <div class="admin-header">
                <h2>Панель управления</h2>
                <a href="?logout=1" class="logout-btn">Выйти</a>
            </div>

            <div class="tabs">
                <a href="?tab=apartments_new" class="<?= $tab == 'apartments_new' ? 'active' : '' ?>">Квартиры</a>
                <a href="?tab=projects" class="<?= $tab == 'projects' ? 'active' : '' ?>">Проекты</a>
                <a href="?tab=news" class="<?= $tab == 'news' ? 'active' : '' ?>">Новости</a>
            </div>

            <?php if ($message): ?>
                <div class="msg"><?= $message ?></div>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data" class="main-form">
                <?php if ($tab == 'apartments_new'): ?>
                    <input type="text" name="jk_name" placeholder="Название ЖК" required>
                    <div class="form-row">
                        <input type="number" name="rooms" placeholder="Комнат">
                        <input type="number" step="0.01" name="area" placeholder="Площадь м²">
                    </div>
                    <input type="number" name="price" placeholder="Цена (руб)">
                    <div class="form-row">
                        <input type="number" name="floor" placeholder="Этаж">
                        <input type="number" name="total_floors" placeholder="Всего этажей">
                    </div>
                <?php elseif ($tab == 'projects'): ?>
                    <input type="text" name="title" placeholder="Название проекта" required>
                    <textarea name="description" placeholder="Описание проекта" rows="5"></textarea>
                <?php elseif ($tab == 'news'): ?>
                    <input type="text" name="title" placeholder="Заголовок новости" required>
                    <textarea name="content" placeholder="Текст новости" rows="8"></textarea>
                <?php endif; ?>

                <div class="file-input">
                    <label>Загрузить изображение:</label>
                    <input type="file" name="image" required>
                </div>

                <button type="submit" name="submit_form">Опубликовать данные</button>
            </form>

            <div class="admin-footer">
                <a href="index.php">← Вернуться на сайт</a>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>