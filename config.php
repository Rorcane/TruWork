<?php
// config.php
$host = 'localhost';
$db   = 'truwork';
$user = 'root';     // или ваш пользователь MySQL
$pass = 'root';         // пароль к MySQL, если есть
$dsn  = "mysql:host=$host;dbname=$db;charset=utf8";

try {
  $pdo = new PDO($dsn, $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Ошибка подключения к базе: " . $e->getMessage());
}
