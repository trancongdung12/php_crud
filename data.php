<?php
session_start();

$id=0;
 
   $product= array( 
        [
            'id'=>++$id,
            'code'=>$id ."ABC",
            'name'=>'Skirt',
            'image'=>'https://images-na.ssl-images-amazon.com/images/I/61lKki7XhxL._UX679_.jpg',
            'price'=>50000,
            'oldprice'=>100000,
            'category'=>'Nu'
        
        ],
        [
            'id'=>++$id,
            'code'=>$id ."ABC",
            'name'=>'Short Kaki',
            'image'=>'https://product.hstatic.net/1000251188/product/hort_khaki_nam_kk03_mau_den___640.000_7347a70bca40435992931c85c949106b_66631b1b6ced40dd878ffe3b0afb7f38_1024x1024.jpg',
            'price'=>100000,
            'oldprice'=>200000,
            'category'=>'Nam'
            
        ],
        [
            'id'=>++$id,
            'code'=>$id ."ABC",
            'name'=>'Short Jean',
            'image'=>'http://bansiquanjean.net/wp-content/uploads/2019/06/Qua%CC%82%CC%80n-Short-Jean-Nam-SJN021.jpg',
            'price'=>90000,
            'oldprice'=>250000,
            'category'=>'Nam'
            
        ],
        
        [
            'id'=>++$id,
            'code'=>$id ."ABC",
            'name'=>'Girl Jean',
            'image'=>'https://thumb.danhsachcuahang.com/image/2019/07/danh-sach-shop-ban-quan-jean-cho-nu-dep-tren-duong-quang-trung-thumb-339.jpg',
            'price'=>120000,
            'oldprice'=>200000,
            'category'=>'Nu'
            
        ],
       
   
);

function getProduct()
{
    global  $product;

    return  $_SESSION['product'] = $product;
    // isset($_SESSION['product']) ? $_SESSION['product'] : array();
}

function addProduct($name,$image,$price,$oldprice,$category){
       global $id,$product;   
            $new_product = array(
                'id'=>++$id,
                'code'=>$id ."ABC",
                'name'=>$name,
                'image'=>$image,
                'price'=>$price,
                'oldprice'=>$oldprice,
                'category'=>$category
            );
            $product = getProduct();
            $product = $new_product;
            // $_SESSION['product'] = $product;  
        
}   
?>