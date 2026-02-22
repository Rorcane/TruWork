<?php
// profile.php

// Если нужно проверить авторизацию:
if (!isset($_COOKIE['user'])) {
  header('Location: login.html');
  exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <title>Профиль</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <!-- Bootstrap CSS -->
  <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet"
  />
  
  <!-- Дополнительные стили (вместо отдельного style.css) -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .sidebar {
      min-height: 100vh; /* Чтобы тянулось на всю высоту экрана */
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
    .topbar {
      background-color: #fff;
      border-bottom: 1px solid #ccc;
      padding: 1rem;
    }
    .right-column {
      background-color: #fdfdfd;
      min-height: 100vh;
      padding: 1rem;
      border-left: 1px solid #ccc;
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
    <!-- Левая колонка (sidebar) -->
    <div class="col-md-2 sidebar">
      <h5 class="mb-4">Профиль</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="index.php" class="nav-link">Главная</a></li>
        <li class="nav-item mb-2"><a href="services.php" class="nav-link">Услуги</a></li>
        <li class="nav-item mb-2"><a href="portfolio.php" class="nav-link">Портфолио</a></li>
        <li class="nav-item mb-2"><a href="connections.php" class="nav-link">Подключения</a></li>
        <li class="nav-item mb-2"><a href="settings.php" class="nav-link">Аккаунт</a></li>
        <li class="nav-item mt-4"><a href="logout.php" class="nav-link text-danger">Выйти</a></li>
      </ul>
    </div>
    
    <!-- Центральная колонка -->
    <div class="col-md-7 py-3">
      <h4>Добро пожаловать, <?= htmlspecialchars($_COOKIE['user']) ?>!</h4>
      
      <!-- Smart Recruitment -->
      <div class="card-custom">
        <h5>Умный найм (Smart Recruitment)</h5>
        <div class="d-flex flex-wrap gap-2 mt-3">
          <button class="btn btn-outline-secondary btn-sm">Оценка ID</button>
          <button class="btn btn-primary btn-sm">Проверить</button>
          <button class="btn btn-outline-secondary btn-sm">Клиентская база HR</button>
          <button class="btn btn-outline-secondary btn-sm">Обновить</button>
        </div>
        <p class="mt-3">Управляйте командой эффективно</p>
        <div class="d-flex gap-3">
          <div class="text-center">
            <img src="https://via.placeholder.com/50" class="rounded-circle" alt="Профи" />
            <p class="small">Профи</p>
          </div>
          <div class="text-center">
            <img src="https://via.placeholder.com/50" class="rounded-circle" alt="Профи" />
            <p class="small">Профи</p>
          </div>
          <div class="text-center">
            <img src="https://via.placeholder.com/50" class="rounded-circle" alt="Профи" />
            <p class="small">Профи</p>
          </div>
        </div>
        <button class="btn btn-outline-primary btn-sm mt-2">Уведомить</button>
      </div>
      
      <!-- Profile View (график) -->
      <div class="card-custom">
        <div class="d-flex justify-content-between align-items-center">
          <h5>Просмотры профиля</h5>
          <input type="text" class="form-control form-control-sm" placeholder="Поиск по дате" style="width: 150px;">
        </div>
        <div class="mt-3" style="height: 200px; background: #e1ecf4;">
          <p class="text-center pt-5">График просмотров (макет)</p>
        </div>
      </div>
      
      <!-- Product ideas -->
      <div class="card-custom">
        <h5>Идеи продуктов</h5>
        <p class="text-muted">Новые концепции?</p>
        <div class="row g-2">
          <div class="col"><button class="btn btn-outline-secondary w-100 btn-sm">Экспертные предложения</button></div>
          <div class="col"><button class="btn btn-outline-secondary w-100 btn-sm">Экспертные советы</button></div>
          <div class="col"><button class="btn btn-outline-secondary w-100 btn-sm">Полезные подсказки</button></div>
          <div class="col"><button class="btn btn-outline-secondary w-100 btn-sm">Инсайты</button></div>
        </div>
      </div>
      
      <!-- Expand your clientele -->
      <div class="card-custom">
        <h5>Расширьте базу клиентов</h5>
        <p>Простые стратегии для привлечения покупателей.</p>
        <div class="d-flex gap-2 flex-wrap">
          <button class="btn btn-outline-primary btn-sm">Подключиться к сети</button>
          <button class="btn btn-outline-primary btn-sm">Подключиться к сети</button>
          <button class="btn btn-outline-primary btn-sm">Подключиться к сети</button>
        </div>
      </div>
      
    </div>
    
    <!-- Правая колонка -->
    <div class="col-md-3 right-column">
      <!-- Activity Feed -->
      <div class="mb-4">
        <h5 class="fw-bold">Лента активности</h5>
        <div class="mt-3">
          <p><strong>Иван Петров</strong> по проекту «X»<br />
          <small class="text-muted">2 ч назад — Отлично сработались</small></p>
        </div>
        <div class="mt-3">
          <p><strong>Анна Смирнова</strong> по проекту «Y»<br />
          <small class="text-muted">1 день назад — Отличная работа</small></p>
        </div>
        <div class="mt-3">
          <p><strong>Алиса Иванова</strong> по проекту «Z»<br />
          <small class="text-muted">5 ч назад — Рекомендую</small></p>
        </div>
        <button class="btn btn-sm btn-outline-primary mt-2">Подробнее</button>
      </div>
      
      <!-- Top picks -->
      <div class="card-custom">
        <h6>Топовые предложения</h6>
        <ul class="list-unstyled mt-2">
          <li class="d-flex justify-content-between align-items-center">
            <span>Товар – 3600</span>
            <span>199,99₸</span>
            <a href="#" class="btn btn-sm btn-outline-secondary">Активировать</a>
          </li>
          <li class="d-flex justify-content-between align-items-center mt-2">
            <span>Товар – 3600</span>
            <span>199,99₸</span>
            <a href="#" class="btn btn-sm btn-outline-secondary">Активировать</a>
          </li>
        </ul>
        <button class="btn btn-sm btn-primary w-100 mt-3">Все продукты</button>
      </div>
      
      <!-- Request refunds -->
      <div class="card-custom">
        <h6>Запросы на возврат</h6>
        <p class="text-muted" style="font-size: 0.9rem;">
          Требуется действие по 52 запросам, включая 8 новых.
        </p>
        <button class="btn btn-outline-danger w-100 btn-sm">Просмотр</button>
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
