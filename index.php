<?php

require_once('controller/AppController.php');

session_start();

if (!isset($_SESSION['control'])) {
    $_SESSION['control'] = new AppController(); 
}

$control = $_SESSION['control'];
$control->main();

?>