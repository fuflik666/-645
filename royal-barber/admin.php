<?php
session_start();

// Конфігурація пароля для входу в адмінку
define('ADMIN_PASSWORD', 'royalBarber2026'); 

// Логіка виходу
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    unset($_SESSION['admin_auth']);
    header('Location: admin.php');
    exit;
}

// Логіка входу
if (isset($_POST['password'])) {
    if ($_POST['password'] === ADMIN_PASSWORD) {
        $_SESSION['admin_auth'] = true;
    } else {
        $error = "Невірний пароль!";
    }
}

// Якщо не авторизований — показуємо форму входу
if (!isset($_SESSION['admin_auth'])) {
    ?>
    <!DOCTYPE html>
    <html lang="uk">
    <head>
        <meta charset="UTF-8">
        <title>Вхід в адмін-панель</title>
        <style>
            body { background: #111; color: #fff; font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
            .login-form { background: #1a1a1a; padding: 30px; border-radius: 8px; border: 1px solid #c5a059; text-align: center; box-shadow: 0 0 15px rgba(197, 160, 89, 0.2); }
            h2 { color: #c5a059; margin-bottom: 20px; }
            input[type="password"] { background: #222; border: 1px solid #444; padding: 10px; color: #fff; width: 200px; border-radius: 4px; margin-bottom: 15px; text-align: center; }
            input[type="submit"] { background: #c5a059; border: none; padding: 10px 20px; color: #000; font-weight: bold; cursor: pointer; border-radius: 4px; transition: 0.3s; }
            input[type="submit"]:hover { background: #a48343; }
            .error { color: #ff6b6b; margin-bottom: 10px; }
        </style>
    </head>
    <body>
        <div class="login-form">
            <h2>Royal Barber Admin</h2>
            <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
            <form method="POST">
                <input type="password" name="password" placeholder="Введіть пароль" required><br>
                <input type="submit" value="Ввійти">
            </form>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Якщо авторизований — підключаємо базу та виводимо записи
require_once 'db.php'; 

// Отримуємо записи з бази
$query = "SELECT b.id, b.client_name, b.client_phone, b.booking_date, b.booking_time, 
                 s.title AS service_title, br.name AS barber_name
          FROM bookings b
          LEFT JOIN services s ON b.service_id = s.id
          LEFT JOIN barbers br ON b.barber_id = br.id
          ORDER BY b.booking_date DESC, b.booking_time DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Панель замовлень | Royal Barber</title>
    <style>
        body { background: #121212; color: #e0e0e0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 20px; }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #c5a059; padding-bottom: 15px; margin-bottom: 20px; }
        h1 { color: #c5a059; margin: 0; font-size: 28px; }
        .logout-btn { background: #ff4d4d; color: #fff; padding: 8px 15px; text-decoration: none; border-radius: 4px; font-weight: bold; }
        .logout-btn:hover { background: #cc3333; }
        table { width: 100%; border-collapse: collapse; background: #1a1a1a; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.5); }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #2a2a2a; }
        th { background: #c5a059; color: #000; font-weight: bold; text-transform: uppercase; font-size: 13px; }
        tr:hover { background: #222; }
        .date-badge { background: #333; color: #c5a059; padding: 4px 8px; border-radius: 4px; font-weight: bold; }
        .time-badge { background: #c5a059; color: #000; padding: 4px 8px; border-radius: 4px; font-weight: bold; }
        .no-data { text-align: center; padding: 20px; color: #888; font-style: italic; }
    </style>
</head>
<body>

<div class="header">
    <h1>📋 Список записів на стрижку</h1>
    <a href="admin.php?action=logout" class="logout-btn">Вийти</a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Клієнт</th>
            <th>Телефон</th>
            <th>Послуга</th>
            <th>Майстер</th>
            <th>Дата</th>
            <th>Час</th>
        </tr>
    </thead>
    <tbody>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td style="font-weight: bold; color: #fff;"><?php echo htmlspecialchars($row['client_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['client_phone']); ?></td>
                    <td><?php echo htmlspecialchars($row['service_title']); ?></td>
                    <td>👤 <?php echo htmlspecialchars($row['barber_name']); ?></td>
                    <td><span class="date-badge"><?php echo date('d.m.Y', strtotime($row['booking_date'])); ?></span></td>
                    <td><span class="time-badge"><?php echo date('H:i', strtotime($row['booking_time'])); ?></span></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="no-data">Записів поки що немає. Спробуйте створити тестовий запис на сайті!</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>