<!DOCTYPE html>
<html>
<head>
	<title>Nunua | Home</title>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

   
</head>
<body>
  <!--  -->
  
	<div class="container-fluid">

		<?php include('nav.php')?>
     </div>
     <div>
     	<?php include('carousel.php')?>
     </div>
    
<div class="col-8">
          <div class="row">
            
            <?php

            require_once('dbConnect.php');
            $sql = "SELECT * FROM products ORDER BY id DESC";
            $results = mysqli_query($conn,$sql);

                 $rows = mysqli_num_rows($results);
                if ($results) {
                  # code...
                  if ($rows>0) {
                    # code...
                  while ($records = mysqli_fetch_assoc($results)){
                      # code...

                        echo '<div class="card col-4" style="margin-top:5px;">
                            
                            <div class="card-body"
                            <h5 class="card title">'.$records['name'].'</h5>
                            <p class="card-text">'.$records['description'].'
                            <h4 style="color:#E63105;">'.$records['cost'].'/=</h4>
                            </p>
                            <a href="buyproduct.php?id='.$records['id'].'" class="btn btn-primary">Buy Now</a>
                            </div>
                            </div>

                        ';
                    } 



                  }else{
                    echo '<div class="alert alert-info" role="alert";>
                    No products available.
                     </div>';
                    echo "<a style='width:150px';href='addproducts.php' class='btn btn-primary'> Add Product</a>";
                  }
                }else{
                  echo "Something went wrong. Try again";
                }

            ?>
          </div>
          
        </div>

        </div>








    
      <div class="col-8">
        
      </div>
     
 
  </div>


</body>
</html>