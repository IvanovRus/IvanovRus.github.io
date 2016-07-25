
$(document).ready(function() {
    
	// Вывод формы для входа
    
	$('.vhod').click(function() {
	       $.post('views/vhod.php', function(data) {					
                    $("body").append(data);				
			});
	   })
       
   // Вывод формы для регистрации
   
    $('.reg').click(function() {
            exit();
	       $.post('views/reg.php', function(data) {			
                    $("body").append(data);		
			});
	   })
       
    // Вывод формы для добавления товара
       
    $('.addtovar').click(function() {
	       $.post('views/Createproduct.php', function(data) {			
                    $("#content").html(data);		
			});
	   })
 
 }) 
 
// Вывод формы для добавления товара
 
 function Createproduct(){
    
    $.post('views/Createproduct.php', function(data) {			
                    $("body").append(data);		
			});
 }
 
 // Вывод общей информации о товарах
 
 function GeneralInfo(){
    
    $.post('views/GeneralInfo.php', function(data) {			
                    $("body").append(data);	
                    	
			});
 }
 
 // Выход из форм(входа, регистрации)
     
 function exit() {
        $('.overlay').remove();
        $('.popup').remove();
        $('.popup2').remove();
        $('.popup3').remove();
 }
 
 // Подключение контента с товарами
 
 function ViewContent(){
     $.post('views/Content.php', function(data) {			
                    $("#content").html(data);		
			});
 }
   
 // Проверка логина на правильность заполнения
    
 function validatelogin(login){
    if(login.length < 1)
    { return 'Введите логин'; }
    if(/^[a-zA-Z1-9]+$/.test(login) === false)
    {return 'В логине должны быть только латинские буквы';}
    if(login.length < 4 || login.length > 20)
    { return 'В логине должен быть от 4 до 20 символов'; }
    if(parseInt(login.substr(0, 1)))
    {return 'Логине должен начинаться с буквы';}
 return true;
}

 // Проверка пароля на правильность заполнения

function validatepass(pass){
    if(pass.length < 1)
    { return 'Введите пароль'; }
    if(/^[a-zA-Z1-9]+$/.test(pass) === false)
    {return 'В пароле должны быть только латинские буквы и цифры';}
    if(pass.length < 4 || pass.length > 20)
    { return 'В пароле должен быть от 4 до 20 символов'; }    
    if(parseInt(pass.substr(0, 1)))
    {return 'Пароль должен начинаться с буквы';}
 return true;
}

 // Проверка email на правильность заполнения

function validateemail(email){
    if(email.length < 1)
    { return 'Введите email'; }
    if(/^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i.test(email) === false)
    {return 'Не корректный email';}
 return true;
}

 // Проверка паролей на совпадение

function validpas(){
    var password=$('.popup2 input[name="password1"]').val();
    var password2=$('.popup2 input[name="password2"]').val();
    if(password!=password2)
        { $('.eror').html("Пароли не совпадают");}   
    else {return true;}
}

 // Проверка логина

function validlog() {
        var loginval=$('.popup2 input[name="login"]').val();
        var login=validatelogin(loginval);
        if (login!=true){
           $('.eror').html(login);
       }
}

// Проверка пароля

function validpassword() {
        var password1=$('.popup2 input[name="password1"]').val();
        var password=validatepass(password1);
        if (password!=true){
           $('.eror').html(password);
       }
}

// Проверка email 

function validemail() {
        var emailval=$('.popup2 input[name="email"]').val();
        var email= validateemail(emailval);
        if (email!=true){
           $('.eror').html(email);
       }
}

// Регистрация пользователей

function Registration() {
    
		var login=$('.popup2 input[name="login"]').val();
        var password=$('.popup2 input[name="password1"]').val();
        var email=$('.popup2 input[name="email"]').val();
        var password2=$('.popup2 input[name="password2"]').val();
		var form = { login : login, password : password, password2 : password2, email : email}
		
			$.post('controllers/verification.php', form,  function(data) {
					
				if(data=="OK"){				    
                    $('.eror').html('Вы успешно зарегистрированы');
					setTimeout(function() {window.location.reload();}, 1000);
				}
				else{				    
					$('.eror').html(data);					
				}
			});
 }
 
// Очиска форм ошибок 
 
function cleare_error() {
        $('.eror').html("");
}

//Авторизация на сайте

function Login() {
    
		var login=$('.popup input[name="login"]').val();
        var password=$('.popup input[name="password"]').val();
		var form = { login : login, password : password}
			$.post('controllers/login.php', form,  function(data) {
					
				if(data=="OK"){	
					location.reload()
				}
				else{	
					$('.eror').html(data);					
				}
			});
 }
 