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
            <hr class="soften">
            <h1>Visit us</h1>
            <hr class="soften" />
            <div class="row">
                <div class="span4">
                    <h4>Contact Details</h4>
                    <p> test@gmail.com<br /><br>
                        ﻿Tel 092713132131<br /><br>
                        Loc Maria Aurora Brgy 4<br>
                    </p>
                </div>

                <div class="span4">
                    <h4>Opening Hours</h4>
                    <h5> Monday - Friday</h5>
                    <p>09:00am - 09:00pm<br /><br /></p>
                    <h5>Saturday</h5>
                    <p>09:00am - 07:00pm<br /><br /></p>
                    <h5>Sunday</h5>
                    <p>12:30pm - 06:00pm<br /><br /></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer ================================================================== -->
    <?php include 'template/footer.php'; ?>
    <!-- Footer end ================================================================== -->
</body>

</html>