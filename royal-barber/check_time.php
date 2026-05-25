<?php
include 'db.php';

// Отримуємо параметри з GET-запиту
$date = isset($_GET['date']) ? $conn->real_escape_string($_GET['date']) : '';
$barber_id = isset($_GET['barber_id']) ? (int)$_GET['barber_id'] : 0;

if (!$date || !$barber_id) {
    echo json_encode([]);
    exit;
}

// Шукаємо в базі всі записи до цього майстра на цю дату
$query = "SELECT booking_time FROM bookings WHERE booking_date = '$date' AND barber_id = $barber_id";
$result = $conn->query($query);

$busy_slots = [];
while ($row = $result->fetch_assoc()) {
    // База повертає час як "13:00:00", ми обрізаємо секунди до "13:00"
    $busy_slots[] = substr($row['booking_time'], 0, 5);
}

// Повертаємо масив у форматі JSON (фронтенд його з'їсть)
echo json_encode($busy_slots);
?>