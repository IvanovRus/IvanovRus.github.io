<?php
include($_SERVER['DOCUMENT_ROOT']."/models/Product.php");

// Добавление товаров

if (isset($_POST)){
    if(empty($_POST['name_product']))  {
    echo '<br><font color="red">Введите наименование продукта!</font>';
    } 
    elseif(empty($_POST['price_z'])) {
    echo '<br><font color="red">Введите Цена закупочная!</font>';
    }
    elseif (!preg_match("/^\d+$/", $_POST['price_z'])) {
    echo '<br><font color="red">Цена закупочная-введите число! </font>';
    }
    elseif(empty($_POST['price_p'])) {
    echo '<br><font color="red">Введите Цена продажи!</font>';
    }
    elseif (!preg_match("/^\d+$/", $_POST['price_p'])) {
    echo '<br><font color="red">Цена продажи-введите число! </font>';
    }
    elseif(empty($_POST['count'])) {
    echo '<br><font color="red">Введите Количество! </font>';
    }
    elseif (!preg_match("/^\d+$/", $_POST['count'])) {
    echo '<br><font color="red">Количество-введите число! </font>';
    }
    
else{
    $category = filtres($_POST['category']);
    $provider = filtres($_POST['provider']);
    $name_product = filtres($_POST['name_product']);
    $price_z = filtres($_POST['price_z']);
    $price_p = filtres($_POST['price_p']);
    $count = filtres($_POST['count']);

    
    $product=new Product();
    $res=$product->SelectProduct('name_product', $name_product);
        if (mysql_num_rows($res) > 0) {
            echo '<font color="red">Такой товар уже есть</font>';
             }
        else {
            $res1=$product->SelectCategory($category);
            $id1=mysql_fetch_assoc($res1);
            $res2=$product->SelectProvider($provider);
            $id2=mysql_fetch_assoc($res2);
            if(empty($id1)){   
                 echo '<br><font color="red">Выбирете категорию! </font>';
            }
            if(empty($id2)){   
                 echo '<br><font color="red">Выбирете поставщика! </font>';
            }
           else{
                $category_id= $id1['category_id'];
                $provider_id= $id2['provider_id'];
                $product->AllCreateProduct($category_id,$provider_id,$name_product,$price_z,$price_p,$count);
                echo('добавлено');
           }
            }
    }
    
}

function filtres($name){
     $name = trim(htmlspecialchars(stripslashes($name)));
    return $name;    
}
?>