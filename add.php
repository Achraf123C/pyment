<?php
require 'config.php';
$msg="";
if(isset($_POST['submit'])){
    $p_name=$_POST['pName'];
    $p_price=$_POST['pPrice'];

    $target_dir="image/";
    $target_file=$target_dir.basename($_FILES['pImage']["name"]);
    move_uploaded_file($_FILES['pImage']["tmp_name"],$target_file);
         
    $sql="INSERT INTO product(product_name,product_price,product_image)VALUES('$p_name','$p_price','
    $target_file')";

    if(mysqli_query($conn,$sql)){
        $msg="Product Added to the database successfully!";
         }
         else{
            $msg="Failde to add the product!";
       
    
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Add Product Information</title>
</head>
<body class="bg-info">
    <div class="container" >
      <div class="row justify-content-center" >
        <div class="col-md-6 bg-light mt-5  rounded">
            <h2 class="text-center p-2">Add Product Information</h2>
            <form action="" method="post" class="p-2 " enctype="multipart/form-data" id="from-box">
            <div class="from-group">
                <input type="text" name="pName" class="from-control  " placeholder="product Name" required>
            </div>
            <div class="from-group">
                <input type="text" name="pPrice" class="from-control mt-2" placeholder="product Price" required>
            </div>
            <div class="from-group">
                <div class="custom-file">
                    <input type="file" name="pImage" class="costom-file-input mt-2" id="customFile" required>
                <label for="customFile" class="custom-file-label mt-2 "> Choode product image </label>
                </div>
            </div>
           <div class="from-group">
            <input style="background: #F12F2C;" id="btnt" type="submit" name="submit" class="btn btn-dqnger btn-block mt-3 " value="Add">
           </div>
           <div class="from-group">
               <h4 class="text-centre"> <?= $msg; ?></h4>
           </div>
            </form>
         </div>
        </div>
        <div class="row justify-content-center">
               <div class="col-md6 mt-3  bg-light rounded">
                <a href="index.php" class="btn btn-warning btn-block btn-lg"> Go to product page</a>
               </div>
        </div>
    </div>
</body>
</html>