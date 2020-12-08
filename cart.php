<?php
session_start();
include "header.php";
include "database.php";
$connection = new Connection;

if(isset($_POST['remove_item'])){
  $id = $_POST['id'];
  $pos = array_search($id,$_SESSION['cart_elements']);
  unset($_SESSION['cart_elements'][$pos]);
}

$data_added_to_cart;
if (isset($_POST['added_to_cart'])) {
  $_SESSION['cart_elements'] = $_POST['data_added_to_cart'];
}
$data_added_to_cart = $_SESSION['cart_elements'];
?>

<div class="container">
  <h2 class="display-3 my-5 py-4 text-center">Cart</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Photo</th>
        <th scope="col">Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

    <?php
    foreach($data_added_to_cart as $id){
      // Pull data from database and show the list
      $result = $connection->getAll("SELECT * FROM products WHERE id=$id",null);
      foreach($result as $res){
        $id = $res['id'];
        $image = 'images/'.$res['productImage'];
        $product_name = $res['product_name'];
        $price = $res['price'];
        $productDescription = $res['productDescription'];
        ?>
        <tr>
          <td><img style="width: 30px;" src="<?php echo $image; ?>" alt=""></td>
          <td><?php echo $product_name?></td>
          <td><?php echo $price; ?></td>
          <td><?php echo $productDescription; ?></td>
          <td><button class="btn btn-danger btn-sm remove-item" data-id="<?php echo $id?>">Remove</button></td>
        </tr>
        
        <?php
      }
    }
    ?>
      
      
     
    </tbody>
  </table>

  <a class="btn btn-success" href="<?php
  if(array_key_exists('logged_id',$_SESSION)){
    echo 'checkout.php';
  }else{
    echo 'admin.php';
  }
  ?>">
 <?php

if (array_key_exists('logged_id',$_SESSION)) {
    echo 'Checkout';
} else {
    echo 'Please Login first to order';
}
?>
 </a>

</div>


<?php include "footer.php";
