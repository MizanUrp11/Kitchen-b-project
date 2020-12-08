<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Login|Register</title>
  </head>
  <body>
   <div class="container">
       <div class="row">
           <div class="col-md-6 d-flex align-items-center">
               <div class="mb-md-5 mb-3 mt-5 text-center">
                <a href="index.php"><img  class="" src="images/Logo-Long.jpg" alt="" style="width: 50%"></a>
            </div>
           </div>
           <div class="col-md-6 py-md-4">
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#login" role="tab" aria-controls="home" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#register" role="tab" aria-controls="profile" aria-selected="false">Register</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="home-tab">
                        <h2 class="my-3">Login</h2>
                        <form action="login.php" method="POST">

                            <div class="form-group">
                                <label for="email">Enter Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Enter Password<span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                            </div>

                            <input type="submit" class="btn btn-info mt-3 bg-info" name="login" value="Login">
                        </form>
                    </div>


                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="profile-tab">
                        <h2 class="my-3">Register</h2>
                        <form action="login.php" method="POST">

                            <div class="form-group">
                                <label for="name">Enter Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="email">Enter Email<span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Enter Password<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info mt-3 bg-success" value="Register" name="register">
                        </form>
                    </div>
                </div>
           </div>
       </div>
   </div>


<?php include "footer.php";
