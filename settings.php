<?php
// settings.php
if (!isset($_COOKIE['user'])) {
  header('Location: login.html');
  exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Настройки</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Bootstrap -->
  <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet"
  />
  <style>
    body {
      background-color: #f8f9fa;
    }
    .sidebar {
      min-height: 100vh;
      background-color: #eee;
      padding: 1rem;
    }
    .sidebar .nav-link {
      color: #333;
      margin-bottom: 0.5rem;
    }
    .sidebar .nav-link:hover {
      background-color: #ddd;
    }
    .main-area {
      padding: 1rem;
    }
    .card-custom {
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 1rem;
      margin-bottom: 1rem;
    }
    /* Сброс для контейнеров, чтобы они занимали всю ширину */
.container, .container-fluid {
  max-width: 100% !important;  /* убираем ограничение */
  margin: 0 !important;        /* убираем автоцентрирование */
  padding-left: 0 !important;
  padding-right: 0 !important;
}
  </style>
</head>
<body>
<link rel="stylesheet" href="css/style.css" />
<div class="container-fluid">
  <div class="row">
    <!-- Левая панель -->
    <div class="col-md-2 sidebar">
      <h5 class="mb-4">Профиль</h5>
      <ul class="nav flex-column">
      <li class="nav-item mb-2"><a href="index.php" class="nav-link">Главная</a></li>
        <li class="nav-item mb-2"><a href="services.php" class="nav-link">Услуги</a></li>
        <li class="nav-item mb-2"><a href="portfolio.php" class="nav-link">Портфолио</a></li>
        <li class="nav-item mb-2"><a href="connections.php" class="nav-link">Подключения</a></li>
        <li class="nav-item mb-2"><a href="settings.php" class="nav-link active">Аккаунт</a></li>
        <li class="nav-item mt-4"><a href="logout.php" class="nav-link text-danger">Выйти</a></li>
      </ul>
    </div>
    
    <!-- Основная часть -->
    <div class="col-md-10 main-area">
      <h1 class="mb-4">Настройки</h1>
      
      <div class="row">
        <!-- Левая часть (форма) -->
        <div class="col-md-6">
          <div class="card-custom">
            <p>@<?= htmlspecialchars($_COOKIE['user']) ?> <br><a href="#">Изменить аватар</a></p>
            <hr>
            
            <div class="mb-3">
              <label class="form-label">Отображаемое имя</label>
              <input type="text" class="form-control" placeholder="Имя пользователя">
            </div>
            <div class="mb-3">
              <label class="form-label">Рабочий email</label>
              <input type="email" class="form-control" placeholder="email@domain.com">
            </div>
            <div class="mb-3">
              <label class="form-label">Номер телефона</label>
              <input type="text" class="form-control" placeholder="+00 123 456 789">
            </div>
            <div class="mb-3">
              <label class="form-label">Дата рождения</label>
              <input type="text" class="form-control" placeholder="ДД/ММ/ГГГГ">
            </div>
            <div class="mb-3">
              <label class="form-label">Страна</label>
              <input type="text" class="form-control" placeholder="Страна">
            </div>
            <div class="mb-3">
              <label class="form-label">Языки</label>
              <input type="text" class="form-control" placeholder="Язык, Язык, Язык">
            </div>
            <a href="#" class="btn btn-primary">Сохранить</a>
          </div>
        </div>
        
        <!-- Правая часть (Файлы, Идентификация) -->
        <div class="col-md-6">
          <div class="card-custom mb-3">
            <h5>Файлы</h5>
            <ul class="list-unstyled">
              <li>Соглашение.pdf — <a href="#">Просмотр</a></li>
              <li>Изменение.pdf — <a href="#">Просмотр</a></li>
              <li>НДА.pdf — <a href="#">Просмотр</a></li>
              <li>Договор об оборудовании.pdf — <a href="#">Просмотр</a></li>
            </ul>
          </div>
          <div class="card-custom">
            <h5>Идентификация</h5>
            <ul class="list-unstyled">
              <li>Удостоверение личности — <a href="#">Редакт</a></li>
              <li>Паспорт — <a href="#">Редакт</a></li>
              <li>Разрешение на проживание — <a href="#">Редакт</a></li>
            </ul>
            <button class="btn btn-outline-primary btn-sm">Загрузить новый файл</button>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script 
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
></script>
</body>
</html>
