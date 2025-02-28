<?php

if (isset($_POST['login'])) {
    Debug::log("Login form submitted.");
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $username;
        redirect('home', []);
        exit;
    } else {
        echo "Invalid username or password.";
    }
}

// if loggedIn is true, show the home page
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
    // redirect to ?page=home
    redirect('home', []);
    exit;
}
?>

<form method="post" action="?page=login">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" name="login" value="Login">
</form>
