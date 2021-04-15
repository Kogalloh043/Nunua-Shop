<!DOCTYPE html>
<html>
<head>
	<title>Nunua | Edit Product</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>

	<div class="container-fluid">
		<?php include('nav.php');
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

		<h3>Edit <?php echo $products['name']; ?> </h3>

		<div class="row">
		   <div class="col-4">
		   	<!-- icon to show add products -->
		   	<img src="Nunua.png" class="img-fluid">
		   </div>	
		   <div class="col-6">
		   	<!-- form -->
		   	<form method="POST" action="" >
 <div class="mb-3">
	<label for="exampleInputEmail" class="form-label">Product name</label>
	<input type="text" class="form-control" id="exampleInputEmail" name="product_name" value="<?php echo $products['name']; ?>" required aria-describedby="emailHelp">
</div>

<div class="mb-3">
	<label for="examplePassword" class="form-label">Product description</label>
	<input type="text" class="form-control"name="product_desc" value="<?php echo $products['description']; ?>" required >
	<input type="hidden" name="productId" value="<?php echo $products['id']; ?>">
<div class="mb-3">
	<label for="examplePassword" class="form-label">Product cost</label>
	<input type="number" class="form-control"name="product_cost" value="<?php echo $products['cost']; ?>" required>
</div>


 <button type="submit" name="save" class="btn btn-primary">Update</button>
	</form>
		   	
		   </div>

		   <?php
         //require("dbConnect.php");

       if (isset($_POST['save'])) {
       	# code...
       	$productName = $_POST['product_name'];
       	$productDesc = $_POST['product_desc'];
       	$productCost = $_POST['product_cost'];
       	$productId = $_POST['productId'];

       	 // echo "$productName,$productDesc";

       	//$sql = "INSERT INTO products(name,description,cost) VALUES(?,?,?)";
          $sql = "UPDATE products SET name=?,description=?,cost=? WHERE id=".$productId;
       	if ($stmt = mysqli_prepare($conn,$sql)) {
       		# code...

         mysqli_stmt_bind_param($stmt,"ssd",$param_name,$param_desc,$param_cost);
         $param_name = $productName;
         $param_desc = $productDesc;
         $param_cost = $productCost;

         if (mysqli_stmt_execute($stmt)) {
         	# code...
         	echo "<h4 style='color: green'>Saved the product Successfully</h4>";
         	//redirects -view product
         	header("location:viewproducts.php");
         }else{
         	echo "<h4 style='color: red'>Oops! Something went wrong</h4>";

         }

       	}else{
       		echo "There is an issue with your query command";
       	}

       

       }


		?>

		</div>
		
	</div>

</body>
</html>