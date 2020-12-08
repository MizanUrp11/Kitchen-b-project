<?php
session_start();
ob_start();

include "database.php";
$connection = new Connection;

if (isset($_POST['register'])) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = md5($_POST['password']);

    $array = array(
        ':name'     => $name,
        ':email'    => $email,
        ':password' => $password,
        ':role'     => 'visitor',
    );

    $result = $connection->getAll("SELECT * FROM users WHERE email = '$email' AND password = '$password'", $array);


    if (count($result)) {
        die("Email already taken.");

    } else {
        $connection->update("INSERT INTO users(name,email,password,role) VALUES(:name,:email,:password,:role)", $array);

        $result = $connection->getAll("SELECT * FROM users WHERE email = '$email' AND password = '$password'", $array);

        foreach ($result as $res) {
            $userid = $res['id'];
            $_SESSION['logged_id'] = $result['id'];
        }
        
        header("Location: index.php");
    }

}

if (isset($_POST['login'])) {
    $email    = $_POST['email'];
    $password = md5($_POST['password']);
    $array    = array(
        ':email'    => $email,
        ':password' => $password,
    );
    $result = $connection->getAll("SELECT * FROM users WHERE email = '$email' AND password = '$password'", $array);

    if (count($result)) {
        foreach($result as $res){
            $userid = $res['id'];
            $userid_name = $res['name'];
            $_SESSION['logged_id'] = $userid;
            $_SESSION['logged_id_name'] = $userid_name;
        }

        header("Location: index.php");

    }

}
