<?php
    include('connect.php');
    $sql = "SELECT * FROM `outgoing inventory`";
    $result = mysqli_query($connection ,$sql);
    $table = "<table cellspacing=\"0\"><tr><th>product id</th> <th>product name</th>  <th>inventory shipped</th> <th>date of order</th> <th></th> </tr>";
    $i = 0;
    $pid = "";
    $pname = "";
    $inrec = "";
    $date = "";
    while($row = mysqli_fetch_assoc($result)){
        $class = ($i == 0) ? "light" : "dark";
        $table = $table."<tr class=\"".$class."\">";
        $table = $table."<td>".$row["product id"]."</td>";
        $pid = $pid.$row["product id"]."|";
        $table = $table."<td>".$row["product name"]."</td>";
        $pname = $pname.$row["product name"]."|";
        $table = $table."<td>".$row["inventory shipped"]."</td>";
        $inrec = $inrec.$row["inventory shipped"]."|";
        $table = $table."<td>".$row["date of order"]."</td>";
        $date = $date.$row["date of order"]."|";
        $table = $table."<td> <img height=\"20\" onclick=fill(".$row["product id"].") src=\"img/edit.png\"/> </td>";
        $i = ($i == 0)? 1 : 0;
    }
    $cover = "<div class=\"cover\"></div>";
    $input = "<div class=\"addedit\"><form action=\"php/addeditoutgoining.php\" id=\"update\"><button class=\"exit\" type=\"button\">+</button><h1 id=\"dialogtitle\"></h1><p>Product Name</p><input name=\"pname\" placeholder=\"Product Name\" type=\"text\" id=\"pname\"/><p>Number of Item shipped</p><input name=\"inrec\" placeholder=\"Inventory shipped\" type=\"number\" id=\"inrec\" /><p>Date of order</p><input name=\"dapurr\" type=\"date\" id=\"dapurr\" /><button id=\"save\" class=\"submit\">save</button></form></div>";
    $script = "<script> $( \".fab\" ).click(function() {" .
                            "toggleDialog();" .
                            "ID = -1;".
                            "$('#pname').val('');".
                            "$('#inrec').val('');".
                            "$('#dapurr').val('');".
                            "$('#dialogtitle').html('ship product');" .
                        "});" .
                        "$( \".exit\" ).click(function() {" .
                            "ID = -1;".
                            "toggleDialog();" .
                        "});".
                        "var ID = -1;".
                        "function fill(id) {".
                            "var PID='".$pid."';".
                            "var PNAME='".$pname."';".
                            "var INREC='".$inrec."';".
                            "var DATE='".$date."';".
                            "var pid=PID.split('|');".
                            "var pname=PNAME.split('|');".
                            "var inrec=INREC.split('|');".
                            "var date=DATE.split('|');". 
                            "for(var i=0; i<pid.length; i++)".
                                "if(pid[i] == id) {".
                                    "ID = id;".
                                    "$('#pname').val(pname[i]);".
                                    "$('#inrec').val(inrec[i]);".
                                    "$('#dapurr').val(date[i]);".
                                "}".
                            "toggleDialog();" .
                            "$('#dialogtitle').html('edit shipped product');" .
                        "}" .
                        "$( \"#update\" ).submit(function( event ) {" .
                        "event.preventDefault();" .
                        "var \$form = $( this )," .
                            "pid = ID," .
                            "pname = \$form.find( \"input[name='pname']\" ).val()," .
                            "inrec = \$form.find( \"input[name='inrec']\" ).val()," .
                            "dapurr = \$form.find( \"input[name='dapurr']\" ).val()," .
                            "url = \$form.attr( \"action\" );" .
                        "if(pname){" .
                            "if(inrec){" .
                                "if(dapurr){" .
                                    "var posting = $.post( url, { pid: pid, pname: pname, inrec:inrec, dapurr:dapurr } );" .
                                    "posting.done(function( data ) {" .
                                        "var content = $( data );" .
                                        "console.log( content );".
                                        "if(content[0].innerHTML.includes('successfully')) fillingOutgoing();".
                                        "$( \"#dialogtitle\" ).empty().append( content );".
                                    "});" .
                                "}" .
                            "}" .
                        "}" .
                    "});</script>";
    $fab = "<button class=\"fab\">+</button>";
    echo $table . "</table><style>.outgoing {color: rgba(255,255,255,0.9)!important; border-bottom: 4px solid #fff;}</style>" . $fab . $input . $cover . $script;
//    echo "<p style='color:red;'>Incorrect username or password.</p>";

    mysqli_close($connection);
    exit();
?>