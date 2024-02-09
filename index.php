<?php
// public/index.php

require_once __DIR__ . '/src/routes/routes.php';

// URL'den path'i al
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route'lar? i?le
Route::run($path);

