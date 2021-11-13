<?php
    include('connect.php');
    $sql = "SELECT * FROM `incoming inventory`";
    $result = mysqli_query($connection ,$sql);
//    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
   
    $table = "<table class=\"report_table\" cellspacing=\"0\"> <th>product name</th>  <th>inventory received</th>";
    $var = "{";
    $i = 0;
    while($row = mysqli_fetch_assoc($result)){
        $class = ($i == 0) ? "light" : "dark";
        $table = $table."<tr class=\"".$class."\">";
        $table = $table."<td>".$row["product name"]."</td>";
        $var = $var. "{'".$row["product name"]."','";
        $table = $table."<td>".$row["inventory received"]."</td>";
        $var = $var. $row["inventory received"]."},";
        $i = ($i == 0)? 1 : 0;
    }
    $chart="<div id=\"piechart\"> <canvas id=\"chart-area\" class=\"chart-area\"></canvas></div>";  
    echo $chart . $table . "</table><style>.report {color: rgba(255,255,255,0.9)!important; border-bottom: 4px solid #fff;}</style>";
    mysqli_close($connection);
    exit();
?>