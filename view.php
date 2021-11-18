<?php
// Start the session
session_start();
?>
<DOCTYPE html>
    <html>

    <head>
        <title>e-comerse</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="design.css">
    </head>

    <body>
        <div class="jumbotron text-center">
            <a href="index.php">
                <h1>First E-Comerse</h1>
            </a>
            <p> Welcome to Mr.<?php echo $_SESSION["admin_user"] ?></p>
            <?php include 'Category.php'; ?>
            <?php include 'menu.php'; ?>
        </div>

        <div class="container">
        </div>
        <nav class="navbar navbar-expand-sm bg-info navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">Active</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li>
  </ul>
</nav>
        
        <div>
            <?php include 'pages.php'; ?>
        </div>

    </body>

    </html>
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

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    echo $result->num_rows;
    echo "<br>";

    for ($x = 0; $x < $result->num_rows; $x++) {
        $item = $result->fetch_assoc();
        //print_r($item);
        $img = $item['productimg'];
        // echo "<b>Product:</b> ". $item['pname'] . "====== PRice: " . $item['pprice']."<img width='50' height='50' src='uploads/$img'>";
        // echo "<br>";
    ?>

        <?php
        if ($x <= 3) {
        ?>

            <div class="row">
                <div class="col-sm-4">
                    <img class="partial-image" src="<?php echo 'uploads/' . $img ?>" width="100" height="100">
                    <p>$ <?php echo $item['pprice']; ?> USD</p>
                </div>

            </div>

        <?php } else {
        ?>

            <div class="row">
                <div class="col-sm-4">
                    <img class="partial-image" src="<?php echo 'uploads/' . $img ?>" width="100" height="100">
                    <p>$ <?php echo $item['pprice']; ?> USD</p>
                </div>


 -->





        <?php
        }
    }
        ?>
            </div>