<?php
require_once 'config.php';

// Выбираем все вакансии, сортируя по дате создания (от новых к старым)
$stmt = $pdo->query("SELECT * FROM vacancies ORDER BY created_at DESC");
$vacancies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TruWork</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/Style.css" />
</head>
<body>
  
  <!-- Шапка сайта (Navbar) -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container">
      <a class="navbar-brand fw-bold" href="aidrive.php">
        <img src="img/logo.png" alt="AI-drive" width="30" height="30" class="me-2" />
        TruWork
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Переключить навигацию">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="dashboard.php">Панель управления</a></li>
          <li class="nav-item"><a class="nav-link" href="discovery.php">Обзор</a></li>
          <li class="nav-item"><a class="nav-link" href="vacancy.php">Опубликовать вакансию</a></li>
          <li class="nav-item"><a class="nav-link" href="search.php">Найти</a></li>
        </ul>
      </div>
      
      <?php
      // Проверка куки для отображения имени пользователя или кнопки "Войти"
      if (isset($_COOKIE['user'])) {
        echo '<a href="profile.php" class="text-decoration-none">' . htmlspecialchars($_COOKIE['user']) . '</a>';
      } else {
        echo '<a href="login.html" class="btn btn-primary">Войти</a>';
      }
      ?>
    </div>
  </nav>
  
  <!-- Основной контейнер -->
  <main class="container py-5">
    <h1 class="mb-4 fw-bold">Умный поиск</h1>
    
    <!-- Блок тегов/интересов (можете оставить статичным или динамически генерировать) -->
    <div class="mb-4 d-flex flex-wrap gap-2">
      <button class="btn btn-outline-dark btn-sm">Продажи</button>
      <button class="btn btn-outline-dark btn-sm">Маркетинг</button>
      <button class="btn btn-outline-dark btn-sm">Добавить интересы</button>
      <button class="btn btn-outline-dark btn-sm">Удалённо</button>
      <button class="btn btn-outline-dark btn-sm">Найти</button>
      <button class="btn btn-outline-secondary btn-sm">Логистика</button>
      <button class="btn btn-outline-secondary btn-sm">Поддержка</button>
      <button class="btn btn-outline-secondary btn-sm">Технологии</button>
    </div>
    
    <!-- Количество вакансий -->
    <p class="text-muted">Найдено <?php echo count($vacancies); ?> вакансий</p>
    
    <!-- Динамический вывод вакансий -->
    <?php if ($vacancies): ?>
      <?php foreach ($vacancies as $vacancy): ?>
        <div class="p-3 mb-3 bg-light rounded d-flex flex-column flex-sm-row align-items-start justify-content-between">
          <div>
            <h5 class="mb-1 fw-bold"><?php echo htmlspecialchars($vacancy['title']); ?></h5>
            <p class="mb-1 text-muted"><?php echo htmlspecialchars($vacancy['company']); ?></p>
            <p class="mb-2">
              <?php echo nl2br(htmlspecialchars($vacancy['description'])); ?>
            </p>
            <p class="mb-1"><strong>Зарплата:</strong> <?php echo htmlspecialchars($vacancy['salary']); ?></p>
            <p class="mb-1"><strong>Местоположение:</strong> <?php echo htmlspecialchars($vacancy['location']); ?></p>
            <p class="mb-0"><small class="text-muted">Опубликовано: <?php echo htmlspecialchars($vacancy['created_at']); ?></small></p>
          </div>
          <div>
            <a href="#" class="btn btn-outline-primary btn-sm mt-3 mt-sm-0" data-bs-toggle="modal" data-bs-target="#applyModal">Подать заявку</a>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>Вакансии не найдены.</p>
    <?php endif; ?>
    
    <!-- Пример модального окна для подачи заявки -->
    <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="applyModalLabel">Подача заявки</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="applicantName" class="form-label">Ваше имя</label>
                <input type="text" class="form-control" id="applicantName" required>
              </div>
              <div class="mb-3">
                <label for="applicantEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="applicantEmail" required>
              </div>
              <div class="mb-3">
                <label for="coverLetter" class="form-label">Сопроводительное письмо</label>
                <textarea class="form-control" id="coverLetter" rows="3" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Отправить заявку</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Кнопка "Загрузить еще" (при необходимости можно реализовать пагинацию) -->
    <div class="text-center">
      <button class="btn btn-outline-dark">Загрузить еще</button>
    </div>
  </main>
  
  <!-- Футер -->
  <footer class="bg-light border-top py-4 mt-5">
    <div class="container">
      <div class="row gy-4">
        <!-- Пример футера, можно добавить нужные ссылки -->
        <div class="col-12 col-md-3">
          <h5 class="fw-bold mb-3">Маркетплейс AI</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-decoration-none text-muted">Текущие вакансии</a></li>
            <li><a href="#" class="text-decoration-none text-muted">Компании</a></li>
            <li><a href="#" class="text-decoration-none text-muted">Гибкие роли</a></li>
            <li><a href="#" class="text-decoration-none text-muted">Образование</a></li>
            <li><a href="#" class="text-decoration-none text-muted">Некоммерческие организации</a></li>
            <li><a href="#" class="text-decoration-none text-muted">Удалённые вакансии</a></li>
          </ul>
        </div>
        <div class="col-12 col-md-3">
          <h5 class="fw-bold mb-3">Руководство</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-decoration-none text-muted">Идеи</a></li>
            <li><a href="#" class="text-decoration-none text-muted">Последние вакансии</a></li>
            <li><a href="#" class="text-decoration-none text-muted">Развитие навыков</a></li>
            <li><a href="#" class="text-decoration-none text-muted">Советы по резюме</a></li>
            <li><a href="#" class="text-decoration-none text-muted">Сравнение заработков</a></li>
            <li><a href="#" class="text-decoration-none text-muted">Расчет налогов</a></li>
          </ul>
        </div>
        <div class="col-12 col-md-3">
          <h5 class="fw-bold mb-3">Мои заявки</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-decoration-none text-muted">Сводка</a></li>
            <li><a href="#" class="text-decoration-none text-muted">Рекомендовано</a></li>
            <li><a href="#" class="text-decoration-none text-muted">Журнал заявок</a></li>
          </ul>
        </div>
        <div class="col-12 col-md-3">
          <h5 class="fw-bold mb-3">Связь с нами</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-decoration-none text-muted">Социальные сети</a></li>
            <li><a href="#" class="text-decoration-none text-muted">Сеть</a></li>
            <li><a href="#" class="text-decoration-none text-muted">Социальная платформа</a></li>
            <li><a href="#" class="text-decoration-none text-muted">Профессиональная сеть</a></li>
          </ul>
        </div>
      </div>
      <div class="text-center mt-4 text-muted">
        &copy; 2023 AI-drive. Все права защищены.
      </div>
    </div>
  </footer>
  
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
