<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$mysqli = mysqli_connect("localhost", "j92628oy_0207", "DDData654321", "j92628oy_0207");

if ($mysqli == false) {
    print("error");
} else {
    $inputValue = $_POST['value'];
    $item=$_POST['item'];
    $id = $_SESSION['id']; //ключик id, мы вытащили из сессии идентификатор id
    $mysqli->query("UPDATE `users` SET `$item` = '$inputValue' WHERE `id` = '$id'");
    $_SESSION[$item]=$inputValue;
}
