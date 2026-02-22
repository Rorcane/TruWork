<?php
// services.php
if (!isset($_COOKIE['user'])) {
  header('Location: login.html');
  exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Услуги</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <!-- Боковая панель -->
    <div class="col-md-2 sidebar">
      <h5 class="mb-4">Профиль</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="profile.php" class="nav-link">Главная</a></li>
        <li class="nav-item mb-2"><a href="services.php" class="nav-link active">Услуги</a></li>
        <li class="nav-item mb-2"><a href="portfolio.php" class="nav-link">Портфолио</a></li>
        <li class="nav-item mb-2"><a href="connections.php" class="nav-link">Подключения</a></li>
        <li class="nav-item mb-2"><a href="settings.php" class="nav-link">Аккаунт</a></li>
        <li class="nav-item mt-4"><a href="logout.php" class="nav-link text-danger">Выйти</a></li>
      </ul>
    </div>
    <!-- Основной контент -->
    <div class="col-md-10 content-area">
      <h4>Услуги</h4>
      <p>Здесь вы можете управлять услугами, которые вы предоставляете.</p>
      
      <!-- Пример формы для добавления услуги -->
      <div class="card mb-3">
        <div class="card-header">Добавить новую услугу</div>
        <div class="card-body">
          <form action="save_service.php" method="post">
            <div class="mb-3">
              <label for="serviceTitle" class="form-label">Название услуги</label>
              <input type="text" class="form-control" id="serviceTitle" name="serviceTitle" required>
            </div>
            <div class="mb-3">
              <label for="serviceDescription" class="form-label">Описание услуги</label>
              <textarea class="form-control" id="serviceDescription" name="serviceDescription" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
          </form>
        </div>
      </div>
      
      <!-- Пример списка услуг -->
      <div class="card">
        <div class="card-header">Мои услуги</div>
        <div class="card-body">
          <p>Список добавленных услуг появится здесь.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
