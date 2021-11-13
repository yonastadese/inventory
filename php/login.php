<?php
    include('connect.php');
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $siusername = mysqli_real_escape_string($connection, $_POST['username']);
      $sipassword = mysqli_real_escape_string($connection, $_POST['password']); 
      
      $sql = "SELECT username FROM users WHERE username = '$siusername' and password = '$sipassword'";
      $result = mysqli_query($connection ,$sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
		
      if($count == 1) {
         $_SESSION['login_user'] = $siusername;
//         echo "<p>logged in as ".$_SESSION['login_user']."</p>";
          echo "<p style='color:white;'></p>";
            exit();
      }else {
          echo "<p style='color:red;'>Incorrect username or password.</p>";
      }
   }
    mysqli_close($connection);
?>