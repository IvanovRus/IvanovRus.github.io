$(document).ready(function() {
   $('#content_info').on('click','.price_z', function(){
        alert('sss');
   });
   
}); 

//Добавление товара

function Product_add(){
    var category=$('#form_product select[name="category"] option:selected').text();
    var provider=$('#form_product select[name="provider"] option:selected').text();
    var name_product=$('#form_product input[name="name_product"]').val();
    var price_z=$('#form_product input[name="price_z"]').val();
    var price_p=$('#form_product input[name="price_p"]').val();
    var count=$('#form_product input[name="count"]').val();
    var form={category:category, provider:provider, name_product:name_product, price_z:price_z, price_p:price_p, count:count};
    	$.post('controllers/ProductAdd.php', form,  function(data) {
            if(data=="Ok"){
                alert("Ok");
				}
                else{
                alert(data);
				}
			});    
}

// Поиск товара

function SearchProduct(){
    var search=$('#content_menu input[name="search_product"]').val();
    if(search==""){
        $("#eror_grup_message").remove();
        $('#content_menu input[name="search_img"]').after('<div id="eror_grup_message">Введите название товара</div>');
        return false;
    }   
    var form={search:search};
    $.post('controllers/SearchProduct.php',form, function(data) {
            if(data==""){
                $("#eror_grup_message").remove();
                $('#content_menu input[name="search_img"]').after('<div id="eror_grup_message">Товар не найден</div>')
            }
            else{
                 if($('tr').is(".content_product")==true){
                    $('.content_product').remove();}
              $('#content_info table').append(data);
				}
			}); 
   
}

//Вывод товаро по категории и поставщика

function SelectProduct(){
    var category=$('#content_menu select[name="category"] option:selected').text();
    var provider=$('#content_menu select[name="provider"] option:selected').text();
    var form={category:category, provider:provider};
    $.post('controllers/SearchProduct.php',form, function(data) {
        if(data==""){
            $("#eror_grup_message").remove();
            $('#content_menu select[name="provider"]').after('<div id="eror_grup_message">Товар не найден</div>')
        }
              if($('tr').is(".content_product")==true){
                    $('.content_product').remove();}
              $('#content_info table').append(data);
		//		}
			});  
}

// Вывод формы для Добавления категории

function AddCategory(){
    if($("#eror_grup").html()){
            ExitGrup();
        }  
    $(".add_category").after('<div id="eror_grup"></div>');
    $("#eror_grup").append('<div class="closeform" onclick="ExitGrup()"></div><form name="grup_add" action="" method="post"><input type="text" name="grup_add" placeholder="Категория"/> <input type="button" name="add" class="add_category" value="Ok" onclick="AddGrup()"/></form>');
    $("#eror_grup").append('<div id="eror_grup_message"></div>');
}

// Вывод формы для Добавления поставщика

function AddProvider(){
    if($("#eror_grup").html()){
            ExitGrup();
        }
        $.post('views/Select.php', function(data) {
        $(".add_provider").after('<div id="eror_grup"></div>');
        $("#eror_grup").append(data);
        })
}

// Добавить категорию и поставщика

function AddGrup(){
    if($('#eror_grup form input').is('[name="grup_add"]')==true){
        var category=$('#eror_grup input[name="grup_add"]').val();
        if(category==""){
            $('#eror_grup_message').html("Введите категорию!");
            return false;
        }
        var form={category:category};
       }
    else{
        var category=$('#eror_grup select[name="category"] option:selected').text();
        var provider=$('#eror_grup input[name="provider_add"]').val();
        if(category=="Категория"){
            $('#eror_grup_message').html("Выберите категорию");
            return false;
        }
        if(provider==""){
            $('#eror_grup_message').html("Введите наименование поставщик!");
            return false;
        }
                 
        var form={provider:provider, category1:category};
        
    }
    $.post('controllers/GrupAdd.php', form,  function(data) {
        if(data=='OK'){
            $('#eror_grup_message').html("Добавлено");
            //location.reload();
            setTimeout(function() {exit();}, 500);
            Createproduct();
				}
            else{
				//alert(data);
                $('#eror_grup_message').html(data);
				}
			});    
}

// Поиск поставщика

function SearchProvider(){
    var category=$('#content_menu select[name="category"] option:selected').text();
    var form={category2:category};
    $.post('controllers/SearchProduct.php', form,  function(data) {
        //alert(data);
            var category=$('#content_menu select[name="provider"]').html(data);
			});
}

// Вывод формы для редоктирования информации для товара

function EditInfo(i){
    ExitEdit();
    var name_td=$(i).attr('class');
    var id_td=$(i).attr('id');
    if(name_td=="name_product"){
       var val=$(i).parents('td').text(); 
       $(i).parents('td').append('<div id="edit_info"><input class="228" type="text" value="'+val+'" size="20"></input><input type="button" value="Ok" onclick="EditInfoProduct(this)"></input><div id="exit_edit" onclick="ExitEdit()"></div><div id="eror_grup_message"></div></div>');
        return false;
    }
    if(id_td=="count"){
        var val=parseInt($(i).parent('td').text()); 
       $(i).parents('td').append('<div id="edit_info"><input class="228" type="number" value="'+val+'" size="1"></input><input type="button" value="Ok" onclick="ProductCountAdd(this)"></input><div id="exit_edit" onclick="ExitEdit()"></div> <div id="eror_grup_message"></div></div>');
        return false;
        }
    else{
       var val=parseFloat($(i).parent('td').text()); 
       $(i).parents('td').append('<div id="edit_info"><input class="228" type="number" value="'+val+'" size="1"></input><input type="button" value="Ok" onclick="EditInfoProduct(this)"></input><div id="exit_edit" onclick="ExitEdit()"></div><div id="eror_grup_message"></div></div>');
    } 
    
}

// Редактирование информации о товаре

function EditInfoProduct(i){
    var val=$(i).parent('div').find('input[class="228"]').val();
    var val_pricez=$(i).parents('tr').find('.price_z').parent('td').find('i').text();
    var val_pricep=$(i).parents('tr').find('.price_p').parent('td').find('i').text();
    var val_count=$(i).parents('tr').find('.count').parent('td').find('i').text();
    var name_td=$(i).parents('td').find('div').attr('class'); 
    var product_id=$(i).parents('tr').find(':first-child').text(); 
    var form={val:val, name_td:name_td, product_id:product_id}; 
    $.post('controllers/EditProduct.php', form,  function(data) {
            if(data=='OK'){ 
                if(name_td=="count"){                        
                   var val_sumz=$(i).parents('tr').find('.sum_z i').html(((val_pricez)*(val)).toFixed(2));
                   var val_sumz=$(i).parents('tr').find('.sum_p i').html(((val_pricep)*(val)).toFixed(2));
                    
               }
                if(name_td=="price_z"){                         
                   var val_sumz=$(i).parents('tr').find('.sum_z i').html(((val_count)*(val)).toFixed(2));                   
                } 
                if(name_td=="price_p"){
                    var val_sumz=$(i).parents('tr').find('.sum_p i').html(((val_count)*(val)).toFixed(2));
                }
                $(i).parents('td').find('i').html(val);              
                ExitEdit();             
				}
            else{
                $('#eror_grup_message').html(data);
				}
			}); 
}

// Добавление колличества товара

function ProductCountAdd(i){
    var val_in=$(i).parent('div').find('input[class="228"]').val();
    var val_td=$(i).parents('td').find('i').text(); 
    var val_pricez=$(i).parents('tr').find('.price_z').parent('td').find('i').text();
    var val_pricep=$(i).parents('tr').find('.price_p').parent('td').find('i').text();
    var name_td=$(i).parents('td').find('div').attr('class');
    var product_id=$(i).parents('tr').find(':first-child').text(); 
    var val=parseInt(val_in)+parseInt(val_td);
    var form={val:val, name_td:name_td, product_id:product_id}; 
    $.post('controllers/EditProduct.php', form,  function(data) {
            if(data=='OK'){
                var val_sumz=$(i).parents('tr').find('.sum_z i').html((val_pricez)*(val));
                var val_sumz=$(i).parents('tr').find('.sum_p i').html((val_pricep)*(val));
                $(i).parents('td').find('i').html(val);
                ExitEdit();             
				}
            else{
                $('#eror_grup_message').html(data);
				}
			}); 
}

// Закрытие окошек об ошибок

function ExitGrup(){
     $("#eror_grup").remove();
     $("#eror_grup_message").remove();
}

// Закрытие формы для редактирования товара

function ExitEdit(){
     $("#edit_info").remove();
}