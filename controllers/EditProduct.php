<?php
    include($_SERVER['DOCUMENT_ROOT']."/models/Product.php");
    
 // Редактирование информации о продукте   
 
     if(isset($_POST)){
        $val=filtres($_POST['val']);
        $name_td=$_POST['name_td'];
        $product_id=filtres($_POST['product_id']);
        if($val==""){
            echo "Введите значение";
            return false;
        }
        $product=new Product();
        $res=$product->UpdateProduct($val,$name_td,$product_id);
        echo "OK";
     }
     
function filtres($name){
     $name = trim(htmlspecialchars(stripslashes($name)));
    return $name;    
}
?>