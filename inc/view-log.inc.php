<?php
$logFile = __DIR__ . '/../log/' . PATH_LOG;

echo '<h3>Журнал посещений</h3>';

if (is_file($logFile)) {
    $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    echo '<ul>';
    foreach ($lines as $line) {
        list($dt, $page, $ref) = array_pad(explode('|', $line, 3), 3, '');
        $date = date('d-m-Y H:i:s', (int) $dt);
        $ref  = ($ref === '') ? 'прямой заход' : $ref;
        echo '<li>', $date, ' - ', htmlspecialchars($page),
             ' -&gt; ', htmlspecialchars($ref), '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>Журнал посещений пока пуст.</p>';
}
