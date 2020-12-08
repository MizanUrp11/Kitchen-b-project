<?php
session_start();
include "header.php";
include "database.php";
$connection = new Connection;


if (isset($_POST['confirm_order'])) {
    $userId = $_SESSION['logged_id'];
    $name            = $_POST['name'];
    $inputAddress    = $_POST['inputAddress'];
    $inputCity       = $_POST['inputCity'];
    $delivery_method = $_POST['delivery_method'];
    $inputPhone      = $_POST['inputPhone'];
    $items           = $_POST['items'];

    $array = array(
        'user_id' => $userId,
        'name' => $name,
        'inputAddress' => $inputAddress,
        'inputCity' => $inputCity,
        'deliveryMethod' => $delivery_method,
        'inputPhone' => $inputPhone,
        'items' => $items
    );
    $connection->update("INSERT INTO orders(user_id,name,inputAddress,inputCity,deliveryMethod,inputPhone,items) VALUES(:user_id,:name,:inputAddress,:inputCity,:deliveryMethod,:inputPhone,:items)", $array);
    echo "Your order is confirmed";

    $subject = 'Order from '.$name;
    // $msg .= 'Name: '.$name;
    // $msg .= '__Address:'.$inputAddress;
    // $msg .= '__City:'.$inputCity;
    // $msg .= '__Delivery Method:'.$delivery_method;
    // $msg .= '__Phone:'.$inputPhone;
    // $msg .= '__Items:'.$items;



    $msg = "
    <html>
<head>
<title>HTML email</title>
</head>
<body>


<h1>Sales Order</h1>
<h2>Name: $name</h2>
<p>Address: $inputAddress</p>
<p>Delivery Method: $delivery_method</p>
<p>Phone: $inputPhone</p>
<p>Items: $items</p>

</body>
</html>
";

  $headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= 'From: <kitchenb52@gmail.com>' . "\r\n";



// send email
mail("mrn1105009@gmail.com", $subject, $msg,$headers);

}


$data_added_to_cart = $_SESSION['cart_elements'];

?>
    <div class="container checkout">
        <h2 class="display-3 my-5 py-4 text-center">Checkout</h2>
        <div class="row">
            <div class="col-md-6">
                <h4>Shipping Address</h4>
                <form>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="Enter Address e.g., House#12, Road#30/A, Dhanmondi, Dhaka" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputCity" name="inputCity" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="delivery_method">Delivery Method <span class="text-danger">*</span></label>
                    <select required id="delivery_method" name="deliveryMethod" class="form-control">
                        <option selected value="" disabled>Choose...</option>
                        <option value="Cash on Delivery">Cash on Delivery</option>
                        <option value="Local Pickup">Local Pickup</option>
                        <option value="Currier Delivery">Currier Delivery</option>
                    </select>
                </div>

            </div>
            <div class="form-group">
                    <label for="inputPhone">Phone <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputPhone" name="inputPhone" placeholder="Enter Phone Number e.g., +88 01711 111 111" required>
                </div>
            <button type="button" class="btn btn-success" id="confirm_order">Confirm Order</button>
        </form>
            </div>
            <div class="col-md-6" id="ordered_products">
                <h4>Ordered Products</h4>


                <textarea disabled style="width:100%" name="" id="ordered_products" cols="" rows="10">
    <?php

foreach ($data_added_to_cart as $id) {
    // Pull data from database and show the list
    $result = $connection->getAll("SELECT * FROM products WHERE id=$id", null);

    foreach ($result as $res) {
        $product_name = $res['product_name'];
        $price        = $res['price'];
        ?> 
        --<?php echo $product_name . ' - Price: ' . $price.' |' ?>
        <?php
}
}

?>
</textarea>
            </div>
        </div>


    </div>

    <div class="py-5 my-5 container" id="order_confirm_message" style="display: none;">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Your order is confirmed</h4>
            </div>
        </div>
    </div>


<?php include "footer.php";
