<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."\controllers\GrupAdd.php"); 
?>
<!-- Главный контент -->

    <!-- Левое меню для поиска и добавления товара -->
    
	<div id='content_menu'>
        <form name="menu" action="" method="post" onclick="ExitGrup()">   
            <input type='text' name='search_product' placeholder='Поиск товара' onfocus="ExitGrup()"/> 
            <input type='button' src='images/find.png' name='search_img' onclick="SearchProduct()"/>   
            <hr width="250px"/>  
            <span>Категория:</span>
            <select size="1" name="category" onchange="SearchProvider()">
				<option>Категория</option>
                
                <!-- В select ввыводим список "категория" -->
                
				<?php $res=AllSelect('category');
                    foreach($res as $item){?>
                        <option><?=$item['category_name']?></option>
                        <? } ?>	
			 </select>
             
             <span>Наименование:</span>
             <select size="1" name="provider">
				<option>Поставщик</option>
                
                <!-- В select ввыводим список "поставщик" -->
                
    			<?php $res=AllSelect('provider');
                        foreach($res as $item){?>
                            <option><?=$item['provider_name']?></option>
                            <? } ?>
			 </select>  
             <input type='button' name='select_product' value='Найти' onclick="SelectProduct()"/> 
             <hr width="250px"/>
             
             <!-- Есл пользователь выполнил вход, то показывае кнопки "Добавить товар" и "Общая информация" -->
             
             <?php if(!empty($_SESSION['id'])){
				echo "<input type='button' name='submit_add' value='Добавить товар' onclick='Createproduct()'/>
                <input type='button' name='gen_info' value='Общая информация' onclick='GeneralInfo()'/> ";
				}
                ?>
                    
        </form>
	</div>
    
    <!-- Контент для вывода товара -->
    
    <div id='content_info'>
        <table cellpadding="4" cellspacing="1" border="1">
            <tr>
                <th width="5%">id</th>
                <th width="35%">Наимение</th>
                <th width="12%">Цена закупочная</th>
                <th width="12%">Цена продажи</th>
                <th width="12%">Количество</th>
                <th width="12%">Сумма закупочная</th>
                <th width="12%">Сумма продажи</th>
            </tr>
        </table>

	</div>

