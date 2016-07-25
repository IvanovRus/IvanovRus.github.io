<?php include($_SERVER['DOCUMENT_ROOT']."\controllers\GrupAdd.php"); ?>
<!-- Форма для добавление постащика -->
<div class="closeform" onclick="ExitGrup()"></div>
<form name="grup_add" action="" method="post">
    <select size="1" name="category">
        <option>Категория</option>
        <?php $res=AllSelect("category");
        foreach($res as $item){?><option><?=$item["category_name"]?></option><? } ?>	
    </select>
    <input type="text" name="provider_add" placeholder="Поставщик"/> 
    <input type="button" name="add" class="add_category" value="Ok" onclick="AddGrup()"/>
</form>
<div id="eror_grup_message"></div>