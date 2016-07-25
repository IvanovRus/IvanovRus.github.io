<?php
include($_SERVER['DOCUMENT_ROOT']."/models/Product.php");

// Добавление категории

if (isset($_POST['category'])){
    if(empty($_POST['category']))  {
    echo '<br><font color="red">Введите наименование категории!</font>';
    } 
    
else{
    $category = filtres($_POST['category']);   
    $product=new Product();
    $res=$product->SelectCategory($category);
        if (mysql_num_rows($res) > 0) {
            echo '<font color="red">Такая категория уже есть</font>';
        }
        else{
            $product->CreateCategory($category);
            echo "OK";
        }
    }
}

// Добавление поставщика

if (isset($_POST['provider'])){
    if(empty($_POST['provider']))  {
    echo '<br><font color="red">Введите наименование поставщик!</font>';
    } 
    
else{
    $provider = filtres($_POST['provider']);
    $category = filtres($_POST['category1']);   
    $product=new Product();
    
    $res=$product->SelectProvider($provider);
        if (mysql_num_rows($res) > 0) {
            echo '<font color="red">Такой поставщик уже есть</font>';
        }
        else{
            $res=$product->SelectCategory($category);
            $row = mysql_fetch_assoc($res);
            $cat_id=$row["category_id"];            
            $product->CreateProvider($cat_id, $provider);
            echo "OK";
        }
    }
}
// Фильтрация данных
function filtres($name){
    $name = trim(htmlspecialchars(stripslashes($name)));
    return $name;    
}
//Выыод всех значений "категория" или "поставщик" 
// Если $name=='category' вывод все категории
// $name=='provider' вывод всех поставщиков

function AllSelect($name){
    $res_array=array();
    $count=0;
    
    if($name=='category'){
        $product=new Product();
        $res=$product->AllSelectCategory();
       
        
    } 
    if($name=='provider'){
        $product=new Product();
        $res=$product->AllSelectProvider();
        
    }
    while($row = mysql_fetch_assoc($res)){
		$res_array[$count]=$row;
		$count++;
	}
	return $res_array;  
}
?>