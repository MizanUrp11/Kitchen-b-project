<?php
include "database.php";
$connection = new Connection;

if (isset($_POST['save'])) {
    $product_name       = $_POST['product_name'];
    $price              = $_POST['price'];
    $productDescription = $_POST['productDescription'];
    $image              = $_FILES['productImage']['name'];

    $tmp_name = $_FILES['productImage']['tmp_name'];

    move_uploaded_file($tmp_name, "images/$image");
    $array = array(
        ':product_name'       => $product_name,
        ':price'              => $price,
        ':productDescription' => $productDescription,
        ':productImage'       => $image,

    );
    $connection->update("INSERT INTO products(product_name,price,productDescription,productImage) VALUES(:product_name,:price,:productDescription,:productImage)", $array);
    header("Location: index.php");
}

if(isset($_GET['delete'])){
    $the_id = $_GET['delete'];
    $result = $connection->getAll("SELECT * FROM products WHERE id='$the_id'",null);
    foreach($result as $res){
        $image = 'images/'.$res['productImage'];
        unlink($image);
    }
    $connection->update("DELETE FROM products WHERE id='$the_id'",null);
    header("Location: product-input.php");
}
