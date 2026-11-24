<?php

$visitCounter = 0;
if (isset($_COOKIE['visitCounter'])) {
    $visitCounter = (int) $_COOKIE['visitCounter'];
}

$lastVisit = '';
if (isset($_COOKIE['lastVisit'])) {
    $lastVisit = date('d-m-Y H:i:s', (int) $_COOKIE['lastVisit']);
}

if (!isset($_COOKIE['lastVisit']) || date('d-m-Y', (int) $_COOKIE['lastVisit']) != date('d-m-Y')) {
    $visitCounter++;
    setcookie('visitCounter', $visitCounter, time() + 3600 * 24 * 30);
    setcookie('lastVisit', time(), time() + 3600 * 24 * 30);
}
