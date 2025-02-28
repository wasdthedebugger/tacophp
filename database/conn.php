<?php

$conn = mysqli_connect('localhost', 'root', '', 'opensource');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

