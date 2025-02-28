<?php

// allPages returns all pages except one currently in
function allPages($pages, $currentPage) {
    // return all except current page
    foreach ($pages as $page) {
        if ($page != $currentPage) {
            echo "<a href='?page=$page'>$page</a>";
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