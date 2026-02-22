<?php
// register.php
require_once 'config.php'; // файл с PDO-подключением

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username']);
  $email    = trim($_POST['email']);
  $password = trim($_POST['password']);
  
  // Хэшируем пароль
  $passwordHash = password_hash($password, PASSWORD_DEFAULT);
  
  // Проверяем, нет ли уже пользователя с таким именем
  $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
  $stmt->execute([$username, $email]);
  $existing = $stmt->fetch();
  if ($existing) {
    // Уже существует пользователь
    echo "<h2>Ошибка: пользователь с таким именем или почтой уже существует.</h2>";
    exit();
  }
  
  // Создаём нового пользователя
  $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
  $stmt->execute([$username, $email, $passwordHash]);
  
  echo "<h2>Аккаунт успешно создан! <a href='login.html'>Вернуться</a></h2>";
} else {
  echo "Неверный метод запроса.";
}
// Пример кода в register.php, после успешной вставки в БД:
$stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->execute([$username, $email, $passwordHash]);

// Сразу «логиним» пользователя, установив куки:
setcookie('user', $username, time() + 86400, '/'); // 86400 = 1 день

// Перенаправляем на главную страницу:
header('Location: index.php');
exit();

