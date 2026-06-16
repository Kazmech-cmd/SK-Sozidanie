<?php
require_once 'db.php';

// Проверяем, передали ли нам отступ через JS
$offset = isset($_GET['offset']) ? (int) $_GET['offset'] : 0;
$limit = 9;

// Используем $mysqli, так как именно это имя указано в твоем db.php
$sql = "SELECT * FROM apartments LIMIT $limit OFFSET $offset";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <article class="apartment-card">
            <div class="ap-badge">Ипотека 6%</div>
            <div class="ap-img">
                <img src="img/apartments/plan_example.png" alt="Планировка">
            </div>
            <div class="ap-info">
                <p class="ap-project"><?php echo htmlspecialchars($row['jk_name']); ?></p>
                <h3 class="ap-type"><?php echo $row['rooms']; ?>-к квартира, <?php echo $row['area']; ?> м²</h3>
                <p class="ap-floor">Этаж: <?php echo $row['floor']; ?> из <?php echo $row['max_floor']; ?></p>
                <div class="ap-bottom">
                    <span class="ap-price"><?php echo number_format($row['price'], 0, '', ' '); ?> ₽</span>
                </div>
            </div>
        </article>
        <?php
    }
} else {
    // Если записей больше нет
    echo "empty";
}
?>