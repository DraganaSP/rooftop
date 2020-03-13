<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if($_GET['name'] == 'admin' && $_GET['password'] == 'admin'){
        header('Location: adminPanel.php');
        die();
    }
}

header('Location: ../index.html');
die();