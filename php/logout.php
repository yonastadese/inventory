<?php
    session_start();
    unset($_SESSION['login_user']);
    session_destroy();
    exit;
?>