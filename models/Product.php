<?php
include_once("db.php");
class Product{
    
    //Запись в талицу поставщика, id категории и название поставщика (таблица "product_provider")
    
    public function CreateProvider($category_id, $provider){
        $query = "INSERT INTO product_provider (category_id, provider_name)
        VALUES ('$category_id', '$provider')";
        return mysql_query($query) or die(mysql_error());
    }
    
    //Вывод из таблицы поставщика всех данных по названию поставщика ($provider)
    
    public function SelectProvider($provider){
        $query = ("SELECT * FROM product_provider WHERE provider_name='$provider'");
        $sql= mysql_query($query) or die(mysql_error());
        return $sql;     
    }
    
    //Вывод из таблицы наименование поставщика по id категории ($id)
    
    public function SelectProviderName($id){
        $query = ("SELECT provider_name FROM product_provider WHERE category_id='$id'");
        $sql= mysql_query($query) or die(mysql_error());
        return $sql;     
    }
    
    //Вывод из таблицы всех поставщиков 
    
      public function AllSelectProvider(){
        $query = ("SELECT * FROM product_provider");
        $sql= mysql_query($query) or die(mysql_error());
        return $sql;     
    }
    
    //Запись в талицу product_category категории товаров ($category-наименование категории)
    
    public function CreateCategory($category){
        $query = "INSERT INTO product_category (category_name)
        VALUES ('$category')";
        return mysql_query($query) or die(mysql_error());
    }
    
    //Вывод из таблицы product_category всех данных по наименованию категории  ($category)
    
    public function SelectCategory($category){
        $query = ("SELECT * FROM product_category WHERE category_name='$category'");
        $sql= mysql_query($query) or die(mysql_error());
        return $sql;     
    }
    
    //Вывод из таблицы product_category все категории товара
    
      public function AllSelectCategory(){
        $query = ("SELECT * FROM product_category");
        $sql= mysql_query($query) or die(mysql_error());
        return $sql;     
    }
    
    ///Запись в базу данных информации о товарах
    
     public function AllCreateProduct($category_id,$provider_id,$name_product,$price_z,$price_p,$count){
        $query = ("INSERT INTO product (category_id, provider_id, name_product, price_z, price_p, count)
        VALUES ('$category_id','$provider_id','$name_product','$price_z','$price_p','$count')");
        $sql= mysql_query($query) or die(mysql_error());
        //$res=mysql_fetch_array($sql);
       // print_r($res);
        return $sql; 
        
        
    }
    
    //Вывод из таблицы product всех товаров
    
     public function AllSelectProduct(){
        $query = ("SELECT * FROM product");
        $sql= mysql_query($query) or die(mysql_error());
        return $sql;     
    }
    
    //Вывод из таблицы product товаров, где $key-наименование поля таблицы $name- его значение
    
     public function SelectProduct($key, $name){
        $query = ("SELECT * FROM product WHERE $key='$name'");
        $sql= mysql_query($query) or die(mysql_error());
        return $sql;     
    }
    
    //Вывод из таблицы product товаров, по $prov_id-ид поставщика и $cat_id- категории ид
    
     public function SelectProductTwo($prov_id, $cat_id){
        $query = ("SELECT * FROM product WHERE provider_id='$prov_id' AND category_id='$cat_id'");
        $sql= mysql_query($query) or die(mysql_error());
        return $sql;     
    }
    
     //Поиск товаров по наименованию($name-искомое значение)
    
    public function SearchProduct($name){
        $query = ("SELECT * FROM product WHERE name_product LIKE '%$name%'");
        $sql= mysql_query($query) or die(mysql_error());
        return $sql;     
    }
    
  //Обновление данных о товаре
    
    public function UpdateProduct($val, $name_td, $product_id){
        $query = ("UPDATE product SET $name_td = '$val' WHERE product_id='$product_id'");
        $sql= mysql_query($query) or die(mysql_error());
        return $sql; 
    }
    
    //Удаление товара
    
    public function Delete($key, $name){
        $query = ("DELETE * FROM product WHERE $key='$name'");
        return mysql_query($query) or die(mysql_error());
    }
        
}
?>