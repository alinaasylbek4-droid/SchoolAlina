<?php


setlocale(LC_ALL, "russian");
$year = strftime('%Y');

function drawTable($cols, $rows, $color)
{
    echo "<table border='1' cellpadding='5' style='background-color: $color;'>";
    for ($i = 1; $i <= $rows; $i++) {
        echo '<tr>';
        for ($j = 1; $j <= $cols; $j++) {
            $value = $i * $j;
            if ($i == 1 || $j == 1) {
              
                echo "<th style='text-align: center; background-color: #3e809c;'>$value</th>";
            } else {
                echo "<td>$value</td>";
            }
        }
        echo '</tr>';
    }
    echo '</table>';
}

$cols  = isset($_GET['cols'])  ? (int) $_GET['cols']  : 5;
$rows  = isset($_GET['rows'])  ? (int) $_GET['rows']  : 5;
$color = isset($_GET['color']) && $_GET['color'] !== '' ? $_GET['color'] : 'white';

if ($cols < 1 || $cols > 10) { $cols = 5; }
if ($rows < 1 || $rows > 10) { $rows = 5; }
if (!preg_match('/^#?[A-Za-z0-9]{1,20}$/', $color)) { $color = 'white'; }
?>
<!DOCTYPE html>
<html>

<head>
  <title>Таблица умножения</title>
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
    <h1>Таблица умножения</h1>
    <!-- Заголовок -->
    <!-- Область основного контента -->
    <form action=''>
      <label>Количество колонок: </label>
      <br />
      <input name='cols' type='text' value="<?= $cols ?>" />
      <br />
      <label>Количество строк: </label>
      <br />
      <input name='rows' type='text' value="<?= $rows ?>" />
      <br />
      <label>Цвет: </label>
      <br />
      <input name='color' type='text' value="<?= htmlspecialchars($color) ?>" />
      <br />
      <br />
      <input type='submit' value='Создать' />
    </form>
    <!-- Таблица -->
    <?php drawTable($cols, $rows, $color); ?>
    <!-- Таблица -->
    <!-- Область основного контента -->
  </div>
  <div id="nav">
    <h2>Навигация по сайту</h2>
    <!-- Меню -->
    <ul>
      <li><a href='index.php'>Домой</a>
      </li>
      <li><a href='about.php'>О нас</a>
      </li>
      <li><a href='contact.php'>Контакты</a>
      </li>
      <li><a href='table.php'>Таблица умножения</a>
      </li>
      <li><a href='calc.php'>Калькулятор</a>
      </li>
    </ul>
    <!-- Меню -->
  </div>
  <div id="footer">
    <!-- Нижняя часть страницы -->
    &copy; Супер Мега Веб-мастер, 2000 &ndash; <?= $year ?>
    <!-- Нижняя часть страницы -->
  </div>
</body>

</html>