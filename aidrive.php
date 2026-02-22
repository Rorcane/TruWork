<?php
// Определяем активную страницу, по умолчанию "panel"
$page = isset($_GET['page']) ? $_GET['page'] : 'panel';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <title>TruWork</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootstrap CSS -->
  <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
  />
  <style>
    .sidebar {
      min-height: 100vh;
      background-color: #f1f1f1;
      padding: 1rem;
    }
    .sidebar .nav-link {
      color: #333;
    }
    .sidebar .nav-link.active, .sidebar .nav-link:hover {
      background-color: #e2e2e2;
    }
    .content-area {
      background-color: #fff;
      padding: 1rem;
    }
    footer {
      background-color: #f8f9fa;
      border-top: 1px solid #ddd;
    }
    footer a {
      text-decoration: none;
      color: #6c757d;
    }
    /* Сброс для контейнеров, чтобы они занимали всю ширину */
    .container, .container-fluid {
      max-width: 100% !important;
      margin: 0 !important;
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
      <div class="col-12 col-md-2 sidebar">
        <h5 class="mb-4">Навигация</h5>
        <ul class="nav flex-column mb-5">
          <li class="nav-item mb-2">
            <a class="nav-link <?php echo ($page == 'panel') ? 'active' : ''; ?>" href="aidrive.php?page=panel">Панель</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link <?php echo ($page == 'tasks') ? 'active' : ''; ?>" href="aidrive.php?page=tasks">Мои задачи</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link <?php echo ($page == 'notifications') ? 'active' : ''; ?>" href="aidrive.php?page=notifications">Уведомления</a>
          </li>
        <ul class="nav flex-column mt-auto">
          <li class="nav-item mb-2">
            <a class="nav-link <?php echo ($page == 'settings') ? 'active' : ''; ?>" href="aidrive.php?page=settings">Настройки</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="index.php">Выйти</a>
          </li>
        </ul>
      </div>
      
      <!-- Основной контент -->
      <div class="col-md-10 content-area">
        <!-- Верхняя панель с поиском и кнопками -->
        <div class="d-flex align-items-center justify-content-between mb-3">
          <div class="d-flex align-items-center gap-2">
            <input 
              type="text" 
              class="form-control form-control-sm" 
              placeholder="Поиск" 
              style="width: 200px;"
            />
            <a href="#" class="btn btn-secondary btn-sm">Новая задача</a>
            <button class="btn btn-outline-secondary btn-sm">Применить</button>
          </div>
          <?php
          // Проверка куки для вывода ссылки на профиль или кнопки "Войти"
          if (isset($_COOKIE['user'])) {
            echo '<a href="profile.php" class="text-decoration-none">' 
                 . htmlspecialchars($_COOKIE['user']) 
                 . '</a>';
          } else {
            echo '<a href="login.html" class="btn btn-primary">Войти</a>';
          }
          ?>
        </div>
        
        <!-- Вывод контента в зависимости от выбранной страницы -->
        <?php
          switch ($page) {
            case 'panel':
              echo '<h4>Добро пожаловать на панель</h4>';
              echo '<p>Здесь вы можете видеть сводную информацию по вашим проектам и задачам.</p>';
              break;
            case 'tasks':
              ?>
              <div class="bg-light p-3 mb-3 rounded">
                <h4>Мои задачи</h4>
                <ul class="list-unstyled">
                  <li class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="task1" />
                    <label class="form-check-label" for="task1">
                      <strong>Месячный отчёт — 23 января</strong><br />
                      <small class="text-muted">Важные задачи для e-commerce</small>
                    </label>
                  </li>
                  <li class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="task2" />
                    <label class="form-check-label" for="task2">
                      <strong>Месячный отчёт — 23 февраля</strong><br />
                      <small class="text-muted">Критичные задачи для e-commerce</small>
                    </label>
                  </li>
                  <li class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="task3" />
                    <label class="form-check-label" for="task3">
                      <strong>Квартальный отчёт</strong><br />
                      <small class="text-muted">Ежемесячные отчёты компании</small>
                    </label>
                  </li>
                </ul>
                <button class="btn btn-outline-primary btn-sm">Расширенный поиск</button>
              </div>
              <?php
              break;
            case 'notifications':
              echo '<h4>Уведомления</h4>';
              echo '<p>Здесь отображаются все ваши уведомления. Вы можете увидеть новые сообщения и обновления статуса задач.</p>';
              // Пример уведомлений
              echo '<ul class="list-group">';
              echo '<li class="list-group-item">Уведомление 1: Новая задача назначена вам.</li>';
              echo '<li class="list-group-item">Уведомление 2: Изменился статус задачи "Месячный отчёт".</li>';
              echo '<li class="list-group-item">Уведомление 3: Новое сообщение от администратора.</li>';
              echo '</ul>';
              break;
            case 'settings':
              echo '<h4>Настройки</h4>';
              echo '<p>В этом разделе вы можете изменить настройки вашего аккаунта, уведомлений и конфиденциальности.</p>';
              // Пример настроек
              echo '<form>';
              echo '<div class="mb-3">';
              echo '<label for="email" class="form-label">Email</label>';
              echo '<input type="email" class="form-control" id="email" placeholder="Введите ваш email">';
              echo '</div>';
              echo '<div class="mb-3">';
              echo '<label for="password" class="form-label">Пароль</label>';
              echo '<input type="password" class="form-control" id="password" placeholder="Введите новый пароль">';
              echo '</div>';
              echo '<button type="submit" class="btn btn-primary">Сохранить изменения</button>';
              echo '</form>';
              break;
            default:
              echo '<h4>Добро пожаловать</h4>';
              echo '<p>Выберите раздел из меню.</p>';
          }
        ?>
      </div>
    </div>
  </div>
  
  <!-- Футер -->
  <footer class="py-4 mt-4">
    <div class="container">
      <div class="row g-4">
        <div class="col-12 col-md-3">
          <h6 class="fw-bold">AI Marketplace</h6>
          <ul class="list-unstyled">
            <li><a href="#">Вакансии</a></li>
            <li><a href="#">Компании</a></li>
            <li><a href="#">Гибкие роли</a></li>
            <li><a href="#">Обучение</a></li>
            <li><a href="#">НКО</a></li>
            <li><a href="#">Удалённая работа</a></li>
          </ul>
        </div>
        <div class="col-12 col-md-3">
          <h6 class="fw-bold">Гайд</h6>
          <ul class="list-unstyled">
            <li><a href="#">Идеи</a></li>
            <li><a href="#">Последние вакансии</a></li>
            <li><a href="#">Прокачка навыков</a></li>
            <li><a href="#">Советы по резюме</a></li>
            <li><a href="#">Сравнение зарплат</a></li>
            <li><a href="#">Оценка налогов</a></li>
          </ul>
        </div>
        <div class="col-12 col-md-3">
          <h6 class="fw-bold">Мои заявки</h6>
          <ul class="list-unstyled">
            <li><a href="#">Сводка</a></li>
            <li><a href="#">Избранное</a></li>
            <li><a href="#">Логи заявок</a></li>
          </ul>
        </div>
        <div class="col-12 col-md-3">
          <h6 class="fw-bold">Связь с нами</h6>
          <ul class="list-unstyled">
            <li><a href="#">Соцсети</a></li>
            <li><a href="#">Сеть</a></li>
            <li><a href="#">Социальная платформа</a></li>
            <li><a href="#">Профессиональная сеть</a></li>
          </ul>
        </div>
      </div>
      <div class="text-center text-muted mt-4">
        &copy; 2023 AI-drive. Все права защищены.
      </div>
    </div>
  </footer>
  
  <!-- Bootstrap JS -->
  <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  ></script>
</body>
</html>
