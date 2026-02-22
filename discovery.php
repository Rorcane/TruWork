<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <title>Discovery</title>
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
    .right-column {
      background-color: #f8f9fa;
      padding: 1rem;
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
  <!-- Верхняя панель -->
  <nav class="navbar navbar-light bg-light border-bottom">
    <div class="container-fluid">
      <div class="d-flex align-items-center">
        <!-- Кнопка для мобильного меню -->
        <button class="btn btn-outline-secondary me-2 d-md-none" 
                type="button" 
                data-bs-toggle="offcanvas" 
                data-bs-target="#offcanvasSidebar" 
                aria-controls="offcanvasSidebar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <span class="fw-bold ms-2">Профиль</span>
      </div>
      <div class="d-flex align-items-center">
     
        <!-- Поле поиска -->
        <input 
          class="form-control me-2" 
          type="search" 
          placeholder="Поиск специалистов" 
          aria-label="Поиск" 
          style="width: 250px;"
        />
        
        <?php
  // Проверка куки
  if (isset($_COOKIE['user'])) {
    // Отображаем имя и ссылку на профиль
    echo '<a href="profile.php" class="text-decoration-none">' 
         . htmlspecialchars($_COOKIE['user']) 
         . '</a>';
  } else {
    // Отображаем кнопку «Войти»
    echo '<a href="login.html" class="btn btn-primary">Войти</a>';
  }
?>
      </div>
    </div>
  </nav>
  
  <div class="container-fluid">
    <div class="row">
      <!-- Боковое меню (на больших экранах) -->
      <div class="col-md-2 d-none d-md-block sidebar">
        <ul class="nav flex-column">
          <li class="nav-item mb-2">
            <a class="nav-link active" href="index.php">Главная</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="#">Сервисы</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="#">Портфолио</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="#">Связи</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="#">Аккаунт</a>
          </li>
          <li class="nav-item mt-4">
            <a class="nav-link text-danger" href="login.html">Выйти</a>
          </li>
        </ul>
      </div>
      
      <!-- Offcanvas (для мобильных устройств) -->
      <div 
        class="offcanvas offcanvas-start" 
        tabindex="-1" 
        id="offcanvasSidebar" 
        aria-labelledby="offcanvasSidebarLabel"
      >
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasSidebarLabel">Меню</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="nav flex-column">
            <li class="nav-item mb-2">
              <a class="nav-link active" href="index.php">Главная</a>
            </li>
            <li class="nav-item mb-2">
              <a class="nav-link" href="#">Сервисы</a>
            </li>
            <li class="nav-item mb-2">
              <a class="nav-link" href="#">Портфолио</a>
            </li>
            <li class="nav-item mb-2">
              <a class="nav-link" href="#">Связи</a>
            </li>
            <li class="nav-item mb-2">
              <a class="nav-link" href="#">Аккаунт</a>
            </li>
            <li class="nav-item mt-4">
              <a class="nav-link text-danger" href="login.html">Выйти</a>
            </li>
          </ul>
        </div>
      </div>
      
      <!-- Центральная часть -->
      <div class="col-md-7 content-area">
        <div class="container-fluid">
          
          <!-- Smart Recruitment -->
          <div class="bg-light p-3 mb-3 rounded">
            <h4>Умный найм (Smart Recruitment)</h4>
            <div class="d-flex flex-wrap gap-2 mt-3">
              <button class="btn btn-outline-secondary">Оценка ID</button>
              <button class="btn btn-primary">Проверить</button>
              <button class="btn btn-outline-secondary">Клиентская база HR</button>
              <button class="btn btn-outline-secondary">Обновить</button>
            </div>
            <p class="mt-3">Управляйте своей командой эффективно</p>
            <div class="d-flex gap-3">
              <div>
                <img src="https://via.placeholder.com/50" class="rounded-circle" alt="Профи" />
                <p class="small text-center">Профи</p>
              </div>
              <div>
                <img src="https://via.placeholder.com/50" class="rounded-circle" alt="Профи" />
                <p class="small text-center">Профи</p>
              </div>
              <div>
                <img src="https://via.placeholder.com/50" class="rounded-circle" alt="Профи" />
                <p class="small text-center">Профи</p>
              </div>
            </div>
            <button class="btn btn-outline-primary mt-2">Уведомить</button>
          </div>
          
          <!-- Profile View (график) -->
          <div class="bg-light p-3 mb-3 rounded">
            <div class="d-flex justify-content-between align-items-center">
              <h5>Просмотры профиля</h5>
              <input 
                type="text" 
                class="form-control form-control-sm" 
                placeholder="Поиск по дате" 
                style="width: 150px;"
              />
            </div>
            <!-- «График» (заглушка) -->
            <div class="mt-3" style="height: 200px; background: #e1ecf4;">
              <p class="text-center pt-5">График просмотров (макет)</p>
            </div>
          </div>
          
          <!-- Product ideas -->
          <div class="bg-light p-3 mb-3 rounded">
            <h5>Идеи продуктов</h5>
            <p class="text-muted">Ищете новые концепции продуктов?</p>
            <div class="row g-2">
              <div class="col">
                <button class="btn btn-outline-secondary w-100">
                  Экспертные предложения <br />
                  <small>Примерное время:</small>
                </button>
              </div>
              <div class="col">
                <button class="btn btn-outline-secondary w-100">
                  Экспертные советы <br />
                  <small>Примерное время:</small>
                </button>
              </div>
              <div class="col">
                <button class="btn btn-outline-secondary w-100">
                  Полезные подсказки <br />
                  <small>Примерное время:</small>
                </button>
              </div>
              <div class="col">
                <button class="btn btn-outline-secondary w-100">
                  Внутренние инсайты <br />
                  <small>Примерное время:</small>
                </button>
              </div>
            </div>
          </div>
          
          <!-- Expand your clientele -->
          <div class="bg-light p-3 rounded">
            <h5>Расширьте базу клиентов</h5>
            <p>Узнайте простые стратегии для привлечения большего числа покупателей.</p>
            <div class="d-flex gap-2 flex-wrap">
              <button class="btn btn-outline-primary">Подключиться к сети</button>
              <button class="btn btn-outline-primary">Подключиться к сети</button>
              <button class="btn btn-outline-primary">Подключиться к сети</button>
            </div>
          </div>
          
        </div>
      </div>
      
      <!-- Правая колонка -->
      <div class="col-md-3 right-column">
        <!-- Лента активности -->
        <div class="mb-4">
          <h5 class="fw-bold">Лента активности</h5>
          <div class="mt-3">
            <p><strong>Иван Петров</strong> по проекту «X»<br />
            <small class="text-muted">2 ч назад — Отличное сотрудничество</small></p>
          </div>
          <div class="mt-3">
            <p><strong>Анна Смирнова</strong> по проекту «Y»<br />
            <small class="text-muted">1 день назад — Впечатляющая работа, браво</small></p>
          </div>
          <div class="mt-3">
            <p><strong>Алиса Иванова</strong> по проекту «Z»<br />
            <small class="text-muted">5 ч назад — Очень рекомендую</small></p>
          </div>
          <button class="btn btn-sm btn-outline-primary mt-2">Подробнее</button>
        </div>
        
        <!-- Топовые предложения -->
        <div class="mb-4 bg-white p-3 rounded">
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
            <li class="d-flex justify-content-between align-items-center mt-2">
              <span>Товар – 3600</span>
              <span>199,99₸</span>
              <a href="#" class="btn btn-sm btn-outline-secondary">Активировать</a>
            </li>
          </ul>
          <button class="btn btn-sm btn-primary w-100 mt-3">Все продукты</button>
        </div>
        
        <!-- Запросы на возврат -->
        <div class="bg-white p-3 rounded">
          <h6>Запросы на возврат</h6>
          <p class="text-muted" style="font-size: 0.9rem;">
            Требуется действие по 52 запросам на возврат, в том числе 8 новых.
          </p>
          <button class="btn btn-outline-danger w-100">Просмотр запросов</button>
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
