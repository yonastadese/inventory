<?php
    include('connect.php');
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      
        $pid = mysqli_real_escape_string($connection, $_POST['pid']);
        $pname = mysqli_real_escape_string($connection, $_POST['pname']);
        $inrec = mysqli_real_escape_string($connection, $_POST['inrec']);
        $dapurr = mysqli_real_escape_string($connection, $_POST['dapurr']); 
        $edit = false;
        
        $sql = "SELECT * FROM `outgoing inventory` WHERE `product name` = '$pname'";
        $result = mysqli_query($connection ,$sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count == 1) $edit = true;
        
        $msg = "";
        if($edit == true) {
            try{
                 $sql = "UPDATE `outgoing inventory` SET `product name` = '$pname', `inventory shipped` = '$inrec', `date of order` =               '$dapurr' WHERE `outgoing inventory`.`product id` = '$pid' ";
                $result = mysqli_query($connection,$sql) or die ( mysqli_error());
                
                $sql = "UPDATE `current inventory` SET `inventory shipped` = '$inrec' WHERE `current inventory`.`product id` = '$pid' ";
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
                 $sql = "SELECT * FROM `incoming inventory` WHERE `product name` = '$pname'";
                    $result = mysqli_query($connection ,$sql);
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $c= $row["product id"];
                    $count = mysqli_num_rows($result);
                    if($count == 1) $edit = true;
                    
                   if($edit == true) {
                       
                     $sql = "INSERT INTO `outgoing inventory` (`product id`,`product name`, `inventory shipped`, `date of order`) VALUES                                
                        ('$c','$pname', '$inrec', '$dapurr');";
                    
                    $result = mysqli_query($connection,$sql) or die ( mysqli_error());

                        $sql = "UPDATE `current inventory` SET `inventory shipped` = '$inrec' WHERE `current inventory`.`product id` = '$c' ";
                   
                   $result = mysqli_query($connection,$sql) or die ( mysqli_error());

                    $msg =  "<p> Record ADDED successfully. </p>";
                   }
        
                else $msg =  "<p> Record doesn't exist.</p>";
            
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