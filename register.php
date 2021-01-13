<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'db_code/connectDB.php';
    include 'template/Navbar.php';
    include 'template/OtherCSS.php';
    ?>
</head>

<body>

    <div id="mainBody">
        <div class="container">
            <div class="row">
                <!-- Sidebar ================================================== -->
                <?php include 'template/Sidebar.php'; ?>
                <!-- Sidebar end=============================================== -->
                <div class="span9">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                        <li class="active">Registration</li>
                    </ul>
                    <h3> Registration</h3>
                    <div class="well">

                        <form class="form-horizontal">
                            <h4>Your personal information</h4>
                            <div class="control-group">
                                <label class="control-label" for="inputFname1">Username <sup>*</sup></label>
                                <div class="controls">
                                    <input type="text" name="username" id="inputFname1" placeholder="Username" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword1">Password <sup>*</sup></label>
                                <div class="controls">
                                    <input type="password" name="password" id="inputPassword1" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Date of Birth <sup>*</sup></label>
                                <div class="controls">
                                    <input type="date" name="birthday" required>
                                </div>
                            </div>

                            <h4>Your address</h4>
                            <div class="control-group">
                                <label class="control-label" for="inputFname">First name <sup>*</sup></label>
                                <div class="controls">
                                    <input type="text" id="inputFname" name="firstname" placeholder="First Name" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputLname">Last name <sup>*</sup></label>
                                <div class="controls">
                                    <input type="text" id="inputLname" name="lastname" placeholder="Last Name" required />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="address">Address<sup>*</sup></label>
                                <div class="controls">
                                    <input type="text" id="address" name="address" placeholder="Adress" required />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="mobile">Mobile Phone </label>
                                <div class="controls">
                                    <input type="number" name="phone" id="mobile" placeholder="Mobile Phone" required />
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <input class="btn btn-large btn-success" type="button" value="Register" onclick="register();" />
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Footer start ================================================================== -->
    <?php include 'template/footer.php'; ?>
    <!-- Footer end ==================================================================== -->
</body>

</html>

<script type="text/javascript">
    function register() {
        username = document.getElementsByName('username')[1].value;
        password = document.getElementsByName('password')[1].value;
        birthday = document.getElementsByName('birthday')[0].value;
        firstname = document.getElementsByName('firstname')[0].value;
        lastname = document.getElementsByName('lastname')[0].value;
        address = document.getElementsByName('address')[0].value;
        phone = document.getElementsByName('phone')[0].value;
        destination = 'db_code/register_customer.php?username=' + username + '&password=' + password + ' &birthday=' + birthday + ' &firstname=' + firstname + ' &lastname=' + lastname + ' &address=' + address + ' &phone=' + phone;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", destination, true);
        xhr.send();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var status = xhr.responseText;
                alert("" + status);
                document.getElementsByName('username')[0].value = "";
                document.getElementsByName('password')[0].value = "";
                document.getElementsByName('birthday')[0].value = "";
                document.getElementsByName('firstname')[0].value = "";
                document.getElementsByName('lastname')[0].value = "";
                document.getElementsByName('address')[0].value = "";
                document.getElementsByName('phone')[0].value = "";
            }
        }
    }
</script>