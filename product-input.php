<?php
session_start();
include "header.php";
include "add-product.php";

$result = $connection->getAll("SELECT * FROM products", null);

?>

    <div class="container">
        <h2 class="display-3 my-5 py-4 text-center">Dashboard</h2>

        <form action="add-product.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Product Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="product_name" placeholder="Product Name" required>
            </div>

            <div class="form-group">
                <label for="price">Price <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price" required>
            </div>

            <div class="form-group">
                <label for="price">Product Description <span class="text-danger">*</span></label>
                <textarea class="form-control" name="productDescription" id="productDescription" cols="30" rows="10"></textarea>
            </div>

            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" name="productImage" class="custom-file-input" id="productImage">
                    <label class="custom-file-label" for="productImage">Choose file</label>
                </div>
            </div>
            <input class="btn btn-success" type="submit" name="save" value="Save">
        </form>
    </div>



    <div class="container">
        <h2 class="display-3 my-5 py-4 text-center">Orders</h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>









    <div class="container-fluid">
        <hr>
        <h2 class="text-center">All Products</h2>
        <div class="d-flex flex-wrap justify-content-center padding-top-60">

        <?php
        
            foreach ($result as $res) {
                $id       = $res['id'];
                $product_name       = $res['product_name'];
                $price              = $res['price'];
                $productDescription = $res['productDescription'];
                $productImage       = $res['productImage'];

                ?>
                <div class="card max-width-400 mx-3 mb-5">
                    <img src="<?php echo  "images/$productImage"; ?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title font-weight-bold"><?php echo $product_name; ?></div>
                        <p class="card-text"><?php echo $productDescription; ?></p>
                        <p class="card-text"><?php echo $price; ?></p>
                        <a href="add-product.php?delete=<?php echo $id; ?>" class="btn btn-info btn-sm">Delete</a>
                        <a href="product-input.php?edit=<?php echo $id; ?>" class="btn btn-warning btn-sm">Edit</a>
                    </div>
                </div>
                
                <?php
            }

        ?>

            <?php
            if(isset($_GET['edit'])){
                $the_id = $_GET['edit'];
                $result = $connection->getAll("SELECT * FROM products WHERE id='$the_id'", null);

                foreach ($result as $res) {
                    $id       = $res['id'];
                    $product_name       = $res['product_name'];
                    $price              = $res['price'];
                    $productDescription = $res['productDescription'];
                    $image              = 'images/'.$res['productImage'];
                }

            }

            if(isset($_POST['update'])){
                $id       = $_POST['id'];
                $product_name       = $_POST['product_name'];
                $price              = $_POST['price'];
                $productDescription = $_POST['productDescription'];
                $image              = 'images/'.$_FILES['productImage']['name'];
                //unlink($image);

                $tmp_name = $_FILES['productImage']['tmp_name'];

                move_uploaded_file($tmp_name, "$image");
                $array = array(
                    ':product_name'       => $product_name,
                    ':price'              => $price,
                    ':productDescription' => $productDescription,
                    ':productImage'       => $image,

                );

                $connection->update("UPDATE products SET product_name = :product_name ,price = :price, productDescription = :productDescription, productImage = :productImage WHERE id=$id",$array);
                header("Location: product-input.php");
               

            }
            ?>
            <form action="product-input.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id?>">
            <div class="form-group">
                <label for="name">Product Name <span class="text-danger">*</span></label>
                <input value="<?php echo $product_name; ?>" type="text" class="form-control" id="name" name="product_name" placeholder="Product Name" required>
            </div>

            <div class="form-group">
                <label for="price">Price <span class="text-danger">*</span></label>
                <input value="<?php echo $price; ?>" type="number" class="form-control" id="price" name="price" placeholder="Enter Price" required>
            </div>

            <div class="form-group">
                <label for="price">Product Description <span class="text-danger">*</span></label>
                <textarea value="<?php echo $productDescription; ?>" class="form-control" name="productDescription" id="productDescription" cols="30" rows="10"></textarea>
            </div>

            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" name="productImage" class="custom-file-input" id="productImage">
                    <label class="custom-file-label" for="productImage">Choose file</label>
                </div>
            </div>
            <input class="btn btn-success" type="submit" name="update" value="Update">
        </form>

        </div>
    </div>





<?php include "footer.php";
