<div id="header">
    <div id="word-head"><h1>Бизнес Плюс</h1></a></div>
    <div id="menu_head">
        <ul id="menu_head_list">
            <li><a href="index.php">Главная</a></li>
            <li><a href="#" class="tovar" onclick="ViewContent()">Товары</a></li>
        </ul>
    </div>
        <div id="form-header">
        
        <!-- Есл пользователь выполнил вход, то показывае ссылку на выход
        иначе показываем форму для входа и регистрации -->
        
            <?php if(!empty($_SESSION['id'])){
				echo '<div id="form">'.$_SESSION['login'].'</div>
					<div id="reg">
					   <a href="controllers/exit.php">Выход</a>
			 	   </div>';
				}
				else{ 
				echo ('<div id="form">
					<span class="vhod">Вход</span>
				</div>
				<div id="reg">
                    <span class="reg">Регистрация</span>
					
				</div>');
				}
                ?>
    </div>
</div>