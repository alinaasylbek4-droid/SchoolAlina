<?php
setlocale(LC_ALL, "russian");
$year = strftime('%Y');


$message = '';

// Упражнение 1: данные принимаем только методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   
    $num1     = isset($_POST['num1'])     ? trim($_POST['num1'])     : '';
    $num2     = isset($_POST['num2'])     ? trim($_POST['num2'])     : '';
    $operator = isset($_POST['operator']) ? trim($_POST['operator']) : '';

    if ($num1 === '' || $num2 === '' || $operator === '') {
        $message = 'Ошибка: заполните все поля.';

    } elseif (filter_var($num1, FILTER_VALIDATE_INT) === false ||
              filter_var($num2, FILTER_VALIDATE_INT) === false) {
        $message = 'Ошибка: числа должны быть целыми.';

    } else {
        $num1 = (int) $num1;
        $num2 = (int) $num2;

        // Упражнение 2: действие зависит от оператора
        switch ($operator) {
            case '+':
                $message = "Результат $num1 + $num2 = " . ($num1 + $num2);
                break;
            case '-':
                $message = "Результат $num1 - $num2 = " . ($num1 - $num2);
                break;
            case '*':
                $message = "Результат $num1 * $num2 = " . ($num1 * $num2);
                break;
            case '/':
                if ($num2 === 0) {
                    $message = 'Ошибка: на ноль делить нельзя.';
                } else {
                    $message = "Результат $num1 / $num2 = " . ($num1 / $num2);
                }
                break;
            default:
                $message = 'Ошибка: неверный оператор. Допустимы: + - * /';
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Калькулятор</title>
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
    <h1>Калькулятор школьника</h1>
    <!-- Заголовок -->
    <!-- Область основного контента -->
    <?php
    // Упражнение 3: результат выводим перед формой
    if ($message !== '') {
        echo '<p><b>', htmlspecialchars($message), '</b></p>';
    }
    ?>
    <form action='' method='post'>
      <label>Число 1:</label>
      <br />
      <input name='num1' type='text' value="<?= isset($_POST['num1']) ? htmlspecialchars($_POST['num1']) : '' ?>" />
      <br />
      <label>Оператор: </label>
      <br />
      <input name='operator' type='text' value="<?= isset($_POST['operator']) ? htmlspecialchars($_POST['operator']) : '' ?>" />
      <br />
      <label>Число 2: </label>
      <br />
      <input name='num2' type='text' value="<?= isset($_POST['num2']) ? htmlspecialchars($_POST['num2']) : '' ?>" />
      <br />
      <br />
      <input type='submit' value='Считать'>
    </form>
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
    &copy; Супер Мега Веб-мастер, 2000 &ndash;  <?= $year ?>
    <!-- Нижняя часть страницы -->
  </div>
</body>

</html>