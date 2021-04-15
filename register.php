<!DOCTYPE html>
<html>
<head>
	<title>Nunua | Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	
</head>
<body>
   <div class="container">
    
   	<div class="row">
      <div style="background-color: #FFC300;">
   		<!-- <div class="alert alert-primary"> -->
   			<CENTER>
   				<h2>Welcome to Nunua Online Shop</h2>
   			<p>Register</p>
   		</CENTER>
   		</div>

   		<div class="col-4">
   		 <img src="Nunua.png" class="img-fluid">	
   		</div>
   		<div class="col-6">
           <!--  form -->
            <form method="POST" action="" >
              <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Full Name</label>
                 <input type="text" class="form-control" id="" name="full_name" required >
                  </div>


               <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Email</label>
                 <input type="email" class="form-control" id="" name="email" required>
                  </div>

                   <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Phone Number</label>
                 <input type="phone" class="form-control" id="" name="phone" required >
                  </div>



                  <div class="mb-3">
                 <label for="examplePassword" class="form-label">Password</label>
                    <input type="password" class="form-control"name="password" required >
                 </div>

                 <button type="submit" name="register" class="btn btn-primary">Register</button>
               </form>
               Already registered?
               <a style="text-decoration: none;" href="login.php">Login Now</a>

               <?php

               if (isset($_POST['register'])) {
                 # code...
                $fullname = $_POST['full_name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $password = $_POST['password'];

                  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                //connecton
                require('dbConnect.php');
                $sql = "INSERT INTO customer(name,phone,email,password) VALUES(?,?,?,?)";

                if ($stmt = mysqli_prepare($conn,$sql)) {
                  # code...
                  mysqli_stmt_bind_param($stmt,"ssss",$param_name,$param_phone,$param_email,$param_password);

                  $param_name = $fullname;
                  $param_phone = $phone;
                  $param_email = $email;
                  $param_password = $hashedPassword;

                  if (mysqli_stmt_execute($stmt)) {
                    # code...
                    echo "Registered successfully.";
                    header('location:login.php');
                  }else{
                    echo "Failed to Register.Try again.";
                  }
                }else{
                  echo "Something went wrong".mysqli_error($conn);
                }

               }
               ?>

    			
   		</div>
   	</div>
   	
   </div>

</div>
</body>
</html>