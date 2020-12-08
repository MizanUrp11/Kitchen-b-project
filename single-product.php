<?php
session_start();
include "header.php";
include "database.php";
$connection = new Connection;

$userID;
if(array_key_exists('logged_id',$_SESSION)){
    $userID = $_SESSION['logged_id'];
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id=$id";
    $result = $connection->getAll($sql,null);
    // print_r($result);
}

?>

    <div class="container padding-top-100">
        <div class="row my-5">
           <?php
           foreach ($result as $row) {
               $id       = $row['id'];
               $product_name       = $row['product_name'];
               $price              = $row['price'];
               $productDescription = $row['productDescription'];
               $productImage       = 'images/' . $row['productImage'];
               ?>
            <div class="col-md-6">
                <div class="mb-5">
                    <img src="<?php echo $productImage ?>" alt="" class="card-img-top max-height-600">
                </div>
            </div>
            
               <div class="col-md-6 pl-5">
                   <h2 class="mb-3"><?php echo $product_name ?></h2>
                   <p><?php echo $productDescription ?></p>
               
                   <form action="">
                       <div class="form-group">
                           <label for="exampleFormControlSelect1" class="font-weight-bold">Select Category</label>
                           <select class="form-control" id="exampleFormControlSelect1">
                               <option value="200" selected>200g</option>
                               <option value="500">500g</option>
                               <option value="1000">1Kg</option>
                           </select>
                       </div>
                       <div class="form-group">
                           <label for="select2" class="font-weight-bold">Select Amount</label>
                           <input class="form-control" type="number" id="select2" name="amount" value="1">
                       </div>
                       <h4 id="price">Price: <?php echo $price ?></h3>
                       <a class="btn btn-info mt-5" href="cart.php?id=<?php echo $id ?>&user=<?php echo $userID ?>">Add to Cart</a>
                   </form>
               </div>
               
               <?php
           }
           
           ?> 
    



        </div>

    </div>


<?php include "footer.php"; ?>
