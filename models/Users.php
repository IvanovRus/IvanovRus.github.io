<?php
include_once("db.php");
class Users{
    
    //Запись пользователей в БД
    
    public function Create($login, $mdPassword, $email){
        $rdate = date("d-m-Y в H:i");
        $query = "INSERT INTO user (login, password, email, reg_date)
        VALUES ('$login', '$mdPassword', '$email', '$rdate')";
        return mysql_query($query) or die(mysql_error());
    }
    
    //Поиск пользователей в БД одному параметру
    
    public function Select($key, $name){
        $query = ("SELECT * FROM user WHERE $key='$name'");
        $sql= mysql_query($query) or die(mysql_error());
        return $sql;     
    }
    
    //Обновление пользователей в БД
    
    public function Update($login, $mdPassword, $email){
        $rdate = date("d-m-Y в H:i");
        $query = "UPDATE user SET login='$login', password='$mdPassword', email='$email', reg_date='$rdate' WHERE  login='$login'";
        return mysql_query($query) or die(mysql_error());
    }
    
    //Удаление пользователей из БД
    
    public function Delete($key, $name){
        $query = "DELETE FROM user WHERE $key='$name'";
        return mysql_query($query) or die(mysql_error());
    }
    
    //Поиск пользователей в БД по логину и id
    
     public function Login($login, $password){
        $query = ("SELECT * FROM user WHERE login='$login' AND password='$password' ");
        $sql= mysql_query($query) or die(mysql_error());
        //$res=mysql_fetch_array($sql);
       // print_r($res);
        return $sql; 
        
        
    }
}
?>