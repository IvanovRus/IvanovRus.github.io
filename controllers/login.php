<?php
include_once("../models/Users.php");

// Вход на сайт

if(isset($_POST['login']) && isset($_POST['password'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
        if ($login == '') {
            unset($login);
            exit ("Введите пожалуйста логин!");
        }
        if ($password == '') {
        unset($password);
        exit ("Введите пароль");
         } 
    
    $login=filtres($login);
    $password=filtres($password);
    $mdpassword = md5($password);//шифруем пароль
    $user=new Users();
    $res=$user->Login($login, $mdpassword);
    $id_user = mysql_fetch_array($res);
        if (empty($id_user['id'])){
            exit ("Извините, введЄнный вами логин или пароль неверный.");
        }
        else {
            $_SESSION['password'] = $password; 
            $_SESSION['login'] = $login; 
            $_SESSION['id'] = $id_user['id']; 
        	echo('OK');
        }
}

// Фильтрация входных данных

function filtres($name){
     $name = trim(htmlspecialchars(stripslashes($name)));
    return $name;    
}

?>