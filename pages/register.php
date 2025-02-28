<?php

Debug::log("Register page loaded!");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    Debug::log($sql);
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        $_SESSION['loggedIn'] = true;
        redirect('home', []);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    Debug::log("Registration successful!");
    echo "Registration successful!";
}
?>

<form action="?page=register" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Register">
</form>