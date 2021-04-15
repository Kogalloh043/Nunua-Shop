<?php
//











define('DB_USERNAME','root');
define('DB_PASSWORD', '');
define('DB_SERVER', 'localhost');
define('DB_NAME', 'my_shop');

$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
if ($conn) {
	# code...
	// echo "connected successfully to the database";
}else{
	# code...
	echo "Failed to connect".mysql_connect_error();
}

?>