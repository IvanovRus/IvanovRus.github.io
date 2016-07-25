<?php
    include($_SERVER['DOCUMENT_ROOT']."/models/Product.php");
  // Поиск товаров  
 if(isset($_POST['category']) && isset($_POST['provider'])){  
    if (($_POST['category']!="Категория")&&($_POST['provider']!="Поставщик")){
        $category=$_POST['category'];
        $provider=$_POST['provider'];
        $cat_id=SelectCategory($category);
        $prov_id=SelectProvider($provider);
        $product=new Product();
        $res=$product->SelectProductTwo($prov_id, $cat_id );
        SelectContent($res);
        return false;
    }
    if (($_POST['category']=="Категория")&&($_POST['provider']=="Поставщик")){
        $product=new Product();
        $res=$product->AllSelectProduct();
        SelectContent($res);
        return false;
    }
    if ($_POST['category']!="Категория"){
        $category=$_POST['category'];
        $cat_id=SelectCategory($category);
        $product=new Product();
        $res=$product->SelectProduct('category_id', $cat_id );
        SelectContent($res);
        return false;
        }
    if ($_POST['provider']!="Поставщик"){
        $provider=$_POST['provider'];
        $prov_id=SelectProvider($provider);
        $product=new Product();
        $res=$product->SelectProduct('provider_id', $prov_id );
        SelectContent($res);
        return false;
        }
}        
     if(isset($_POST['search'])){
        $search=$_POST['search'];
        $search=filtres($search);
        $product=new Product();
        $res=$product->SearchProduct($search);
        SelectContent($res);
        return false;
        }
    
   
  if(isset($_POST['category2'])){
        $category2=$_POST['category2'];
        $product=new Product();
        echo  ("<option>Поставщик</option>");
        if($category2=='Категория'){
            $res=$product->AllSelectProvider();           
            while($row=mysql_fetch_assoc($res)){
               echo   ("<option>".$row['provider_name']."</option>");
        }
  }
        
        
        $cat_id=SelectCategory($category2);
        $prov=$product->SelectProviderName($cat_id);
        
        while($row=mysql_fetch_assoc($prov)){   
                 echo   ("<option>".$row['provider_name']."</option>");
            }   
        }
  //Вывод информации о товаре      
  function SelectContent($res){
         while($row=mysql_fetch_assoc($res)){
     
                 echo   ("<tr class='content_product'>
                <td>".$row['product_id']."</td>
                <td> <i>".$row['name_product']."</i><div class='name_product' onclick='EditInfo(this)'></div></td>
                <td><i>".$row['price_z']."</i> руб.<div class='price_z' onclick='EditInfo(this)'></div></td>
                <td><i>".$row['price_p']."</i> руб.<div class='price_p' onclick='EditInfo(this)'></div></td>
                <td><i>".$row['count']."</i> шт.<div class='count' onclick='EditInfo(this)'></div> <div id='count' onclick='EditInfo(this)'></div></td>
                <td class='sum_z'><i>".round(($row['count'])*($row['price_z']), 2)."</i> руб.</td>
                <td class='sum_p'><i>".round(($row['count'])*($row['price_p']), 2)."</i> руб.</i></td>
                </tr>");
            }
  }
   //Вывод id категории            
    function SelectCategory($category){
        $product=new Product();
        $cat=$product->SelectCategory($category);
        $cat=mysql_fetch_assoc($cat);
        $cat_id=$cat['category_id'];
        return $cat_id;
    }
    //Вывод id поставщика 
    function SelectProvider($provider){        
        $product=new Product();
        $prov=$product->SelectProvider($provider);
        $prov=mysql_fetch_assoc($prov);
        $prov_id=$prov['provider_id'];
        return $prov_id;
    }
   
    function conoutput_sort($result){
	$res_array=array();
	$count=0;
	while($row = mysql_fetch_assoc($result)){
		$res_array[$count]=$row;
		$count++;
	}
	return $res_array;
}
function filtres($name){
     $name = trim(htmlspecialchars(stripslashes($name)));
    return $name;    
}
?>