<?php session_start(); ?>
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Inventory System</title>
		<style type="text/css">
			*{
				margin: 0;
				padding: 0;
                font-family: "Aller_Rg";
			}
            @font-face {
              font-family: 'Aller_Bd';
              src: url('font/Aller_Bd.ttf');
            }
            @font-face {
              font-family: 'Aller_Bdlt';
              src: url('font/Aller_Bdlt.ttf');
            }
            @font-face {
              font-family: 'Aller_It';
              src: url('font/Aller_It.ttf');
            }
            @font-face {
              font-family: 'Aller_Lt';
              src: url('font/Aller_Lt.ttf');
            }
            @font-face {
              font-family: 'Aller_LtIt';
              src: url('font/Aller_LtIt.ttf');
            }
            @font-face {
              font-family: 'Aller_Rg';
              src: url('font/Aller_Rg.ttf');
            }
            @font-face {
              font-family: 'AllerDisplay';
              src: url('font/AllerDisplay.ttf');
            }
			.head {
				width: 100%;
				height: 70px;
				background-color: #222;
				box-shadow: 0px -25px 45px 20px rgba(1,1,1,0.5);
				position: relative;
				z-index: 3;
			}
			.logo {
				padding: 24px;
                padding-right: 0;
				font-size: 20px;
				font-weight: 100;
				float: left;
                color: #ddd;
				text-shadow: 0px 0px 10px rgba(255,255,255,0.1);
                text-transform: uppercase;
                text-decoration: none;
			}
			.head>ul {
				list-style-type: none;
				overflow: hidden;
				font-size: 20px;
			}
			.head>ul>li {
				float: right;
			}
			.head>ul>li>a {
				display: block;
				color: rgba(255,255,255,0.5);
				text-align: center;
                margin: 0 15px;
				padding-top: 24px;
                padding-bottom: 17px;
				text-decoration: none;
			}
			.head>ul>li>a:hover {
				color: rgba(255,255,255,0.9);
/*				background-color: rgba(1,1,1,0.03);*/
			}
			.body {
				width:100%;
				min-height: calc(100vh - 120px);
				background-color: white;
                background: url('img/bg (1).jpg');
                overflow-y: auto;
				z-index: 1;
			}
            .login {
                display: table;
                position: absolute;
                height: calc(100% - 100px);
/*                background: url(img/login-bg.svg) center no-repeat;*/
                width: 100%;
            }
            .login>.container {
                display: table-cell;
                vertical-align: middle;
            }
            .login>.container>.box {
                background: #222;
                margin: 25px auto;
                width: 356px;
                position: relative;
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 1px 1px 10px 1px rgba(1,1,1,0.2);
            }
            .login>.container>.box>form>h1 {
                margin: 15px;
                margin-bottom: 30px;
                font-weight: 100;
                font-size: 1.2em;
                color: rgba(255,255,255,0.9);
                text-transform: uppercase;
            }
            .login>.container>.box>form>input {
                width: 100%;
                margin: 5px 0;
                padding: 15px;
                background: rgba(255,255,255,0.9);
                font-size: 1.2em;
                border: none;
            }
            .login>.container>.box>form>button {
                border: none;
                background: #fdcc10;
                height: 50px;
                width: 100%;
                margin-top: 5px;
                color: white;
                text-align: center;
                border-radius: 0px;
                font-size: 1.1em;
                text-shadow: 0px 0px 10px rgba(1,1,1,0.4);
                text-transform: uppercase;
            }
            .login>.container>.box>form>button:hover {
                background: rgba(255, 203, 3, 0.84);
            }
            .login>.container>.box>form>button:active {
                background: #fdcc10;
            }
			.login>.container>.box>form>#login_notify {
                margin: 15px;
                color: red;
            }
            #content {
                padding: 50px;
                min-height: calc(100vh - 120px);
            }
            table {
                width: 100%;
                background: rgba(255,255,255,0.1);
            }
            .report_table{
                width: calc(50%);
                float:right;
            
            }
            th {
                background: rgba(253, 204, 16, 0.75);
                padding: 15px;
            }
            tr {
                border: 1px solid black;
            }
            td {
                padding: 10px;
                text-align: center;
            }
            table>tbody>.dark{
                background: rgba(1,1,1,0.1);
            }
            table>tbody>.light{
                background: rgba(255,255,255,0.5);
            }           
            .foot {
				width: 100%;
				height: 50px;
				color: rgba(255,255,255,0.8);
                background-color: #222;
				box-shadow: 0px 25px 45px 20px rgba(1,1,1,0.4);
				position: relative;
				z-index: 2;
			}
			.foot>p {
				padding: 17.5px;
                font-size: 0.8em;
                font-weight: lighter;
				text-align: center;
			}
            rect {
                fill: none;
            }
            svg {
                margin: -50px;
                margin-top: -110px;
            }
            .logo-short {
                display: none;
            }
            .menu-toggle {
                position: absolute;
                height: 30px;
                margin: 20px;
                right: 10px;
                display: none;
                opacity: .8;
            }
            .menu-small {
                position: absolute;
                top: -210px;
                right: 0;
                background-color: #222;
                transition: all .5s ease;
                z-index: 1;
            }
            .menu-small>ul {
				list-style-type: none;
				overflow: hidden;
				font-size: 20px;
			}
			.menu-small>ul>li {
				
			}
			.menu-small>ul>li>a {
				display: block;
				color: rgba(255,255,255,0.5);
				text-align: left;
                margin: 25px 20px;
				text-decoration: none;
                border-bottom: none !important;
			}
			.menu-small>ul>li>a:hover {
				color: rgba(255,255,255,0.9);
/*				background-color: rgba(1,1,1,0.03);*/
			}
            @media screen and (max-width: 1030px) {
                .menu {
                    display: none !important;
                }
                .menu-toggle {
                    display: inline !important;
                }
                .logo {
                    display: none;
                }
                .logo-short {
                    display: inline;
                }
                #content {
                    width: 100vw;
                    padding: 10px 0px;
                    min-height: calc(100vh - 120px);
                }
                #content>table {
                    width: 100%;
                }
                #piechart {
                    width: 100vw !important;
                    margin: 10px 0;
                }
                #content>form>input {
                    border-radius: 0px !important;
                }
            }
            
            @media screen and (max-width: 400px) {
                .addedit {
                    right: 0 !important;
                }
            }
            @media screen and (min-width: 1030px) {
                #piechart {
                    width: 45vw !important;
                    margin: -5px;
                    float: left;
                }
            }
            .note {
                width: 90%;
                max-width: 600px;
                margin: 0 auto;
                margin-top: 60px;
            }
            .note>h2 {
                padding: 20px;
                text-align: center
            }
            .note>p {
                text-align: justify;
            }
            #content>form>input {
                width: 100%;
                height: 50px;
                background: #fff;
                margin: 10px 0;
                padding: 15px;
                border: none;
                border-radius: 20px;
                font-size: 1.2em;
                outline: none;
                box-shadow: 0px 0px 5px 2px rgba(1,1,1,0.3);
            }
            .fab {
                width: 50px;
                height: 50px;
                background: rgba(253, 204, 16, 0.75);
                color: black;
                font-size: 2em;
                border: none;
                border-radius: 50%;
                box-shadow: 0px 0px 10px 4px rgba(1,1,1,0.1);
                position: fixed;
                bottom: 30px;
                right: 30px;
                outline: none;
                z-index: 3;
            }
            .fab:hover {
                box-shadow: 0px 0px 10px 4px rgba(1,1,1,0.2);
            }
            .fab:active {
                box-shadow: 0px 0px 10px 4px rgba(1,1,1,0.1);
            }
            .exit { 
                width: 50px;
                height: 50px;
                position: relative;
                top: 0;
                right: 0;
                float: right;
                color: rgba(253, 16, 16, 0.75);
                background: rgba(255,255,255,.1);
                font-size: 2em;
                border: none;
                border-radius: 50%;
                box-shadow: 0px 0px 10px 4px rgba(1,1,1,0.1);
                margin-right: 15px;
                transform: rotate(45deg);
                outline: none;
                z-index: 3;
            }
            .exit:hover {
                background: rgba(253, 16, 16, 0.75);
                color: white;
            }
            .exit:active {
                color: rgba(253, 16, 16, 0.75);
                background: white;
            }
            .cover {
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                z-index: 90;
                display: none;
                opacity: 0;
                cursor: not-allowed;
                background: rgb(255,255,255);
                transition: opacity .5s ease;
            }
            .addedit {
                width: 100vw;
                height: 395px;
                max-width: 400px;
                background: rgba(1,1,1, 0.9);
                border-radius: 20px;
                box-shadow: 1px 1px 10px 1px rgba(1,1,1,0.2);
                position: fixed;
                top: -400px;
                right: calc(50vw - 200px);
                outline: none;
                overflow: hidden;
                z-index: 99;
                transition: all .5s ease;
            }
            .addedit>form>h1 {
                margin: 15px;
                margin-bottom: 25px;
                font-weight: 100;
                font-size: 1.2em;
                color: rgba(255,255,255,0.9);
                text-transform: uppercase;
            }
            .addedit>form>p {
                margin: 5px;
                margin-buttom: 1px;
                color: rgba(255,255,0,0.9);
            }
            .addedit>form>input {
                width: 100%;
                margin: 5px 0;
                padding: 15px;
                background: rgba(255,255,255,0.9);
                font-size: 1.2em;
                border: none;
            }
            .addedit>form>.submit {
                border: none;
                background: #fdcc10;
                height: 50px;
                width: 100%;
                margin-top: 5px;
                color: white;
                text-align: center;
                border-radius: 0px;
                font-size: 1.1em;
                text-shadow: 0px 0px 10px rgba(1,1,1,0.4);
                text-transform: uppercase;
            }
            .addedit>form>.submit:hover {
                background: rgba(255, 203, 3, 0.84);
            }
            .addedit>form>.submit:active {
                background: #fdcc10;
            }
			.addedit>form>#login_notify {
                margin: 15px;
                color: red;
            }
		</style>
	</head>
	<body>
		<div class="head">
             <a class="logo" href="">Inventory Managment System</a>
            <a class="logo logo-short">Inventory System</a>
			<ul class="menu">
                <li><a href="" class="sign_out">Logout</a></li>
				<li><a href="" class="report">Report</a></li>
				<li><a href="" class="outgoing">Outgoing Orders</a></li>
                <li><a href="" class="incoming">Incoming Purchase</a></li>
				<li><a href="" class="current">Current Inventory</a></li>
			</ul>
            <img class="menu-toggle" src="img/ic_menu_white_18dp.png">
		</div>
        <div class="menu-small" id="ms">
            <ul>
                <li><a href="" class="current">Current Inventory</a></li>
                <li><a href="" class="incoming">Incoming Purchase</a></li>
                <li><a href="" class="outgoing">Outgoing Orders</a></li>
                <li><a href="" class="report">Report</a></li>
                <li><a href="" class="sign_out">Logout</a></li>
            </ul>
        </div>
		<div class="body">
            <?php
                include('php/connect.php');
                if (isset($_SESSION['login_user']) && $_SESSION['login_user'] == true) {
                    echo "<style>
                    .menu {
                        display: block;
                    }
                    .login {
                        display:none;
                    }
                    #content {
                        background: rgba(255,255,255,0.9);
                    }</style>";
                }
                else {
                    echo "<style>
                    .menu {
                        display: none;
                    }
                    .menu-toggle {
                        display: none !important;
                    }
                    .login {
                        display:table;
                    }
                    #content {
                       display:none ;
                    }</style>";
                }
            ?>
            <div class="login">
                <div class="container">
                    <div class="box">
                        <form action="php/login.php" id="sign_in">
                            <h1>Inventory Manager</h1>
                            <input name="username" placeholder="Username" type="text" request>
                            <input name="password" placeholder="Password" type="password" request>
                            <div id="login_notify"></div>
                            <button>Login</button>
                        </form>
                    </div>
                </div>
            </div>
            <div id="content">
                <div class="note">
                    <h2>BELACHEW SOLOMON BUILDING CONTRACTOR(BSBC)</h2>
                    <p>Belachew Solomon Building Contractor is established in 1992.
                        The company had participated and accomplished   construction 
                        of Health center Buildings, Schools & Office Buildings, Camp Construction,
                        Low cost efficient Apartment Buildings, Drainage ditches, Gabions and retaining walls,
                        out fall channels, Waterproofing works, Asphalt chipping and others in different projects 
                        and Regions from 1993 up to now.

                    </p>
                </div>
            </div>
        </div>
		<div class="foot">
			<p>&copy; Copyright 2018. Inventory System PHP Project</p>
		</div>
        <script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
        <script type="text/javascript" src="js/Chart.bundle.js"></script>
        <script type="text/javascript" src="js/utils.js"></script>
        <script type="text/javascript">
            function ccc(val){
                var s = val.split('th');
                console.log(val);
                var ss = s[s.length - 1].split('<td>');
                var label = [], data = [], color = [];
                for (i in ss) {
                    if(i == 0);
                    else if(i%2 != 0) label.push(ss[i].split('<')[0]);
                    else { data.push(ss[i].split('<')[0]); color.push('#'+((1<<24)*Math.random()|0).toString(16))}
                }
                console.log(label);
                console.log(data);
                console.log(color);
                var config = {
                    type: 'pie',
                    data: {
                        datasets: [{
                            data: data,
                            backgroundColor: color,
                            label: 'Dataset 1'
                        }],
                        labels: label
                    },
                    options: {
                        responsive: true
                    }
                };
                var ctx = document.getElementById('chart-area').getContext('2d');
                window.myPie = new Chart(ctx, config);
            }
        </script>
        <script type="text/javascript">
            var menu = false;
            $( ".menu-toggle" ).click(function() {
                if(!menu) {
                    $( "#ms" ).css({top:'70px'});
                }
                else {
                    $( "#ms" ).css({top:'-210px'});
                }
                menu = !menu;
            });
            $( "#sign_in" ).submit(function( event ) {
                event.preventDefault();
                var $form = $( this ),
                    username = $form.find( "input[name='username']" ).val(),
                    password = $form.find( "input[name='password']" ).val(),
                    url = $form.attr( "action" );
                if(username){
                    if(password){
                        var posting = $.post( url, { username: username, password: password } );
                        posting.done(function( data ) {
                            var content = $( data );
                            if(content[0].innerHTML == '') {
                                $( "#login_notify" ).empty();
                                location.reload();
                                console.log("loged in");
                            }
                            else $( "#login_notify" ).empty().append( content );
                        });
                    }
                }
            });
            $( ".sign_out" ).click(function() {
                var oReq = new XMLHttpRequest();
                oReq.onload = function() {
                    $( "#result" ).empty().append( this.responseText );
                };
                oReq.open("get", "php/logout.php", true);
                oReq.send();
            });
            $( ".current" ).click(function() {
                event.preventDefault();
                var posting = $.post( 'php/fillCurrentTable.php' );
                posting.done(function( data ) {
                    var content = $( data );
                    console.log(content);
                    $( "#content" ).empty().append( content );
                    $( "#ms" ).css({top:'-210px'}); menu = false;
                });
                
            });
            
            $( ".incoming" ).click(function() {
                event.preventDefault();
                fillIncoming();
            });
            function fillIncoming() {
                var posting = $.post( 'php/fillIncomingTable.php' );
                posting.done(function( data ) {
                    var content = $( data );
                    console.log(content);
                    $( "#content" ).empty().append( content );
                    $( "#ms" ).css({top:'-210px'}); menu = false;
                });
            }
            $( ".outgoing" ).click(function() {
                event.preventDefault();
                fillingOutgoing();
            });
            function fillingOutgoing(){
                var posting = $.post( 'php/filloutgoingTable.php' );
                posting.done(function( data ) {
                    var content = $( data );
                    console.log(content);
                    $( "#content" ).empty().append( content );
                    $( "#ms" ).css({top:'-210px'}); menu = false;
                });
            }
            $( ".report" ).click(function() {
                event.preventDefault();
                var posting = $.post( 'php/fillreportTable.php' );
                posting.done(function( data ) {
                    var content = $( data );
                    $( "#content" ).empty().append(content);
                    $( "#ms" ).css({top:'-210px'}); menu = false;
                    console.log();
                    ccc(content[1].innerHTML);
                });
            });
            var dialog = false; 
            function toggleDialog() {
                if(!dialog){
                    $( ".cover" ).css({display:'inline',opacity:'.5'});
                    $( ".addedit" ).css({top:'calc(50vh - 150px)'});
                }
                else {
                    $( ".cover" ).css({display:'none',opacity:'0'});
                    $( ".addedit" ).css({top:'-400px'});
                }
                dialog = !dialog;
            }
        </script>
    </body>
</html>
