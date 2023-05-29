<?php

try {
    $conn = mysqli_connect("localhost", "root", "", "szybka_szamadb");
    if (!$conn) {
        throw new Exception(mysqli_connect_error());
    }
} catch (Exception $e) {
    die("Connection failed");
}
