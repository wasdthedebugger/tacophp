<?php

function allPages($pages, $currentPage) {
    foreach ($pages as $page) {
        if ($page == $currentPage) {
            echo "<a href='?page=$page' style='color:red;'>$page</a>&nbsp;&nbsp;&nbsp;";
        } else {
            echo "<a href='?page=$page'>$page</a>&nbsp;&nbsp;&nbsp;";
        }
    }
}

function loggedIn() {
    return isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;
}

function redirect($page, $additionalParameters) {
    $additionalParameters = !empty($additionalParameters) ? "&" . http_build_query($additionalParameters) : "";
    header("Location: ?page=$page" . $additionalParameters);
    exit;
}

class Debug{
    public static function log($message) {
        echo "<script>console.log('$message');</script>";
    }

    // function that sets loggedIn to true
    public static function login() {
        $_SESSION['loggedIn'] = true;
    }

    public static function logout() {
        $_SESSION['loggedIn'] = false;
    }
}
