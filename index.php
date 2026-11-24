<?php
include 'inc/cookie.inc.php';

define('PATH_LOG', 'path.log');
include 'inc/log.inc.php';

setlocale(LC_ALL, "russian");
$day = strftime('%d');
$mon = strftime('%m');
$year = strftime('%Y');


$hour = (int) strftime('%H');
$welcome = ''; 

if ($hour >= 0 && $hour < 6) {
    $welcome = 'Доброй ночи';
} elseif ($hour >= 6 && $hour < 12) {
    $welcome = 'Доброе утро';
} elseif ($hour >= 12 && $hour < 18) {
    $welcome = 'Добрый день';
} elseif ($hour >= 18 && $hour <= 23) {
    $welcome = 'Добрый вечер';
} else {
    $welcome = 'Доброе время суток';
}

$leftMenu = [
  ['link'=>'Домой', 'href'=>'index.php'],
  ['link'=>'О нас', 'href'=>'about.php'],
  ['link'=>'Контакты', 'href'=>'contact.php'],
  ['link'=>'Таблица умножения', 'href'=>'table.php'],
  ['link'=>'Калькулятор', 'href'=>'calc.php'],
  ['link'=>'Журнал посещений', 'href'=>'index.php?id=log']
];

function drawMenu($menu, $vertical = true)
{
    if ($vertical) {
        echo '<ul>';
        foreach ($menu as $item) {
            echo "<li><a href='{$item['href']}'>{$item['link']}</a></li>";
        }
        echo '</ul>';
    } else {
        foreach ($menu as $item) {
            echo "<a href='{$item['href']}'>{$item['link']}</a> &nbsp;";
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Сайт нашей школы</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>

  <div id="header">
    <!-- Верхняя часть страницы -->
    <img src="logo.gif" width="187" height="29" alt="Наш логотип" class="logo" />
    <span class="slogan">приходите к нам учиться</span>
    <!-- Верхняя часть страницы -->
  </div>

  <div id="content">
    <!-- Заголовок -->
    <h1><?= $welcome ?>, Гость!</h1>
    <!-- Заголовок -->
    <!-- Область основного контента -->
    <?php if (isset($_GET['id']) && $_GET['id'] === 'log') : ?>
      <?php include 'inc/view-log.inc.php'; ?>
    <?php else : ?>
    <blockquote>
      <?php echo 'Сегодня ', $day, ' число, ', $mon, ' месяц, ', $year, ' год.'; ?>
    </blockquote>
    <p>
      <?php
      if ($visitCounter == 1) {
          echo 'Спасибо, что зашли на огонек';
      } else {
          echo "Вы зашли к нам $visitCounter раз<br>";
          echo "Последнее посещение: $lastVisit";
      }
      ?>
    </p>
    <h3>Зачем мы ходим в школу?</h3>
    <p>
      У нас каждую минуту что-то происходит и кипит жизнь. Проходят уроки и шумят перемены, кто-то отвечает у доски, кто-то отчаянно зубрит перед контрольной пройденный материал, кому-то ставят «пятерку» за сочинение, кого-то ругают за непрочитанную книгу, на школьной спортивной площадке ребята играют в футбол, а девочки – в волейбол, некоторые готовятся к соревнованиям, другие участвуют в репетициях праздников…
    </p>
    <h3>Что такое ЕГЭ?</h3>
    <p>
      Аббревиатура ЕГЭ расшифровывается как "Единый Государственный Экзамен". Почему "единый"? ЕГЭ одновременно является и вступительным экзаменом в ВУЗ и итоговой оценкой каждого выпускника школы. К тому же на всей территории России используются однотипные задания и единая система оценки.
    </p>
    <p>
      Результаты ЕГЭ оцениваются по 100-балльной и пятибалльной системам и заносятся в свидетельство о результатах единого государственного экзамена. Срок действия данного документа истекает 31 декабря года, следующего за годом его выдачи, поэтому у абитуриентов есть возможность поступать в ВУЗы со свидетельством ЕГЭ в течение двух лет.
    </p>
    <?php endif; ?>
    <!-- Область основного контента -->
  </div>
  <div id="nav">
    <!-- Навигация -->
    <h2>Навигация по сайту</h2>
    <!-- Меню -->
    <?php drawMenu($leftMenu); ?>
    <!-- Меню -->
    <!-- Навигация -->
  </div>
  <div id="footer">
    <!-- Нижняя часть страницы -->
    &copy; Супер Мега Веб-мастер, 2000 &ndash; <?= $year ?>
    <!-- Нижняя часть страницы -->
  </div>
</body>

</html>