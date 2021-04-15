
  <nav class="navbar navbar-expand-md" style="background-color: #FFC300;">
  <div class="container-fluid">
     <a class="navbar-brand" href="#"><img src="Nunua.png" class="logo me-auto me-lg-0" height="45px" width="80px"></a>

<ul class="navbar-nav me-auto mb-2 mb-md-0">

  <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewproducts.php">Available products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addproducts.php">Add products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mypurchases.php">My Orders</a>
        </li>

       <!--  <li class="nav-item">
          <a class="nav-link disabled" href="" tabindex="-1" aria-disabled="true">Register</a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true">Login</a>
        </li> -->
        <?php 
        session_start();
        
        if (isset($_SESSION['name'])) {
          $name = $_SESSION['name'];
          # code...
          echo '
          <li class="nav-item">
          <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true">Log out</a>
        </li>
          ';

           echo '
        <li class="nav-item">
          <a class="nav-link disabled" href="" tabindex="-1" aria-disabled="true">Hi,'.$name.'</a>
        </li>
        ';
        }else{
        echo '
         <li class="nav-item">
          <a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true">LOGIN</a>
        </li>
        ';
        }
       
        ?>
  </ul>
</ul>
</div>
</nav>
