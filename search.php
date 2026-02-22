<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <title>Поиск задач</title>
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
    .sidebar .nav-link:hover {
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
  max-width: 100% !important;  /* убираем ограничение */
  margin: 0 !important;        /* убираем автоцентрирование */
  padding-left: 0 !important;
  padding-right: 0 !important;
}
  </style>
  <link rel="stylesheet" href="css/style.css" />

</head>
<body>
  
  <div class="container-fluid">
    <div class="row">
      
      <!-- Левая панель -->
      <div class="col-12 col-md-2 sidebar">
        <h5 class="mb-4">Поиск</h5>
        <ul class="nav flex-column mb-5">
          <li class="nav-item mb-2">
            <a class="nav-link" href="#">Панель</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link active" href="#">Мои задачи</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="#">Уведомления</a>
          </li>
 
        <ul class="nav flex-column mt-auto">
          <li class="nav-item mb-2">
            <a class="nav-link" href="#">Настройки</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="#">Выйти</a>
          </li>
        </ul>
      </div>
      
      <!-- Основной контент -->
      <div class="col-md-10 content-area">
        
        <!-- Верхняя полоса: поле поиска, кнопка «Новая задача», «Применить» -->
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
  if (isset($_COOKIE['user'])) {
    echo '<a href="profile.php">', htmlspecialchars($_COOKIE['user']), '</a>';
  } else {
    echo '<a href="login.html" class="btn btn-primary">Войти</a>';
  }
?>

        </div>
        
        <!-- Блок уточнения критериев поиска -->
        <div class="bg-light p-3 mb-3 rounded">
          <h5>Уточните критерии поиска</h5>
          <div class="d-flex flex-wrap gap-2 mt-2">
            <button class="btn btn-outline-secondary btn-sm">Проект</button>
            <button class="btn btn-outline-secondary btn-sm">Дедлайн</button>
            <button class="btn btn-outline-secondary btn-sm">Тип</button>
            <button class="btn btn-outline-secondary btn-sm">Исполнитель</button>
          </div>
          
          <h6 class="mt-3">Список задач</h6>
          <ul class="list-unstyled">
            <li class="form-check mb-2">
              <input class="form-check-input" type="checkbox" id="task1" />
              <label class="form-check-label" for="task1">
                <strong>Месячный отчёт — 23 января</strong><br />
                <small class="text-muted">Важные e-commerce задачи</small>
              </label>
            </li>
            <li class="form-check mb-2">
              <input class="form-check-input" type="checkbox" id="task2" />
              <label class="form-check-label" for="task2">
                <strong>Месячный отчёт — 23 февраля</strong><br />
                <small class="text-muted">Критичные e-commerce задачи</small>
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
        
        <!-- Задачи на неделю -->
        <div class="d-flex flex-wrap gap-3">
          <div class="flex-fill bg-light p-3 rounded">
            <h6>Задачи на эту неделю</h6>
            <ul class="list-unstyled">
              <li class="mb-2">
                <strong>Обновление статусов заказов</strong><br />
                <small class="text-muted">Проверка посреди недели — В процессе</small>
              </li>
              <li class="mb-2">
                <strong>Оценка эффективности персонала</strong><br />
                <small class="text-muted">Задачи на середину недели — Средний приоритет</small>
              </li>
              <li class="mb-2">
                <strong>Формирование еженедельного отчёта</strong><br />
                <small class="text-muted">К концу недели — Низкий приоритет</small>
              </li>
            </ul>
          </div>
          
          <!-- Таблица задач -->
          <div class="flex-fill bg-light p-3 rounded">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th>Дедлайн</th>
                  <th>Стадия</th>
                  <th>Приоритет</th>
                  <th>Коллаборация</th>
                  <th>Исполнитель</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Середина недели</td>
                  <td>В процессе</td>
                  <td>Средний</td>
                  <td>Розничные операции</td>
                  <td>Команда</td>
                </tr>
                <tr>
                  <td>Середина недели</td>
                  <td>Умеренно</td>
                  <td>Команда</td>
                  <td>---</td>
                  <td>---</td>
                </tr>
                <tr>
                  <td>Конец недели</td>
                  <td>Начало</td>
                  <td>Низкий</td>
                  <td>Разработка</td>
                  <td>---</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        
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
