<?php
// Регистрация пользователя
include_once("../models/Users.php");

if (isset($_POST)){
    if(empty($_POST['login']))  {
    echo '<br><font color="red">Введите логин!</font>';
    } 
    elseif (!preg_match("/^\w{3,}$/", $_POST['login'])) {
    echo '<br><font color="red">В поле "Логин" введены недопустимые символы! Только буквы, цифры и подчеркивание!</font>';
    }
    elseif(empty($_POST['password'])) {
    echo '<br><font color="red">Введите пароль!</font>';
    }
    elseif (!preg_match("/\A(\w){6,20}\Z/", $_POST['password'])) {
    echo '<br><font color="red">Пароль слишком короткий! Пароль должен быть не менее 6 символов! </font>';
    }
    elseif(empty($_POST['password2'])) {
    echo '<br><font color="red">Введите подтверждение пароля!</font>';
    }
    elseif($_POST['password'] != $_POST['password2']) {
    echo '<br><font color="red">Введенные пароли не совпадают!</font>';
    }
    elseif(empty($_POST['email'])) {
    echo '<br><font color="red">Введите E-mail! </font>';
    }
    elseif (!preg_match("/^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/", $_POST['email'])) {
    echo '<br><font color="red">E-mail имеет недопустимий формат! Например, name@gmail.com! </font>';
    }

else{
    $login = $_POST['login'];
    $password = $_POST['password'];
    $mdPassword = md5($password);
    $password2 = $_POST['password2'];
    $email = $_POST['email'];
      
    $user=new Users();
    $res=$user->Select('login', $login);
        if (mysql_num_rows($res) > 0) {
            echo '<font color="red">Пользователь с таким логином зарегистрирован!</font>';
        }
        else {
            $res=$user->Select('email', $email);
        
            if (mysql_num_rows($res) > 0){
                echo '<font color="red">Пользователь с таким e-mail уже зарегистрирован!</font>';
            }
            else{
                $user->Create($login,$mdPassword,$email);
                 echo 'OK';
            }
}
}
}
?>