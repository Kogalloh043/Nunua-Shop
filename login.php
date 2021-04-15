<!DOCTYPE html>
<html>
<head>
	<title>Nunua | Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	
</head>
<body>
   <div class="container">
    
   	<div class="row">
   		<!-- <div class="alert alert-primary"> -->
        <div style="background-color: #FFC300;">

   			<CENTER>
   				<h2>Welcome to Nunua Online Shop</h2>
   			<p>Login</p>
   		</CENTER>
   		</div>

   		<div class="col-4">
   		 <img src="Nunua.png" class="img-fluid">	
   		</div>
   		<div class="col-6">
           <!--  form -->
            <form method="POST" action="" >
               <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Email</label>
                 <input type="email" class="form-control" id="exampleInputEmail" name="email" required aria-describedby="emailHelp">
                  </div>

                  <div class="mb-3">
                 <label for="examplePassword" class="form-label">Password</label>
                    <input type="password" class="form-control"name="password" required >
                 </div>

                 <button type="submit" name="login" class="btn btn-primary">Login</button>
                  <!-- added -->
                 
               </form>

               <?php

               if (isset($_POST['login'])) {
                   # code...
                  $email = $_POST['email'];
                  $password = $_POST['password'];

                  //connection
                  require('dbConnect.php');

                  $sql = "SELECT*FROM customer WHERE email=?";

                  if ($stmt= mysqli_prepare($conn,$sql)) {
                     # code...
                     mysqli_stmt_bind_param($stmt,"s",$param_email);
                     $param_email =$_POST['email'];
                    // $param_password = $_POST['password'];

                      mysqli_execute($stmt);

                      $results = mysqli_stmt_get_result($stmt);

                      if ($results) {
                         # code...
                        $rows = mysqli_num_rows($results);
                        if ($rows>0) {
                           # code...
                           $record = mysqli_fetch_assoc($results);
                           $passwordHashed = $record['password'];
                           $passwordStatus = password_verify($password,$passwordHashed);
                           if ($passwordStatus) {
                              # code...
                               echo "<h4 style='color:green'>Loged in successfully.Welcome</h4>";
                              echo "Welcome dear ".$record['name']."<br>";
                              $fullname = $record['name'];
                              session_start();
                              $_SESSION['name']=$fullname;
                              $_SESSION['id'] =$record['id'];
                              header('location:index.php');
                           }else{
                              echo "<h4 style='color:red'>Invalid email or password</h4>";
                           }
                           //echo "Welcome ".$record['name'].$record['password'];
                           
                        }else{
                           echo "<h4 style='color:red'>Invalid email or password</h4>";
                        }
                      }else{
                        echo "Something wrong with the result.";
                      }
                  }else{
                     echo "Something went wrong.";
                  }
                } 
               ?>
               Don't have an account?
               <a style="text-decoration: none;" href="register.php">Register Now</a>
    			
   		</div>
   	</div>
   	
   </div>


</body>
</html>
