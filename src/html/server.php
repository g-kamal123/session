<?php
session_start();
if(!isset($_SESSION['cart']))
$_SESSION['cart']= array();
include 'config.php';
if(isset($_POST['info'])){
    $a= $_POST['info'];
    // echo $a;

    foreach($products as $val){
        if($a==$val['name']){
            $name = $val['name'];
            $price = $val['price'];
            $img = $val['img'];
        }
    }
        if($_SESSION['cart'][$a]['name']==$a){
            $_SESSION['cart'][$a]['quantity'] += 1;
        }
        else{
            $_SESSION['cart'][$a] = array(
                'name' => $name,
                'price' => $price,
                'image' => $img,
                'quantity'=> 1
            );
        }
    // print_r($_SESSION['cart']);
    print_session();

}
function print_session(){
    $text = "";
    foreach($_SESSION['cart'] as $value){
            $text .= "<tr>";
            $text .= "<td style='text-align:center;'>".$value['name']."</td>";
            $text .= "<td style='text-align:center;'>".$value['price']."</td>";
            $text .= "<td style='text-align:center;'><img src =".$value['image']." width='30px' height='30px'></td>";
            $text .= "<td style='text-align:center;'>".$value['quantity']."</td>";
            $text .= "<td style='text-align:center;'><button class='btn'>delete</button></td>";
            $text .=  "</tr>";
    }
    echo $text;
}
if(isset($_POST['delete'])){
    $name = $_POST['product_name'];
    unset($_SESSION['cart'][$name]);
    print_session();
}
    
?>