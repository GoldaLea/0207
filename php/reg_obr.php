<?php
header('Content-Type: text/html; charset=utf-8');
//mysqli_connect("localhost", "j92628oy_0207", "6788Princess6Princess", "j92628oy_0207");

$mysqli = mysqli_connect("localhost", "j92628oy_0207", "DDData654321", "j92628oy_0207");
if ($mysqli == false){
    print("error");
    }else{
    print("Соединение установлено успешно");
    $name=$_POST['name'];
    $lastname=$_POST['lastname'];
    $email = trim(mb_strtolower($_POST['email']));
    $pass = trim($_POST['pass']);
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    
    $result=$mysqli->query("SELECT * FROM `users` WHERE `email` = '$email' AND `pass`='$pass'");

    //var_dump($result->num_rows);
    if ($result->num_rows!==0) {
        print("exist");
    } else {
        $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name', '$lastname', '$email', '$pass')");
        print("User is registered");
    }
}

// echo "Имя: $name<br>Фамилия: $lastname<br>Email: $email<br>Пароль: $pass";
?>