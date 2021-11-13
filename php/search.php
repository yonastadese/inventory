<?php
    include('connect.php');
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $search_for = mysqli_real_escape_string($connection, $_POST['search']);
        $sql = "SELECT * FROM `current inventory` where `product name` like '%{$search_for}%'";
        $result = mysqli_query($connection ,$sql);
    //    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $table = "<table cellspacing=\"0\"><tr><th>product id</th> <th>product name</th> <th>starting inventory</th> <th>inventory received</th> <th>inventory shipped</th> <th>inventory on hand</th> </tr>";
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $class = ($i == 0) ? "light" : "dark";
            $table = $table."<tr class=\"".$class."\">";
            $table = $table."<td>".$row["product id"]."</td>";
            $table = $table."<td>".$row["product name"]."</td>";
            $table = $table."<td>".$row["starting inventory"]."</td>";
            $table = $table."<td>".$row["inventory received"]."</td>";
            $table = $table."<td>".$row["inventory shipped"]."</td>";
            $ion = $row["starting inventory"] + $row["inventory received"] - $row["inventory shipped"];
            $table = $table."<td>".$ion."</td>";
            $i = ($i == 0)? 1 : 0;
        }
        $search = "<form action=\"php/search.php\"  id=\"search\"><input name=\"search\" placeholder=\"Search Product Name\" value=\"" . $search_for . "\"/></form><script>$( \"#search\" ).submit(function( event ) { event.preventDefault(); var \$form = $( this ),".
                    "search = \$form.find( \"input[name='search']\" ).val(),".
                    "url = \$form.attr( \"action\" );".
                    "var posting = $.post( url, { search: search } );".
                    "posting.done(function( data ) {".
                        "var content = $( data );".
                        "\$( \"#content\" ).empty().append( content );".
                    "});".
            "});</script>";
        echo $search . $table . "</table> <style>.current {color: rgba(255,255,255,0.9)!important; border-bottom: 4px solid #fff;}</style>";
    //    echo "<p style='color:red;'>Incorrect username or password.</p>";
    }
    mysqli_close($connection);
    exit();
?>