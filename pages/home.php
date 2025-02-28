<?php

if(!loggedIn()) {
    redirect('login', []);
    exit;
}

echo var_dump($_SESSION);
echo "<h2>Welcome to the home page!</h2>";
echo "<p>Click <a href='?page=logout'>here</a> to log out.</p>";