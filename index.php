<?php
session_start();
?>
<?php
include "header.php";
include "database.php";
$connection = new Connection;
$result = $connection->getAll("SELECT * FROM products", null);


?>




    <h2 class="display-3 my-4 pt-5 text-center shop">Shop</h2>

    <div class="container shop">
    <div class="row row-cols-1 row-cols-md-2">
        <?php
            foreach ($result as $res) {
            $id = $res['id'];
            $product_name = $res['product_name'];
            $price = $res['price'];
            $productDescription = $res['productDescription'];
            $productImage = 'images/'.$res['productImage'];
            ?>
            <div class="col mb-4">
                <div class="card">
                    <img src="<?php echo $productImage?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product_name ?></h5>
                        <p class="card-text">BTD.<?php echo $price?></p>
                        <p class="card-text"><?php echo $productDescription?></p>
                        <a href="single-product.php?id=<?php echo $id?>" class="btn btn-info">Details</a>
                        <button id="btn-<?php echo $id;?>" data-id="<?php echo $id; ?>" class="btn btn-light border cart" type="button" >Add to Cart<i class="fas fa-cart-plus mx-2"></i></button>
                    </div>
                </div>
            </div>
            
            <?php
            }
        ?>
        
    </div>
</div>


<?php include "footer.php";
