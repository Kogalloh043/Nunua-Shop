<!DOCTYPE html>
<html>
<head>
	<title>Nunua | My Purchases</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">
		<?php include('nav.php');
        require('checkloginstatus.php');
     ?>
     <div class="row">
        	
        	<div class="col-3">
        		<img src="https://t4.ftcdn.net/jpg/02/31/21/45/360_F_231214519_U04NRXaSVXtlWJcloPdyoiCFxc9jZg6u.jpg" class="img-fluid">
        		<!-- image icon -->
        		
        	</div>
        	<div class="col">
        		<table class="table">
             <tr>
                 <th>Item</th>
                 <th>Quantity</th>
                 <th>Cost</th>
                 <th>Total</th>
                 <th>Date</th>
             </tr>

             <?php
             require_once('dbConnect.php');
      $customer_id =$_SESSION['id'];
    $sql = "SELECT * FROM sales WHERE customer_id=".$customer_id;

     $results = mysqli_query($conn,$sql); 
     if ($results) {
     	# code...
     	$rows = mysqli_num_rows($results);
     	if ($rows>0) {
     		# code...
     		while ($record = mysqli_fetch_assoc($results)) {
     			# code...
     			echo "<tr>";
            echo "<td>".$record['product_name']."</td>";
            echo "<td>".$record['quantity']."</td>";
            echo "<td>".$record['cost']."</td>";
            $totalCost=$record['quantity']*$record['cost'];
            echo "<td>".$totalCost."</td>";
            echo "<td>".$record['date']."</td>";

            echo "</tr>";

     		}
     		
     	}else{
     		echo "<h4 style='color:#F1951E'>You have no purchases.</h4>";
     	}
     }else{
     	echo "Something went wrong.";
     }
             ?>

         </table>
        	</div>
      </div>
</div>
</body>