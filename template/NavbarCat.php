<!DOCTYPE html>
<html lang="en">

<head>
    <style type="text/css">
        #show_logout {
            display: none;
        }
    </style>
    <?php
    include 'db_code/connectDB.php';
    SESSION_START();
    if (isset($_SESSION['username'])) {
        echo '  	
          <style type="text/css">
          #hide_login{
              display: none;
          }
          #show_logout{
              display: block;
          }
          </style>';
    }
    ?>
    <meta charset="utf-8">
    <title>NiJo Online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap style -->
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen" />
    <link href="themes/css/base.css" rel="stylesheet" media="screen" />
    <!-- Bootstrap style responsive -->
    <link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- Google-code-prettify -->
    <link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet" />
    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css" id="enject"></style>
</head>

<body>
    <div id="header">
        <div class="container">
            <div id="welcomeLine" class="row">
                <div class="span6">Welcome <strong><?php if (isset($_SESSION['username'])) {
                                                        echo $_SESSION['username'];
                                                    }  ?></strong></div>
            </div>
            <!-- Navbar ================================================== -->
            <div id="logoArea" class="navbar">
                <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-inner">
                    <a class="brand" href="index.php"><img src="themes/images/logo1.png" alt="NiJo Shop" /></a>
                    <!-- Search Start -->
                    <form class="form-inline navbar-search" method="post" action="">
                        <input class="srchTxt" type="text" name="search" />
                        <button type="button" id="submitButton" class="btn btn-primary" onclick="showCategoryAvailable(getCategory())">Go</button>
                    </form>
                    <!-- Search End-->
                    <ul id="topMenu" class="nav pull-right">
                        <li class=""><a href="term_condition.php">Term & Condition</a></li>
                        <li class=""><a href="contact.php">Contact</a></li>
                        <li class="">

                            <a href="#login" role="button" id="hide_login" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>

                            <a href="db_code/logout.php" role="button" id="show_logout" style="padding-right:0;"><span class="btn btn-large btn-success">Logout</span></a>

                            <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3>Login</h3>
                                </div>
                                <div class="modal-body">

                                    <form class="form-horizontal loginFrm">
                                        <div class="control-group">
                                            <input type="text" id="inputEmail" name="username" placeholder="Username">
                                        </div>
                                        <div class="control-group">
                                            <input type="password" id="inputPassword" name="password" placeholder="Password">
                                        </div><br>
                                        <button type="button" class="btn btn-success" onclick="login();">Login</button>
                                    </form>

                                    <a href="register.php"><button class="btn btn-success">Register</button></a>
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End====================================================================== -->

</body>

</html>
<script type="text/javascript">
    function login() {
        username = document.getElementsByName('username')[0].value;
        password = document.getElementsByName('password')[0].value;

        destination = 'db_code/login.php?username=' + username + ' &password=' + password;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", destination, true);
        xhr.send();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var status = xhr.responseText;
                alert("" + status);
                document.getElementsByName('username')[0].value = "";
                document.getElementsByName('password')[0].value = "";
                document.location = "index.php";
            }
        }
    }
</script>