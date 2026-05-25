<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $barber_id = (int)$_POST['barber_id'];
    $service_id = (int)$_POST['service_id'];
    $date = $conn->real_escape_string($_POST['date']);
    $time = $conn->real_escape_string($_POST['time']);

    if (!$date || !$time || !$barber_id || !$service_id) {
        echo json_encode(['status' => 'error', 'message' => 'Будь ласка, оберіть послугу, майстра, дату та час візиту!']);
        exit;
    }

    try {
        $sql = "INSERT INTO bookings (client_name, client_phone, barber_id, service_id, booking_date, booking_time) 
                VALUES ('$name', '$phone', $barber_id, $service_id, '$date', '$time')";
        
        if ($conn->query($sql) === TRUE) {
            // Отримуємо ID щойно створеного запису в базі
            $booking_id = $conn->insert_id;

            // СЮДИ ВСТАВ ЮЗЕРНЕЙМ СВОГО БОТА (БЕЗ @)
            $bot_username = "ТВІЙ_ЮЗЕРНЕЙМ_БОТА_bot"; 

            // Створюємо посилання для клієнта із секретним параметром start
            $tg_redirect_url = "https://t.me/{$bot_username}?start={$booking_id}";

            // Передаємо фронтенду статус успіху та посилання
            echo json_encode([
                'status' => 'success', 
                'message' => "Запис створено! Зараз вас буде перенаправлено в Telegram для отримання підтвердження.",
                'redirect' => $tg_redirect_url
            ]);
            exit;
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            echo json_encode(['status' => 'error', 'message' => 'Цей час у майстра щойно зайняв інший клієнт!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Помилка системи даних: ' . $e->getMessage()]);
        }
    }
}
?>