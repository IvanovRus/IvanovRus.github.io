<?php
include($_SERVER['DOCUMENT_ROOT']."/models/Product.php");
// Выисление общей суммы всех товаров(сумма закупки и сумма продажи)
    class GeneralInfo{
        public static $summaz=0;
        public static $summap=0;
        public function getInfo(){
            $product=new Product();
            $res=$product->AllSelectProduct();
            while($AllProduct=mysql_fetch_assoc($res)){
                self::$summaz+=(($AllProduct['price_z'])*($AllProduct['count'])); 
                self::$summap+=(($AllProduct['price_p'])*($AllProduct['count']));              
            }
        }
    }
?>