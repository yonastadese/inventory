<?php
    include('connect.php');
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      
        $pid = mysqli_real_escape_string($connection, $_POST['pid']);
        $pname = mysqli_real_escape_string($connection, $_POST['pname']);
        $inrec = mysqli_real_escape_string($connection, $_POST['inrec']);
        $dapurr = mysqli_real_escape_string($connection, $_POST['dapurr']); 
        $edit = false;
        
        $sql = "SELECT * FROM `incoming inventory` WHERE `product id` = '$pid'";
        $result = mysqli_query($connection ,$sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count == 1) $edit = true;
        
        $msg = "";
        if($edit == true) {
            try{
                $sql = "UPDATE `incoming inventory` SET `product name` = '$pname', `inventory received` = '$inrec', `date of purchase` = '$dapurr' WHERE `incoming inventory`.`product id` = '$pid' ";
                $result = mysqli_query($connection,$sql) or die ( mysqli_error());
                
                $sql = "UPDATE `current inventory` SET  `inventory received` = '$inrec' WHERE `current inventory`.`product id` = '$pid' ";
                 $result = mysqli_query($connection,$sql) or die ( mysqli_error());
                $msg =  "<p> Record UPDATED successfully. </p>";
                
            }
            catch(Exception $e)
            {
                $msg =  "<p> Something went wrong.</p>";
            }

        }
        else {
            try{
                $sql = "INSERT INTO `incoming inventory` (`product name`, `inventory received`, `date of purchase`) VALUES ('$pname', '$inrec', '$dapurr');";
                $result = mysqli_query($connection,$sql) or die ( mysqli_error());
    
                $sql = "SELECT * FROM `incoming inventory` ";
                $result = mysqli_query($connection ,$sql);
//                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $c = 0;
                while($row = mysqli_fetch_assoc($result)){
                    if($c < $row["product id"]) $c = $row["product id"];
                }
//                    $c = mysqli_num_rows($result);
                    
                $sql ="INSERT INTO `current inventory` (`product id`, `product name`, `starting inventory`, `inventory received`, `inventory shipped`) VALUES (' $c', '$pname', '$inrec', '$inrec', '0');";
                $result = mysqli_query($connection,$sql) or die ( mysqli_error());
                
                $msg =  "<p> Record ADDED successfully. </p>";
            }
            catch(Exception $e)
            {
                $msg =  "<p> Something went wrong.</p>";
            }

        }
        echo $msg;
   }
    mysqli_close($connection);
?>