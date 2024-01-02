<?php
require 'config.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT * FROM product WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);

    $pname=$row['product_name'];
    $pprice=$row['product_price'];
    $del_charge=50;
    $total_price=$pprice+$del_charge;
    $pimage=$row['product_image'];
}
else{
    echo'NO product found!';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Complete your order</title>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">SwiqaSHOP</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../payment/add.php">ajouter article</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mb5">
            <h2 class="text-center p-2 text-primary">Fill the details to complete your order</h2>
            <h3>Product Details :</h3>
            <table class="table table-borderd" width="500px">
            <tr>
                <th>Product Name : </th>
                <td><?=$pname;?></td> 
                <td rowspan="4" class="text-center"><img src="<?= $pimage; ?>" width="200"></td>
            </tr>
            <tr>
                <th>Product Price : </th>
                <td>Rs. <?= number_format($pprice);?> DH</td> 
            </tr>
            <tr>
                <th>Delivery Charge : </th>
                <td>Rs.<?=number_format($del_charge);?>DH</td> 
            </tr>
            <tr>
                <th>Total Price : </th>
                <td>Rs.<?=number_format($total_price);?>DH</td> 
            </tr>
            </table class="p-2">
            <h4>Enter your details :</h4>
            <form action="pay.php" method="post" accept-charset="utf-8">
                <input type="hidden" name="product_name" value="<?= $pname?>">
                <input type="hidden" name="product_price" value="<?= $pprice?>">
                <div class="form-group">
                    <input type="text" name="name" class="from-control" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="from-control" placeholder="Enter your E-mail" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" class="from-control" placeholder="Enter your phone" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-danger btn-lg" 
                    value="Click to pay : Rs.<?=number_format($total_price) ?>DH">
                </div>
            </form>
        </div>
    </div>
</div>
    
</body>
</html>