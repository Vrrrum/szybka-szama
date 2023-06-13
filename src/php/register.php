<?php
session_start();
require 'conn.php';

function validate_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validate_password($password)
{
    $uppercase = preg_match("/[A-Z]/", $password);
    $lowercase = preg_match("/[a-z]/", $password);
    $number = preg_match("/[0-9]/", $password);
    $specialChars = preg_match("/[^A-Za-z0-9]/", $password);

    return $uppercase 