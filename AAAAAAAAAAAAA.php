<?php
// Показываем ошибки и подключаем БД
ini_set('display_errors', 1);
error_reporting(E_ALL);
include __DIR__ . '/config.php';

// Поля, по которым разрешено сортировать
$allowedSort = ['created_at', 'title'];
$sort = $_GET['sort'] ?? 'created_at';
if (!in_array($sort, $allowedSort, true)) {
    $sort = 'created_at';
}

// Запрос вакансий с сортировкой
$sql = "SELECT * FROM vacancies ORDER BY `$sort` DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$vacancies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Вакансии на рынке ИИ</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gray-50 text-gray-800">
  <header class="max-w-4xl mx-auto my-10 text-center px-4">
    <h1 class="text-4xl font-bold mb-2">Вакансии на основе ИИ</h1>
    <p class="text-lg text-gray-600">Сортируйте открытые позиции по дате создания или названию.</p>
  </header>

  <!-- Сортировка -->
  <div class="max-w-4xl mx-auto px-4 mb-6">
    <label for="sort" class="font-medium">Сортировать по:</label>
    <select id="sort" onchange="location.search='?sort='+this.value" class="border rounded p-2 ml-2">
      <option value="created_at" <?= \$sort === 'created_at' ? 'selected' : '' ?>>Дате создания</option>
      <option value="title"      <?= \$sort === 'title'      ? 'selected' : '' ?>>Заголовку</option>
    </select>
  </div>

  <!-- Список вакансий -->
  <section class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 px-4 mb-16">
    <?php if (empty(\$vacancies)): ?>
      <p class="text-center col-span-full text-gray-600">Вакансии не найдены.</p>
    <?php else: foreach (\$vacancies as \$vac): ?>
      <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <div class="mb-4">
          <i data-feather="briefcase" class="w-8 h-8 text-indigo-600"></i>
        </div>
        <h3 class="text-xl font-semibold mb-1"><?= htmlspecialchars(\$vac['title']) ?></h3>
        <p class="text-sm text-gray-500 mb-2">Компания: <?= htmlspecialchars(\$vac['company']) ?></p>
        <p class="text-gray-600 mb-2"><?= nl2br(htmlspecialchars(\$vac['description'])) ?></p>
        <p class="text-sm text-gray-500">Зарплата: <?= htmlspecialchars(\$vac['salary']) ?></p>
        <p class="text-sm text-gray-500">Город: <?= htmlspecialchars(\$vac['location']) ?></p>
        <p class="text-sm text-gray-500">Категория: <?= htmlspecialchars(\$vac['category']) ?></p>
        <p class="text-sm text-gray-500">Автор: <?= htmlspecialchars(\$vac['author']) ?></p>
        <p class="text-xs text-gray-400 mt-3">Создано: <?= htmlspecialchars(\$vac['created_at']) ?></p>
      </div>
    <?php endforeach; endif; ?>
  </section>

  <footer class="bg-white py-8">
    <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 px-4 gap-6">
      <div>
        <h4 class="font-semibold mb-2">Свяжитесь с нами</h4>
        <p>Эл. почта: <a href="mailto:info@example.com" class="text-indigo-600">info@example.com</a></p>
        <p>Телефон: <a href="tel:+1234567890" class="text-indigo-600">+1 234 567 890</a></p>
      </div>
      <div>
        <h4 class="font-semibold mb-2">Быстрые ссылки</h4>
        <ul class="space-y-1">
          <li><a href="#" class="hover:text-indigo-600">Политика</a></li>
          <li><a href="#" class="hover:text-indigo-600">Условия</a></li>
          <li><a href="#" class="hover:text-indigo-600">Поддержка</a></li>
        </ul>
      </div>
    </div>
  </footer>

  <script>feather.replace();</script>
</body>
</html>

<?php
require_once 'config.php';

// Получаем фильтры из GET-запроса
$title_filter    = isset($_GET['title'])    ? trim($_GET['title'])    : '';
$company_filter  = isset($_GET['company'])  ? trim($_GET['company'])  : '';
$category_filter = isset($_GET['category']) ? trim($_GET['category']) : '';

$categories = ['Все категории', 'Продажи', 'Маркетинг', 'IT', 'Логистика', 'Поддержка', 'Технологии', 'Другое'];

// Строим SQL-запрос с параметрами
$sql    = "SELECT * FROM vacancies WHERE 1=1";
$params = [];

if ($title_filter !== '') {
    $sql .= " AND title LIKE :title";
    $params[':title'] = "%" . $title_filter . "%";
}
if ($company_filter !== '') {
    $sql .= " AND company LIKE :company";
    $params[':company'] = "%" . $company_filter . "%";
}
if ($category_filter !== '' && $category_filter !== 'Все категории') {
    $sql .= " AND category = :category";
    $params[':category'] = $category_filter;
}

$sql .= " ORDER BY created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$vacancies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="google-site-verification" content="R7tuyznBOd6HVEOL8Ayi7zpt51PzYy0f3MesJrilKPM" />
  <title>TruWork</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/Style.css" />
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container">
      <a class="navbar-brand fw-bold" href="aidrive.php">
        <img src="logo2.png" alt="TruWork" width="180" height="30" class="me-2" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="dashboard.php">Панель управления</a></li>
          <li class="nav-item"><a class="nav-link" href="discovery.php">Обзор</a></li>
          <li class="nav-item"><a class="nav-link" href="vacancy.php">Опубликовать вакансию</a></li>
          <li class="nav-item"><a class="nav-link" href="vacancies.php">Найти</a></li>
        </ul>
      </div>
      <?php
      if (isset($_COOKIE['user'])) {
        echo '<a href="profile.php" class="text-decoration-none">' . htmlspecialchars($_COOKIE['user']) . '</a>';
      } else {
        echo '<a href="login.html" class="btn btn-primary">Войти</a>';
      }
      ?>
    </div>
  </nav>

  <main class="container py-5">
    <h1 class="mb-4 fw-bold">Умный поиск</h1>

    <!-- Форма фильтрации -->
    <form method="get" class="row g-3 mb-4">
      <div class="col-md-3">
        <input type="text" name="title" class="form-control" placeholder="Название должности" value="<?php echo htmlspecialchars($title_filter); ?>">
      </div>
      <div class="col-md-3">
        <input type="text" name="company" class="form-control" placeholder="Компания" value="<?php echo htmlspecialchars($company_filter); ?>">
      </div>
      <div class="col-md-3">
        <select name="category" class="form-select">
          <?php foreach ($categories as $cat): ?>
            <option value="<?php echo $cat; ?>" <?php if ($category_filter === $cat) echo 'selected'; ?>><?php echo $cat; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-md-3">
        <button type="submit" class="btn btn-primary w-100">Фильтровать</button>
      </div>
    </form>

    <div class="mb-4 d-flex flex-wrap gap-2">
      <?php foreach ($categories as $cat): ?>
        <a href="?category=<?php echo urlencode($cat); ?>" class="btn btn-outline-secondary btn-sm <?php if ($category_filter === $cat) echo 'active'; ?>"><?php echo $cat; ?></a>
      <?php endforeach; ?>
    </div>

    <p class="text-muted">Найдено <?php echo count($vacancies); ?> вакансий</p>

    <?php if ($vacancies): ?>
      <?php foreach ($vacancies as $vacancy): ?>
        <div class="p-3 mb-3 bg-light rounded d-flex flex-column flex-sm-row align-items-start justify-content-between">
          <div>
            <h5 class="mb-1 fw-bold"><?php echo htmlspecialchars($vacancy['title']); ?></h5>
            <p><strong>Опубликовал:</strong> <?= htmlspecialchars($vacancy['author']) ?></p>
            <p class="mb-1 text-muted"><?php echo htmlspecialchars($vacancy['company']); ?></p>
            <p class="mb-2"><?php echo nl2br(htmlspecialchars($vacancy['description'])); ?></p>
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

    <!-- Модальное окно -->
    <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="applyModalLabel">Подача заявки</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
  </main>

  <footer class="bg-light border-top py-4 mt-5">
    <div class="container">
      <div class="text-center mt-4 text-muted">
        &copy; 2026 TruWork. Все права защищены.
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
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

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Вакансии на рынке ИИ</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gray-50 text-gray-800">
  <header class="max-w-4xl mx-auto my-10 text-center px-4">
    <h1 class="text-4xl font-bold mb-2">Вакансии на основе ИИ</h1>
    <p class="text-lg text-gray-600">Сортируйте открытые позиции по дате или названию.</p>
  </header>

  <!-- Сортировка -->
  <div class="max-w-4xl mx-auto px-4 mb-6">
    <label for="sort" class="font-medium">Сортировать по:</label>
    <select id="sort" onchange="location.search='?sort='+this.value" class="border rounded p-2 ml-2">
      <option value="date_posted" <?= \$sort === 'date_posted' ? 'selected' : '' ?>>Дате публикации</option>
      <option value="title" <?= \$sort === 'title' ? 'selected' : '' ?>>Заголовку</option>
    </select>
  </div>

  <!-- Список вакансий -->
  <section class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 px-4 mb-16">
    <?php if (empty(\$vacancies)): ?>
      <p class="text-center col-span-full text-gray-600">Вакансии не найдены.</p>
    <?php else: foreach (\$vacancies as \$vac): ?>
      <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <div class="mb-4">
          <i data-feather="briefcase" class="w-8 h-8 text-indigo-600"></i>
        </div>
        <h3 class="text-xl font-semibold mb-2"><?= htmlspecialchars(\$vac['title']) ?></h3>
        <p class="text-gray-600 mb-2"><?= nl2br(htmlspecialchars(\$vac['description'])) ?></p>
        <p class="text-sm text-gray-500">Дата публикации: <?= htmlspecialchars(\$vac['date_posted']) ?></p>
      </div>
    <?php endforeach; endif; ?>
  </section>

  <footer class="bg-white py-8">
    <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 px-4 gap-6">
      <div>
        <h4 class="font-semibold mb-2">Свяжитесь с нами</h4>
        <p>Эл. почта: <a href="mailto:info@example.com" class="text-indigo-600">info@example.com</a></p>
        <p>Телефон: <a href="tel:+1234567890" class="text-indigo-600">+1 234 567 890</a></p>
      </div>
      <div>
        <h4 class="font-semibold mb-2">Быстрые ссылки</h4>
        <ul class="space-y-1">
          <li><a href="#" class="hover:text-indigo-600">Политика</a></li>
          <li><a href="#" class="hover:text-indigo-600">Условия</a></li>
          <li><a href="#" class="hover:text-indigo-600">Поддержка</a></li>
        </ul>
      </div>
    </div>
  </footer>

  <script>feather.replace();</script>
</body>
</html>



<?php
// Включаем отображение ошибок
ini_set('display_errors', 1);
error_reporting(E_ALL);


// 1) Подключаем config.php с перехватом ошибок
try {
    include __DIR__ . '/config.php';
} catch (Throwable $e) {
    die('Ошибка при загрузке config.php: ' . $e->getMessage());
}


// 2) Готовим и выполняем запрос с сортировкой, тоже в try/catch
try {
    // Разрешённые параметры сортировки
    
$allowedSort = ['created_at', 'title'];
    
$sort = $_GET['sort'] ?? 'created_at';

    if (!in_array($sort, $allowedSort, true)) {
        $sort = 'created_at';
    }

    // Запрос вакансий
    $sql = "SELECT * FROM vacancies ORDER BY `$sort` DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $vacancies = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('Ошибка запроса к БД: ' . $e->getMessage());
}

// 3) Рендер HTML


<?php
if (!isset($_COOKIE['user'])) {
    header('Location: login.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тестирование навыков | TruWork</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: #f8f9fa; }
        .sidebar {
            background: white;
            height: 100vh;
            border-right: 1px solid #dee2e6;
        }
        .main-content { padding: 20px; }
        .test-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .option-label {
            display: block;
            padding: 15px;
            margin: 10px 0;
            border: 2px solid #dee2e6;
            border-radius: 8px;
            cursor: pointer;
        }
        input[type="radio"]:checked + .option-label {
            border-color: #0d6efd;
            background: #e7f1ff;
        }
        .timer {
            font-size: 1.2rem;
            color: #dc3545;
            font-weight: 500;
        }
        .progress-bar { height: 5px; background: #0d6efd; }
    </style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="vacancies.php">
            <img src="logo2.png" alt="TruWork" width="180">
        </a>
        
        
    </div>
</nav>

<div class="container-fluid">
    <div class="row">

            <!-- Боковое меню -->
            <div class="col-md-2 sidebar p-3">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="profile.php" class="nav-link">
                            <i class="fas fa-home me-2"></i>Главная
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="Uslugi.php" class="nav-link active">
                            <i class="fas fa-handshake me-2"></i>Услуги
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="portfol.php" class="nav-link">
                            <i class="fas fa-briefcase me-2"></i>Портфолио
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="IDM.php" class="nav-link">
                            <i class="fas fa-file-alt me-2"></i>Подтвердить навыки
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="settings.php" class="nav-link">
                            <i class="fas fa-cog me-2"></i>Аккаунт
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Основной контент -->
            <div class="col-md-10 main-content">
                <div class="test-card p-4">
                    <h4 class="mb-4">Тестирование Junior Developer</h4>
                    
                    <div id="testArea" class="d-none">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="timer">Время: <span id="timeLeft">10</span>с</div>
                            <button class="btn btn-sm btn-danger" onclick="finishTest(true)">
                                Остановить тест
                            </button>
                        </div>
                        
                        <div id="questionsContainer"></div>
                        
                        <div class="progress mb-3">
                            <div class="progress-bar" id="progressBar"></div>
                        </div>
                    </div>

                    <div id="results" class="d-none">
                        <h5>Результаты:</h5>
                        <div class="alert alert-success">Правильно: <span id="correctCount">0</span></div>
                        <div class="alert alert-danger">Неправильно: <span id="wrongCount">0</span></div>
                        <button class="btn btn-primary" onclick="location.reload()">Начать заново</button>
                    </div>

                    <button id="startBtn" class="btn btn-lg btn-success" onclick="startTest()">
                        Начать тестирование
                    </button>
                </div>
            </div>
        </div>
    </div>

<script>
const questions = [
    {
        question: "Что такое HTML?",
        options: ["Язык программирования", "Язык разметки", "База данных"],
        correct: 1
    },
    {
        question: "Как объявить переменную в JavaScript?",
        options: ["variable x", "let x", "const x", "Все варианты"],
        correct: 3
    },
{
            question: "Что делает оператор '==='?",
            options: ["Присваивание", "Сравнение без приведения типа", "Логическое И"],
            correct: 1
        },
        {
            question: "Как создать массив?",
            options: ["new Array()", "[]", "Оба варианта"],
            correct: 2
        },
        {
            question: "Что такое CSS?",
            options: ["Язык стилей", "Препроцессор", "Фреймворк"],
            correct: 0
        },
        {
            question: "Что такое Git?",
            options: ["Язык программирования", "Система контроля версий", "База данных"],
            correct: 1
        },
        {
            question: "Как подключить JavaScript?",
            options: ["<script>", "<javascript>", "<js>"],
            correct: 0
        },
        {
            question: "Что такое API?",
            options: ["Язык программирования", "Интерфейс взаимодействия", "Библиотека"],
            correct: 1
        },
        {
            question: "Что выведет console.log(typeof null)?",
            options: ["null", "object", "undefined"],
            correct: 1
        },
        {
            question: "Какой метод преобразует JSON?",
            options: ["JSON.parse()", "JSON.stringify()", "Оба варианта"],
            correct: 2
        },	
];

let currentQuestion = 0;
let correct = 0;
let wrong = 0;
let timer;
const TIME_PER_QUESTION = 10;

function startTest() {
    document.getElementById('startBtn').classList.add('d-none');
    document.getElementById('testArea').classList.remove('d-none');
    loadQuestion();
    startTimer();
}

function loadQuestion() {
    const question = questions[currentQuestion];
    let optionsHTML = '';
    
    question.options.forEach((option, index) => {
        optionsHTML += `
            <div>
                <input type="radio" name="answer" id="opt${index}">
                <label class="option-label" for="opt${index}">${option}</label>
            </div>
        `;
    });
    
    document.getElementById('questionsContainer').innerHTML = `
        <h5>${question.question}</h5>
        ${optionsHTML}
    `;
}

function startTimer() {
    let time = TIME_PER_QUESTION;
    document.getElementById('progressBar').style.width = '0%';
    
    timer = setInterval(() => {
        time--;
        document.getElementById('timeLeft').textContent = time;
        document.getElementById('progressBar').style.width = 
            `${100 - (time / TIME_PER_QUESTION * 100)}%`;
        
        if(time <= 0) {
            wrong++;
            nextQuestion();
        }
    }, 1000);
}

function nextQuestion() {
    clearInterval(timer);
    
    if(currentQuestion < questions.length - 1) {
        currentQuestion++;
        loadQuestion();
        startTimer();
    } else {
        finishTest();
    }
}

function finishTest(userStopped = false) {
    clearInterval(timer);
    
    if(userStopped) {
        wrong += questions.length - currentQuestion - 1;
    }
    
    document.getElementById('testArea').classList.add('d-none');
    document.getElementById('results').classList.remove('d-none');
    document.getElementById('correctCount').textContent = correct;
    document.getElementById('wrongCount').textContent = wrong;
}

document.addEventListener('change', (e) => {
    if(e.target.name === 'answer') {
        const selected = parseInt(e.target.id.replace('opt', ''));
        if(questions[currentQuestion].correct === selected) correct++;
        else wrong++;
        nextQuestion();
    }
});
</script>

</body>
</html>