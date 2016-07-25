<?php
include($_SERVER['DOCUMENT_ROOT']."\controllers\GrupAdd.php"); 
?>

<!-- Форма для добавления товара -->

    <div class='overlay'></div>
    
    <div class='popup3'>
    <div class='closeform' onclick="exit()"></div>
    <div id="title_product">
        <span>Категория:</span>
        <span>Поставщик:</span>
        <span>Наименование:</span>
        <span>Цена закупочная:</span>
        <span>Цена продажи:</span>
        <span>Количество:</span>
    </div>
    <div id="form_product">
        <form name="product_add" action="" method="post">  
            <select size="" name="category" >
				<option>Категория</option>
                
                 <!-- В select  ввыводим список "категория" -->
                
                <?php $res=AllSelect('category');
                    foreach($res as $item){?>
                        <option><?=$item['category_name']?></option>
                        <? } ?>
			 </select>
             <input type='button' name='add' class="add_category" value='+' onclick="AddCategory()"/> 
             <select size="1" name="provider">
				<option value="0">Поставщик</option>
                
                <!-- В select ввыводим список "поставщик" -->
                
                <?php $res=AllSelect('provider');
                    foreach($res as $item){?>
                        <option><?=$item['provider_name']?></option>
                        <? } ?>
			 </select> 
             <input type='button' name='add' class="add_provider" value='+' onclick="AddProvider()"/> 
             <input type="text" name="name_product" placeholder='Наименование'/>
             <input type="text" name="price_z" size="10" placeholder='Цена закупочная'/>  
             <input type="text" name="price_p" size="10" placeholder='Цена продажи'/>
             <input type="text" name="count" size="10" placeholder='Количество'/> 
             <input type='button' name='submit_add' value='Отправить' onclick="Product_add()"/>         
        </form>
    </div>
    </div>
</div>