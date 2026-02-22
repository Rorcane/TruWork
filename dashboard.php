<?php
// dashboard.php
if (!isset($_COOKIE['user'])) {
  header('Location: login.html');
  exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Панель управления</title>
  <link rel="stylesheet" href="css/style.css">
  <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet"
  />
</head>
<body>

<!-- Шапка -->
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">TruWork</a>
    <div class="ms-auto">
      <?php
      // Если авторизован
      if (isset($_COOKIE['user'])) {
        echo '<a href="profile.php" class="text-decoration-none">'
             . htmlspecialchars($_COOKIE['user']) . '</a>';
      } else {
        echo '<a href="login.html" class="btn btn-primary">Войти</a>';
      }
      ?>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">
    <!-- Левая панель (sidebar) -->
    <div class="col-md-2 sidebar">
      <h5 class="mb-4">Меню</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="dashboard.php" class="nav-link active">Панель</a></li>
        <li class="nav-item mb-2"><a href="vacancy.php" class="nav-link">Опубликовать вакансию</a></li>
        <li class="nav-item mt-4"><a href="logout.php" class="nav-link text-danger">Выйти</a></li>
      </ul>
    </div>
    
    <!-- Основной контент -->
    <div class="col-md-10 content-area">
      <div class="container py-3">
        <h2>Панель управления</h2>
        <p>Добро пожаловать в админ-панель. Здесь можно управлять вакансиями и т.д.</p>
        <a href="add_vacancy.php" class="btn btn-primary">Добавить вакансию</a>
      </div>
    </div>
  </div>
</div>

<script 
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
</script>
</body>
</html>

<?php
// dashboard.php
if (!isset($_COOKIE['user'])) {
  header('Location: login.html');
  exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Панель управления</title>
  <link rel="stylesheet" href="css/style.css">
  <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet"
  />
</head>
<body>

<!-- Шапка -->
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="aidrive.php">
        <img src="logo2.png" alt="TruWork" width="180" height="30" class="me-2" />
      </a>
    <div class="ms-auto">
      <?php
      // Если авторизован
      if (isset($_COOKIE['user'])) {
        echo '<a href="profile.php" class="text-decoration-none">'
             . htmlspecialchars($_COOKIE['user']) . '</a>';
      } else {
        echo '<a href="login.html" class="btn btn-primary">Войти</a>';
      }
      ?>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">
    <!-- Левая панель (sidebar) -->
    <div class="col-md-2 sidebar">
      <h5 class="mb-4">Меню</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="dashboard.php" class="nav-link active">Панель</a></li>
        <li class="nav-item mb-2"><a href="vacancy.php" class="nav-link">Опубликовать вакансию</a></li>
        <li class="nav-item mt-4"><a href="logout.php" class="nav-link text-danger">Выйти</a></li>
      </ul>
    </div>
    
    <!-- Основной контент -->
    <div class="col-md-10 content-area">
      <div class="container py-3">
        <h2>Панель управления</h2>
        <p>Добро пожаловать в админ-панель. Здесь можно управлять вакансиями и т.д.</p>
        <a href="add_vacancy.php" class="btn btn-primary">Добавить вакансию</a>
      </div>
    </div>
  </div>
</div>

<script 
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
</script>
</body>
</html>

