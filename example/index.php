<?php

declare(strict_types=1);

require '../vendor/autoload.php';

use PerfectApp\Bootstrap5FlashMessage;
use PerfectApp\Session\Session;

$session = new Session();
$messages = require 'flashMessages.php';

$flash = new Bootstrap5FlashMessage($session, $messages);
$flash->addMessage('primary', 'example', 'bi-check-circle', true);
$flash->addMessage('secondary', 'example2', 'bi-check-circle', true);
$flash->addMessage('success', 'example3', 'bi bi-emoji-smile-fill');
$flash->addMessage('danger', 'example4', 'bi-x-circle');
$flash->addMessage('warning', 'example5');
$flash->addMessage('info', 'example6');
$flash->addMessage('light', 'example7');
$flash->addMessage('dark', 'example8');
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<?php $flash->displayMessages(); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
