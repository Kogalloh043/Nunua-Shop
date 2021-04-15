<!DOCTYPE html>
<html>
<head>
	<title>Nunua | Viewproducts</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
   
	<div class="container-fluid">
		<?php include('nav.php');

           if (!isset($_SESSION['name'])) {
            header('location:login.php');
        }
		?>
    <h1>My products</h1>
        <div class="col-8">
            <table class="table">
             <tr>
                 <th>Name</th>
                 <th>Description</th>
                 <th>Cost</th>
             </tr>
                
        
            

    <?php 

    require_once('dbConnect.php');

    $sql = "SELECT * FROM products";

     $results = mysqli_query($conn,$sql);
     if ($results) {
     	# code...
     	$rows = mysqli_num_rows($results);
     	if ($rows>0) {
     		# code...

         while ($record = mysqli_fetch_assoc($results)) {
         	# code...
         	// echo $record['name'].'Price Ksh'.$record['cost'];
         	// echo "<br>";
            echo "<tr>";
            echo "<td>".$record['name']."</td>";
            echo "<td>".$record['description']."</td>";
            echo "<td>".$record['cost']."</td>";
            $productId = $record['id'];
            echo "<td>";
            echo "<a href='editProduct.php?id=".$productId."'class='btn btn-primary'>Edit Product</a>
            <form method='POST' action='' style='margin-top:5px'>
            <input type='hidden' name='productId' value='".$productId."' />
            <button type='submit' name='delete' class='btn btn-danger'>Delete Item</button>
            </form>";

            echo "</td>";
            echo "</tr>";
         }
     	}else{
     		echo '<div class="alert alert-info" role="alert">
     		No products available.
     		</div>';
     	}
     }else{
     	echo "Something went wrong ".mysqli_error($conn);
     }

     ?>
     <?php
     if (isset($_POST['delete'])){
        $productId = $_POST['productId'];
        $sql ="DELETE FROM products WHERE id=".$productId;
        $results = mysqli_query($conn,$sql);
        if ($results){
        echo "<div class='alert alert-info' role='alert'>
        Product Delete Successfully.
        </div>";
     }else{
        echo "Failed to delete the product. Try again";
    }
     }
     ?>
        </table>
      </div>
	
	</div>

</body>
</html>