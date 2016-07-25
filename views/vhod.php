<!-- Форма для входа на сайт -->
<div class='overlay'></div>
<div class='popup'>
<form class='form-2'>
    <div class='closeform' onclick="exit()"></div>
    <h1><span class='log-in'>Войти</span> или <span class='sign-up'>зарегистрироваться</span></h1>
    <p class='float'>
        <label for='login'><i class='icon-user'></i>Логин</label>
        <input type='text' name='login' placeholder='Логин' onfocus="cleare_error()"/>
    </p>
    <p class='float'>
        <label for='password'><i class='icon-lock'></i>Пароль</label>
        <input type='password' name='password' placeholder='Пароль' class='showpassword' onfocus="cleare_error()"/>
    </p>
	<div class='eror'></div>
    <p class='clearfix'> 
        <a href='#' class='log-twitter'>Войти через Twitter</a>    
        <input type='button' name='submit' value='Войти' onclick="Login()"/>
    </p>
</form>

</div>
