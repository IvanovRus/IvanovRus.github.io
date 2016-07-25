<!-- Форма для регистрации на сайте -->
<div class='overlay'></div>
<div class='popup2'>
<form class='form-2'>
    <div class='closeform' onclick="exit()"></div>
    <h1><span class='log-in'>Войти</span> </h1>
    <p class='float'>
        <label for='login'><i class='icon-user'></i>Логин</label>
        <input type='text' name='login' placeholder='Логин' onblur="validlog()" onfocus="cleare_error()">
    </p>
    <p class='float'>
        <label for='password'><i class='icon-lock'></i>Пароль</label>
        <input type='password' name='password1' placeholder='Пароль1' class='showpassword' onblur="validpassword()" onfocus="cleare_error()">
    </p>
    <p class='float'>
        <label for='password'><i class='icon-lock'></i>Повторите пароль</label>
        <input type='password' name='password2' placeholder='Пароль2' class='showpassword' onblur="validpas()" onfocus="cleare_error()">
    </p>
    <p class='float'>
        <label for='email'><i class='icon-lock'></i>Email</label>
        <input type='text' name='email' placeholder='Email' class='showpassword' onblur="validemail()" onfocus="cleare_error()">
    </p>
	<div class='eror'></div>
    <p class='clearfix'> 
        <a href='#' class='log-twitter'>Войти через Twitter</a>    
        <input type='button' name='submit' value='Зарегестрироваться' onclick="Registration()">
    </p>
</form>

</div>