 <?php
include($_SERVER['DOCUMENT_ROOT']."/controllers/GeneralInfo.php");
    $c=new GeneralInfo();
    $v=$c->getInfo();
?>  
  <!-- Общая информация о сумме товаров --> 
    <div class='overlay'></div>   
    <div class='popup3'>
    <div class='closeform' onclick="exit()"></div>
        <div id="summa_info">
         <div id="summa_z">Товар закуплен на: <?=number_format($c::$summaz, 2, ',', ' ');?> руб.</div>
        <div id="summa_z">Товар продан на: <?=number_format($c::$summap, 2, ',', ' ');?> руб.</div>
        </div>
    </div>
</div>