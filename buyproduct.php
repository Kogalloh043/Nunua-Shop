<!DOCTYPE html>
<html>
<head>
	<title>Nunua | View Products</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">
		<?php include('nav.php');
        require('checkloginstatus.php');

        $productId=$_GET['id'];
		//echo "$productId";

		require_once('dbConnect.php');
		$sql = "SELECT*FROM products WHERE id=".$productId;
		$results= mysqli_query($conn,$sql);
		if ($results) {
			# code...
			$products= mysqli_fetch_assoc($results);
		} else {
			# code...
			echo "Something went wrong";
		}
        ?>
        <div class="row">
        	
        	<div class="col-3">
        		<img src="Nunua.png" width="300px">
        		<!-- image icon -->
        		
        	</div>
        	<div class="col">
        		<form method="POST" action="" >
 <div class="mb-3">
	<label for="exampleInputEmail" class="form-label">Product Name</label>
	<input type="text" class="form-control" id="exampleInputEmail" name="product_name" value="<?php echo $products['name']; ?>" required aria-describedby="emailHelp">
</div>

<div class="mb-3">
	<label for="examplePassword" class="form-label">Product Description</label>
	<input type="text" class="form-control"name="product_desc" value="<?php echo $products['description']; ?>" required >
	<input type="hidden" name="productId" value="<?php echo $products['id']; ?>">
<div class="mb-3">
	<label for="examplePassword" class="form-label">Product Cost</label>
	<input type="number" class="form-control"name="product_cost" value="<?php echo $products['cost']; ?>" required>
</div>
<div class="mb-3">
	<label for="examplePassword" class="form-label">Product Quantity</label>
	<input type="number" class="form-control"name="product_quantity" value="1" required>
</div>


 <button type="submit" name="buy" class="btn btn-primary">Complete Purchase</button>
	</form>
	  <?php
	 if (isset($_POST['buy'])) {
	 	$productName=$_POST['product_name'];
	 	$productCost=$_POST['product_cost'];
	 	$productQuantity=$_POST['product_quantity'];
	 	$productId=$_POST['productId'];
	 	$customerName=$_SESSION['name'];
	 	$customerId=$_SESSION['id'];


	 

	 	$sql ="INSERT INTO `sales`(`product_name`, `product_id`, `quantity`, `cost`, `customer_name`, `customer_id`) VALUES (?,?,?,?,?,?)";

	 	if ($stmt = mysqli_prepare($conn,$sql)) {

         mysqli_stmt_bind_param($stmt,"siidsi",$param_product_name,$param_product_id,$param_quantity,$param_cost,$param_customer_name,$param_customer_id);
         //bind
         $param_product_name=$productName;
         $param_product_id =$productId;
         $param_quantity =$productQuantity;
         $param_cost =$productCost;
         $param_customer_name =$customerName;
         $param_customer_id =$customerId;

         //execute the query
         if (mysqli_stmt_execute($stmt)) {
         	# code...
         	echo "Purchase made successfully.";
         	header('location:mypurchases.php');
         }else{
         	echo "Something went wrong";
         }
	 	} 
	   } 


	  ?>
		   	
		   </div>
        		
        	</div>

        </div>



</div>
</body>
</html>        