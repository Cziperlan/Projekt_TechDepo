<?php
require 'config.php';

$whereClauses = ["r.visible = 1"];
$params = [];

if (!empty($_GET['price'])) {
    $whereClauses[] = "r.price <= ?";
    $params[] = $_GET['price'];
}
if (!empty($_GET['maker'])) {
    $whereClauses[] = "l.maker = ?";
    $params[] = $_GET['maker'];
}
if (!empty($_GET['cpu_type'])) {
    $whereClauses[] = "l.cpu_type = ?";
    $params[] = $_GET['cpu_type'];
}
if (!empty($_GET['ram_size'])) {
    $whereClauses[] = "l.ram_size = ?";
    $params[] = $_GET['ram_size'];
}
if (!empty($_GET['gpu'])) {
    $whereClauses[] = "l.gpu = ?";
    $params[] = $_GET['gpu'];
}
if (!empty($_GET['resolution'])) {
    $whereClauses[] = "l.resolution = ?";
    $params[] = $_GET['resolution'];
}
if (!empty($_GET['refresh_rates'])) {
    $whereClauses[] = "l.refresh_rate = ?";
    $params[] = $_GET['refresh_rate'];
}
if (!empty($_GET['screen_size'])) {
    $whereClauses[] = "l.screen_size = ?";
    $params[] = $_GET['screen_size'];
}
if (!empty($_GET['drive_size'])) {
    $whereClauses[] = "l.drive_size = ?";
    $params[] = $_GET['drive_size'];
}
if (!empty($_GET['drive_type'])) {
    $whereClauses[] = "l.drive_type = ?";
    $params[] = $_GET['drive_type'];
}
if (!empty($_GET['bluetooth_version'])) {
    $whereClauses[] = "l.bluetooth_version = ?";
    $params[] = $_GET['bluetooth_version'];
}
if (!empty($_GET['battery'])) {
    $whereClauses[] = "l.battery = ?";
    $params[] = $_GET['battery'];
}
if (!empty($_GET['color'])) {
    $whereClauses[] = "l.color = ?";
    $params[] = $_GET['color'];
}

$sql = "SELECT l.*, r.price FROM webshop.notebooks l JOIN webshop.products r ON l.ProID = r.ProID WHERE " . implode(" AND ", $whereClauses);
$stmt = $conn->prepare($sql);
if (!empty($params)) {
    $stmt->bind_param(str_repeat("s", count($params)), ...$params);
}
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $image_name = $row["ProID"];
                    $image_path = "../Képek/" . $image_name . ".jpg";
                    ?>
                    <div class="product-card">
                <span class="product-badge">Top Deal</span>
                <a href="pc.php?id=<?= urlencode($row['ProID']); ?>"> 
                    <img src="<?= $image_path ?>" alt="Product Image" class="product-image">
                    <h3 class="product-title1"><?= htmlspecialchars($row['name']); ?></h3>
                </a>
                <p class="product-price"><?= $row['price']; ?> FT</p>
                <button class="add-to-cart">Kosárba</button>
            </div>
    <?php
    }
} else {
    echo "Nincs találat";
}
$stmt->close();
$conn->close();
?>
