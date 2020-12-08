
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <script src="js/jquery-3.5.1.min.js"></script>

    <title>Kitchen B</title>

    <script>
        $(window).on('load', function () {
        $('#loader').remove();
    })  
    </script>
  </head>
  <body>
      
  <div class="d-flex justify-content-center align-items-center loader" id="loader">
  <div class="spinner-border" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>


<div class="container px-0 sticky-top">
    
           <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <a class="navbar-brand" href="index.php">
                   <img src="images/Logo-Long.jpg" style="width: 120px;" class="d-inline-block align-top" alt=""
                       loading="lazy">
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
               </button>
    
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <ul class="navbar-nav ml-auto">
                       <li class="nav-item active">
                           <a class="nav-link" href="blog.php">Blog <span class="sr-only">(current)</span></a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="index.php">Shop</a>
                       </li>
                       <li class="nav-item">
                           <?php 
                           if($_SESSION){
                               if(array_key_exists('logged_id',$_SESSION) && array_key_exists('logged_id_name',$_SESSION)){
                                   echo '<a class="nav-link" href="logout.php?logout=1">Logout</a>';
                                }
                           }else{
                               echo '<a class="nav-link" href="admin.php">Login</a>';

                           }
                           ?>
                           
                       </li>
                       
    
                   </ul>
               </div>
           </nav>
               <div class="cart_link text-right p-2" style="display:none;">
                   <a class="btn border border-warning" id="view_cart" href="cart.php"><i class="fas fa-cart-plus mr-1"></i> <span class="badge badge-danger" id="cart_count">0</span></a>
               </div>
</div>




