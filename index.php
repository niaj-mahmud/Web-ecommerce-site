<?php
// Start the session
session_start();

// Set session variables
$_SESSION["admin_user"] = "Niaj Mahmud";
?>
<DOCTYPE html>
    <html>

    <head>

        <title>e-comerse</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


        <link rel="stylesheet" type="text/css" href="design.css">
    </head>

    <body  class="body-background">



        <div class="jumbotron text-center">
            <div class="logo">
                <a href="index.php"> <img src="pictures\logo.png"  width="100"
                        height="100"></a>
            </div>

            <p class="text-white-50 bg-dark"> Welcome to Mr.<?php echo $_SESSION["admin_user"] ?></p>

            <?php include 'Category.php'; ?>


            <?php include 'menu.php'; ?>
            <?php
            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            echo  $dt->format('F j, Y, g:i a') . "<br>";
            ?>



            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "institute";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            echo "Connected successfully";

            ?>

        </div>
<div >
        <div  id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
                <li data-target="#demo" data-slide-to="3"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="pictures/cocola.jpg" alt="Los Angeles" width="1400" height="500">
                    <div class="carousel-caption">
                        <h3>Los Angeles</h3>
                        <p>We had such a great time in LA!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1513116476489-7635e79feb27?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTZ8fHByb2R1Y3R8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Chicago" width="1400" height="500">
                    <div class="carousel-caption">
                        <h3>Chicago</h3>
                        <p>Thank you, Chicago!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="http://www.999shopbd.com/image/product_image/143090723_3504854379739736_2257321542975952476_n.png" alt="New York" width="1400" height="500">
                    <div class="carousel-caption">
                        <h3>New York</h3>
                        <p>We love the Big Apple!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <a href="https://web.facebook.com/niaj.oooom/" target="_blank">
                        <img src="https://images.pexels.com/photos/3944405/pexels-photo-3944405.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="New roll" width="1400" height="500">
                        <div class="carousel-caption">
                            <h3>New </h3>
                            <p>We love the Big !</p>
                        </div>
                </div>


            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>



        <div><?php include 'product.php'; ?></div>

        <div class=""><?php include 'pages.php'; ?></div>


        <div class="alert alert-info">
            <strong>Info!</strong> This alert box could indicate a neutral informative change or action.
        </div>

</div>

        <div id="copyright">
            <p>Copyright &COPY;NIAJ MAHMUD.</p>
        </div>
    </body>

    </html>